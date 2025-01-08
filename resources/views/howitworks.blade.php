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
                        <li class="glide__slide lazy glide__slide--active loaded" style="background-position: center center; width: 1275px; margin-left: 0px; margin-right: 0px; background-image: url('<?php echo url('assets/img/people-2.jpg'); ?>');" data-ll-status="loaded">
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
          <div class="row-fluid-wrapper row-depth-1 row-number-2 dnd_area-row-1-padding dnd-section">
            <div class="row-fluid ">
              <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                <div class="row-fluid-wrapper row-depth-1 row-number-3 dnd-row">
                  <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                      <div id="hs_cos_wrapper_module_16611705555054" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <span id="hs_cos_wrapper_module_16611705555054_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                          <h2 style="text-align: center;">
                            <span>Some of our happy and repeat&nbsp;</span>
                            <span style="color: #ffd61f;">
                              <strong>
                                <span lang="EN-US">users</span>
                              </strong>
                            </span>
                            <span lang="EN-US">
                              <span>&nbsp;</span>
                            </span>
                            <span>worldwide testify</span>
                          </h2>
                        </span>
                      </div>
                    </div>
                    <!--end widget-span -->
                  </div>
                  <!--end row-->
                </div>
                <!--end row-wrapper -->
                <div class="row-fluid-wrapper row-depth-1 row-number-4 dnd-row">
                  <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                      <div id="hs_cos_wrapper_module_16611705555055" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <span id="hs_cos_wrapper_module_16611705555055_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                          <!-- TrustBox widget - Carousel -->
                          <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="6082df73396df40001aef722" data-style-height="140px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-review-languages="en" style="text-align: center; position: relative;">
                            <iframe title="Customer reviews powered by Trustpilot" loading="auto" src="https://widget.trustpilot.com/trustboxes/53aa8912dec7e10d38f59f36/index.html?templateId=53aa8912dec7e10d38f59f36&amp;businessunitId=6082df73396df40001aef722#locale=en-GB&amp;styleHeight=140px&amp;styleWidth=100%25&amp;theme=light&amp;stars=1%2C2%2C3%2C4%2C5&amp;reviewLanguages=en" style="position: relative; height: 140px; width: 100%; border-style: none; display: block; overflow: hidden;"></iframe>
                          </div>
                          <!-- End TrustBox widget -->
                          <!-- TrustBox widget - Review Collector -->
                          <div class="trustpilot-widget" data-locale="en-GB" data-template-id="56278e9abfbbba0bdcd568bc" data-businessunit-id="6082df73396df40001aef722" data-style-height="52px" data-style-width="100%" style="text-align: center; position: relative;">
                            <iframe title="Customer reviews powered by Trustpilot" loading="auto" src="https://widget.trustpilot.com/trustboxes/56278e9abfbbba0bdcd568bc/index.html?templateId=56278e9abfbbba0bdcd568bc&amp;businessunitId=6082df73396df40001aef722#locale=en-GB&amp;styleHeight=52px&amp;styleWidth=100%25" style="position: relative; height: 52px; width: 100%; border-style: none; display: block; overflow: hidden;"></iframe>
                          </div>
                          <!-- End TrustBox widget -->
                        </span>
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
          <div class="row-fluid-wrapper row-depth-1 row-number-5 dnd_area-row-2-background-layers dnd_area-row-2-padding dnd_area-row-2-background-color dnd-section">
            <div class="row-fluid equals">
              <div class="span12 widget-span widget-type-cell cell_1660215041196-background-layers cell_1660215041196-background-color dnd-column cell_1660215041196-padding" style="" data-widget-type="cell" data-x="0" data-w="12">
                <div class="row-fluid-wrapper row-depth-1 row-number-6 dnd-row">
                  <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                      <div id="hs_cos_wrapper_module_1660215034689" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <span id="hs_cos_wrapper_module_1660215034689_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                          <h2 style="text-align: center;">
                            <span style="color: #ffffff;">How does it</span>
                            <span style="color: #ffd61f;">work <span style="color: #002e5b;">?</span>
                            </span>
                          </h2>
                          <p style="text-align: center;">
                            <span style="color: #ffffff;">
                            SmartVerify <span style="font-weight: normal;">makes document verification easy and efficient.</span> Follow these <span style="font-weight: bold;">6 simple steps</span> to start verifying your documents today.&nbsp;</span>
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
                        <div id="" class=" nequalheight feature  text-center icon-15 feature--widget_1660656504774">
                          <img class="lazy loaded" alt="Step 1" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/Step 1.png'); }}">
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 1</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Create an account</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;">
                              <span style="color: #ffffff;">To get started, visit the SmartVerify website and sign up for an account. You will need to provide your basic information, such as your name, email address, and company details (if applicable). Once registered, you can log in to access all features of the platform.</span>
                            </p>
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
                        <div id="" class=" nequalheight feature  text-center icon-10 feature--module_1660731587249">
                          <img class="lazy loaded" alt="InspeXion_Notifications" width="80" height="80" data-ll-status="loaded" sssrc="{{ url('assets/img/2.png'); }}"
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
                                <span style="color: #ffffff;">Choose a Verification Service</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;">
                              <span style="color: #ffffff;">After logging in, you will be presented with various document verification options. Select the type of document you want to verify,<br>such as:
                              Government certificates, Tax documents, Identity verification, Vendor or contractor Documents.
                                  If you need to verify multiple documents, choose the bulk verification option.
                                </span>
                            </p>
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
                        <div id="" class=" nequalheight feature  text-center icon-10 feature--module_1660731613000">
                          <img class="lazy loaded" alt="InspeXion_Upload" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/upload.png'); }}">
                          <div class="feature__inner">
                            <p style="font-size: 20px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Step 3</span>
                              </strong>
                            </p>
                            <p style="font-size: 18px; line-height: 1;">
                              <strong>
                                <span style="color: #ffffff;">Upload Your Documents</span>
                              </strong>
                            </p>
                            <p style="line-height: 1;">
                              <span style="color: #ffffff;">Upload the document(s) you need to verify. The platform accepts common file formats such as PDF, JPEG, PNG, and Word documents. Ensure the uploaded files are clear and legible to facilitate the verification process.</span>
                            </p>
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
                <!--end row-wrapper -->
                <div class="row-fluid-wrapper row-depth-1 row-number-8 dnd-row">
                  <div class="row-fluid equals">
                    <div class="span4 widget-span widget-type-cell dnd-column aos-init" style="" data-widget-type="cell" data-x="0" data-w="4" data-aos="fade-up" data-aos-delay="0">
                      <div class="row-fluid-wrapper row-depth-1 row-number-9 dnd-row">
                        <div class="row-fluid ">
                          <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                            <div id="hs_cos_wrapper_module_1660731625063" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                              <div id="" class=" nequalheight feature  text-center icon-10 feature--module_1660731625063">
                                <img class="lazy loaded" alt="inspector-jobs | Inspexion.com" width="80" height="80" data-ll-status="loaded" ssssrc="{{ url('assets/img/dedicated.png'); }}" src="{{ url('assets/img/7.png'); }}">
                                <div class="feature__inner">
                                  <p style="font-size: 20px; line-height: 1;">
                                    <strong>
                                      <span style="color: #ffffff;">Step 4</span>
                                    </strong>
                                  </p>
                                  <p style="font-size: 18px; line-height: 1;">
                                    <strong>
                                      <span style="color: #ffffff;">Make Payment (If Required)</span>
                                    </strong>
                                  </p>
                                  <p style="line-height: 1;">
                                    <span style="color: #ffffff;">Some verification services may require payment. If applicable, proceed to the payment page and select your preferred payment method. SmartVerify accepts major credit cards, debit cards, and other online payment systems. For businesses, bulk verification packages are also available.</span>
                                  </p>
                                </div>
                              </div>
                              <style type="text/css">
                                .feature--module_1660731625063 .feature__icon svg {
                                  fill: rgba(255, 255, 255, 1.0);
                                }

                                .feature--module_1660731625063:hover {
                                  box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                                }

                                .feature--module_1660731625063 {
                                  padding: 10px 43px;
                                  border-radius: 12px;
                                  border: 0px solid rgba(255, 255, 255, 1.0);
                                  background: rgba(255, 255, 255, 0.0);
                                  height: 100%;
                                }

                                @media (min-width: 1200px) {
                                  .feature--module_1660731625063 {
                                    margin-top: 20px;
                                  }
                                }

                                @media (max-width: 1200px) {
                                  .feature {
                                    padding: 21px 12px;
                                  }

                                  .feature--module_1660731625063 {
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
                    </div>
                    <!--end widget-span -->
                    <div class="span4 widget-span widget-type-cell dnd-column aos-init" style="" data-widget-type="cell" data-x="4" data-w="4" data-aos="fade-up" data-aos-delay="200">
                      <div class="row-fluid-wrapper row-depth-1 row-number-10 dnd-row">
                        <div class="row-fluid ">
                          <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                            <div id="hs_cos_wrapper_module_1660731640064" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                              <div id="" class=" nequalheight feature  text-center icon-10 feature--module_1660731640064">
                                <img class="lazy loaded" alt="icones" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/icones.png'); }}">
                                <div class="feature__inner">
                                  <p style="font-size: 20px; line-height: 1;">
                                    <strong>
                                      <span style="color: #ffffff;">Step 5</span>
                                    </strong>
                                  </p>
                                  <p style="font-size: 18px; line-height: 1;">
                                    <strong>
                                      <span style="color: #ffffff;">Track Your Verification</span>
                                    </strong>
                                  </p>
                                  <p style="line-height: 1;">
                                    <span style="color: #ffffff;">Once your document has been submitted, you can track the status of the verification in real-time through your dashboard. You will receive notifications when the verification process is complete or if further information is required.</span>
                                  </p>
                                </div>
                              </div>
                              <style type="text/css">
                                .feature--module_1660731640064 .feature__icon svg {
                                  fill: rgba(255, 255, 255, 1.0);
                                }

                                .feature--module_1660731640064:hover {
                                  box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                                }

                                .feature--module_1660731640064 {
                                  padding: 10px 43px;
                                  border-radius: 12px;
                                  border: 0px solid rgba(255, 255, 255, 1.0);
                                  background: rgba(255, 255, 255, 0.0);
                                  height: 100%;
                                }

                                @media (min-width: 1200px) {
                                  .feature--module_1660731640064 {
                                    margin-top: 20px;
                                  }
                                }

                                @media (max-width: 1200px) {
                                  .feature {
                                    padding: 21px 12px;
                                  }

                                  .feature--module_1660731640064 {
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
                    </div>
                    <!--end widget-span -->
                    <div class="span4 widget-span widget-type-cell dnd-column aos-init" style="" data-widget-type="cell" data-x="8" data-w="4" data-aos="fade-up" data-aos-delay="400">
                      <div class="row-fluid-wrapper row-depth-1 row-number-11 dnd-row">
                        <div class="row-fluid ">
                          <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                            <div id="hs_cos_wrapper_module_1661494918157" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                              <div id="" class=" nequalheight feature  text-center icon-10 feature--module_1661494918157">
                                <img class="lazy loaded" alt="7" width="80" height="80" data-ll-status="loaded" src="{{ url('assets/img/2.png'); }}">
                                <div class="feature__inner">
                                  <p style="font-size: 20px; line-height: 1;">
                                    <strong>
                                      <span style="color: #ffffff;">Step 6</span>
                                    </strong>
                                  </p>
                                  <p style="font-size: 18px; line-height: 1;">
                                    <strong>
                                      <span style="color: #ffffff;">Receive Your Verification Report</span>
                                    </strong>
                                  </p>
                                  <p style="line-height: 1;">
                                    <span style="color: #ffffff;">When the verification is complete, SmartVerify will generate a detailed report showing the verification results. This report will confirm whether the document is authentic or highlight any discrepancies found during the process.</span>
                                  </p>
                                </div>
                              </div>
                              <style type="text/css">
                                .feature--module_1661494918157 .feature__icon svg {
                                  fill: rgba(255, 255, 255, 1.0);
                                }

                                .feature--module_1661494918157:hover {
                                  box-shadow: 0 43px 70px rgba(0, 0, 0, 0.12);
                                }

                                .feature--module_1661494918157 {
                                  padding: 10px 43px;
                                  border-radius: 12px;
                                  border: 0px solid rgba(255, 255, 255, 1.0);
                                  background: rgba(255, 255, 255, 0.0);
                                  height: 100%;
                                }

                                @media (min-width: 1200px) {
                                  .feature--module_1661494918157 {
                                    margin-top: 20px;
                                  }
                                }

                                @media (max-width: 1200px) {
                                  .feature {
                                    padding: 21px 12px;
                                  }

                                  .feature--module_1661494918157 {
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
         
          <!--end row-wrapper -->
          <div class="row-fluid-wrapper row-depth-1 row-number-26 dnd_area-row-6-padding dnd-section">
            <div class="row-fluid ">
              <div class="span12 widget-span widget-type-cell dnd-column" style="" data-widget-type="cell" data-x="0" data-w="12">
                <div class="row-fluid-wrapper row-depth-1 row-number-27 dnd-row">
                  <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                      <div id="hs_cos_wrapper_module_16621270836776" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module widget-type-rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <span id="hs_cos_wrapper_module_16621270836776_" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text">
                          <h2 style="text-align: center;">They trust <span style="color: #ffd61f;">us</span>
                          </h2>
                        </span>
                      </div>
                    </div>
                    <!--end widget-span -->
                  </div>
                  <!--end row-->
                </div>
                <!--end row-wrapper -->
                <div class="row-fluid-wrapper row-depth-1 row-number-28 dnd-row">
                  <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-custom_widget dnd-module" style="" data-widget-type="custom_widget" data-x="0" data-w="12">
                      <div id="hs_cos_wrapper_module_16621270836777" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_module" style="" data-hs-cos-general-type="widget" data-hs-cos-type="module">
                        <div class="logos-of-customer logo-slide-row logo-new" id="">
                          <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-1" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="inspexion_and_apave" style="max-width: 100%; height: auto;" height="200" width="500" data-ll-status="loaded" src="{{ url('assets/img/inspexion_and_apave.webp'); }}">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-2" style="width: 100%; display: inline-block;">
                                  <a href="javascript:void(0);" rel="noreferrer" target="_blank" tabindex="0">
                                  <img class="lazy loaded" alt="TSE Global" style="max-width: 100%; height: auto;" height="200" width="200" data-ll-status="loaded" src="{{ url('assets/img/1681212953336.jpg'); }}">
                                  </a>
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-3" style="width: 100%; display: inline-block;">
                                  <a href="https://distichain.com/" rel="noreferrer" target="_blank" tabindex="0">
                                  <img class="lazy loaded" alt="DistichainLogoPartner" style="max-width: 100%; height: auto;" height="180" width="600" data-ll-status="loaded" src="{{ url('assets/img/DistichainLogoPartner.png'); }}">
                                  </a>
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-4" style="width: 100%; display: inline-block;">
                                  <a href="https://asc-africa.com/" rel="noreferrer" target="_blank" tabindex="0">
                                  <img class="lazy loaded" alt="ASCIconPNG" style="max-width: 100%; height: auto;" height="1890" width="1891" data-ll-status="loaded" src="{{ url('assets/img/ASCIconPNG.png'); }}">
                                  </a>
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-5" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="inspexion_and_virventures" style="max-width: 100%; height: auto;" height="200" width="500" data-ll-status="loaded" src="{{ url('assets/img/inspexion_and_virventures.webp'); }}">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-6" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="AGC" style="max-width: 100%; height: auto;" height="101" width="280" data-ll-status="loaded" src="{{ url('assets/img/AGC.jpg'); }}">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-7" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="inspexion_and_labcal" style="max-width: 100%; height: auto;" height="200" width="500" data-ll-status="loaded" src="{{ url('assets/img/inspexion_and_labcal.webp'); }}">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-8" style="width: 100%; display: inline-block;">
                                  <a href="https://www.internationalsos.com/" rel="noreferrer" target="_blank" tabindex="0">
                                  <img class="lazy loaded" alt="international-sos-logo-2015" style="max-width: 100%; height: auto;" height="98" width="203" data-ll-status="loaded" src="{{ url('assets/img/international-sos-logo-2015.png'); }}">
                                  </a>
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-9" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="baltic control" style="max-width: 100%; height: auto;" height="97" width="517" data-ll-status="loaded" src="{{ url('assets/img/baltic control.png'); }}">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-10" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="ProQc" style="max-width: 100%; height: auto;" height="100" width="219" data-ll-status="loaded" src="{{ url('assets/img/ProQc.jpg'); }}">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-11" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="inspexion_and_samapro" style="max-width: 100%; height: auto;" height="200" width="500" data-ll-status="loaded" src="{{ url('assets/img/inspexion_and_samapro.webp'); }}">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-12" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="Carredour Dubai" style="max-width: 100%; height: auto;" height="113" width="444" data-ll-status="loaded" src="{{ url('assets/img/Carredour Dubai.png'); }}">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-13" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="PPI-Quality-Engineering" style="max-width: 100%; height: auto;" height="1019" width="2899" data-ll-status="loaded" src="{{ url('assets/img/PPI-Quality-Engineering.jpg'); }}">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-14" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="inspexion_and_a2m" style="max-width: 100%; height: auto;" height="200" width="500" data-ll-status="loaded" src="{{ url('assets/img/inspexion_and_a2m.webp'); }}">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-15" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="Solunar" style="max-width: 100%; height: auto;" height="32" width="191" data-ll-status="loaded" src="{{ url('assets/img/Solunar.png'); }}">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-16" style="width: 100%; display: inline-block;">
                                  <img class="lazy loaded" alt="al-sadi trading group" style="max-width: 100%; height: auto;" height="73" width="246" data-ll-status="loaded" src="{{ url('assets/img/al-sadi trading group.png'); }}">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-17" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Techinspect.jpg'); }}" alt="Techinspect" style="max-width: 100%; height: auto;" height="216" width="711">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-18" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Emblem-Carrefour.jpg'); }}" alt="Carrefour" style="max-width: 100%; height: auto;" height="720" width="1280">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-19" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/tata.png'); }}" alt="tata" style="max-width: 100%; height: auto;" height="168" width="300">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-20" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Accord.jpg'); }}" alt="Accord" style="max-width: 100%; height: auto;" height="66" width="259">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-21" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Orange.jpg'); }}" alt="Orange" style="max-width: 100%; height: auto;" height="186" width="931">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-22" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/PSB.jpg'); }}" alt="PSB" style="max-width: 100%; height: auto;" height="496" width="1772">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-23" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/TCIS.jpg'); }}" alt="TCIS" style="max-width: 100%; height: auto;" height="135" width="372">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-24" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Techmas.jpg'); }}" alt="Techmas" style="max-width: 100%; height: auto;" height="236" width="1240">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-25" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Amspec.jpg'); }}" alt="Amspec" style="max-width: 100%; height: auto;" height="718" width="1984">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-26" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Bizztex.jpg'); }}" alt="Bizztex" style="max-width: 100%; height: auto;" height="96" width="122">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-27" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Cartimex.png'); }}" alt="Cartimex" style="max-width: 100%; height: auto;" height="122" width="244">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-28" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/CWM.jpg'); }}" alt="CWM" style="max-width: 100%; height: auto;" height="105" width="182">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-29" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Dzire.jpg'); }}" alt="Dzire" style="max-width: 100%; height: auto;" height="115" width="227">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-30" style="width: 100%; display: inline-block;">
                                  <a href="https://infiniteresources.org/" rel="noreferrer" target="_blank" tabindex="-1">
                                  <img class="lazy" src="{{ url('assets/img/IR_final-logo.png'); }}" alt="IR_final-logo" style="max-width: 100%; height: auto;" height="368" width="1366">
                                  </a>
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-31" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Ethical_AfroAsia.jpg'); }}" alt="Ethical_AfroAsia" style="max-width: 100%; height: auto;" height="175" width="350">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-32" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/linktogether.jpg'); }}" alt="linktogether" style="max-width: 100%; height: auto;" height="168" width="300">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-33" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Trendbell.jpg'); }}" alt="Trendbell" style="max-width: 100%; height: auto;" height="125" width="282">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-34" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Vallis.jpg'); }}" alt="Vallis" style="max-width: 100%; height: auto;" height="200" width="200">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-35" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Brighton%20home.jpg'); }}" alt="Brighton home" style="max-width: 100%; height: auto;" height="194" width="320">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-36" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/Xperteye.jpg'); }}" alt="Xperteye" style="max-width: 100%; height: auto;" height="1638" width="2138">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-37" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/logo-trust-control.jpg'); }}" alt="logo-trust-control" style="max-width: 100%; height: auto;" height="84" width="331">
                              </div>
                            </div>
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-38" style="width: 100%; display: inline-block;">
                                  <img class="lazy" src="{{ url('assets/img/img-20201030-090257-5fad006390906869356232-1.jpg'); }}" alt="img-20201030-090257-5fad006390906869356232-1" style="max-width: 100%; height: auto;" height="464" width="466">
                              </div>
                            </div>
                        </div>
                        <div class="slick-slide">
                            <div>
                              <div class="inner-logos widget_1660212928547-logo-39" style="width: 100%; display: inline-block;">
                                  <a href="https://www.showroomprive.com/" rel="noreferrer" target="_blank" tabindex="-1">
                                  <img class="lazy" src="{{ url('assets/img/ShowroomPrive.png'); }}" alt="ShowroomPrive" style="max-width: 100%; height: auto;" height="158" width="798">
                                  </a>
                              </div>
                            </div>
                            <div></div>
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