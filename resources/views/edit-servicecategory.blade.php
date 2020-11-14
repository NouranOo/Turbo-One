@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit service category</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('servicecategory')}}">service category</a></li> 
                                    <li class="active">edit service category</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('admineditservicecategory',[$servicecategories->id])}}"  enctype="multipart/form-data" onsubmit="return serviceValidation()" name="service">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>service name_en : </label>
                                            <input class="form-control" type="text" name="service_en" value="{{$servicecategories->ServiceName_en}}"> 
                                            <span id="name_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>service name_ar : </label>
                                            <input class="form-control" type="text" name="service_ar" value="{{$servicecategories->ServiceName_ar}}"> 
                                            <span id="namear_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>service description_en : </label>
                                            <input class="form-control" type="text" name="description_en" value="{{$servicecategories->ServiceDescription_en}}"> 
                                            <span id="descen_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>service description_ar : </label>
                                            <input class="form-control" type="text" name="description_ar" value="{{$servicecategories->ServiceDescription_ar}}"> 
                                            <span id="descar_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                 
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit service category</button>
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
        function serviceValidation(){ 
    //debugger;
var service_en = document.forms["service"]["service_en"].value;
var service_ar = document.forms["service"]["service_ar"].value;
var description_en = document.forms["service"]["description_en"].value;
var description_ar = document.forms["service"]["description_ar"].value;



// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(service_en.trim() ==  ""){

document.getElementById("name_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("name_error").innerHTML=" "; 

}


if(service_ar.trim() ==  ""){

document.getElementById("namear_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("namear_error").innerHTML=" "; 

}

if(description_en.trim() ==  ""){

document.getElementById("descen_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("descen_error").innerHTML=" "; 

}
if(description_ar.trim() ==  ""){

document.getElementById("descar_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("descar_error").innerHTML=" "; 

}
        }

</script>

    @endsection