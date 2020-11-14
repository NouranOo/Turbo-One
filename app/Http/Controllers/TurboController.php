<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Gender;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Promocode;
use App\Models\DiscountType;
use App\Models\UserCar;
use App\Models\CarType;
use App\Models\UserSavedPlace;
use App\Models\ServiceCategorie;
use App\Models\ServicesubCategorie;
use App\Models\Order;
use App\Models\Location;
use App\Models\OrderStatus;
use App\Models\PaymentType;
use App\Models\OrderDetail;
use App\Models\Payment;
use Hash;
use Session;



class TurboController extends Controller
{
    //
    public function loginturbo(){

        return view('login');
      }
    
      public function postadminLogin(Request $req)
      {
          
          $req->validate([
              'Email' => 'required|string',
              'Password' => 'required|string',
             ]);
          $admin = User::where('Email', $req->Email)->first();
            // dd($admin);
          if($admin){
    
            $check = Hash::check($req->Password,$admin->Password);
            //dd($check);
      
           if($check){ /** check before .. */

        //    // dd('fffff');
           Session::put('curr',$admin->id );
        //     //Cache::put('curr',$admin->id,1440); /* admin that log in ... before we will use session  */
        // //   return redirect('user'); 
    
         }
         
         
            return redirect(route('users'));
        }
        
         
      }


    public function users(){
              $users = User::all();
               $pass = Hash::make(123456);
              // dd($pass);
        return view('user',compact('users'));

    }

    public function edituser($id){
        $users = User::where('id',$id)->first();
        $genders = Gender::all();
            //dd($users);
        return view('edit-user',compact('users','genders'));
    }

    public function adminedituser(Request $request ,$id){

        $users = User::where('id',$id)->first();
        $image=  $users->Photo ;

        if ($request->hasFile('image')) {
            $file = $request->file("image");
            $filename = str_random(6) . '_' . time() . '_' . $file->getClientOriginalName();
            $path = 'ProjectFiles/userphotos';
            $file->move($path, $filename);
            $image = $path . '/' . $filename;
           
            }

            user::where('id',$id)->update([
                'FullName' =>$request->fullname,
                'Email' =>$request->email,
                'Mobile' =>$request->mobile,
                'DateOfBirth' =>$request->dateofbirth,
                'Gender_id' =>$request->gender,
                'Photo' =>$image,


                      

            ]);
            return redirect(route('users'));

    }

          
    public function active($id){
        User::where('id',$id)->update(
          [
            'IsActive'=>1,
          ]
      );
      //Alert::success('User Blocked Sucessfuly')->autoclose(3000);
      return back();
  
      }

      public function disactive($id){
		User::where('id',$id)->update(
			[
			  'IsActive'=>0,
			]
      );
      
      //Alert::success('User UnBlocked Sucessfuly')->autoclose(3000);
      return back();
  }

    public function carbrands(){
          $brands = CarBrand::all();

       return view('car-brands',compact('brands'));

    }

    public function addcarbrand(){

        return view('add-carbrand');

    }

    public function addbrand(Request $request){

        CarBrand::create([
            'Name_en' =>$request->name,
            'Name_ar' =>$request->name_ar,
 
         ]);
 
         return redirect(route('carbrands'));

    }

    public function editcarbrand($id){

        $brands = CarBrand::where('id',$id)->first();

        return view('edit-carbrand',compact('brands'));
    }

    public function editcar(Request $request ,$id){
        CarBrand::where('id',$id)->update([
           'Name_en' =>$request->name,
           'Name_ar' =>$request->name_ar,

        ]);

        return redirect(route('carbrands'));
    }

    public function deletebrand(Request $request){
       
        $brands = CarBrand::where('id',$request->id)->delete();
    
    }

    public function carmodels(){
        $models = CarModel::all();

        return view('car-models',compact('models'));
    }

    public function addcarmodels(){

        $brands = CarBrand::all();
        return view('add-carmodel',compact('brands'));
    }

    public function addmodels(Request $request){

        CarModel::create([
            'ModelName_en' =>$request->modelname,
            'ModelName_ar' =>$request->modelname_ar,
            'CarBrand_id' =>$request->carbrand,

      ]);

      return redirect(route('carmodels'));

    }

