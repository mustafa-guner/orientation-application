<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\City;
use App\Models\Gender;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function registerPage(){
        $cities = City::all();
        $genders = Gender::all();
        return view("auth.register",compact("cities","genders"));

    }

    public function loginPage(){
        return view("auth.login");
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request){
        try{
            if(request()->hasfile("profile_image")){
                $profile_image = time().'_profile_image_'.'.'.request()->profile_image->getClientOriginalExtension();
                request()->profile_image->move(public_path('profile_images'), $profile_image);
                request()->profile_image = $profile_image;
            }
           $user =  User::create([
                'first_name'=>$request->validated()["first_name"],
                'last_name'=>$request->validated()["last_name"],
                'phone_no'=>$request->validated()["phone_no"],
                'gender_id'=>$request->validated()["gender_id"],
                'city_id'=>$request->validated()["city_id"],
                'user_type_id'=>UserType::NORMAL_USER,
                'birth_date'=>$request->validated()["birth_date"],
                'profile_image'=>$request->validated()["profile_image"],
                'email'=>$request->validated()["email"],
                'password'=>$request->validated()["password"],
            ]);

            auth()->login($user);
            return redirect('/')->with("success","Account successfully registered.");
        }catch(\Exception $e){
           return redirect()->back()->with("error","Account registration has failed.");
        }
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request){
        try{
            if(!Auth::validate($request->validated())):
                return redirect()->back()->withErrors(trans('auth.failed'));
            endif;
            $user = Auth::getProvider()->retrieveByCredentials($request->validated());
            Auth::login($user);

            return $this->authenticated($request, $user);
        }catch(\Exception $e){
           return redirect()->back()->with("error","Could not logged in.");
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }


    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
