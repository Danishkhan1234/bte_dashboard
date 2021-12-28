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
                                        <h1 class="card-title" style="font-size: 30px;">Work Level</h1>
                                        <br> 
                                        <div class="row">
                                            <div class="col s12">
                                                <div id="page-length-option_wrapper" class="dataTables_wrapper">
                                                    <div class="dataTables_length" id="page-length-option_length">
                                                        <a href="{{route('admin.work_level.create')}}" class="waves-effect waves-light btn gradient-45deg-light-red z-depth-4 mr-1 mb-2" type="submit" name="action">Create Work Level
                                                            <i class="material-icons right">add</i>
                                                        </a>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br> 
                                                    @if (session('message'))
                                                    <div class="card-alert card green lighten-5">
                                                        <div class="card-content green-text">
                                                            <p> {{ session('message') }}</p>
                                                        </div>
                                                        <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                   @endif
                                                    <table id="page-length-option" class="display dataTable dtr-inline" role="grid" aria-describedby="page-length-option_info" style="width: 1165px;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th rowspan="1" colspan="1" style="width: 50px;">ID#</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="page-length-option" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Work Level Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="page-length-option" rowspan="1" colspan="1" style="width: 200px;" aria-label="Position: activate to sort column ascending">Created At</th>
                                                            <th class="sorting" tabindex="0" aria-controls="page-length-option" rowspan="1" colspan="1" style="width: 200px;" aria-label="Salary: activate to sort column ascending">Updated At</th>
                                                            <th  rowspan="1" colspan="1" style="width: 250px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($levels as $level)
                                                            <tr role="row" class="even">
                                                            <td tabindex="0" class="sorting_1">{{$level['id']}}</td>
                                                            <td>{{$level['name']}}</td>
                                                            <td>{{$level['created_at']}}</td>
                                                            <td>{{$level['updated_at']}}</td>
                                                            <td>
                                                                <form action="{{route('admin.work_level.delete',$level['id'])}}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <a class="waves-effect waves-light btn gradient-45deg-light-blue-cyan z-depth-4 mr-1 mb-2" href="{{route('admin.work_level.edit',$level['id'])}}">Edit</a>
                                                                    <button class="waves-effect waves-light btn gradient-45deg-light-red z-depth-4 mr-1 mb-2" type="submit">Delete</button>
                                                                </form>
                                                            </td>  </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="dataTables_info" id="page-length-option_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="page-length-option_paginate"><a class="paginate_button previous disabled" aria-controls="page-length-option" data-dt-idx="0" tabindex="-1" id="page-length-option_previous">Previous</a><span><a class="paginate_button current" aria-controls="page-length-option" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="page-length-option" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="page-length-option" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="page-length-option" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="page-length-option" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="page-length-option" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="page-length-option" data-dt-idx="7" tabindex="0" id="page-length-option_next">Next</a></div></div>
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