<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function addHobbiesPage(){
        return view('user.addHobbiesPage');
    }
    function addHobbies(Request $request){
        $id = auth()->user()->id;
        $data = [
            'hobbies' => $request->hobbies
        ];
        User::where('id',$id)->update($data);
        return back()->with(['addSuccess'=>'Your hobbies is added successfully!']);
    }

    function editProfilePage(){
        $id = auth()->user()->id;
        $user = User::where('id',$id)->get();
        return view('user.editProfilePage')->with(['user'=> $user]);
    }

    function editProfile(Request $request){
        $id = auth()->user()->id;
        $validator = $this->requestProfileValidator($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }
        $profileData = $this->getProfileData($request);
        User::where('id',$id)->update($profileData);
        return back()->with('updateSuccess','Update Profile Successsfully!');
    }

    //get Profile Data
    private function getProfileData($request){
        $data = [];
        if(isset($request->name)){
            $data['name'] = $request->name;
        }
        if(isset($request->age)){
            $data['age'] = $request->age;
        }
        if(isset($request->gender)){
            $data['gender'] = $request->gender;
        }
        if(isset($request->date_of_birth)){
            $data['date_of_birth'] = $request->date_of_birth;
        }
        if(isset($request->address)){
            $data['address'] = $request->address;
        }
        return $data;

    }
    //request Profile Validator
    private function requestProfileValidator($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
        ]);
        return $validator;
    }

    //search Data
    function searchData(Request $request){
        $searchData = $request->searchData;
        Session::put('SEARCH',$searchData); //create Session
        $sessionData = Session::get('SEARCH'); //get Session
        $resultData = User::where('name','like','%'.$searchData.'%')
                            ->orWhere('id',$searchData)
                            ->orWhere('address','like','%'.$searchData.'%')
                            ->orWhere('gender','like','%'.$searchData.'%')
                            ->orWhere('age',$searchData)
                            ->get();


        return view('searchResultPage')->with(['result'=>$resultData,'session'=>$sessionData]);
    }

    //user Details
    function userDetails($id){
        $userData = User::where('id',$id)->get();
        return view('userDetails')->with(['user'=>$userData]);
    }

}
