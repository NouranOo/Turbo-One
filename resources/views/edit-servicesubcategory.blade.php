@extends('layouts.master') 
@section('content')   


                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit service sub category</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('servicesubcategory')}}">service sub category</a></li> 
                                    <li class="active">edit service sub category</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('admineditservicesubcategory',[$servicesubcategories->id])}}"  enctype="multipart/form-data" onsubmit="return subserviceValidation()" name="subservice">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sub service name_en : </label>
                                            <input class="form-control" type="text" name="name_en" value="{{$servicesubcategories->Name_en}}"> 
                                            <span id="name_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sub service name_ar : </label>
                                            <input class="form-control" type="text" name="name_ar" value="{{$servicesubcategories->Name_ar}}"> 
                                            <span id="namear_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sub service description_en : </label>
                                            <input class="form-control" type="text" name="description_en" value="{{$servicesubcategories->Description_en}}"> 
                                            <span id="descen_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sub service description_ar : </label>
                                            <input class="form-control" type="text" name="description_ar" value="{{$servicesubcategories->Description_ar}}"> 
                                            <span id="descar_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>price : </label>
                                            <input class="form-control" type="text" name="price" value="{{$servicesubcategories->Price}}"> 
                                            <span id="price_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>service name : </label>

                                            <select class="form-control form-control-lg" name="service" required>
                                                 @foreach($services as $service)
                                                    <option value="{{$service->id}}" @if($service->id == $servicesubcategories->Service_id ) selected @endif>
                                                        
                                                       {{$service->ServiceName_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>
 
                                 
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit service sub category</button>
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
        function subserviceValidation(){ 
    //debugger;
var name_en = document.forms["subservice"]["name_en"].value;
var name_ar = document.forms["subservice"]["name_ar"].value;
var description_en = document.forms["subservice"]["description_en"].value;
var description_ar = document.forms["subservice"]["description_ar"].value;
var price = document.forms["subservice"]["price"].value;



// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(name_en.trim() ==  ""){

document.getElementById("name_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("name_error").innerHTML=" "; 

}


if(name_ar.trim() ==  ""){

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
if(price.trim() ==  ""){

document.getElementById("price_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("price_error").innerHTML=" "; 

}

        }

</script>

    @endsection