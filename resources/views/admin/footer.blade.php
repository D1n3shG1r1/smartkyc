            <!-- footer -->
            <div class="container-fluid">
                <div class="footer">
                <p>Copyright © {{date("Y")}}. All rights reserved.<br><br>
                    Powered by: SMART KYC</a>
                </p>
                </div>
            </div>

            <!--<button type="button" class="model_bt btn btn-primary" data-toggle="modal" data-target="#myModal">Click Here to Open Model</button>-->



        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 style="font-weight:normal;" class="modal-title">Action Required: Complete Your Profile or Renew Package</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            It seems like you have not completed your profile, you haven't purchased the package, or your package may have expired.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-weight:normal;" class="modal-title" id="confirmModalLabel"></h5>
      </div>
      <div class="modal-body" id="confirmMessage">
        <!-- Dynamic content will go here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" id="confirmCancelBtn">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>

<!--- ask for special-access-key --->
<div class="modal fade" id="SAKeyModal" tabindex="-1" aria-labelledby="SAKeyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="font-weight:normal;" class="modal-title" id="SAKeyModalLabel"></h5>
      </div>
      <div class="modal-body">
        <span id="SAKeyMessage"></span>
        <input type="text" id="SAKeyInput" class="form-control" placeholder="Enter your Special Access Key">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal" id="SAKeyCancelBtn">Cancel</button>
        <button type="button" class="btn btn-primary" id="SAKeyConfirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>
<!--- / ask for special-access-key --->

@php
$hasPackage = $LOGINUSER["hasPackage"];
$incompleteProfile = $LOGINUSER["incompleteProfile"];
@endphp 
<script>
$(function(){
    var hasPackage = '{{ $hasPackage }}';
    var incompleteProfile = '{{ $incompleteProfile }}';
    hasPackage = parseInt(hasPackage);
    incompleteProfile = parseInt(incompleteProfile);

    if(hasPackage == 0 || incompleteProfile == 1){
        // Get the modal element
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));

        // Show the modal
        myModal.show();

    }
});

</script>