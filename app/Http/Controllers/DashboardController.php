<?php

namespace App\Http\Controllers;

use App\Models\Bloque;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $countTareas = Tarea::all()->count();


        return Inertia::render('Dashboard', ['countTareas' => $countTareas ]);
    }
}
