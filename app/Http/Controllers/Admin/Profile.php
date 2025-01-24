<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;

class Profile extends Controller
{
    var $ADMINID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->ADMINID = $this->getSession('adminId');
    }

    function myprofile(Request $request){
        
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $adminObj = Admin_model::where('id', $adminId)->first()->toArray();
            
            unset($adminObj["password"]);
            unset($adminObj["createDateTime"]);
            unset($adminObj["updateDateTime"]);
            
            //echo '<pre>'; print_r($adminObj); die;
            $data = array();
            $data["pageTitle"] = "Profile";
            $data["user"] = $adminObj;
            return View("admin.profile",$data);
        }else{
            //redirect to login
            return Redirect::to(url('login'));
        }
    }

    function saveprofilephoto(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            //$adminId = $request->input("adminId");
            $base64Image = $request->input("imgData");
            
            // Strip off the base64 prefix
            $imageData = explode(',', $base64Image);
            $imageData = $imageData[1];
            $imageName = 'pp-'.$adminId.'.jpg'; 
            // Decode the base64 string into an image
            $decodedImage = base64_decode($imageData);

            /*
            // Store the image in the public folder (or any other location you prefer)
            $path = public_path('uploads/images/' . $imageName);
            file_put_contents($path, $decodedImage);
            */

            /*
            // Store the image in the storage/app directory (private)
            $adminDirPath = storage_path('app/'.$adminId);
            create_local_folder($adminDirPath);
            create_local_folder($adminDirPath.'/assets/');
            create_local_folder($adminDirPath.'/assets/images/');

            $path = $adminDirPath.'/assets/images/'. $imageName;
            Storage::disk('local')->put($path, $decodedImage);  // Stores it in storage/app/images
            */

            // Define the dynamic path for storing the image
            $adminDirPath = 'users/' . $adminId . '/assets/images/';  // Use 'users/{adminId}/assets/images'
            
            // Ensure the directory structure exists
            Storage::disk('local')->makeDirectory($adminDirPath);  // Laravel will create any missing directories
            
            // Store the image in the appropriate folder
            Storage::disk('local')->put($adminDirPath . $imageName, $decodedImage);  // Save the image
            
            // Return the relative path of the image for further processing
            $path = $adminDirPath . $imageName;


            $postBackData["path"] = $path;
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your profile photo has been updated successfully."
            );
        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }

    function saveprofile(Request $request){
        if($this->ADMINID > 0){
            $adminId = $this->ADMINID;
            $id = $request->input("id");
            $fname = $request->input("fname");
            $lname = $request->input("lname");
            $address_1 = $request->input("address_1");
            $address_2 = $request->input("address_2");
            $city = $request->input("city");
            $state = $request->input("state");
            $country = $request->input("country");
            $zipcode = $request->input("zipcode");
            $phone = $request->input("phone");
            $company = $request->input("company");
            $website = $request->input("website");
            $updatedDateTime = date("Y-m-d H:i:s");

            $updateData = array(
                "fname" => $fname,
                "lname" => $lname,
                "address_1" => $address_1,
                "address_2" => $address_2,
                "city" => $city,
                "state" => $state,
                "country" => $country,
                "zipcode" => $zipcode,
                "phone" => $phone,
                "company" => $company,
                "website" => $website,
                "updateDateTime" => $updatedDateTime
            );

            $updated = Admin_model::where('id', $adminId)->update($updateData);
            
            
            $postBackData = array();
            $postBackData["fname"] = $fname;
            $postBackData["lname"] = $lname;
            $postBackData["address_1"] = $address_1;
            $postBackData["address_2"] = $address_2;
            $postBackData["city"] = $city;
            $postBackData["state"] = $state;
            $postBackData["country"] = $country;
            $postBackData["zipcode"] = $zipcode;
            $postBackData["phone"] = $phone;
            $postBackData["company"] = $company;
            $postBackData["website"] = $website;
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Your profile has been updated successfully."
            );
        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;

    }
}