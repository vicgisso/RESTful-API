<?php

namespace App\Api\Controllers;

use App\Api\Transformer\LessonTransformer;
use App\Lesson;

/**
 * Class LessonController
 * @package App\Api\Controllers
 */
class LessonController extends BaseController
{
    /**
     * @var LessonTransformer
     */
    protected $lessonTransformer;

    /**
     * LessonController constructor.
     * @param LessonTransformer $lessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
    }

    /**
     * @return \Dingo\Api\Http\Response|\Illuminate\Http\JsonResponse
     * @author yuerengui
     * @description
     */
    public function index()
    {
        $lessons = Lesson::all();
        if (!$lessons) {
            return $this->errorResponse();
        }
        return $this->response->collection($lessons,new LessonTransformer());
    }

    /**
     * @param $id
     * @return \Dingo\Api\Http\Response|void
     * @author yuerengui
     * @description
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return $this->response->errorNotFound('lesson not found');
        }
        return $this->response->item($lesson,new LessonTransformer());
    }
}