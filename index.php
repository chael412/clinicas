<?php
include ('includes/header.php');
?>

<div class="container mt-4">
    <div class="row justify-content-center align-items-center">

        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card o-hidden border-0 shadow-md mt-5">
                <div class="card-header" style="background: #ecf0f1">
                    <div class="card-body p-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <img src="./assets/img/menu.png" width="220" height="220">
                            </div>
                            <div class="col-8">
                                <div class="px-4 py-5" style="border: 1px solid #94a3b8">
                                    <div class="text-center">
                                        <h3 class=" mb-4 pt-2" style="color: #064e3b; font-weight: 600"> CLINICA'S</h3>
                                        <hr>
                                    </div>
                                    <hr style="border: 1px solid #94a3b8">
                                    <form id="loginForm" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username"
                                                class="form-control form-control-user" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group"></div>
                                        <button type="button" id="login_btn"
                                            class="btn btn-block btn-user btn-primary">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>

</div>

<?php
include ('includes/scripts.php');
?>