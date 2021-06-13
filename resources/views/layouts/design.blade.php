<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Josefin+Slab:wght@100&display=swap');
        body {
            background-color: #D9AFD9;
            background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);
            height:850px;

        }
        .wrapper{
            margin: 0;
            padding:0;
            box-sizing: border-box;
            list-style:none;
            font-family: 'Josefin Sans', sans-serif;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width:450px;
            display:flex;

        }
        .wrapper .left{
            width:35%;
            background:linear-gradient(to right,#01a9ac,#01dbdf);
            padding: 30px 25px;
            border-top-left-radius:5px;
            border-bottom-left-radius:5px;
            text-align:center;
            color:#fff;
        }

        .wrapper .left h4{
            margin-bottom:10px;
            color:black;
        }

        .wrapper .left p{
            color:black;
        }


        .wrapper .right{
            width:65%;
            background: #fff;
            border-top-right-radius: 5px;
            border-bottom-right-radius:5px;
            padding: 30px 25px;
        }

        .wrapper .right .details{
            margin-bottom:15px;
            padding-bottom:5px;
            border-bottom:1px solid #e0e0e0;
            color:#353c4e;
            letter-spacing:5px;
        }

</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand" href="{{route('dashboard')}}" style="font-family:courier_new;font-size:xx-large;color:white">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('editProfilePage')}}" style="font-family:aerial;font-size:large;color:white">Edit Profile <span class="sr-only">(current)</span></a>
          </li>

        </ul>
      </div>

      <div class="mr-5">
      <form action="{{route('logout')}}" method="post">
      @csrf
      <button type="submit" class="btn btn-danger float-right">Logout</button>
      </form>
      </div>
      <form class="form-inline my-2 my-lg-0" action="{{route('searchData')}}" method="post">
      @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchData" >
        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    @yield('content')
