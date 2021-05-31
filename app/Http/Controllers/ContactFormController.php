<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AddContact()
    {
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request)
    {
        Contact::insert
        ([
            'email' => $request -> email,
            'phone' => $request -> phone,
            'address' => $request -> address,
            'created_at' => Carbon::now()
        ]);
        $notification = array
        (
            'message' => 'Contact successfully inserted!',
            'alert-type' => 'success'
        );

        return Redirect() -> route('admin.contact') -> with($notification);
    }

    public function EditContact($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function UpdateContact(Request $request, $id)
    {
        $update = Contact::find($id) -> update
        ([
            'email' => $request -> email,
            'phone' => $request -> phone,
            'address' => $request -> address,
        ]);
        $notification = array
        (
            'message' => 'Contact succesfully updated!',
            'alert-type' => 'info'
        );

        return Redirect() -> route('admin.contact') -> with($notification);
    }

    public function DeleteContact($id)
    {
        $delete = Contact::find($id) -> Delete();

        $notification = array
        (
            'message' => 'Contact successfully deleted!',
            'alert-type' => 'error'
        );
        return Redirect() -> back() -> with($notification);
    }

    public function Contact()
    {
        $contact = DB::table('contacts') -> first();
        return view('pages.contact', compact('contact'));
    }

    public function ContactForm(Request $request)
    {
        ContactForm::insert
        ([
            'name' => $request -> name,
            'email' => $request -> email,
            'subject' => $request -> subject,
            'message' => $request -> message,
            'created_at' => Carbon::now()
        ]);

        $notification = array
        (
            'message' => 'Your message has been sent, thank you!',
            'alert-type' => 'info'
        );
        return Redirect() -> route('contact') -> with($notification);
    }

    public function AdminMessage()
    {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function DeleteMessage($id)
    {
        $delete = ContactForm::find($id) -> delete();
        $notification = array
        (
            'message' => 'Message successfully deleted!',
            'alert-type' => 'error'
        );
        return Redirect() -> back() -> with($notification);
    }
}
