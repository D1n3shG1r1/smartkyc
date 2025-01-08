@extends("app")
@section("contentbox")
<link rel="stylesheet" href="{{ url('assets/css/module_51600883929_slider.min.css'); }}"></link>
<style>
 		
    .dnd_area-row-2-background-layers {
        background-image: linear-gradient(rgba(0, 46, 91, 1), rgba(0, 46, 91, 1)) !important;
        background-position: left top !important;
        background-size: auto !important;
        background-repeat: no-repeat !important;
    }

    .dnd_area-row-2-padding {
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }

		.slider--dnd_area-module-1,
		.slider--dnd_area-module-1 .glide__slide {
			height: 700px;
			width: 100%;
			overflow: hidden;
		}
		
		.slider--dnd_area-module-1 .glide__slide {
			background-size: cover;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		
		
		.slider--dnd_area-module-1 {
			background: #293182;
		}
		
		
		.slider--dnd_area-module-1 .slider__inner *:not(a) {
			color: rgba(255, 255, 255, 1.0);
		}
		
		.slider--dnd_area-module-1 .slider__inner {
			max-width: 1000px;
		}
		
		
		@media (min-width: 1200px) {
			.slider__inner-container {
				width: 1240px;
			}
           
		}
		
		@media (max-width: 1200px) {
			.slider__inner-container {
				width: 100%;
				padding: 21px;
			}
		}
		
		
		
			.slider--dnd_area-module-1 .glide__slides {transform:none !important; width:auto !important; display:block;}
			.slider--dnd_area-module-1 .glide__slide {position:absolute; left:0; top:0; opacity:0; transition:opacity 1s;}
			.slider--dnd_area-module-1 .glide__slide:first-child {position:relative;}
			.slider--dnd_area-module-1 .glide__slide--active {z-index:1; opacity:1;}
		
		
			.slider--dnd_area-module-1 .glide__slide .slider__inner {
			 
				background: rgba(41, 49, 130, 0.2);
			max-width: 750px; width: 100%; padding: 20px 20px; float: left;margin-bottom: 70px; margin-left: -40px; margin-top: 40px; }
      
      @media(max-width:1240px){
          .slider--dnd_area-module-1 .glide__slide .slider__inner{margin-left:-20px;}
      }
		
		
		
		.slider--dnd_area-module-1 .glide__bullets span {
      background: rgba(0, 234, 121, 1.0);
    }
		
		
		.slider--dnd_area-module-1 .glide__arrow--left:before,
		.slider--dnd_area-module-1 .glide__arrow--right:before {
			border-top: 2px solid rgba(0, 234, 121, 0.5);
			border-right: 2px solid rgba(0, 234, 121, 0.5);
		}
		
		.slider--dnd_area-module-1 .glide__arrow--left:hover:before,
		.slider--dnd_area-module-1 .glide__arrow--right:hover:before {
			border-top: 2px solid rgba(0, 234, 121, 1);
			border-right: 2px solid rgba(0, 234, 121, 1);
		}
		
		.slider--dnd_area-module-1 .glide__arrow--right:before,
		.slider--dnd_area-module-1 .glide__arrow--left:before {
			width: 34px;
			height: 34px;
		}
      


      /*------*/
      @media (min-width: 768px) {
    .dnd_area-module-1-vertical-alignment > div {
        flex-shrink: 0 !important;
    }
}

.banner--dnd_area-module-1 {
    position: relative;
    padding: 13% 0 13% 0;
    background-image: url(<?php echo url('assets/img/faqbanner.png'); ?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center bottom;
}

    .dnd_area-module-1-hidden {
        display: flex !important;
    }

    .dnd_area-module-1-vertical-alignment {
    display: -ms-flexbox !important;
    -ms-flex-direction: column !important;
    -ms-flex-pack: center !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
}

.banner--dnd_area-module-1:before {
    content: "";
    display: block;
    height: 100%;
    width: 100%;
    /*background: rgba(41, 49, 130, 0.6);*/
    position: absolute;
    left: 0;
    top: 0;
    z-index: 1;
}

.banner__inner {
    display: inline-block;
    max-width: 710px;
    z-index: 2;
    position: relative;
}

.banner__inner *:not(.button) {
    color: #ffffff;
}
</style>

<main class="body-container-wrapper">
    <div class="container-fluid body-container">
        <div class="row-fluid-wrapper">
            <div class="row-fluid">
                <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">


                    <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd_area-row-0-vertical-alignment dnd_area-row-0-force-full-width-section dnd-section dnd_area-row-0-padding">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-custom_widget dnd_area-module-1-vertical-alignment dnd_area-module-1-hidden dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                <div id="" class="banner lazy banner--dnd_area-module-1  text-center" data-ll-status="entered">
                                    <div class="content-wrapper">
                                        <div class="banner__inner fx-fade-up">
                                            <h1><span style="color: #ffffff;"><strong><span style="font-size: 36px;">FAQ?<br></span></strong></span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row-fluid-wrapper row-depth-1 row-number-3 dnd-section">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-4 dnd-row">
                                <div class="row-fluid ">
                                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                        <div id="hs_cos_wrapper_widget_1663137157490" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                            <span id="hs_cos_wrapper_widget_1663137157490_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                            <h2 style="text-align: center;"><span style="color: #002E5B;">Frequently Asked Questions<span style="color: #ffd61f;">?</span></span></h2>
                                            
                                            <p><span style="color:#002E5B;"><strong>Here are some of the common questions about SmartVerify and how our platform works&nbsp;</strong></span></p>


                                            </span>
                                        </div>

                                        <div id="hs_cos_wrapper_widget_1663137157490" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                            <span id="hs_cos_wrapper_widget_1663137157490_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                            
                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">1. What is SmartVerify?&nbsp;</strong>- SmartVerify is an online platform that provides document verification services. We help organizations, governments, and individuals verify the authenticity of important documents, such as government-issued certificates, tax documents, financial statements, and vendor compliance records.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">2. What types of documents can I verify on SmartVerify?&nbsp;</strong>- We verify a wide range of documents, including:</span></p>

                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Company registration certificates (e.g., CAC in Nigeria)</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Tax clearance certificates</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Bank statements</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Identity documents (passports, national ID cards)</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Vendor and contractor documentation</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Business licenses and permits</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Compliance certificates and more</span><span style="color: #000000;"></span></li>
                                            </ul>


                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">3. How does SmartVerify work?&nbsp;</strong>- To use SmartVerify, simply upload the document you want to verify on our platform. Our system will process the information, cross-check it with the appropriate authorities, and return the verification results in a timely manner. You can also track the verification status in real-time.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">4. How long does the verification process take?&nbsp;</strong>- The verification time depends on the type of document and the relevant authorities involved. Most verifications are completed within 1-3 business days, but some complex cases may take longer. You can monitor the progress via your account.</span></p>
                                            

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">5. Is SmartVerify secure?&nbsp;</strong>- Yes, SmartVerify takes security very seriously. We use advanced encryption technologies to protect your personal and document data. All submitted information is kept confidential and is only used for verification purposes.</span></p>
                                            

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">6. Can I verify multiple documents at once?&nbsp;</strong>- Yes, SmartVerify offers bulk verification services for businesses and organizations. This feature allows you to upload and verify multiple documents in one go, saving you time and effort.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">7. How much does it cost to use SmartVerify?&nbsp;</strong>- Our pricing depends on the type of document and the number of verifications needed. For detailed pricing information, please refer to our Pricing Page or contact our support team for custom bulk verification packages.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">8. Can I integrate SmartVerify with my own system?&nbsp;</strong>- Yes, SmartVerify offers API integration, allowing businesses to integrate our verification services directly into their existing systems for seamless document checking.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">9. What if my document verification fails?&nbsp;</strong>- If a document fails verification, it means the document could not be validated or is likely fraudulent. In such cases, we recommend double-checking the information provided and contacting the issuing authority for clarification.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">10. Can I get a report after the verification process?&nbsp;</strong>- Yes, after the verification process is complete, you will receive a detailed report outlining the results of the verification, including whether the document was successfully verified, any issues detected, and recommendations for next steps.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">11. What industries can benefit from SmartVerify?&nbsp;</strong>- SmartVerify caters to a wide range of industries, including:</span></p>
                                            
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Government agencies</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Financial institutions</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Real estate and construction companies</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Legal and compliance firms</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Healthcare providers</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>E-commerce and retail businesses</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">12. How do I get started?&nbsp;</strong>- To get started, simply create an account on the SmartVerify website, upload your documents, and follow the steps for verification. If you need assistance, our support team is available to guide you through the process.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">13. What support does SmartVerify offer?&nbsp;</strong>- We offer 24/7 customer support through email, live chat to assist with any inquiries or technical issues. Our help center also provides detailed guides and FAQs.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">14. Can SmartVerify help with legal compliance?&nbsp;</strong>- Yes, SmartVerify can assist with ensuring that your business remains compliant with regulatory requirements by verifying important documents like tax clearances, compliance certificates, and business permits.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">15. How can I contact SmartVerify for further inquiries?&nbsp;</strong>- You can reach us via email at support@smartverify.ng. You can also use the live chat feature on our website for quick assistance.</span></p>
                                           
                                            </span>
                                        </div>
                                    </div>
                                    <!--end widget-span -->
                                </div>
                                <!--end row-->
                                </div>
                                <!--end row-wrapper -->
                            <!--end row-wrapper -->
                            </div>
                            <!--end widget-span -->
                        </div>
                        <!--end row-->
                    </div>
                    

                    <div class="row-fluid-wrapper row-depth-1 row-number-5 dnd-section dnd_area-row-9-padding dnd_area-row-9-background-gradient dnd_area-row-9-background-layers">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                <div class="row-fluid-wrapper row-depth-1 row-number-6 dnd-row">
                                <div class="row-fluid ">
                                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                        <div id="hs_cos_wrapper_module_16787252686535" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                            <span id="hs_cos_wrapper_module_16787252686535_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                            <h2 style="text-align: center;"><span style="color: #ffffff;">Our Partners<br></span></h2>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end widget-span -->
                                </div>
                                <!--end row-->
                                </div>
                                <!--end row-wrapper -->
                                <div class="row-fluid-wrapper row-depth-1 row-number-7 dnd-row">
                                <div class="row-fluid ">
                                    <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                                        <div class="row-fluid-wrapper row-depth-1 row-number-8 dnd-row">
                                            <div class="row-fluid ">
                                            <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                                <div id="hs_cos_wrapper_module_16787252686538" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                                    <div class="logos-of-customers " id="">
                                                        <div class="module_16787252686538-logo-1">
                                                        <a href="javascript:void(0);" rel="noreferrer" target="_blank">
                                                        <img class="lazy" data-src="{{url('assets/img/appenate.png')}}" src="{{url('assets/img/appenate.png')}}" alt="Appenate" style="max-width: 100%; height: auto;" height="591" width="1181">
                                                        </a>
                                                        </div>
                                                        <div class="module_16787252686538-logo-2">
                                                        <a href="javascript:void(0);" rel="noreferrer" target="_blank">
                                                        <img class="lazy" data-src="{{url('assets/img/Prolognet.png')}}" src="{{url('assets/img/Prolognet.png')}}" alt="Prolognet" style="max-width: 100%; height: auto;" height="250" width="500">
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end widget-span -->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end row-wrapper -->
                                    </div>
                                    <!--end widget-span -->
                                </div>
                                <!--end row-->
                                </div>
                                <!--end row-wrapper -->
                                <div class="row-fluid-wrapper row-depth-1 row-number-9 dnd-row">
                                <div class="row-fluid ">
                                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                        <div id="hs_cos_wrapper_module_16787252686539" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                            <span id="hs_cos_wrapper_module_16787252686539_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                            <h2 style="text-align: center;"><span style="color: #ffffff;">Our Memberships<br></span></h2>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end widget-span -->
                                </div>
                                <!--end row-->
                                </div>
                                <!--end row-wrapper -->
                                <div class="row-fluid-wrapper row-depth-1 row-number-10 dnd-row">
                                <div class="row-fluid ">
                                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                        <div id="hs_cos_wrapper_module_167872526865310" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                            <div class="logos-of-customers " id="">
                                            <div class="module_167872526865310-logo-1">
                                                <a href="javascript:void(0);" rel="noreferrer" target="_blank">
                                                <img class="lazy" data-src="{{url('assets/img/CCIFranceUAEDubai.png')}}" src="{{url('assets/img/CCIFranceUAEDubai.png')}}" alt="CCI France UAE Dubai" style="max-width: 100%; height: auto;" height="200" width="600">
                                                </a>
                                            </div>
                                            <div class="module_167872526865310-logo-2">
                                                <a href="javascript:void(0);" rel="noreferrer" target="_blank">
                                                <img class="lazy" data-src="{{url('assets/img/CCIBarcelona.png')}}" src="{{url('assets/img/CCIBarcelona.png')}}" alt="CCI France Barcelona" style="max-width: 100%; height: auto;" height="200" width="600">
                                                </a>
                                            </div>
                                            <div class="module_167872526865310-logo-3">
                                                <a href="javascript:void(0)" rel="noreferrer" target="_blank">
                                                <img class="lazy" data-src="{{url('assets/img/CCIOhio.png')}}" src="{{url('assets/img/CCIOhio.png')}}" alt="CCI France Ohio" style="max-width: 100%; height: auto;" height="200" width="600">
                                                </a>
                                            </div>
                                            <div class="module_167872526865310-logo-4">
                                                <a href="javascript:void(0)" rel="noreferrer" target="_blank">
                                                <img class="lazy" data-src="{{url('assets/img/CCIFrancePortugal.png')}}" src="{{url('assets/img/CCIFrancePortugal.png')}}" alt="CCI France Portugal" style="max-width: 100%; height: auto;" height="200" width="600">
                                                </a>
                                            </div>
                                            <div class="module_167872526865310-logo-5">
                                                <a href="javascript:void(0)" rel="noreferrer" target="_blank">
                                                <img class="lazy" data-src="{{url('assets/img/CCIFranceMiami.png')}}" src="{{url('assets/img/CCIFranceMiami.png')}}" alt="CCI France Miami" style="max-width: 100%; height: auto;" height="200" width="600">
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end widget-span -->
                                </div>
                                <!--end row-->
                                </div>
                                <!--end row-wrapper -->
                            </div>
                            <!--end widget-span -->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push("js")
<script></script>
@endpush