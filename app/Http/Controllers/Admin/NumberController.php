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
            'numbers' => Number::all()->sortBy('name'),  //sorted
            'amount_numbers' => Number::count()                 //amount contacts
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
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, Number::getRules());  // Validate
        Number::create($request->all());                // Validation successful -> create number

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
     * @param Number $number
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Number $number)
    {
        return view('admin.numbers.edit', [
            'number' => $number,
            'numbers' => Number::get(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Number $number
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Number $number)
    {
        /*
        $number->update($request->all());
        */

        $this->validate($request, $number->getUpdateRules());   // Validate
        $number->update($request->input());                     // Validation successful -> update number

        return redirect()->route('admin.number.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Number $number
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Number $number)
    {
        $number->delete();

        return redirect()->route('admin.number.index');
    }
}
