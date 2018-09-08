<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuthScope;
use Validator;
use Response;

class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scopes = AuthScope::orderBy('id','DESC')->paginate(5);
        return view('admin.scopes.index', compact('scopes'))
            ->with('i', ($request->get('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scopes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|max:255',
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|max:50'
        ]);

        $scope = new AuthScope();
        $scope->slug = $request->get('slug');
        $scope->name = $request->get('name');
        $scope->description = $request->get('description');
        $scope->status = $request->get('status');
        $scope->save();

        session()->flash('message', 'Scope created successfully.');
        return redirect()->route('admin.scopes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scope = AuthScope::find($id);
        return view('admin.scopes.show',compact('scope'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scope = AuthScope::find($id);
        return view('admin.scopes.edit',compact('scope'));
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
        $this->validate($request, [
            'slug' => 'required|max:255',
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|max:50'
        ]);

        $scope = AuthScope::find($id);
        $scope->slug = $request->get('slug');
        $scope->name = $request->get('name');
        $scope->description = $request->get('description');
        $scope->status = $request->get('status');
        $scope->save();

        session()->flash('message', 'Scope updated successfully.');
        return redirect()->route('admin.scopes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AuthScope::find($id)->delete(); // soft deleting scopes

        session()->flash('message', 'Scope deleted successfully.');
        return redirect()->route('admin.scopes.index');
    }
}
