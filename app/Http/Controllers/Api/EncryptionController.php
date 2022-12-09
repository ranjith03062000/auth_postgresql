<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{
     public function __construct()
    {

    }
    public function encryption(Request $request){
		$string 		= $request->all();
		$ciphering 		= "AES-256-CBC";
		$options 		= 0;
		$encryption_iv 	= '1234567891011121';
		$encryption_key = "Ranjith Maharajan";
		$encryption 	= base64_encode(openssl_encrypt(json_encode($string),$ciphering,$encryption_key,$options,$encryption_iv));
		return response()->json([
                    'encryption' => $encryption
                ]);
	}
	public function decryption(Request $request){
		$decryption_iv 	= '1234567891011121';
		$ciphering 		= "AES-256-CBC";
		$options 		= 0;
		$decryption_key = "Ranjith Maharajan";
		$decryption		= json_decode(openssl_decrypt(base64_decode($request->input),$ciphering,$decryption_key,$options,$decryption_iv));
		return response()->json([
			'decryption' => $decryption
		]);

	}	
	
}
