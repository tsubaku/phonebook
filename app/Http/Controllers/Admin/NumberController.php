<?php

namespace App\Http\Controllers\Admin;

use App\Number;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.numbers.index', [
            //'numbers' => Number::paginate(10), //max 10 contact on the page
            'numbers' => Number::all()->sortBy('name'),  //sorted
            'amount_numbers' => Number::count() //amount contacts
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.numbers.create', [
            'number' => [],
            'numbers' => Number::get(),
            'delimiter' => ''
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Number::create($request->all());
        return redirect()->route('admin.number.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Number $number
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Number $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Number $number)
    {
        return view('admin.numbers.edit', [
            'number' => $number,
            'numbers' => Number::get(),
            'delimiter' => '',
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Number $number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Number $number)
    {
        $number->update($request->except('slug'));

        return redirect()->route('admin.number.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Number $number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Number $number)
    {
        $number->delete();

        return redirect()->route('admin.number.index');
    }
}
