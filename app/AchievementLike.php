<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Muratbsts\Reactable\Traits\Reactable;
class AchievementLike extends Model
{
	protected $table = 'emp_achievement_like';
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
	public function achievementname($id){
		$ach=Achievement::where('id','=',$id)->first(['heading']);
		return $ach->heading;
		
	}
   
}
