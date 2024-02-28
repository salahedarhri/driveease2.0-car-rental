<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Transaction;
use App\Models\Protection;
use App\Models\Option;
use App\Models\Car;

class PaymentController extends Controller{
    
  public function checkout(){
    
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    $nbJrs = session('nbJrs');
    $idVoiture = session('idVoiture');
    $prtcChoisi = session('prtc_choisi');
    $optnsIds = session('optnsIds');

    $lineItems =[];

    $voiture = Car::find($idVoiture)->first();
    
    $prtc = Protection::find($prtcChoisi)->first();

    $lineItems[] = [
      'price_data' => [
        'currency' => 'mad',
        'product_data' => [
            'name' => $voiture->modele.' pour '.$nbJrs.' Jours',
        ],
        'unit_amount' => $voiture->prix * $nbJrs * 100,
      ],'quantity' => 1,
    ];

    $lineItems[] = [
      'price_data' => [
        'currency' => 'mad',
        'product_data' => [
            'name' => 'Protection '.$prtc->type.' pour '.$nbJrs.' Jours',
        ],
        'unit_amount' => $prtc->prix* $nbJrs * 100,
      ],'quantity' => 1,
    ];

    if( $optnsIds != null ){
      $optnsChoisi = Option::whereIn('id',$optnsIds)->get();

      foreach( $optnsChoisi as $optn){
        $lineItems[] = [
          'price_data' => [
            'currency' => 'mad',
            'product_data' => [
                'name' => $optn->option,
            ],
            'unit_amount' => $optn->prix * 100,
          ],'quantity' => 1,
      ];
      }
    }

    $session = \Stripe\Checkout\Session::create([
      'line_items' => $lineItems,
      'mode' => 'payment',
      'success_url' => route('success',[],true ) . "?session_id={CHECKOUT_SESSION_ID}",
      'cancel_url' => route('cancel'),
    ]);

    return redirect($session->url);
  }

  public function success(){
    return view('paiement.succes');
  }

  public function cancel(){
    return view('paiement.annulation');
  }
}