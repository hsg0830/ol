<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAlertMail extends Mailable
{
  use Queueable, SerializesModels;

  private $name;
  private $email;
  private $body;
  private $url;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($name, $email, $body, $url)
  {
    $this->name = $name;
    $this->email = $email;
    $this->body = $body;
    $this->url = $url;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from('admin@kl-lab.org')
      ->subject('문의가 들어왔습니다.')
      ->view('contact.mail-alert')
      ->with([
        'name' => $this->name,
        'email' => $this->email,
        'body' => $this->body,
        'url' => $this->url,
      ]);
  }
}