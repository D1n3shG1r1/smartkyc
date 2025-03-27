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
    background-image: url(<?php echo url('assets/img/people-1.jpg'); ?>);
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
                                            <h1><span style="color: #ffffff;"><strong><span style="font-size: 36px;">Privacy Policy<br></span></strong></span></h1>
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
                                            <h2 style="text-align: center;"><span style="color: #002E5B;">Privacy Policy<span style="color: #ffd61f;"></span></span></h2>
                                            
                                            <p><span style="color:#002E5B;"><strong>SmartVerify<br>Effective Date:&nbsp;{{ date("M d, Y"); }}</strong></span></p>
                                            
                                            </span>
                                        </div>

                                        <div id="hs_cos_wrapper_widget_1663137157490" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                            <span id="hs_cos_wrapper_widget_1663137157490_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                            
                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">1. Introduction</strong> - SmartVerify, operated by Smart Technology Services Ltd, is committed to protecting the privacy and security of our users. This Privacy Policy outlines how we collect, use, store, and protect your personal data when you use our document verification services. By using SmartVerify, you agree to the practices described in this policy.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">2. Information We Collect</strong></span></p>
                                            <ul>
                                                <p><span style="color: #000000;"><strong style="color: #ffd61f;">2.1 Personal Information</strong> - We collect personal information when you use our services, including:</span></p>
                                            
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Full name</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Contact details (email, phone number)</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Business or organization details</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Government-issued IDs and other verification documents</span><span style="color: #000000;"></span></li>

                                            </ul>
                                            <ul>
                                                <p><span style="color: #000000;"><strong style="color: #ffd61f;">2.2 Non-Personal Information</strong> - We also collect non-personal data, such as:</span></p>
                                            
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>IP address</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Browser type and version</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Usage data (how you interact with our platform)</span><span style="color: #000000;"></span></li>

                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">3. How We Use Your Information&nbsp;</strong> - We use the collected information to:</span></p>

                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span> Verify the authenticity of submitted documents</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span> Improve our verification services</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Communicate with users about their verification requests</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Ensure compliance with legal and regulatory requirements</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Protect against fraud and unauthorized access</span><span style="color: #000000;"></span></li>
                                                
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">4. Data Protection and Security&nbsp;</strong>- We take appropriate security measures to protect your data, including:</span></p>
                                            
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Encryption of sensitive data</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Secure storage and access controls</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Regular security audits</span><span style="color: #000000;"></span></li>
                                            </ul>


                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">5. Data Sharing and Disclosure&nbsp;</strong>- We do not sell or rent your personal data. However, we may share your data in the following cases:</span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong>With third-party verification sources:</strong></span> To validate the authenticity of submitted documents.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong>With law enforcement or regulatory authorities:</strong></span>If required by law or to protect against fraud.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong>With service providers:</strong></span>Who assist us in delivering our services, under strict confidentiality agreements.</span><span style="color: #000000;"></span></li>
                                            </ul>



                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">6. Data Retention&nbsp;</strong>-We retain verification records for as long as necessary to fulfill our legal and business obligations. Users may request data deletion, subject to compliance requirements.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">7. Your Rights&nbsp;</strong>- Depending on applicable laws, you may have the right to:</span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Access, update, or delete your personal data</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Object to data processing for certain purposes</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Request a copy of your data</span><span style="color: #000000;"></span></li>

                                                <p><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>To exercise these rights, contact us at support@smartverify.com.ng</span><span style="color: #000000;"></span></p>
                                                
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">8. Cookies and Tracking Technologies&nbsp;</strong> - SmartVerify may use cookies and tracking tools to enhance user experience and analyze service performance. You can manage cookie preferences through your browser settings.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">9. Third-Party Links&nbsp;</strong> - Our website may contain links to third-party websites. SmartVerify is not responsible for their privacy practices. Users should review their policies before providing any data.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">10. Updates to This Policy&nbsp;</strong> - We may update this Privacy Policy periodically. Users will be notified of any significant changes. Continued use of SmartVerify after updates constitutes acceptance of the revised policy.</span></p>


                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">11. Contact Us&nbsp;</strong> - For questions about this Privacy Policy or data protection, contact us at: support@smartverify.com.ng</span></p>

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
                    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push("js")
<script></script>
@endpush