<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmation extends Notification
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
        $servicePrice = $this->booking->service->price;
        $serviceName = $this->booking->service->name;
        $bookingDate = $this->booking->date;
        $bookingTime = $this->booking->time;

        return (new MailMessage)
            ->subject('Booking Confirmation - Paw Point')
            ->greeting('Hello ' . $this->booking->name . '!')
            ->line('Your booking has been received and is currently pending confirmation.')
            ->line('**Booking Details:**')
            ->line('- Booking Id: ' . $bookingId)
            ->line('- Service: ' . $serviceName)
            ->line('- Date: ' . $bookingDate)
            ->line('- Time: ' . $bookingTime)
            ->line('- Price: ' . $servicePrice)
            ->line('- Status: Pending')
            ->action('View Your Booking', url('/bookings/' . $this->booking->id))
            ->line('We will notify you once your booking is confirmed.')
            ->line('If you encounter any issues or need more information, kindly contact us')
            ->line('Email: info@pawpoint.com')
            ->line('Phone: +27 72 345 6789')
            ->line('Thank you for choosing Paw Point!');
    }

    public function toArray($notifiable)
    {
        return [
            'booking_id' => $this->booking->id,
            'service' => $this->booking->service->name,
            'price' => $this->booking->service->price,
            'date' => $this->booking->date,
            'time' => $this->booking->time,
        ];
    }
}
