<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Excel;
use Carbon\Carbon;

class HomeController extends Controller
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
	   $today = Carbon::today();
        return view('admin.home',compact('data'));
    }
    public function user()
    {
       $data = User::where('id', '!=', Auth::id())->get();
        return view('admin.user',compact('data'));
    }
    public function excel() {

        // Execute the query used to retrieve the data. In this example
        // we're joining hypothetical users and payments tables, retrieving
        // the payments table's primary key, the user's first and last name,
        // the user's e-mail address, the amount paid, and the payment
        // timestamp.

//        $payments = Payment::join('users', 'users.id', '=', 'payments.id')
//            ->select(
//                'payments.id',
//                \DB::raw("concat(users.first_name, ' ', users.last_name) as `name`"),
//                'users.email',
//                'payments.total',
//                'payments.created_at')
//          ->get();
        $payments=User::where('id', '!=', Auth::id())->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $paymentsArray = [];

        // Define the Excel spreadsheet headers
        $paymentsArray[] = ['id', 'name','email','created_at','updated_at'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($payments as $payment) {
            $paymentsArray[] = $payment->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('payments', function($excel) use ($paymentsArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
                $sheet->fromArray($paymentsArray, null, 'A1', false, false);
            });

        })->download('xlsx');
    }
}
