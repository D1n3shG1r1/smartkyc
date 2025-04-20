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
      
</style>

<main class="body-container-wrapper">
  <div class="container-fluid body-container">
    <div class="row-fluid-wrapper">
      <div class="row-fluid">
        <div class="span12 widget-span widget-type-cell " style="" data-widget-type="cell" data-x="0" data-w="12">
          <div class="row-fluid-wrapper row-depth-1 row-number-1 dnd_area-row-0-vertical-alignment dnd_area-row-0-force-full-width-section dnd-section dnd_area-row-0-padding">
            <div class="row-fluid ">
              <div class="span12 widget-span widget-type-custom_widget dnd_area-module-1-vertical-alignment dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                <div id="hs_cos_wrapper_dnd_area-module-1" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                  <div class="slider glide slider--dnd_area-module-1 glide--ltr glide--carousel glide--swipeable" id="">
                    <div class="glide__track" data-glide-el="track">
                      <ul class="glide__slides" style="transition: transform cubic-bezier(0.165, 0.84, 0.44, 1); width: 3825px; transform: translate3d(-1275px, 0px, 0px);">
                        <li class="glide__slide lazy glide__slide--clone" style="background-position: center center; /*width: 1275px;*/ margin-right: 0px;" data-bg="<?php echo url('assets/img/people-4.jpg'); ?>">
                          <div class="slider__inner-container">
                            <div class="slider__inner ">
                              <h1 style="font-size: 43px; text-align: left; line-height: 1.15;">
                                <strong>Smarter Verification for Smarter Decisions</strong>
                              </h1>
                              <p style="font-size: 20px;">Welcome to Nigeria’s most reliable document verification platform.</p>
                              <p style="line-height: 1.15;">Whether you’re a government agency, corporate institution, or private business, SmartKYC gives you the power to verify your vendors, contractors, or applicants quickly and securely — all in just a few steps.</p>
                              <p style="line-height: 1.15;">We know that each organization is unique. That’s why our pricing is fully tailored to meet your specific needs. We base our service plans on:<br>
                              The number of vendors or contractors you need to verify
                              <br>Your industry’s risk level and compliance requirements<br>The frequency and volume of verifications   

                              </p>
                              <div class="slider__ctas text-left">
                                <span id="hs_cos_wrapper_dnd_area-module-1_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta" style="" data-hs-cos-general-type="widget" data-hs-cos-type="cta">
                                  <!--HubSpot Call-to-Action Code -->
                                  <span class="hs-cta-wrapper" id="hs-cta-wrapper-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66">
                                    <span class="hs-cta-node hs-cta-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66" id="hs-cta-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66">
                                     
                                    </span>
                                  </span>
                                  <!-- end HubSpot Call-to-Action Code -->
                                </span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="glide__slide lazy glide__slide--active loaded" style="background-position: center center; /*width: 1275px;*/ margin-left: 0px; margin-right: 0px; margin:auto; background-image: url('<?php echo url('assets/img/people-5.jpg'); ?>');" data-ll-status="loaded">
                          <div class="slider__inner-container">
                            <div class="slider__inner ">
                              <h1 style="font-size: 43px; text-align: left; line-height: 1.15;">
                                <strong>Smarter Verification for Smarter Decisions </strong>
                              </h1>
                              <p style="font-size: 20px;">Welcome to Nigeria’s most reliable document verification platform.</p>
                              <p style="line-height: 1.15;">Whether you’re a government agency, corporate institution, or private business, SmartKYC gives you the power to verify your vendors, contractors, or applicants quickly and securely — all in just a few steps.</p>
                              <p style="line-height: 1.15;">We know that each organization is unique. That’s why our pricing is fully tailored to meet your specific needs. We base our service plans on:<br>
                              The number of vendors or contractors you need to verify
                              <br>Your industry’s risk level and compliance requirements<br>The frequency and volume of verifications </p>
                              <div class="slider__ctas text-left">
                                <span id="hs_cos_wrapper_dnd_area-module-1_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta" style="" data-hs-cos-general-type="widget" data-hs-cos-type="cta">
                                  <!--HubSpot Call-to-Action Code -->
                                  <span class="hs-cta-wrapper" id="hs-cta-wrapper-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66">
                                    <span class="hs-cta-node hs-cta-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66" id="hs-cta-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66">
                                      
                                    </span>
                                  </span>
                                  <!-- end HubSpot Call-to-Action Code -->
                                </span>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="glide__slide lazy glide__slide--clone" style="background-position: center center; /*width: 1275px;*/ margin-left: 0px;" data-bg="<?php echo url('assets/img/people-6.jpg'); ?>">
                          <div class="slider__inner-container">
                            <div class="slider__inner ">
                              <h1 style="font-size: 43px; text-align: left; line-height: 1.15;">
                                <strong>Smarter Verification for Smarter Decisions </strong>
                              </h1>
                              <p style="font-size: 20px;">Welcome to Nigeria’s most reliable document verification platform.</p>
                              <p style="line-height: 1.15;">Whether you’re a government agency, corporate institution, or private business, SmartKYC gives you the power to verify your vendors, contractors, or applicants quickly and securely — all in just a few steps.</p>
                              <p style="line-height: 1.15;">We know that each organization is unique. That’s why our pricing is fully tailored to meet your specific needs. We base our service plans on:<br>
                              The number of vendors or contractors you need to verify
                              <br>Your industry’s risk level and compliance requirements<br>The frequency and volume of verifications </p>
                              <div class="slider__ctas text-left">
                                <span id="hs_cos_wrapper_dnd_area-module-1_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta" style="" data-hs-cos-general-type="widget" data-hs-cos-type="cta">
                                  <!--HubSpot Call-to-Action Code -->
                                  <span class="hs-cta-wrapper" id="hs-cta-wrapper-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66">
                                    <span class="hs-cta-node hs-cta-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66" id="hs-cta-8f656c48-262a-4b61-a7aa-fdaf8d3eaa66">
                                      
                                    </span>
                                  </span>
                                  <!-- end HubSpot Call-to-Action Code -->
                                </span>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!--end widget-span -->
            </div>
            <!--end row-->
          </div>
          <!--end row-wrapper -->
          <div class="row-fluid-wrapper row-depth-1 row-number-23 dnd-section dnd_area-row-5-padding">
                  <div class="row-fluid ">
                     <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                        <div class="row-fluid-wrapper row-depth-1 row-number-24 dnd-row">
                           <div class="row-fluid ">
                              <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                                 <div id="hs_cos_wrapper_module_1660219098493" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                    <span id="hs_cos_wrapper_module_1660219098493_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                                       <h2 style="text-align: center;">Our <span style="color: #ffd61f;">Packages</span></h2>
                                    </span>
                                 </div>
                              </div>
                              <!--end widget-span -->
                           </div>
                           <!--end row-->
                        </div>
                        <!--end row-wrapper -->
                        <div class="row-fluid-wrapper row-depth-1 row-number-25 dnd-row">
                           <div class="row-fluid price_new">
                           
                           <div class="span3 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="9" data-w="3" data-aos="fade-up" data-aos-delay="600">
                                 <div id="hs_cos_wrapper_module_1660305748518" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                    <div class="pricing-item pric_lp pricing-item--module_1660305748518 text-center " id="">
                                       <h3 class="pricing-item__name">Pay-As-You-Go</h3>
                                       <h3 class="pricing-item__name pricing-item__price">₦ 9,000 per Document</h3>
                                       <div class="pricing-item__inner-content">
                                          <p><small></small></p>
                                          <div>
                                             <p style="text-align: left;">Are you an occasional user? Who need to verify documents on a case-by-case basis.<br>Then this is the option for you!</p>
                                          </div>
                                          <ul class="no-list">
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check1" role="img">
                                                   <title id="check1">Feature</title>
                                                   <g id="check1_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Cost ₦9,000 per document
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check2" role="img">
                                                   <title id="check2">Feature</title>
                                                   <g id="check2_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Processing time: 1-3 business days
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check3" role="img">
                                                   <title id="check3">Feature</title>
                                                   <g id="check3_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Real-time tracking
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check4" role="img">
                                                   <title id="check4">Feature</title>
                                                   <g id="check4_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Full verification report
                                                </span>
                                             </li>
                                          </ul>
                                          <span id="hs_cos_wrapper_module_1660305748518_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta" style="" data-hs-cos-general-type="widget" data-hs-cos-type="cta">
                                             <!--HubSpot Call-to-Action Code -->
                                             <span class="hs-cta-wrapper" id="hs-cta-wrapper-0afaf010-1deb-4ce8-8464-2f765991e0ca">
                                                <span class="hs-cta-node hs-cta-0afaf010-1deb-4ce8-8464-2f765991e0ca" id="hs-cta-0afaf010-1deb-4ce8-8464-2f765991e0ca">
                                                   <!--[if lte IE 8]>
                                                   <div id="hs-cta-ie-element"></div>
                                                   <![endif]--><a class="offerGetStartLik" href="{{url('/register')}}">Get Started</a>
                                                </span>
                                             </span>
                                             <!-- end HubSpot Call-to-Action Code -->
                                          </span>
                                          <p><small></small></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--end widget-span -->
                           
                           <div class="span3 widget-span widget-type-custom_widget widget_1660219145722-hidden dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="0" data-w="3" data-aos="fade-up" data-aos-delay="0">
                                 <div id="hs_cos_wrapper_widget_1660219145722" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                    <div class="pricing-item pric_lp pricing-item--widget_1660219145722 text-center " id="">
                                       <h3 class="pricing-item__name">Basic</h3>
                                       <h3 class="pricing-item__name pricing-item__price">₦ 37,500 Monthly</h3>
                                       <div class="pricing-item__inner-content">
                                          <p><small></small></p>
                                          <div>
                                             
                                             <p style="text-align: left;">Are you an individual or a small business with minimal verification needs?<br>Then this is the option for you!</p>
                                             
                                             
                                          </div>
                                          <ul class="no-list">
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check1" role="img">
                                                   <title id="check1">Feature</title>
                                                   <g id="check1_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Verify up to 5 documents per month
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check2" role="img">
                                                   <title id="check2">Feature</title>
                                                   <g id="check2_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Cost: ₦7,500 per document
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check3" role="img">
                                                   <title id="check3">Feature</title>
                                                   <g id="check3_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Processing time: 1-3 business days
                                                </span>
                                             </li>
                                          </ul>
                                          <span id="hs_cos_wrapper_widget_1660219145722_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta" style="" data-hs-cos-general-type="widget" data-hs-cos-type="cta">
                                             <!--HubSpot Call-to-Action Code -->
                                             <span class="hs-cta-wrapper" id="hs-cta-wrapper-702a6aed-b52a-48a5-96a1-74ab85c289d4">
                                                <span class="hs-cta-node hs-cta-702a6aed-b52a-48a5-96a1-74ab85c289d4" id="hs-cta-702a6aed-b52a-48a5-96a1-74ab85c289d4">
                                                   <!--[if lte IE 8]>
                                                   <div id="hs-cta-ie-element"></div>
                                                   <![endif]--><a class="offerGetStartLik" href="{{url('/register')}}">Get Started</a>
                                                </span>
                                             </span>
                                             <!-- end HubSpot Call-to-Action Code -->
                                          </span>
                                          <p><small></small></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--end widget-span -->
                              <div class="span3 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="3" data-w="3" data-aos="fade-up" data-aos-delay="200">
                                 <div id="hs_cos_wrapper_module_1660223857177" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                    <div class="pricing-item pric_lp pricing-item--module_1660223857177 text-center " id="">
                                       <h3 class="pricing-item__name">Business</h3>
                                       <h3 class="pricing-item__name pricing-item__price">₦ 70,000 Monthly</h3>
                                       <div class="pricing-item__inner-content">
                                          <p><small></small></p>
                                          <div>
                                             <p style="text-align: left;">Ideal for medium to large businesses with moderate verification needs.</p>
                                          </div>
                                          <ul class="no-list">
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check1" role="img">
                                                   <title id="check1">Feature</title>
                                                   <g id="check1_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Verify up to 10 documents per month
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check2" role="img">
                                                   <title id="check2">Feature</title>
                                                   <g id="check2_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Cost: ₦7,000 per additional document
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check3" role="img">
                                                   <title id="check3">Feature</title>
                                                   <g id="check3_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Processing time: 1-3 business days
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check4" role="img">
                                                   <title id="check4">Feature</title>
                                                   <g id="check4_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Bulk upload capability
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check4" role="img">
                                                   <title id="check4">Feature</title>
                                                   <g id="check4_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Customizable reporting features
                                                </span>
                                             </li>

                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check4" role="img">
                                                   <title id="check4">Feature</title>
                                                   <g id="check4_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Priority support
                                                </span>
                                             </li>
                                          </ul>
                                          <span id="hs_cos_wrapper_module_1660223857177_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta" style="" data-hs-cos-general-type="widget" data-hs-cos-type="cta">
                                             <!--HubSpot Call-to-Action Code -->
                                             <span class="hs-cta-wrapper" id="hs-cta-wrapper-49216580-8885-46b5-a9e7-78d609229321">
                                                <span class="hs-cta-node hs-cta-49216580-8885-46b5-a9e7-78d609229321" id="hs-cta-49216580-8885-46b5-a9e7-78d609229321">
                                                   <!--[if lte IE 8]>
                                                   <div id="hs-cta-ie-element"></div>
                                                   <![endif]--><a class="offerGetStartLik" href="{{url('/register')}}">Get Started</a>
                                                </span>
                                             </span>
                                             <!-- end HubSpot Call-to-Action Code -->
                                          </span>
                                          <p><small></small></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--end widget-span -->
                              <div class="span3 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="6" data-w="3" data-aos="fade-up" data-aos-delay="400">
                                 <div id="hs_cos_wrapper_module_1660223878845" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                                    <div class="pricing-item pric_lp pricing-item--module_1660223878845 text-center " id="">
                                       <!--
                                       <div class="ribbon">
                                          <span style="color:rgba(255, 255, 255, 1.0);background:rgba(255, 96, 0, 1.0);font-size:10px">Enterprise <br>Package</span> 
                                       </div>
                                       -->
                                       <h3 class="pricing-item__name">Enterprise</h3>
                                       <h3 class="pricing-item__name pricing-item__price">Custom Pricing</h3>
                                       <div class="pricing-item__inner-content">
                                          <p><small></small></p>
                                          <div>
                                             <p style="text-align: left;">Designed for large organizations and government entities with extensive verification needs.</p>
                                          </div>
                                          <ul class="no-list">
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check1" role="img">
                                                   <title id="check1">Feature</title>
                                                   <g id="check1_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Unlimited document verifications per month
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check3" role="img">
                                                   <title id="check3">Feature</title>
                                                   <g id="check3_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Processing time: 1–3 business days (expedited options available)
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check4" role="img">
                                                   <title id="check4">Feature</title>
                                                   <g id="check4_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Bulk document upload and processing
                                                </span>
                                             </li>
                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check5" role="img">
                                                   <title id="check5">Feature</title>
                                                   <g id="check5_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Full API integration with custom workflows 
                                                </span>
                                             </li>

                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check5" role="img">
                                                   <title id="check5">Feature</title>
                                                   <g id="check5_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Dedicated account manager
                                                </span>
                                             </li>

                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check5" role="img">
                                                   <title id="check5">Feature</title>
                                                   <g id="check5_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Compliance and audit trail reporting
                                                </span>
                                             </li>

                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check5" role="img">
                                                   <title id="check5">Feature</title>
                                                   <g id="check5_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                24/7 priority customer support
                                                </span>
                                             </li>

                                             <li>
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" aria-labelledby="check5" role="img">
                                                   <title id="check5">Feature</title>
                                                   <g id="check5_layer">
                                                      <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                   </g>
                                                </svg>
                                                <span>
                                                Optional:
                                                <br> 
                                                On-site production inspections
                                                <br> 
                                                Custom onboarding and training for your team
                                                <br> 
                                                Advanced analytics and performance dashboards
                                                <br> 
                                                Integration with internal systems and databases
                                                </span>
                                             </li>
                                          </ul>
                                          <span id="hs_cos_wrapper_module_1660223878845_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_cta" style="" data-hs-cos-general-type="widget" data-hs-cos-type="cta">
                                             <!--HubSpot Call-to-Action Code -->
                                             <span class="hs-cta-wrapper" id="hs-cta-wrapper-12b6f2fb-baa8-43bd-b47f-91f7bc5119aa">
                                                <span class="hs-cta-node hs-cta-12b6f2fb-baa8-43bd-b47f-91f7bc5119aa" id="hs-cta-12b6f2fb-baa8-43bd-b47f-91f7bc5119aa">
                                                   <!--[if lte IE 8]>
                                                   <div id="hs-cta-ie-element"></div>
                                                   <![endif]--><a class="offerGetStartLik" href="{{url('/register')}}">Get Started</a>
                                                </span>
                                             </span>
                                             <!-- end HubSpot Call-to-Action Code -->
                                          </span>
                                          <p><small></small></p>
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
        <!--end widget-span -->
      </div>
    </div>
  </div>
</main>
@endsection
@push("js")
<script src="{{ url('assets/js/glider.min.js'); }}"></script>

<script>
  window.addEventListener('load', function() {
			var glide = new Glider(document.querySelector('.slider--dnd_area-module-1'), {
				slidesToShow: 1,
        slidesToScroll: 1,
        /*responsive: [
        {
          // screens greater than >= 775px
          breakpoint: 775,
          settings: {
            // Set to `auto` and provide item width to adjust to viewport
            slidesToShow: 'auto',
            slidesToScroll: 'auto',
            itemWidth: 150,
            duration: 0.25
          }
        },{
          // screens greater than >= 1024px
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            itemWidth: 150,
            duration: 0.25
          }
        }
      ]*/
        /*
        type: 'carousel',
				perView: 1,
        circular: false,                
				gap: 0,
				autoplay: 5000,
				hoverpause: false,
				peek: 0
        */
			});

			//glide.mount();
           
		});
      $(window).on('scroll load', function() {
     $("li.glide__slide.lazy.glide__slide--clone").remove()
});
</script>
@endpush