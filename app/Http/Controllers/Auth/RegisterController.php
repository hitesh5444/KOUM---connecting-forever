<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        $key = Str::random(50);

        return view('welcome', compact('key'));
    }

    public function dashboard() {
        $user = User::get();

        return view('admin.dashboard', compact('user'));
    }

    public function profile() {
        $user = User::get();

        return view('admin.profile', compact('user'));
    }

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

            return back()->with("success", "User Register Successfully!");
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
}
