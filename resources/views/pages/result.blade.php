<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDictionary</title>
  <link rel="stylesheet" href="<?php echo url(); ?>/node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo url(); ?>/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="<?php echo url(); ?>/css/style.css"/>
  <link rel="shortcut icon" href="<?php echo url(); ?>/images/favicon.png"/>
</head>
<body>
  <div class=" container-scroller">
    <!--Navbar-->
    <nav class="navbar bg-primary-gradient col-lg-12 col-12 p-0 fixed-top navbar-inverse d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="#"><img src="images/logo_star_black.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo_star_mini.jpg" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler hidden-md-down align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form action="{{ url('/searchs') }}" class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2 search" name="qtext" type="text" placeholder="Search" value="{{ $dictionary->qtext }}">

          <input class="btn btn-primary" type="submit" value="Search"> 
        </form>
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">
            <a class="nav-link profile-pic" href="{{ url('/auth/login') }}">login</a>
          </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-th"></i></a>
                      </li> -->
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right hidden-lg-up align-self-center" type="button" data-toggle="offcanvas">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  </div>
                </nav>
                <!--End navbar-->
                <div class="container-fluid">
                  <div class="row row-offcanvas row-offcanvas-right">
                    <nav class="bg-white sidebar sidebar-fixed sidebar-offcanvas" id="sidebar">
                      <div class="user-info">
                        <img src="images/face.jpg" alt="">
                        <p class="name">Thazin Myint Oo</p>
                        <p class="designation">Developer</p>
                        <span class="online"></span>
                      </div>

                    </nav>
                    <!-- SIDEBAR ENDS -->



                    <div class="content-wrapper">

                      <!-- <h3 class="text-primary mb-4">{{ $dictionary->qtext }}</h3> -->
                      <div class="row mb-2">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-block">
                             <!--  <h5 class="card-title mb-4">Basic form elements</h5> -->
                             <form class="forms-sample">

                              <div class="form-control">
                                <img src="{{ $dictionary->photourl1 }}">
                              </div>

                              <div class="form-control">
                                <audio controls>
                                  <!-- <source src="horse.ogg" type="audio/ogg"> -->

                                  <source src="{{ $dictionary->photourl2 }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                  </audio>
                              </div>
                                 
                               

                                <div class="form-group">
                                  <!-- <label for="exampleTextarea">Example textarea</label> -->
                                  <textarea class="form-control p-input" id="exampleTextarea" rows="15" readonly>{{ $dictionary->atext }}</textarea>
                                </div>

                                

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <footer class="footer">
                      <div class="container-fluid clearfix">
                        <span class="float-right">
                          <a href="#">idictionary</a> &copy; 2017
                        </span>
                      </div>
                    </footer>
                  </div>
                </div>

              </div>

              <script src="<?php echo url(); ?>/node_modules/jquery/dist/jquery.min.js"></script>
              <script src="<?php echo url(); ?>/node_modules/tether/dist/js/tether.min.js"></script>
              <script src="<?php echo url(); ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
              <script src="<?php echo url(); ?>/node_modules/chart.js/dist/Chart.min.js"></script>
              <script src="<?php echo url(); ?>/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>

              <script src="<?php echo url(); ?>/js/off-canvas.js"></script>
              <script src="<?php echo url(); ?>/js/hoverable-collapse.js"></script>
              <script src="<?php echo url(); ?>/js/misc.js"></script>
              <script src="<?php echo url(); ?>/js/chart.js"></script>
              <script src="<?php echo url(); ?>/js/maps.js"></script>
            </body>
            </html>