<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class ReleasesController extends Controller
{
    public function index()
    {
        return view('releases');
    }
}
