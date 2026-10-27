<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = "About Students Management Pro";
        $message = "Welcome from Student Managament System.";

        $name = 'Aung Aung';

        return view('about', compact('name'), [
            'title' => $title,
            'message' => $message,
        ]);
    }
}
