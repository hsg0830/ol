<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AskReplyNotificationMail extends Mailable
{
  use Queueable, SerializesModels;

  private $name;
  private $url;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($name, $url)
  {
    $this->name = $name;
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
    ->subject('질문에 대한 답변입니다.')
    ->view('bbs.mail-reply')
    ->with([
      'name' => $this->name,
      'url' => $this->url,
    ]);
  }
}