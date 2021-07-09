<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class CheckController extends Controller
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

    protected function validator(array $data)
    {
        //
        return Validator::make($data,[
            ''
        ]);
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
    public function compare(Request $request)
    {
        $similiarty=0;
        similar_text($request->teks1,$request->teks2,$similiarty);
        $request->session()->put('exist', true);
        if($similiarty<=30){
            $request->session()->flash('alert-success', 'Persentase kemiripan data adalah '.number_format((float)$similiarty, 2, '.', '').'%');
        }
        else if (30<$similiarty && $similiarty<=70){
            $request->session()->flash('alert-warning', 'Persentase kemiripan data adalah '.number_format((float)$similiarty, 2, '.', '').'%');
        }
        else if(70<$similiarty){
            $request->session()->flash('alert-danger', 'Persentase kemiripan data adalah '.number_format((float)$similiarty, 2, '.', '').'%');
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
