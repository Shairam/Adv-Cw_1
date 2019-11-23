<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->session->userdata('userdata')["firstname"] . " " . $this->session->userdata('userdata')["lastname"] ?></title>
    <!--Made with love by ShaI  -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sk_theme.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/profile.css" crossorigin="anonymous">

    <!--Custom styles-->
    <style>
        body {
            background: linear-gradient(to right, #f2f2f2, #3AD88D);
            min-height: 100vh;
            margin: 0;
        }

        .post-item {
            width: 80%;
            margin: 0 auto;
            text-align: center;
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

                <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
                    <a class="navbar-brand font-sh-1" style="font-size: 15px;" href="<?php echo base_url() ?>index.php/">SK MusicoBook</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>index.php/welcome/displaySearch">Search</a> </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" <?php echo base_url() ?>index.php/welcome/loadPostView">Create Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url() ?>index.php/User_controller/loadMemberProfile/<?php echo $this->session->userdata('userdata')["username"] ?>">
                                    <img class="round-img" src=<?php echo $this->session->userdata('userdata')["imageURL"] ?> width="28px" height="25px">
                                    <?php echo $this->session->userdata('userdata')["username"] ?>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?php echo base_url() ?>index.php/authentication_controller/logoutuser">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>


                <div class="bg-white shadow rounded ">
                    <div class="px-4 pt-0 pb-4" style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20190223/ourmid/pngtree-atmospheric-fashion-black-music-festival-background-backgroundmusic-festival-backgroundmicrophonesingsingingdjdjingstarry-image_73625.jpg');">
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
                    <!-- Profile widget -->
                    <div class="bg-white rounded brder">
                        <div style="height:8.5%;" class="post-item bg-white">

                            <!-- Post creation Section -->
                            <h1 class="font-sh-1">Create post</h1>

                            <form action="<?php echo base_url() ?>index.php/Post_controller/createPost" method="POST">

                                <div>
                                    <label for="title">Title <span class="require">*</span></label>
                                    <input type="text" size="30" name="title" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label for="description">Description <span class="require">*</span></label><br />
                                    <textarea rows="4" name="description" required></textarea>
                                </div>

                                <div class="form-group">
                                    <p><span class="require">*</span> - required fields</p>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                    <button class="btn btn-default" href=>
                                        Back
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded brder">
                        <div class="py-4">
                            <h5 class="mb-3 font-sh-1" style="text-align:center" id="postsView">Recent posts on youa MusicLine <i class="fa fa-music" aria-hidden="true"></i>
                            </h5>
                            <?php // Display list of User posts
                            foreach ($allPosts as $postItem) {
                                echo " <div class=\"p-4 bg-light rounded shadow-sm post-item\">";
                                echo "<img class=\"round-img\" src=" . $postItem["imageURL"] . " style=\"margin:inherit\" width=\"35px\" height=\"35px\">";
                                echo "<h4 class=\"headTitle\">" . $postItem["createdBy"] . "</h4>";
                                echo " <p style=\"font-size:0.8rem;\">" . $postItem["createdOn"] . "</p>";

                                if (count($postItem["ImageLists"]) > 0) {
                                    echo " <div id=\"slide\">";
                                    foreach ($postItem["ImageLists"] as $imageLink) {
                                        echo "<img src=\" " . $imageLink . "\" class=\"postImages\">";
                                    }
                                    echo "</div><hr/>";
                                }
                                echo "<h4 class=\"font-sh-1\">" . $postItem["title"] . "</h4>";
                                echo "<p class=\"post-text\">" . replaceLinks($postItem["description"]) . "</p>";
                                echo "<hr/>";
                                echo "</div>";
                            }

                            //Below function will replace any links in post description with anchor tag (Discussed with Simon)
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
                if (window.pageYOffset >= sticky) {} else {
                    navbar.classList.remove("sticky");
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </div>
</body>

</html>