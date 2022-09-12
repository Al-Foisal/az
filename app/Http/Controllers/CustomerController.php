<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    
    public function resigter(Request $request){
        
        $addata = new Customer();
        $addata->name = $request->name;
        $addata->email = $request->email;
        $addata->password =  bcrypt($request->password);
        $addata->save();
        Session::put('customer_id', $addata->id);
        Session::put('customer_name', $addata->name);
        Session::put('email', $addata->email);
        $p = Cart::content()->first();
               if(!empty($p->id)){
                toastr()->success('New customer has been register successfully!');
           return redirect('billing'); 
          }
           else{
            toastr()->success('New customer has been register successfully!');
              return redirect('/customer-profile');
   
           }
       
   
       }

   
       public function login(Request $request) {
    
           $member = Customer::where('email', $request->email)->first();
       
           if ($member) {
   
               if (password_verify($request->password, $member->password)) {
                   Session::put('customer_id', $member->id);
                   Session::put('customer_name', $member->customerName);
                   Session::put('email', $member->email);
                   $p = Cart::content()->first();
                   if(!empty($p->id)){
                    toastr()->success(' Customer  login successfully!');
                    return redirect('/billing'); 
                   }
                    else{
                        toastr()->success(' Customer  login successfully!');
                       return redirect('/'); 
   
                    }
                 
               } else {
                toastr()->error('Your Password Incorrect!');
                   return redirect()->back(); 
               }
           } else {
              toastr()->error('Your Email/Number Incorrect');
               return redirect()->back(); 
           }
          
       }
       public function logout() {
           Session::forget('customer_id');
           Session::forget('customer_name');
           Session::forget('email');
           toastr()->success(' customer has been logout successfully!');
           return redirect('/customer-login');
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
