<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('employee')->group(function () {

    //endpoints to convert csv to json and save in the database
    Route::post('/', [EmployeeController::class, 'convertCSVToJson']);
    //endpoints to get all employees
    Route::get('/', [EmployeeController::class, 'getAllEmployees']);
    //endpoints to get employee by id
    Route::get('/{id}', [EmployeeController::class, 'getEmployeeById']);
    //endpoints to update employee by id
    Route::put('/{id}', [EmployeeController::class, 'updateEmployeeById']);
    //endpoints to delete employee by id
    Route::delete('/{id}', [EmployeeController::class, 'deleteEmployeeById']);

});
