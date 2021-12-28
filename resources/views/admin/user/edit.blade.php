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

                <h5 class="breadcrumbs-title">Update User</h5>

                <ol class="breadcrumbs">

                    <li><a href="index.html">Dashboard</a></li>

                    <li><a href="index.html">User</a></li>

                    <li class="active">Update User</li>

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

                        <form class="contact-form" action="{{route('admin.user.update',$user['id'])}}" method="post">

                          @csrf

                        @method("PUT")

                          <div class="row">

                            <div class="input-field col s3">

                              <input id="name" name="user_name" value="{{$user['user_name']}}" type="text">

                              <label for="first_name" class="">User Name</label>

                            </div>

                            <div class="input-field col s3">

                              <input id="name" name="first_name" value="{{$user['first_name']}}" type="text">

                              <label for="first_name" class="">First Name</label>

                            </div>


                            <div class="input-field col s3">

                              <input id="name" name="last_name" value="{{$user['last_name']}}" type="text">

                              <label for="first_name" class="">Last Name</label>

                            </div>

                            <div class="input-field col s3">

                              <input id="name" name="email" value="{{$user['email']}}" type="text">

                              <label for="first_name" class="">Email Name</label>

                            </div>

                          </div>





                          <div class="row">

                

                            <div class="input-field col s4">

                              <input id="name" name="country" value="{{$user['country']}}" type="text">

                              <label for="first_name" class="">Country</label>

                            </div>


                            <div class="input-field col s4">

                              <input id="name" name="city" value="{{$user['city']}}" type="text">

                              <label for="first_name" class="">City</label>

                            </div>

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['roles'][0]['name']}}" type="text">

                              <label for="first_name" class="">Role</label>

                            </div>

                          </div>


                          <div class="row">

                          <div class="input-field col s6">

                                <select id="parent_id" name="status">
                                <option value="1" {{ $user['status'] == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $user['status'] == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>

                                <label for="first_name" class="">Status</label>

                                </div>


                                <div class="input-field col s6">

                                  <select id="parent_id" name="verified_email">
                                  <option value="1" {{ $user['verified_email'] == 1 ? 'selected' : '' }}>Active</option>
                                  <option value="0" {{ $user['verified_email'] == 0 ? 'selected' : '' }}>Deactive</option>
                                  </select>

                                  <label for="first_name" class="">Account Verify</label>
  
                                  </div>
                            </div>

                            @if($user['roles'][0]['name']=="Expert")

                            <h5>Expert Skill</h5>
                          <div class="row">

                

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertSkill']['pool']}}" type="text">

                              <label for="first_name" class="">Service</label>

                            </div>
                            <div class="input-field col s4">

                              <span>{{json_decode($user['expertSkill']['skills'])}}</span>

                            </div>

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertSkill']['rate']}}" type="text">

                              <label for="first_name" class="">Rate</label>

                            </div>

                          </div>



                          <h5>Expert Information</h5>
                          
                          <div class="row">

                

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertInformation']['language']}}" type="text">

                              <label for="first_name" class="">language</label>

                            </div>


                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertInformation']['professional_title']}}" type="text">

                              <label for="first_name" class="">Professional Title</label>

                            </div>

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertInformation']['professional_description']}}" type="text">

                              <label for="first_name" class="">Professional Description</label>

                            </div>

                          </div>


                          <h5>Expert Education</h5>

                          
                          <div class="row">

                

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertEducation']['university_name']}}" type="text">

                              <label for="first_name" class="">university_name</label>

                            </div>


                            <div class="input-field col s4">

                              <input id="name"  readonly value="{{$user['expertEducation']['start_year']}}" type="text">

                              <label for="first_name" class="">Start Year</label>

                            </div>

                            <div class="input-field col s4">
                              <input id="name" readonly value="{{$user['expertEducation']['end_year']}}" type="text">

                              <label for="first_name" class="">End Year</label>

                            </div>

                          </div>

                          <div class="row">

                

                            <div class="input-field col s6">

                              <input id="name" readonly value="{{$user['expertEducation']['certificate_id']}}" type="text">

                              <label for="first_name" class="">Certificate ID</label>

                            </div>


                            <div class="input-field col s6">

                              <input id="name" readonly value="{{$user['expertEducation']['certificate_name']}}" type="text">

                              <label for="first_name" class="">Certificate Name</label>

                            </div>

                          </div>


                          <h5>Expert Exprience</h5>
                          <div class="row">

                

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertExprience']['title']}}" type="text">

                              <label for="first_name" class="">Title</label>

                            </div>


                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertExprience']['start_year']}}" type="text">

                              <label for="first_name" class="">Start Year</label>

                            </div>

                            <div class="input-field col s4">
                              <input id="name" readonly value="{{$user['expertExprience']['end_year']}}" type="text">

                              <label for="first_name" class="">End Year</label>

                            </div>

                          </div>





                          
                          <h5>Expert Security Question</h5>
                          <div class="row">

                

                            <div class="input-field col s4">

                              <input id="name" readonly value="{{$user['expertSecurityQuestion']['question']}}" type="text">

                              <label for="first_name" class="">Question</label>

                            </div>


                            <div class="input-field col s4">
  
                              <input id="name" readonly value="{{$user['expertSecurityQuestion']['answar']}}" type="text">

                              <label for="first_name" class="">Answar</label>

                            </div>
                    

                          </div>

                          @endif

                            <div class="row">

                              <div class="input-field col s12">

                                <button class="btn btn-block indigo waves-effect waves-light right" type="submit">Update

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