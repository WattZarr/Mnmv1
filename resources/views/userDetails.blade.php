@extends('layouts.design')

@section('content')
<div class="wrapper">
    <div class="left">
        <h4>Name</h4>
        <p>{{$user[0]->name}}</p>
        <h4>Address</h4>
        <p>{{$user[0]->address}}</p>
        <h4>Age</h4>
        <p>{{$user[0]->age}}</p>
    </div>
    <div class="right">
        <div class="details">
            <h2>User Details</h2>
            <hr></hr>
            <div class="details_data">
                <h4>Email</h4>
                <p>{{$user[0]->email}}</p>
                <h4>Hobbies</h4>
                <p>{{$user[0]->hobbies}}</p>
            </div>
            <a href="#" class="btn btn-primary">Chat</a>
        </div>
    </div>
</div>

@endsection
