@extends('user.user_master')
@section('user')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="row" style="padding: 20px" ;>
        <div class="col-md-6">
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Users Name</label>
                    <input type="text" class="form-control" id="username" name="name" value="{{$editData->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$editData->email}}">
                </div>
                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input type="file" class="form-control-file" id="image" name="profile_photo_path">
                </div>
                <div class="mb-3">
                    <img id="showImage" src="{{(!empty($editData->profile_photo_path))? url('upload/user_images/'.$editData->profile_photo_path):url('upload/no_image.jpg')}}" style="width:100px;height: 100px;">
                </div>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        </div><!-- End Col -->
    </div> <!-- End Row -->

    <script type="text/javascript">
         // Changes the Image to see the image that's going to be uploaded.
$(document).ready(function(){
    $('#image').change(function (e){
        var reader = new FileReader();
        reader.onload = function (e){
           $('#showImage').attr('src',e.target.result);
       }
       reader.readAsDataURL(e.target.files[0]);
    });
});

    </script>
@endsection
