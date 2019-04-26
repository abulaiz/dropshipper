@extends('layouts.master')
@section('email', 'active')

@section('content')

<section id="tab-pane email">
    <div class ="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
            <div class="nav-vertical">

                 <!-- TAB MENU -->
            <ul class="nav nav-tabs nav-left nav-border-left">
              <li class="nav-item">
                <a class="nav-link active" id="pesan-masuk1" data-toggle="tab" href="#masuk1" aria-controls="masuk1" aria-expanded="true"><h4><i class="fa fa-inbox"></i><span class="mr-1 badge badge-default badge-success">Pesan Masuk</h4></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pesan-keluar1" data-toggle="tab" href="#keluar1" aria-controls="keluar1" aria-expanded="false"><h4><i class="fa fa-flag"></i><span class="mr-1 badge badge-default badge-info">Pesan Keluar</h4></span></a>
              </li>
            </ul>

             <div class="tab-content px-1">

                <div  role="tabpanel" class="tab-pane active" id="masuk1" aria-labelledby="pesan-masuk1" aria-expanded="true">
                        

    <!-- Tab Pesan Masuk -->
    <div class="email-app-list-wraper col-md-12 card p-0">
        <div class="email-app-list">
            <div id="users-list" class="list-group">
                <div class="users-list-padding media-list">
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-info">T</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading text-bold-500">Envato Market<span class="float-right"><span class="font-small-2 primary">11:18 PM</span></span></h6>
                            <p class="list-group-item-text text-truncate text-bold-600 mb-0">You have new comment...</p>
                            <p class="list-group-item-text mb-0">Hi Pixinvent...<span class="float-right primary"><span class="badge badge-warning mr-1">Work</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media bg-blue-grey bg-lighten-5 border-right-primary border-right-2">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Wayne Burton <span class="font-small-2 float-right">Today</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Project ABC Status...</p>
                            <p class="list-group-item-text mb-0">Andy, Lte's...<span class="float-right primary"><span class="badge badge-success mr-1">Private</span> <i class="font-medium-1 ft-star warning"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-5.png" alt="Generic placeholder image"></span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Sarah Montgomery <span class="font-small-2 float-right">Yesterday</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Your New UI.</p>
                            <p class="list-group-item-text text-truncate mb-0">Everything looks good.</p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-success">H</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Heather Howell <span class="float-right"><i class="fa-paperclip fa"></i> <span class="font-small-2">15 July</span></span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Thanks, Let's do it.</p>
                            <p class="list-group-item-text mb-0">Can we connect today...<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.png" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kelly Reyes <span class="font-small-2 float-right">12 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">I paid it, Thanks.</p>
                            <p class="list-group-item-text mb-0">Check once...<span class="float-right primary"><span class="badge badge-warning mr-1">Work</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-warning">V</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Vincent Nelson <span class="font-small-2 float-right">11 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0"><i class="ft-check primary font-small-2"></i> Where are you John?</p>
                            <p class="list-group-item-text mb-0">Party tonight ?<span class="float-right primary"><span class="badge badge-primary mr-1">Friends</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-info">E</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Elizabeth Elliott <span class="font-small-2 float-right">8 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Okay, I will call you.</p>
                            <p class="list-group-item-text mb-0">Here they are work.<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="Generic placeholder image"></span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Sarah Montgomery <span class="font-small-2 float-right">Yesterday</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Your New UI.</p>
                            <p class="list-group-item-text text-truncate mb-0">Everything looks good.</p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-success">H</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Heather Howell <span class="float-right"><i class="fa-paperclip fa"></i> <span class="font-small-2">15 July</span></span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Thanks, Let's do it.</p>
                            <p class="list-group-item-text mb-0">Can we connect today...<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.png" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kelly Reyes <span class="font-small-2 float-right">12 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">I paid it, Thanks.</p>
                            <p class="list-group-item-text mb-0">Check once...<span class="float-right primary"><span class="badge badge-warning mr-1">Work</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-warning">V</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Vincent Nelson <span class="font-small-2 float-right">11 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0"><i class="ft-check primary font-small-2"></i> Where are you John?</p>
                            <p class="list-group-item-text mb-0">Party tonight ?<span class="float-right primary"><span class="badge badge-primary mr-1">Friends</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-info">E</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Elizabeth Elliott <span class="font-small-2 float-right">8 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Okay, I will call you.</p>
                            <p class="list-group-item-text mb-0">Here they are work.<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
                </div>

                <div class="tab-pane" id="keluar1" aria-labelledby="pesan-keluar1">
    
    <!-- Tab Pesan Keluar -->
    <div class="email-app-list-wraper col-md-12 card p-0">
        <div class="email-app-list">
            <div id="users-list" class="list-group">
                <div class="users-list-padding media-list">
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-info">T</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading text-bold-500">Tonny Deep
                                <span class="float-right"><span class="font-small-2 primary">4:14 AM</span></span>
                            </h6>
                            <p class="list-group-item-text text-truncate text-bold-600 mb-0">PixInvent, I fount you...</p>
                            <p class="list-group-item-text mb-0">I would be good.<span class="float-right primary"><span class="badge badge-danger mr-1">Family</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-danger">L</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading text-bold-500">Louis Welch <span class="float-right"><i class="fa-paperclip fa"></i> <span class="font-small-2 primary">2:15 AM</span></span></h6>
                            <p class="list-group-item-text text-truncate text-bold-600 mb-0">Thanks, Let's do it.</p>
                            <p class="list-group-item-text mb-0">Can we connect today...<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-warning">E</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading text-bold-500">Envato Market<span class="float-right"><span class="font-small-2 primary">11:18 PM</span></span></h6>
                            <p class="list-group-item-text text-truncate text-bold-600 mb-0">You have new comment...</p>
                            <p class="list-group-item-text mb-0">Hi Pixinvent...<span class="float-right primary"><span class="badge badge-warning mr-1">Work</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media bg-blue-grey bg-lighten-5 border-right-primary border-right-2">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Wayne Burton <span class="font-small-2 float-right">Today</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Project ABC Status...</p>
                            <p class="list-group-item-text mb-0">Andy, Lte's...<span class="float-right primary"><span class="badge badge-success mr-1">Private</span> <i class="font-medium-1 ft-star warning"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-5.png" alt="Generic placeholder image"></span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Sarah Montgomery <span class="font-small-2 float-right">Yesterday</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Your New UI.</p>
                            <p class="list-group-item-text text-truncate mb-0">Everything looks good.</p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-success">H</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Heather Howell <span class="float-right"><i class="fa-paperclip fa"></i> <span class="font-small-2">15 July</span></span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Thanks, Let's do it.</p>
                            <p class="list-group-item-text mb-0">Can we connect today...<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-8.png" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kelly Reyes <span class="font-small-2 float-right">12 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">I paid it, Thanks.</p>
                            <p class="list-group-item-text mb-0">Check once...<span class="float-right primary"><span class="badge badge-warning mr-1">Work</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-warning">V</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Vincent Nelson <span class="font-small-2 float-right">11 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0"><i class="ft-check primary font-small-2"></i> Where are you John?</p>
                            <p class="list-group-item-text mb-0">Party tonight ?<span class="float-right primary"><span class="badge badge-primary mr-1">Friends</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-info">E</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Elizabeth Elliott <span class="font-small-2 float-right">8 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Okay, I will call you.</p>
                            <p class="list-group-item-text mb-0">Here they are work.<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="Generic placeholder image"></span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Sarah Montgomery <span class="font-small-2 float-right">Yesterday</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Your New UI.</p>
                            <p class="list-group-item-text text-truncate mb-0">Everything looks good.</p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-success">H</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Heather Howell <span class="float-right"><i class="fa-paperclip fa"></i> <span class="font-small-2">15 July</span></span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Thanks, Let's do it.</p>
                            <p class="list-group-item-text mb-0">Can we connect today...<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md"><img class="media-object rounded-circle" src="../../../app-assets/images/portrait/small/avatar-s-10.png" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kelly Reyes <span class="font-small-2 float-right">12 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">I paid it, Thanks.</p>
                            <p class="list-group-item-text mb-0">Check once...<span class="float-right primary"><span class="badge badge-warning mr-1">Work</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-warning">V</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Vincent Nelson <span class="font-small-2 float-right">11 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0"><i class="ft-check primary font-small-2"></i> Where are you John?</p>
                            <p class="list-group-item-text mb-0">Party tonight ?<span class="float-right primary"><span class="badge badge-primary mr-1">Friends</span> <i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md">
                                <span class="media-object rounded-circle text-circle bg-info">E</span>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Elizabeth Elliott <span class="font-small-2 float-right">8 July</span></h6>
                            <p class="list-group-item-text text-truncate mb-0">Okay, I will call you.</p>
                            <p class="list-group-item-text mb-0">Here they are work.<span class="float-right primary"><i class="font-medium-1 ft-star blue-grey lighten-3"></i></span></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
                </div>

             </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>

   
@endsection