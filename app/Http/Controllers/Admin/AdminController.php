<?php
  
namespace App\Http\Controllers\Admin;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Hash;
  
class AdminController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
    public function registration()
    {
        return view('auth.registration');
    }
    public function enquiries()
    {
        return view('enquiries.blade.php');
    }
    public function customer_requirement()
    {
        return view('customer_requirement.blade.php');
    }
    public function requirement()
    {
        return view('requirement.blade.php');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function adminLogin(Request $request)
    {

		$result_orders = [];
	$request->validate([
        'email_id' => 'required|email|max:50',
        'password' => 'required|min:6'
   ]);
        $credentials = $request->only('email_id', 'password');
        if ( Auth::attempt(array('email_id' => $request->email_id, 'password' => $request->password), true) ) {
            $user = User::select('email_id','user_id')->where('email_id',$request->email_id)->get();
            if($user[0]->email_id!=null || $user[0]->email_id!=""){
                return redirect()->intended('users')
                        ->withSuccess('You have Successfully loggedin');
			}
			else{
				 Session::flash('alert-danger', 'Invalid credentials entered');
					return redirect()->intended('login')
					->withSuccess('Invalid credentials entered');
				}
            }
        else{
			 Session::flash('alert-danger', 'Invalid credentials entered');
			 return redirect()->intended('login')
					->withSuccess('Invalid credentials entered');
        } 
        //return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    }
		
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
           
        $data = $request->all();
        //$check = this->($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function fileUpload(Request $request)
    {
       // echo '111';exit;
         if($request->file('uploadfile')){
             $url  = \Request::url();
             $url.
                 $file2 = $request->file('uploadfile')->store('public/images/upload');
                 if($file2)
                 {
                      return response()->json(array('status'=>true,'message'=>'file uploaded successfully','data'=>array('file_path'=>env('APP_URL').'/storage/app/'.$file2)),200,[],JSON_NUMERIC_CHECK);
                 }
                 else
                 {
                   return response()->json(array('status'=>false,'data'=>[],'message'=>'Token is Expired'),200,[],JSON_NUMERIC_CHECK);  
                 }
         }
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/login');
    }
}