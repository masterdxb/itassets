<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ITAsset;
use App\Models\User;
use Validator;
use Response;

class ITAssetController extends Controller
{

	private $ITAsset = "";
	private $user = "";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ITAsset $iITAsset,User $user)
    {
		$this->ITAsset = $iITAsset;
		$this->user = $user;
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
		$users = $this->user->getUsernameAndID();
		$types = $this->ITAsset->getTypes();
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
		$validtor = $this->itasset->validate($request);
		if($validtor){
			$errors = $validtor->messages();
			$users = $this->user->getUsernameAndID();
			$types = $this->ITAsset->getTypes();
			return view('admin.itassets.create', compact('errors','users','types'));
		}
        $this->ITAsset->saveData($request);

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
        $itasset = $this->ITAsset->getRow($id);
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
        $itasset = $this->ITAsset->getRow($id);
		$users = $this->user->getUsernameAndID();
		$types = $this->ITAsset->getTypes();
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
		$validtor = $this->ITAsset->validate($request);
		if($validtor){
			$errors = $validtor->messages();
			$users = $this->user->getUsernameAndID();
			$types = $this->ITAsset->getTypes();
			return view('admin.itassets.create', compact('errors','users','types'));
		}
		$this->ITAsset->updateData($request,$id);
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
        $this->ITAsset->deleteRow($id);
        session()->flash('message', 'ITAsset deleted successfully.');
        return redirect()->route('admin.itassets.index');
    }
}
