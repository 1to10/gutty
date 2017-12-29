<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Muratbsts\Reactable\Traits\Reactable;
class CompleteEvent extends Model
{
	protected $table = 'event_complete_info';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
   
}
