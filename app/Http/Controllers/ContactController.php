<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => "required|email|unique:contacts",
            'name' => "required",
            'phone_number' => "required|max:9|min:9|numeric",
            'title' => "required",
            'message' => "required",
        ]);

        $contact = new Contact();
        $contact->email=$request->email;
        $contact->name=$request->name;
        $contact->phone_number=$request->phone_number;
        $contact->title=$request->title;
        $contact->message=$request->message;
        $contact->save();

        return response("Criado com sucesso",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return $contact;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'email' => "required|email|unique:contacts",
            'name' => "required",
            'phone_number' => "required|max:9|min:9|numeric",
            'title' => "required",
            'message' => "required",
        ]);

        $contact->email=$request->email;
        $contact->name=$request->name;
        $contact->phone_number=$request->phone_number;
        $contact->title=$request->title;
        $contact->message=$request->message;
        $contact->save();

        return response("Editado com sucesso",204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->email);
        return response("Apagado com sucesso", 202);
    }
}
