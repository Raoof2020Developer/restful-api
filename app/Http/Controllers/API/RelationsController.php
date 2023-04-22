<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userLessons($id) {
        $user = User::findOrFail($id)->lessons;
        $fields = array();
        $filtered = array();
        foreach($user as $lesson) {
            $fields['Ref'] = $lesson->id;
            $fields['Title'] = $lesson->title;
            $fields['Content'] = $lesson->body;
            $filtered[] = $fields;
        }

        return Response::json([
            'data' => $filtered
        ], 200);

    }

    public function lessonTags($id) {
        $lesson = Lesson::findOrFail($id)->tags;
        $fields = array();
        $filtered = array();
        foreach($lesson as $tag) {
            $fields['Name'] = $tag->name;
            $filtered[] = $fields;
        }

        return Response::json([
            'data' => $filtered
        ], 200);
    } 

    public function tagLessons($id) {
        $tag = Tag::findOrFail($id)->lessons;
        $fields = array();
        $filtered = array();
        foreach($tag as $lesson) {
            $fields['Title'] = $lesson->title;
            $fields['Content'] = $lesson->body;
            $filtered[] = $fields;
        }

        return Response::json([
            'data' => $filtered
        ], 200);
    }

}
