<?php

namespace App\Http\Controllers;

use App\Lesson;

/**
 * Class LessonController
 * @package App\Api\Controllers
 */
class LessonController extends Controller
{
    public function index()
    {
        return Lesson::all();
    }
}