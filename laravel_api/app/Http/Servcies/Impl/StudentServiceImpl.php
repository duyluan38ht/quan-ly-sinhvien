<?php


namespace App\Http\Servcies\Impl;


use App\Http\Repositories\StudentRepository;
use App\Http\Servcies\StudentService;

class StudentServiceImpl implements StudentService
{
    protected $studentRepository;


    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAll()
    {
        $students = $this->studentRepository->getAll();

        return $students;
    }

    public function findById($id)
    {
        $student = $this->studentRepository->findById($id);

        $statusCode = 200;
        if (!$student)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'students' => $student
        ];

        return $data;
    }

    public function create($request)
    {
        $student = $this->studentRepository->create($request);

        $statusCode = 201;
        if (!$student)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'students' => $student
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldStudent = $this->studentRepository->findById($id);

        if (!$oldStudent) {
            $newStudent = null;
            $statusCode = 404;
        } else {
            $newStudent = $this->studentRepository->update($request, $oldStudent);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'students' => $newStudent
        ];
        return $data;
    }

    public function destroy($id)
    {
        $student = $this->studentRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($student) {
            $this->studentRepository->destroy($student);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
