@extends("app")
@section("contentbox")
<style>
.feature .counters h2 {
    font-size: 1.2rem !important;
}

.feature .counters p {
    font-size: 1.2rem !important;
}
</style>

<!-- Feature Start -->
<div class="feature mt-3">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="feature-img">
                    <img src="{{url('assets/img/trackapplication.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>Account Verify</p> 
                    <h2>Thank You for Verifying!</h2>
                </div>
                <p>
                Your account has been successfully verified. You can now log in and start using SmartKYC!
                </p>
                <div class="row counters">
                    <div class="col-12">
                        <ul class="ul-group text-left">
                            <li>Complete your profile with the relevant business details.</li>
                            <li>Select a verification package that best suits your needs.</li>
                            <li>Make a secure payment to activate your verification services.</li>
                        </ul>

                        <button id="registerLoginBtn" type="button" class="btn btn-primary" data-txt="Login" data-loadingtxt="Logging In..." onclick="getStarted();">
                    Login
                    </button>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

@endsection
@push("js")
@endpush