<!DOCTYPE html>
<html>

    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta NAME="keywords" CONTENT="" />
        <meta NAME="copyright" CONTENT="" />  
        
        <!-- Title Name
        ================================-->
        <title>Turbo</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="/admin/assets/images/fav-icon.png">
        
        <!-- Google Web Fonts 
		===========================-->        
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,600&amp;subset=arabic" rel="stylesheet"> 
        
        <!-- Css Base And Vendor 
        ===================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="/admin/assets/vendor/animation/animate.css">
        
        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="/admin/assets/css/style.css">
    </head>
    <body>

  
    @foreach($orders as $order)
    <div class="modal fade" id="edit_order{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content text-center" method="post" action="{{route('editorderdeatils',[$order->id])}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit order deatils</h5>
                    </div>
                    <div class="modal-body">
                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>sub service : </label>

                                            <select class="form-control form-control-lg" name="subservice" required>
                                                 @foreach($subservices as $subservice)
                                                    <option value="{{$subservice->id}}" >
                                                        
                                                       {{$subservice->Name_en}}

                                                    </option>
                                                    @endforeach
                                                   
                                                  </select>
                                        </div>
                                    </div>
                        <div class="col-md-6 form-group">
                            <label>sale</label>
                            <input class="form-control" placeholder="sale"  @if(isset($order->OrderDetail)) value="{{$order->OrderDetail->Sale}}"  @endif name="sale" type="" required>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="custom-btn green-bc">save</button>
                        <button type="button" class="custom-btn red-bc" data-dismiss="modal">close</button>
                    </div>
                </form>
            </div>
        </div>
      @endforeach


     
      @foreach($orders as $order)
    <div class="modal fade" id="edit_payment{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content text-center" method="post" action="{{route('editpayment',[$order->id])}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit payment</h5>
                    </div>
                    <div class="modal-body">
                    <div class="col-md-6 form-group">
                            <label>user name</label>
                           @if($order->User)
                            <input class="form-control" value="{{$order->User->FullName}}"  type=""  readonly required>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label>payment type</label>
                           

                           @if($order->PaymentType)
                            <input class="form-control" value="{{$order->PaymentType->Name_en}}"  type=""  readonly required>
                           @endif
                        </div>
                   
                        <div class="col-md-6 form-group">
                            <label>amount</label>
                            @foreach($order->Payments as $payment)
                            <input class="form-control" @if(isset($payment->Amount)) value="{{$payment->Amount}}"  @endif type="" readonly required>
                            @endforeach
                        </div>

                        <div class="col-md-6 form-group">
                            <label>transaction number</label>
                            @foreach($order->Payments as $payment)
                            <input class="form-control" @if(isset($payment->TransactionNumber)) value="{{$payment->TransactionNumber}}"  @endif type="" readonly required>
                            @endforeach
                        </div>

                        <div class="col-md-6 form-group">
                            <label>status</label>
                            @foreach($order->Payments as $payment)
                            <input class="form-control" @if(isset($payment->Status)) value="{{$payment->Status}}"  @endif type="" readonly required>
                            @endforeach
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <!-- <button type="submit" class="custom-btn green-bc">save</button> -->
                        <button type="button" class="custom-btn red-bc" data-dismiss="modal">close</button>
                    </div>
                </form>
            </div>
        </div>
      @endforeach
      
        <div id="wrapper">
            <div class="main">
                <div class="side-menu">
                    <div class="logo">
                        <img src="assets/images/logo.png">
                    </div><!--End Logo-->
                    <aside class="sidebar">
                        <ul class="side-menu-links">
                            <li><a href="{{route('users')}}">users</a></li>
                            <li><a href="{{route('carbrands')}}">car brands</a></li>
                            <li ><a href="{{route('carmodels')}}">car models</a></li>
                            <li><a href="{{route('promocode')}}">promo code</a></li>
                            <li><a href="{{route('usercar')}}">user car</a></li>
                            <li><a href="{{route('usersaveplace')}}">user save place</a></li>
                            <li><a href="{{route('servicecategory')}}">service category</a></li>
                            <li><a href="{{route('servicesubcategory')}}">service sub category</a></li>
                            <li><a href="{{route('order')}}">order</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="page-content">
                    <div class="top-header">
                        <div class="toggle-icon"  data-toggle="tooltip" data-placement="right" title="Toggle Menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul class="top-header-links">  
                        <li>
                            <a href="{{route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                              
                                                 
                                                 <i class="fa fa-power-off"></i>
                                                 
                                                 
                                                 </a>
                                             <form id="logout-form" action="{{route('logout')}}" method="POST"
                                                 style="display: none;">
                                                 @csrf
                               </form>
                            </li>
                        </ul>
                    </div>
  <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>order   </h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li class="active">order</li> 
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
                                                    <th>user name</th>
                                                    <th>sub service</th>
                                                    <th>location lonitude</th>
                                                    <th>location latitude</th>
                                                    <th>total amount</th>
                                                    <th>date</th>
                                                    <th>time</th>
                                                    <th>options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                           
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    
                                                    <td>
                                                       {{$order->User->FullName}}
                                                    </td>
                                                    <td>
                                                    @if(isset($order->ServicesubCategories->Name_en))  {{$order->ServicesubCategories->Name_en}} @endif
                                                    </td>
                                                    <td>
                                                      {{$order->UserLocationLonitude}}
                                                    </td>
                                                    <td>
                                                      {{$order->UserLocationLatitude}}
                                                    </td>
                                                    <td>
                                                      {{$order->TotalAmount}}
                                                    </td>
                                                    <td>
                                                      {{$order->ServiveReqDate}}
                                                    </td>
                                                    <td>
                                                      {{$order->ServiceReqTime}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{route('editorder',[$order->id])}}" class="icon-btn green-bc">
                                                            <i class="fa fa-pencil"></i>
                                                            edit
                                                        </a>
                                                        <a onclick="delete1({{$order->id}})">
                                                        <button class="icon-btn red-bc" type="button">
                                                            <i class="fa fa-trash-o"></i>
                                                            delete
                                                        </button>
                                                        </a>

                                                        <a href="{{route('editorderdeatils',[$order->id])}}" class="icon-btn green-bc">
                                                            <i class="fa fa-pencil"></i>
                                                            edit order deatils
                                                        </a>
                                                    <button  data-toggle="modal" data-target="#edit_payment{{$order->id}}" class="icon-btn green-bc">
                                                        <i class="fa fa-pencil"></i>
                                                        payments
                                                    </button>
                                                    </td>
                                                </tr>
                                              
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
url: "{{ url('deleteorder') }}",
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
</body>
</html>
