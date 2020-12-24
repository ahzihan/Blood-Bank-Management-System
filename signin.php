<?php
//include header file
include ('include/header.php');

if (isset($_POST['btn'])) {

    if (isset($_POST['email_address']) && !empty($_POST['email_address'])) {
        $email = $_POST['email_address'];
    } else {
        $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			    <strong>Please fill the email field.</strong>
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			    </div>';
    }
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
        $password = md5($password);
    } else {
        $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			    <strong>Please fill the password field.</strong>
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			    </div>';
    }
    if (isset($email) && isset($password)) {

        $sql = "SELECT * FROM tbl_donor WHERE email_address='$email' AND password='$password' ";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_id'] = $row['donor_id'];
                $_SESSION['donor_name'] = $row['donor_name'];
                $_SESSION['safe_life_date'] = $row['safe_life_date'];

                header('Location: user/index.php');
            }
        } else {
            $submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			    <strong>Sorry, No record found. Please enter valid email or password.</strong>
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			    </div>';
        }
    }
}
?>

<style>
    .size{
        min-height: 0px;
        padding: 60px 0 60px 0;

    }
    h1{
        color: white;
    }
    .form-group{
        text-align: left;
    }
    h3{
        color: #e74c3c;
        text-align: center;
    }
    .red-bar{
        width: 25%;
    }
    .form-container{
        background-color: white;
        border: .5px solid #eee;
        border-radius: 5px;
        padding: 20px 10px 20px 30px;
        -webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
        -moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
        box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
    }
</style>
<div class="container-fluid red-background size">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">SignIn</h1>
            <hr class="white-bar">
        </div>
    </div>
</div>
<div class="conatiner size ">
    <div class="row">
        <div class="col-md-6 offset-md-3 form-container">
            <h3>SignIn</h3>
            <hr class="red-bar">
<?php if (isset($submitError)) echo $submitError; ?>
            <!-- Erorr Messages -->

            <form action="" method="post" >
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email_address" class="form-control" placeholder="Email" required>
<?php if (isset($emailError)) echo $emailError; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required class="form-control">
<?php if (isset($passwordError)) echo $passwordError; ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-lg center-aligned" type="submit" name="btn" >SignIn</button> 
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>
