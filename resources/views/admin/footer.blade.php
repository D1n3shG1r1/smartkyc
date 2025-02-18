            <!-- footer -->
            <div class="container-fluid">
                <div class="footer">
                <p>Copyright © {{date("Y")}}. All rights reserved.<br><br>
                    Powered by: SMART VERIFY</a>
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
                <h4 class="modal-title">Action Required: Complete Your Profile or Renew Package</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            It seems like you have not completed your profile, you haven't purchased the package, or your package may have expired.
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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