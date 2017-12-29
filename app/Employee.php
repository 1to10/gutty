<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Muratbsts\Reactable\Traits\Reactable;
class Employee extends Model
{
	protected $table = 'emp_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
	
	
   
}
