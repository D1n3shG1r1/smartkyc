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
                        <li class="glide__slide lazy glide__slide--clone" style="background-position: center center; width: 1275px; margin-right: 0px;" data-bg="<?php echo url('assets/img/people-1.jpg'); ?>">
                          <div class="slider__inner-container">
                            <div class="slider__inner ">
                              <h1 style="font-size: 43px; text-align: left; line-height: 1.15;">
                                <strong>World's quickest <br>inspection marketplace! </strong>
                              </h1>
                              <p style="font-size: 20px;">Are you an inspection company or a freelance quality professional?</p>
                              <p style="line-height: 1.15;">Whether you're a global, regional, domestic inspection company, or a freelance quality pro, you're welcome to submit your application to become a registered vendor, all in <strong>6 easy steps</strong>. </p>
                              <p style="line-height: 1.15;">Submit your application for review, and once approved, check our short or long term jobs you may want to submit an offer for.</p>
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
                        <li class="glide__slide lazy glide__slide--active loaded" style="background-position: center center; width: 1275px; margin-left: 0px; margin-right: 0px; margin:auto; background-image: url('<?php echo url('assets/img/people-2.jpg'); ?>');" data-ll-status="loaded">
                          <div class="slider__inner-container">
                            <div class="slider__inner ">
                              <h1 style="font-size: 43px; text-align: left; line-height: 1.15;">
                                <strong>World's quickest <br>inspection marketplace! </strong>
                              </h1>
                              <p style="font-size: 20px;">Are you an inspection company or a freelance quality professional?</p>
                              <p style="line-height: 1.15;">Whether you're a global, regional, domestic inspection company, or a freelance quality pro, you're welcome to submit your application to become a registered vendor, all in <strong>6 easy steps</strong>. </p>
                              <p style="line-height: 1.15;">Submit your application for review, and once approved, check our short or long term jobs you may want to submit an offer for.</p>
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
                        <li class="glide__slide lazy glide__slide--clone" style="background-position: center center; width: 1275px; margin-left: 0px;" data-bg="<?php echo url('assets/img/people-3.jpg'); ?>">
                          <div class="slider__inner-container">
                            <div class="slider__inner ">
                              <h1 style="font-size: 43px; text-align: left; line-height: 1.15;">
                                <strong>World's quickest <br>inspection marketplace! </strong>
                              </h1>
                              <p style="font-size: 20px;">Are you an inspection company or a freelance quality professional?</p>
                              <p style="line-height: 1.15;">Whether you're a global, regional, domestic inspection company, or a freelance quality pro, you're welcome to submit your application to become a registered vendor, all in <strong>6 easy steps</strong>. </p>
                              <p style="line-height: 1.15;">Submit your application for review, and once approved, check our short or long term jobs you may want to submit an offer for.</p>
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
          
          <div class="row-fluid-wrapper row-depth-1 row-number-5 ddnd_area-row-2-background-layers dnd_area-row-2-padding dnd_area-row-2-background-color dnd-section">
            <div class="row-fluid equals">
              <div class="span12 widget-span widget-type-cell cell_1660215041196-background-layers cell_1660215041196-background-color dnd-column cell_1660215041196-padding" style="" data-widget-type="cell" data-x="0" data-w="12">
                <div class="row-fluid-wrapper row-depth-1 row-number-6 dnd-row">
                  <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                      <div id="hs_cos_wrapper_module_1660215034689" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <span id="hs_cos_wrapper_module_1660215034689_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                          <h2 style="text-align: center;">
                            <span style="color: #002e5b;">How does it</span>
                            <span style="color: #ffd61f;">work <span style="color: #002e5b;">?</span>
                            </span>
                          </h2>


                          <p style="text-align: center;">
                            
                            <span style="color: #000000;">
                            <span style="font-weight: normal;">Welcome to</span> SmartKYC, <span style="font-weight: normal;">the ultimate document verification platform designed to streamline and simplify vendor and contractor verification for businesses and government agencies.</span>&nbsp;Follow these easy steps to get started and make informed decisions with verified data.&nbsp;</span>
                          </p>
                        </span>
                      </div>
                    </div>
                    <!--end widget-span -->
                  </div>
                  <!--end row-->
                </div>
                <!--end row-wrapper -->
                <div class="row-fluid-wrapper row-depth-1 row-number-7 dnd-row">
                  <div class="row-fluid equals">
                    <div class="span4 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="0" data-w="4" data-aos="fade-up" data-aos-delay="0">
                      <div id="hs_cos_wrapper_widget_1660656504774" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <div id="" class="dnd_area-row-2-background-layers nequalheight feature  text-center icon-15 feature--widget_1660656504774">
                          <img class="lazy loaded" alt="Step 1" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/icones.png'); }}">
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 1</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Sign Up & Set Up Your Account</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;"></p>
                            <ul style="color: #ffffff;padding: 0;text-align: left;font-size: 14px; margin-left: 5px;">
                              <li>Visit SmartKYC.ng and create an account.</li>
                              <li>Complete your profile with relevant business details.</li>
                              <li>Select a verification package that best suits your needs.</li>
                              <li>Make a secure payment to activate your verification services.</li>
                            </ul>
                            
                          </div>
                        </div>
                        <style type="text/css">
                          .feature--widget_1660656504774 .feature__icon svg {
                            fill: rgba(255, 255, 255, 1.0);
                          }

                          .feature--widget_1660656504774:hover {
                            box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                          }

                          .feature--widget_1660656504774 {
                            padding: 10px 43px;
                            border-radius: 12px;
                            border: 0px solid rgba(255, 255, 255, 1.0);
                            background: rgba(255, 255, 255, 0.0);
                            height: 100%;
                          }

                          @media (min-width: 1200px) {
                            .feature--widget_1660656504774 {
                              margin-top: -10px;
                            }
                          }

                          @media (max-width: 1200px) {
                            .feature {
                              padding: 21px 12px;
                            }

                            .feature--widget_1660656504774 {
                              margin-top: 21px;
                            }
                          }
                        </style>
                      </div>
                    </div>
                    <!--end widget-span -->
                    <div class="span4 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="4" data-w="4" data-aos="fade-up" data-aos-delay="200">
                      <div id="hs_cos_wrapper_module_1660731587249" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <div id="" class="dnd_area-row-2-background-layers nequalheight feature  text-center icon-10 feature--module_1660731587249">
                          <img class="lazy loaded" alt="" width="80" height="80" data-ll-status="loaded" sssrc="{{ url('assets/img/2.png'); }}"
                          src="{{ url('assets/img/icones.png'); }}"
                          >
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 2</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Request Document Verification</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;"></p>
                            <ul style="color: #ffffff;padding: 0;text-align: left;font-size: 14px; margin-left: 5px;">
                              <li>Generate a unique verification request link for each vendor or applicant.</li>
                              <li>Specify the exact documents required for verification.</li>
                            </ul>
                          </div>
                        </div>
                        <style type="text/css">
                          .feature--module_1660731587249 .feature__icon svg {
                            fill: rgba(255, 255, 255, 1.0);
                          }

                          .feature--module_1660731587249:hover {
                            box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                          }

                          .feature--module_1660731587249 {
                            padding: 10px 43px;
                            border-radius: 12px;
                            border: 0px solid rgba(255, 255, 255, 1.0);
                            background: rgba(255, 255, 255, 0.0);
                            height: 100%;
                          }

                          @media (min-width: 1200px) {
                            .feature--module_1660731587249 {
                              margin-top: -10px;
                            }
                          }

                          @media (max-width: 1200px) {
                            .feature {
                              padding: 21px 12px;
                            }

                            .feature--module_1660731587249 {
                              margin-top: 21px;
                            }
                          }
                        </style>
                      </div>
                    </div>
                    <!--end widget-span -->
                    <div class="span4 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="8" data-w="4" data-aos="fade-up" data-aos-delay="400">
                      <div id="hs_cos_wrapper_module_1660731613000" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <div id="" class="dnd_area-row-2-background-layers nequalheight feature  text-center icon-10 feature--module_1660731613000">
                          <img class="lazy loaded" alt="" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/icones.png'); }}">
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 3</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Track Your Applicants</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;"></p>
                            <ul style="color: #ffffff;padding: 0;text-align: left;font-size: 14px; margin-left: 5px;">
                              <li>View all submitted applicants on your Customer Dashboard.</li>
                              <li>Receive real-time updates on the status of each verification request.</li>
                            </ul>
                          </div>
                        </div>
                        <style type="text/css">
                          .feature--module_1660731613000 .feature__icon svg {
                            fill: rgba(255, 255, 255, 1.0);
                          }

                          .feature--module_1660731613000:hover {
                            box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                          }

                          .feature--module_1660731613000 {
                            padding: 10px 43px;
                            border-radius: 12px;
                            border: 0px solid rgba(255, 255, 255, 1.0);
                            background: rgba(255, 255, 255, 0.0);
                            height: 100%;
                          }

                          @media (min-width: 1200px) {
                            .feature--module_1660731613000 {
                              margin-top: -10px;
                            }
                          }

                          @media (max-width: 1200px) {
                            .feature {
                              padding: 21px 12px;
                            }

                            .feature--module_1660731613000 {
                              margin-top: 21px;
                            }
                          }
                        </style>
                      </div>
                    </div>
                    <!--end widget-span -->
                  </div>
                  <!--end row-->
                </div>

                <div class="row-fluid-wrapper row-depth-1 row-number-7 dnd-row">
                  <div class="row-fluid equals">
                  <div class="span4 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="8" data-w="4" data-aos="fade-up" data-aos-delay="0">
                      <div id="hs_cos_wrapper_module_1660731613000" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <div id="" class="dnd_area-row-2-background-layers nequalheight feature  text-center icon-10 feature--module_1660731613000">
                          <img class="lazy loaded" alt="" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/icones.png'); }}">
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 4</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Get Verified Reports</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;"></p>
                            <ul style="color: #ffffff;padding: 0;text-align: left;font-size: 14px; margin-left: 5px;">
                              <li>SmartKYC Officers will conduct thorough verification and submit a detailed report.</li>
                              <li>The report is sent to the Customer, who can then view the verification status to make decisions regarding their applicant/vendor.</li>
                            </ul>
                          </div>
                        </div>
                        <style type="text/css">
                          .feature--module_1660731613000 .feature__icon svg {
                            fill: rgba(255, 255, 255, 1.0);
                          }

                          .feature--module_1660731613000:hover {
                            box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                          }

                          .feature--module_1660731613000 {
                            padding: 10px 43px;
                            border-radius: 12px;
                            border: 0px solid rgba(255, 255, 255, 1.0);
                            background: rgba(255, 255, 255, 0.0);
                            height: 100%;
                          }

                          @media (min-width: 1200px) {
                            .feature--module_1660731613000 {
                              margin-top: -10px;
                            }
                          }

                          @media (max-width: 1200px) {
                            .feature {
                              padding: 21px 12px;
                            }

                            .feature--module_1660731613000 {
                              margin-top: 21px;
                            }
                          }
                        </style>
                      </div>
                    </div>
                    <!--end widget-span -->

                    <div class="span4 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="0" data-w="4" data-aos="fade-up" data-aos-delay="200">
                      <div id="hs_cos_wrapper_widget_1660656504774" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <div id="" class="dnd_area-row-2-background-layers nequalheight feature  text-center icon-15 feature--widget_1660656504774">
                          <img class="lazy loaded" alt="Step 1" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/icones.png'); }}">
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 5</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Applicant Receive a Verification Request</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;"></p>
                            <ul style="color: #ffffff;padding: 0;text-align: left;font-size: 14px; margin-left: 5px;">
                              <li>If a customer requires your documents for verification, you’ll receive a secure link.</li>
                            </ul>
                            
                          </div>
                        </div>
                        <style type="text/css">
                          .feature--widget_1660656504774 .feature__icon svg {
                            fill: rgba(255, 255, 255, 1.0);
                          }

                          .feature--widget_1660656504774:hover {
                            box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                          }

                          .feature--widget_1660656504774 {
                            padding: 10px 43px;
                            border-radius: 12px;
                            border: 0px solid rgba(255, 255, 255, 1.0);
                            background: rgba(255, 255, 255, 0.0);
                            height: 100%;
                          }

                          @media (min-width: 1200px) {
                            .feature--widget_1660656504774 {
                              margin-top: -10px;
                            }
                          }

                          @media (max-width: 1200px) {
                            .feature {
                              padding: 21px 12px;
                            }

                            .feature--widget_1660656504774 {
                              margin-top: 21px;
                            }
                          }
                        </style>
                      </div>
                    </div>
                    <!--end widget-span -->
                    <div class="span4 widget-span widget-type-custom_widget dnd-module aos-init" style="" data-widget-type="custom_widget" data-x="4" data-w="4" data-aos="fade-up" data-aos-delay="400">
                      <div id="hs_cos_wrapper_module_1660731587249" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <div id="" class="dnd_area-row-2-background-layers nequalheight feature  text-center icon-10 feature--module_1660731587249">
                          <img class="lazy loaded" alt="" width="80" height="80" data-ll-status="loaded" sssrc="{{ url('assets/img/2.png'); }}"
                          src="{{ url('assets/img/icones.png'); }}"
                          >
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 6</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Upload Required Documents</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;"></p>
                            <ul style="color: #ffffff;padding: 0;text-align: left;font-size: 14px; margin-left: 5px;">
                              <li>Click the link, complete your profile, and upload the requested documents.</li>
                              <li>Once submitted, your documents will be reviewed by SmartKYC Officers.</li>
                              <li>The verification outcome will be sent to the customer who requested your details.</li>
                            </ul>
                          </div>
                        </div>
                        <style type="text/css">
                          .feature--module_1660731587249 .feature__icon svg {
                            fill: rgba(255, 255, 255, 1.0);
                          }

                          .feature--module_1660731587249:hover {
                            box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                          }

                          .feature--module_1660731587249 {
                            padding: 10px 43px;
                            border-radius: 12px;
                            border: 0px solid rgba(255, 255, 255, 1.0);
                            background: rgba(255, 255, 255, 0.0);
                            height: 100%;
                          }

                          @media (min-width: 1200px) {
                            .feature--module_1660731587249 {
                              margin-top: -10px;
                            }
                          }

                          @media (max-width: 1200px) {
                            .feature {
                              padding: 21px 12px;
                            }

                            .feature--module_1660731587249 {
                              margin-top: 21px;
                            }
                          }
                        </style>
                      </div>
                    </div>
                    <!--end widget-span -->
                    
                  </div>
                  <!--end row-->
                </div>
                <!--end row-wrapper -->
                
                <div class="row-fluid-wrapper row-depth-1 row-number-12 dnd-row">
                  <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                      <div id="hs_cos_wrapper_widget_1660733002307" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-space" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <span class="hs-horizontal-spacer"></span>
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
          <!--end row-wrapper -->
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