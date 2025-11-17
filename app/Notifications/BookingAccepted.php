<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingAccepted extends Notification
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
        $bookingTime = $this->booking->time;

        return (new MailMessage)
            ->subject('Booking Confirmed - Paw Point')
            ->greeting('Hello ' . $this->booking->name . '!')
            ->line('Your booking has been confirmed.')
            ->line('**Booking Details:**')
            ->line('- Booking Id: ' . $bookingId)
            ->line('- Service: ' . $serviceName)
            ->line('- Date: ' . $bookingDate)
            ->line('- Time: ' . $bookingTime)
            ->line('- Price: ' . $servicePrice)
            ->line('- Status: Confirmed')
            ->action('View Your Booking', url('/bookings/' . $this->booking->id))
            ->line('We look forward to seeing you!')
            ->line('If you encounter any issues or need more information, kindly contact us')
            ->line('Email: info@pawpoint.com')
            ->line('Phone: +27 72 345 6789')
            ->line('Thank you for choosing Paw Point!');
    }
}
