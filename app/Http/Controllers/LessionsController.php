<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Transformer\LessonTransformer;
use Illuminate\Http\Request;

/**
 * Class LessonsController
 * @package App\Http\Controllers
 */
class LessonsController extends ApiController
{

    /**
     * @var LessonTransformer
     */
    protected $lessonTransformer;


    /**
     * LessonsController constructor.
     * @param LessonTransformer $lessonTransformer
     */
    public function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;
        $this->middleware('auth.basic',['only'=>['store','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        if(!$lessons){
            return $this->errorResponse();
        }
        return $this->successResponse($this->lessonTransformer->transformCollection($lessons->toArray()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->get('title') || !$request->get('body') || !$request->get('free'))
        {
            return $this->setErrorStatusCode(422)->errorResponse('validate fails');
        }
        Lesson::create($request->all());
        return $this->setSuccessStatusCode(201)->successResponse('create success');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author yuerengui
     * @description
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        if(!$lesson){
            return $this->errorResponse();
        }
        return $this->successResponse($this->lessonTransformer->transform($lesson));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
