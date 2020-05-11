<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guardian\GuardianRequest;
use App\Http\Resources\GuardianResource;
use App\Http\Resources\GuardianStudentResource;
use App\Services\GuardianService;
use App\Services\StudentService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class GuardianController extends Controller
{
    private $guardianService;
    private $studentService;

    public function __construct(GuardianService $guardianService, StudentService $studentService)
    {
        $this->guardianService = $guardianService;
        $this->studentService = $studentService;
    }

    public function index(){
        $guardians = $this->guardianService->allWithStudents();

        $data = [
            'status' => true,
            'data' => [
                'guardians' => GuardianStudentResource::collection($guardians)
            ],
            'err' => null
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    public function store(GuardianRequest $request){
        $studentId = $this->studentService->getStudentIdByAccessCode($request->post('access_code'));

        $guardian = $this->guardianService->create([
            'student_id' => $studentId,
            'name' => $request->post('name'),
            'surname' => $request->post('surname'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'access_code' => $request->post('access_code'),
        ]);

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

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function update(GuardianRequest $request, $id){

        $this->guardianService->update([
            'name' => $request->post('name'),
            'surname' => $request->post('surname'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password'))
        ], $id);

        $data = [
            'status' => true,
            'data' => null,
            'err' => null
        ];

        return response()->json($data, Response::HTTP_NO_CONTENT);
    }

    public function edit($id){
        $guardian = $this->guardianService->find($id);

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
