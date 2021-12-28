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

                <h5 class="breadcrumbs-title">Tickets</h5>

                <ol class="breadcrumbs">

                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                    <li class="active">Tickets</li>

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

                                <form>

                                    <div class="col s12 m6 l3">

                                        <label for="users-list-verified">Category</label>

                                        <div class="input-field">

                                            <select class="form-control" id="users-list-verified">

                                                <option value="">Any</option>

                                                <option value="Yes">Tickets</option>

                                                <option value="No">Contracts</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col s12 m6 l3">

                                        <label for="users-list-role">Work Level</label>

                                        <div class="input-field">

                                            <select class="form-control" id="users-list-role">

                                                <option value="">Any</option>

                                                <option value="User">Senior</option>

                                                <option value="Staff">Middle</option>

                                                <option value="Staff">Junior</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col s12 m6 l3">

                                        <label for="users-list-status">Contract Type</label>

                                        <div class="input-field">

                                            <select class="form-control" id="users-list-status">

                                                <option value="">Any</option>

                                                <option value="Active">Hourley</option>

                                                <option value="Close">Fixed</option>

                                                <option value="Banned">Long Term</option>

                                            </select>

                                        </div>

                                    </div>



                                    <div class="col s12 m6 l3">

                                        <label for="users-list-status">Status</label>

                                        <div class="input-field">

                                            <select class="form-control" id="users-list-status">

                                                <option value="">Any</option>

                                                <option value="Active">Pending</option>

                                                <option value="Active">Accepted</option>

                                                <option value="Active">Rejected</option>

                                                <option value="Active">Completed</option>



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

                                                <th>Title</th>

                                                <th>Work Level</th>

                                                <th>Contract Type</th>

                                                <th>Payment Type</th>

                                                <th>Status</th>

                                                <th>Options</th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                        @if(isset($tickets))
                                            @foreach ($tickets as $ticket)

                                            <tr>

                                                <td>{{$ticket['id']}}</td>

                                                <td>{{$ticket['title']}}</a></td>

                                                <td>{{$ticket['workLevel']}}</td>

                                                <td>{{$ticket['contractType']}}</td>

                                                <td>{{$ticket['paymentType']}}</td>

                                               <td>

                                               <span class="chip green lighten-5">

                                                <span class="green-text">{{$ticket['status']}}</span>

                                                </span>       

                                            </td>

                                                <td>

                                                <a style="border-radius:30px;" class="btn dropdown-button indigo waves-effect waves-light " data-activates="dropdown1">Action<i class="mdi-navigation-arrow-drop-down right"></i></a>

                                                <ul id="dropdown1" class="dropdown-content">

                                            <li><a href="#" class="-text">Edit</a>

                                            </li>

                                            <li><a href="#" class="-text">Show</a>

                                            </li>

                                        </ul>                      

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