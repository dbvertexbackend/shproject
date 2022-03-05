<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Clientcourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:1',
        ]);
        
        
        $credentials = $request->only('email', 'password');
         
            if (Auth::attempt($credentials)) {
               echo "sucesss";
               
                return redirect()->intended('dashboard')
                            ->withSuccess('You have Successfully logged in');
            }
        
         return redirect("/")->withErrors(['formerror' =>"Invalid Crediantials !"]);
    }


    public function logout(){
        Auth::logout();
    
        return Redirect('/');
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where("user_type", "!=", 0)->orderBy('id', 'DESC')->get();
        return view("users/users")->with(["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("/users/adduser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $firstname = $request->first_name;
        $last_name = $request->last_name;
        $user_type = $request->module_user;

        $accessTabs = array();
        if(isset($request->user_module))
        $accessTabs[] = "users";
        if(isset($request->client_module))
        $accessTabs[] = "clients";
        if(isset($request->course_module))
        $accessTabs[] = "courses";
        if(isset($request->attendance_module))
        $accessTabs[] = "attendances";
        
        $module_user = $request->module_user;
        $email = $request->email;
        $password = $request->password;
        $hashed = Hash::make($request->password);
        try{
        $result = User::insert(["first_name"=>$firstname, "last_name"=>$last_name, "user_type"=>$user_type, "module_user"=>$module_user, "email"=>$email, "password"=>$hashed, "accessTabs"=>implode(',', $accessTabs),   "created_at"=>date("Y-m-d H:i:s"), "updated_at"=>date("Y-m-d H:i:s")]);
        if($result){
            return redirect()->intended('users')
                            ->withSuccess('You have Successfully Added User');
        }
    }
    catch(Exception $e){
        echo $e;
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id=0)
    {
        Clientcourse::where("consultant_id", $user_id)->delete();
        $result = User::where("id", $user_id)->delete();
        if($result){
            return redirect()->back()
                            ->withSuccess('You have Successfully deleted User');
        }
    }
   
}
