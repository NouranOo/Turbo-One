@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit promo code</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('promocode')}}">promo code</a></li> 
                                    <li class="active">edit promo code</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('editpromo',[$promocodes->id])}}"  enctype="multipart/form-data" onsubmit="return promoValidation()" name="promocode">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>promo code description_en : </label>
                                            <input class="form-control" type="text" name="description" value="{{$promocodes->Description_en}}"> 
                                            <span id="descriptionen_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>promo code description_ar : </label>
                                            <input class="form-control" type="text" name="description_ar" value="{{$promocodes->Description_ar}}"> 
                                            <span id="descriptionar_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>code : </label>
                                            <input class="form-control" type="text" name="code" value="{{$promocodes->Code}}"> 
                                            <span id="code_error" style="color:red;"></span>
                                        </div>
                                    </div>


                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>discount amount : </label>
                                            <input class="form-control" type="text" name="amount" value="{{$promocodes->DiscountAmount}}"> 
                                            <span id="discount_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>discount type : </label>

                                            <select class="form-control form-control-lg" name="discount" required>
                                                 @foreach($discounttypes as $discounttype)
                                                    <option value="{{$discounttype->id}}" @if($discounttype->id == $promocodes->DiscountType_id ) selected @endif>
                                                        
                                                       {{$discounttype->Type}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>
 
                                 
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit promo code</button>
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