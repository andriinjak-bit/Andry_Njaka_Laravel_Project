<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Validator;
// use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnArgument;

class FilmController extends Controller
        {

            public function index() 
            {
                $films = Film::all();
                return response()->json([
                    'success' => true,
                    'message' => 'List of all films',
                    'data' => $films
                ], 200);
            }

public function show($id)
    {
        $film = Film::find($id);
        
        if (!$film) {
            return response()->json([
                'success' => false,
                'message' => 'Film not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Film details',
            'data' => $film
        ], 200);
    }



            
            public function store(Request $request){
                
                $validator = Validator::make($request->all(), [
                    'film_id' => 'sometimes|nullable|integer',
                    'Title'=> 'required',
                    'Release_date' => 'required',
                    'Company' => 'required',
                ]);

                if ($validator-> fails()) {
                    return response()-> json([
                    'success' => false,
                    'message' => $validator->errors()],422);
                }

                $film=Film::create(

                            [
                                    // 'film_id' => $request->film_id,
                                    'Title'=> $request->Title,
                                    'Release_date' => $request->Release_date,
                                    'Company' => $request-> Company
                            ]

                    );

                
                return response()->json([
                    'success' => true,
                    'message' => 'Film created successfully',
                    'data'    =>  $film],201);
            }

                        public function update(Request $request, $id) 
            {
                $film = Film::find($id);

                if (!$film) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Film not found'
                    ], 404);
                }

                $validator = Validator::make($request->all(), [
                    'Title' => 'required',
                    'Release_date' => 'required',
                    'Company' => 'required'
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ], 422);
                }

                $film->update($request->only(['Title', 'Release_date', 'Company']));

                return response()->json([
                    'success' => true,
                    'message' => 'Film updated successfully',
                    'data' => $film
                ], 200);
            }

            
            public function destroy(string $id){

                        $film = Film::find($id);

                        if(!$film) {
                            return response()->json([
                                'success' => false,
                                'message' => 'Film not found'
                            ], 404);

                        }

                        $film->delete();

                        return response()->json([
                            'success' => true,
                            'message' => 'Film deleted successfully'
                        ],200);



            }

        }
