<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;
use App\Models\User;

class ITAsset extends Model
{
   use SoftDeletes;
  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
    protected $dates = ['deleted_at'];

    protected $table = "itassets";
	protected $types = ['Laptop' => 'Laptop', 'Mobile' => 'Mobile', 'PC' => 'PC', 'PDA' => 'PDA', 'Keyboard' => 'Keyboard'];

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'owner_id', 'id');
    }
	
	function saveData($request){
		$this->owner_id = $request->get('owner_id');
        $this->name = $request->get('name');
        $this->description = $request->get('description');
        $this->type = $request->get('type');
        $this->purchase_date = $request->get('purchase_date');
        $this->status = $request->get('status');
        $this->save();
	}
	
	function updateData($request,$id){
		$itasset = ITAsset::find($id);
        $itasset->owner_id = $request->get('owner_id');
        $itasset->name = $request->get('name');
        $itasset->description = $request->get('description');
        $itasset->type = $request->get('type');
        $itasset->purchase_date = $request->get('purchase_date');
        $itasset->status = $request->get('status');
        $itasset->save();
	}
	
	function getRow($id){
    	$itasset = ITAsset::with('user')->where('id', $id)->first();
		return $itasset;
	}
	
	function deleteRow($id){
    	ITAsset::find($id)->delete(); // soft deleting scopes
	}
	
	function validate($request){
		$validator = Validator::make($request->all(), [
            'owner_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|max:100',
            'purchase_date' => 'required',
            'status' => 'required|max:50'
        ]);
		if ($validator->fails()) {
			return $validator;
		}
		return false;
	}
	
	function getTypes(){
		return $this->types;
	}
}
