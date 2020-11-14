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
        <div class="modal fade" id="delete_place" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">do you want to delete place</h5>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="custom-btn red-bc">delete</button>
                        <button type="button" class="custom-btn green-bc" data-dismiss="modal">close</button>
                    </div>
                </form>
            </div>
        </div>
        @foreach($users as $user)

<div class="modal fade" id="block_user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <form class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Do you want active User ?</h5>
        </div>
        <div class="modal-footer text-center">
        <a href="{{ route('active', $user->id) }}"> <button type="button" class="custom-btn red-bc">OK</button></a>
            <button type="button" class="icon-btn green-bc" data-dismiss="modal">close</button>
        </div>
    </form>
</div>
</div>

<div class="modal fade" id="unblock_user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Do you want disactive User ?</h5>
            </div>
            <div class="modal-footer text-center">
            <a href="{{route('disactive', $user->id) }}"> <button type="button" class="custom-btn red-bc">OK</button></a>
                <button type="button" class="custom-btn green-bc" data-dismiss="modal">close</button>
            </div>
        </form>
    </div>
</div> 

@endforeach

        <div id="wrapper">
            <div class="main">
                <div class="side-menu">
                    <div class="logo">
                    <img src="/admin/assets/images/logo.svg" style="width: 160px;">
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
                                <h2>user</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li class="active">user</li> 
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
                                                    <th>full name</th>
                                                    <th>email</th>
                                                    <th>mobile</th>
                                                    <th>date of birth</th>
                                                    <th>gender</th>
                                                    <th>options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    
                                                    <td>
                                                       {{$user->FullName}}
                                                    </td>
                                                    <td>
                                                      {{$user->Email}}
                                                    </td>
                                                    <td>
                                                       {{$user->Mobile}}
                                                    </td>
                                                    <td>
                                                       {{$user->DateOfBirth}}
                                                    </td>
                                                    <td>
                                                       {{$user->Gendre->Description_en}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{route('edituser',[$user->id])}}" class="icon-btn green-bc">
                                                            <i class="fa fa-pencil"></i>
                                                            edit
                                                        </a>
                                                       
                                                    @if($user->IsActive != 1)
    <button data-url="{{route('active',['id' => $user->id])}}" data-toggle="modal" data-target="#block_user{{$user->id}}" class="icon-btn red-bc ">
                                     
                                   Active
                                 </button>
                                @else
                                 <button data-url="{{route('disactive',['id' => $user->id])}}" data-toggle="modal" data-target="#unblock_user{{$user->id}}" class="icon-btn red-bc ">
                                        
                                 deactivate
                                </button>

                                           @endif   
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
url: "{{ url('deleteabout') }}",
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
