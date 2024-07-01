<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Models\Protection;
use App\Models\Car;


class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct( private $conducteur, private $reservation)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[DriveEase] Confirmation de réservation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $protection = Protection::find($this->reservation->idProtection);
        $voiture = Car::find($this->reservation->idCar);

        //Date et nbJrs 
        $dateDepartCarbon = Carbon::parse($this->reservation->dateDepart);
        $dateRetourCarbon = Carbon::parse($this->reservation->dateRetour);
        $dateDepartDt = $dateDepartCarbon->format('d-m-Y H:i');
        $dateRetourDt = $dateRetourCarbon->format('d-m-Y H:i');
        $nbJrs = max(1, $dateRetourCarbon->diffInDays($dateDepartCarbon));

        return new Content(
            view: 'emails.emailReservation',
            with:[
                'conducteur' => $this->conducteur,
                'reservation' => $this->reservation,
                'options' => $this->reservation->options,
                'voiture' => $voiture,
                'protection' => $protection,
                'nbJrs' => $nbJrs,
                'dateDepartDt' => $dateDepartDt,
                'dateRetourDt' => $dateRetourDt,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
