@php
$customersData = $customers["data"];
@endphp
@extends("app")
@section("contentbox")
<style>
/* Add this class to the icon or button to apply the spinning effect */
.spinner {
    display: inline-block;
    animation: spin 1s linear infinite;  /* Adjust the speed by changing the time (1s in this case) */
}

/* Define the keyframes to animate the rotation */
@keyframes spin {
    0% {
        transform: rotate(0deg);  /* Starting angle */
    }
    100% {
        transform: rotate(360deg);  /* Full rotation */
    }
}


#requestModal .btn-group, #newRequestModal .btn-group{
    width: 100% !important;
}

.multiselect.dropdown-toggle.btn.btn-default, .custom-multiselect{
    width: 100% !important;
    text-align: left;
    
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;

}

.multiselect.dropdown-toggle.btn.btn-default::after, .custom-multiselect::after{
    float: right;
    font-size: 19px;
    margin-top: 8px;
}


.multiselect-container.dropdown-menu {
    overflow: hidden auto;
    height: 150px;
    padding: 5px;
}

</style>

<link rel="stylesheet" href="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/js/bootstrap-multiselect.js"></script>

<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="row page_title">
                <div class="col-md-3"><h2>My Applicants</h2></div>
                <div class="col-md-9">
                    <a href="javascript:void(0);" onclick="newApplication();" class="pull-right a-button" data-id="0" data-toggle="modal" data-target="#newRequestModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to add a new applicant and make a document request."><i class="fa fa-plus"></i>&nbsp;Add Applicant</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0 row fullwidth">
                    <div class="col-md-6">
                        <h2>Applicants List</h2>
                    </div>
                    <div class="col-md-6 align-right">
                        <form class="searchForm" method="get" >
                            <input type="email" name="email" class="form-control searchInput" placeholder="Enter email to search">
                            <button type="submit" class="form-control searchButton"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>OTP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    if(!empty($customersData)){
                        foreach($customersData as $k => $row){    
                            
                            $id = $row["id"];
                            $email = $row["email"];
                            $fname = $row["fname"];
                            $lname = $row["lname"];
                            $fullName = ucwords($fname." ".$lname);
                            $otp = $row["otp"];
                            
                    ?>
                                
                        <tr id="row-{{$id}}">
                            <td class="applicantRowIdCol">{{$k+1}}</td>
                            <td class="applicantNameCol">{{$fullName}}</td>
                            <td class="applicantEmailCol">{{$email}}</td>
                            <td class="applicantOtpCol" id="otp-{{$id}}"><span style="letter-spacing: 5px;">{{$otp}}</span>
                            <br>
                            <a href="javascript:void(0);" id="otpcopybtn-{{$id}}" class="btn btn-outline-primary" onclick="copyOtp(this);" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy the OTP and share it with your applicant manually via a phone call, email, or SMS." style="cursor:pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"></path>
                                </svg>
                            </a>
                            &nbsp;
                            <a href="javascript:void(0);" data-id="{{$id}}" onclick="generateotp(this);" class="btn cur-p btn-outline-primary regenerate-otp-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Regenerate and copy the OTP, then share it with your applicant manually via phone call, email, or SMS." style="cursor:pointer;"><i class="fa fa-refresh"></i></a>
                            </td>

                            <td class="applicantActionCol">
                                
                                <a href="javascript:void(0);" onclick="getApllicantProfileData(this);" data-id="{{$id}}" data-toggle="modal" data-target="#profileModal" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="View applicant details." style="cursor:pointer;"><i class="fa fa-file-text-o"></i>&nbsp;View</a>

                                <!--
                                <span class="navSeprator"></span>
                                <a href="javascript:void(0);" data-id="{{$id}}" onclick="generateotp(this);" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete applicant and his all related documents" style="cursor:pointer;"><i class="fa fa-trash-o"></i>&nbsp; Delete</a>
                                -->

                                <span class="navSeprator"></span>
                                <a href="javascript:void(0);" onclick="getApllicantData(this);" data-id="{{$id}}"  class="" data-toggle="modal" data-target="#requestModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Make a new request to upload documents for verification." style="cursor:pointer;"><i class="fa fa-newspaper-o"></i>&nbsp; Request Document</a>
                                
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>    
                    </tbody>
                </table>
                </div>

                <div class="btn-group mr-2 pagination button_section button_style2">
                @php
          
                    $prevLink = $customers["links"][0]["url"]; //prevbutton url
                    $nextLink = $customers["links"][count($customers["links"]) - 1]["url"]; //nextbutton url
                    $activePageNum = "";
                    foreach($customers["links"] as $linkRw){
                        if($linkRw["active"] == 1){
                        $activePageNum = $linkRw["label"];
                        }
                    }  

                    if($prevLink != ""){
                        $prevurl = $prevLink;
                        $prevHref = 'href='.$prevurl;
                        $prevdisable = "";
                    }else{
                        $prevHref = "";
                        $prevdisable = "disabled";
                    }

                    if($nextLink != ""){
                        $nexturl = $nextLink;
                        $nextHref = 'href='.$nexturl;
                        $nextdisable = "";
                    }else{
                        $nextHref = "";
                        $nextdisable = "disabled";
                    }
                    
                    @endphp    
         
                <a class="btn paginate_button previous {{$prevdisable}}" {{$prevHref}} aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous"><i class="fa fa-angle-double-left"></i></a>
            
                <a class="btn active paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">{{$activePageNum}}</a>
            
                <a class="btn paginate_button next {{$nextdisable}}" {{$nextHref}}  aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="-1" id="DataTables_Table_0_next"><i class="fa fa-angle-double-right"></i></a>    
            </div>

            </div>
        </div>
        </div>
    </div>
</div>

<div id="profileModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Applicant Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="applicantPName">Name &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Name."></i></label>
                    <input type="text" class="form-control" id="applicantPName" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="applicantPEmail">Email &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Email."></i></label>
                    <input type="email" class="form-control" id="applicantPEmail" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="applicantPPhone">Phone &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Phone."></i></label>
                    <input type="text" class="form-control" id="applicantPPhone" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="applicantPAddress_1">Address 1 &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant address 1."></i></label>
                    <input type="text" class="form-control" id="applicantPAddress_1" readonly>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="applicantPAddress_2">Address 2 &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant address 2."></i></label>
                    <input type="text" class="form-control" id="applicantPAddress_2" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="applicantPCity">City &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant City."></i></label>
                    <input type="text" class="form-control" id="applicantPCity" readonly>
                </div>
            </div>
            

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="applicantPCountry">Country &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Country."></i></label>
                    <input type="text" class="form-control" id="applicantPCountry" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="applicantPZipcode">Zipcode &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Zipcode."></i></label>
                    <input type="text" class="form-control" id="applicantPZipcode" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="applicantPCompany">Company &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Company."></i></label>
                    <input type="text" class="form-control" id="applicantPCompany" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="applicantPWebsite">Website &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Website."></i></label>
                    <input type="text" class="form-control" id="applicantPWebsite" readonly>
                </div>
            </div>

        </form>
        

      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>

<div id="requestModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Request Document Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="applicantName">Name &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Name."></i></label>
                <input type="text" class="form-control" id="applicantName" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="applicantEmail">Email &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Email."></i></label>
                <input type="email" class="form-control" id="applicantEmail" readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                
                <!--
                <label for="inputApplication">Application &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Select an application ID for an existing application, or select 'New Application' to initiate a new verification."></i></label>
                <select id="inputApplication" class="form-control">
                    <option value="0">New Application</option>
                </select>
                -->

                <label for="inputComment">Last date of submission &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Last date for document submission."></i></label>
                <input type="date" min="{{date('Y-m-d')}}" class="form-control" id="lastDate" /> 

            </div>
            <div class="form-group col-md-6">
                <label for="inputDocumentType">Document Type &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Select the document type for verification."></i></label>
                <select id="inputDocumentType" class="form-control" multiple="multiple">
                    <?php foreach(documentsTypes() as $k => $v){
                        echo '<option value="'.$k.'">'.$v.'</option>';
                    }
                    ?>
                    
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputComment">Any comment &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Any special notes for the applicant?"></i></label>
                <textarea class="form-control" style="resize:none;" rows="5" id="inputComment" maxlength="250" oninput="updateCharacterCount()"></textarea>
                <p class="text-align-right">Remaining characters: <span id="remainingChars">250</span></p>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <span id="modalMessage" class="hideMe">check it out!</span>   
            </div>
            <div class="form-group col-md-6" style="text-align: right; padding-top: 27px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendRequest();"><i class="fa fa-send-o"></i>&nbsp;Send</button>
            </div>
        </div>
        
        <div class="form-row">
            <div class="hideMe form-group col-md-12" id="portalLinkParent">
                <span class="portalLinkContainer alert alert-primary">
                    
                <div class="form-row">
                    <div class="form-group col-md-9">
                    
                        <label>Applicant Portal:</label>
                        <!--<input class="blue1_color btn btn-copy-link" type="text" id="portalLink" value="http://local.smartkyc.com/portal/login/1f7eb1d132dd059422ead7d5660301a21db9d2eb" readonly="">-->

                        <!--<span style="line-break: anywhere;" id="portalLink">...</span>-->


                        <textarea rows="3" style="line-break: anywhere;border: none;background: transparent;overflow: hidden;resize: none;width: 100%;" id="portalLink">Loding...</textarea>

                    </div>
                    
                    <div class="form-group col-md-3">
                        <button type="button" class="btn btn-outline-primary" onclick="copyLink('portalLink');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"></path>
                            </svg>
                            Copy Link
                        </button>    
                        
                    </div>
                </div>

                <label>Copy the link above and share it with your customers to upload the documents for verification.</label>

                </span>
            </div>
        </div>

            <input type="hidden" class="form-control" id="applicantId">
            <input type="hidden" class="form-control" id="inputApplication" value="0">
            
        </form>
        

      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>

<div id="newRequestModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span>Add a new applicant and make a document request.</span>  
        <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="New_applicantName">Applicant Name &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Name."></i></label>
                <input type="text" class="form-control" id="New_applicantName"/>
            </div>
            <div class="form-group col-md-6">
                <label for="New_applicantEmail">Applicant Email &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Applicant Email."></i></label>
                <input type="email" class="form-control" id="New_applicantEmail"/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                
                <!--
                <label for="inputApplication">Application &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Select an application ID for an existing application, or select 'New Application' to initiate a new verification."></i></label>
                <select id="inputApplication" class="form-control">
                    <option value="0">New Application</option>
                </select>
                -->

                <label for="New_lastDate">Last date of submission&nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Last date for document submission."></i></label>
                <input type="date" min="{{date('Y-m-d')}}" class="form-control" id="New_lastDate" /> 

            </div>
            <div class="form-group col-md-6">
                <label for="inputNew_DocumentType">Document Type &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Select the document type for verification."></i></label>
                
                <select id="inputNew_DocumentType" class="form-control" multiple="multiple">
                    <?php foreach(documentsTypes() as $k => $v){
                        echo '<option value="'.$k.'">'.$v.'</option>';
                    }
                    ?>
                </select>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputNew_Comment">Any comment &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" style="cursor:pointer;" data-original-title="Any special notes for the applicant?"></i></label>
                <textarea class="form-control" style="resize:none;" rows="5" id="inputNew_Comment" maxlength="250" oninput="updateCharacterCount()"></textarea>
                <p class="text-align-right">Remaining characters: <span id="remainingChars">250</span></p>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <span id="modalNew_Message" class="hideMe">check it out!</span>   
            </div>
            <div class="form-group col-md-6" style="text-align: right; padding-top: 27px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendNewRequest();"><i class="fa fa-send-o"></i>&nbsp;Send</button>
            </div>
        </div>
        
        <div class="form-row">
            <div class="hideMe form-group col-md-12" id="New_portalLinkParent">
                <span class="portalLinkContainer alert alert-primary">
                    
                <div class="form-row">
                    <div class="form-group col-md-9">
                    
                        <label>Applicant Portal:</label>
                        <!--<input class="blue1_color btn btn-copy-link" type="text" id="portalLink" value="http://local.smartkyc.com/portal/login/1f7eb1d132dd059422ead7d5660301a21db9d2eb" readonly="">-->

                        <!--<span style="line-break: anywhere;" id="portalLink">...</span>-->


                        <textarea rows="3" style="line-break: anywhere;border: none;background: transparent;overflow: hidden;resize: none;width: 100%;" id="New_portalLink">Loding...</textarea>

                    </div>
                    
                    <div class="form-group col-md-3">
                        <button type="button" class="btn btn-outline-primary" onclick="copyLink('New_portalLink');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"></path>
                            </svg>
                            Copy Link
                        </button>    
                       
                    </div>
                </div>

                <label>Copy the link above and share it with your customers to upload the documents for verification.</label>

                </span>
            </div>
        </div>

            <input type="hidden" class="form-control" id="New_applicantId" value="0">
            <input type="hidden" class="form-control" id="inputNew_Application" value="0">
            
        </form>
        

      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>

@endsection
@push("js")
<script>

var TMP_DOCTYPES = [];

$(function(){
    $('#inputNew_DocumentType, #inputDocumentType').multiselect({
        buttonClass:'custom-multiselect',
        inheritClass:true,
        selectedClass:'active',
        maxHeight:'300px',
        nonSelectedText: 'None selected',
        onChange:function (option, checked) {
            
            if(checked == true){
                TMP_DOCTYPES.push(option[0].value);
            }else{
                var idx = TMP_DOCTYPES.indexOf(option[0].value);
                TMP_DOCTYPES.splice(idx, 1);
            }
        },
    });
});


function copyOtp(elm) {
    // Get the ID attribute of the element
    var idAttr = elm.getAttribute("id");
    
    // Split the ID to extract the dataId part
    var idAttrParts = idAttr.split("-");
    var dataId = idAttrParts[1];

    // Get the td element that contains the OTP text
    var otpTd = document.getElementById('otp-' + dataId);

    // Get the text content (assuming it's wrapped in a span or another tag)
    var link = otpTd.querySelector("span");

    // Select the text inside the link/span
    var range = document.createRange();
    range.selectNodeContents(link);
    var selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);

    // Copy the selected text
    document.execCommand("copy");

    // Show the success message
    var err = 0;
    var msg = "OTP copied to clipboard: " + link.textContent;
    showToast(err, msg);
}


function generateotp(elm){
    
    var spinnerIcon = elm.querySelector(".fa.fa-refresh");
    spinnerIcon.classList.add("spinner");

    var dataId = $(elm).attr("data-id");

    var requrl = "admin/generateotp";
    var postdata = {
        "id":dataId
    };
    
    callajax(requrl, postdata, function(resp){
        $(".errorMessage").html(resp.M);
        var err = 1;
        if(resp.C == 100){
            err = 0;
            const newOtp = resp.R.otp;
            $("#otp-"+dataId+" span").text(newOtp);
        }
        
        var msg = resp.M;
        showToast(err,msg);
        spinnerIcon.classList.remove("spinner");
    });
}

function newApplication(){
    
}

function getApllicantProfileData(elm){
    
    var applicantId = $(elm).attr("data-id");
    
    $("#applicantPName, #applicantPEmail, #applicantPPhone, #applicantPAddress_1, #applicantPAddress_2, #applicantPCity, #applicantPCountry, #applicantPZipcode, #applicantPCompany, #applicantPWebsite").val("Loading...");

    var requrl = "admin/getApplicantProfile";
    var postdata = {
        "applicantId":applicantId
    };

    callajax(requrl, postdata, function(resp){
        if(resp.C == 100){
            var applicant = resp.R.applicant;

            var applicantName = applicant.fname+' '+applicant.lname;
            applicantName = capatilizeWordsInPhrase(applicantName);
            $("#applicantPName").val(applicantName);
            $("#applicantPEmail").val(applicant.email);
            $("#applicantPPhone").val(applicant.phone);
            $("#applicantPAddress_1").val(applicant.address_1);
            $("#applicantPAddress_2").val(applicant.address_2);
            $("#applicantPCity").val(applicant.city);
            $("#applicantPCountry").val(applicant.country);
            $("#applicantPZipcode").val(applicant.zipcode);
            $("#applicantPCompany").val(applicant.company);
            $("#applicantPWebsite").val(applicant.website);

        }
    });
}

function getApllicantData(elm){
    
    $("#portalLinkParent").addClass("hideMe");

    var applicantId = $(elm).attr("data-id");
    $("#applicantId").val(applicantId);
    
    // Show loading state (Optional)
    $("#portalLink").html("Loading...");
    $("#applicantName, #applicantEmail").val("Loading...");

    var requrl = "admin/getApplicantData";
    var postdata = {
        "applicantId":applicantId
    };
    
    callajax(requrl, postdata, function(resp){
        if(resp.C == 100){
            const customer = resp.R.customer;
            const applications = resp.R.applications;

            var applicantName = customer.fname+' '+customer.lname;
            applicantName = capatilizeWordsInPhrase(applicantName);
            $("#applicantName").val(applicantName);
            $("#applicantEmail").val(customer.email);
            
            /*var optionHtml = '<option value="">Choose...</option>';
            if(applications.length > 0){
                $.each(applications, function(i, v){
                    optionHtml += '<option value="'+v.id+'">App ID:'+v.id+'</option>';
                });
            }
            
            optionHtml += '<option value="0">New Application</option>';

            $("#inputApplication").html(optionHtml);*/
        }
        
    });
}

function updateCharacterCount() {
    var textarea = document.getElementById("inputComment");
    var remainingChars = document.getElementById("remainingChars");
    var maxLength = textarea.getAttribute("maxlength");
    var currentLength = textarea.value.length;

    var charsLeft = maxLength - currentLength;
    remainingChars.textContent = charsLeft;

    if (charsLeft <= 0) {
        remainingChars.style.color = "red";
    } else {
        remainingChars.style.color = "black";
    }
}

function sendRequest(){
    var applicantId = $("#applicantId").val();
    var applicantName = $("#applicantName").val();
    var applicantEmail = $("#applicantEmail").val();
    var inputApplication = $("#inputApplication").val();
    var inputDocumentType = $("#inputDocumentType").val();
    var inputComment = $("#inputComment").val();
    var lastDate = $("#lastDate").val();
    
    var modalErrId = "modalMessage";

    if(!isRealValue(inputApplication)){
        var err = 1;
        var msg = 'Choose the application for which the document is required.';
        modalErr(modalErrId, err, msg);
        return false;
    }else if(!isRealValue(inputDocumentType)){
        var err = 1;
        var msg = 'Please choose a document type.';
        modalErr(modalErrId, err, msg);
        return false;
    }else if(!isRealValue(lastDate)){
        var err = 1;
        var msg = 'Please specify the last date for document submission.';
        modalErr(modalErrId, err, msg);
        return false;
    }else if(!isRealValue(inputComment)){
        var err = 1;
        var msg = 'Please add a comment for the applicant.';
        modalErr(modalErrId, err, msg);
        return false;
    }else{
        
        var requrl = "admin/sendDocumentRequest";
        var postdata = {
            "applicantId":applicantId,
            "inputApplication":inputApplication,
            "inputDocumentType":inputDocumentType,
            "inputComment":inputComment,
            "lastDate":lastDate
        };
        
        callajax(requrl, postdata, function(resp){
            $("#applicantId").val("");
            $("#applicantName").val("");
            $("#applicantEmail").val("");
            $("#inputApplication").val("");
            $("#inputDocumentType").val("");
            $("#inputComment").val("");
            $("#lastDate").val("");
            
            if(resp.C == 100){
                
                var err = 0;
                var msg = resp.M;
                modalErr(modalErrId, err, msg);
                $("#portalLinkParent").removeClass("hideMe");
                $("#portalLink").html(resp.R.uploadLink);

            }else{
                var err = 1;
                var msg = resp.M;
                modalErr(modalErrId, err, msg);

            }

            /*
            setTimeout(function(){
                $('#requestModal').modal('hide');
            }, 3000);
            */
            
        });
    }

}

function sendNewRequest(){
    var applicantId = $("#New_applicantId").val();
    var applicantName = $("#New_applicantName").val();
    var applicantEmail = $("#New_applicantEmail").val();
    var inputApplication = $("#inputNew_Application").val();
    var inputDocumentType = TMP_DOCTYPES; //$("#inputNew_DocumentType").val();
    var inputComment = $("#inputNew_Comment").val();
    var lastDate = $("#New_lastDate").val();
    
    var modalErrId = "modalNew_Message";
    
    var fnameObj = validateName(applicantName);
    //var lnameObj = validateName(lname);
    var fnameerr = fnameObj.err;
    var fnamemsg = fnameObj.msg;
    
    if(!isRealValue(applicantName)){
        var err = 1;
        var msg = "Please enter the applicant's name.";
        modalErr(modalErrId, err, msg);
        return false;
    }else if(fnameerr == 1){
        var err = 1;
        var msg = fnamemsg;
        modalErr(modalErrId, err, msg);
        return false;
    }else if(!isRealValue(applicantEmail)){
        var err = 1;
        var msg = "Please enter the applicant's email.";
        modalErr(modalErrId, err, msg);
        return false;
    }else if(!validateEmail(applicantEmail)){
        var err = 1;
        var msg = "Please enter a valid email address.";
        modalErr(modalErrId, err, msg);
        return false;
    }/*else if(!isRealValue(inputApplication)){
        var err = 1;
        var msg = 'Choose the application for which the document is required.';
        modalErr(modalErrId, err, msg);
        return false;
    }*/else if(!isRealValue(lastDate)){
        var err = 1;
        var msg = 'Please specify the last date for document submission.';
        modalErr(modalErrId, err, msg);
        return false;
    }else if(!isRealValue(inputDocumentType) || inputDocumentType.length == 0){
        var err = 1;
        var msg = 'Please choose a document type.';
        modalErr(modalErrId, err, msg);
        return false;
    }else if(!isRealValue(inputComment)){
        var err = 1;
        var msg = 'Please add a comment for the applicant.';
        modalErr(modalErrId, err, msg);
        return false;
    }else{
        
        var requrl = "admin/addNewApplicant";
        var postdata = {
            "applicantId":applicantId,
            "inputApplication":inputApplication,
            "applicantName":applicantName,
            "applicantEmail":applicantEmail,
            "inputDocumentType":inputDocumentType,
            "inputComment":inputComment,
            "lastDate":lastDate
        };
        
        callajax(requrl, postdata, function(resp){

            $("#New_applicantId").val("");
            $("#New_applicantName").val("");
            $("#New_applicantEmail").val("");
            $("#inputNew_Application").val("");
            $("#inputNew_DocumentType").val("");
            $("#inputNew_Comment").val("");
            $("#New_lastDate").val("");
            TMP_DOCTYPES = [];

            if(resp.C == 100){
                
                var err = 0;
                var msg = resp.M;
                modalErr(modalErrId, err, msg);
                $("#New_portalLinkParent").removeClass("hideMe");
                $("#New_portalLink").html(resp.R.uploadLink);

            }else{
                var err = 1;
                var msg = resp.M;
                modalErr(modalErrId, err, msg);

            }
            //modalNew_Message
            /*
            setTimeout(function(){
                $('#requestModal').modal('hide');
            }, 3000);
            */
            
        });
    }
}


function copyLink(elmId) {
    // Get the text field containing the link
    var link = document.getElementById(elmId);

    // Select the text field
    link.select();
    link.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    document.execCommand("copy");

    var err = 0;
    var msg = "Link copied to clipboard: " + link.value;
    showToast(err,msg);
}

function modalErr(modalErrId, err, msg){
    
    if(err == 1){
        //err
        $("#"+modalErrId).removeClass("successMsg");
        $("#"+modalErrId).addClass("errorMsg");
    }else{
        //success
        $("#"+modalErrId).addClass("successMsg");
        $("#"+modalErrId).removeClass("errorMsg");
    }

    $("#"+modalErrId).html(msg);
    $("#"+modalErrId).removeClass("hideMe");

    setTimeout(function(){
        $("#"+modalErrId).addClass("hideMe");
    }, 5000);
}

</script>
@endpush