<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
      use SoftDeletes;
  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
    protected $dates = ['deleted_at'];

    protected $table = "roles";
}
