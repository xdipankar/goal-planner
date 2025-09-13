
    <nav class="navbar navbar-expand-lg header-navbar navbar-fixed bg-glass-1">
      <div class="container-fluid navbar-wrapper">
        <div class="navbar-header d-flex">
          <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
          <ul class="navbar-nav">
            <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>

            <li class="nav-item nav-search"><a class="nav-link nav-link-search text-danger" href="<?php basename($_SERVER['PHP_SELF']) ?>"><i class="icon-refresh font-medium-3"></i></a>
            </li>

          </ul>
          
        </div>
        <div class="d-block d-lg-none d-xl-none">
          <i class="gplogo"></i>
        </div>
        <div class="navbar-container">
          <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
            <ul class="navbar-nav">
            
            <li class="dropdown nav-item mr-1">
              <a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown"><i class="icon-magic-wand font-medium-3"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownBasic2">
                  <a class="dropdown-item primary" href="#"  id="ll-switch"><i class="ft-sunrise"></i> Light
                  </a>
                  <a class="dropdown-item secondary" href="#" id="dl-switch"><i class="ft-sunset"></i> Dark
                    </a>
                    <a class="dropdown-item warning" href="#" id="tl-switch"><i class="ft-star"></i> Trransparent
                    </a>

                </div>
              </li>
              <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                  <div class="user d-md-flex d-none mr-2"><span class="text-right text-danger"><?php echo $dm_name ?></span><span class="text-right text-muted text-success font-small-3"><?php echo $dm_email ?></span></div><img class="avatar" src="img/u.png" alt="avatar" height="35" width="35"></a>
                <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2">
                    <a class="dropdown-item" href="">
                    <div class="d-flex align-items-center"><i class="ft-user mr-2"></i><span>Profile</span></div></a>
                   <!--  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center"><i class="ft-mail mr-2"></i><span>Support Inbox</span></div></a> -->
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php">
                    <div class="d-flex align-items-center text-danger"><i class="ft-power mr-2"></i><span>Logout</span></div></a>
                </div>
              </li>
              <!-- <li class="nav-item d-none d-lg-block mr-2 mt-1"><a class="nav-link notification-sidebar-toggle" href="javascript:;"><i class="ft-align-right font-medium-3"></i></a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar (Header) Ends-->