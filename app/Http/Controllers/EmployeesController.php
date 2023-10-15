<?php

namespace App\Http\Controllers;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::where('role',2)->Desc()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('employees.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'status' => 'required',
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('employees/create')->withErrors($validator)->withInput();
        }

        $data = $request->except('_token');
        $data['role'] = '2';
        $data['password'] = Hash::make('123456');
        $employees = Employees::create($data);
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
        if(isset($employee) && $employee->role == 2){
            return view('employees.show', compact('employee'));
        }
        return redirect()->route('employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::find($id);
        if(isset($employee) && $employee->role == 2){
            return view('employees.edit', compact('employee'));
        }
        return redirect()->route('employees.index');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone_number' => 'required|min:10',
            'status' => 'required',
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('employees/'.$id.'/edit')
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
