<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\upload;

class upController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
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
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|'
        ]);

        $file = $request->file('file');
       
        $name = $file->getClientOriginalName();
        $size = $file->getSize();
        $tujuan = storage_path("app/public/image");
        $fakeName = random_int(10000000, 999999999).".".$file->getClientOriginalExtension();
        $file->move($tujuan, $fakeName);
        upload::create([
            'name' => $name,
            'size' => $size,
            'path' => $tujuan.'/'.$fakeName
        ]);
        return redirect("/");
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
