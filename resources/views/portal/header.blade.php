@php
/*
"adminId" => $adminId,
"portalId" => $portalId,
"customerId" => $customerId,
"customerEmail" => $customerEmail,
"customerFname" => $customerFname,
"customerLname" => $customerLname
*/
@endphp
<div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="{{url('/admin/dashboard')}}">
                            <img class="logo_icon img-responsive" src="{{url('assets/img/walls-logo-web2.png?width=1994&height=402&name=walls-logo-web2.png')}}" alt="#" />
                        </a>
                        
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <!--
                        <div class="user_img">
                        <a href="javascript:void(0);" class="profilePhotoCamera" data-fileElm="ProfilePhotoFile" onclick="editProfilePhoto(this)"><i class="fa fa-camera" style="font-size: 15px;"></i><span style="font-size: 11px;line-height: 14px;">Change Profile Photo</span></a>   
                        <img class="profilephotoimg img-responsive" src="<?php /*echo url(userImagesDisplayPath($LOGINUSER["adminId"],"pp-".$LOGINUSER["adminId"].".jpg"))*/?>" onerror="this.onerror=null; this.src='{{url('assets/admin/img/user.png')}}';"/></div>
                        -->
                        <div class="user_info">
                        <h6>{{$LOGINUSER["customerFname"]." ".$LOGINUSER["customerLname"]}}</h6>
                        <h6 style="font-size: 13px;">{{$LOGINUSER["customerEmail"]}}</h6>
                        <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div> 
                  <!--
                  <input type="file" id="ProfilePhotoFile" accept="image/*" style="display: none;" onchange="ppDailog()">
                  -->
                  
               </div>
               <div class="sidebar_blog_2">
                  <h4>Applicant</h4>
                  <ul class="list-unstyled components">
                    <li><a href="{{url('/portal/dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{url('/portal/myapplications')}}"><i class="fa fa-file-text-o yellow_color"></i> <span>My Applications</span></a></li>
                    <li><a href="{{url('/portal/newapplication')}}"><i class="fa fa-upload yellow_color"></i> <span>Upload Documents</span></a></li>
                    <li><a href="{{url('/portal/myprofile')}}"><i class="fa fa-user yellow_color"></i> <span>My Profile</span></a></li>
                    <li><a href="{{url('/portal/logout')}}"><i class="fa fa-sign-out yellow_color"></i> <span>Logout</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="{{url('portal/dashboard');}}"><img class="img-responsive logoblack logoblackpngdk" src="{{url('assets/img/walls-logo-web2.png?width=1994&height=402&name=walls-logo-web2.png')}}" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="{{url('portal/notifications');}}"><i class="fa fa-bell-o"></i><span class="badge">{{$LOGINUSER["notifiationCount"]}}</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <!--<li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>-->
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="profilephotoimg img-responsive rounded-circle" src="<?php /*echo url(userImagesDisplayPath($LOGINUSER["customerId"],"pp-".$LOGINUSER["customerId"].".jpg"))*/?>" onerror="this.onerror=null; this.src='{{url('assets/admin/img/user-white.png')}}';" alt="#" /><span class="name_user">{{$LOGINUSER["customerFname"]." ".$LOGINUSER["customerLname"]}}</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="{{url('/portal/myprofile')}}">My Profile</a>
                                       <a class="dropdown-item" href="{{url('/portal/logout')}}"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->