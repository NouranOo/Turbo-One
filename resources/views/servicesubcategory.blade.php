@extends('layouts.master') 
@section('content')   
  <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>sub service</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li class="active">sub service</li> 
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
                                                    <th>name_en</th>
                                                    <th>name_ar</th>
                                                    <th>description_en</th>
                                                    <th>description_ar</th>
                                                    <th>service name</th>
                                                    <th>price</th>
                                                    
                                                    <th>options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($servicesubcategories as $servicesubcategory)

                                            @if(isset($servicesubcategory->ServiceCategorie->ServiceName_en))
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    
                                                    <td>
                                                       {{$servicesubcategory->Name_en}}
                                                    </td>
                                                    <td>
                                                      {{$servicesubcategory->Name_ar}}
                                                    </td>
                                                    <td>
                                                      {{$servicesubcategory->Description_en}}
                                                    </td>
                                                    <td>
                                                      {{$servicesubcategory->Description_ar}}
                                                    </td>
                                                    <td>
                                                      {{$servicesubcategory->ServiceCategorie->ServiceName_en}}
                                                    </td>
                                                    <td>
                                                      {{$servicesubcategory->Price}}
                                                    </td>
                                                   
                                                    <td class="text-center">
                                                        <a href="{{route('editsubcategory',[$servicesubcategory->id])}}" class="icon-btn green-bc">
                                                            <i class="fa fa-pencil"></i>
                                                            edit
                                                        </a>
                                                        <a onclick="delete1({{$servicesubcategory->id}})">
                                                        <button class="icon-btn red-bc" type="button">
                                                            <i class="fa fa-trash-o"></i>
                                                            delete
                                                        </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endif
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
url: "{{ url('deletesubservicecategory') }}",
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