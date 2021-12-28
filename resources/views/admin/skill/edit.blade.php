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

                <h5 class="breadcrumbs-title">Update Skill</h5>

                <ol class="breadcrumbs">

                    <li><a href="index.html">Dashboard</a></li>

                    <li><a href="index.html">Skill</a></li>

                    <li class="active">Update Skill</li>

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

                        <form class="contact-form" action="{{route('admin.skill.update',$skill['id'])}}" method="post">

                          @csrf

                        @method("PUT")

                        <div class="row">

                            <div class="input-field col s12">

                              <input id="name" name="name" value="{{$skill['name']}}" type="text">

                              <label for="first_name" class="">Skill Name</label>

                            </div>

                          </div>
                  
                          <div class="row">

                              <div class="input-field col s12">

                                <select name="service_id">

                        
                              @foreach($services as $service)

                              <option value="{{$service['id']}}" {{ $skill['service']['id'] == $service['id'] ? 'selected':'' }}>{{$service['name']}}</option>

                              @endforeach

                              </select>



                              </div>

                              </div>

                            <div class="row">

                              <div class="input-field col s12">

                                <button class="btn cyan waves-effect waves-light right" type="submit">Submit

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