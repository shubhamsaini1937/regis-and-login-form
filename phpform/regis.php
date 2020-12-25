<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <!------ Bootstrap Css ------>
    <?php include 'bootstrapfiles/bootstrapCssfiles.php' ?>

    <!------------------------ custome css ----------------------->
    <link rel="stylesheet" href="regis.css">

</head>

<body>


    <?php

    include '../app/config.php';

    if (isset($_POST['submit'])) {

        $u_fname = mysqli_real_escape_string($con, $_POST["u_fname"]);
        $u_dob = mysqli_real_escape_string($con, $_POST["u_dob"]);
        $u_gender = mysqli_real_escape_string($con, $_POST["u_gender"]);
        $u_mobile = mysqli_real_escape_string($con, $_POST["u_mobile"]);
        $u_address = mysqli_real_escape_string($con, $_POST["u_address"]);
        $u_pcode = mysqli_real_escape_string($con, $_POST["u_pcode"]);
        $u_email = mysqli_real_escape_string($con, $_POST["u_email"]);
        $u_cemail = mysqli_real_escape_string($con, $_POST["u_cemail"]);
        $u_pass = mysqli_real_escape_string($con, $_POST["u_pass"]);
        $u_cpass = mysqli_real_escape_string($con, $_POST["u_cpass"]);
        $u_agree = mysqli_real_escape_string($con, $_POST["u_agree"]);



        $pass = password_hash($u_pass, PASSWORD_BCRYPT);
        $cpass = password_hash($u_cpass, PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15));

        $emailquery = " select * from userregis where user_email='$u_email' ";

        $query = mysqli_query($con, $emailquery);
        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            echo "email already exists";
        } else {
            if ($u_email === $u_cemail) {

                if ($u_pass === $u_cpass) {


                    $insertquery = "insert into userregis (username, user_date_birth, user_gender, user_mobile, user_addr, user_postel, user_email, user_cemail, user_pass, user_cpass, user_agree, token, status) values ('$u_fname', '$u_dob', '$u_gender', '$u_mobile', '$u_address', '$u_pcode', '$u_email', '$u_cemail', '$pass', '$cpass', '$u_agree', '$token', 'inactive')";
                    $iquery = mysqli_query($con, $insertquery);

                    if ($iquery) {

                        $subject = "Email Activation";
                        $body = "";
                        $header = "From: testmailid42@gmail.com";

                        if (mail($u_email, $subject, $body, $header)) {
                            echo "email send";
                        } else {
                            echo "email not send";
                        }
                    } else {
    ?>
                        <script>
                            alert("data failed");
                        </script>
    <?php
                    }
                } else {
                    echo "password are note match";
                }
            } else {
                echo "email not match";
            }
        }
    }



    ?>



    <div class="container">

        <!-- <div class="row">
        <div class="col-md-6"> -->
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form_style my-5 p-5 rounded">
            <div class="text-center bg-regis p-4">

                <h2>Sign Up Form</h2>
            </div>
            <!----------- Row_one----------- -->
            <h4 class="mt-5 pb-2">Personal Information</h4>
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group  col-md-6">
                    <label>Full Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" name="u_fname" placeholder="Your Full Name" autocomplete="off">
                    </div>
                </div>
                <!----------------- form_group----------- -->

                <div class="form-group col-md-6">
                    <label>Date of Birth</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control form-control-lg" name="u_dob" autocomplete="off">
                    </div>
                </div>
            </div>

            <!----------- Row_two----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group  col-md-6">
                    <label>Gender</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">G</span>
                        </div>
                        <select class="form-control form-control-lg inputs" name="u_gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>


                </div>
                <!----------------- form_group----------- -->

                <div class="form-group col-md-6">
                    <label>Mobile No.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <input type="number" class="form-control form-control-lg" name="u_mobile" autocomplete="off" placeholder="Your Mobile Number">
                    </div>
                </div>
            </div>


            <!----------- Row_three----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                        </div>
                        <input type="address" class="form-control form-control-lg" name="u_address" autocomplete="off" placeholder="Your Address">
                    </div>
                </div>
                <!----------------- form_group----------- -->

                <div class="form-group col-md-6">
                    <label>Postel Code</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-code-branch"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" name="u_pcode" autocomplete="off" placeholder="Your Postel Code">
                    </div>
                </div>
            </div>

            <h4 class="mt-5 pb-2">Create Your Login</h4>

            <!----------- Row_four----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-lg" name="u_email" autocomplete="off" placeholder="Your Email">
                    </div>
                </div>
                <!----------------- form_group----------- -->

                <div class="form-group col-md-6">
                    <label>Confirm Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-lg" name="u_cemail" autocomplete="off" placeholder="R-confirm Email">
                    </div>
                </div>
            </div>

            <!----------- Row_five----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" name="u_pass" autocomplete="off" placeholder="Your Password">
                    </div>
                </div>
                <!----------------- form_group----------- -->

                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" name="u_cpass" autocomplete="off" placeholder="R-confirm Password">
                    </div>
                </div>
            </div>

            <!----------- Row_five----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <!-- <div class="form-group col-md-12">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-lg" autocomplete="off" placeholder="Your Password">
                    </div>
                </div> -->

                <div class="form-group col-md-12 mt-3 label">
                    <!-- <div class="form-check "> -->
                        <!-- <input class="form-check-input " type="checkbox" value="" id="invalidCheck1" required>
                        <label class="form-check-label" for="invalidCheck1"> -->
                            <p style="font-weight: 500;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis quod maiores culpa commodi possimus dolores cumque quaerat ea quis mollitia! Repellat esse eos commodi pariatur maiores praesentium magnam rem nobis. Iure aut quos exercitationem totam, molestias tempore sapiente vitae sunt.</p>
                        <!-- </label> -->
                        <!-- <div class="invalid-feedback">
                            You must agree before submitting.
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
            <!----------- Row_six----------- -->
            <div class="form-row">
                <!----------------- form_group----------- -->
                <div class="form-group col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Agree" name="u_agree" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary regis_btns mt-4">Create Profile</button>
            </div>
            <div class="text-center">
                <p class="regis_p mt-4">Already have an account? <a href="login.php">Sign In</a></p>
            </div>
        </form>
    </div>
    <!-- 
    </div>

        


    </div> -->

    <!------ Bootstrap Js ------>

    <?php include 'bootstrapfiles/bootstrapJsfiles.php' ?>

</body>

</html>