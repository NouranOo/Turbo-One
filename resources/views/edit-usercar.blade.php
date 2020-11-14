@extends('layouts.master') 
@section('content')   




                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit user car</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('usercar')}}">user car</a></li> 
                                    <li class="active">edit user car</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('admineditusercar',[$usercars->id])}}"  enctype="multipart/form-data" onsubmit="return usercarValidation()" name="usercar">
                                                   @csrf
                                   
                                   
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>user name : </label>
                                            <input class="form-control" type="" value="{{$usercars->User->FullName}}" readonly> 
                                            
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>brand : </label>

                                            <select class="form-control form-control-lg" name="brand" required onchange="changeModel()" id="brandCar">
                                                 @foreach($carbrand as $car)
                                                    <option value="{{$car->id}}" rel="{{$car->id}}" @if($car->id == $usercars->CarBrand_id ) selected @endif>
                                                        
                                                       {{$car->Name_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                          
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>model : </label>
                                            <select class="form-control form-control-lg" name="model" required  id="model">
                                                 @foreach($carmodel as $carmod)
                                                    <option value="{{$carmod->id}}" @if($carmod->id == $usercars->CarModel_id ) selected @endif>
                                                        
                                                       {{$carmod->ModelName_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                          
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>type : </label>

                                            <select class="form-control form-control-lg" name="type" required >
                                                 @foreach($cartypes as $cartype)
                                                    <option value="{{$cartype->id}}" @if($cartype->id == $usercars->CarType_id ) selected @endif>
                                                        
                                                       {{$cartype->Description_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                          
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>mileaga : </label>
                                            <input class="form-control" type="" name="mileaga" value="{{$usercars->Mileage}}"> 
                                            <span id="mileaga_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>manufecture date : </label>
                                            <input class="form-control" type="" name="manufecture" value="{{$usercars->ManufectureDate}}"> 
                                            <span id="manufecture_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                   
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit user car</button>
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
        function usercarValidation(){ 
    //debugger;
var mileaga = document.forms["usercar"]["mileaga"].value;
var manufecture = document.forms["usercar"]["manufecture"].value;


// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(mileaga.trim() ==  ""){

document.getElementById("mileaga_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("mileaga_error").innerHTML=" "; 

}


if(manufecture.trim() ==  ""){

document.getElementById("manufecture_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("manufecture_error").innerHTML=" "; 

}

        }

        function changeModel(){
 
 //  debugger;
  <?php $areas = App\Models\CarModel::all(); ?>
  
  
  var addareas="";
  var brandId =  Number($('option:selected', '#brandCar').attr('rel'));
 //  console.log(areaId);
  
  $("#model").empty();
  
//   addareas += '<option  >Choose model</option>';
  var areasJS = {!! $areas !!}  ; /*convert  */
          
          $(areasJS).each(function(i, item) 
          {
          
              if(item.CarBrand_id == brandId){
                 addareas += '<option value='+item.id+'  >'+item.ModelName_en+'</option>';
  
        }
 
 
      });
 
 
      console.log(addareas);
  
  $('#model').append(addareas);
  
  }
</script>

    @endsection