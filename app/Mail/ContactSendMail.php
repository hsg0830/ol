<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendMail extends Mailable
{
  use Queueable, SerializesModels;

  private $name;
  private $email;
  private $body;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($name, $email, $date, $body)
  {
    $this->name = $name;
    $this->email = $email;
    $this->date = $date;
    $this->body = $body;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from('admin@kl-lab.org')
      ->subject('문의내용을 접수하였습니다.')
      ->view('contact.mail-thanks')
      ->with([
        'name' => $this->name,
        'email' => $this->email,
        'date' => $this->date,
        'body' => $this->body,
      ]);
  }
}