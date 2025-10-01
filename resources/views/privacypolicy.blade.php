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

.ul-no-group{list-style: none;}

.textColorDark{color: #092a49;}
</style>

<!-- Feature Start -->
<div class="feature">
    <div class="container">
        <div class="section-header">
            <p>Privacy Policy SmartKYC</p>
            <h2>Effective Date: Sep 27, 2025</h2>
        </div>

        <div class="row counters align-items-center mt-2">
            <div class="col-md-12 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">1. Introduction</h2>
                    <p class="counters-text-p">
                    SmartKYC, operated by Smart Technology Services Ltd, is committed to protecting the privacy and security of our users. This Privacy Policy outlines how we collect, use, store, and protect your personal data when you use our document verification services. By using SmartKYC, you agree to the practices described in this policy.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">2. Information We Collect</h2>
                    
                    <ul class="ul-no-group">
                        <li>
                            <p class="counters-text-p">2.1 Personal Information</p>
                            <span>We collect personal information when you use our services, including:</span>
                        </li>
                        <ul class="ul-group">
                            <li>
                            Full name
                            </li>
                            <li>
                            Contact details (email, phone number)
                            </li>
                            <li>
                            Business or organization details
                            </li>
                            <li>
                            Government-issued IDs and other verification documents
                            </li>
                        </ul>
                    </ul>

                    <ul class="ul-no-group">
                        <li>
                            <p class="counters-text-p">2.2 Non-Personal Information</p>
                            <span>We also collect non-personal data, such as:</span>
                        </li>
                        <ul class="ul-group">
                            <li>
                            IP address
                            </li>
                            <li>
                            Browser type and version
                            </li>
                            <li>
                            Usage data (how you interact with our platform)
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">3. How We Use Your Information </h2>
                    <p class="counters-text-p">We use the collected information to:</p>
                    <ul class="ul-group">
                        <li>
                        Verify the authenticity of submitted documents
                        </li>
                        <li>
                        Improve our verification services
                        </li>
                        <li>
                        Communicate with users about their verification requests
                        </li>
                        <li>
                        Ensure compliance with legal and regulatory requirements
                        </li>
                        <li>
                        Protect against fraud and unauthorized access
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">4. Data Protection and Security</h2>
                    <p class="counters-text-p">We take appropriate security measures to protect your data, including:</p>
                    <ul class="ul-group">
                        <li>
                        Encryption of sensitive data
                        </li>
                        <li>
                        Secure storage and access controls
                        </li>
                        <li>
                        Regular security audits
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">5. Data Sharing and Disclosure</h2>
                    <p class="counters-text-p">We do not sell or rent your personal data. However, we may share your data in the following cases:</p>
                    <ul class="ul-group">
                        <li>
                        <span class="textColorDark">With third-party verification sources:</span> To validate the authenticity of submitted documents.
                        </li>
                        <li>
                        <span class="textColorDark">With law enforcement or regulatory authorities:</span> If required by law or to protect against fraud.
                        </li>
                        <li>
                        <span class="textColorDark">With service providers:</span> Who assist us in delivering our services, under strict confidentiality agreements.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">6. Data Retention</h2>
                    <p class="counters-text-p">We retain verification records for as long as necessary to fulfill our legal and business obligations. Users may request data deletion, subject to compliance requirements.</p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">7. Your Rights</h2>
                    <p class="counters-text-p">Depending on applicable laws, you may have the right to:</p>
                    <ul class="ul-group">
                        <li>
                        Access, update, or delete your personal data
                        </li>
                        <li>
                        Object to data processing for certain purposes
                        </li>
                        <li>
                        Request a copy of your data
                        </li>
                    </ul>
                    <p>To exercise these rights, contact us at {{ config('custom.support_email') }}</p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">8. Cookies and Tracking Technologies</h2>
                    <p class="counters-text-p">SmartKYC may use cookies and tracking tools to enhance user experience and analyze service performance. You can manage cookie preferences through your browser settings.</p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">9. Third-Party Links</h2>
                    <p class="counters-text-p">Our website may contain links to third-party websites. SmartKYC is not responsible for their privacy practices. Users should review their policies before providing any data.</p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">10. Updates to This Policy</h2>
                    <p class="counters-text-p">We may update this Privacy Policy periodically. Users will be notified of any significant changes. Continued use of SmartKYC after updates constitutes acceptance of the revised policy.</p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">11. Contact Us</h2>
                    <p class="counters-text-p">For questions about this Privacy Policy or data protection, contact us at: {{ config('custom.support_email') }}</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Feature End -->