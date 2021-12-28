@extends('layout.app')
@section('content')
      <!-- //////////////////////////////////////////////////////////////////////////// -->

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
                <h5 class="breadcrumbs-title">Cities</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li class="active">City</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

        <!--start container-->
                <div class="container" style="border: sloid red 1px;">
          <div class="section">

            <!--DataTables example-->
            <div id="table-datatables">
              <div class="row">

                <div class="col s12">
                @if (session('message'))
                <div id="card-alert" class="card green lighten-5">
                      <div class="card-content green-text">
                        <p>{{ session('message') }}.</p>
                      </div>
                      <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    @endif
                <table id="data-table-simple" class="responsive-table display" cellspacing="0">

                <p><a href="{{route('admin.city.create')}}" class="btn waves-effect waves-light blue">Create city</a></p>
                <thead>
                    <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Country Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr role="row" class="even">
                            <td tabindex="0" class="sorting_1">{{$city['id']}}</td>
                            <td>{{$city['name']}}</td>
                            <td>{{$city['country']}}</td>
                            <td>{{date('d-F-Y h:i:s', strtotime($city['created_at']))}}</td>
                            <td>{{date('d-F-Y h:i:s', strtotime($city['updated_at']))}}</td>
                            <td>
                            <form action="{{route('admin.city.delete',$city['id'])}}" method="POST">
                            @csrf
                            @method('delete')
                            <a class="btn" href="{{route('admin.city.edit',$city['id'])}}"><i class="mdi-image-edit"></i></a>
                            <button class=" btn " type="submit"><i class="mdi-action-delete
"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                        @endforeach
                </tbody>
                  </table>
                </div>
              </div>
            </div> 
            <br>
            <!--DataTables example Row grouping-->
           
          </div>
          <!-- Floating Action Button -->
            <!-- Floating Action Button -->
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->

      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START RIGHT SIDEBAR NAV-->
      @section('js')
      <script type="text/javascript">
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
  
  $(document).ready(function(){
    $.ajax({
  url : "/bte_backend1/country",
  type : "GET",
     success: function (data) {
         console.log(data);
                },
            error: function (data) {
                console.log('Error:', data);
            }
  });
});

</script>
@endsection
@endsection