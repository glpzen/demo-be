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
    public function all()
    {
        return Student::all();
    }

    public function create($payload)
    {
        return Student::create($payload);
    }

    public function getStudentIdByAccessCode($accessCode){
        $student = Student::select('id')->where('guardian_access_code', $accessCode)->firstOrFail();
        return $student->id;
    }
}