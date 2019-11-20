<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Create a New Post</title>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Assets/CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sk_theme.css" crossorigin="anonymous">

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

    <!-- Main Content Section -->
    <div class="content">
        <div class="row py-5 px-4">
            <div class="col-xl-15 col-md-6 col-sm-10 mx-auto">
                <div id="navbar"> <!-- Nav bar section -->
                    <a href="<?php echo base_url() ?>index.php/welcome/">Home</a>
                    <a href="<?php echo base_url() ?>index.php/welcome/displaySearch">Search</a>
                    <a href=" <?php echo base_url() ?>index.php/welcome/loadPostView">Create Post</a>
                    <a href="<?php echo base_url() ?>index.php/authentication_controller/logoutuser" style="float:right">Logout</a>
                    <a href="<?php echo base_url() ?>index.php/User_controller/loadMemberProfile/<?php echo $this->session->userdata('userdata')["username"] ?>" style="float:right">
                        <img class="round-img" src=<?php echo $this->session->userdata('userdata')["imageURL"] ?> width="28px" height="25px">
                        <?php echo $this->session->userdata('userdata')["username"] ?>
                    </a>
                </div>
                
                <!-- Post creation Section -->
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
                                <textarea rows="4" cols="50" name="description" required></textarea>
                            </div>

                            <div class="form-group" id="image-div">
                                <div id="dynamicInput[0]">
                                    Upload images here (urls:- )<br><input type="text" name="myImages[]">
                                    <input type="button" value="+" onClick="addInput();">
                                </div>
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

    </div>

    <script> // Functions below are used to update the text fields according to multiple no of post images URL
        var counter = 1;
        var dynamicInput = [];

        function addInput() {
            var newdiv = document.createElement('div');
            newdiv.id = dynamicInput[counter];
            newdiv.innerHTML = "Image url -  " + " <br><input type='text' name='myImages[]'> <input type='button' value='-' onClick='removeInput(" + dynamicInput[counter] + ");'>";
            document.getElementById('image-div').appendChild(newdiv);
            counter++;
        }

        function removeInput(id) {
            var elem = document.getElementById(id);
            return elem.parentNode.removeChild(elem);
        }
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