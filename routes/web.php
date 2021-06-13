<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcomeBootstrap');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $hobbies = auth()->user()->hobbies;
    $id = auth()->user()->id;
    $age = auth()->user()->age;
    $address = auth()->user()->address;
    $hobbies = auth()->user()->hobbies;
    $user = User::where('id','!=',$id)->get();

    $sameAgeUser = User::where('id','!=',$id)
                        ->where('age',$age)
                        ->get();

    if($sameAgeUser->isEmpty()){
        $sameAgeUser = null;
    }
    $sameAddressUser = User::where('id','!=',$id)
                            ->where('address',$address)
                            ->get();
    if($sameAddressUser->isEmpty()){
        $sameAddressUser = null;
    }
    $sameHobbiesUser = User::where('id','!=',$id)
                            ->where('hobbies',$hobbies)
                            ->get();
    if($sameHobbiesUser->isEmpty()){
        $sameHobbiesUser = null;
    }

    if(Session::has('SEARCH')){
        $sessionData = Session::get('SEARCH');
    }
    else{
        $sessionData = "";
    }

    Session::forget('SEARCH'); //delete session

    return view('dashboard')->with(['hobbies'=>$hobbies,'user'=>$user,'sameAgeUser'=>$sameAgeUser,'sameAddressUser' => $sameAddressUser,'sameHobbiesUser'=>$sameHobbiesUser,'session'=>$sessionData]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('addHobbiesPage','UserController@addHobbiesPage')->name('addHobbiesPage');
Route::middleware(['auth:sanctum', 'verified'])->post('addHobbies','UserController@addHobbies')->name('addHobbies');

//edit profile
Route::middleware(['auth:sanctum', 'verified'])->get('editProfilePage','UserController@editProfilePage')->name('editProfilePage');
Route::middleware(['auth:sanctum', 'verified'])->post('editProfile','UserController@editProfile')->name('editProfile');

//searchData
Route::middleware(['auth:sanctum', 'verified'])->post('searchData','UserController@searchData')->name('searchData');

//userDetails
Route::middleware(['auth:sanctum', 'verified'])->get('userDetails/{id}','UserController@userDetails')->name('userDetails');
