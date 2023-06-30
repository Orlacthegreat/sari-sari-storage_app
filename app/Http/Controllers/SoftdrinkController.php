<?php

namespace App\Http\Controllers;

use App\Models\Softdrink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoftdrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $softdrinks = $user->softdrinks;
        return view('softdrinks.index',compact('softdrinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('softdrinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'size' => 'required|string',
            'price' => 'required',
            'quantity' => 'required|integer'
        ]);
        $user = Auth::user();
        $user->softdrinks()->create($request->all());
        return back()->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $softdrink = Softdrink::find($id);
        if(!$softdrink){
            abort(404);
        }
        return view('softdrinks.show', compact('softdrink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $softdrink = Softdrink::find($id);
        if(!$softdrink){
            abort(404);
        }
        return view('softdrinks.edit', compact('softdrink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $softdrink = Softdrink::find($id);
        $request->validate([
            'name' => 'string|required',
            'size' => 'required|string',
            'price' => 'required',
            'quantity' => 'required|integer'
        ]);
        $softdrink->update($request->all());
        return redirect('/softdrinks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $softdrink = Softdrink::find($id);
        if(!$softdrink){
            abort(404);
        }
        $softdrink->delete();

        return redirect('/softdrinks');
    }
}
