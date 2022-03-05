<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($client_id=0)
    {
        $employees = Employee::where("client_id", $client_id)->get();
        return view("employees.employees_list")->with(["employees"=>$employees, "client_id"=>$client_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($client_id=0)
    {
        return view("employees.addEmployee")->with("client_id", $client_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data["firstname"] = $request->first_name;
        $data["lastname"] = $request->last_name;
        $data["email"] = $request->email;
        $data["mobile"] = $request->mobile;
        $data["gender"] = $request->gender;
        $data["client_id"] = $request->client_id;
        $result = Employee::insert($data);
        if($result)
        return redirect()->route('employees', $request->client_id)
            ->with('success','You have successfully add employee.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employeeId, $client_id)
    {
        $result = Employee::where("id", $employeeId)->delete();
        if($result)
        return redirect()->route('employees', $client_id)
            ->with('success','Employee deleted successfully.');
    }
}
