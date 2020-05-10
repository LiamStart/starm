<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Type_Users;
use App\Permisos;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Image;
class ApkController extends Controller

{
    public function login(Request $request){
        if($request['token']!=null){
            if($request['token']=='24b52627b06adc0fc1b2a602bca56ab7'){
                // transformar password hash

                $user=User::where('email',$request['email'])->first();
                if($user!='[]'){
                    $password=$request['password'];
                    $hashedPassword= $user->password;
                    if (Hash::check($password, $hashedPassword)) {

                        // The passwords match...
                        return response()
                        ->json(['error' => 'NO','nombre'=>$user->name,'apellido'=>$user->apellido]);
                    }
                    return response()
                    ->json(['error' => 'SI']);

                }
            }else{
                return response()
                ->json(['error' => 'SI']);
            }
        }
        return response()
            ->json(['error' => 'SI']);

    }
}
