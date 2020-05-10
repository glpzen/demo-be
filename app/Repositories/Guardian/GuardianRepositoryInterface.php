<?php
/**
 * Created by PhpStorm.
 * User: galip
 * Date: 5/10/20
 * Time: 12:57 AM
 */

namespace App\Repositories\Guardian;

interface GuardianRepositoryInterface{
    public function all();
    public function create($payload);
}