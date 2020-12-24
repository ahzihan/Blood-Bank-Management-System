<?php
//include header file
include ('include/header.php');
?>

<div class="container-fluid header-img">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="header">
                <h1 class="text-center">Donate the blood, save the life</h1>
                <p class="text-center">Donate the blood to help the others.</p>
            </div>

            <h1 class="text-center">Search The Donors</h1>
            <hr class="white-bar text-center">

            <form action="search.php" method="get" class="form-inline text-center" style="padding: 40px 0px 0px 5px;">
                <div class="form-group text-center justify-content-center">
                    <select style="width: 220px; height: 45px;" name="city" id="city" class="form-control demo-default" required>
                        <option value="" active>-- Select --</option><optgroup title="Barisal Division" label="&raquo; Barisal Division"></optgroup><option value="Barisal" >Barisal</option><option value="Bhola" >Bhola</option><option value="Barguna" >Barguna</option><option value="Jhalokati" >Jhalokati</option><option value="Patuakhali" >Patuakhali</option><option value="Pirojpur" >Pirojpur</option><optgroup title="Chittagong Division" label="&raquo; Chittagong Division"></optgroup><option value="Bandarban" >Bandarban</option><option value="Brahmanbaria" >Brahmanbaria</option><option value="Chandpur" >Chandpur</option><option value="Chattogram" >Chattogram</option><option value="Cumilla" >Cumilla</option><option value="Cox's Bazar" >Cox's Bazar</option><option value="Feni" >Feni</option><option value="Khagrachhari" >Khagrachhari</option><option value="Lakshmipur" >Lakshmipur</option><option value="Noakhali" >Noakhali</option><option value="Rangamati" >Rangamati</option><optgroup title="Dhaka Division" label="&raquo; Dhaka Division"></optgroup><option value="Dhaka" >Dhaka</option><option value="Faridpur" >Faridpur</option><option value="Gazipur" >Gazipur</option><option value="Gopalganj" >Gopalganj</option><option value="Kishoreganj" >Kishoreganj</option><option value="Madaripur" >Madaripur</option><option value="Manikganj" >Manikganj</option><option value="Munshiganj" >Munshiganj</option><option value="Narayanganj" >Narayanganj</option><option value="Narsingdi" >Narsingdi</option><option value="Rajbari" >Rajbari</option><option value="Shariatpur" >Shariatpur</option><option value="Tangail" >Tangail</option><optgroup title="Khulna Division" label="&raquo; Khulna Division"></optgroup><option value="Bagerhat" >Bagerhat</option><option value="Chuadanga" >Chuadanga</option><option value="Jashore" >Jashore</option><option value="Jhenaidah" >Jhenaidah</option><option value="Khulna" >Khulna</option><option value="Kushtia" >Kushtia</option><option value="Magura" >Magura</option><option value="Meherpur" >Meherpur</option><option value="	Narail" >	Narail</option><option value="Satkhira" >Satkhira</option><optgroup title="Mymensingh District" label="&raquo; Mymensingh District"></optgroup><option value="Mymensingh" >Mymensingh</option><option value="Netrokona" >Netrokona</option><option value="Jamalpur" >Jamalpur</option><option value="Sherpur" >Sherpur</option><optgroup title="Rajshahi Division" label="&raquo; Rajshahi Division"></optgroup><option value="Rajshahi" >Rajshahi</option><option value="Bogura" >Bogura</option><option value="Chapainawabganj" >Chapainawabganj</option><option value="Joypurhat" >Joypurhat</option><option value="Naogaon" >Naogaon</option><option value="Natore" >Natore</option><option value="Pabna" >Pabna</option><option value="Sirajgonj" >Sirajgonj</option><optgroup title="Rangpur District" label="&raquo; Rangpur District"></optgroup><option value="Rangpur" >Rangpur</option><option value="Dinajpur" >Dinajpur</option><option value="Kurigram" >Kurigram</option><option value="Nilphamari" >Nilphamari</option><option value="Gaibandha" >Gaibandha</option><option value="Thakurgaon" >Thakurgaon</option><option value="Panchagarh" >Panchagarh</option><option value="Lalmonirhat" >Lalmonirhat</option><optgroup title="Sylhet District" label="&raquo; Sylhet District"></optgroup><option value="Sylhet" >Sylhet</option><option value="Habiganj" >Habiganj</option><option value="Moulvibazar" >Moulvibazar</option><option value="Sunamganj" >Sunamganj</option></select>
                </div>
                <div class="form-group center-aligned">
                    <select name="blood_group" id="blood_group" style="padding: 0 20px; width: 220px; height: 45px;" class="form-control demo-default text-center margin10px">

                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>

                    </select>
                </div>
                <div class="form-group center-aligned">
                    <button type="submit" name="btn" id="submit" class="btn btn-lg btn-danger">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- header ends -->

<!-- donate section -->
<div class="container-fluid red-background">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"  style="color: white; font-weight: 700;padding: 10px 0 0 0;">Donate The Blood</h1>
            <hr class="white-bar">
            <p class="text-center pera-text">
                We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.

                We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
            </p>
            <a href="#" class="btn btn-default btn-lg text-center center-aligned">Become a Life Saver!</a>
        </div>
    </div>
</div>
<!-- end doante section -->

<!-- start aboutus section -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <h3 class="text-center red">Our Vission</h3>
                <img src="img/binoculars.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                <p class="text-center">
                    We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                </p>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <h3 class="text-center red">Our Goal</h3>
                <img src="img/target.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                <p class="text-center">
                    We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                </p>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <h3 class="text-center red">Our Mission</h3>
                <img src="img/goal.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
                <p class="text-center">
                    We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- end aboutus section -->


<?php
//include footer file
include ('include/footer.php');
?>