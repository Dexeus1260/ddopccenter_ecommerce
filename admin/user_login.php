<?php require_once 'php_files/header.php'; 

if(isset($_SESSION['USER'])){
    header("location: dashboard.php");
}

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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Admin!</h1>
                                    </div>
                                    <?php login();display_message();?>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text"  class="form-control form-control-user"
                                                name="username" aria-describedby="userHelp" required 
                                                placeholder="Enter Username" >
                                        </div>
                                        <div class="form-group">
                                            <input type="password"  class="form-control form-control-user" required 
                                                name="password" placeholder="Password" >
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="btn_Ulogin">
                                            Login
                                        </button>
                                       
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