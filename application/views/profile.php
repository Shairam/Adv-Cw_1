<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->session->userdata('userdata')["firstname"] . " " . $this->session->userdata('userdata')["lastname"] ?></title>
    
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

    <!--Assest/css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/profile.css" crossorigin="anonymous">
</head>

<body>
<!-- Header Section -->
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

    <!-- Main contents Section -->
    <div class="content">
        <div class="row py-5 px-4">
            <div class="col-xl-15 col-md-6 col-sm-10 mx-auto">
            <div id="navbar"> <!-- Navigation bar Section -->
                    <a href="<?php echo base_url() ?>index.php/welcome/">Home</a>
                    <a href="<?php echo base_url() ?>index.php/welcome/displaySearch">Search</a>
                    <a href=" <?php echo base_url() ?>index.php/welcome/loadPostView">Create Post</a>
                    <a href="<?php echo base_url() ?>index.php/authentication_controller/logoutuser" style="float:right">Logout</a>
                    <a href="<?php echo base_url() ?>index.php/User_controller/loadMemberProfile/<?php echo $this->session->userdata('userdata')["username"] ?>" style="float:right">
                        <img class="round-img" src=<?php echo $this->session->userdata('userdata')["imageURL"] ?> width="28px" height="25px">
                        <?php echo $this->session->userdata('userdata')["username"] ?>
                    </a>
                </div>

                <div class="bg-white shadow rounded ">
                <div class="px-4 pt-0 pb-4" style="background-image: url('https://i.ytimg.com/vi/kVGXAfzVIkE/maxresdefault.jpg');" >
                        <div class="media align-items-end profile-header">
                            <div class="profile mr-3"><img src="<?php echo $this->session->userdata('userdata')["imageURL"] ?>" alt="..." width="130" class="rounded mb-2 img-thumbnail"></div>
                            <div class="media-body mb-5 text-white">
                                <h4 class="mt-0 mb-0"><?php echo $this->session->userdata('userdata')["firstname"] . " " . $this->session->userdata('userdata')["lastname"] ?></h4>
                                <p class="small mb-4"> <i class="fa fa-music mr-2"></i><?php echo  "Interested in " . $memberGenres ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light p-4 d-flex justify-content-end text-center">
                        <ul class="list-inline mb-0">
                        <a href="#postsView">
                            <li class="list-inline-item">
                                <h5 class="font-weight-bold mb-0 d-block"><?php echo count($memberPosts); ?></h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Posts</small>
                            </li>
                        </a>
                            <li class="list-inline-item">
                            <a href="<?php echo base_url() ?>index.php/User_controller/getFollowers">
                                <h5 class="font-weight-bold mb-0 d-block"><?php echo $memberFollowDetails["Followers"]; ?></h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Followers</small>
                            </a>
                            </li>
                            <li class="list-inline-item">
                            <a href="<?php echo base_url() ?>index.php/User_controller/getFollowings">
                                <h5 class="font-weight-bold mb-0 d-block"><?php echo $memberFollowDetails["Following"]; ?></h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Following</small>
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?php echo base_url() ?>index.php/User_controller/getFriends">
                                <h5 class="font-weight-bold mb-0 d-block"><?php echo $friendsCount; ?></h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Friends</small>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h5 id="postsView" class="mb-3 font-sh-1" style="text-align:center">Recent posts</h5>

                        <?php // Display list of Logged in user's posts
                        foreach ($memberPosts as $postItem) {
                            echo " <div class=\"p-4 bg-light rounded shadow-sm post-item\">";
                            echo "<img class=\"round-img\" src=" . $memberInfo["imageURL"] . " style=\"margin:inherit\" width=\"50px\" height=\"50px\">";
                            echo "<h4 class=\"headTitle\">" . $postItem["createdBy"] . "</h4>";
                            echo " <p style=\"font-size:0.8rem;\">" . $postItem["createdOn"] . "</p>";
                            if (count($postItem["ImageLists"]) > 0) {
                                echo " <div id=\"slide\">";
                                foreach ($postItem["ImageLists"] as $imageLink) {
                                    echo "<img src=\" " . $imageLink . "\" class=\"postImages\">";
                                }
                                echo "</div>";
                            }
                            echo "<h5 class=\"font-sh-1\">" . $postItem["title"] . "</h5>";
                            echo "<p class=\"post-text\">" . replaceLinks($postItem["description"]) . "</p>";
                            echo "</hr>";
                            echo "<hr/>";
                            echo "</div>";
                        }
                        //Below function will replace any links in post description with anchor tag
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

    <script>//Holds Nav bar on top
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