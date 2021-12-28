@extends('layout.app')

@section('content')

      <!-- START CONTENT -->

      <section id="content">

        

        <!--breadcrumbs start-->

        <div id="breadcrumbs-wrapper">

            <!-- Search for small screen -->

            <div class="header-search-wrapper grey hide-on-large-only">

                <i class="mdi-action-search active"></i>

                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Data">

            </div>

          <div class="container">

            <div class="row">

              <div class="col s12 m12 l12">

                <h5 class="breadcrumbs-title">Users</h5>

                <ol class="breadcrumbs">

                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                    <li class="active">Users</li>

                </ol>

              </div>

            </div>

          </div>

        </div>

        <!--breadcrumbs end-->

        <div class="col s12">

            <div class="container">

                <!-- users list start -->

                <section class="users-list-wrapper section">

                    <div class="users-list-filter">

                        <div class="card-panel">

                            <div class="row">

                                <form method="get" action="{{route('admin.user')}}" >

                                    <div class="col s12 m6 l3">

                                        <label for="users-list-verified">Verified</label>

                                        <div class="input-field">

                                            <select class="form-control" name="is_verified" id="users-list-verified">

                                                <option value="">Any</option>

                                                <option value="1">Yes</option>

                                                <option value="0">No</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col s12 m6 l3">

                                        <label for="users-list-role">Role</label>

                                        <div class="input-field">

                                            <select class="form-control" name="roles" id="users-list-role">

                                                <option value="">Any</option>

                                                <option value="2">Seekers</option>

                                                <option value="1">Experts</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col s12 m6 l3">

                                        <label for="users-list-status">Status</label>

                                        <div class="input-field">

                                            <select class="form-control" name="status" id="users-list-status">

                                                <option value="">Any</option>

                                                <option value="1">Active</option>

                                                <option value="0">Deactive</option>

                                            </select>

                                        </div>

                                    </div>

                                    

                                    <div class="col s12 m6 l3 display-flex align-items-center show-btn" style="padding-top:40px; ">

                                        <button type="submit" class="btn btn-block indigo waves-effect waves-light">Show</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <div id="table-datatables">

                    <div class="card-panel">

                    <div class="row">

                                <!-- datatable start -->

                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">

                                        <thead>

                                            <tr>

                                                <th>Id</th>

                                                <th>Image</th>

                                                <th>User Name</th>

                                                <th>Email</th>

                                                <th>Role</th>

                                                <th>Status</th>

                                                <th>Options</th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                        @if(isset($users))
                                            @foreach ($users as $user)

                                            <tr>

                                                <td>{{$user['id']}}</td>

                                                <td><img style="height:50px; width:50px; border-radius:50%;" src="http://localhost:1212/bte_backend1/public/images/avatar.jpg" alt=""></a></td>

                                                <td>{{$user['user_name']}}</a></td>

                                                <td>{{$user['email']}}</td>

                                                <td>{{$user['roles'][0]['name']}}</td>

                                                <td>@if($user['status']==1) <span class="chip green lighten-5">

                                                <span class="green-text">Active</span>

                                                </span>@else <span class="chip red lighten-5">

                                                    <span class="red-text">Deactive</span>

                                              </span> @endif </td>  
                                              

        

                                                <td>

                                                <form action="" method="POST">
                            <a class="btn btn-block indigo waves-effect waves-light" href="{{route('admin.user.edit',$user['id'])}}"><i class="mdi-image-edit"></i></a>
                            <a class="btn btn-block indigo waves-effect waves-light" href="{{route('admin.user.show',$user['id'])}}"><i class="mdi-image-remove-red-eye"></i></a>
                            <!--<a class="btn btn-sm" href=""><i class="mdi-image-edit"></i></a>-->
                            <!--<button class="btn" type="submit"><i class="mdi-action-delete"></i></button>-->
                                </form>
                                                </td>           

                                           </tr>

                                            @endforeach
                                            @endif

                                        </tbody>

                                    </table>

                                </div>

                                <!-- datatable ends -->

                            </div>

                        </div>

                    </div>

                </section>

                <!-- users list ends -->

                <!-- START RIGHT SIDEBAR NAV -->



                <!-- END RIGHT SIDEBAR NAV -->

            </div>

</section>







@endsection