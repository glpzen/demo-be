<?php
/**
 * Created by PhpStorm.
 * User: galip
 * Date: 5/10/20
 * Time: 12:48 AM
 */

namespace App\Services;


use App\Repositories\Student\StudentRepositoryInterface;

class StudentService
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function all(){
        return $this->studentRepository->all();
    }

    public function create($payload){
        return $this->studentRepository->create($payload);
    }

    public function getStudentIdByAccessCode($accessCode){
        return $this->studentRepository->getStudentIdByAccessCode($accessCode);
    }
}