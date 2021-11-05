<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = laporan::all();
        return view('review.index', ['laporan'=>$laporan]);
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
        //
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
        $laporan = laporan::where('id', '=', $id)->get();
        if($laporan[0]->status !=0 ) {
            return redirect('admin/dashboard');
        }
        return view('review.show', ['lapor' => $laporan[0]]);

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

    public function accept($id)
    {

        $lapor = laporan::find($id);
        if($lapor->status != 0) {
            return \redirect('home');
        }
        $lapor->status = 1;
        $lapor->save();
        return \redirect('admin/dashboard');

    }

    public function reject($id)
    {

        $lapor = laporan::find($id);
        if($lapor->status != 0) {
            return \redirect('admin/dashboard');
        }
        $lapor->status = -1;
        $lapor->save();
        return \redirect('admin/dashboard');

    }
}
