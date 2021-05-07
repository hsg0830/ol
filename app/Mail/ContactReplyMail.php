<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
  use Queueable, SerializesModels;

  private $name;
  private $description;
  private $reply;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($name, $description, $reply)
  {
    $this->name = $name;
    $this->description = $description;
    $this->reply = $reply;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from('admin@kl-lab.org')
      ->subject('문의하신 내용에 대하여 답변 드리겠습니다.')
      ->view('contact.mail-reply')
      ->with([
        'name' => $this->name,
        'description' => $this->description,
        'reply' => $this->reply,
      ]);
  }
}