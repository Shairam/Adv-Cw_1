<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->session->userdata('userdata')["firstname"] . " " . $this->session->userdata('userdata')["lastname"] ?></title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
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
            background: #f2f2f2;
            background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
        }

        .header {
            background: linear-gradient(to right, #f2f2f2, #3AD88D);
            padding: 10px;
            text-align: center;
            text: #3AD88D
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

        .headTitle {
            font-family: 'Sofia';
        }

        .round-img {
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="row">
            <div class="col-lg-7 mx-auto text-blue text-center pt-5">
                <img src="<?php echo base_url("assets/images/home-logo.png") ?>" style="margin:inherit" width="200px" height="200px">
                <h1 class="display-4 headTitle">SK MusicoBook</h1>
                <p class="lead mb-0">Best place to meet your mates</p>
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
                    <a href="<?php echo base_url() ?>index.php/welcome/">Home</a>
                    <a href="<?php echo base_url() ?>index.php/welcome/testView">Search</a>
                    <a href=" <?php echo base_url() ?>index.php/welcome/loadPostView">Create Post</a>
                    <a href="<?php echo base_url() ?>index.php/authentication_controller/logoutuser" style="float:right">Logout</a>
                    <a href="<?php echo base_url() ?>index.php/welcome/loadProfile" style="float:right"><img class="round-img" src=<?php echo $this->session->userdata('userdata')["imageURL"] ?> width="28px" height="25px">
                        <?php echo $this->session->userdata('userdata')["username"] ?>
                    </a>
                </div>
                <!-- Profile widget -->

                <div class="bg-white shadow rounded ">


                    <div class="py-4">
                        <h5 class="mb-3 headTitle" style="text-align:center">Recent posts</h5>

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
                            <hr />
                        </div>

                        <?php
                        foreach ($allPosts as $postItem) {

                            echo " <div class=\"p-4 bg-light rounded shadow-sm\">";
                            echo "<img class=\"round-img\" src=" . $postItem["imageURL"] . " style=\"margin:inherit\" width=\"50px\" height=\"50px\">";
                            echo "<span><h4 class=\"headTitle\">" . $postItem["createdBy"] . "</h4></span>";
                            echo "<img src=" . base_url("assets/images/home-logo.png") . " style=\"margin:inherit\" width=\"200px\" height=\"200px\"><br/>";
                            echo "<h5>" . $postItem["title"] . "</h5>";
                            echo "<p class=\"font-italic mb-0\">" .  replaceLinks($postItem["description"]) . "</p>";
                            echo " <li class=\"list-inline-item\"><i class\"fa fa-heart-o mr-\"></i>" . $postItem["createdOn"] . "</li>";
                            echo "</hr>";
                            echo "<hr/>";
                            echo "</div>";
                        }

                        function replaceLinks($text)
                        {
                            echo preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.%-=#]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
                        }

                        ?>
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