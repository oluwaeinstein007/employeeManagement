<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use League\Csv\Reader;
// use League\Csv\Statement;

class EmployeeController extends Controller
{
    //convert csv to json and save in the database
    public function convertCSVToJson(Request $request){
        //validate request to check if file is csv/txt and not more than 2MB
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        //get csv file
        $csvFile = $request->file('csv_file');
        //read csv file
        $csv = Reader::createFromPath($csvFile->getPathname());
        //start from first row
        $csv->setHeaderOffset(0);

        $sanitizedRecords = [];
        foreach ($csv->getRecords() as $record) {
            $sanitizedRecord = [];
            //sanitize keys/header to remove spaces, dots, brackets before saving to respective column in the database
            foreach ($record as $key => $value) {
                $sanitizedKey = str_replace([' ', '.', '(', ')'], ['_', '', '', ''], trim($key));
                $sanitizedRecord[$sanitizedKey] = $value;
            }
            //save sanitized record to database
            $sanitizedRecords[] = $sanitizedRecord;
            Employee::create($sanitizedRecord);
        }

        return response()->json([
            'message' => 'success',
            'data' => $sanitizedRecords
        ], 201);
    }


    //get all employees
    public function getAllEmployees(Request $request){
        //check if request has perPage and is numeric
        if ($request->has('perPage') && is_numeric($request->input('perPage'))) {
            $perPage = $request->input('perPage');
            $employees = Employee::paginate($perPage);
        } else {
            $employees = Employee::all();
        }

        return response()->json([
            'message' => 'success',
            'count' => $employees->count(),
            'data' => $employees
        ], 200);
    }


    //get employee by id
    public function getEmployeeById($id){
        //find employee by id
        $employee = Employee::find($id);

        //check if employee exists then return 404
        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }

        //if employee exists then return employee
        return response()->json([
            'message' => 'success',
            'data' => $employee
        ], 200);
    }


    //update employee by id
    public function updateEmployeeById(Request $request, $id){
        //find employee by id
        $employee = Employee::find($id);

        //check if employee exists then return 404
        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }

        //if employee exists then update employee information provided in appropiate column
        $employee->update($request->all());

        return response()->json([
            'message' => 'success',
            'data' => $employee
        ], 200);
    }


    //delete employee by id
    public function deleteEmployeeById($id){
        //find employee by id
        $employee = Employee::find($id);

        //check if employee exists then return 404
        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found'
            ], 404);
        }

        //if employee exists then delete employee
        $employee->delete();

        return response()->json([
            'message' => 'success: Employee deleted successfully',
            'data' => $employee
        ], 200);
    }
}
