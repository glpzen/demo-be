<?php
/**
 * Created by PhpStorm.
 * User: galip
 * Date: 5/10/20
 * Time: 12:57 AM
 */

namespace App\Repositories\Student;

interface StudentRepositoryInterface{
    public function all();
    public function create($payload);
    public function getStudentIdByAccessCode($accessCode);
    public function guardian($studentId);
}