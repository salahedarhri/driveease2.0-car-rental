<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Protection;
use App\Models\Option;
use App\Models\Car;
use Carbon\Carbon;

class PaymentController extends Controller
{

  public function checkout(Request $request){

    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    $dateDepart = $request->route('dateDepart');
    $dateRetour = $request->route('dateRetour');
    $slugVoiture = $request->route('voiture');
    $prtcChoisi = session('prtc_choisi');
    $optnsIds = session('optnsIds');

    $dateDepartCarbon = Carbon::parse($dateDepart);
    $dateRetourCarbon = Carbon::parse($dateRetour);

    $nbJrs = max(1, $dateRetourCarbon->diffInDays($dateDepartCarbon));

    $lineItems = [];

    $voiture = Car::where('slug',$slugVoiture)->first();

    $prtc = Protection::find($prtcChoisi)->first();

    $lineItems[] = [
      'price_data' => [
        'currency' => 'mad',
        'product_data' => [
          'name' => $voiture->modele . ' pour ' . $nbJrs . ' Jours',
          // 'images' =>[asset('images/voitures/'.$voiture->photo)],
        ],
        'unit_amount' => $voiture->prix * $nbJrs * 100,
      ], 'quantity' => 1,
    ];

    $lineItems[] = [
      'price_data' => [
        'currency' => 'mad',
        'product_data' => [
          'name' => 'Protection ' . $prtc->type . ' pour ' . $nbJrs . ' Jours',
          // 'images' => [asset('images/options/option2.png')],
        ],
        'unit_amount' => $prtc->prix * $nbJrs * 100,
      ], 'quantity' => 1,
    ];

    if ($optnsIds != null) {
      $optnsChoisi = Option::whereIn('id', $optnsIds)->get();

      foreach ($optnsChoisi as $optn) {
        $lineItems[] = [
          'price_data' => [
            'currency' => 'mad',
            'product_data' => [
              'name' => $optn->option,
              // 'images' => [asset('images/options/'.$optn->urlPhoto)],
            ],
            'unit_amount' => $optn->prix * 100,
          ], 'quantity' => 1,
        ];
      }
    }

    try{
      $session = \Stripe\Checkout\Session::create([
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => route('success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
        'cancel_url' => route('cancel'),
      ]);
    }catch(\Exception $e){
      dd($e);
    }

    return redirect($session->url);
  }

  public function success(){
    return redirect()->route('accueil')->with('success','Paiement réussi !');
  }

  public function cancel(){
    return redirect()->route('accueil')->with('error','Paiement annulé.');
  }

  public function webhook(){
    $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
      $event = \Stripe\Webhook::constructEvent(
        $payload,
        $sig_header,
        $endpoint_secret
      );
    } catch (\UnexpectedValueException $e) {
      // Invalid payload
      return response('', 400);
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
      // Invalid signature
      return response('', 400);
    }

    //Handle event 
    switch ($event->type) {
      case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object;

        default:
        echo 'Received unknown event type ' . $event->type;
    }

    return response('');
  }
}
