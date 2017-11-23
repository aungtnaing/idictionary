<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><h4 style="color:#3fe265;">iDictionary</h4></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li><a href="/home">dashbord</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><span>{{ Auth::user()->name }}</span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('dashboarduserprofile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       

                        @if(Auth::user()->roleid==2 || Auth::user()->roleid==3 || Auth::user()->roleid==4 || Auth::user()->roleid==1)

                        <li>
                            <a href="/home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                             
                        </li>
                        @endif

                        @if(Auth::user()->roleid==1 || Auth::user()->roleid==2)

                       
                              
                        <li>
                            <a href="/userspannel">user manager</a>
                        </li>
                        <li>
                            <a href="/dictionarys">dictionary manager</a>
                        </li>

                        @endif



                       
                      
                       
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>