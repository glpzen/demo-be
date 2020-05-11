<?php
/**
 * Created by PhpStorm.
 * User: galip
 * Date: 5/10/20
 * Time: 12:57 AM
 */

namespace App\Repositories\Guardian;

interface GuardianRepositoryInterface{
    public function find($id);
    public function all();
    public function allWithStudents();
    public function create($payload);
    public function update($payload, $id);

}