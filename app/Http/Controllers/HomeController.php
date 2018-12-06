<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Validator;
use App\Contact;
use App\Follower;

class HomeController extends Controller
{

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|min:3|max:190',
            'activity' => 'required|min:3|max:190',
            'phone' => 'numeric|required',
            'email' => 'required|email',
            'file' => 'file|nullable|max:1900',
            'photo' => 'required',
            'cinema' => 'required',
            'gd' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('file'))
        {
            $path = $request->file('file')->store('public');
            $filename = pathinfo($path , PATHINFO_BASENAME);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $activity = $request->input('activity');
        $phone = $request->input('phone');
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->activity = $request->input('activity');
        $contact->phone = $request->input('phone');
        if($request->hasFile('file'))
        {
            $contact->file = $filename;
        }
        $photos = $request->input('photo');
        $cinemas = $request->input('cinema');
        $gds = $request->input('gd');
        $pdf = PDF::loadView('pdf.contact' , compact('name' , 'email' , 'phone' , 'activity' , 'photos' , 'cinemas' , 'gds'));
        $filename = str_random(20).'.pdf';
        $pdf->save(storage_path('app/public/'.$filename));
        $contact->pdf = $filename;
        $contact->save();
        $request->session()->flash('status' , 'contact sent');
        return back();
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'email' => 'required|email|unique:followers,email'
        ]);
        if($validator->fails())
        {
            return \redirect()->back()->withErrors($validator)->withInput();
        }
        $follower = new Follower;
        $follower->email = $request->input('email');
        $follower->save();
        $request->session()->flash('status' , 'you are now subscribed to newsletter');
        return \redirect()->back();
    }

}
