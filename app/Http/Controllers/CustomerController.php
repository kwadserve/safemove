<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use View;
use Auth;
use Session;
use Validator;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
	public function __construct()
	{		 
	 
	   
    }
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // Auth:uses
      $customerid =  Auth::guard('customer')->id();
        if($customerid){
             return redirect('/customerhome');
        }else{
            return view('quotation.customerlogin');
        }
       
       
       // print_r($auth);
       // die;
    }

    public function customerDashboard()
    {
     $customerid =  Auth::guard('customer')->id();
     
        if($customerid){
            return view('quotation.customer_dashboard');           
        }else{
            return redirect('/customerlogin');
        }
       
    }

    
    /**
     * Show the application reset_password.
     *
     * @return \Illuminate\Http\Response
     */
    public function reset_password()
    {
       // Auth:uses
      $customerid =  Auth::guard('customer')->id();
        if($customerid){
             return redirect('/customerhome');
        }else{
            return view('quotation.reset_password');
        }
       
    }

    /**
     * Show the application reset_password.
     *
     * @return \Illuminate\Http\Response
     */
    public function createaccount()
    {
       // Auth:uses
      $customerid =  Auth::guard('customer')->id();
        if($customerid){
             return redirect('/customerhome');
        }else{
            return view('quotation.create_account');
        }
       
    }

    /**
     * Show the application faq.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq(){      
        return view('customers.faq');
    }

    /**
     * Show the application reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews(){      
        return view('customers.review');
    }

    /**
     * Show the application customerservice.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerservice(){      
        return view('customers.service');
    }

    

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){  
            $input = $request->all();
          
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:customers|max:255',
                'username' => 'required|unique:customers|min:6|max:255',
                'password' => 'required|min:6|max:255'
            ]);
            $input['password'] = bcrypt($request->password);
        if ($validator->fails()) {
            //return redirect('registration')->withErrors($validator)->withInput();   
           // return redirect()->back()->withErrors($validator)->withInput();  
           return back()->with('error', 'Failed to find that resource');    
        }else{
        Customer::create($input);
        return back()->with('status', 'Registration Success');  
        } 
}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerlogin(Request $request) {  
        $input = $request->all();
            // validate the form data
            $this->validate($request, [
                'email'=>'required',
                'password'=>'required|min:6'
            ]);
    
            // Attemp to log user in-
            if (Auth::guard('customer')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
                return redirect('/customerhome')->with('status', 'Loged Success');  
            }
           // return "Failed to login";
           return back()->with('error', 'Failed to find that resource');    
           // return redirect()->back()->withInput($request->only('username', 'remember'));
       
       // return view('quotation/customerlogin');
    }

    public function customerlogout(Request $request)
    {
        //$this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->back();
    }

    
}
