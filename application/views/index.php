<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <style>
        /* Made with love by Mutiullah Samim*/

        @import url('https://fonts.googleapis.com/css?family=Numans');

        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
        .profile-header {
            transform: translateY(5rem);
        }


        /*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/
        body {
            background: linear-gradient(to right, #47D4E8, #3AD88D);
            min-height: 100vh;
            margin: 0;
        }

        .header {
            background: #f2f2f2;
            padding: 10px;
            text-align: center;
        }

        #navbar {
            overflow: hidden;
            background-color: #333;
            width: 47%;
        }

        #navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        #navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        #navbar a.active {
            background-color: #4CAF50;
            color: white;
        }

        .content {
            padding: 16px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .sticky+.content {
            padding-top: 60px;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="row">
            <div class="col-lg-7 mx-auto text-white text-center pt-5">
                <img src="<?php echo base_url("assets/images/home-logo.png") ?>" style="margin:inherit" width="200px" height="200px">
                <h1 class="display-4">SK MusicoBook</h1>
                <p class="lead mb-0">Best place to meet your  mates</p>
                <p class="lead">Snippet by <a href="https://bootstrapious.com/snippets" class="text-white">
                        <u>Bootstrapious</u></a>
                </p>
            </div>
        </div>
    </div>




    <!-- For demo purpose -->
    <!-- End -->

    <div class="content">
        <div class="row py-5 px-4">
            <div class="col-xl-15 col-md-6 col-sm-10 mx-auto">
                <div id="navbar">
                    <a href="javascript:void(0)">Home</a>
                    <a href="javascript:void(0)">Search</a>
                    <a class="active"href="javascript:void(0)">Profile</a>
                    <a href="javascript:void(0)" style="float:right">Logout</a>
                </div>
                <!-- Profile widget -->

                <div class="bg-white shadow rounded ">
                    <div class="px-4 pt-0 pb-4 bg-dark">
                        <div class="media align-items-end profile-header">
                            <div class="profile mr-3"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/teacher-4.jpg" alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="#" class="btn btn-dark btn-sm btn-block">Edit profile</a></div>
                            <div class="media-body mb-5 text-white">
                                <h4 class="mt-0 mb-0">Manuella Tarly</h4>
                                <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i>San Farcisco</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light p-4 d-flex justify-content-end text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Photos</small>
                            </li>
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Followers</small>
                            </li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h5 class="mb-3">Recent posts</h5>

                        <div class="p-4 bg-light rounded shadow-sm">
                            <a href="www.google.com">
                            <img src="<?php echo base_url("assets/images/home-logo.png") ?>" style="margin:inherit" width="200px" height="200px">
                                <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <ul class="list-inline small text-muted mt-3 mb-0">
                                    <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                    <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                                </ul>
                            </a>
                            <p>Posted by:- Shairam Sritharan</p>
                        </div>
                        <div class="p-4 bg-light rounded shadow-sm">
                            <a href="www.google.com">
                                <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <ul class="list-inline small text-muted mt-3 mb-0">
                                    <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                    <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                                </ul>
                            </a>
                            <p>Posted by:- Shairam Sritharan</p>
                        </div>
                        <div class="p-4 bg-light rounded shadow-sm">
                            <a href="www.google.com">
                                <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <ul class="list-inline small text-muted mt-3 mb-0">
                                    <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                    <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                                </ul>
                            </a>
                            <p>Posted by:- Shairam Sritharan</p>
                        </div>
                        <div class="p-4 bg-light rounded shadow-sm">
                            <a href="www.google.com">
                                <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <ul class="list-inline small text-muted mt-3 mb-0">
                                    <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                    <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                                </ul>
                            </a>
                            <p>Posted by:- Shairam Sritharan</p>
                        </div>
                        <div class="p-4 bg-light rounded shadow-sm">
                            <a href="www.google.com">
                                <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <ul class="list-inline small text-muted mt-3 mb-0">
                                    <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                    <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                                </ul>
                            </a>
                            <p>Posted by:- Shairam Sritharan</p>
                        </div>
                        <div class="p-4 bg-light rounded shadow-sm">
                            <a href="www.google.com">
                                <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <ul class="list-inline small text-muted mt-3 mb-0">
                                    <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                    <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                                </ul>
                            </a>
                            <p>Posted by:- Shairam Sritharan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End profile widget -->

    </div>

    <script>
        
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        navbar.classList.add("sticky");

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
</div>
</body>

</html>