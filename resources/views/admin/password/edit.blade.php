@extends('user.user_master')
@section('user')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="row" style="padding: 20px" ;>
        <div class="col-md-6">
            <h3>Change Password</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.password.update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Current Password</label>
                    <input id="current_password" type="password" class="form-control" name="oldpassword" >
                    @error('oldpassword')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">New Password</label>
                    <input id="password" type="password" class="form-control" name="password" >
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        </div><!-- End Col -->
    </div> <!-- End Row -->


@endsection
