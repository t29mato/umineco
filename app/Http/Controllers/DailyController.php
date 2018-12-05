<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyController extends Controller
{
    public function index()
    {
        return view('daily.index');
    }

    public function create()
    {
        return view('daily.create');
    }

}
