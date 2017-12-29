<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\User;
use App\Employee;
use App\Event;
use App\CompleteEvent;
use App\News;
use App\Recruitment;
use App\Achievement;
use App\AchievementLike;
use App\CurrentCompany;
use App\EmergencyContact;
use App\PreviousCompany;
use App\Reference;
use App\Activity;
use App\Facebook;
use App\Specialday;
use App\Client;
use App\Academic;
use App\RolePermission;
use App\Permission;
use App\Slider;
use File;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Auth::user();
		$contact=count(Contact::get());
		dd($contact);
		
        return view('admin.home',compact('data'));
    }
	
    public function user()
    {
        $data = User::where('id', '!=', Auth::id())->get();
        return view('admin.user',compact('data'));
    }
    public function createemployee()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		return view('admin.createemployee');	
    }
    public function storeemployee(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        Employee::create($input);
        Session::flash('flash_message', 'Category successfully added!');
        return redirect()->back();
    }

    public function allemployee()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $employee = Employee::get();

        return view('admin.employee',compact('employee'));
    }
    public function editemployee($id)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
        $categoryByid = Employee::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createemployee',compact('categoryByid'));
    }
    public function updateemployee($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $employee = Employee::findOrFail($id);

        $this->validate($request, [
            'emp_name' => 'required'
        ]);
        $input = $request->all();
        $employee->fill($input)->save();

        Session::flash('flash_message', 'Employee successfully Updated!');

        return redirect()->back();
    }
    public function deleteemployee($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
        $employee = Employee::find($id);
        $employee->destroy($id);
        Session::flash('flash_message', 'Employee Deleted Successfully!');
        return redirect()->back();
    }
	 public function createevent()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        return view('admin.createevent');
    }
    public function storeevent(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        Event::create($input);
        Session::flash('flash_message', 'Event successfully added!');
        return redirect()->back();
    }

    public function allevent()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $event = Event::get();

        return view('admin.event',compact('event'));
    }
    public function editevent($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = Event::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createevent',compact('categoryByid'));
    }
    public function updateevent($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $event = Event::findOrFail($id);
		$starttime = date("H:i", strtotime($request->event_start_time));
		$endtime = date("H:i", strtotime($request->event_end_time));
		$diff_in_hours =  get_time_difference($starttime,$endtime);
        $this->validate($request, [
            'event_name' => 'required'
        ]);
        $input = $request->all();
        $event->fill($input)->save();
		if($request->status==0){
		$completeevent=CompleteEvent::where('event_id','=',$request->id)->first();
		if(isset($completeevent)){
		$completeevent->destroy($completeevent->id);
		}
		$input1['event_id']=$request->id;
		$input1['event_name']=$request->event_name;
		$input1['event_description']=$request->event_description;
		$input1['event_banner']=$request->banner;
		$input1['total_time']=$diff_in_hours;
		CompleteEvent::create($input1);	
		}
		if($request->status==1){
		$completeevent=CompleteEvent::where('event_id','=',$request->id)->first();
		if(isset($completeevent)){
		$completeevent->destroy($completeevent->id);
		}
		}
        Session::flash('flash_message', 'Event successfully Updated!');
        return redirect()->back();
    }
    public function deleteevent($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$completeevent=CompleteEvent::where('event_id','=',$request->id)->first();
		if(isset($completeevent)){
		$completeevent->destroy($completeevent->id);
		}
        $event = Event::find($id);
        $event->destroy($id);
        Session::flash('flash_message', 'Employee Deleted Successfully!');
        return redirect()->back();
    }
    public function createnews()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        return view('admin.createnews');
    }
    public function storenews(Request $request)
    {
		$input = $request->all();
        News::create($input);
        Session::flash('flash_message', 'News successfully added!');
        return redirect()->back();
    }

    public function allnews()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $news = News::get();

        return view('admin.news',compact('news'));
    }
    public function editnews($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = News::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createnews',compact('categoryByid'));
    }
    public function updatenews($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $news = News::findOrFail($id);
        $input = $request->all();
        $news->fill($input)->save();

        Session::flash('flash_message', 'News successfully Updated!');

        return redirect()->back();
    }
    public function deletenews($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $news = News::find($id);
        $news->destroy($id);
        Session::flash('flash_message', 'News Deleted Successfully!');
        return redirect()->back();
    }	
	
	 public function createrecruitment()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        return view('admin.createrecruitment');
    }
    public function storerecruitment(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        Recruitment::create($input);
        Session::flash('flash_message', 'News successfully added!');
        return redirect()->back();
    }

    public function allrecruitment()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $recruitments = Recruitment::get();

        return view('admin.recruitment',compact('recruitments'));
    }
    public function editrecruitment($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = Recruitment::findOrFail($id);
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createrecruitment',compact('categoryByid'));
    }
    public function updaterecruitment($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $recruitment = Recruitment::findOrFail($id);
        $input = $request->all();
        $recruitment->fill($input)->save();

        Session::flash('flash_message', 'Recruitment successfully Updated!');

        return redirect()->back();
    }
    public function deleterecruitment($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $recruitment = Recruitment::find($id);
        $recruitment->destroy($id);
        Session::flash('flash_message', 'Recruitment Deleted Successfully!');
        return redirect()->back();
    }

     public function createachievement()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createachievement',compact('employess'));
    }
    public function storeachievement(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
		$empname=Employee::where('emp_id','=',$request->emp_id)->first(['emp_name']);
		$input['emp_name']=$empname->emp_name;
        Achievement::create($input);
        Session::flash('flash_message', 'Achievement successfully added!');
        return redirect()->back();
    }

    public function allachievement()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $achievements = Achievement::get();

        return view('admin.achievement',compact('achievements'));
    }
    public function editachievement($id)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
        $categoryByid = Achievement::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createachievement',compact('categoryByid','employess'));
    }
    public function updateachievement($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $achievement = Achievement::findOrFail($id);
        $input = $request->all();
        $achievement->fill($input)->save();

        Session::flash('flash_message', 'Achievement successfully Updated!');

        return redirect()->back();
    }
    public function deleteachievement($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $achievement = Achievement::find($id);
        $achievement->destroy($id);
        Session::flash('flash_message', 'Achievement Deleted Successfully!');
        return redirect()->back();
    }
    public function allachievementlike()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $achievements = AchievementLike::get();

        return view('admin.achievementlike',compact('achievements'));
    }
 public function createcompany()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createcompany',compact('employess'));
    }
    public function storecompany(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        CurrentCompany::create($input);
        Session::flash('flash_message', 'Company successfully added!');
        return redirect()->back();
    }

    public function allcompany()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $companys = CurrentCompany::get();

        return view('admin.company',compact('companys'));
    }
    public function editcompany($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = CurrentCompany::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createcompany',compact('categoryByid','employess'));
    }
    public function updatecompany($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $company = CurrentCompany::findOrFail($id);
        $input = $request->all();
        $company->fill($input)->save();

        Session::flash('flash_message', 'Company successfully Updated!');

        return redirect()->back();
    }
    public function deletecompany($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $company = CurrentCompany::find($id);
        $company->destroy($id);
        Session::flash('flash_message', 'Company Deleted Successfully!');
        return redirect()->back();
    }	
	public function createcontact()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createcontact',compact('employess'));
    }
    public function storecontact(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
		$input = $request->all();
        EmergencyContact::create($input);
        Session::flash('flash_message', 'Contact successfully added!');
        return redirect()->back();
    }

    public function allcontact()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $contacts = EmergencyContact::get();

        return view('admin.contact',compact('contacts'));
    }
    public function editcontact($id)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
        $categoryByid = EmergencyContact::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createcontact',compact('categoryByid','employess'));
    }
    public function updatecontact($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $contact = EmergencyContact::findOrFail($id);
        $input = $request->all();
        $contact->fill($input)->save();

        Session::flash('flash_message', 'Contact successfully Updated!');

        return redirect()->back();
    }
    public function deletecontact($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $contact = EmergencyContact::find($id);
        $contact->destroy($id);
        Session::flash('flash_message', 'Contact Deleted Successfully!');
        return redirect()->back();
    }
 public function createpreviouscompany()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
		
        return view('admin.createpreviouscompany',compact('employess'));
    }
    public function storepreviouscompany(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        PreviousCompany::create($input);
        Session::flash('flash_message', 'Company successfully added!');
        return redirect()->back();
    }

    public function allpreviouscompany()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $companys = PreviousCompany::get();

        return view('admin.previouscompany',compact('companys'));
    }
    public function editpreviouscompany($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = PreviousCompany::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createpreviouscompany',compact('categoryByid','employess'));
    }
    public function updatepreviouscompany($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $company = PreviousCompany::findOrFail($id);
        $input = $request->all();
        $company->fill($input)->save();

        Session::flash('flash_message', 'Company successfully Updated!');

        return redirect()->back();
    }
    public function deletepreviouscompany($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $company = PreviousCompany::find($id);
        $company->destroy($id);
        Session::flash('flash_message', 'Company Deleted Successfully!');
        return redirect()->back();
    }
     public function createreference()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createreference',compact('employess'));
    }
    public function storereference(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        Reference::create($input);
        Session::flash('flash_message', 'Reference successfully added!');
        return redirect()->back();
    }

    public function allreference()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $references = Reference::get();

        return view('admin.reference',compact('references'));
    }
    public function editreference($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = Reference::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createreference',compact('categoryByid','employess'));
    }
    public function updatereference($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $reference = Reference::findOrFail($id);
        $input = $request->all();
        $reference->fill($input)->save();

        Session::flash('flash_message', 'Reference successfully Updated!');

        return redirect()->back();
    }
    public function deletereference($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $reference = Reference::find($id);
        $reference->destroy($id);
        Session::flash('flash_message', 'Reference Deleted Successfully!');
        return redirect()->back();
    }
     public function createactivity()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createactivity',compact('employess'));
    }
    public function storeactivity(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        Activity::create($input);
        Session::flash('flash_message', 'Activity successfully added!');
        return redirect()->back();
    }

    public function allactivity()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $activitys = Activity::get();

        return view('admin.activity',compact('activitys'));
    }
    public function editactivity($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = Activity::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createactivity',compact('categoryByid','employess'));
    }
    public function updateactivity($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $activity = Activity::findOrFail($id);
        $input = $request->all();
        $activity->fill($input)->save();

        Session::flash('flash_message', 'Activity successfully Updated!');

        return redirect()->back();
    }
    public function deleteactivity($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $activity = Activity::find($id);
        $activity->destroy($id);
        Session::flash('flash_message', 'Activity Deleted Successfully!');
        return redirect()->back();
    }	
     public function createfacebook()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createfacebook',compact('employess'));
    }
    public function storefacebook(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        Facebook::create($input);
        Session::flash('flash_message', 'Facebook Link successfully added!');
        return redirect()->back();
    }

    public function allfacebook()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $facebooks = Facebook::get();

        return view('admin.facebook',compact('facebooks'));
    }
    public function editfacebook($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = Facebook::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createfacebook',compact('categoryByid','employess'));
    }
    public function updatefacebook($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $facebook = Facebook::findOrFail($id);
        $input = $request->all();
        $facebook->fill($input)->save();

        Session::flash('flash_message', 'facebook successfully Updated!');

        return redirect()->back();
    }
    public function deletefacebook($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $facebook = Facebook::find($id);
        $facebook->destroy($id);
        Session::flash('flash_message', 'Facebook Deleted Successfully!');
        return redirect()->back();
    }	
     public function createspecialday()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createspecialday',compact('employess'));
    }
    public function storespecialday(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
		$emp=Employee::where('emp_id','=',$request->emp_id)->first(['emp_name']);
		$empname=$emp->emp_name;
		$input['emp_name']=$empname;
        Specialday::create($input);
        Session::flash('flash_message', 'Specialday successfully added!');
        return redirect()->back();
    }

    public function allspecialday()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $specialdays = Specialday::get();

        return view('admin.specialday',compact('specialdays'));
    }
    public function editspecialday($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = Specialday::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        //dd($categoryByid);

        //return view('tasks.edit')->withTask($task);
        return view('admin.createspecialday',compact('categoryByid','employess'));
    }
    public function updatespecialday($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $specialday = Specialday::findOrFail($id);
        $input = $request->all();
		$emp=Employee::where('emp_id','=',$request->emp_id)->first(['emp_name']);
		$empname=$emp->emp_name;
		$input['emp_name']=$empname;
        $specialday->fill($input)->save();

        Session::flash('flash_message', 'Specialday successfully Updated!');

        return redirect()->back();
    }
    public function deletespecialday($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
        $specialday = Specialday::find($id);
        $specialday->destroy($id);
        Session::flash('flash_message', 'Specialday Deleted Successfully!');
        return redirect()->back();
    }	
     public function createclient()
    {
        return view('admin.createclient');
    }
    public function storeclient(Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$input = $request->all();
        Client::create($input);
        Session::flash('flash_message', 'Client successfully added!');
        return redirect()->back();
    }

    public function allclient()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $clients = Client::get();

        return view('admin.client',compact('clients'));
    }
    public function editclient($id)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $categoryByid = Client::findOrFail($id);
        return view('admin.createclient',compact('categoryByid'));
    }
    public function updateclient($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $client = Client::findOrFail($id);
        $input = $request->all();
        $client->fill($input)->save();

        Session::flash('flash_message', 'Client successfully Updated!');

        return redirect()->back();
    }
    public function deleteclient($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $client = Client::find($id);
        $client->destroy($id);
        Session::flash('flash_message', 'Client Deleted Successfully!');
        return redirect()->back();
    }
     public function createacademic()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createacademic',compact('employess'));
    }
    public function storeacademic(Request $request)
    {
		$input = $request->all();
        Academic::create($input);
        Session::flash('flash_message', 'Academic successfully added!');
        return redirect()->back();
    }

    public function allacademic()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $academics = Academic::get();
        return view('admin.academic',compact('academics'));
    }
    public function editacademic($id)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
        $categoryByid = Academic::findOrFail($id);
		$employess=Employee::where('status','=','1')->get();
        return view('admin.createacademic',compact('categoryByid','employess'));
    }
    public function updateacademic($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $academic = Academic::findOrFail($id);
        $input = $request->all();
        $academic->fill($input)->save();

        Session::flash('flash_message', 'Academic successfully Updated!');

        return redirect()->back();
    }
    public function deleteacademic($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $academic = Academic::find($id);
        $academic->destroy($id);
        Session::flash('flash_message', 'Academic Deleted Successfully!');
        return redirect()->back();
    }	
 public function createslider()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        return view('admin.createslider');
    }
    public function storeslider(Request $request)
    {
		$input = $request->all();
        Slider::create($input);
        Session::flash('flash_message', 'Slider successfully added!');
        return redirect()->back();
    }

    public function allslider()
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $sliders = Slider::get();
        return view('admin.slider',compact('sliders'));
    }
    public function editslider($id)
    {
		if(authpermission()==0){
		return view('admin.permission');
		}
        $categoryByid = Slider::findOrFail($id);
        return view('admin.createslider',compact('categoryByid'));
    }
    public function updateslider($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $academic = Slider::findOrFail($id);
        $input = $request->all();
        $academic->fill($input)->save();

        Session::flash('flash_message', 'Slider successfully Updated!');

        return redirect()->back();
    }
    public function deleteslider($id, Request $request)
    {
		if(authpermission()==0){
		return view('admin.permission');	
		}
        $academic = Slider::find($id);
        $academic->destroy($id);
        Session::flash('flash_message', 'Slider Deleted Successfully!');
        return redirect()->back();
    }									
}
