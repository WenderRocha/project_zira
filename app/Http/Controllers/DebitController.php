<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDebitRequest;
use App\Http\Requests\UpdateDebitRequest;
use App\Models\Debit;

class DebitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDebitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDebitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function show(Debit $debit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function edit(Debit $debit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDebitRequest  $request
     * @param  \App\Models\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDebitRequest $request, Debit $debit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debit  $debit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debit $debit)
    {
        //
    }
}
