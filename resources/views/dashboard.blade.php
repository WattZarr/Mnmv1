@extends('layouts.design')

@section('content')

    <div class="container">
    @if($hobbies == null)
        <div class="mt-5">
        <p style="font-size:xx-large;font-family:courier_new">We recommend you to add your hobbies. <br>
        So we could find another user who have same hobbies with you.
        </p>
        <br>
        <p style="font-size:xxx-large;font-family:garamond">Have fun and enjoy!!
        </p>
        <p style="font-family:bookman;font-size:large">
        You can add your hobbies from here...
        </p>
        <a href="{{route('addHobbiesPage')}}"><button type="submit" class="btn btn-primary">Add hobbie</button></a>
        </div>
    @else
    <div class="row mt-3">
    <legend style="background-color:lightgreen;font-family:verdana">All</legend>
        @foreach($user as $item)
        <div class="col-sm-4 mt-3">
        <div class="card">
          <h3 class="card-header">Name => {{$item->name}}</h5>
          <div class="card-body" style="background-color:grey">
            <h5 class="card-title">Age => {{$item->age}}</h5>
            <p class="card-text">Address => {{$item->address}}</p>
            <p class="card-text">Gender => {{$item->gender}}</p>
            <a href="{{route('userDetails',$item->id)}}" class="btn btn-primary">Interesting?</a>
          </div>
        </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-3">
    <legend style="background-color:lightgreen;font-family:verdana">User with same age</legend>
        @if($sameAgeUser == null)
          <p style="font-size:x-large;font-family:courier">Sorry!There is no user who has same age with you.</p>
        @else
          @foreach($sameAgeUser as $item)
          <div class="col-sm-4 mt-3">
          <div class="card">
            <h3 class="card-header">Name => {{$item->name}}</h5>
            <div class="card-body" style="background-color:grey">
              <h5 class="card-title">Age => {{$item->age}}</h5>
              <p class="card-text">Address => {{$item->address}}</p>
              <p class="card-text">Gender => {{$item->gender}}</p>
              <a href="{{route('userDetails',$item->id)}}" class="btn btn-primary">Interesting?</a>
            </div>
          </div>
          </div>
          @endforeach
        @endif
    </div>
    <div class="row mt-3">
    <legend style="background-color:lightgreen;font-family:verdana">User with same address</legend>
        @if($sameAddressUser == null)
          <p style="font-size:x-large;font-family:courier">Sorry!There is no user who has same address with you.</p>
        @else
          @foreach($sameAddressUser as $item)
          <div class="col-sm-4 mt-3">
          <div class="card">
            <h3 class="card-header">Name => {{$item->name}}</h5>
            <div class="card-body" style="background-color:grey">
              <h5 class="card-title">Age => {{$item->age}}</h5>
              <p class="card-text">Address => {{$item->address}}</p>
              <p class="card-text">Gender => {{$item->gender}}</p>
              <a href="{{route('userDetails',$item->id)}}" class="btn btn-primary">Interesting?</a>
            </div>
          </div>
          </div>
          @endforeach
        @endif
    </div>
    <div class="row mt-3">
    <legend style="background-color:lightgreen;font-family:verdana">User with same Hobby</legend>
        @if($sameHobbiesUser == null)
          <p style="font-size:x-large;font-family:courier">Sorry!There is no user who has same hobby with you.</p>
        @else
          @foreach($sameHobbiesUser as $item)
          <div class="col-sm-4 mt-3">
          <div class="card">
            <h3 class="card-header">Name => {{$item->name}}</h5>
            <div class="card-body" style="background-color:grey">
              <h5 class="card-title">Age => {{$item->age}}</h5>
              <p class="card-text">Address => {{$item->address}}</p>
              <p class="card-text">Gender => {{$item->gender}}</p>
              <a href="{{route('userDetails',$item->id)}}" class="btn btn-primary">Interesting?</a>
            </div>
          </div>
          </div>
          @endforeach
        @endif
    </div>
    @endif
    </div>
@endsection
