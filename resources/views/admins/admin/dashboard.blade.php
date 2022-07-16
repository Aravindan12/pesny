@extends('admins.includes.app')

@section('content')
    @include('admins.layouts.navbar')
<!-- Side-bar starts -->
    @include('admins.layouts.sidebar')

    @include ('admins.layouts.right_sidebar')
<!-- Side-bar ends -->
<br><br>
      <!-- main-panel satrts -->
      <h1>Hi hello!</h1>
      <h1>My world</h1>
      <!-- main-panel ends -->
    
@endsection