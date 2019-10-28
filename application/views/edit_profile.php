
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<style>

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
    background: #654ea3;
    background: linear-gradient(to right,#47D4E8, #3AD88D);
    min-height: 100vh;
}

	</style>
</head>
<body>
<!-- For demo purpose -->
<div class="row">
    <div class="col-lg-7 mx-auto text-white text-center pt-5">
    <img  src="<?php echo base_url("assets/images/home-logo.png")?>" style="margin:inherit" width="200px" height="200px">   
        <h1 class="display-4">SK MusicoBook</h1>
        <p class="lead mb-0">Easily create a profile widget using bootstrap 4.</p>
        <p class="lead">Snippet by <a href="https://bootstrapious.com/snippets" class="text-white">
            <u>Bootstrapious</u></a>
        </p>
    </div>
</div><!-- End -->


<div class="row py-5 px-4">
    <div class="col-xl-15 col-md-6 col-sm-10 mx-auto">

        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
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
                    <a href="www.google.com">
                    <div class="p-4 bg-light rounded shadow-sm">
                        <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <ul class="list-inline small text-muted mt-3 mb-0">
                            <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                            <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                        </ul>
                    </div>
                    </a>
                </div>
            </div>
        </div><!-- End profile widget -->

    </div>
</div>

</body>
</html>