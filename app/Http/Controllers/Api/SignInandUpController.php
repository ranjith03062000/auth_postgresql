<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatMessages as Message;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SignInandUpController extends Controller
{
     public function __construct()
    {

    }
    /* This Function User Create */
    public function getuers(Request $request){
        $entireUsers = User::all();
        return response()->json(["status"=>200,"messages"=>"","data"=>$entireUsers]);
    }
    public function register(Request $request){
        $data    = $request->all();

        /* for this function data validation to user */
        $validation = Validator::make($data,[ 
            'email' => 'required',
            'password' => 'required',
        ]);
    
        /* If data valid any one field that will be return the fail message*/
        if($validation->fails()){
            return $validation->errors()->first();   
        }

        /*in this function email exitsing users check */
        $existingUser = DB::table('users')->where('email_id',$data['email'])->count();
        if($existingUser>0){
            return response()->json(["status"=>500,"data"=>[],"messages"=>"This Email Already Added"]);
        }

       /*this is password Encryption code */
        $encryptforPassword = base64_encode(openssl_encrypt($data['password'],"AES-256-CBC","Encryption Password",0,'1234567891011121'));

        /*in this function is add for user */  
        $insertQuery         = ("insert into users (password,email_id) values ('".$encryptforPassword."','".$data['email']."')");
        $recordSubmit        = DB::select($insertQuery);
        if($recordSubmit){
            return response()->json(["status"=>200,"data"=>[],"messages"=>"Your Record Submit SucessFully"]);
        }
        else{
            return response()->json(["status"=>500,"data"=>[],"messages"=>"Your Record Submit Failed"]);
        }
    }

    /* user login function */
    public function login(Request $request){
        $data    = $request->all();

       /* for this function data validation to user */
       $validation = Validator::make($data,[ 
        'email' => 'required',
        'password' => 'required',
        ]);

       /* If data valid any one field that will be return the fail message*/
       if($validation->fails()){
         return $validation->errors()->first();   
        }
        /*this is password decryption code */
        $encryptforPassword = base64_encode(openssl_encrypt($data['password'],"AES-256-CBC","Encryption Password",0,'1234567891011121'));

        /* get login user details */
        $userRecord = DB::table('users')->where('email_id',$data['email'])->where('password',$encryptforPassword)->select('password')->count();
        if($userRecord>0){
            return response()->json(["status"=>200,"data"=>[],"messages"=>"Login Successfully"]);
        }else{
            return response()->json(["status"=>500,"data"=>[],"messages"=>"Login Failed"]);
        }
    }
    /*user Forget Password Function */
    public function forgetPassword(Request $request){
        $data    = $request->all();

          /* this is password Encryption code */
        $encryptforPassword = base64_encode(openssl_encrypt($data['forget_password'],"AES-256-CBC","Encryption Password",0,'1234567891011121'));

        /*update the passowrd for give user email id*/
        $sql            = ("update users set password = '".$encryptforPassword."' where email_id = '".$data['email']."'");
        $update         = DB::update($sql);

        if($update){
             /*Forget Password Mail function Code */
            $data = array('name'=>"Ranjith Mahrajan");   
            Mail::send(['text'=>'mail'], $data, function($message) {
                $message->to('abc@gmail.com', 'Forget Password')->subject
                    ('Your Forget Updated Succesfully');
                $message->from('xyz@gmail.com','Ranjith Mahrajan');
            });
        }
        if($update){
            return response()->json(["status"=>200,"data"=>[],"messages"=>"Your Forget Password Updated SucessFully"]);
        }else{
            return response()->json(["status"=>500,"data"=>[],"messages"=>"Your Forget Password Updated Failed"]);
        }

    }
	
}
