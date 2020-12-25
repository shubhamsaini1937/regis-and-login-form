<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>

    <!------ Bootstrap Css ------>
    <?php include 'bootstrapfiles/bootstrapCssfiles.php' ?>

    <!------------------------ custome css ----------------------->
    <link rel="stylesheet" href="regis.css">

</head>

<body>


    <?php

    include '../app/config.php';

    if (isset($_POST['submit'])) {


        $u_email = $_POST["u_email"];
        $u_pass = $_POST["u_pass"];


        $email_query = " select * from userregis where user_email='$u_email' ";

        $query = mysqli_query($con, $email_query);
        $email_count = mysqli_num_rows($query);

        if ($email_count) {

            $email_pass = mysqli_fetch_assoc($query);

            $check_pass = $email_pass["user_pass"];

            $_SESSION["username"] = $email_pass["username"];

            $pass_decode = password_verify($u_pass, $check_pass);

            if ($pass_decode) {
                echo "login successfull";
    ?>

                <script>
                    location.replace("userdashboard.php");
                </script>

    <?php
            } else {
                echo "password incorect";
            }
        } else {
            echo "invelid email";
        }
    }



    ?>



    <div class="container">

        <!-- <div class="row">
        <div class="col-md-6"> -->
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form_style  my-5 mx-auto py-5 px-4 rounded" style="max-width:32rem; width:100%;  ">
            <div class="text-center bg-regis p-4">

                <h2>Sign In Form</h2>
            </div>
            <!----------- Row_one----------- -->
            <div class="form-row mt-5">
                <!----------------- form_group----------- -->
                <div class="form-group col-md-12">
                    <label>Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-lg" name="u_email" autocomplete="off" placeholder="Your Email">
                    </div>
                </div>
            </div>

            <!----------- Row_two----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group col-md-12">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" name="u_pass" autocomplete="off" placeholder="Your Password">
                    </div>
                </div>
            </div>


            <!----------- Row_three----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Agree" name="" id="invalidCheck2">
                        <label class="form-check-label" for="invalidCheck2">
                            Remember Me
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary regis_btns mt-4">Sign In</button>
            </div>
            <div class="text-center">
                <p class="regis_p mt-4">You Don't have an account? <a href="regis.php">Sign Up</a></p>
            </div>
        </form>
        <!-- </div> -->

        <!-- </div> -->




    </div>

    <!------ Bootstrap Js ------>

    <?php include 'bootstrapfiles/bootstrapJsfiles.php' ?>

</body>

</html>