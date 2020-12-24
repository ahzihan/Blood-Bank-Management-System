<?php
//include header file
include ('include/header.php');

if (isset($_POST['btn'])) {
    if (isset($_POST['term']) === true) {

        if (isset($_POST['donor_name']) && !empty($_POST['donor_name'])) {
            if (preg_match('/^[A-Za-z\s]+$/', $_POST['donor_name'])) {
                $name = $_POST['donor_name'];
            } else {
                $nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<strong>Only lower & upper case & space characters are allow.</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
				  	</button>
					</div>';
            }
        } else {
            $nameError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	 <strong>Please fill the name field.</strong>
				 	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
				 	 </button>
					</div>';
        }
        if (isset($_POST['blood_group']) && !empty($_POST['blood_group'])) {
            $blood_group = $_POST['blood_group'];
        } else {
            $blood_groupError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 	<strong>Please select your blood group.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
        }if (isset($_POST['gender']) && !empty($_POST['gender'])) {
            $gender = $_POST['gender'];
        } else {
            $genderError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			    <strong>Please select your gender.</strong>
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			    </button>
			    </div>';
        }
        if (isset($_POST['dob']) && !empty($_POST['dob'])) {
            $date = $_POST['dob'];
        } else {
            $dateError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Please fill in the date field.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
        }


        if (isset($_POST['email_address']) && !empty($_POST['email_address'])) {
            $pattern = '/^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

            if (preg_match($pattern, $_POST['email_address'])) {

                $check_email = $_POST['email_address'];

                $sql = "SELECT email_address FROM tbl_donor WHERE email_address='$check_email'";

                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {

                    $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<strong>Sorry this email is already exist.</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
				  	</button>
					</div>';
                } else {
                    $email = $_POST['email_address'];
                }
            } else {
                $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<strong>Please enter valid email address.</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
				  	</button>
					</div>';
            }
        } else {
            $emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<strong>Please fill the email field.</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
				  	</button>
					</div>';
        }
        if (isset($_POST['contact_no']) && !empty($_POST['contact_no'])) {
            if (preg_match('/\d{11}/', $_POST['contact_no'])) {
                $contact = $_POST['contact_no'];
            } else {
                $contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  		<strong>Contact should consist of 11 characters.</strong>
			  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
			  		</button>
					</div>';
            }
        } else {
            $contactError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Please fill the contact field.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
        }
        if (isset($_POST['city']) && !empty($_POST['city'])) {
            if (preg_match('/^[A-Za-z\s]+$/', $_POST['city'])) {
                $city = $_POST['city'];
            } else {
                $cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Only lower & upper case & space characters are allow.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
            }
        } else {
            $cityError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Please fill the city field.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
        }
        if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {
            if (strlen($_POST['password']) >= 6) {
                if ($_POST['password'] == $_POST['c_password']) {
                    $password = $_POST['password'];
                } else {
                    $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<strong>Password do not match.</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
				  	</button>
					</div>';
                }
            } else {
                $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<strong>The password should be consist of 6 characters.</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
				  	</button>
					</div>';
            }
        } else {
            $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Please fill the password field.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
        }
        //Insert data into database

        if (isset($name) && isset($blood_group) && isset($gender) && isset($date) && isset($check_email) && isset($contact) && isset($city) && isset($password)) {
            $password = md5($password);
            $sql = "INSERT INTO tbl_donor (donor_name,gender,blood_group,email_address,city,dob,contact_no,safe_life_date,password) VALUES('$name','$gender','$blood_group','$check_email','$city','$date', '$contact','0','$password')";

            if (mysqli_query($connection, $sql)) {

                header("Location: signin.php");
            } else {

                $submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Data not inserted, Try again.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
            }
        }
    } else {
        $termError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  	<strong>Please agree with our terms & conditions.</strong>
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
		  	</button>
			</div>';
    }
}
?>

