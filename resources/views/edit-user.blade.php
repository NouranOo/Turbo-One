@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit user</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('users')}}">user</a></li> 
                                    <li class="active">edit user</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('adminedituser',[$users->id])}}"  enctype="multipart/form-data" onsubmit="return userValidation()" name="user">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">
                                        

                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>full name : </label>
                                            <input class="form-control" type="text" name="fullname" value="{{$users->FullName}}" readonly> 
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>email : </label>
                                            <input class="form-control" type="email" name="email" value="{{$users->Email}}"> 
                                            <span id="email_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>mobile : </label>
                                            <input class="form-control" type="text" name="mobile" value="{{$users->Mobile}}"> 
                                            <span id="mobile_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>birth of date : </label>
                                            <input class="form-control" type="date" name="dateofbirth" value="{{$users->DateOfBirth}}"> 
                                            <span id="date_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>gender_en : </label>

                                            <select class="form-control form-control-lg" name="gender" required>
                                                 @foreach($genders as $gender)
                                                    <option value="{{$gender->id}}" @if($gender->id == $users->id ) selected @endif>
                                                        
                                                       {{$gender->Description_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                          
                                            
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4 col-sm-5">
                                        <div class="form-group">
                                            <div class="img-block">
                                                <img src="/{{$users->Photo}}">
                                                <label for="file-upload" class="custom-btn custom-file-upload">
                                                    upload user mask
                                                </label>
                                                <input id="file-upload" type="file" name="image">
                                                <span id="image_error" style="color:red;"></span>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit user</button>
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
        function userValidation(){ 
    //debugger;
var email = document.forms["user"]["email"].value;
var mobile = document.forms["user"]["mobile"].value;


var dateofbirth = document.forms["user"]["dateofbirth"].value;





// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null




if(email.trim() ==  ""){

document.getElementById("email_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("email_error").innerHTML=" "; 

}


if(mobile.trim() ==  ""){

document.getElementById("mobile_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("mobile_error").innerHTML=" "; 

}

if(dateofbirth.trim() ==  ""){

document.getElementById("date_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("date_error").innerHTML=" "; 

}



        }

</script>

    @endsection