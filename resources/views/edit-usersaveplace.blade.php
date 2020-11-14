@extends('layouts.master') 
@section('content')   
                    <div class="content">
                        <div class="col-sm-12 page-heading">
                            <div class="col-sm-6">
                                <h2>edit user save place</h2>
                            </div><!--End col-md-6-->
                            <div class="col-sm-6">
                                <ul class="breadcrumb">
                                   
                                    <li><a href="{{route('usersaveplace')}}">user save place</a></li> 
                                    <li class="active">edit user save place</li> 
                                </ul>
                            </div><!--End col-md-6-->
                        </div>
                        <div class="spacer-15"></div>
                        <div class="widget">
                            <div class="widget-content">
                                <form method="post" action="{{route('admineditusersaveplace',[$saveplaces->id])}}"  enctype="multipart/form-data" onsubmit="return placeValidation()" name="place">
                                                   @csrf
                                    <div class="col-md-8 col-sm-7">
                                        <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>place name_en : </label>
                                            <input class="form-control" type="text" name="name" value="{{$saveplaces->Name_en}}"> 
                                            <span id="name_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>place name_ar : </label>
                                            <input class="form-control" type="text" name="namear" value="{{$saveplaces->Name_ar}}"> 
                                            <span id="namear_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>latitude : </label>
                                            <input class="form-control" type="text" name="late" id="late2" value="{{$saveplaces->Latitude}}"> 
                                            <span id="latitude_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>longitude : </label>
                                            <input class="form-control" type="text" name="lang" id="lang2" value="{{$saveplaces->longitude}}"> 
                                            <span id="longitude_error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-7">
                                        <div class="form-group">
                                            <label>user name : </label>
                                            <input class="form-control" type="text" name="fullname" value="{{$saveplaces->User->FullName}}" readonly> 
                                           
                                        </div>
                                    </div>
                                   
                                    <div class="spacer-15"></div>
                                    <div class="col-sm-12 save-btn">
                                        <button class="custom-btn green-bc">edit user save place</button>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-12  col-sm-12">
                                                <label for=""> Google Map مكانها على </label>
                                                       <input class="form-control" type="text"  placeholder="" id="searchmap">
                                                <br>
                                                          <div id="map-canvas" style="height:500px; width:100%;margin-bottom:30px;">
                                       
                                                  </div>
                                            </div>
                                            
                                          </div><!-- End row -->

                                          <input type="hidden" class="form-control" name="late"  id="lat" />
                                          <input type="hidden" class="form-control" name="lang" id="lng"/>



                            </div> <!--End-row-->
                        </div> <!--add-client-->



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
        function placeValidation(){ 
    //debugger;
var name = document.forms["place"]["name"].value;
var namear = document.forms["place"]["namear"].value;
var latitude = document.forms["place"]["latitude"].value;
var longitude = document.forms["place"]["longitude"].value;



// var image = document.forms["user"]["image"].value;
// var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; // .. if extension not found return null


if(name.trim() ==  ""){

document.getElementById("name_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("name_error").innerHTML=" "; 

}


if(namear.trim() ==  ""){

document.getElementById("namear_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("namear_error").innerHTML=" "; 

}

if(latitude.trim() ==  ""){

document.getElementById("latitude_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("latitude_error").innerHTML=" "; 

}

if(longitude.trim() ==  ""){

document.getElementById("longitude_error").innerHTML="must be filled"; 

return false;   

}else{

document.getElementById("longitude_error").innerHTML=" "; 

}

        }

        $( document ).ready(function() {



map = new google.maps.Map(document.getElementById('map-canvas'),{
      center:{
        lat: 30.0444,
        lng: 31.2357,
      },
    zoom:15
});





var marker = new google.maps.Marker({
position: {
lat: 30.0444, 
lng: 31.2357,
},
map : map,
draggable:true, /* ! */
});


var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
google.maps.event.addListener(searchBox,'places_changed',function(){
var places = searchBox.getPlaces();
var bounds = new google.maps.LatLngBounds();
var i , place;
for(i=0;place=places[i];i++){
bounds.extend(place.geometry.location);
marker.setPosition(place.geometry.location);
}
map.fitBounds(bounds);
map.setZoom(17);
});


google.maps.event.addListener(marker,'position_changed',function(){
var lat = marker.getPosition().lat();
var lng = marker.getPosition().lng();
$('#lat').val(lat);
$('#lng').val(lng);
});





google.maps.event.addListener( marker, "dragend", function ( event ) {
    var lat, lng, address, resultArray, citi;

    console.log( 'i am dragged' );
    lat = marker.getPosition().lat();
    lng = marker.getPosition().lng();
console.log(lat);
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { latLng: marker.getPosition() }, function ( result, status ) {
        if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
            address = result[0].formatted_address;
            resultArray =  result[0].address_components;

            // Get the city and set the city input value to the one selected
            for( var i = 0; i < resultArray.length; i++ ) {
                if ( resultArray[ i ].types[0] && 'administrative_area_level_2' === resultArray[ i ].types[0] ) {
                    citi = resultArray[ i ].long_name;
                    console.log( citi );
                //	city.value = citi;
                }
            }
    $('#adddress').val(address);
    $('#lat').val(lat);
    $('#lng').val(lng);
    $('#late2').val(lat);
    $('#lang2').val(lng);

        } else {
            console.log( 'Geocode was not successful for the following reason: ' + status );
        }

        // Closes the previous info window if it already exists
        // if ( infoWindow ) {
        //     infoWindow.close();
        // }

        /**
         * Creates the info Window at the top of the marker
         */
        infoWindow = new google.maps.InfoWindow({
            content: address
        });

        infoWindow.open( map, marker );
    } );
});








});



</script>

    @endsection