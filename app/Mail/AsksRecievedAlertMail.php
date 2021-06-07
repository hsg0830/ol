<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AsksRecievedAlertMail extends Mailable
{
  use Queueable, SerializesModels;

  private $name;
  private $date;
  private $draft;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($name, $date, $draft)
  {
    $this->name = $name;
    $this->date = $date;
    $this->draft = $draft;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from('admin@kl-lab.org')
      ->subject('질문을 접수하였습니다.')
      ->view('bbs.mail-thanks')
      ->with([
        'name' => $this->name,
        'date' => $this->date,
        'draft' => $this->draft,
      ]);
  }
}