<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        })->paginate(10);
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

        $contact = new Contact();

        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->company = $request->company;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->birthday = $request->birthday;
        $contact->note = $request->note;

        if($request->hasFile('image')) {
            $newName = uniqid() . "_image." . $request->file('image')->getextension();
            $request->file('image')->storeAs("public", $newName);
            $contact->image = $newName;
        }

        $contact->save();

        return redirect()->route('contact.index')->with('status', $contact->firstName .' is added Successfully' );
    }

    /**
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
        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->company = $request->company;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->birthday = $request->birthday;
        $contact->note = $request->note;

        if($request->hasFile('image')){

            //delete old photo
            Storage::delete("public/".$contact->image);

            // update and upload new photo
            $newName = uniqid()."_image.".$request->file('image')->extension();
            $request->file('image')->storeAs("public",$newName);
            $contact->image = $newName;

        }
        $contact->update();

        return redirect()->route('contact.index');
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

    public function multipleDestroy(Request $request){
        Contact::destroy(collect($request->multipleFormCheck));
        return redirect()->route('contact.index');
    }

}
