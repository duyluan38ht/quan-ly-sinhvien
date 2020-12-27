<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupService;

    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }

    public function index()
    {
        $groups = $this->groupService->getAll();

        return response()->json($groups, 200);
    }

    public function show($id)
    {
        $dataStudent = $this->studentService->findById($id);

        return response()->json($dataStudent['students'], $dataStudent['statusCode']);
    }

    public function store(StudentRequest $request)
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

    public function search($key)
    {
        $students = DB::table('students')->where('name','like','%'.$key.'%')->get();
        return response()->json($students,200);
    }
}
