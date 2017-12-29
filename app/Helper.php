<?php
/**
* change date subscript
*
* @param $number
*/
use App\Permission;
use App\RolePermission;

 function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return 'th';
    else
        return $ends[$number % 10];
}
function get_time_difference($time1, $time2) 
{ 
    $time1 = strtotime("1/1/1980 $time1"); 
    $time2 = strtotime("1/1/1980 $time2"); 
     
    if ($time2 < $time1) 
    { 
        $time2 = $time2 + 86400; 
    } 
     
    return ($time2 - $time1) / 3600; 
     
}
function authpermission()
{
	$name = \Route::currentRouteName();
	$role=Auth::User()->role;
	$permissionid=Permission::where('routename','=',$name)->first();
	$permissioncount=0;
	if(count($permissionid)>0){
	$permission=RolePermission::where('permission_id',$permissionid->id)->where('role_id','=',$role)->get();
	$permissioncount=count($permission);
	}
	return $permissioncount;
	
}
function authmenupermission($route)
{
	
	$name =$route;
	$role=Auth::User()->role;
	$permissionid=Permission::where('routename','=',$name)->first();
	$permissioncount=0;
	if(count($permissionid)>0){
	$permission=RolePermission::where('permission_id',$permissionid->id)->where('role_id','=',$role)->get();
	$permissioncount=count($permission);
	}
	return $permissioncount;
	
}