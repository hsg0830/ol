<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AskAlertMail extends Mailable
{
  use Queueable, SerializesModels;

  private $name;
  private $draft;
  private $url;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($name, $draft, $url)
  {
    $this->name = $name;
    $this->draft = $draft;
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
    ->subject('질문이 들어왔습니다.')
    ->view('bbs.mail-alert')
    ->with([
      'name' => $this->name,
      'draft' => $this->draft,
      'url' => $this->url,
    ]);
  }
}