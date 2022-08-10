<?php include "header.php";?>



<div class="container">

    <?php if(isset($_SESSION["message"])): ?>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-12 ">


            <?php if($_SESSION["type"]=="error"):?>
            <div class="alert alert-danger" role="alert">
               <?php echo $_SESSION["message"];?>
            </div>

        <?php elseif($_SESSION["type"]=="success"): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION["message"];?>
                </div>

            <?php endif;?>
        </div>
    </div>
    <?php unset($_SESSION["message"]) ?>

    <?php endif;?>



<div class="card mt-5 centerDiv shadow rounded-3 p-5 border-0 " >

    <form method="post" action="login_process">
        <div class="form-group">

            <input type="text" name="emailOrPhone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email or PhoneNumber" required>

        </div>
        <div class="form-group mt-3">
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary  btn-block mt-3 ">Log In</button>
        </div>

        <div class="text-center mt-2">
            <a href="#" >
                Forgot password?
            </a>
        </div>
        <hr/>
        <div class="text-center">
            <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#exampleModalCenter">Create New Account</button>
        </div>
    </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <b><h4 class="modal-title" id="exampleModalCenterTitle">Sign Up</h4></b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="register" >
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <input type="text" name="username" class="form-control" id="inputEmail4" placeholder="User name*" required>
                                </div>
                                <div class="form-group col-md-6">

                                    <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="name*" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email*" required>
                                </div>
                                <div class="form-group col-md-6">

                                    <input type="text" name="phone" class="form-control" id="inputPassword4" placeholder="Phone number*" required>
                                </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">

                                <input type="password" name="pass" class="form-control" id="inputAddress" placeholder="Password*" required>
                            </div>
                            <div class="form-group col-md-6">

                                <input type="password" name="confirm_pass" class="form-control" id="inputAddress" placeholder="confirm password*" required>
                            </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <input type="text" name="date" class="form-control" id="date_pick" placeholder="Birthday">
                                </div>
                                <div class="form-group col-md-6">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" required>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" >
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>


                                </div>
                            </div>


                            <div class="form-group">

                                <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3" placeholder="Bio"></textarea>
                            </div>


                            <div class="text-center">
                            <button type="submit" class="btn btn-success btn_middle">Sign up</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>










</div>


</div>






<?php include "footer.php";?>
