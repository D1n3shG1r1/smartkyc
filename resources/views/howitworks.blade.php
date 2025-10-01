@extends("app")
@section("contentbox")

@include('carousel')

<style>
.ul-group li::before{
    position: relative;
    content: "\f0da";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 10px;
}

.ul-group{
    padding: 0;
    list-style: none;
}

.ul-group li{
    margin-left: 2px;
}

.service .service-item {
    height: 400px;
}

</style>

<!-- Feature Start -->
<div class="feature">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="feature-img">
                    <img src="{{url('assets/img/howitwork.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>How does it work ?</p>
                    <h2>World's quickest inspection marketplace!</h2>
                </div>

                <div class="about-text">
                    <p>
                    Are you an inspection company or a freelance quality professional?
                    </p>
                    <p>
                    Whether you're a global, regional, domestic inspection company, or a freelance quality pro, you're welcome to submit your application to become a registered vendor, all in 6 easy steps.
                    </p>
                    <p>
                    Submit your application for review, and once approved, check our short or long term jobs you may want to submit an offer for.
                    </p>
                    <p>
                    Welcome to SmartKYC, the ultimate document verification platform designed to streamline and simplify vendor and contractor verification for businesses and government agencies. Follow these easy steps to get started and make informed decisions with verified data. 
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

<!-- Service Start -->
<div class="service mt-0">
    <div class="container">
        <div class="section-header">
            <p>How does it work ?</p>
            <h2>Quick and Easy Verification Steps</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/howitwork-1.png')}}" alt="Sign Up &amp; Set Up Your Account">
                    <h3>Sign Up &amp; Set Up Your Account</h3>
                    <p>
                    <ul class="ul-group text-left">
                        <li>
                        Visit SmartKYC.ng and create an account.
                        </li>
                        <li>
                        Complete your profile with relevant business details.
                        </li>
                        <li>
                        Select a verification package that best suits your needs.
                        </li>
                        <li>
                        Make a secure payment to activate your verification services.
                        </li>
                    </ul>
                    </p>
                    <!--<a href="">Read More</a>-->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/howitwork-2.png')}}" alt="Request Document Verification">
                    <h3>Request Document Verification</h3>
                    <p>
                    <ul class="ul-group text-left">
                        <li>
                        Generate a unique verification request link for each vendor or applicant.
                        </li>
                        <li>
                        Specify the exact documents required for verification.
                        </li>
                    </ul>
                    </p>
                    <!--<a href="">Read More</a>-->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/howitwork-3.png')}}" alt="Track Your Applicants">
                    <h3>Track Your Applicants</h3>
                    <p>
                    <ul class="ul-group text-left">
                        <li>
                        View all submitted applicants on your Customer Dashboard.
                        </li>
                        <li>
                        Receive real-time updates on the status of each verification request.
                        </li>
                    </ul>
                    </p>
                    <!--<a href="">Read More</a>-->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/howitwork-4.png')}}" alt="Get Verified Reports">
                    <h3>Get Verified Reports</h3>
                    <p>
                    <ul class="ul-group text-left">
                        <li>
                        SmartKYC Officers will conduct thorough verification and submit a detailed report.
                        </li>
                        <li>
                        The report is sent to the Customer, who can then view the verification status to make decisions regarding their applicant/vendor.
                        </li>
                    </ul>
                    </p>
                    <!--<a href="">Read More</a>-->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/howitwork-5.png')}}" alt="Applicant Receive a Verification Request">
                    <h3>Applicant Receive a Verification Request</h3>
                    <p>
                    <ul class="ul-group text-left">
                        <li>
                        If a customer requires your documents for verification, you’ll receive a secure link.
                        </li>
                    </ul>
                    </p>
                    <!--<a href="">Read More</a>-->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/howitwork-6.png')}}" alt="Upload Required Documents">
                    <h3>Upload Required Documents</h3>
                    <p>
                    <ul class="ul-group text-left">
                        <li>
                        Click the link, complete your profile, and upload the requested documents.
                        </li>
                        <li>
                        Once submitted, your documents will be reviewed by SmartKYC Officers.
                        </li>
                        <li>
                        The verification outcome will be sent to the customer who requested your details.
                        </li>
                    </ul>
                    </p>
                    <!--<a href="">Read More</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

@endsection
@push("js")
@endpush