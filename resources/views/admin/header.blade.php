<div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="{{url('/admin/dashboard')}}"><img class="logo_icon img-responsive" src="{{url('assets/img/walls-logo-web2.png?width=1994&height=402&name=walls-logo-web2.png')}}" alt="#" /></a>
                        
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img">
                        <a href="javascript:void(0);" class="profilePhotoCamera" data-fileElm="ProfilePhotoFile" onclick="editProfilePhoto(this)"><i class="fa fa-camera" style="font-size: 15px;"></i><span style="font-size: 11px;line-height: 14px;">Change Profile Photo</span></a>   
                        <img class="profilephotoimg img-responsive" src="<?php echo url(userImagesDisplayPath($LOGINUSER["adminId"],"pp-".$LOGINUSER["adminId"].".jpg"))?>" onerror="this.onerror=null; this.src='{{url('assets/admin/img/user.png')}}';"/></div>
                        <div class="user_info">
                        <h6>{{$LOGINUSER["fname"]." ".$LOGINUSER["lname"]}}</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div> 
                  <input type="file" id="ProfilePhotoFile" accept="image/*" style="display: none;" onchange="ppDailog()">
                  
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <!--
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="dashboard.html">> <span>Default Dashboard</span></a>
                           </li>
                           <li>
                              <a href="dashboard_2.html">> <span>Dashboard style 2</span></a>
                           </li>
                        </ul>
                     </li>
                     -->
                     <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
                     <li><a href="{{url('/admin/myprofile')}}"><i class="fa fa-user orange_color"></i> <span>My Profile</span></a></li>
                     
                     <li><a href="{{url('/admin/mynotes')}}"><i class="fa fa-file-o orange_color"></i> <span>My Notes</span></a></li>
                     
                     <li><a href="{{url('/admin/myapplications')}}"><i class="fa fa-upload orange_color"></i> <span>My Applications</span></a></li>
                     <!--
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Elements</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="general_elements.html">> <span>General Elements</span></a></li>
                           <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                           <li><a href="icons.html">> <span>Icons</span></a></li>
                           <li><a href="invoice.html">> <span>Invoice</span></a></li>
                        </ul>
                     </li>
                     <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="email.html">> <span>Email</span></a></li>
                           <li><a href="calendar.html">> <span>Calendar</span></a></li>
                           <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                        </ul>
                     </li>
                     -->
                     <li><a href="{{url('/admin/package')}}"><i class="fa fa-briefcase blue1_color"></i> <span>My Package</span></a></li>
                     <li><a href="{{url('/admin/settings')}}"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
                     <!--
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="profile.html">> <span>Profile</span></a>
                           </li>
                           <li>
                              <a href="project.html">> <span>Projects</span></a>
                           </li>
                           <li>
                              <a href="login.html">> <span>Login</span></a>
                           </li>
                           <li>
                              <a href="404_error.html">> <span>404 Error</span></a>
                           </li>
                        </ul>
                     </li>
                     <li><a href="map.html"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                     <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                     -->
                     <li><a href="{{url('/admin/signout')}}"><i class="fa fa-sign-out yellow_color"></i> <span>Sign Out</span></a></li>
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
                           <a href="{{url('admin/dashboard');}}"><img class="img-responsive logoblack logoblackpngdk" src="{{url('assets/img/walls-logo-web2.png?width=1994&height=402&name=walls-logo-web2.png')}}" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="profilephotoimg img-responsive rounded-circle" src="<?php echo url(userImagesDisplayPath($LOGINUSER["adminId"],"pp-".$LOGINUSER["adminId"].".jpg"))?>" onerror="this.onerror=null; this.src='{{url('assets/admin/img/user-white.png')}}';" alt="#" /><span class="name_user">{{$LOGINUSER["fname"]." ".$LOGINUSER["lname"]}}</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="{{url('/admin/myprofile')}}">My Profile</a>
                                       <a class="dropdown-item" href="{{url('/admin/settings')}}">Settings</a>
                                       <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->