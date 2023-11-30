<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request) {
        return view('admin.register');
    }

    public function saveUser(Request $request) {
        try{
            $file = $request->file('profile_image');
            if ($file) {
                $randomString = Str::random(6, '0123456789');
                $extension = $file->getClientOriginalExtension();
                $fileName = $randomString . '_' . time() . '.' . $extension;
                $file->move(public_path('userImage'), $fileName);
            }

                $data = [
                    'name' => $request->input('name'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'address' => $request->input('address'),
                    'about' => $request->input('about'),
                    'phone' => $request->input('phone'),
                    'term' => $request->input('term'),
                    'profile_image' => $fileName
                ];

                User::create($data);

                return redirect()->route('admin.login');
        } catch(\Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function edit(Request $request) {

        $users = User::get();

        foreach($users as $us) {
            $id = $us->id;
        }

        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'about' => $request->input('about'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'twitter' => $request->input('twitter'),
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
            'website' => $request->input('website'),
        ]);

        $file = $request->file('profile_image');
        if ($file) {
            $randomString = Str::random(6, '0123456789');
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;
            $file->move(public_path('userImage'), $fileName);

            User::where('id', $id)->update([
                'profile_image' => $fileName
            ]);
    }

    return redirect()->route('profile')->with('success', 'User updated successfully');

    }

    // Admin Login

    public function showLogin() {
        return view('admin.login');
    }

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with("error", "Login Fail, please check email id");
        }

        if (!Hash::check($request['password'], $user->password)) {
            return back()->with("error", "Login Fail, please check password");
        }

        if ($user) {
            Session::flush('user');
            Session::put('user',$user);
            Auth::login($user);
            return redirect()->route('admin.dashboard');
        } else {
            // Handle invalid credentials
            return back()->with('error', 'Invalid credentials');
        }

    }

    public function logout(Request $request)
    {
        return redirect()->route('admin.login');
    }

}
