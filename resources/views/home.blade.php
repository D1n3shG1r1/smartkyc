@extends("app")
@section("contentbox")

@include('carousel')

<!-- About Start -->
<style>
.about-text .ul-group li::before,
.service-item .ul-group li::before {
    position: relative;
    content: "\f0da";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 10px;
}

.about-text .ul-group,
.service-item .ul-group{
    padding: 0;
    list-style: none;
}

.about-text .ul-group li,
.service-item .ul-group li{
    margin-left: 2px;
}



.counters-text-h2{font-size: 1.5rem !important;}

.counters-text-p{font-size: 1rem !important;}
</style>

<div class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="about-img">
                    <div class="about-img-1">
                        <img style="transform: scaleX(-1);" src="{{url('assets/img/about-1.jpg')}}" alt="Image">
                    </div>
                    <div class="about-img-2 hide">
                        <img src="{{url('assets/img/about-2.jpg')}}" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>About Us</p>
                    <h2>Fast, Accurate, and Secure Verification</h2>
                </div>
                <div class="about-text">
                    <p>
                    At SmartKYC, our mission is to provide a secure, reliable, and efficient platform for verifying critical documents for organizations, governments, and individuals. Founded with the goal of ensuring transparency and trust in business transactions, we empower users to validate essential documents like government-issued certificates, financial records, tax filings, and vendor credentials with ease. 
                    </p>
                    <p>
                    We recognize the growing need for accurate and timely document verification in today’s fast-paced business environment, where due diligence and compliance are more important than ever. Reducing the risk of fraud and ensuring businesses and individuals can make informed decisions.
                    </p>
                    <!--<a class="btn" href="">Learn More</a>-->
                </div>
            </div>
        </div>

        <div class="row align-items-center mt-2">
            <div class="col-md-12">
                <div class="about-text">
                    <p>
                    With a user-friendly interface and comprehensive range of services, SmartKYC is built to serve clients across industries, including finance, real estate, government, and more. Our platform offers real-time tracking, bulk verification, API integration, and customizable reports, making it the preferred solution for businesses that value security and efficiency.
                    </p>
                    <p>
                    At SmartKYC, we are committed to upholding the highest standards of integrity, data protection, and customer satisfaction. Whether you are verifying the authenticity of vendor documents or ensuring compliance with industry regulations, SmartKYC is your trusted partner for all your document verification needs.
                    </p>

                    <ul class="ul-group">
                        <li>Our Vision - To be the leading global platform for document verification, ensuring trust and transparency in business and government transactions.</li>
                        <li>Our Mission - To provide fast, accurate, and secure verification services that help businesses and individuals reduce risks and ensure compliance in an ever-evolving digital world.</li>
                    </ul>

                    <p>
                        <a href="http://smarttechnology.ng/" target="_blank" style="
    color: #0796fe;">Read about Smart Technology Board of Directors</a>
                    </p>

                </div>
            </div>
        </div>


    </div>
</div>
<!-- About End -->
    
<!-- Feature Start -->
<div class="feature">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="feature-img">
                    <!--<img src="{{url('assets/img/business-man.png')}}" alt="Image">-->
                    <img src="{{url('assets/img/trackapplication-man.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>Our Feature</p>
                    <h2>Why Choose Us?</h2>
                </div>
                <p>
                To provide fast, accurate, and secure verification services that help businesses and individuals reduce risks and ensure compliance in an ever-evolving digital world.
                </p>
                <div class="row counters">
                    <div class="col-12">
                        <!--<i class="bi bi-shield-lock"></i>-->
                        <div class="counters-text">
                            <h2 class="counters-text-h2" data-toggle="counter-upd">Security</h2>
                            <p class="counters-text-p">We prioritize data protection and the confidentiality of all documents submitted.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <!--<i class="bi bi-check-circle"></i>-->
                        <div class="counters-text">
                            <h2 class="counters-text-h2" data-toggle="counter-upd">Reliability</h2>
                            <p class="counters-text-p">Our verification processes are thorough and designed to minimize errors or fraud.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <!--<i class="bi bi-lightning"></i>-->
                        <div class="counters-text">
                            <h2 class="counters-text-h2" data-toggle="counter-upd">Efficiency</h2>
                            <p class="counters-text-p">With real-time tracking and automated services, we make verification fast and hassle-free.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <!--<i class="bi bi-person-badge"></i>-->
                        <div class="counters-text">
                            <h2 class="counters-text-h2" data-toggle="counter-upd">Expertise</h2>
                            <p class="counters-text-p">Our platform is built on deep industry knowledge, ensuring that we meet the diverse needs of our clients.</p>
                        </div>
                    </div>
                    
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
            <p>SmartKYC</p>
            <h2>Getting Started with SmartKYC</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/signup.png')}}" alt="Sign Up & Set Up Your Account">
                    <h3>Sign Up & Set Up Your Account</h3>
                    <p>
                    <ul class="ul-group">
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
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/requestdocument.png')}}" alt="Request Document Verification">
                    <h3>Request Document Verification</h3>
                    <p>
                    <ul class="ul-group">
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
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/trackdocument.png')}}" alt="Track Your Applicants">
                    <h3>Track Your Applicants</h3>
                    <p>
                    <ul class="ul-group">
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
            <div class="col-lg-3 col-md-6">
                <div class="service-item">
                    <img src="{{url('assets/img/verifiedreport.png')}}" alt="Get Verified Reports">
                    <h3>Get Verified Reports</h3>
                    <p>
                    <ul class="ul-group">
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
        </div>
    </div>
    </div>
    <!-- Service End -->

@endsection
@push("js")
@endpush
