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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sk_theme.css" crossorigin="anonymous">

    <!--Custom styles-->
    <style>
        body {
            background: linear-gradient(to right, #f2f2f2, #3AD88D);
            min-height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="row">
            <div class="col-lg-7 mx-auto text-blue text-center pt-5">
                <img src="<?php echo base_url("assets/images/home-logo.png") ?>" style="margin:inherit" width="200px" height="200px">
                <h1 class="display-4 font-sh-1">SK MusicoBook</h1>
                <p class="lead mb-0">Best place to meet your Music mates</p>
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
                    <a href="<?php echo base_url() ?>index.php/welcome/displaySearch">Search</a>
                    <a href=" <?php echo base_url() ?>index.php/welcome/loadPostView">Create Post</a>
                    <a href="<?php echo base_url() ?>index.php/authentication_controller/logoutuser" style="float:right">Logout</a>
                    <a href="<?php echo base_url() ?>index.php/User_controller/loadMemberProfile/<?php echo $this->session->userdata('userdata')["username"] ?>" style="float:right">
                        <img class="round-img" src=<?php echo $this->session->userdata('userdata')["imageURL"] ?> width="28px" height="25px">
                        <?php echo $this->session->userdata('userdata')["username"] ?>
                    </a>
                </div>
                <!-- Profile widget -->

                <div class="bg-white shadow rounded brder">
                    <div class="py-4">
                        <h5 class="mb-3 font-sh-1" style="text-align:center">Recent posts on ya MusicLine <i class="fa fa-music" aria-hidden="true"></i>
                        </h5>

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

                            if (count($postItem["ImageLists"]) > 0) {

                                echo " <div id=\"slide\">";
                                foreach ($postItem["ImageLists"] as $imageLink) {
                                    echo "<img src=\" " . $imageLink["imageURL"] . "\" class=\"postImages\">";
                                }
                                echo "</div>";
                            }

                            echo "<h5 class=\"font-sh-1\">" . $postItem["title"] . "</h5>";
                            echo "<p class=\"post-text\">" . replaceLinks($postItem["description"]) . "</p>";
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