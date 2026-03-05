<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
        {

            public function index() {
                $films = Film::all();
                return response()->json($films);
            }

        }
