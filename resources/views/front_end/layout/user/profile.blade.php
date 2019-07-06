@extends('layouts.master')
@section('page_title', 'Profile')

@section('breadcumb_nav')
    <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a>
    </li>
    <li class="breadcrumb-item active">My Account</li>  
@endsection

 @section('content')
  <section id="listData">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header" style="padding-bottom: 0px;">
            <h4 class="card-title">User Data</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">

            <!-- User Basic Info -->
            <form class="form-horizontal" role="form" style="padding-left: 10px;">
              <h4 class="form-section"><i class="fa fa-file-text-o"></i> Basic Info</h4>
              <div class="row">
                <label class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><strong>{{$user->name}}</strong></p>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4 control-label">Email</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><strong>{{$user->email}}</strong></p>
                </div>
              </div>  
              <div class="row">
                <label class="col-sm-4 control-label">Gender</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><strong>{{ $user->gender == '1' ? 'Laki - laki' : 'Perempuan' }}</strong></p>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4 control-label">No Telepon</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><strong>{{$user->phone}}</strong></p>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-4">
                  <p class="form-control-static"><strong>{{$user->address}}</strong></p>
                </div>
              </div>                                                                 
            </form>
            <div class="pull-right" style="margin-bottom: 20px;">
              <button data-toggle="modal" data-target="#basic" class="btn btn-outline-secondary">
                Sesuaikan
              </button>
            </div>   

            <!-- Change Password -->
            <form class="form-horizontal" role="form" style="padding-left: 10px; margin-top: 40px;">
              <h4 class="form-section"><i class="fa fa-key"></i> Password</h4>
              <p>Password anda telah dienkripsi oleh sistem kami. Pastikan anda memiliki pola password yang kuat untuk melindungi akun anda.</p>                  
            </form>
            <div class="pull-left" style="margin-bottom: 20px;">
              <button data-toggle="modal" data-target="#cp" class="btn btn-outline-secondary">
                Ganti Password
              </button>
            </div>   


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade text-left" id="cp" tabindex="-1" role="dialog"  aria-hidden="true">
    @include('modals.user.change_password')
  </div>

  <div class="modal fade text-left" id="basic" tabindex="-1" role="dialog"  aria-hidden="true">
    @include('modals.user.edit_basic')
  </div>

 @endsection 

 @section('customJS')

  <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css">
  <script src="../../../app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>

 @endsection