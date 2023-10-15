<?php

namespace App\Http\Controllers;
use App\Models\Companies;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('companies.create');
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
            'email' => 'required|email|unique:companies',
            'logo' => 'required|image',
            'website' => 'nullable',
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('companies/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->except('_token');
        $logo = $request->file('logo');
        $new_logo = time().'.'.$request['logo']->getClientOriginalExtension();
        // $logo->move(Config::get('constants.COMPANY_LOGO'),$new_logo);
        $data['logo'] = $new_logo;
        $companies = Companies::create($data);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Companies::find($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::find($id);
        return view('companies.edit', compact('company'));
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
            'email' => 'required|unique:companies,email,'.$id,
            'logo' => 'image',
            'website' => 'nullable',
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('companies/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->except('_token','_method');

        if($request->hasFile('logo')){
        $logo = $request->file('logo');
        $new_logo = time().'.'.$request['logo']->getClientOriginalExtension();
        $logo->move(Config::get('constants.COMPANY_LOGO'),$new_logo);
        $data['logo'] = $new_logo;
        }

        Companies::where('id',$id)->update($data);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Companies::find($id)->delete();

        return back();
    }
}
