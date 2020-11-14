@extends('layouts.master') 
@section('content')   
  <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>user save place</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li class="active">user save place</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                                <div class="widget-content">
                                    <!-- <div class="col-sm-12">
                                        <a href="add-place.html" class="custom-btn green-bc">add new place</a>
                                    </div> -->
                                    <div class="spacer-15"></div>
                                    <div class="table-responsive">          
                                        <table id="datatable"  class="table table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>user name</th>
                                                    <th>place name_en</th>
                                                    <th>place name_ar</th>
                                                    <th>Latitude</th>
                                                    <th>longitude</th>
                                                    <th>options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($saveplaces as $saveplace)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    
                                                    <td>
                                                       {{$saveplace->User->FullName}}
                                                    </td>
                                                    <td>
                                                      {{$saveplace->Name_en}}
                                                    </td>
                                                    <td>
                                                      {{$saveplace->Name_ar}}
                                                    </td>
                                                    <td>
                                                      {{$saveplace->Latitude}}
                                                    </td>
                                                    <td>
                                                      {{$saveplace->longitude}}
                                                    </td>

                                                 
                                                    <td class="text-center">
                                                        <a href="{{route('editusersaveplace',[$saveplace->id])}}" class="icon-btn green-bc">
                                                            <i class="fa fa-pencil"></i>
                                                            edit
                                                        </a>
                                                        <a onclick="delete1({{$saveplace->id}})">
                                                        <button class="icon-btn red-bc" type="button">
                                                            <i class="fa fa-trash-o"></i>
                                                            delete
                                                        </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
               </div><!--End Page-Content-->
           </div><!--End Main-->
        </div><!--End wrapper-->
        
        <!-- JS Base And Vendor 
        ===================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/admin/assets/vendor/datatables.min.js"></script>
        <script src="/admin/assets/vendor/count-to/jquery.countTo.js"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <!--JS Main
        ====================================-->
        <script src="/admin/assets/js/main.js"></script>

        <script>
        
        function delete1(id){
$.ajax({
type: 'GET', 
url: "{{ url('deleteusersaveplace') }}",
dataType: 'json',
data: { id:id},
success: function () {
    location.reload();
},error:function(){ 
     //console.log("");
     location.reload();
}

  
});

     }
        </script>
@endsection