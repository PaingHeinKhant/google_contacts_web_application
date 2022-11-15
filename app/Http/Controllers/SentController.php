<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSentRequest;
use App\Http\Requests\UpdateSentRequest;
use App\Models\Sent;

class SentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sendData = Sent::all();
        return view('sent.index',compact('sendData'));
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
     * @param  \App\Http\Requests\StoreSentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function show(Sent $sent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function edit(Sent $sent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSentRequest  $request
     * @param  \App\Models\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSentRequest $request, Sent $sent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sent $sent)
    {
        //
    }
}
