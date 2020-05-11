<?php
/**
 * Created by PhpStorm.
 * User: galip
 * Date: 5/10/20
 * Time: 12:56 AM
 */

namespace App\Repositories\Student;


use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    private $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($payload)
    {
        return $this->model->create($payload);
    }

    public function getStudentIdByAccessCode($accessCode){
        $student = $this->model->select('id')->where('guardian_access_code', $accessCode)->firstOrFail();
        return $student->id;
    }

    public function guardian($studentId){
        $student = $this->model->findOrFail($studentId);
        return $student->guardian;
    }
}