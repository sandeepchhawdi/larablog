<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUs;
use App\Http\Requests\SubscribeUsRequest;
use App\Models\SubscribeUs;

class ContactController extends Controller
{
    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageData = [
            'pageTitle' => trans('larablog.contact.pageTitle'),
            'pageDesc'  => trans('larablog.contact.pageDesc'),
            'title'     => trans('larablog.contact.title'),
            'subtitle'  => trans('larablog.contact.subtitle'),
            'image'     => config('blog.contact_page_image'),
        ];

        return view('blog.pages.contact', $pageData);
    }

    /**
     * Send Contact Email Function via Mail.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactSend(ContactRequest $request)
    {
        $validatedData = $request->validated();
        $contactUs = new ContactUs();
        $contactUs->fill($validatedData);
        $contactUs->save();
        Mail::to(config('blog.contact_email'))->send(new ContactMail($validatedData));
        return back()->withSuccess(trans('forms.contact.messages.sent'));
    }
    
    /**
     * @param \App\Http\Controllers\Request $request
     */
    public function subscribeUs(SubscribeUsRequest $request)
    {
        $email = $request->input('email');
        $record = SubscribeUs::where('email', $email)->first();
        if (!$record) {
            $subscribeUs = new SubscribeUs();
            $subscribeUs->fill(['email' => $email]);
            $subscribeUs->save();
        }
        return response()->json(['success' => 'true']);
    }
}
