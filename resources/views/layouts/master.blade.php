<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.style')
    <style>
        .router-link-active {
            color: red !important;
        }

        .router-link-exact-active  {
            color: #03a9f3 !important;
        }
    </style>
</head>

<body>
  <div class="app" id="app">
    
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
      <nav class="navbar navbar-expand-sm navbar-default">
          <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">
                  <li>
                      <router-link to="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </router-link>
                  </li>
                  <li class="menu-title">UI elements</li><!-- /.menu-title -->
                  <li>
                    <router-link to="/paket"> <i class="menu-icon ti-book"></i>Paket Travel </router-link>
                  </li>
                  <li>
                    <router-link to="/gallery"> <span class="menu-icon ti-gallery"></span>Gallery Travel </router-link>
                  </li>
                  <li>
                    <router-link to="/transaksi"> <i class="menu-icon ti-money"></i>Transaksi Travel </router-link>
                  </li>
              </ul>
          </div><!-- /.navbar-collapse -->
      </nav>
  </aside>
  <!-- /#left-panel -->
  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
      <!-- Header-->
      <header id="header" class="header">
          <div class="top-left">
              <div class="navbar-header">
                  <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
              </div>
          </div>
          <div class="top-right">
              <div class="header-menu">
                  <div class="header-left">
                      <button class="search-trigger"><i class="fa fa-search"></i></button>
                      <div class="form-inline">
                          <form class="search-form">
                              <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                              <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                          </form>
                      </div>

                      <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-bell"></i>
                              <span class="count bg-danger">3</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                              <p class="red">You have 3 Notification</p>
                              <a class="dropdown-item media" href="#">
                                  <i class="fa fa-check"></i>
                                  <p>Server #1 overloaded.</p>
                              </a>
                              <a class="dropdown-item media" href="#">
                                  <i class="fa fa-info"></i>
                                  <p>Server #2 overloaded.</p>
                              </a>
                              <a class="dropdown-item media" href="#">
                                  <i class="fa fa-warning"></i>
                                  <p>Server #3 overloaded.</p>
                              </a>
                          </div>
                      </div>

                      <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-envelope"></i>
                              <span class="count bg-primary">4</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                              <p class="red">You have 4 Mails</p>
                              <a class="dropdown-item media" href="#">
                                  <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                  <div class="message media-body">
                                      <span class="name float-left">Jonathan Smith</span>
                                      <span class="time float-right">Just now</span>
                                      <p>Hello, this is an example msg</p>
                                  </div>
                              </a>
                              <a class="dropdown-item media" href="#">
                                  <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                  <div class="message media-body">
                                      <span class="name float-left">Jack Sanders</span>
                                      <span class="time float-right">5 minutes ago</span>
                                      <p>Lorem ipsum dolor sit amet, consectetur</p>
                                  </div>
                              </a>
                              <a class="dropdown-item media" href="#">
                                  <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                  <div class="message media-body">
                                      <span class="name float-left">Cheryl Wheeler</span>
                                      <span class="time float-right">10 minutes ago</span>
                                      <p>Hello, this is an example msg</p>
                                  </div>
                              </a>
                              <a class="dropdown-item media" href="#">
                                  <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                  <div class="message media-body">
                                      <span class="name float-left">Rachel Santos</span>
                                      <span class="time float-right">15 minutes ago</span>
                                      <p>Lorem ipsum dolor sit amet, consectetur</p>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>

                  <div class="user-area dropdown float-right">
                      <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                      </a>

                      <div class="user-menu dropdown-menu">
                          <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                          <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                          <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                          <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                      </div>
                  </div>

              </div>
          </div>
      </header>
      <!-- /#header -->
      <!-- Content -->
      <div class="content">
          <router-view> </router-view>
      </div>
      <!-- /.content -->
      <div class="clearfix"></div>
      <!-- Footer -->
      {{-- <footer class="site-footer">
          <div class="footer-inner bg-white">
              <div class="row">
                  <div class="col-sm-6">
                      Copyright &copy; 2018 Ela Admin
                  </div>
                  <div class="col-sm-6 text-right">
                      Designed by <a href="https://colorlib.com">Colorlib</a>
                  </div>
              </div>
          </div>
      </footer> --}}
      <!-- /.site-footer -->
  </div>
  <!-- /#right-panel -->
  </div>
    <script src="/js/app.js"></script>
    @include('includes.script')
</body>
</html>
