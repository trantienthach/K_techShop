<?php

namespace App\Http\Controllers;

use App\Mail\forgotMail;
use Illuminate\Http\Request;
use App\Models\ManagerUserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class ManagerController extends Controller
{
    public function index() {
        $result = ManagerUserModel::orderBy('fullname','DESC')->search()->paginate(2);
        if($filler = request()->filler){
            $result = ManagerUserModel::orderBy('fullname','DESC')->where('user_is_active',$filler)->search()->paginate(2);
        }
        return view('manager.index',compact('result'));

    }
    public function add() {
        return view('manager.add_user');
    }

    public function update($id) {
        $result['info'] = ManagerUserModel::all();
        $managerId = ManagerUserModel::find($id);
        return view('manager.update_user',compact('result','managerId'));
    }
    
    public function delete($id) {
        // return $id;
        ManagerUserModel::find($id)->delete();
        return redirect()->route('manager.index')->with('success','Bạn đã xoá thành công');
    }


    public function store_add(Request $request) {
            $validator = Validator::make($request->all(), [
                'fullname'         => 'required',
                'username'         => 'required|min:8|unique:managers',
                'password'         => ['required', '',Password::min(8)->symbols()->numbers()->mixedCase()],
                'email'            => 'required|email|unique:managers',
                'confirmation_pwd' => 'required_with:password|same:password|min:8',
                'user_avatar'      => 'required|mimes:jpg,jpeg,png,gif|max:10000'
                
            ], [
                'fullname.required'     => 'Vui lòng nhập họ tên',
                'username.required'     => 'Vui lòng nhập user name',
                'username.min'          => 'Username phải có ít nhất 8 ký tự',
                'username.unique'       =>  'Usename đã tồn tại',
                'password.required'     => 'Vui lòng nhập mật khẩu',
                'password.min'          => 'Mật khẩu phải có ít nhất 8 ký tự',
                'email.required'        => 'Vui lòng nhập email',
                'email.email'           => 'Vui lòng nhập lại mail',
                'email.unique'          => 'Email đã tồn tại',
                'user_avatar.required'  => 'Vui lòng thêm ảnh đại diện',
                'user_avatar.mimes'     => 'Kiểm tra lại đuôi file',
                'user_avatar.image'     =>'Avatar phải là hình'
    
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $user_manager = new ManagerUserModel;

            if($request->user_is_active) {
                $user_manager->user_is_active = "on";
            }
            else {
                $user_manager->user_is_active = "off";
            }
            $user_manager->fullname = $request->fullname;
            $user_manager->user_is_disable = 1;
            $user_manager->username = $request->username;
            $user_manager->password = bcrypt($request->password);
            $user_manager->email = $request->email;
            $user_manager->user_time_login = 1;
            $user_manager->user_numPassword_attempts=0;
            $user_manager->verification_code = sha1(time());
            if($request->role) {
                $user_manager->role = $request->role;
            }
            else {
                $user_manager->role = 2;
            }
            if($request->hasFile('user_avatar')) {
                $file = $request->file('user_avatar');
                $destination_Path = public_path('public/avatar_manager');
                $file_name = time().'_'.$file->getClientOriginalName();
                $file->move($destination_Path,$file_name);
                $thumbnail = 'public/avatar_manager/'.$file_name;
                $user_manager->user_avatar = $thumbnail;
            }else {
                $user_manager->user_avatar = 'no_name.jpg';
            } 
            $user_manager->save();
            return redirect()->route('manager.index')->with('success','Bạn đã đăng ký thành công');
            
    }

    public function update_store(Request $request,$id) {
        $validator = Validator::make($request->all(), [
            'fullname'         => 'required',
            'username'         => 'required',
            'password'         => ['required', '',Password::min(8)->symbols()->numbers()->mixedCase()],
            'email'            => 'required|email',
            
            
        ], [
            'fullname.required'     => 'Vui lòng nhập họ tên',
            'username.required'     => 'Vui lòng nhập user name',
            'password.required'     => 'Vui lòng nhập mật khẩu',
            'password.min'          => 'Mật khẩu phải có ít nhất 8 ký tự',
            'email.required'        => 'Vui lòng nhập email',
            'email.email'           => 'Vui lòng nhập lại mail',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if($request->hasFile('user_avatar')) {
        //     $file = $request->file('user_avatar');
        //     $destination_Path = public_path('public/avatar_manager');
        //     $file_name = time().'_'.$file->getClientOriginalName();
        //     $file->move($destination_Path,$file_name);
        //     $thumbnail = 'public/avatar_manager/'.$file_name;
        // }else {
        //     $file_name = 'no_name.jpg';
        // } 

        $user_manager = ManagerUserModel::find($id);

        if($request->user_is_active) {
            $user_manager->user_is_active = $request->user_is_active;
        }
        else {
            $user_manager->user_is_active = "off";
        }
        $user_manager->fullname = $request->fullname;
        $user_manager->user_is_disable = 1;
        $user_manager->username = $request->username;
        $user_manager->password = bcrypt($request->password);
        $user_manager->email = $request->email;
        $user_manager->user_time_login = 1;
        $user_manager->user_numPassword_attempts=0;
        $user_manager->verification_code = sha1(time());
        if($request->role) {
            $user_manager->role = $request->role;
        }
        else {
            $user_manager->role = 2;
        }
        if($request->hasFile('user_avatar')) {
            $file = $request->file('user_avatar');
            $destination_Path = public_path('public/avatar_manager');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move($destination_Path,$file_name);
            $thumbnail = 'public/avatar_manager/'.$file_name;
            $user_manager->user_avatar = $thumbnail;
        }else {
            $user_manager->user_avatar = $user_manager->user_avatar;
        } 
        $user_manager->save();
        return redirect()->route('manager.index')->with('success','Bạn đã đăng ký thành công');
 

    }
}
