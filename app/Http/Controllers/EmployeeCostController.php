<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeCost;

class EmployeeCostController extends Controller
{

    public function index()
    {
        $pageHeading = 'Employee Costs';

        $employeeCosts = EmployeeCost::all();

        return view('employeecosts', compact('pageHeading', 'employeeCosts'));
    }

    public function store(Request $request)
        {
        $this->validate($request, [
            'employee_name' => 'required'
        ]);

        $newEmployee = new EmployeeCost([
            'employee_name' => $request->get('employee_name'),
            'employee_basehourly'=> $request->get('employee_basehourly'),
            'employee_vehiclecost' => $request->get('employee_vehiclecost'),
            'employee_otherweeklycost' => $request->get('employee_otherweeklycost'),
            'employee_phone' => $request->get('employee_phone'),
            'employee_workercomp' => $request->get('employee_workercomp'),
            'employee_cash' => $request->get('employee_cash'),
            'employee_type' => $request->get('employee_type')
        ]);

        $newEmployee->save();
        return back()->with('success', 'Employee added');
    }

    public function edit($pk_employee_id)
    {
        $pageHeading = 'Employee Costs';
        $employeeCosts = EmployeeCost::find($pk_employee_id);

        return view('editlayouts.employeecostedit', compact('employeeCosts', 'pk_employee_id', 'pageHeading'));
    }

    public function update(Request $request, $pk_employee_id)
    {
        $this->validate($request,[
                    'employee_name' => 'required',
                ]);
        
        $employeeCosts = EmployeeCost::find($pk_employee_id);
        $employeeCosts->employee_name = $request->get('employee_name');
        $employeeCosts->employee_basehourly = $request->get('employee_basehourly');
        $employeeCosts->employee_vehiclecost = $request->get('employee_vehiclecost');
        $employeeCosts->employee_otherweeklycost = $request->get('employee_otherweeklycost');
        $employeeCosts->employee_phone = $request->get('employee_phone');
        $employeeCosts->employee_workercomp = $request->get('employee_workercomp');
        $employeeCosts->employee_cash = $request->get('employee_cash');
        $employeeCosts->save();

        return redirect()->route('employeecosts.index')->with('success', 'Employee cost updated');
    }
}