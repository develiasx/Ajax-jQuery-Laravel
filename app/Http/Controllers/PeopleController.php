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

        $meses = [
            'Janeiro' => '2500',
            'Fevereiro' => '6000',
            'Marco' => '400',
            'Abril' => '570',
            'Maio' => '700',
            'Junho' => '1200',
            'Julho' => '2450',
            'Agosto' => '1100',
            'Setembro' => '800',
            'Outubro' => '540',
            'Novembro' => '670',
            'Dezembro' => '400',
        ];

        $data = [];

        foreach($meses as $key => $value){
            $item = [
                'month' => $key,
                'value' => (int)$value
            ];
            $data[] = $item;
        }

        return view('index',['data' => $data] );
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
