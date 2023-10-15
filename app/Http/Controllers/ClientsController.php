<?php

namespace App\Http\Controllers;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
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
        $clients = Clients::Desc()->paginate(5);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients.create');
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
            'email' => 'required|email|unique:clients',
            'address' => 'required',
            'city' => 'required',
            'notes' => 'required'
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('clients/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->except('_token');
        $clients = Clients::create($data);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Clients::find($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::find($id);
        return view('clients.edit', compact('client'));
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
            'email' => 'required|email|unique:clients,email,'.$id,
            'address' => 'required',
            'city' => 'required',
            'notes' => 'required'
        ]);

        if (isset($validator) && $validator->fails()) {
            return redirect('clients/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->except('_token','_method');
        Clients::where('id',$id)->update($data);
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clients::find($id)->delete();
        return back();
    }
}
