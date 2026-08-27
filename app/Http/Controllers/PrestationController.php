<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

class PrestationController extends Controller
{
    public function index()
    {
        return Inertia::render('Prestation');
    }
}
