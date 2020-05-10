<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Type_Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Image;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $type= Type_Users::all();
        return view('profile.edit',['type'=>$type]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
    public function upload_photo(Request $request){
        $user= Auth::user();
        $extension= $request->file('photo')->getClientOriginalExtension();
        $file_name=$user->id.'.'.$extension;
        Image::make($request->file('photo'))
            ->save('img/users/'.$file_name);
            $user->url_image=$file_name;
            $user->save();
        return back()->withStatus(__('Foto Actualizada'));
    }
    public function getPhotoRouteAtrribute(){
        if($this->photo)
            return 'img/users/'.$this->id.'.'.$this->photo;
        return 'img/user/avatar.png';
    }
}
