<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }


/*******  ad49a04f-f14d-4766-aca6-4a3182e8dad3  *******/    public function store()
    {
        return post::create(request()->all());
    }


    /**
     * Store a newly created resource in storage.
     */


    public function show(string $id)
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
