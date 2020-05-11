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
    private $model;

    public function __construct(Guardian $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function allWithStudents()
    {
        return $this->model->with('student')->get();
    }

    public function create($payload)
    {
        return $this->model->create($payload);
    }

    public function update($payload, $id)
    {
        $this->model->find($id)->update($payload);
    }
}