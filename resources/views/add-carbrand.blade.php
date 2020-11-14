@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>add brand</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('carbrands')}}">brand</a></li> 
                                    <li class="active">add brand</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('addbrand')}}"  enctype="multipart/form-data" onsubmit="return brandValidation()" name="brand">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>car brand_en : </label>
                                            <input class="form-control" type="text" name="name"> 
                                            <span id="name_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>car brand_ar : </label>
                                            <input class="form-control" type="text" name="name_ar"> 
                                            <span id="namear_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                 
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">add brand</button>
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
        function brandValidation(){ 
    //debugger;
var name = document.forms["brand"]["name"].value;
var name_ar = document.forms["brand"]["name_ar"].value;


// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(name.trim() ==  ""){

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

        }

</script>

    @endsection