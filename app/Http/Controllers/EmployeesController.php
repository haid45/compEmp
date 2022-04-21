<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index(){
        $data['employees'] = Employee::paginate(7);
        return view('employees.index',$data);
    }

    public function show(Employee $employee){
        $data['employee'] = $employee;
        return view('employees.show',$data);
    }

    public function create(){
        $data['companies'] = Company::get();
        return view('employees.create',$data);
    }

    public function store(EmployeeStoreRequest $request){
        Employee::create($request->except(['_token','_method']));
        return redirect(route('employees.index'))->with('success_message','Employee has been added.');
    }

    public function edit(Employee $employee){
        $data['employee'] = $employee;
        $data['companies'] = Company::get();
        return view('employees.edit',$data);
    }

    public function update(Employee $employee,EmployeeStoreRequest $request){
        $employee->update($request->except(['_token','_method']));
        return redirect(route('employees.index'))->with('success_message','The selected employee has been updated.');
    }

    public function destroy($id){
        Employee::destroy($id);
        return back()->with('success_message','The selected employee has been removed.');
    }
}
