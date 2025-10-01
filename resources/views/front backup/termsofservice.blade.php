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
                                            <h1><span style="color: #ffffff;"><strong><span style="font-size: 36px;">Terms and Conditions<br></span></strong></span></h1>
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
                                            <h2 style="text-align: center;"><span style="color: #002E5B;">Terms and Conditions<span style="color: #ffd61f;"></span></span></h2>
                                            
                                            <p><span style="color:#002E5B;"><strong>SmartKYC&nbsp;</strong></span></p>


                                            </span>
                                        </div>

                                        <div id="hs_cos_wrapper_widget_1663137157490" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                            <span id="hs_cos_wrapper_widget_1663137157490_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                            
                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">1. Introduction</strong> - Welcome to SmartKYC, a document verification service operated by Smart Technology Services Ltd. By using our website and services, you agree to comply with and be bound by these Terms and Conditions. If you do not agree with any part of these terms, you must discontinue using our services.</span></p>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">2. Definitions</strong> -</span></p>

                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong>“SmartKYC”</strong></span> refers to the document verification platform operated by Smart Technology Services Ltd.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong>“User”</strong></span> refers to any individual or entity accessing or using SmartKYC.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong>“Services”</strong></span> refer to the document verification solutions provided by SmartKYC.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong>“Verified Documents”</strong></span> refer to any document submitted for verification.</span><span style="color: #000000;"></span></li>

                                            </ul>


                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">3. Use of Services&nbsp;</strong>-</span></p>

                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span> Users must provide accurate and complete information when submitting documents for verification.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span> SmartKYC reserves the right to reject any request that does not meet the verification requirements.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Users are responsible for ensuring they have the necessary legal rights to submit documents for verification.</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">4. Account Registration&nbsp;</strong>-</span></p>
                                            
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Some services may require users to create an account.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Users must keep their login credentials secure and notify SmartKYC immediately of any unauthorized access.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC is not liable for any loss resulting from unauthorized access due to user negligence.</span><span style="color: #000000;"></span></li>
                                            </ul>



                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">5. Verification Process&nbsp;</strong>-</span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC verifies documents based on publicly available and authorized third-party sources.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Verification results are provided based on available information at the time of processing.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC does not guarantee the absolute authenticity of any document but ensures best-effort verification.</span><span style="color: #000000;"></span></li>
                                            </ul>



                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">6. Fees and Payments&nbsp;</strong>-</span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Users must pay applicable service fees as stated on the website before verification services are provided.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Payments are non-refundable unless otherwise stated.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC reserves the right to adjust pricing at any time, with prior notice to users.</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">7. Data Protection and Privacy&nbsp;</strong>-</span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC collects and processes user data in accordance with its Privacy Policy.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>User data is handled securely and will not be shared with third parties except as required by law or with user consent.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Users must ensure that they have the necessary authorization before submitting third-party data.</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">8. Limitation of Liability&nbsp;</strong>- </span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC provides verification services on an "as-is" basis without warranties of any kind.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC is not liable for any direct, indirect, or consequential losses resulting from the use of its services.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Users assume full responsibility for how they use verification results.</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">9. Intellectual Property&nbsp;</strong>-</span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>All content on the SmartKYC platform, including text, logos, and technology, is the property of Smart Technology Services Ltd.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Users may not copy, distribute, or modify SmartKYC’s content without written permission.</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">10. Service Modifications and Termination&nbsp;</strong>- </span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC reserves the right to modify, suspend, or terminate services at any time.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Users who violate these Terms may have their accounts suspended or terminated without notice.</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">11. Governing Law&nbsp;</strong>- </span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>These Terms and Conditions are governed by the laws of the Federal Republic of Nigeria.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Any disputes shall be resolved in Nigerian courts.</span><span style="color: #000000;"></span></li>
                                            </ul>

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">12. Amendments&nbsp;</strong>- </span></p>
                                            <ul>
                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>SmartKYC reserves the right to update these Terms and Conditions at any time.</span><span style="color: #000000;"></span></li>

                                                <li><span style="color: #000000;"><span style="color: #ffd61f;"><strong></strong></span>Continued use of SmartKYC after updates constitutes acceptance of the revised terms.</span><span style="color: #000000;"></span></li>
                                            </ul>
                                            
                                            
                                            

                                            <p><span style="color: #000000;"><strong style="color: #ffd61f;">13. Contact Information&nbsp;</strong>- For any inquiries regarding these Terms and Conditions, contact us at: support@smartkyc.ng</span></p>

                                            
                                           
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