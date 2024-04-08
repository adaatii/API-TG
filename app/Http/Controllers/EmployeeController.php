<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Requests\Employee\DeleteEmployeeRequest;
use App\Http\Requests\Employee\ListEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee\Employee;

class EmployeeController extends Controller
{
    private $employee;

    function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function createEmployee(CreateEmployeeRequest $request)
    {
        $data = $request->validated();

        return $this->employee->createEmployee($data) ? response()->json(['message' => 'Employee created successfully'], 201) : response()->json(['message' => 'Employee not created'], 400);
    }

    public function getAllEmployees()
    {
        $response = $this->employee->getAllEmployees();
        return $response ? response()->json(['error' => false, 'body' => ['message' => 'Employees found successfully!', 'employees' => $response]], 200) : response()->json(['error' => true, 'body' => ['message' => 'Error finding employees!']], 400);
    }

    public function getEmployee(ListEmployeeRequest $id)
    {
        $response = $this->employee->getEmployee($id);
        return $response ? response()->json(['error' => false, 'body' => ['message' => 'Employee found successfully!', 'employee' => $response]], 200) : response()->json(['error' => true, 'body' => ['message' => 'Error finding employee!']], 400);
    }

    public function updateEmployee(UpdateEmployeeRequest $request)
    {
        $data = $request->validated();

        $response = $this->employee->updateEmployee($data);
        return $response ? response()->json(['message' => 'Employee updated successfully'], 200) : response()->json(['message' => 'Employee not updated'], 400);
    }

    public function deleteEmployee(DeleteEmployeeRequest $request)
    {
        return $this->employee->deleteEmployee($request->validated()['id']) ? response()->json(['message' => 'Employee deleted successfully'], 200) : response()->json(['message' => 'Employee not deleted'], 400);
    }
}
