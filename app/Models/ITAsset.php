<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'owner_id', 'id');
    }
	
}
