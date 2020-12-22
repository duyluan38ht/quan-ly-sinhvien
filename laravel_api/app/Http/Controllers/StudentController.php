<?php

namespace App\Http\Controllers;

use App\Http\Servcies\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students = $this->studentService->getAll();

        return response()->json($students, 200);
    }

    public function show($id)
    {
        $dataStudent = $this->studentService->findById($id);

        return response()->json($dataStudent['students'], $dataStudent['statusCode']);
    }

    public function store(Request $request)
    {
        $dataStudent = $this->studentService->create($request->all());

        return response()->json($dataStudent['students'], $dataStudent['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataStudent = $this->studentService->update($request->all(), $id);

        return response()->json($dataStudent['students'], $dataStudent['statusCode']);
    }

    public function destroy($id)
    {
        $dataStudent = $this->studentService->destroy($id);

        return response()->json($dataStudent['message'], $dataStudent['statusCode']);
    }
}
