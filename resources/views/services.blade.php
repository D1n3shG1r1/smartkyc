@extends("app")
@section("contentbox")

@include('carousel')

<style>
.counters-text .ul-group li::before{
    position: relative;
    content: "\f0da";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    margin-right: 10px;
}

.counters-text .ul-group{
    padding: 0;
    list-style: none;
}

.counters-text .ul-group li{
    margin-left: 2px;
}

.counters-text-h2{font-size: 1.5rem !important;}

.counters-text-p{font-size: 1rem !important;}

</style>

<!-- Feature Start -->
<div class="feature">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="feature-img">
                    <img src="{{url('assets/img/business-women.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>Our Services</p>
                    <h2>Our Best Document Verification Services</h2>
                </div>
                
                <p></p>

                <div class="row counters">
                    <div class="col-12">
                        <!--<i class="bi bi-shield-lock"></i>-->
                        <div class="counters-text">
                            <h2 class="counters-text-h2" data-toggle="counter-upd">Document Verification Services </h2>
                            <p class="counters-text-p">
                            <ul class="ul-group">
                                <li>
                                Government-Issued Certificates - Verification of certificates like company registration, tax clearance, permits, and licenses.
                                </li>
                                <li>
                                Financial Document Verification - Validate tax documents, bank statements, and financial declarations.
                                </li>
                                <li>
                                ID & Background Checks - Identity verification through national IDs, passports, or driving licenses, along with background checks on individuals or organizations.
                                </li>
                                <li>
                                Contractor and Vendor Documentation - Verification of vendor certifications, contract details, compliance documents, and insurance certificates.
                                </li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row counters align-items-center mt-2">
            <div class="col-md-12">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">Real-Time Tracking and Updates</h2>
                    <p class="counters-text-p">
                    <ul class="ul-group">
                        <li>
                        Allow users to track the status of document verification in real-time, from submission to completion, ensuring transparency in the process.
                        </li>
                    </ul>
                    </p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">API Integration</h2>
                    <p class="counters-text-p">
                    <ul class="ul-group">
                        <li>
                        Offer API services that allow businesses to integrate SmartKYC’s verification process into their existing systems for seamless background checks and document validation.
                        </li>
                    </ul>
                    </p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">Bulk Verification</h2>
                    <p class="counters-text-p">
                    <ul class="ul-group">
                        <li>
                        Provide bulk document verification for companies that need to verify multiple vendors or contractors at once, saving time and effort.
                        </li>
                    </ul>
                    </p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">Consultancy and Support Services</h2>
                    <p class="counters-text-p">
                    <ul class="ul-group">
                        <li>
                        Offer consultancy on best practices for document compliance and regulatory requirements.
                        </li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

@endsection
@push("js")
@endpush