<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSendMail;
use App\Mail\ContactAlertMail;
use App\Mail\ContactReplyMail;
use App\Models\Contact;

class ContactsController extends Controller
{
  public function showForm()
  {
    return view('contact.form');
  }

  public function send(Request $request)
  {
    $result = false;

    $request->validate([
      'name' => 'required|max:10',
      'email' => 'required|email',
      'body' => 'required',
    ]);

    $name = $request->name;
    $email = $request->email;
    $body = $request->body;

    $contact = new Contact();
    $contact->name = $name;
    $contact->email = $email;
    $contact->description = $body;
    $result = $contact->save();

    $date = $contact->created_date;

    Mail::to($email)->send(new ContactSendMail($name, $email, $date, $body));

    $request->session()->regenerateToken();

    $admin = config('app.admins');
    $url = $contact->reply_url;
    Mail::to($admin)->send(new ContactAlertMail($name, $email, $body, $url));

    return [
      'result' => $result,
    ];
  }

  public function list()
  {
    return view('contact.list');
  }

  public function getContactsList()
  {
    $contacts = Contact::get();

    return [
      'contacts' => $contacts,
    ];
  }

  public function showReplyForm(Contact $contact)
  {
    return view('contact.reply', [
      'contact' => $contact,
    ]);
  }

  public function reply(Request $request, Contact $contact)
  {
    $result = false;

    $request->validate([
      'reply' => 'required',
    ]);

    $contact->status = true;
    $contact->replied_at = now();
    $contact->editor_id = Auth::id();
    $contact->reply = $request->reply;
    $result = $contact->save();

    $email = $contact->email;
    $name = $contact->name;
    $description = $contact->description;

    Mail::to($email)->send(new ContactReplyMail($name, $description, $contact->reply));

    return [
      'result' => $result,
    ];
  }

  public function destroy(Contact $contact)
  {
    return [
      'result' => $contact->delete(),
    ];
  }
}