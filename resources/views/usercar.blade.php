@extends('layouts.master') 
@section('content')   
  <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>user car</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li class="active">user car</li> 
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
                                                    <th>full name</th>
                                                    <th>car brand</th>
                                                    <th>car model</th>
                                                    <th>car type</th>
                                                    <th>mileage</th>
                                                    <th>manufecture date</th>
                                                    <th>options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($usercars as $usercar)


                                            @if(isset($usercar->User))
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    
                                                    <td>
                                                       {{$usercar->User->FullName}}
                                                    </td>
                                                    <td>

                                                    @if($usercar->CarBrand)
                                                      {{$usercar->CarBrand->Name_en}}
                                                      @endif
                                                    </td>
                                                    <td>
                                                    @if($usercar->CarModel)
                                                      {{$usercar->CarModel->ModelName_en}}
                                                      @endif
                                                    </td>
                                                    <td>
                                                    @if($usercar->CarType)
                                                      {{$usercar->CarType->Description_en}}
                                                      @endif
                                                    </td>
                                                    <td>
                                                      {{$usercar->Mileage}}
                                                    </td>
                                                    <td>
                                                      {{$usercar->ManufectureDate}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{route('editusercar',[$usercar->id])}}" class="icon-btn green-bc">
                                                            <i class="fa fa-pencil"></i>
                                                            edit
                                                        </a>
                                                        <a onclick="delete1({{$usercar ->id}})">
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
url: "{{ url('deleteusercar') }}",
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