<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::Desc()->paginate(5);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $companies = Companies::get();
      return view('employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',
            'company' => 'required',
            'phone' => 'required',
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('employees/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $employees = Employees::create($request->except('_token'));

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::find($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::get();
        $employee = Employees::find($id);
        return view('employee.edit', compact('companies','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$id,
            'company' => 'required',
            'phone' => 'required',
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('employees/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        Employees::where('id',$id)->update($request->except('_token','_method'));

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::find($id)->delete();

        return back();
    }
}
