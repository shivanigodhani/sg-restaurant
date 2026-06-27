<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $events = Events::where('status', 1)
                    ->orderBy('start_date', 'asc')
                    ->get();

        return view('index', compact('events'));   
    }
}
