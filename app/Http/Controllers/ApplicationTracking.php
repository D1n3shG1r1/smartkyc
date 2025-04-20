<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Applications_model;
use App\Models\Customers_model;

class ApplicationTracking extends Controller
{
    function index(Request $request){

        $data = [
            'pageTitle' => 'Track Application',
        ];
        
        return View('applicationtracking', $data);
    }

    function processTracking(Request $request){
        
        $applicationId = $request->input("applicationId");
        $row = Applications_model::select("customerId", "requestSubmitted", "documentType", "documentNo", "verificationOutcome", "discrepancies", "specifyDiscrepancy", "verificationStatus", "createDateTime", "updateDateTime")->where("id", $applicationId)->first();
    
        if($row){

            $customerId = $row["customerId"];
            //get customer details
            $customerObj = Customers_model::select("fname","lname","email")->where("id", $customerId)->first();

            $row["fname"] = $customerObj["fname"];
            $row["lname"] = $customerObj["lname"];
            $row["email"] = $customerObj["email"];
            

            $documentTypeArr = explode(",", $row["documentType"]);
            $documentTypeValArr = array();
            foreach($documentTypeArr as $docTyp){
                
                $TmpDocTyp = documentsTypes($docTyp);
                $documentTypeValArr[] = $TmpDocTyp;
            }

            $row["documentTypeVal"] = $documentTypeValArr;

            $row["verificationStatus"] = ucwords($row["verificationStatus"]);
            
            $Discrepancies = DiscrepanciesOptions();
            $row["discrepanciesTxt"] = $Discrepancies[$row["discrepancies"]];

            $row["verificationOutcomeTxt"] = verificationStatusTxt($row["verificationOutcome"]);
            

            $response = array(
                "C" => 100,
                "R" => $row,
                "M" => "success"
            );
        }else{
            $response = array(
                "C" => 101,
                "R" => array(),
                "M" => "Entered inavlid Application-Id."
            );
        }
        
        return response()->json($response);
    }
}