    public function editmodels($id){
        $models = CarModel::where('id',$id)->first();
        $brands = CarBrand::all();
        return view('edit-carmodel',compact('models','brands'));
    }

    public function editmod(Request $request ,$id){

        CarModel::where('id',$id)->update([
              'ModelName_en' =>$request->modelname,
              'ModelName_ar' =>$request->modelname_ar,
              'CarBrand_id' =>$request->carbrand,

        ]);

        return redirect(route('carmodels'));
    }

    public function deletemodel(Request $request){
       
        $models = CarModel::where('id',$request->id)->delete();
    
    }

    public function promocode(){
                $promocodes = Promocode::all();
        return view('promocode',compact('promocodes'));
    }
    public function activepromo($id){
        Promocode::where('id',$id)->update(
          [
            'IsActive'=>1,
          ]
      );
      //Alert::success('User Blocked Sucessfuly')->autoclose(3000);
      return back();
  
      }

      public function disactivepromo($id){
		Promocode::where('id',$id)->update(
			[
			  'IsActive'=>0,
			]
      );
      
      //Alert::success('User UnBlocked Sucessfuly')->autoclose(3000);
      return back();
  }

  public function addpromocode(){
    $discounttypes = DiscountType::all();
    return view('add-promocode',compact('discounttypes'));

  }
     public function addpromo(Request $request){
        Promocode::create([
            'Description_en' =>$request->description,
            'Description_ar' =>$request->description_ar,
            'Code' =>$request->code,
            'DiscountType_id' =>$request->discount,
            'DiscountAmount'  =>$request->amount
       ]);

       return redirect(route('promocode'));


     }


    public function editpromocode($id){

            $promocodes = Promocode::where('id',$id)->first();
            $discounttypes = DiscountType::all();
        return view('edit-promocode',compact('promocodes','discounttypes'));
    }
    public function editpromo(Request $request ,$id){

        Promocode::where('id',$id)->update([
             'Description_en' =>$request->description,
             'Description_ar' =>$request->description_ar,
             'Code' =>$request->code,
             'DiscountType_id' =>$request->discount,
             'DiscountAmount'  =>$request->amount
        ]);

        return redirect(route('promocode'));
    }

    public function usercar(){
      $usercars = UserCar::all();

        return view('usercar',compact('usercars'));
    }

    public function editusercar($id){
            $usercars = UserCar::where('id',$id)->first();
            $users = User::first();
            $carbrand = CarBrand::all();
            $carmodel = CarModel::all();
            $cartypes = CarType::all();
        return view('edit-usercar',compact('usercars','users','carbrand','carmodel','cartypes'));
    }
    public function admineditusercar(Request $request ,$id){

        UserCar::where('id',$id)->update([
        //    'User_id' =>$request->user,
           'CarBrand_id' =>$request->brand,
           'CarModel_id' =>$request->model,
           'CarType_id' =>$request->type,
           'Mileage' =>$request->mileaga,
           'ManufectureDate' =>$request->manufecture,

        ]);

        return redirect(route('usercar'));
    }

    public function deleteusercar(Request $request){
       
        $usercars = UserCar::where('id',$request->id)->delete();
    
    }

    public function usersaveplace(){
         $saveplaces = UserSavedPlace::all();
        return view('usersaveplace',compact('saveplaces'));
    }
    public function editusersaveplace($id){
        $saveplaces = UserSavedPlace::where('id',$id)->first();
        $users = User::all();

        return view('edit-usersaveplace',compact('saveplaces','users'));

    }

    public function admineditusersaveplace(Request $request ,$id){

        UserSavedPlace::where('id',$id)->update([
           
            'Name_en' =>$request->name,
            'Name_ar' =>$request->namear,
            'Latitude' =>$request->late,
            'longitude' =>$request->lang,
          
 
         ]);
 
         return redirect(route('usersaveplace'));
    }

    public function deleteusersaveplace(Request $request){
       
        $usersaveplace = UserSavedPlace::where('id',$request->id)->delete();
    
    }

    public function servicecategory(){
        $servicecategories = ServiceCategorie::all();
       return view('servicecategory',compact('servicecategories'));
   }


