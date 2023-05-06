<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'employee_type' => 'required|in:' . implode(',', array_keys(Employee::$employeeTypes)),
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', '従業員情報が登録されました');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'employee_type' => 'required|in:' . implode(',', array_keys(Employee::$employeeTypes)),
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($data);

        return redirect('/employees')->with('success', 'Employee updated.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted.');
    }
}