<?php

use App\Systemsetting;



Route::get('/', function () {
    try{
	    if(Systemsetting::count()){
	    	return view('login');
	    }else{
	    	return view('bootApp');
	    }
    }catch(Exception $x){
    	return view('installApp');
    }
  

})->name('login');

Route::get('app/redirectLogin', function(){
		return redirect()->to('/')->with('success', 'You can now login!');
})->name('app.redirectLogin');

Route::get('app/systemInt', function(){

	try{
		Artisan::call('migrate');
	}catch(Exception $x){
		return 2;
	}

	try{
		dd(DB::table('users')->count());
	}catch(Exception $xx){
		return 1;
	}

	
})->name('app.systemInt');

Route::post('app/doLogin', 'AppController@doLogin')->name('app.doLogin');
Route::get('app/registerAdmin', 'AppController@registerAdmin')->name('app.registerAdmin');
Route::post('app/doRegister', 'AppController@doRegister')->name('app.doRegister');
Route::get('app/refresh', 'AppController@refresh')->name('app.refresh');
Route::get('app/updated', 'AppController@updated')->name('app.updated');
Route::post('system/store', 'AppController@system_store')->name('system.store');
Route::get('system/refresh', 'AppController@system_refresh')->name('system.refresh');


Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', 'AppController@dashboard')->name('app.dashboard');
    Route::get('app/logout', 'AppController@logout')->name('app.logout');

    //
    Route::get('configure/system', 'ConfigureController@systemUpdate')->name('configure.system');
    Route::get('configure/system/info', 'ConfigureController@systemUpdate')->name('configure.system.info');
	Route::get('app/users', 'UserController@manage')->name('app.users');
	Route::post('users/store', 'UserController@store')->name('users.store');
	Route::get('users/refreshWith', 'UserController@refreshWith')->name('users.refreshWith');
	Route::post('users/edit/{id}', 'UserController@edit')->name('users.edit');
	Route::post('users/update/{id}', 'UserController@update')->name('users.update');

	
	Route::get('configure/roles', 'ConfigureController@manageRoles')->name('configure.roles');
	Route::get('configure/perms', 'ConfigureController@managePerms')->name('configure.perms');
	Route::post('roles/store', 'RolesController@store')->name('roles.store');
	Route::get('roles/permissions', 'RolesController@permissions')->name('roles.permissions');
	Route::post('roles/edit/{id}', 'RolesController@edit')->name('roles.edit');
	Route::post('roles/update/{id}', 'RolesController@update')->name('roles.update');
	Route::post('roles/delete/{id}', 'RolesController@destroy')->name('roles.destroy');
	Route::get('roles/refreshWith', 'RolesController@refreshWith')->name('roles.refreshWith');
	Route::post('roles/permissions/store', 'RolesController@rolePermsStore')->name('roles.permissions.store');
	//
	Route::post('permissions/store', 'PermissionController@store')->name('permissions.store');
	Route::post('permissions/edit/{id}', 'PermissionController@edit')->name('permissions.edit');
	Route::post('permissions/update/{id}', 'PermissionController@update')->name('permissions.update');
	Route::post('permissions/delete/{id}', 'PermissionController@destroy')->name('permissions.destroy');
	Route::get('permissions/refreshWith', 'PermissionController@refreshWith')->name('permissions.refreshWith');
	Route::get('permissions/getAllParents', 'PermissionController@getAllParents')->name('permissions.getAllParents');
	
	

});
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');	
Route::get('/admin', 'HomeController@index');
Route::get('/login', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/users', 'AdminController@user');
Route::get('/addemployee', ['as'=>'employee.create','uses'=>'AdminController@createemployee']);
Route::post('/storeemployee', 'AdminController@storeemployee')->name('store.employee');
Route::get('/employeelist', ['as' => 'employee.list', 'uses' => 'AdminController@allemployee']);
Route::get('employee/edit/{id}', ['as' => 'employee.edit', 'uses' => 'AdminController@editemployee']);
Route::post('employee/update/{id}', ['as' => 'employee.update', 'uses' => 'AdminController@updateemployee']);
Route::get('employee/delete/{id}', ['as' => 'employee.delete', 'uses' => 'AdminController@deleteemployee']);
Route::get('/addevent', ['as'=>'event.create','uses'=>'AdminController@createevent']);
Route::post('/storeevent', 'AdminController@storeevent')->name('store.event');
Route::get('/eventlist', ['as' => 'event.list', 'uses' => 'AdminController@allevent']);
Route::get('event/edit/{id}', ['as' => 'event.edit', 'uses' => 'AdminController@editevent']);
Route::post('event/update/{id}', ['as' => 'event.update', 'uses' => 'AdminController@updateevent']);
Route::get('event/delete/{id}', ['as' => 'event.delete', 'uses' => 'AdminController@deleteevent']);
Route::get('/addnews', ['as'=>'news.create','uses'=>'AdminController@createnews']);
Route::post('/storenews', 'AdminController@storenews')->name('store.news');
Route::get('/newslist', ['as' => 'news.list', 'uses' => 'AdminController@allnews']);
Route::get('news/edit/{id}', ['as' => 'news.edit', 'uses' => 'AdminController@editnews']);
Route::post('news/update/{id}', ['as' => 'news.update', 'uses' => 'AdminController@updatenews']);
Route::get('news/delete/{id}', ['as' => 'news.delete', 'uses' => 'AdminController@deletenews']);
Route::get('/addrecruitment', ['as'=>'recruitment.create','uses'=>'AdminController@createrecruitment']);
Route::post('/storerecruitment', 'AdminController@storerecruitment')->name('store.recruitment');
Route::get('/recruitmentlist', ['as' => 'recruitment.list', 'uses' => 'AdminController@allrecruitment']);
Route::get('recruitment/edit/{id}', ['as' => 'recruitment.edit', 'uses' => 'AdminController@editrecruitment']);
Route::post('recruitment/update/{id}', ['as' => 'recruitment.update', 'uses' => 'AdminController@updaterecruitment']);
Route::get('recruitment/delete/{id}', ['as' => 'recruitment.delete', 'uses' => 'AdminController@deleterecruitment']);
Route::get('/addachievement', ['as'=>'achievement.create','uses'=>'AdminController@createachievement']);
Route::post('/storeachievement', 'AdminController@storeachievement')->name('store.achievement');
Route::get('/achievementlist', ['as' => 'achievement.list', 'uses' => 'AdminController@allachievement']);
Route::get('achievement/edit/{id}', ['as' => 'achievement.edit', 'uses' => 'AdminController@editachievement']);
Route::post('achievement/update/{id}', ['as' => 'achievement.update', 'uses' => 'AdminController@updateachievement']);
Route::get('achievement/delete/{id}', ['as' => 'achievement.delete', 'uses' => 'AdminController@deleteachievement']);
Route::get('/achievementlikelist', ['as' => 'achievementlike.list', 'uses' => 'AdminController@allachievementlike']);
Route::get('/addcompany', ['as'=>'company.create','uses'=>'AdminController@createcompany']);
Route::post('/storecompany', 'AdminController@storecompany')->name('store.company');
Route::get('/companylist', ['as' => 'company.list', 'uses' => 'AdminController@allcompany']);
Route::get('company/edit/{id}', ['as' => 'company.edit', 'uses' => 'AdminController@editcompany']);
Route::post('company/update/{id}', ['as' => 'company.update', 'uses' => 'AdminController@updatecompany']);
Route::get('company/delete/{id}', ['as' => 'company.delete', 'uses' => 'AdminController@deletecompany']);
Route::get('/addcontact', ['as'=>'contact.create','uses'=>'AdminController@createcontact']);
Route::post('/storecontact', 'AdminController@storecontact')->name('store.contact');
Route::get('/contactlist', ['as' => 'contact.list', 'uses' => 'AdminController@allcontact']);
Route::get('contact/edit/{id}', ['as' => 'contact.edit', 'uses' => 'AdminController@editcontact']);
Route::post('contact/update/{id}', ['as' => 'contact.update', 'uses' => 'AdminController@updatecontact']);
Route::get('contact/delete/{id}', ['as' => 'contact.delete', 'uses' => 'AdminController@deletecontact']);
Route::get('/addpreviouscompany', ['as'=>'previouscompany.create','uses'=>'AdminController@createpreviouscompany']);
Route::post('/storepreviouscompany', 'AdminController@storepreviouscompany')->name('store.previouscompany');
Route::get('/previouscompanylist', ['as' => 'previouscompany.list', 'uses' => 'AdminController@allpreviouscompany']);
Route::get('previouscompany/edit/{id}', ['as' => 'previouscompany.edit', 'uses' => 'AdminController@editpreviouscompany']);
Route::post('previouscompany/update/{id}', ['as' => 'previouscompany.update', 'uses' => 'AdminController@updatepreviouscompany']);
Route::get('previouscompany/delete/{id}', ['as' => 'previouscompany.delete','uses' => 'AdminController@deletepreviouscompany']);
Route::get('/addreference', ['as'=>'reference.create','uses'=>'AdminController@createreference']);
Route::post('/storereference', 'AdminController@storereference')->name('store.reference');
Route::get('/referencelist', ['as' => 'reference.list', 'uses' => 'AdminController@allreference']);
Route::get('reference/edit/{id}', ['as' => 'reference.edit', 'uses' => 'AdminController@editreference']);
Route::post('reference/update/{id}', ['as' => 'reference.update', 'uses' => 'AdminController@updatereference']);
Route::get('reference/delete/{id}', ['as' => 'reference.delete','uses' => 'AdminController@deletereference']);
Route::get('/addactivity', ['as'=>'activity.create','uses'=>'AdminController@createactivity']);
Route::post('/storeactivity', 'AdminController@storeactivity')->name('store.activity');
Route::get('/activitylist', ['as' => 'activity.list', 'uses' => 'AdminController@allactivity']);
Route::get('activity/edit/{id}', ['as' => 'activity.edit', 'uses' => 'AdminController@editactivity']);
Route::post('activity/update/{id}', ['as' => 'activity.update', 'uses' => 'AdminController@updateactivity']);
Route::get('activity/delete/{id}', ['as' => 'activity.delete','uses' => 'AdminController@deleteactivity']);
Route::get('/addfacebook', ['as'=>'facebook.create','uses'=>'AdminController@createfacebook']);
Route::post('/storefacebook', 'AdminController@storefacebook')->name('store.facebook');
Route::get('/facebooklist', ['as' => 'facebook.list', 'uses' => 'AdminController@allfacebook']);
Route::get('facebook/edit/{id}', ['as' => 'facebook.edit', 'uses' => 'AdminController@editfacebook']);
Route::post('facebook/update/{id}', ['as' => 'facebook.update', 'uses' => 'AdminController@updatefacebook']);
Route::get('facebook/delete/{id}', ['as' => 'facebook.delete','uses' => 'AdminController@deletefacebook']);
Route::get('/addspecialday', ['as'=>'specialday.create','uses'=>'AdminController@createspecialday']);
Route::post('/storespecialday', 'AdminController@storespecialday')->name('store.specialday');
Route::get('/specialdaylist', ['as' => 'specialday.list', 'uses' => 'AdminController@allspecialday']);
Route::get('specialday/edit/{id}', ['as' => 'specialday.edit', 'uses' => 'AdminController@editspecialday']);
Route::post('specialday/update/{id}', ['as' => 'specialday.update', 'uses' => 'AdminController@updatespecialday']);
Route::get('specialday/delete/{id}', ['as' => 'specialday.delete','uses' => 'AdminController@deletespecialday']);
Route::get('/addclient', ['as'=>'client.create','uses'=>'AdminController@createclient']);
Route::post('/storeclient', 'AdminController@storeclient')->name('store.client');
Route::get('/clientlist', ['as' => 'client.list', 'uses' => 'AdminController@allclient']);
Route::get('client/edit/{id}', ['as' => 'client.edit', 'uses' => 'AdminController@editclient']);
Route::post('client/update/{id}', ['as' => 'client.update', 'uses' => 'AdminController@updateclient']);
Route::get('client/delete/{id}', ['as' => 'client.delete','uses' => 'AdminController@deleteclient']);
Route::get('/addacademic', ['as'=>'academic.create','uses'=>'AdminController@createacademic']);
Route::post('/storeacademic', 'AdminController@storeacademic')->name('store.academic');
Route::get('/academiclist', ['as' => 'academic.list', 'uses' => 'AdminController@allacademic']);
Route::get('academic/edit/{id}', ['as' => 'academic.edit', 'uses' => 'AdminController@editacademic']);
Route::post('academic/update/{id}', ['as' => 'academic.update', 'uses' => 'AdminController@updateacademic']);
Route::get('academic/delete/{id}', ['as' => 'academic.delete','uses' => 'AdminController@deleteacademic']);
Route::get('/addslider', ['as'=>'slider.create','uses'=>'AdminController@createslider']);
Route::post('/storeslider', 'AdminController@storeslider')->name('store.slider');
Route::get('/sliderlist', ['as' => 'slider.list', 'uses' => 'AdminController@allslider']);
Route::get('slider/edit/{id}', ['as' => 'slider.edit', 'uses' => 'AdminController@editslider']);
Route::post('slider/update/{id}', ['as' => 'slider.update', 'uses' => 'AdminController@updateslider']);
Route::get('slider/delete/{id}', ['as' => 'slider.delete','uses' => 'AdminController@deleteslider']);
});