<style>
    .size{
        min-height: 0px;
        padding: 60px 0 40px 0;

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
    .form-group{
        text-align: left;
    }
    h1{
        color: white;
    }
    h3{
        color: #e74c3c;
        text-align: center;
    }
    .red-bar{
        width: 25%;
    }
</style>
<div class="container-fluid red-background size">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Donate</h1>
            <hr class="white-bar">
        </div>
    </div>
</div>
<div class="container size">
    <div class="row">
        <div class="col-md-6 offset-md-3 form-container">
            <h3>SignUp</h3>
            <hr class="red-bar">
            <?php
            if (isset($termError)) echo $termError;
            if (isset($submitSuccess)) echo $submitSuccess;
            if (isset($submitError)) echo $submitError;
            ?>
            <!-- Error Messages -->
            <form class="form-group" action="" method="post">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="donor_name" id="fullname" placeholder="Full Name" required pattern="[A-Za-z/\s]+" title="Only lower and upper case and space" class="form-control" value="<?php if (isset($name)) echo $name; ?>" >
                    <?php if (isset($nameError)) echo $nameError; ?>
                </div><!--full name--> 

                <div class="form-group">
                    <label for="blood_group">Blood Group</label><br>
                    <select class="form-control demo-default" id="blood_group" name="blood_group" required>
                        <option value="">---Select Your Blood Group---</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    <?php if (isset($blood_groupError)) echo $blood_groupError; ?>
                </div><!--End form-group-->

                <div class="form-group">
                    <label for="gender">Gender</label><br>
                    Male<input type="radio" name="gender" id="gender" value="Male" style="margin-left:10px; margin-right:10px;" checked>
                    Female<input type="radio" name="gender" id="gender" value="Female" style="margin-left:10px;"> 
                        <?php if (isset($gender)) {if ($gender == 'Female')echo 'checked';}?>
                    <?php if (isset($genderError)) echo $genderError; ?>
                </div><!--gender-->

                <div class="form-group">
                    <label for="dob">Date Of Birth</label>
                    <input type="Date" name="dob" id="dob" class="form-control" value="<?php if (isset($date)) echo $date; ?>">
                    <?php if (isset($dateError)) echo $dateError; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email_address" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control" value="<?php if (isset($check_email)) echo $check_email; ?>">
                    <?php if (isset($emailError)) echo $emailError; ?>
                </div>

                <div class="form-group">
                    <label for="contact_no">Contact No</label>
                    <input type="number" name="contact_no" placeholder="+880***** " class="form-control" required pattern="^\d{11}$" title="11 numeric characters only" maxlength="11" value="<?php if (isset($contact)) echo $contact; ?>">
                <?php if (isset($contactError)) echo $contactError; ?>
                </div><!--End form-group-->

                <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" id="city" class="form-control demo-default" required>
                        <option value="" active>-- Select --</option><optgroup title="Barisal Division" label="&raquo; Barisal Division"></optgroup><option value="Barisal" >Barisal</option><option value="Bhola" >Bhola</option><option value="Barguna" >Barguna</option><option value="Jhalokati" >Jhalokati</option><option value="Patuakhali" >Patuakhali</option><option value="Pirojpur" >Pirojpur</option><optgroup title="Chittagong Division" label="&raquo; Chittagong Division"></optgroup><option value="Bandarban" >Bandarban</option><option value="Brahmanbaria" >Brahmanbaria</option><option value="Chandpur" >Chandpur</option><option value="Chattogram" >Chattogram</option><option value="Cumilla" >Cumilla</option><option value="Cox's Bazar" >Cox's Bazar</option><option value="Feni" >Feni</option><option value="Khagrachhari" >Khagrachhari</option><option value="Lakshmipur" >Lakshmipur</option><option value="Noakhali" >Noakhali</option><option value="Rangamati" >Rangamati</option><optgroup title="Dhaka Division" label="&raquo; Dhaka Division"></optgroup><option value="Dhaka" >Dhaka</option><option value="Faridpur" >Faridpur</option><option value="Gazipur" >Gazipur</option><option value="Gopalganj" >Gopalganj</option><option value="Kishoreganj" >Kishoreganj</option><option value="Madaripur" >Madaripur</option><option value="Manikganj" >Manikganj</option><option value="Munshiganj" >Munshiganj</option><option value="Narayanganj" >Narayanganj</option><option value="Narsingdi" >Narsingdi</option><option value="Rajbari" >Rajbari</option><option value="Shariatpur" >Shariatpur</option><option value="Tangail" >Tangail</option><optgroup title="Khulna Division" label="&raquo; Khulna Division"></optgroup><option value="Bagerhat" >Bagerhat</option><option value="Chuadanga" >Chuadanga</option><option value="Jashore" >Jashore</option><option value="Jhenaidah" >Jhenaidah</option><option value="Khulna" >Khulna</option><option value="Kushtia" >Kushtia</option><option value="Magura" >Magura</option><option value="Meherpur" >Meherpur</option><option value="	Narail" >	Narail</option><option value="Satkhira" >Satkhira</option><optgroup title="Mymensingh District" label="&raquo; Mymensingh District"></optgroup><option value="Mymensingh" >Mymensingh</option><option value="Netrokona" >Netrokona</option><option value="Jamalpur" >Jamalpur</option><option value="Sherpur" >Sherpur</option><optgroup title="Rajshahi Division" label="&raquo; Rajshahi Division"></optgroup><option value="Rajshahi" >Rajshahi</option><option value="Bogura" >Bogura</option><option value="Chapainawabganj" >Chapainawabganj</option><option value="Joypurhat" >Joypurhat</option><option value="Naogaon" >Naogaon</option><option value="Natore" >Natore</option><option value="Pabna" >Pabna</option><option value="Sirajgonj" >Sirajgonj</option><optgroup title="Rangpur District" label="&raquo; Rangpur District"></optgroup><option value="Rangpur" >Rangpur</option><option value="Dinajpur" >Dinajpur</option><option value="Kurigram" >Kurigram</option><option value="Nilphamari" >Nilphamari</option><option value="Gaibandha" >Gaibandha</option><option value="Thakurgaon" >Thakurgaon</option><option value="Panchagarh" >Panchagarh</option><option value="Lalmonirhat" >Lalmonirhat</option><optgroup title="Sylhet District" label="&raquo; Sylhet District"></optgroup><option value="Sylhet" >Sylhet</option><option value="Habiganj" >Habiganj</option><option value="Moulvibazar" >Moulvibazar</option><option value="Sunamganj" >Sunamganj</option></select>
                <?php if (isset($cityError)) echo $cityError; ?>
                </div><!--city end-->

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" placeholder="Password" class="form-control" required pattern=".{6,}" value="<?php if (isset($password)) echo $password; ?>">
                <?php if (isset($passwordError)) echo $passwordError; ?>
                </div><!--End form-group-->

                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="c_password" value="" placeholder="Confirm Password" class="form-control" required pattern=".{6,}" value="<?php if (isset($password)) echo $password; ?>>
                <?php if (isset($passwordError)) echo $passwordError; ?>
                           </div><!--End form-group-->

                           <div class="form-inline">
                           <input type="checkbox" name="term" value="true" required style="margin-left:10px;">
                    <span style="margin-left:10px;"><b>I am agree to donate my blood and show my Name, Contact Nos. and E-Mail in Blood donors List</b></span>
                </div><!--End form-group-->

                <div class="form-group">
                    <button id="submit" name="btn" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">SignUp</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
//include footer file
include ('include/footer.php');
?>