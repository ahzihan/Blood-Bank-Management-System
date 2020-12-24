<?php
include 'include/header.php';

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

    if (isset($_POST['btn'])) {

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
        }
        if (isset($_POST['gender']) && !empty($_POST['gender'])) {
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

        //Insert data into database

        if (isset($name) && isset($blood_group) && isset($gender) && isset($date) && isset($check_email) && isset($contact) && isset($city)) {
            $sql = "UPDATE tbl_donor SET donor_name='$name',gender='$gender',blood_group='$blood_group',email_address='$check_email',city='$city',dob='$date',contact_no='$contact' WHERE donor_id=" . $_SESSION['user_id'];

            if (mysqli_query($connection, $sql)) {

                $updateSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Data updated successfully.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
                ?>

                <script type="text/javascript">

                    function myFunction() {
                        location.reload();

                    }
                </script>

                <?php
            } else {

                $updateError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Data not updated, Try again.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
            }
        }
    }
//End of submit
    $sql = "SELECT * FROM tbl_donor WHERE donor_id=" . $_SESSION['user_id'];
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row['donor_id'];
            $name = $row['donor_name'];
            $blood_group = $row['blood_group'];
            $date = $row['dob'];
            $gender = $row['gender'];
            $check_email = $row['email_address'];
            $contact = $row['contact_no'];
            $city = $row['city'];

            $dbpassword = $row['password'];
        }
    }
    if (isset($_POST['update_pass'])) {

        if (isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {

            $oldPassword = md5($_POST['old_password']);

            if ($oldPassword == $dbpassword) {

                if (strlen($_POST['new_password']) >= 6) {

                    if ($_POST['new_password'] == $_POST['c_password']) {

                        $password = md5($_POST['new_password']);
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
				  	<strong>Please enter valid password.</strong>
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

        if (isset($password)) {
            $sql = "UPDATE tbl_donor SET password='$password' WHERE donor_id='$userId' ";

            if (mysqli_query($connection, $sql)) {
                $updatePasswordSuccess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>Password updated successfully.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
                ?>
                <script type="text/javascript">

                    function myFunction() {
                        location.reload();

                    }

                </script>
                <?php
            } else {

                $passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Data not inserted, Try again.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
            }
        }
    }

    if (isset($_POST['delete_account'])) {

        if (isset($_POST['account_password']) && !empty($_POST['account_password'])) {
            $account_password= md5($_POST['account_password']);
            if ($account_password==$dbpassword){
                $showForm = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Are you sure to delete your Accunt?</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form target="" method="post">
                <br>
                <input type="hidden" name="userId" value="' . $_SESSION['user_id'] . '">
                <button type="submit" name="update" class="btn btn-danger">Yes</button>

                <button type="button" class="btn btn-info" data-dismiss="alert">
                <span aria-hidden="true">Oops! No </span>
                </button>      
            	</form>
     		</div>';
            } else {
                $deleteAccountError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Please enter valid Password.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
            }
            
        } else {

            $deleteAccountError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Please enter your Password.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
        }
    }
    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];
        $sql="DELETE FROM tbl_donor WHERE donor_id=".$userId;
        
        if (mysqli_query($connection, $sql)) {
            
            header("Location: logout.php");
            
        } else {

            $deleteSubmitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Account not deleted, Try again.</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  	</button>
				</div>';
        }
    }

    include 'include/sidebar.php';
    ?>

    <style>
        .form-group{
            text-align: left;
        }
        .form-container{

            padding: 20px 10px 20px 30px;

        }
    </style>
    <div class="container" style="padding: 60px 0;">
        <div class="row">

            <div class=" card col-md-6 offset-md-3">
                <div class="panel panel-default" style="padding: 20px;">
                    <!-- Error Messages -->	

                    <?php
                    if (isset($showForm)) echo $showForm;
                    if (isset($deleteSubmitError)) echo $deleteSubmitError;
                    if (isset($updateError)) echo $updateError;
                    if (isset($updateSuccess)) echo $updateSuccess;
                    ?>
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
                                <?php if (isset($blood_group)) echo '<option selected="" value="' . $blood_group . '">' . $blood_group . '</option>'; ?>
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
                            <?php if (isset($gender)) { if ($gender == 'Female') echo 'checked';}?>
                            <?php if (isset($genderError)) echo $genderError; ?>
                        </div>
                          
                        <!--gender-->

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
                        </div>
                        <!--End form-group-->

                        <div class="form-group">
                            <label for="city">City</label>
                            <select name="city" id="city" class="form-control demo-default" required>
                                <option value="" active>-- Select --</option><?php if (isset($city)) echo '<option selected="" value="' . $city . '">' . $city . '</option>'; ?>
                                <optgroup title="Barisal Division" label="&raquo; Barisal Division"></optgroup><option value="Barisal" >Barisal</option><option value="Bhola" >Bhola</option><option value="Barguna" >Barguna</option><option value="Jhalokati" >Jhalokati</option><option value="Patuakhali" >Patuakhali</option><option value="Pirojpur" >Pirojpur</option><optgroup title="Chittagong Division" label="&raquo; Chittagong Division"></optgroup><option value="Bandarban" >Bandarban</option><option value="Brahmanbaria" >Brahmanbaria</option><option value="Chandpur" >Chandpur</option><option value="Chattogram" >Chattogram</option><option value="Cumilla" >Cumilla</option><option value="Cox's Bazar" >Cox's Bazar</option><option value="Feni" >Feni</option><option value="Khagrachhari" >Khagrachhari</option><option value="Lakshmipur" >Lakshmipur</option><option value="Noakhali" >Noakhali</option><option value="Rangamati" >Rangamati</option><optgroup title="Dhaka Division" label="&raquo; Dhaka Division"></optgroup><option value="Dhaka" >Dhaka</option><option value="Faridpur" >Faridpur</option><option value="Gazipur" >Gazipur</option><option value="Gopalganj" >Gopalganj</option><option value="Kishoreganj" >Kishoreganj</option><option value="Madaripur" >Madaripur</option><option value="Manikganj" >Manikganj</option><option value="Munshiganj" >Munshiganj</option><option value="Narayanganj" >Narayanganj</option><option value="Narsingdi" >Narsingdi</option><option value="Rajbari" >Rajbari</option><option value="Shariatpur" >Shariatpur</option><option value="Tangail" >Tangail</option><optgroup title="Khulna Division" label="&raquo; Khulna Division"></optgroup><option value="Bagerhat" >Bagerhat</option><option value="Chuadanga" >Chuadanga</option><option value="Jashore" >Jashore</option><option value="Jhenaidah" >Jhenaidah</option><option value="Khulna" >Khulna</option><option value="Kushtia" >Kushtia</option><option value="Magura" >Magura</option><option value="Meherpur" >Meherpur</option><option value="	Narail" >	Narail</option><option value="Satkhira" >Satkhira</option><optgroup title="Mymensingh District" label="&raquo; Mymensingh District"></optgroup><option value="Mymensingh" >Mymensingh</option><option value="Netrokona" >Netrokona</option><option value="Jamalpur" >Jamalpur</option><option value="Sherpur" >Sherpur</option><optgroup title="Rajshahi Division" label="&raquo; Rajshahi Division"></optgroup><option value="Rajshahi" >Rajshahi</option><option value="Bogura" >Bogura</option><option value="Chapainawabganj" >Chapainawabganj</option><option value="Joypurhat" >Joypurhat</option><option value="Naogaon" >Naogaon</option><option value="Natore" >Natore</option><option value="Pabna" >Pabna</option><option value="Sirajgonj" >Sirajgonj</option><optgroup title="Rangpur District" label="&raquo; Rangpur District"></optgroup><option value="Rangpur" >Rangpur</option><option value="Dinajpur" >Dinajpur</option><option value="Kurigram" >Kurigram</option><option value="Nilphamari" >Nilphamari</option><option value="Gaibandha" >Gaibandha</option><option value="Thakurgaon" >Thakurgaon</option><option value="Panchagarh" >Panchagarh</option><option value="Lalmonirhat" >Lalmonirhat</option><optgroup title="Sylhet District" label="&raquo; Sylhet District"></optgroup><option value="Sylhet" >Sylhet</option><option value="Habiganj" >Habiganj</option><option value="Moulvibazar" >Moulvibazar</option><option value="Sunamganj" >Sunamganj</option></select>
                            <?php if (isset($cityError)) echo $cityError; ?>
                        </div>
                        <!--city end--> 

                        <div class="form-group">
                            <button id="submit" name="btn" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">Update</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="card col-md-6 offset-md-3">
                <div class="panel panel-default" style="padding: 20px;">


                    <!-- Messages -->	

                    <form action="" method="post" class="form-group form-container" >
                        <?php
                        if (isset($passwordError))
                            echo $passwordError;
                        if (isset($updatePasswordSuccess))
                            echo $updatePasswordSuccess;
                        ?> 
                        <div class="form-group">
                            <label for="oldpassword">Current Password</label>
                            <input type="password" required name="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="newpassword">New Password</label>
                            <input type="password" required name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="c_password">Confirm Password</label>
                            <input type="password" required name="c_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-danger center-aligned" type="submit" name="update_pass">Update Password</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card col-md-6 offset-md-3">
                <!-- Display Message -->
                <?php if (isset($deleteAccountError)) echo $deleteAccountError;?>
                <div class="panel panel-default" style="padding: 20px;">
                    <form action="" method="post" class="form-group form-container" >
                        <div class="form-group">
                            <label for="oldpassword">Password</label>
                            <input type="password" required name="account_password" placeholder="Current Password" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-lg btn-danger center-aligned" type="submit" name="delete_account">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
}else {
    header("location: ../index.php");
}
include 'include/footer.php';
?>