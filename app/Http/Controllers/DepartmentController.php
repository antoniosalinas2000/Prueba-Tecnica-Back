<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return Department::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45|unique:departments',
            'parent_id' => 'nullable|exists:departments,id',
            'level' => 'required|integer|min:1',
            'employee_count' => 'required|integer|min:1',
            'ambassador_name' => 'nullable|string',
        ]);

        $department = Department::create($request->all());

        return response()->json($department, 201);
    }

    public function show($id)
    {
        $department = Department::findOrFail($id);
        return response()->json($department);
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'name' => 'string|max:45|unique:departments,name,' . $department->id,
            'parent_id' => 'nullable|exists:departments,id',
            'level' => 'integer|min:1',
            'employee_count' => 'integer|min:1',
            'ambassador_name' => 'nullable|string',
        ]);

        $department->update($request->all());

        return response()->json($department);
    }

    public function destroy($id)
    {
        Department::destroy($id);

        return response()->json(null, 204);
    }

    public function subdepartments($id)
    {
        $department = Department::with('subdepartments')->findOrFail($id);
        return response()->json($department->subdepartments);
    }
}
