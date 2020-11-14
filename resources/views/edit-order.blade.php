@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit order</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('order')}}">order</a></li> 
                                    <li class="active">edit order</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('admineditorder',[$orders->id])}}"  enctype="multipart/form-data" onsubmit="return orderValidation()" name="order">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sub service : </label>

                                            <select class="form-control form-control-lg" name="subservice" required>
                                                 @foreach($subservices as $subservice)
                                                    <option value="{{$subservice->id}}" @if($subservice->id == $orders->SubService_id ) selected @endif>
                                                        
                                                       {{$subservice->Name_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>location : </label>

                                            <select class="form-control form-control-lg" name="location" required>
                                                 @foreach($locations as $location)
                                                    <option value="{{$location->id}}" @if($location->id == $orders->ServiceLocation_id ) selected @endif>
                                                        
                                                       {{$location->Name_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>location lonitude : </label>
                                            <input class="form-control" type="text" name="lonitude" value="{{$orders->UserLocationLonitude}}"> 
                                            <span id="lonitude_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>location latitude : </label>
                                            <input class="form-control" type="text" name="latitude" value="{{$orders->UserLocationLatitude}}"> 
                                            <span id="latitude_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>total amount : </label>
                                            <input class="form-control" type="text" name="totalamount" value="{{$orders->TotalAmount}}"> 
                                            <span id="totalamount_error" style="color:red;"></span>
                                        </div>
                                    </div>


                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>request date : </label>
                                            <input class="form-control" type="date" name="date" value="{{$orders->ServiveReqDate}}"> 
                                            <span id="discount_error" style="color:red;"></span>
                                        </div>
                                    </div>
 
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>request time : </label>
                                            <input class="form-control" type="time" name="time" value="{{$orders->ServiceReqTime}}"> 
                                            <span id="discount_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>order status : </label>

                                            <select class="form-control form-control-lg" name="status" required>
                                                 @foreach($status as $stat)
                                                    <option value="{{$stat->id}}" @if($stat->id == $orders->OrderStatus_id ) selected @endif>
                                                        
                                                       {{$stat->Description}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>payment type : </label>

                                            <select class="form-control form-control-lg" name="payment" required>
                                                 @foreach($payments as $payment)
                                                    <option value="{{$payment->id}}" @if($payment->id == $orders->PaymentType_id ) selected @endif>
                                                        
                                                       {{$payment->Name_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>service category : </label>

                                            <select class="form-control form-control-lg" name="service" required>
                                                 @foreach($services as $service)
                                                    <option value="{{$service->id}}" @if($service->id == $orders->Service_id ) selected @endif>
                                                        
                                                       {{$service->ServiceName_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>
                                 
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit order</button>
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
        function orderValidation(){ 
    //debugger;
var lonitude = document.forms["order"]["lonitude"].value;
var latitude = document.forms["order"]["latitude"].value;
var totalamount = document.forms["order"]["totalamount"].value;


// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(lonitude.trim() ==  ""){

document.getElementById("lonitude_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("lonitude_error").innerHTML=" "; 

}


if(latitude.trim() ==  ""){

document.getElementById("latitude_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("latitude_error").innerHTML=" "; 

}


if(totalamount.trim() ==  ""){

document.getElementById("totalamount_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("totalamount_error").innerHTML=" "; 

}



        }

</script>

    @endsection