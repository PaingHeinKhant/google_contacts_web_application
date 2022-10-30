<?php

namespace App\Http\Controllers;

use App\Exports\ExportContact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Imports\ImportContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::when(request('keyword'),function ($q){
            $keyword= request('keyword');
            $q->orWhere("firstName","like","%$keyword")
                ->orWhere("lastName","like","%$keyword");
        })
            ->where("user_id",Auth::id())
            ->paginate(10);
        return view('Contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
//        return $request;

        $contact = new Contact();

        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->company = $request->company;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->birthday = $request->birthday;
        $contact->note = $request->note;
        $contact->user_id = Auth::id();

        if($request->hasFile('image')) {
            $newName = uniqid() . "_image." . $request->file('image')->getextension();
            $request->file('image')->storeAs("public", $newName);
            $contact->image = $newName;
        }

        $contact->save();

        return redirect()->route('contact.index')->with('status', $contact->firstName .' is added Successfully' );
    }

    /**l
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('Contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('Contact.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {

//        return $request;
        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->company = $request->company;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->birthday = $request->birthday;
        $contact->note = $request->note;
        $contact->user_id = Auth::id();

        if($request->hasFile('image')){

            //delete old photo
            Storage::delete("public/".$contact->image);

            // update and upload new photo
            $newName = uniqid()."_image.".$request->file('image')->extension();
            $request->file('image')->storeAs("public",$newName);
            $contact->image = $newName;

        }
        $contact->update();

        return redirect()->route('contact.index')->with('status', $contact->firstName .' is updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
//        return $contact;
        $contact->delete();
        return redirect()->route('contact.index')->with('status', $contact->firstName .' is deleted Successfully' );
    }

}
