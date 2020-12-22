<?php


namespace App\Http\Repositories\Impl;


use App\Http\Repositories\Eloquent\EloquentRepository;
use App\Http\Repositories\StudentRepository;
use App\Models\Student;

class StudentRepositoryImpl extends EloquentRepository implements StudentRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Student::class;
        return $model;
    }
}
