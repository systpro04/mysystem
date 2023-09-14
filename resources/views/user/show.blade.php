@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
    </div>




    <section class="content">
        <div class="container-fluid">
          <div class="row"> 
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    @if($user->image)
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/users/'. $user->image )}}" style="height: 80px; width: 80px; border-radius: 50%"alt="User profile picture">
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/users/default.png' )}}" style="height: 80px; width: 80px; border-radius: 50%"alt="User profile picture">
                    @endif  
                </div>
  
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
  
                  <p class="text-muted text-center">Web Developer</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>
  
                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>


</div>

@endsection