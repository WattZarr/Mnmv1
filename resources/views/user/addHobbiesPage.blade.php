@extends('layouts.design')

@section('content')
   <form action="{{route('addHobbies')}}" method="post">
   @csrf
<div class="card text-center">
  <div class="card-header" style="font-size:x-large">
    What is your hobbies?
  </div>
  <div class="card-body">
    <h2 class="card-title">Choose Your hobbies</h3>
    <div class="card-body" style="font-size:large">
        <label>Here are some common Hobbies</label>
        <select class="form-control" name="hobbies">
          <option value="swimming">Swimming</option>
          <option value="playing_games">Playing Games</option>
          <option value="football">Football</option>
          <option value="basketball">Basketball</option>
          <option value="reading">Reading</option>
        </select>
      </div>
   <button type="submit" class="btn btn-primary">Add</button>
  </div>
  <div class="card-footer text-muted">
    .....Thanks.....
  </div>
</div>

@if(Session::has('addSuccess'))
    <p style="color:green;font-size:large;font-family:courier">{{Session::get('addSuccess')}}</p>
   @endif
</form>
<button class="btn btn-warning" onclick="goBack()">Back</button>
@endsection
<script>
function goBack() {
  window.history.back();
}
</script>