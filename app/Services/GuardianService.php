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

    public function all(){
        return $this->guardianRepository->all();
    }

    public function create($payload){
        return $this->guardianRepository->create($payload);
    }
}