   public function editservicecategory($id){
    $servicecategories = ServiceCategorie::where('id',$id)->first();
    

    return view('edit-servicecategory',compact('servicecategories'));

}

public function admineditservicecategory(Request $request ,$id){

    ServiceCategorie::where('id',$id)->update([

        'ServiceName_en' =>$request->service_en,
        'ServiceName_ar' =>$request->service_ar,
        'ServiceDescription_en' =>$request->description_en,
        'ServiceDescription_ar' =>$request->description_ar,
        
      

     ]);

     return redirect(route('servicecategory'));
}

    public function deleteservicecategory(Request $request){
       
       $servicecategories = ServiceCategorie::where('id',$request->id)->delete();

   }

   public function servicesubcategory(){

    $servicesubcategories = ServicesubCategorie::all();

   return view('servicesubcategory',compact('servicesubcategories'));
  }
  public function editsubcategory($id){
    $servicesubcategories = ServicesubCategorie::where('id',$id)->first();
    $services = ServiceCategorie::all();

   return view('edit-servicesubcategory',compact('servicesubcategories','services'));
}

public function admineditservicesubcategory(Request $request ,$id){

    ServicesubCategorie::where('id',$id)->update([

        'Name_en' =>$request->name_en,
        'Name_ar' =>$request->name_ar,
        'Description_en' =>$request->description_en,
        'Description_ar' =>$request->description_ar,
        'Service_id' =>$request->service,
        'Price' =>$request->price,
        
      

     ]);

     return redirect(route('servicesubcategory'));
}


    public function deletesubservicecategory(Request $request){
       
         $servicesubcategories = ServicesubCategorie::where('id',$request->id)->delete();

    }

    public function order(){
            
        $orders = Order::with('OrderDetail')->with('Payments')->with('User')->orderBy('id', 'desc')->get();
        $orderdeatils = OrderDetail::first();
        $subservices = ServicesubCategorie::all();
        $payments = Payment::all();
        $paymenttypes = PaymentType::all();
      //dd($orders);
        return view('order',compact('orders','orderdeatils','subservices','payments','paymenttypes'));
    }

    public function editorder($id){
        $orders = Order::where('id',$id)->first();
        $subservices = ServicesubCategorie::all();
        $locations = Location::all();
        $status = OrderStatus::all();
        $payments = PaymentType::all();
        $services = ServiceCategorie::all();
       
        return view('edit-order',compact('orders','subservices','locations','status','payments','services','orderdeatils'));

    }

    public function admineditorder(Request $request ,$id){

        Order::where('id',$id)->update([
            
            'SubService_id' =>$request->subservice,
            'ServiceLocation_id' =>$request->location,
            'UserLocationLonitude' =>$request->lonitude,
            'UserLocationLatitude' =>$request->latitude,
            'TotalAmount' =>$request->totalamount,
            'ServiveReqDate' =>$request->date,
            'ServiceReqTime' =>$request->time,
            'OrderStatus_id' =>$request->status,
            'PaymentType_id' =>$request->payment,
            'Service_id' =>$request->service,


        ]);

        return redirect(route('order'));

    }

  
    public function deleteorder(Request $request){
       
        $orders = Order::where('id',$request->id)->delete();

   }

       public function editorderdeatils($id){

        $orderdeatils = OrderDetail::where('Order_id',$id)->get();


      
        $subservices = ServicesubCategorie::all();
    //    dd(   $subservices );
        return view('edit-orderdeatils',compact('orderdeatils','subservices','id'));

  }

  public function deleteorderdeatils(Request $request){
       
    $orderdeatil = OrderDetail::where('id',$request->id)->delete();

   }

   public function editdeatils(Request $request ,$id){


     if($request->oldorderdetailsid != null)
     {


        $service =  $request->subservice;
        $sale =  $request->sale;
        $old_ids =  $request->oldorderdetailsid;


        for($i=0 ;$i<count($old_ids);$i++ ){
     
    OrderDetail::where('id',$old_ids[$i])->update([
           'SubService_id' =>  $service[$i],
           'Sale' => $sale[$i],

    ]);
       }
   }



   /*  */
     
    if($request->newservice != null){

        // dd();

        $newservice =  $request->newservice;
        $newsale =  $request->newsale;


        for($i=0 ;$i<count($newservice);$i++ ){
        OrderDetail::create([
            'SubService_id' =>  $newservice[$i],
            'Sale' => $newsale[$i],
            'Order_id'=>$id,

 
     ]);
        
    }
}

 return back();


   }


}
