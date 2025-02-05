<?php
use Illuminate\Support\Facades\Auth;

   if(!function_exists("db_randnumber")){
        function db_randnumber(){
            return time().rand(9999,999999);
        }
   }

   if(!function_exists('create_local_folder')){
        function create_local_folder($path){
        if(!is_dir($path)){
            mkdir($path,0777);
            exec("chmod 777 $path");
        }
        }
    }

    if(!function_exists('fileWrite')){
        function fileWrite($file,$data,$mode='w+'){
        $fp = fopen($file,$mode);
        fwrite($fp,$data);
        fclose($fp);
        }
    }

    if(!function_exists('fileRead')){
        function fileRead($file){
        $content = file_get_contents($file);
        return $content;
        }
    }

    if(!function_exists('fileRemove')){
        function fileRemove($file){
            unlink($file);
        }
    }

    if(!function_exists('genTimeSlot')){
        function genTimeSlot(){
            // Initialize an empty array to store the time strings
            $timeStrings = array();

            // Loop through the hours (0 to 23)
            for ($hour = 0; $hour <= 23; $hour++) {
                // Loop through the minutes (0, 15, 30, 45)
                for ($minute = 0; $minute <= 45; $minute += 15) {
                    // Format the hour and minute as a time string and add it to the array
                    $timeStrings[] = sprintf("%02d:%02d", $hour, $minute);
                }
            }
            
            // Add "24:00" to the array to represent midnight
            $timeStrings[] = "24:00";

            return $timeStrings;
        }
    }

    if(!function_exists('genOtp')){
        function genOtp(){
            $otp = rand(111111,999999);
            return $otp;
        }
    }

    if(!function_exists('get_client_ip')){
        function get_client_ip() {
            $ipaddress = '';
            //echo "<pre>"; print_r($_SERVER); die;
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';

            return $ipaddress;
        }
    }

    
    if(!function_exists('getSetClientTimezone')){
        function getSetClientTimezone($ip){
            
            if($ip != 'UNKNOWN'){
                $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
            }else{
                $ipInfo = file_get_contents('http://ip-api.com/json/');
            }   
                
            $ipInfo = json_decode($ipInfo);
            if($ipInfo->status == 'success'){
                $timezone = $ipInfo->timezone;
                date_default_timezone_set($timezone);
                //echo date_default_timezone_get();
                //echo date('Y/m/d H:i:s');
            }
            
        }
    }
    
    if(!function_exists('capitalizeWordsInPhrase')){
        function capitalizeWordsInPhrase($phrase) {
            // Function to capitalize words in a phrase
            if (strlen($phrase) > 0) {
                $words = explode(" ", $phrase);
                foreach ($words as &$word) {
                    $word = ucfirst($word);
                }
                return implode(" ", $words);
            } else {
                return "";
            }
        }
    }

    if(!function_exists('validatePhone')){
        function validatePhone($phoneNumber) {
            // Function to validate a phone number
            return preg_match('/^\d{5,15}$/', $phoneNumber);
        }
    }

    if(!function_exists('validateEmail')){
        function validateEmail($email) {
            // Function to validate an email address
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
    }

    if(!function_exists('validatePassword')){
        function validatePassword($password) {
            // Function to validate a password
            $minLength = 8;
            $maxLength = 20;

            $hasUpperCase = preg_match('/[A-Z]/', $password);
            $hasLowerCase = preg_match('/[a-z]/', $password);
            $hasNumber = preg_match('/\d/', $password);
            $hasSpecialChar = preg_match('/[\W_]/', $password);

            $msg = "Password is valid.";
            $err = 0;

            if (strlen($password) < $minLength) {
                $msg = "Password must be at least $minLength characters long.";
                $err = 1;
            } elseif (strlen($password) > $maxLength) {
                $msg = "Password must not exceed $maxLength characters.";
                $err = 1;
            } elseif (!$hasUpperCase) {
                $msg = "Password must include at least one uppercase letter.";
                $err = 1;
            } elseif (!$hasLowerCase) {
                $msg = "Password must include at least one lowercase letter.";
                $err = 1;
            } elseif (!$hasNumber) {
                $msg = "Password must include at least one number.";
                $err = 1;
            } elseif (!$hasSpecialChar) {
                $msg = "Password must include at least one special character.";
                $err = 1;
            }

            return ["err" => $err, "msg" => $msg];
        }
    }

    if(!function_exists('validateName')){
        function validateName($name) {
            // Function to validate a name
            $minLength = 2;
            $maxLength = 50;

            $validCharacters = '/^[A-Za-z\s]+$/';

            $msg = "Name is valid.";
            $err = 0;

            if (strlen($name) < $minLength) {
                $msg = "Name must be at least $minLength characters long.";
                $err = 1;
            } elseif (strlen($name) > $maxLength) {
                $msg = "Name must not exceed $maxLength characters.";
                $err = 1;
            } elseif (!preg_match($validCharacters, $name)) {
                $msg = "Name can only contain letters and spaces.";
                $err = 1;
            }

            return ["err" => $err, "msg" => $msg];
        }
    }

    if(!function_exists('userImagesPath')){
        function userImagesPath($adminId){
            return 'users/' . $adminId . '/assets/images/';
        }
    }

    if(!function_exists('customerDocumentsPath')){
        function customerDocumentsPath($adminId,$customerId,$applicationId){
            return 'users/' . $adminId . '/assets/customers/'.$customerId.'/applications/'.$applicationId.'/documents/';
        }
    }

    if(!function_exists('userImagesDisplayPath')){
        function userImagesDisplayPath($adminId,$image){
            return 'image/' . $adminId .'/'. $image ;
        }
    }

    if(!function_exists('verificationStatusTxt')){
        function verificationStatusTxt($flag){
            
            $vrfstatus[1] = "Verification in Progress";
            $vrfstatus[2] = "Document Failed Verification";
            $vrfstatus[3] = "Document is Expired";
            $vrfstatus[4] = "Document Under Review";
            $vrfstatus[5] = "Further Action Required";
            $vrfstatus[6] = "Verification Incomplete (Pending Information)";
            $vrfstatus[7] = "Document is Fraudulent";
            $vrfstatus[8] = "Unable to Verify (Issuing Authority Unreachable)";
            $vrfstatus[9] = "Document Requires Manual Review";
            $vrfstatus[10] = "Document Verified with Discrepancies";
            $vrfstatus[11] = "Verified as Authentic";
            
            return $vrfstatus[$flag];
        }
    }
    
    if(!function_exists('getFileMimeType')){
        function getFileMimeType($file){
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            // Define a simple MIME type map
            $mimeTypes = [
                'jpeg' => 'image/jpeg',
                'jpg'  => 'image/jpeg',
                'png'  => 'image/png',
                'pdf'  => 'application/pdf',
                'txt'  => 'text/plain',
                // Add more MIME types here as needed
            ];

            // Check if the file extension is in the map
            $mimeType = isset($mimeTypes[$extension]) ? $mimeTypes[$extension] : 'application/octet-stream';

            return $mimeType;
        }
    }

    if(!function_exists('verificationStatusOptions')){
        function verificationStatusOptions(){
            //verification outcome
            $vrfstatus[1] = "Verification in Progress";
            $vrfstatus[2] = "Document Failed Verification";
            $vrfstatus[3] = "Document is Expired";
            $vrfstatus[4] = "Document Under Review";
            $vrfstatus[5] = "Further Action Required";
            $vrfstatus[6] = "Verification Incomplete (Pending Information)";
            $vrfstatus[7] = "Document is Fraudulent";
            $vrfstatus[8] = "Unable to Verify (Issuing Authority Unreachable)";
            $vrfstatus[9] = "Document Requires Manual Review";
            $vrfstatus[10] = "Document Verified with Discrepancies";
            $vrfstatus[11] = "Verified as Authentic";
            
            return $vrfstatus;
        }
    }

    if(!function_exists('DiscrepanciesOptions')){
        function DiscrepanciesOptions(){
            
            $options[1] = "No Discrepancies Found";
            $options[2] = "Invalid Document Number";
            $options[3] = "Document Expired";
            $options[4] = "Mismatch in Applicant Name";
            $options[5] = "Issuing Authority Not Found";
            $options[6] = "Date Discrepancy (e.g., issue date does not match records)";
            $options[7] = "Incomplete Information Provided";
            $options[8] = "Document Not Registered with Issuing Authority";
            $options[9] = "Document Tampered or Altered";
            $options[10] = "Unrecognized Document Format";
            $options[11] = "Inconsistent Data with Authority Records";
            $options[12] = "Duplicate Document Found";
            $options[13] = "Verification Process Incomplete (Further Information Required)";
            $options[14] = "Fraudulent Document Detected";
            $options[15] = "Other";
            
            return $options;
        }
    }
?>
