<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index()
    {
        return view('gender.all', [
            "title" => "Gender",
            "gender" => Gender::all()
        ]);
    }
}
