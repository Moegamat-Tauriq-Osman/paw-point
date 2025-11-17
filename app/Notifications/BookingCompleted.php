<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingCompleted extends Notification
{

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $bookingId = $this->booking->id;
        $serviceName = $this->booking->service->name;
        $servicePrice = $this->booking->service->price;
        $bookingDate = $this->booking->date;

        return (new MailMessage)
            ->subject('Service Completed - Paw Point')
            ->greeting('Hello ' . $this->booking->name . '!')
            ->line('Your service has been completed.')
            ->line('**Service Details:**')
            ->line('- Booking Id: ' . $bookingId)
            ->line('- Service: ' . $serviceName)
            ->line('- Date: ' . $bookingDate)
            ->line('- Price: ' . $servicePrice)
            ->line('- Status: Completed')
            ->action('View Booking Details', url('/bookings/' . $this->booking->id))
            ->line('We hope you were satisfied with our service!')
            ->line('If you encounter any issues or need more information, kindly contact us')
            ->line('Email: info@pawpoint.com')
            ->line('Phone: +27 72 345 6789')
            ->line('Thank you for choosing Paw Point!');
    }
}
