<?php require_once 'php_files/header.php'; ?>

<?php

// if(isset($_SESSION['USER'])){
//     header("location: dashboard.php");
// }

?>


<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background: url('img/DDO.png') no-repeat center; background-size: 400px 300px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registration</h1>
                                    </div>
                                    <?php register();display_message();?>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text"  class="form-control form-control-user"
                                                name="fullname" aria-describedby="userHelp" required 
                                                placeholder="Enter Full Name" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control form-control-user"
                                                name="username" aria-describedby="userHelp" required 
                                                placeholder="Enter Username" >
                                        </div>
                                        <div class="form-group">
                                            <input type="email"  class="form-control form-control-user"
                                                name="email" aria-describedby="userHelp" required 
                                                placeholder="Enter Email" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control form-control-user"
                                                name="address" aria-describedby="userHelp" required 
                                                placeholder="Enter Full Address" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxlength="11"  class="form-control form-control-user"
                                                name="number" aria-describedby="userHelp" required 
                                                placeholder="Enter Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="password"  class="form-control form-control-user" required 
                                                name="password_tmp" placeholder="Enter Password" >
                                        </div>
                                        <div class="form-group">
                                            <input type="password"  class="form-control form-control-user" required 
                                                name="password" placeholder="Confirm Password" >
                                        </div>
                                       
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-user btn-block" name="btn_register">
                                                Sign up
                                            </button>   
                                        </div>
                                        
                                        <div class="form-group">                                   
                                              <a href="user_login.php" style="font-size: 15px;"><label>Login here!</label></a>
                                        </div>
                                       
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>




<?php require_once 'php_files/footer.php' ?>