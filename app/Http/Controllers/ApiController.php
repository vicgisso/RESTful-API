<?php

namespace App\Http\Controllers;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $errorStatusCode = 404;

    /**
     * @var int
     */
    protected $successStatusCode = 200;

    /**
     * @return int
     */
    public function getSuccessStatusCode()
    {
        return $this->successStatusCode;
    }


    /**
     * @param $successStatusCode
     * @return $this
     * @author yuerengui
     * @description
     */
    public function setSuccessStatusCode($successStatusCode)
    {
        $this->successStatusCode = $successStatusCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getErrorStatusCode()
    {
        return $this->errorStatusCode;
    }


    /**
     * @param $errorStatusCode
     * @return $this
     * @author yuerengui
     * @description
     */
    public function setErrorStatusCode($errorStatusCode)
    {
        $this->errorStatusCode = $errorStatusCode;
        return $this;
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     * @author yuerengui
     * @description
     */
    public function errorResponse($message = 'Not found')
    {
        return response()->json([
            'status'    =>'failed',
            'errors'    =>[
                'code'      =>$this->getErrorStatusCode(),
                'msg'       =>$message
            ]
        ],$this->getErrorStatusCode());
    }

    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     * @author yuerengui
     * @description
     */
    public function successResponse($data = [], $message = 'success')
    {
        return response()->json([
            'status'    =>$message,
            'code'      =>$this->getSuccessStatusCode(),
            'data'      =>$data,
            'errors'    =>[]
        ],$this->getSuccessStatusCode());
    }

}