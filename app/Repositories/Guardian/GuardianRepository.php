<?php
/**
 * Created by PhpStorm.
 * User: galip
 * Date: 5/10/20
 * Time: 12:56 AM
 */

namespace App\Repositories\Guardian;


use App\Models\Guardian;

class GuardianRepository implements GuardianRepositoryInterface
{
    public function all()
    {
        return Guardian::all();
    }

    public function create($payload)
    {
        return Guardian::create($payload);
    }
}