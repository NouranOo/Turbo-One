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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIATE_TQXlrdKhFo2QxQdIulT2kvm51AI&libraries=places" type="text/javascript"></script>
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



                    @yield('content')

</body>
</html>
