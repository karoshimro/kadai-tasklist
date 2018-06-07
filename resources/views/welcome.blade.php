@extends('layouts.app')

@section('content')

<?php
class Jumping{
  public function jump(){
    return view('welcome');
    // echo "jump";
}  
}
?>

    
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Task manager</h1>
                 {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>

@endsection