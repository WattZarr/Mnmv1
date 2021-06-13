@extends('layouts.design')

@section('content')
<div class="container">
<div class="row mt-3">
    <legend style="background-color:lightgreen;font-family:verdana">....Search Result.....</legend>
        @foreach($result as $item)
        <div class="col-sm-4 mt-3">
        <div class="card">
          <h3 class="card-header">Name => {{$item->name}}</h5>
          <div class="card-body" style="background-color:grey">
            <h5 class="card-title">Age => {{$item->age}}</h5>
            <p class="card-text">Address => {{$item->address}}</p>
            <p class="card-text">Gender => {{$item->gender}}</p>
            <a href="#" class="btn btn-primary">Interesting?</a>
          </div>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
