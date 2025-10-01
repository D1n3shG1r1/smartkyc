 <!-- Carousel Start -->
 <style>
    .videoBtn{
        display:none !important;
    }
 </style>

 <div class="carousel">
    <div class="container-fluid">
        <div class="owl-carousel">
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="{{url('/assets/img/carousel/carousel-1.jpg')}}" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>Fast, Reliable, and Precise Document Verification for Businesses, Governments, and Individuals</h1>
                    <p>
                        We make document verification simple, fast, and reliable. Whether you’re a business, government agency, or an individual, our platform ensures that every document is authenticated with precision and integrity.
                    </p>
                    <div class="carousel-btn">
                        <a class="btn" href="javascript:void(0);" onclick="getStarted();"><i class="fa fa-link"></i>Get Started</a>
                        <a class="videoBtn btn btn-play" data-toggle="modal" data-src="{{url('videolink')}}" data-target="#videoModal"><i class="fa fa-play"></i>Watch Video</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="{{url('/assets/img/carousel/carousel-2.jpg')}}" alt="Image">
                </div>
                <div class="carousel-text">
                
                    <h1>Delivering Fast, Accurate, and Secure Verification Services for a Safer Digital World</h1>
                    <p>
                        Our Mission: To provide fast, accurate, and secure verification services that help businesses and individuals reduce risks and ensure compliance in an ever-evolving digital world.
                    </p>
                    <div class="carousel-btn">
                        <a class="btn" href="javascript:void(0);" onclick="getStarted();"><i class="fa fa-link"></i>Get Started</a>
                        <a class="videoBtn btn btn-play" data-toggle="modal" data-src="{{url('videolink')}}" data-target="#videoModal"><i class="fa fa-play"></i>Watch Video</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img">
                    <img src="{{url('/assets/img/carousel/carousel-3.jpg')}}" alt="Image">
                </div>
                <div class="carousel-text">
                    <h1>Prioritizing Data Protection and Confidentiality with Secure Online Payments</h1>
                    <p>
                        We prioritize data protection and the confidentiality of all documents submitted. Scure Online Payments.
                    </p>
                    <div class="carousel-btn">
                        <a class="btn" href="javascript:void(0);" onclick="getStarted();"><i class="fa fa-link"></i>Get Started</a>
                        <a class="videoBtn btn btn-play" data-toggle="modal" data-src="{{url('videolink')}}" data-target="#videoModal"><i class="fa fa-play"></i>Watch Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Video Modal Start-->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>        
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Video Modal End -->