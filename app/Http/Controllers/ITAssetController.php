<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ITAsset;
use App\User;
use Validator;
use Response;

class ITAssetController extends Controller
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
    public function index(Request $request)
    {
        $itassets = ITAsset::with('user')->orderBy('id','DESC')->paginate(5);
        return view('admin.itassets.index', compact('itassets'))
            ->with('i', ($request->get('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id')->toArray();
        $types = ['Laptop' => 'Laptop', 'Mobile' => 'Mobile', 'PC' => 'PC', 'PDA' => 'PDA', 'Keyboard' => 'Keyboard'];
        return view('admin.itassets.create', compact('users', 'types'));
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
            'owner_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|max:100',
            'purchase_date' => 'required',
            'status' => 'required|max:50'
        ]);

        $itasset = new ITAsset();
        $itasset->owner_id = $request->get('owner_id');
        $itasset->name = $request->get('name');
        $itasset->description = $request->get('description');
        $itasset->type = $request->get('type');
        $itasset->purchase_date = $request->get('purchase_date');
        $itasset->status = $request->get('status');
        $itasset->save();

        session()->flash('message', 'ITAsset created successfully.');
        return redirect()->route('admin.itassets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itasset = ITAsset::with('user')->where('id', $id)->first();
        return view('admin.itassets.show', compact('itasset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itasset = ITAsset::find($id);
        $users = User::pluck('name', 'id')->toArray();
        $types = ['Laptop' => 'Laptop', 'Mobile' => 'Mobile', 'PC' => 'PC', 'PDA' => 'PDA', 'Keyboard' => 'Keyboard'];
        return view('admin.itassets.edit',compact('itasset', 'users', 'types'));
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
            'owner_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|max:100',
            'purchase_date' => 'required',
            'status' => 'required|max:50'
        ]);

        $itasset = ITAsset::find($id);
        $itasset->owner_id = $request->get('owner_id');
        $itasset->name = $request->get('name');
        $itasset->description = $request->get('description');
        $itasset->type = $request->get('type');
        $itasset->purchase_date = $request->get('purchase_date');
        $itasset->status = $request->get('status');
        $itasset->save();

        session()->flash('message', 'ITAsset updated successfully.');
        return redirect()->route('admin.itassets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ITAsset::find($id)->delete(); // soft deleting scopes

        session()->flash('message', 'ITAsset deleted successfully.');
        return redirect()->route('admin.itassets.index');
    }
}
