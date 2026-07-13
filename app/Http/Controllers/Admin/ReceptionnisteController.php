<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ReceptionnisteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receptionnistes = User::where('role_id', 4)->get();
        return view('admin.receptionniste.index', compact('receptionnistes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.receptionniste.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => 4,
        ]);

        return redirect()->route('admin.receptionnistes.index')->with('success', 'Réceptionniste créée avec succès');
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
        $receptionniste = User::find($id);
        $receptionniste->delete();
        return redirect()->route('admin.receptionnistes.index')->with('danger', 'Réceptionniste supprimée avec succès');
    }
}
