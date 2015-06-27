<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Your Name Here - Welcome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Html5TemplatesDreamweaver.com">
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- Remove this Robots Meta Tag, to allow indexing of site -->

        <link rel="stylesheet" href="{{ URL::asset('/scripts/bootstrap/css/bootstrap.min.css') }}">


        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Icons -->
        <link href="{{ URL::asset('scripts/icons/general/stylesheets/general_foundicons.css')}}" media="screen" rel="stylesheet" type="text/css" />  
        <link href="{{ URL::asset('scripts/icons/social/stylesheets/social_foundicons.css')}}" media="screen" rel="stylesheet" type="text/css" />
        <!--[if lt IE 8]>
            <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
            <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
        <![endif]-->
        <link rel="stylesheet" href="{{ URL::asset('scripts/fontawesome/css/font-awesome.min.css')}}">
        <!--[if IE 7]>
            <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
        <![endif]-->

        <link href="{{ URL::asset('scripts/carousel/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('scripts/camera/css/camera.css')}}" rel="stylesheet" type="text/css" />

        <link href="http://fonts.googleapis.com/css?family=Syncopate" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">

        <link href="{{ URL::asset('styles/custom.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body id="pageBody">

        <div id="divBoxed" class="container">

            <div class="transparent-bg" style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: -1;zoom: 1;"></div>

            <div class="divPanel notop nobottom">
                <div class="row-fluid">
                    <div class="span12">

                        <div id="divLogo" class="pull-left">
                            <a href="index.html" id="divSiteTitle">Your Name</a><br />
                            <a href="index.html" id="divTagLine">Your Tag Line Here</a>
                        </div>

                        <div id="divMenuRight" class="pull-right">
                            <div class="navbar">
                                <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                    NAVIGATION <span class="icon-chevron-down icon-white"></span>
                                </button>
                                <div class="nav-collapse collapse">
                                    <ul class="nav nav-pills ddmenu">
                                        <li class="active"><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li class="dropdown">
                                            <a href="page.html" class="dropdown-toggle">Page <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="full.html">Full Page</a></li>
                                                <li><a href="2-column.html">Two Column</a></li>
                                                <li><a href="3-column.html">Three Column</a></li>
                                                <li><a href="../documentation/index.html">Documentation</a></li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle">Dropdown Item &nbsp;&raquo;</a>
                                                    <ul class="dropdown-menu sub-menu">
                                                        <li><a href="#">Dropdown Item</a></li>
                                                        <li><a href="#">Dropdown Item</a></li>
                                                        <li><a href="#">Dropdown Item</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">

                        <div id="headerSeparator"></div>

                        <div class="camera_full_width">
                            @yield('content')
                            <br style="clear:both"/><div style="margin-bottom:40px"></div>
                        </div>               

                        <div id="headerSeparator2"></div>

                    </div>
                </div>
            </div>

            <div class="contentArea">

                <div class="divPanel notop page-content">


                    <div class="row-fluid">
                        <!--Edit Main Content Area here-->
                        <div class="span12" id="divMain">
                            <h1>Welcome</h1>

                            <p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</strong> Sed ipsum metus, pulvinar sed volutpat sit amet, fermentum in orci. Quisque vitae neque lectus, quis accumsan massa. Vivamus viverra orci eu dolor tristique sollicitudin. Duis sollicitudin laoreet tellus ac dictum. 
                                Fusce suscipit lectus vel elit posuere volutpat. Morbi ornare eros ut magna ullamcorper feugiat. 
                                Vivamus feugiat ligula vel nisi venenatis eleifend. Morbi accumsan rhoncus viverra. Integer orci nisi, 
                                cursus sit amet luctus quis, dictum eget massa.</p>

                            <br />                   
                            <br />                 

                            <div class="row-fluid">
                                <div class="span3">
                                    <div class="box">
                                        <i class="icon-wrench"></i>
                                        <h4 class="title">Web Design</h4> <hr/>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </p>
                                    </div>
                                </div> 

                                <div class="span3">
                                    <div class="box">
                                        <i class="icon-leaf"></i>
                                        <h4 class="title">Web Development</h4> <hr/>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </p>
                                    </div>
                                </div> 

                                <div class="span3">
                                    <div class="box">
                                        <i class="icon-edit"></i>
                                        <h4 class="title">Custom Themes</h4> <hr/>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </p>
                                    </div>
                                </div> 

                                <div class="span3">
                                    <div class="box">
                                        <i class="icon-signal"></i>
                                        <h4 class="title">SEO</h4> <hr/>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus, sapien nec dignissim porta.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </p>
                                    </div>
                                </div>    </div>


                            <div class="row-fluid">
                                <div class="span3">
                                    <h5 class="text-info">Project 1</h5>
                                    <img src="{{ URL::asset('images/home-image.jpg') }}" class="img-polaroid" style="margin:5px 0px 15px;" alt="">                
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /><a href="#">Read More &raquo;</a></p>
                                </div>
                                <div class="span3">                
                                    <h5 class="text-info">Project 2</h5>
                                    <img src="{{ URL::asset('images/home-image.jpg') }}" class="img-polaroid" style="margin:5px 0px 15px;" alt="">  
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /><a href="#">Read More &raquo;</a></p>
                                </div>
                                <div class="span3">                
                                    <h5 class="text-info">Project 3</h5>
                                    <img src="{{ URL::asset('images/home-image.jpg')}}" class="img-polaroid" style="margin:5px 0px 15px;" alt="">  
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /><a href="#">Read More &raquo;</a></p>
                                </div>
                                <div class="span3">
                                    <h5 class="text-info">Project 4</h5>
                                    <img src="{{ URL::asset('images/home-image.jpg')}}" class="img-polaroid" style="margin:5px 0px 15px;" alt="">                
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br /><a href="#">Read More &raquo;</a></p>
                                </div>
                            </div>  

                        </div>
                        <!--End Main Content-->
                    </div>

                    <div id="footerInnerSeparator"></div>
                </div>
            </div>

            <div id="footerOuterSeparator"></div>

            <div id="divFooter" class="footerArea">

                <div class="divPanel">

                    <div class="row-fluid">
                        <div class="span3" id="footerArea1">

                            <h3>About Company</h3>

                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.</p>

                            <p> 
                                <a href="#" title="Terms of Use">Terms of Use</a><br />
                                <a href="#" title="Privacy Policy">Privacy Policy</a><br />
                                <a href="#" title="FAQ">FAQ</a><br />
                                <a href="#" title="Sitemap">Sitemap</a>
                            </p>

                        </div>
                        <div class="span3" id="footerArea2">

                            <h3>Recent Blog Posts</h3> 
                            <p>
                                <a href="#" title="">Lorem Ipsum is simply dummy text</a><br />
                                <span style="text-transform:none;">2 hours ago</span>
                            </p>
                            <p>
                                <a href="#" title="">Duis mollis, est non commodo luctus</a><br />
                                <span style="text-transform:none;">5 hours ago</span>
                            </p>
                            <p>
                                <a href="#" title="">Maecenas sed diam eget risus varius</a><br />
                                <span style="text-transform:none;">19 hours ago</span>
                            </p>
                            <p>
                                <a href="#" title="">VIEW ALL POSTS</a>
                            </p>

                        </div>
                        <div class="span3" id="footerArea3">

                            <h3>Sample Content</h3> 
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s. 
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.
                            </p>

                        </div>
                        <div class="span3" id="footerArea4">

                            <h3>Get in Touch</h3>  

                            <ul id="contact-info">
                                <li>                                    
                                    <i class="general foundicon-phone icon"></i>
                                    <span class="field">Phone:</span>
                                    <br />
                                    (123) 456 7890 / 456 7891                                                                      
                                </li>
                                <li>
                                    <i class="general foundicon-mail icon"></i>
                                    <span class="field">Email:</span>
                                    <br />
                                    <a href="mailto:info@yourdomain.com" title="Email">info@yourdomain.com</a>
                                </li>
                                <li>
                                    <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                                    <span class="field">Address:</span>
                                    <br />
                                    123 Street<br />
                                    12345 City, State<br />
                                    Country
                                </li>
                            </ul>

                        </div>
                    </div>

                    <br /><br />
                    <div class="row-fluid">
                        <div class="span12">
                            <p class="copyright">
                                Copyright © 2013 Your Company. All Rights Reserved.
                            </p>

                            <p class="social_bookmarks">
                                <a href="#"><i class="social foundicon-facebook"></i> Facebook</a>
                                <a href=""><i class="social foundicon-twitter"></i> Twitter</a>
                                <a href="#"><i class="social foundicon-pinterest"></i> Pinterest</a>
                                <a href="#"><i class="social foundicon-rss"></i> Rss</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br /><br /><br />

        <script src="scripts/jquery.min.js" type="text/javascript"></script> 
        <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/default.js" type="text/javascript"></script>


        <script src="scripts/carousel/jquery.carouFredSel-6.2.0-packed.js" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({responsive: true, width: '100%', scroll: 2, items: {width: 320, visible: {min: 2, max: 6}}});</script><script src="scripts/camera/scripts/camera.min.js" type="text/javascript"></script>
        <script src="scripts/easing/jquery.easing.1.3.js" type="text/javascript"></script>
        <script type="text/javascript">function startCamera() {
    $('#camera_wrap').camera({fx: 'scrollLeft', time: 2000, loader: 'none', playPause: false, navigation: true, height: '35%', pagination: true});
}
$(function () {
    startCamera()
});</script>


    </body>
</html>