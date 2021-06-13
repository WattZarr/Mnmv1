@extends('layouts.design')

@section('content')
   
<div class="container mt-5">
     @if(Session::has('updateSuccess'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{Session::get('updateSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form action="{{route('editProfile')}}" method="post">
    @csrf
        <legend class="mb-3">Your Profile</legend>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control"  name="name" value="{{old('name',$user[0]['name'])}}">
            @if($errors->has('name'))
            <p style="color:red">{{$errors->first('name')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control"  name="age" value="{{old('age',$user[0]['age'])}}">
            @if($errors->has('age'))
            <p style="color:red">{{$errors->first('age')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
            @if($user[0]['gender'] == "male")
            <option value="male" selected>Male</option>
            <option value="female">Female</option>
            @else
            <option value="male">Male</option>
            <option value="female" selected>Female</option>
            @endif
            </select>
        </div>
        <div class="form-group">
            <label>Date Of Birth</label>
            <input type="date" class="form-control"  name="date_of_birth" value="{{old('date_of_birth',$user[0]['date_of_birth'])}}"> 
            @if($errors->has('date_of_birth'))
            <p style="color:red">{{$errors->first('date_of_birth')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control"  name="address" value="{{old('address',$user[0]['address'])}}">
            @if($errors->has('address'))
            <p style="color:red">{{$errors->first('address')}}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection