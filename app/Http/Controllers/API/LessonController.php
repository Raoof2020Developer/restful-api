<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Resources\Lesson as LessonResource;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lesson = LessonResource::collection(Lesson::all());
        return $lesson->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $lesson = new LessonResource(Lesson::create($request->all()));
        return $lesson->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lesson = new LessonResource(Lesson::findOrFail($id));
        return $lesson->response()->setStatusCode(200, 'Lesson returned successfully!')->header('Additional Header', true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lesson = new LessonResource(Lesson::findOrFail($id));
        $lesson->update($request->all());                                   
    
        return $lesson->response()->setStatusCode(200, 'Lesson updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Lesson::findOrFail($id)->delete();
    
        return 204;
    }
}
