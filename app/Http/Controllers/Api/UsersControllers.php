<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class UsersControllers extends Controller
{
     public function __construct()
    {

    }
    public function addUsers(Request $request){
         $insert=Users::create([
				'first_name' 	=>$request->first_name,
				'middle_name' 	=>$request->middle_name,
				'last_name' 	=>$request->last_name,
				'father_name' 	=>$request->father_name,
				'mother_name' 	=>$request->mother_name,
				'email' 		=>$request->email,
				'phone_number' 	=>$request->mobile_number,
			'whatsapp_number' 	=>$request->whatsapp_number
			]);
        if($insert){
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getusersList(Request $request)
    {
		 $sql="select A.id,CONCAT(A.first_name,' ',A.middle_name,' ',A.last_name) as full_name,A.father_name,A.mother_name,A.email,A.phone_number,A.whatsapp_number
				from vendors A
				order by A.added_at DESC;";
				$usersList = DB::select($sql);
        return response()->json($usersList);
    }
    public function editUser(Request $request)
    {
        $useeList = Users::where('id',$request->id)->first();
        return response()->json($useeList);
    }
    public function updateUsers(Request $request){
         $id=$request->id;
         $data=array(
			'first_name' 	=>$request->first_name,
				'middle_name' 	=>$request->middle_name,
				'last_name' 	=>$request->last_name,
				'father_name' 	=>$request->father_name,
				'mother_name' 	=>$request->mother_name,
				'email' 		=>$request->email,
				'phone_number' 	=>$request->mobile_number,
			'whatsapp_number' 	=>$request->whatsapp_number
         );

        $update=  Users::where('id',$id)->update($data);
        if($update){
               return response()->json(['result' =>'Success']);
        }else{
              return response()->json(['result'=>'failed']);
        }
    }
    public function deleteUserList(Request $request){
         
        $id=$request->id;
        $delete= Users::where('id',$id)->delete();
        if($delete){
               return response()->json('Success');
        }else{
              return response()->json('failed');
        }
    }
        

}
