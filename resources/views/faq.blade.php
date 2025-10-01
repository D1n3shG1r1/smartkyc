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
        <div class="row align-items-end">
            <div class="col-md-6">
                <div class="feature-img">
                    <img src="{{url('assets/img/faq.png')}}" alt="Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-header">
                    <p>Frequently Asked Questions (FAQs)</p>
                    <h2>How Our Platform Works?</h2>
                </div>

                <div class="about-text">
                    <p>At SmartKYC, we understand the importance of secure, reliable, and efficient document verification. Whether you’re verifying personal documents, business paperwork, or legal forms, we’ve got you covered.</p>
                    <p>We’ve gathered the most frequently asked questions to help guide you through our process and address any concerns you may have.</p>
                    <p>Our goal is to make the verification process simple, transparent, and hassle-free for you.</p>
                    <p>In this section, you'll find answers to questions about how our service works, pricing, security, and much more. If you don’t find what you’re looking for, please don’t hesitate to reach out to our customer support team for personalized assistance.</p>
                    <p>We’re committed to delivering fast, accurate, and trusted document verification services every time.</p>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->

<div class="feature">
    <div class="container">
        <div class="section-header">
            <p>Frequently Asked Questions?</p>
            <h2>Here are some of the common questions about SmartKYC and how our platform works </h2>
        </div>

        <div class="row counters align-items-center mt-2">
            <div class="col-md-12 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">1. What is SmartKYC?</h2>
                    <p class="counters-text-p">
                        SmartKYC is an online platform that provides document verification services. We help organizations, governments, and individuals verify the authenticity of important documents, such as government-issued certificates, tax documents, financial statements, and vendor compliance records.
                     </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">2. What types of documents can I verify on SmartKYC?</h2>
                    <p class="counters-text-p">
                    We verify a wide range of documents, including:
                    </p>
                    <ul class="ul-group">
                        <li>
                        Company registration certificates (e.g., CAC in Nigeria)
                        </li>
                        <li>
                        Tax clearance certificates
                        </li>
                        <li>
                        Bank statements
                        </li>
                        <li>
                        Identity documents (passports, national ID cards)
                        </li>
                        <li>
                        Vendor and contractor documentation
                        </li>
                        <li>
                        Business licenses and permits
                        </li>
                        <li>
                        Compliance certificates and more    
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">3. How does SmartKYC work?</h2>
                    <p class="counters-text-p">
                    To use SmartKYC, simply upload the document you want to verify on our platform. Our system will process the information, cross-check it with the appropriate authorities, and return the verification results in a timely manner. You can also track the verification status in real-time.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">4. How long does the verification process take?</h2>
                    <p class="counters-text-p">
                    The verification time depends on the type of document and the relevant authorities involved. Most verifications are completed within 1-3 business days, but some complex cases may take longer. You can monitor the progress via your account.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">5. Is SmartKYC secure?</h2>
                    <p class="counters-text-p">
                    Yes, SmartKYC takes security very seriously. We use advanced encryption technologies to protect your personal and document data. All submitted information is kept confidential and is only used for verification purposes.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">6. Can I verify multiple documents at once?</h2>
                    <p class="counters-text-p">
                    Yes, SmartKYC offers bulk verification services for businesses and organizations. This feature allows you to upload and verify multiple documents in one go, saving you time and effort.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">7. How much does it cost to use SmartKYC?</h2>
                    <p class="counters-text-p">
                    Our pricing depends on the type of document and the number of verifications needed. For detailed pricing information, please refer to our Pricing Page or contact our support team for custom bulk verification packages.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">8. Can I integrate SmartKYC with my own system?</h2>
                    <p class="counters-text-p">
                    Yes, SmartKYC offers API integration, allowing businesses to integrate our verification services directly into their existing systems for seamless document checking.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">9. What if my document verification fails?</h2>
                    <p class="counters-text-p">
                    If a document fails verification, it means the document could not be validated or is likely fraudulent. In such cases, we recommend double-checking the information provided and contacting the issuing authority for clarification.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">10. Can I get a report after the verification process?</h2>
                    <p class="counters-text-p">
                    Yes, after the verification process is complete, you will receive a detailed report outlining the results of the verification, including whether the document was successfully verified, any issues detected, and recommendations for next steps.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">11. What industries can benefit from SmartKYC?</h2>
                    <p class="counters-text-p">
                    SmartKYC caters to a wide range of industries, including:
                    </p>
                    <ul class="ul-group">
                        <li>
                        Government agencies
                        </li>
                        <li>
                        Financial institutions
                        </li>
                        <li>
                        Real estate and construction companies
                        </li>
                        <li>
                        Legal and compliance firms
                        </li>
                        <li>
                        Healthcare providers
                        </li>
                        <li>
                        E-commerce and retail businesses
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">12. How do I get started?</h2>
                    <p class="counters-text-p">
                    To get started, simply create an account on the SmartKYC website, upload your documents, and follow the steps for verification. If you need assistance, our support team is available to guide you through the process.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">13. What support does SmartKYC offer?</h2>
                    <p class="counters-text-p">
                    We offer 24/7 customer support through email, live chat to assist with any inquiries or technical issues. Our help center also provides detailed guides and FAQs.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">14. Can SmartKYC help with legal compliance?</h2>
                    <p class="counters-text-p">
                    Yes, SmartKYC can assist with ensuring that your business remains compliant with regulatory requirements by verifying important documents like tax clearances, compliance certificates, and business permits.
                    </p>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="counters-text">
                    <h2 class="counters-text-h2" data-toggle="counter-upd">15. How can I contact SmartKYC for further inquiries?</h2>
                    <p class="counters-text-p">
                    You can reach us via email at support@smartkyc.ng . You can also use the live chat feature on our website for quick assistance.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>