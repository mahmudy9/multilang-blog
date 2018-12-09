<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Validator;
use App\Contact;
use App\Follower;
use App\About;
use App\Customer;
use App\Category;
use App\Photo;
use App\Service;
use App\Http\Resources\GalleryResource;
use App\User;

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


    public function index()
    {
        return view('home');
    }


    public function about()
    {
        $about = About::where('active' , 1)->firstOrFail();
        $customers = Customer::all();
        return view('about' , compact('about' , 'customers'));
    }


    public function contactus()
    {
        $user = User::firstOrFail();
        return view('contact' , compact('user'));
    }

    public function gallery()
    {
        $cats = Category::all();
        $datas = [];
        foreach($cats as $cat)
        {
            $datas[] = [ 'id' => $cat->id , 'name' => $cat->name , 'photo' => $cat->photos()->first()->photo];
        }
        // dd($datas);
        return view('gallery' , compact('datas'));
    }


    public function services()
    {
        $services = Service::all();
        return view('services' , compact('services'));
    }

    public function category($id)
    {
        $cat = Category::findOrFail($id);
        $photos = $cat->photos()->get();
        return view('category' , compact('cat' , 'photos'));
    }
}
