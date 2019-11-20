<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->session->userdata('userdata')["firstname"] . " " . $this->session->userdata('userdata')["lastname"] ?></title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Assest/css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sk_theme.css" crossorigin="anonymous">

    <!--Custom styles-->
    <style>
        body {
            background: linear-gradient(to right, #f2f2f2, #3AD88D);
            min-height: 100vh;
            margin: 0;
        }

        .FixedHeightContainer {

            height: 45600px0px;
            width: 800px;
            padding: 3px;

        }

        .Content {
            height: 600px;
            overflow: auto;
            background: #fff;
        }

        .card {
            min-width: 200px;
            max-width: 200px;
        }

        .card-img-top {
            height: 180px;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
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

    <!-- Main contents Section -->
    <div class="content">
        <div class="row py-5 px-4">
            <div class="col-xl-15 col-md-6 col-sm-10 mx-auto">
                <div id="navbar"> <!-- Navigation Bar Section -->
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

                <div class="bg-white shadow rounded py-5 px-4">
                    <?php 
                    $followDisplayBtnTxt = "Follow";
                     if($membersType ==  $this->config->item('membersTypes')[0]){
                         echo "<h3 class=\"font-sh-1\"> Here are your Friends</h3>";
                     } 
                     if($membersType ==  $this->config->item('membersTypes')[1]){
                         echo "<h3 class=\"font-sh-1\"> Here are your Followings</h3>";
                     }
                     if($membersType ==  $this->config->item('membersTypes')[2]){
                         echo "<h3 class=\"font-sh-1\"> Here are your Followers</h3>";
                         $followDisplayBtnTxt = "Follow Back";
                     }
                    ?>
                    <div class="FixedHeightContainer">
                        <div class="Content" style="padding:20px">
                            <div class="card-deck">
                                <?php //Display list of users
                                if (!empty($friendsList)) {
                                    
                                    foreach ($friendsList as $user) {
                                        if ($user["username"] == $this->session->userdata('userdata')["username"]) {
                                            continue;
                                        }
                                        echo "<div class=\"card\">";
                                        echo "<img class=\"card-img-top\" src=" . $user["imageURL"] . " alt=\"Card image cap\">";
                                        echo " <div class=\"card-body\">
                                            <h5 class=\"card-title\">" . $user["username"] . "</h5>
                                            <a class=\"card-text\" href=\"" . base_url("index.php/User_controller/loadMemberProfile/$user[username]") . "\">
                                            Show Profile
                                            </a>";
                                        if (!$user["isFollowed"]) {
                                            echo  "<a  href=\"" . base_url("index.php/User_controller/startFollowing/0/$user[username]") . "\">
                                                <button class=\"btn btn-success btn-sm btn-block\">
                                                $followDisplayBtnTxt
                                                </button>
                                            </a>";
                                        } else {
                                            echo  "<a  href=\"" . base_url("index.php/User_controller/stopFollowing/0/$user[username]") . "\">
                                            <button class=\"btn btn-danger btn-sm btn-block\">
                                                Unfollow
                                            </button>
                                        </a>";
                                        }

                                        echo "</div></div>";
                                    }
                                } else {
                                    echo "Sorry no users found <img src=http://clipart-library.com/images/pcodBaxqi.png width=\"100px\" height=\"100px\">";
                                }
                                ?>
                            </div>
                        </div>
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
    <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>
</html>