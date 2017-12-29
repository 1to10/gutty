<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Muratbsts\Reactable\Traits\Reactable;
class Activity extends Model
{
	protected $table = 'extra_activity';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
	public function employeename($empid){
		
		$emp=Employee::where('emp_id','=',$empid)->first(['emp_name']);
		return $emp->emp_name;
		
	}
   
}
