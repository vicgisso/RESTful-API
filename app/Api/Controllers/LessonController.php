<?php

namespace App\Api\Controllers;

use App\Api\Transformer\LessonTransformer;
use App\Lesson;

class LessonController extends BaseController
{
    protected $lessonTransformer;

    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }

    public function index()
    {
        $lessons = Lesson::all();
        if (!$lessons) {
            return $this->errorResponse();
        }
        return $this->response->collection($lessons,new LessonTransformer());
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return $this->response->errorNotFound('lesson not found');
        }
        return $this->response->item($lesson,new LessonTransformer());
    }
}