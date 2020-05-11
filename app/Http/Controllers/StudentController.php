<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuardianResource;
use App\Http\Resources\StudentResource;
use App\Services\StudentService;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(){
        $students = $this->studentService->all();

        $data = [
            'status' => true,
            'data' => [
                'students' => StudentResource::collection($students)
            ],
            'err' => null
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    public function getGuardian($studentId){
        $guardian = $this->studentService->guardian($studentId);

        if($guardian){
            $guardian = new GuardianResource($guardian);
        }

        $data = [
            'status' => true,
            'data' => [
                'guardian' => $guardian
            ],
            'err' => null
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}
