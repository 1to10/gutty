<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Muratbsts\Reactable\Traits\Reactable;
class PreviousCompany extends Model
{
	protected $table = 'emp_previous_company';
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
