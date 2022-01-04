<?php

namespace App\Http\Controllers;

use App\Mail\forgotMail;
use Illuminate\Http\Request;
use App\Models\admin\managers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function create() {
        return view('admin.register');
    }

    public function store_register(Request $request) {
        $validator = Validator::make($request->all(), [
            'fullname'         => 'required',
            'username'         => 'required|min:8|unique:managers',
            'password'         => ['required', '',Password::min(8)->symbols()->numbers()->mixedCase()],
            'email'            => 'required|email|unique:managers',
            // 'password'         => 'required|confirmed|min:8',
            'confirmation_pwd' => 'required_with:password|same:password|min:8',
            'user_avatar'      => 'required|mimes:jpg,jpeg,png,gif|max:10000'
            
        ], [
            'fullname.required'     => 'Vui lòng nhập họ tên',
            'username.required'     => 'Vui lòng nhập user name',
            'username.min'          => 'Username phải có ít nhất 8 ký tự',
            'username.unique'       =>  'Usename đã tồn tại',
            'password.required'     => 'Vui lòng nhập mật khẩu',
            // 'password.symbol'       => 'Mật khẩu phải có cái ký tự đặc biệt',
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
        if($request->hasFile('user_avatar')) {
            $file = $request->file('user_avatar');
            $destination_Path = public_path('public/avatar_manager');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move($destination_Path,$file_name);
            
        }else {
            $file_name = 'no_name.jpg';
        } 
        $user_manager = new managers();
        if($request->user_is_active) {
            $user_manager->user_is_active = $request->user_is_active;
        }
        else {
            $user_manager->user_is_active = "off";
        }
        $user_manager->fullname = $request->fullname;
        $user_manager->user_is_active = "on";
        $user_manager->user_is_disable = 1;
        $user_manager->username = $request->username;
        $user_manager->password = bcrypt($request->password);
        $user_manager->email = $request->email;
        $user_manager->user_avatar = $file_name;
        $user_manager->user_time_login = 1;
        $user_manager->user_numPassword_attempts=0;
        $user_manager->verification_code = sha1(time());
        $user_manager->role = 0;
        $user_manager->save();
        return redirect()->route('admin.login')->with('success','Bạn đã đăng ký thành công');
        // $user_manager = DB::table('manager')->where('email',$request->email)->And('username',$request->username)->first();

    }

    public function login() {
        return view('admin.login');
    }

    public function forgot() {
        return view('admin.forgot');
    }

    public function store_login(Request $request) {

        $validator = Validator::make($request->all(), [
            'username'         => 'required',
            'password'         => 'required',
        ], [
            'username.required'     => 'Vui lòng nhập user name',
            'password.required'     => 'Vui lòng nhập mật khẩu',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
            // 'remember_token'=> $request->has('remember_token')? true:false
        ];

        if(Auth::attempt($arr)){
            if($request->has('remember_token')) {
                Cookie::queue('adminUser',$request->username,1440);
                Cookie::queue('adminPass',$request->password,1440);
                return redirect()->route('manager.index');
            }
            return redirect()->route('manager.index');

        } else {
            return redirect()->back()->with('fail','Đăng nhập thất bại');

        }
    }


    public function logout(){
        Auth::logout();
        Cookie::queue(Cookie::forget('adminUser'));
        Cookie::queue(Cookie::forget('adminPass'));
        return view('admin.login');
    }
    public function forget_pass() {
        return view('admin.forget_pass');
    }

    public function store_forgot(Request $request){

        if($request->input('btn_forgot')){

            $request->validate(
                [
                    'gmail' => 'required |min:8 |max:255 |email',
                ],
                [
                    'required' => ":attribute không được để trống",
                    'min' => ":attribute có độ dài ít nhất :min ký tự",
                    'max' => ":attribute có độ dài tối đa :max ký tự",
                    "email" => "Dữ liệu nhập vào phải là email",
                ],
                [
                    'gmail' => 'Gmail'
                ]
            );

           $item =  managers::where('email',$request->input('gmail'))
            ->first();
            if(!empty($item)){

                $pass_new = random_int(0,99999999);
                
                $pass_two = $pass_new;
                managers::where('email',$request->input('gmail'))
                ->update(
                    ['password' => bcrypt($pass_two)]
                );
                $data = ['key' =>  $pass_new];
                Mail::to($request->input('gmail'))->send(new forgotMail($data));
                return redirect()->route('admin.login')->with('success','Bạn đã đổi mật khẩu thành công');
            }else{
                return redirect()->route('admin.login')->with('fail','Nhập sai gmail or password');
            }


        }
        
    }


}
