<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $formData;

    /**
     * Create a new message instance.
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Создать новый экземпляр сообщения.
     *
     * @param array $formData Данные формы для передачи в представление
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Form',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.email_form',
            with: ['formData' => $this->formData] // Передача данных формы в представление
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
