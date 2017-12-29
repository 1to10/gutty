<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontController extends Controller
{
	 public function __construct()
  {
    //its just a dummy data object.
    //$banners = Menu::where('parent_id','=','0')->get();
    // Sharing is caring
    //\View::share(compact('menus'));
  }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
    return view('auth.login');
    }
}
