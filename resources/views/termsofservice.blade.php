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
</style>

<!-- Feature Start -->
<div class="feature">
    <div class="container">
        <div class="section-header">
            <p>Terms and Conditions</p>
            <h2>SmartKYC</h2>
        </div>

        <div class="row counters align-items-center mt-2">
            <div class="col-md-12 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">1. Introduction</h2>
                    <p class="counters-text-p">
                    Welcome to SmartKYC, a document verification service operated by Smart Technology Services Ltd. By using our website and services, you agree to comply with and be bound by these Terms and Conditions. If you do not agree with any part of these terms, you must discontinue using our services.
                     </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">2. Definitions</h2>
                    <ul class="ul-group">
                        <li>
                        “SmartKYC” refers to the document verification platform operated by Smart Technology Services Ltd.
                        </li>
                        <li>
                        “User” refers to any individual or entity accessing or using SmartKYC.
                        </li>
                        <li>
                        “Services” refer to the document verification solutions provided by SmartKYC.
                        </li>
                        <li>
                        “Verified Documents” refer to any document submitted for verification.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">3. Use of Services</h2>
                    <ul class="ul-group">
                        <li>
                        Users must provide accurate and complete information when submitting documents for verification.
                        </li>
                        <li>
                        SmartKYC reserves the right to reject any request that does not meet the verification requirements.
                        </li>
                        <li>
                        Users are responsible for ensuring they have the necessary legal rights to submit documents for verification.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">4. Account Registration</h2>
                    <ul class="ul-group">
                        <li>
                        Some services may require users to create an account.
                        </li>
                        <li>
                        Users must keep their login credentials secure and notify SmartKYC immediately of any unauthorized access.
                        </li>
                        <li>
                        SmartKYC is not liable for any loss resulting from unauthorized access due to user negligence.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">5. Verification Process</h2>
                    <ul class="ul-group">
                        <li>
                        SmartKYC verifies documents based on publicly available and authorized third-party sources.
                        </li>
                        <li>
                        Verification results are provided based on available information at the time of processing.
                        </li>
                        <li>
                        SmartKYC does not guarantee the absolute authenticity of any document but ensures best-effort verification.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">6. Fees and Payments</h2>
                    <ul class="ul-group">
                        <li>
                        Users must pay applicable service fees as stated on the website before verification services are provided.
                        </li>
                        <li>
                        Payments are non-refundable unless otherwise stated.
                        </li>
                        <li>
                        SmartKYC reserves the right to adjust pricing at any time, with prior notice to users.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">7. Data Protection and Privacy</h2>
                    <ul class="ul-group">
                        <li>
                        SmartKYC collects and processes user data in accordance with its Privacy Policy.
                        </li>
                        <li>
                        User data is handled securely and will not be shared with third parties except as required by law or with user consent.
                        </li>
                        <li>
                        Users must ensure that they have the necessary authorization before submitting third-party data.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">8. Limitation of Liability</h2>
                    <ul class="ul-group">
                        <li>
                        SmartKYC provides verification services on an "as-is" basis without warranties of any kind.
                        </li>
                        <li>
                        SmartKYC is not liable for any direct, indirect, or consequential losses resulting from the use of its services.
                        </li>
                        <li>
                        Users assume full responsibility for how they use verification results.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">9. Intellectual Property</h2>
                    <ul class="ul-group">
                        <li>
                        All content on the SmartKYC platform, including text, logos, and technology, is the property of Smart Technology Services Ltd.
                        </li>
                        <li>
                        Users may not copy, distribute, or modify SmartKYC’s content without written permission.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">10. Service Modifications and Termination</h2>
                    <ul class="ul-group">
                        <li>
                        SmartKYC reserves the right to modify, suspend, or terminate services at any time.
                        </li>
                        <li>
                        Users who violate these Terms may have their accounts suspended or terminated without notice.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">11. Governing Law</h2>
                    <ul class="ul-group">
                        <li>
                        These Terms and Conditions are governed by the laws of the Federal Republic of Nigeria.
                        </li>
                        <li>
                        Any disputes shall be resolved in Nigerian courts.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">12. Amendments</h2>
                    <ul class="ul-group">
                        <li>
                        SmartKYC reserves the right to update these Terms and Conditions at any time.
                        </li>
                        <li>
                        Continued use of SmartKYC after updates constitutes acceptance of the revised terms.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">13. Contact Information </h2>
                    <p class="counters-text-p">
                    For any inquiries regarding these Terms and Conditions, contact us at: {{ config('custom.support_email') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feature End -->