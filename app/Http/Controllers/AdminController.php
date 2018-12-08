<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Category;
use App\Contact;
use App\Customer;
use App\Follower;
use App\Footer;
use App\Photo;
use App\Service;
use App\Social;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Email;
use App\Jobs\SendEmail as Job;

class AdminController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.index' , compact('contacts'));
    }

    public function delete_contact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.deletecontact' , compact('contact'));
    }

    public function destroy_contact(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'contactid' => 'required|integer',
        ]);
        $contact = Contact::findOrFail($request->input('contactid'));
        Storage::delete($contact->pdf);
        $contact->delete();
        return redirect('/admin');
    }

    public function contact_pdf($id)
    {
        $contact= Contact::findOrFail($id);
        return \response()->file('storage/' . $contact->pdf);
    }

    public function contact_file($id)
    {
        $contact= Contact::findOrFail($id);
        return \response()->file('storage/' . $contact->file);
    }


    public function categories()
    {
        $cats = Category::all();
        return view('admin.categories' , compact('cats'));
    }

    public function create_category(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'ar_name' => 'required',
            'en_name' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();

        }
        $cat = new Category;
        $cat->translateOrNew('ar')->name = $request->input('ar_name');
        $cat->translateOrNew('en')->name = $request->input('en_name');
        $cat->save();
        $request->session()->flash('status' , 'category added successfully');
        return back();
    }

    public function edit_category($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.editcategory' , compact('cat'));
    }


    public function update_category(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'categoryid' => 'required|integer',
            'ar_name' => 'required|string',
            'en_name' => 'required|string',
        ]);
        if($validator -> fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        $cat = Category::findOrFail($request->input('categoryid'));
        $cat->translateOrNew('ar')->name = $request->input('ar_name');
        $cat->translateOrNew('en')->name = $request->input('en_name');
        $cat->save();
        $request->session()->flash('status' , 'category updated');
        return redirect('/admin/category');
    }

    public function delete_category($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.deletecategory' , compact('cat'));
    }

    public function destroy_Category(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'categoryid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            $request->session()->flash('status' , 'invalid category id');
            return redirect('/admin/category');
        }
        $cat = Category::findOrFail($request->input('categoryid'));
        if($cat->photos())
        {
            $request->session()->flash('status' , 'cant delte category it has photos');
            return redirect('/admin/category');
        }
        $cat->delete();
        $request->session()->flash('status' , 'category deleted');
        return redirect('/admin/category');
    }

    public function category($categoryid)
    {
        $cat = Category::findOrFail($categoryid);
        $photos = Photo::where('category_id' , $categoryid)->paginate();
        return view('admin.photos' , compact('photos' , 'cat'));
    }


    public function photo($id)
    {
        $photo = Photo::findOrFail($id);
        return view('admin.photo' , compact('photo'));
    }


    public function create_photo(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'photo' => 'required|image|max:1900',
            'categoryid' => 'required|integer',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        $category = Category::findOrFail($request->input('categoryid'));
        if($request->hasFile('photo'))
        {
            $path = $request->file('photo')->store('public');
            $filename = pathinfo($path , PATHINFO_BASENAME);
        }
        else{
            $request->session()->flash('status' , 'need image to upload');
            return \redirect()->back();
        }
        $photo = new Photo;
        $photo->photo = $filename;
        $photo->category_id = $category->id;
        $photo->save();
        $request->session()->flash('status' , 'You added photo to category');
        return redirect()->back();
    }

    public function delete_photo($photoid)
    {
        $photo = Photo::findOrFail($photoid);
        return view('admin.deletephoto' , compact('photo'));
    }

    public function destroy_photo(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'photoid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        $photo = Photo::findOrFail($request->input('photoid'));
        $catid = $photo->category_id;
        Storage::delete($photo->photo);
        $photo->delete();
        $request->session()->flash('status' , 'photo deleted');
        return redirect('/admin/category/'.$catid);
    }

    public function aboutus()
    {
        $abouts = About::paginate(10);
        return view('admin.aboutus', compact('abouts'));
    }

    public function create_about(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'ar_content' => 'required|string',
            'en_content' => 'required|string',
            'pdf' => 'required|file|max:1900',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->hasFile('pdf'))
        {
            $path = $request->file('pdf')->store('public');
            $filename = \pathinfo($path , PATHINFO_BASENAME);
        }

        $about = new About;
        $about->translateOrNew('ar')->content = $request->input('ar_content');
        $about->translateOrNew('en')->content = $request->input('en_content');
        $about->pdf = $filename;
        $about->active = 0;
        $about->save();
        return redirect('/admin/aboutus');
    }

    public function activate_about($id)
    {
        $about = About::findOrFail($id);
        if(About::where('active' , '1')->exists())
        {
            $activeabout = About::where('active' , '1')->first();
            $activeabout->active = 0;
            $activeabout->save();
        }
        $about->active = 1;
        $about->save();
        return redirect()->back();
    }

    public function delete_about($id)
    {
        $about = About::findOrFail($id);
        return view('admin.deleteabout' , compact('about'));
    }

    public function destroy_about(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'aboutid' => 'required|integer',
        ]);
        if($validator->fails())
        {
            $request->session()->flash('status' , 'wrong data to delete');
            return redirect('/admin/aboutus');
        }
        $about = About::findOrFail($request->input('aboutid'));
        Storage::delete($about->pdf);
        $about->delete();
        return redirect('/admin/aboutus');
    
    }


    public function about_pdf($aboutid)
    {
        $about = About::findOrFail($aboutid);
        return response()->file('storage/'.$about->pdf);
    }


    public function get_services()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services' , compact('services'));
    }

    public function create_service(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'ar_title' => 'required|string',
            'en_title' => 'required|string',
            'ar_content' => 'required|string',
            'en_content' => 'required|string',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $service = new Service;
        $service->translateOrNew('ar')->title = $request->input('ar_title');
        $service->translateOrNew('en')->title = $request->input('en_title');
        $service->translateOrNew('ar')->content = $request->input('ar_content');
        $service->translateOrNew('en')->content = $request->input('en_content');
        $service->save();
        $request->session()->flash('status' , 'service created');
        return redirect('/admin/service');
    }

    public function delete_service($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.deleteservice' , compact('service'));
    }

    public function destroy_service(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'serviceid' => 'required|integer', 
        ]);
        if($validator->fails())
        {
            return redirect('/admin/service')->withErrors($validator);
        }
        $service = Service::findOrFail($request->input('serviceid'));
        $service->delete();
        $request->session()->flash('status' , 'Service deleted');
        return redirect('/admin/service');
    }

    public function get_socials()
    {
        $socials = Social::latest()->paginate(10);
        return view('admin.socials' , compact('socials'));
    }

    public function create_social(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'googleplus' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'pinterest' => 'nullable|string',

        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $social = new Social;
        $social->facebook = $request->input('facebook');
        $social->twitter = $request->input('twitter');
        $social->googleplus = $request->input('googleplus');
        $social->instagram = $request->input('instagram');
        $social->pinterest = $request->input('pinterest');
        $social->youtube = $request->input('youtube');
        $social->active = 0;
        $social->save();
        $request->session()->flash('status' , 'social links created');
        return redirect('/admin/social');
    }

    public function edit_social($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.editsocial' , compact('social'));
    }

    public function update_social(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'googleplus' => 'required|string',
            'instagram' => 'required|string',
            'youtube' => 'required|string',
            'pinterest' => 'required|string',
            'socialid' => 'required|integer'
        ]);

        if(!Social::where('id' , $request->input('socialid'))->exists())
        {
            $request->session()->flash('status' , 'invalid data');
            return redirect('/admin/social');
        }
        if($validator->fails())
        {
            return redirect('/admin/social/edit/'.$request->input('socialid'))
            ->withErrors($validator);
        }
        $social = Social::findOrFail($request->input('socialid'));
        $social->facebook = $request->input('facebook');
        $social->twitter = $request->input('twitter');
        $social->googleplus = $request->input('googleplus');
        $social->instagram = $request->input('instagram');
        $social->pinterest = $request->input('pinterest');
        $social->youtube = $request->input('youtube');
        $social->save();
        $request->session()->flash('status' , 'you updated social links');
        return redirect('/admin/social');
    }

    public function delete_social($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.deletesocial' , compact('social'));
    }

    public function destroy_social(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'socialid' => 'required|integer', 
        ]);
        if($validator->fails())
        {
            return redirect('/admin/social')->withErrors($validator);
        }
        $social = Social::findOrFail($request->input('socialid'));
        $social->delete();
        $request->session()->flash('status' , 'social links deleted');
        return redirect('/admin/social');
    }

    public function activate_social($id)
    {
        $social = Social::findOrFail($id);
        if(Social::where('active' , 1)->exists())
        {
            $active = Social::where('active' , 1)->first();
            $active->active = 0;
            $active->save();
        }
        $social->active = 1;
        $social->save();
        return redirect('/admin/social');
    }

    public function get_customers()
    {
        $customers = Customer::latest()->paginate(10);
        return view('admin.customers' , compact('customers'));
    }

    public function create_customer(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|string',
            'photo' => 'required|image|max:1900'
        ]);
        if($validator->fails())
        {
            return \redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('photo'))
        {
            $path = $request->file('photo')->store('public');
            $filename = pathinfo($path , PATHINFO_BASENAME);
        }
        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->photo = $filename;
        $customer->save();
        return redirect('/admin/customer');
    }

    public function delete_customer($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.deletecustomer' , compact('customer'));
    }

    public function destroy_customer(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'customerid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            $request->session()->flash('status' , 'invalid data');
            return redirect('/admin/customer');
        }
        $customer = Customer::findOrFail($request->input('customerid'));
        Storage::delete($customer->photo);
        $customer->delete();
        $request->session()->flash('status' , 'customer deleted');
        return redirect('/admin/customer');
    }

    public function get_followers()
    {
        $followers = Follower::latest()->paginate(20);
        return view('admin.followers' , compact('followers'));
    }

    public function delete_follower($id)
    {
        $follower = Follower::findOrFail($id);
        return view('admin.deletefollower' , compact('follower'));
    }

    public function destroy_follower(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'followerid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            return redirect('/admin/follower');
        }
        $follower = Follower::findOrFail($request->input('followerid'));
        $follower->delete();
        $request->session()->flash('status' , 'you deleted follower');
        return redirect('/admin/follower');
    }

    public function sendmsg(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'body' => 'required|string'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $email = new Email;
        $email->user_id = auth()->user()->id;
        $email->body = $request->input('body');
        $email->save();
        $followers = Follower::all()->pluck('email')->toArray();
        Job::dispatch($email , $followers)->delay(now()->addSeconds(5));
        $request->session()->flash('status' , 'email sent successfully');
        return redirect()->back();
    }


    public function emails()
    {
        $emails = Email::paginate(10);
        return view('admin.emails' , compact('emails'));
    }

    public function delete_email($id)
    {
        $email = Email::findOrFail($id);
        return view('admin.deleteemail' , compact('email'));
    }
    
    public function destroy_email(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'emailid' => 'required|integer'
        ]);
        if($validator->fails())
        {
            $request->session()->flash('status' , 'invalid data');
            return redirect('/admin/email');
        }
        $email = Email::findOrFail($request->input('emailid'));
        $email->delete();
        $request->session()->flash('status' , 'email deleted');
        return redirect('/admin/email');
    }
}
