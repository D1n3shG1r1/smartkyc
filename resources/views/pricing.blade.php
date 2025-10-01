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
    height: 430px;
}

.ul-no-group{list-style: none;}

.textColorDark{color: #092a49;}
.textColorLight{color: #0796fe;}

</style>

<!-- Feature Start -->
<div class="feature">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="feature-img">
                    <img src="{{url('assets/img/pricing.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>Pricing</p>
                    <h2>Smarter Verification for Smarter Decisions</h2>
                </div>

                <div class="about-text">
                    <p>
                    Welcome to Nigeria’s most reliable document verification platform.
                    </p>
                    <p>
                    Whether you’re a government agency, corporate institution, or private business, SmartKYC gives you the power to verify your vendors, contractors, or applicants quickly and securely — all in just a few steps.
                    </p>
                    <p>
                    We know that each organization is unique. That’s why our pricing is fully tailored to meet your specific needs. We base our service plans on:
                    </p>
                    <ul class="ul-group text-left">
                        <li>
                        The number of vendors or contractors you need to verify
                        </li>
                        <li>
                        Your industry’s risk level and compliance requirements
                        </li>
                        <li>
                        The frequency and volume of verifications
                        </li>
                    </ul>
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
            <h2>Our Pricing Plans</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <h2>Pay-As-You-Go</h2>
                    <h3 class="textColorLight">₦ 9,000 per Document</h3>
                    <p class="text-left">Are you an occasional user?<br>Who need to verify documents on a case-by-case basis.<br>Then this is the option for you!</p>
                    
                    <ul class="ul-no-group text-left px-0">
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Cost ₦9,000 per document</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Processing time: 1-3 business days</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Real-time tracking</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Full verification report</span>
                        </li>
                    </ul>
                    
                    <a href="javascript:void(0);" onclick="getStarted();">Get Started</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <h2>Basic</h2>
                    <h3 class="textColorLight">₦ 37,500 Monthly</h3>
                    <p class="text-left">
                    Are you an individual or a small business with minimal verification needs?<br>
                    Then this is the option for you!
                    </p>
                    
                    <ul class="ul-no-group text-left px-0">
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Verify up to 5 documents per month</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Cost: ₦7,500 per document</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Processing time: 1-3 business days</span>
                        </li>
                    </ul>
                    
                    <a href="javascript:void(0);" onclick="getStarted();">Get Started</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-item">
                    <h2>Business</h2>
                    <h3 class="textColorLight">₦ 70,000 Monthly</h3>
                    <p class="text-left">
                    Ideal for medium to large businesses with moderate verification needs.
                    </p>
                    
                    <ul class="ul-no-group text-left px-0">
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Verify up to 10 documents per month</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Cost: ₦7,000 per additional document</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Processing time: 1-3 business days</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Bulk upload capability</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Customizable reporting features</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Priority support</span>
                        </li>
                    </ul>
                    
                    <a href="javascript:void(0);" onclick="getStarted();">Get Started</a>
                </div>
            </div>
            
            <div class="col-lg-12 col-md-12">
                <div class="service-item">
                    <h2>Enterprise</h2>
                    <h3 class="textColorLight">Custom Pricing</h3>
                    <p class="text-left">
                    Designed for large organizations and government entities with extensive verification needs.
                    </p>
                    
                    <ul class="ul-no-group text-left px-0">
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Unlimited document verifications per month</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Processing time: 1–3 business days (expedited options available)</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Bulk document upload and processing</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Full API integration with custom workflows</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Dedicated account manager</span>
                        </li>

                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Compliance and audit trail reporting</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>24/7 priority customer support</span>
                        </li>
                        <li>
                        <i class="fa fa-light fa-check"></i>
                        <span>Optional:
                        On-site production inspections
                        Custom onboarding and training for your team
                        Advanced analytics and performance dashboards
                        Integration with internal systems and databases</span>
                        </li>
                    </ul>
                    
                    <a href="javascript:void(0);" onclick="getStarted();">Get Started</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->

@endsection
@push("js")
@endpush