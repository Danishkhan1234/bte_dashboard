@extends('layout.app')

@section('content')



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

                <h5 class="breadcrumbs-title">Update Service</h5>

                <ol class="breadcrumbs">

                    <li><a href="index.html">Dashboard</a></li>

                    <li><a href="index.html">Service</a></li>

                    <li class="active">Update Service</li>

                </ol>

              </div>

            </div>

          </div>

        </div>





          <div class="">

          <div class="section container">



 



             

            <div id="contact-page" class="card">

                <div class="card-content">                    



                    <div class="row">

                      <div class="col s12">

                        <form class="contact-form" action="{{route('admin.service.update',$service['id'])}}" method="post">

                          @csrf

                        @method("PUT")

                        <div class="row">

                            <div class="input-field col s12">

                              <input id="name" name="name" value="{{$service['name']}}" type="text">

                              <label for="first_name" class="">Service Name</label>

                            </div>

                          </div>

                            <div class="row">

                              <div class="input-field col s12">

                                <button class="btn btn-block indigo waves-effect waves-light right" type="submit">Submit

                                  <i class="mdi-content-send right"></i>

                                </button>

                              </div>

                            </div>

                          </div>

                        </form>

                      </div>                      

                    </div>

                </div>

            </div>            

          </div>

        </div>



@endsection