@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit order deatils</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('order')}}">order deatils</a></li> 
                                    <li class="active">edit order deatils</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('editdeatils',$id)}}"  enctype="multipart/form-data" onsubmit="return promoValidation()" name="promocode">
                                                   @csrf

                                                   @foreach($orderdeatils as $orderdeatil)
                                  
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sale : </label>
                                            <input class="form-control" type="text" name="sale[]" value="{{$orderdeatil->Sale}}"> 
                                            <span id="descriptionen_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sub service : </label>

                                            <select class="form-control form-control-lg" name="subservice[]" required>
                                                 @foreach($subservices as $subservice)
                                                    <option value="{{$subservice->id}}" @if($subservice->id == $orderdeatil->SubService_id ) selected @endif>
                                                        
                                                       {{$subservice->Name_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{$orderdeatil->id}}"  name="oldorderdetailsid[]">
 
                                 
                                    <div class="spacer-15"></div>
                                    
                                    <a onclick="delete1({{$orderdeatil->id}})">
                                                        <button class="icon-btn red-bc" type="button">
                                                            <i class="fa fa-trash-o"></i>
                                                            delete
                                                        </button>
                                                        </a>

                                    @endforeach

                                    <div class="col-sm-12" style="padding-left: 0;">
                                        <div class="input_fields_wraps">
                                            <div class="form-group">
                                                <button class="add_field_buttons custom-btn green-bc" type="button">Add order</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit order deatils</button>
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
                $(document).ready(function() {
              var max_fields      = 50; 
              var wrapper   		= $(".input_fields_wraps"); //Fields wrapper
              var add_button      = $(".add_field_buttons"); //Add button ID
              
              var x = 1; 
              $(add_button).click(function(e){ 
                e.preventDefault();
                if(x < max_fields){ 
                  x++; 
                  $(wrapper).append('<div class="row"><div class="col-md-12 col-sm-12"><div class="form-group"> <label>sale : </label><input class="form-control" type="text" name="newsale[]"> </div></div>'+ 
                  '<div class="col-md-12 col-sm-12"><div class="form-group"><label>sub service : </label> <select class="form-control form-control-lg" name="newservice[]" required>  @foreach($subservices as $subservice) <option value="{{$subservice->id}}">     {{$subservice->Name_en}}  </option> @endforeach </select> </div> </div>'+
                   '<a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
              });
              
              $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
              })
            });
        </script>
        <script>
        
        function delete1(id){
$.ajax({
type: 'GET', 
url: "{{ url('deleteorderdeatils') }}",
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
        <script>
        function promoValidation(){ 
    //debugger;
var description = document.forms["promocode"]["description"].value;
var description_ar = document.forms["promocode"]["description_ar"].value;
var code = document.forms["promocode"]["code"].value;
var amount = document.forms["promocode"]["amount"].value;


// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(description.trim() ==  ""){

document.getElementById("descriptionen_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("descriptionen_error").innerHTML=" "; 

}


if(description_ar.trim() ==  ""){

document.getElementById("descriptionar_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("descriptionar_error").innerHTML=" "; 

}


if(code.trim() ==  ""){

document.getElementById("code_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("code_error").innerHTML=" "; 

}


if(amount.trim() ==  ""){

document.getElementById("discount_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("discount_error").innerHTML=" "; 

}

        }

</script>

    @endsection