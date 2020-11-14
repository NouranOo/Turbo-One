@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit model</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('carmodels')}}">model</a></li> 
                                    <li class="active">edit model</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('editmod',[$models->id])}}"  enctype="multipart/form-data" onsubmit="return modelValidation()" name="model">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>car model_en : </label>
                                            <input class="form-control" type="text" name="modelname" value="{{$models->ModelName_en}}"> 
                                            <span id="modelname_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>car model_ar : </label>
                                            <input class="form-control" type="text" name="modelname_ar" value="{{$models->ModelName_ar}}"> 
                                            <span id="modelnamear_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>gender_en : </label>

                                            <select class="form-control form-control-lg" name="carbrand" required>
                                                 @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}" @if($brand->id == $models->id ) selected @endif>
                                                        
                                                       {{$brand->Name_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                          
                                            
                                        </div>
                                    </div>
                                   
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit model</button>
                                    </div>
                                </form>
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
        function modelValidation(){ 
    //debugger;
var modelname = document.forms["model"]["modelname"].value;
var modelname_ar = document.forms["model"]["modelname_ar"].value;


// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(modelname.trim() ==  ""){

document.getElementById("modelname_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("modelname_error").innerHTML=" "; 

}


if(modelname_ar.trim() ==  ""){

document.getElementById("modelnamear_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("modelnamear_error").innerHTML=" "; 

}

        }

</script>

    @endsection