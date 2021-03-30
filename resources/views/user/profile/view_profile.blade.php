@extends('user.user_master')
@section('user')
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="">
        <div class="card-body">
            <h4 class="card-title">User Name: {{$user->name}}</h4>
            <p class="card-text">User Email: {{$user->email}}</p>
            <a href="" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
@endsection
