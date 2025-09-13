
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="img/sidebar-bg/01.jpg" data-scroll-to-active="true">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a class="logo-text float-left" href="index.php">
              <div class="logo-img"><img src="img/logo.png" alt="GP Logo"/></div><span class="text"> <img src="img/logow.png"> </span></a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content main-menu-content">
          <div class="nav-container">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class="<?php if(basename($_SERVER['PHP_SELF'])=="home.php"){ echo "active"; } else{ echo "nav-item";}?>"><a href="home.php"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboards</span></a>
              </li>
              <li class="<?php if(basename($_SERVER['PHP_SELF'])=="task.php"){ echo "active"; } else{ echo "nav-item";}?>"><a href="task.php"><i class="ft-target"></i><span class="menu-title" data-i18n="Dashboard">Tasks</span></a>
              </li>
              
              <li class="<?php if(basename($_SERVER['PHP_SELF'])=="goal.php"){ echo "active"; } else{ echo "nav-item";}?>"><a href="goal.php"><i class="ft-list"></i><span class="menu-title" data-i18n="Dashboard">Goals</span></a>
              </li>
              <li class="<?php if(basename($_SERVER['PHP_SELF'])=="projects.php"){ echo "active"; } else{ echo "nav-item";}?>"><a href="projects.php"><i class="icon-grid"></i><span class="menu-title" data-i18n="Dashboard">Projects</span></a>
              </li>
              <li class="<?php if(basename($_SERVER['PHP_SELF'])=="account.php"){ echo "active"; } else{ echo "nav-item";}?>"><a href="account.php"><i class="icon-wallet"></i><span class="menu-title" data-i18n="Dashboard">Account</span></a>
              </li>
              <!-- <li class="<?php if(basename($_SERVER['PHP_SELF'])=="deposit.php"){ echo "active"; } else{ echo "nav-item";}?>"><a href="deposit.php"><i class="icon-calendar"></i><span class="menu-title" data-i18n="Dashboard">Deposit Entry</span></a>
              </li> -->
              <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-settings"></i><span class="menu-title" data-i18n="Tables">Setting</span></a>
                <ul class="menu-content">
                  <li class="<?php if(basename($_SERVER['PHP_SELF'])=="profile.php"){ echo "active"; } else{ echo "nav-item";}?>"><a href="#"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">Profile</span></a>
                  </li>
                  <li><a href="logout.php"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Extended">Logout</span></a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
        <!-- / main menu-->
      </div>