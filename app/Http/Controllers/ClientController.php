<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clientcourse;
use App\Models\Designation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = array();
        $clients= Client::all();
        return view("Clients.clients_list")->with(["clients"=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Clients/addClient");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'profile_pic' => 'required|mimes:png,jpg,jpeg',
        ]);
        $designations = $request->destination_name;
        
        $imageName = time().'.'.$request->profile_pic->extension();  
        $request->profile_pic->move(public_path('images'), $imageName);
        $data["name"] = $request->name;
        $data["other"] = $request->other;
        $data["email"] = $request->email;
        $data["profile_pic"] = "https://www.kindpng.com/picc/m/24-248729_stockvader-predicted-adig-user-profile-image-png-transparent.png";
        // $imageName = time().'.'.$request->profile_pic->extension();  
        // $fileName = time().'_'.$request->profile_pic->getClientOriginalName();
        //     $filePath = $request->file('profile_pic')->storeAs('uploads', $fileName, 'public');
        // echo $filePath;
        //dd($request->profile_pic);
        // $res = $request->profile_pic->move(public_path('/uploads/clientprofiles'), time()."dfgfdgfdgdgdgfdgd.png");
        // echo $res;
        // $data["profile_pic"] = public_path('/uploads/clientprofiles/'.$imageName);
        
        // echo $filename;
        // die();
        // $request->file('profile_pic')->move(public_path('assets/images/client_profile'), "dfsdf.png");
        // $data["profile_pic"] = $filename;
        $client_id = Client::create($data);
        
        if(isset($designations)&&!empty($designations))
        foreach($designations as $key => $designation){
            $insertData["client_id"] = $client_id->id;
            $insertData["name"] = $request->destination_name[$key];
            $insertData["email"] = $request->destination_email[$key];
            $insertData["mobile"] = $request->destination_mobile[$key];
            $insertData["designation"] = $request->destination_pos[$key];
            Designation::insert($insertData);
        }

        if($client_id)
        return redirect()->route('clients')
            ->with('success','You have successfully add client.');
    }

    public function isEmailExists(Request $req){
        $email = $req->email;
        $result = Client::where(["email"=>$email])->get()->first();
        if($result){
            $response["status"] = true;
            return response($response, 200);
        }
        else{
            $response["status"] = false;
            return response($response, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id=0)
    {
       if(Clientcourse::where("client_id", $client_id)->delete()){
            $result = Client::where("id", $client_id)->delete();
       }    
       if($result)
        return redirect()->route('clients')
            ->with('success','You have successfully deleted client.');
    }
}
