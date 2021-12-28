@extends('layout.app')
@section('content')
@extends('layout.app')
@section('content')



<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <!-- card stats start -->
                    <div id="card-stats" class="pt-0">
                        <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <h1 class="card-title" style="font-size: 30px;">Update Work Level</h1>
                                        <br> 
                                        <div class="row">
                                            <div class="col s12">
                                                <div id="page-length-option_wrapper" class="dataTables_wrapper">
                                                    <div class="dataTables_length" id="page-length-option_length">
                                                        <a href="{{route('admin.work_level')}}" class="waves-effect waves-light btn gradient-45deg-light-red z-depth-4 mr-1 mb-2" type="submit" name="action">Back
                                                            <i class="material-icons right">add</i>
                                                        </a>
                                                    </div>
                                                    <br>

                                                    <br>
                                                    <br>
                                                    <div id="view-input-fields" class="active">
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <form class="row" action="{{route('admin.work_level.update',$level['id'])}}" method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="col s12">
                                                                        <div class="input-field col s12">
                                                                            <input  id="first_name1" value="{{$level['name']}}" name="name" type="text" class="validate">
                                                                            <label for="first_name1" class="active">Skill Name</label>
                                                                        </div>
                                                                    </div>
                                                                <div class="row">    
                                                                    <button type="submit" class="left mt-3 mb-4 ml-2 btn waves-effect waves-light gradient-45deg-purple-deep-orange">Update Skill</button>
                                                                </div>
                                                                    </div>
                                                                </form>
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
            </div>
        </div>
    </div>
</div>

@endsection


@endsection