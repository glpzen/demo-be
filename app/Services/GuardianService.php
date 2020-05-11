<?php
/**
 * Created by PhpStorm.
 * User: galip
 * Date: 5/10/20
 * Time: 12:48 AM
 */

namespace App\Services;


use App\Repositories\Guardian\GuardianRepositoryInterface;

class GuardianService
{
    private $guardianRepository;

    public function __construct(GuardianRepositoryInterface $guardianRepository)
    {
        $this->guardianRepository = $guardianRepository;
    }

    public function find($id){
        return $this->guardianRepository->find($id);
    }

    public function all(){
        return $this->guardianRepository->all();
    }

    public function allWithStudents(){
        return $this->guardianRepository->allWithStudents();
    }

    public function create($payload){
        return $this->guardianRepository->create($payload);
    }

    public function update($payload, $id){
        return $this->guardianRepository->update($payload, $id);
    }
}