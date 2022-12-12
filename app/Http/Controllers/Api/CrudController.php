<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatMessages as Message;
use App\Models\Crud;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
     public function __construct()
    {

    }
    public function add_user(Request $request){
        $data = $request->all();
        $insertQuery   = ("insert into users (name,branch,desination) values ('".$data['name']."','".$data['branch']."','".$data['desination']."')");
        $insert        = DB::insert($insertQuery);
        if($insert){
            return response()->json(["status"=>true,"data"=>[],"messages"=>"Data Insert SuccessFully"]);
        }else{
            return response()->json(["status"=>false,"data"=>[],"messages"=>"Data Insert Failed"]);
        }

    }
    public function get_user(Request $request){
        $userList = DB::select('select id,TRIM("name") AS name,TRIM("branch") AS branch,TRIM("desination") AS desination from users');
        return response()->json(["status"=>true,"messages"=>"","data"=>$userList]);
    }
    public function edit_user(Request $request){
        $userList = DB::select("select id,TRIM('name') AS name,TRIM('branch') AS branch,TRIM('desination') AS desination from users where id='".$request->id."'");
        return response()->json(["status"=>true,"messages"=>"","data"=>$userList]);
    }
    public function update_user(Request $request){
        $sql            = ("update users set name = '".$request->name."',branch='".$request->branch."',desination='".$request->desination."' where id='".$request->id."'");
        $update         = DB::update($sql);
        if($update){
            return response()->json(["status"=>true,"data"=>[],"messages"=>"Data Updated SuccessFully"]);
        }else{
            return response()->json(["status"=>false,"data"=>[],"messages"=>"Data Updated Failed"]);
        }
    }
    public function delete_user(Request $request){
        $sql            = ("delete from users where id ='".$request->id."'");
        $delete         = DB::delete($sql);
        if($delete){
            return response()->json(["status"=>true,"data"=>[],"messages"=>"Deleted SuccessFully"]);
        }else{
            return response()->json(["status"=>false,"data"=>[],"messages"=>"Deleted Failed"]);
        }
    }

	
}
