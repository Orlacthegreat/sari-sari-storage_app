<?php

namespace App\Http\Controllers;

use App\Models\Junkfood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JunkfoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $junkfoods = $user->junkfoods;
        return view('junkfoods.index', compact('junkfoods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('junkfoods.create');
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
        $user->junkfoods()->create($request->all());
        return back()->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $junkfood = Junkfood::find($id);

        if(!$junkfood){
            abort(404);
        }
        return view('junkfoods.show', compact('junkfood'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $junkfood = Junkfood::find($id);

        if(!$junkfood){
            abort(404);
        }
        return view('junkfoods.edit', compact('junkfood'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $junkfood = Junkfood::find($id);
        $request->validate([
            'name' => 'string|required',
            'size' => 'required|string',
            'price' => 'required',
            'quantity' => 'required|integer'
        ]);
        $junkfood->update($request->all());
        return redirect("/junkfoods");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $junkfood = Junkfood::find($id);

        if(!$junkfood){
            abort(404);
        }
        $junkfood->delete();
        return redirect("/junkfoods");
    }
}
