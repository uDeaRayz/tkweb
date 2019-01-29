<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DayoffController extends Controller
{

    public function index()
    {
        return view('dayoff.dayoffData');
    }

    public function allow()
    {
        return view('dayoff.allow');
    }

    public function notallow()
    {
        return view('dayoff.notallow');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
