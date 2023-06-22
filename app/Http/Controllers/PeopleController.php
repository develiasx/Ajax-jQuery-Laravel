<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'Janeiro' => '560',
            'Fevereiro' => '620',
            'Marco' => '400',
            'Abril' => '350',
            'Maio' => '700',
            'Junho' => '1200',
            'Julho' => '2450',
            'Agosto' => '1100',
            'Setembro' => '990',
            'Outubro' => '540',
            'Novembro' => '670',
            'Dezembro' => '400',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $formData = $data['form'];

        return $formData;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
