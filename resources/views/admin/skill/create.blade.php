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

                <h5 class="breadcrumbs-title">Add Skill</h5>

                <ol class="breadcrumbs">

                    <li><a href="index.html">Dashboard</a></li>

                    <li><a href="index.html">Skill</a></li>

                    <li class="active">Add Skill</li>

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

                        <form class="contact-form" action="{{route('admin.skill.store')}}" method="post">

@csrf

                        <div class="row">

                            <div class="input-field col s12">

                              <input id="name" name="name" type="text">

                              <label for="first_name" class="">Skill Name</label>

                            </div>

                          </div>


                          <div class="row">

                          <div class="input-field col s12">

                            <select name="service_id">

                          <option value="" disabled selected>Choose your option</option>

                          @foreach($services as $service)

                          <option value="{{$service['id']}}">{{$service['name']}}</option>

                          @endforeach

                          </select>



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