<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::resource('employees', \App\Http\Controllers\EmployeeController::class)
    ->except('show')
    ->middleware('auth');
Route::resource('positions', \App\Http\Controllers\PositionController::class)
    ->except('show')
    ->middleware('auth');


Route::get('/tree/{id}', function ($id) {
    if ($id == 0){
        $employees = \App\Models\Employee::withDepth()->get()->toTree();
    }else{
        $employees = \App\Models\Employee::withDepth()->descendantsAndSelf($id)->toTree();
    }
//    dd(Employee::factory(['parent_id' => null])->count(1)->makeOne());
    $traverse = function ($employees, $prefix = '-') use (&$traverse) {
        foreach ($employees as $employee) {
            echo PHP_EOL.$prefix.' '.$employee->name . '[id='.$employee->id.'] ['.$employee->depth.']';
            $traverse($employee->children, $prefix.'-');
        }
    };
    echo '<pre>';
    $traverse($employees);
    echo '</pre>';
});
