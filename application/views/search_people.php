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

        .multiselect {
            width: 200px;
        }

        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
            font-weight: bold;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
            border: 1px #dadada solid;
        }

        #checkboxes label {
            display: block;
        }

        #checkboxes label:hover {
            background-color: #1e90ff;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="row">
            <div class="col-lg-7 mx-auto text-blue text-center pt-5">
                <img src="<?php echo base_url("assets/images/home-logo.png") ?>" style="margin:inherit" width="200px" height="200px">
                <h1 class="display-4">SK MusicoBook</h1>
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
                    <a href="javascript:void(0)">Home</a>
                    <a href="<?php echo base_url() ?>index.php/welcome/testView"">Search</a>
                    <a href=" <?php echo base_url() ?>index.php/welcome/loadPostView">Create Post</a> <a href="<?php echo base_url() ?>index.php/welcome/loadProfile">Profile</a>
                    <a href="<?php echo base_url() ?>index.php/authentication_controller/logoutuser" style="float:right">Logout</a>
                </div>
                <!-- Profile widget -->

                <div class="bg-white shadow rounded py-5 px-4">
                    <form class="form-inline md-form mr-auto mb-4" action="<?php echo site_url() ?>/welcome/testSearch" method="post">
                        <div class="input-group form-group">
                            <div class="multiselect">
                                <div class="selectBox" onclick="showCheckboxes()" style="padding:10px">
                                    <select>
                                        <option>Search By Genres</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="checkboxes" class="genre-content">
                                    <?php
                                    foreach ($genreList as $row) {
                                        echo "<label>
									<input type=\"checkbox\"  name=\"genreSearchList[]\" value=" . $row["genre_id"] . ">" . $row["name"] . "</label>";
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>
                        <input type="submit" class="btn btn-outline-success btn-rounded waves-effect" value="Search">
                    </form>
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="https://avatars3.githubusercontent.com/u/32301407?s=460&v=4" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="https://avatars3.githubusercontent.com/u/32301407?s=460&v=4" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="https://avatars3.githubusercontent.com/u/32301407?s=460&v=4" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
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