<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredAlertMail extends Mailable
{
  use Queueable, SerializesModels;

  private $user;
  private $usersMount;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($user, $usersMount)
  {
    $this->user = $user;
    $this->usersMount = $usersMount;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->from('admin@kl-lab.org')
      ->subject('새 회원이 등록하였습니다.')
      ->view('users.mail-registered')
      ->with([
        'user' => $this->user,
        'usersMount' => $this->usersMount,
      ]);
  }
}