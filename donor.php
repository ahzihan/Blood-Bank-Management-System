<?php
include ('include/header.php');
?>

<style>
    .size{
        min-height: 0px;
        padding: 60px 0 40px 0;

    }
    .loader{
        display:none;
        width:69px;
        height:89px;
        position:absolute;
        top:25%;
        left:50%;
        padding:2px;
        z-index: 1;
    }
    .loader .fa{
        color: #e74c3c;
        font-size: 52px !important;
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
    span{
        display: block;
    }
    .name{
        color: #e74c3c;
        font-size: 22px;
        font-weight: 700;
    }
    .donors_data{
        background-color: white;
        border-radius: 5px;
        margin:20px 5px 0px 5px;
        -webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
        -moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
        box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
        padding: 20px;
    }
</style>
<div class="container-fluid red-background size">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">Donors</h1>
            <hr class="white-bar">
        </div>
    </div>
</div>

<div class="container" style="padding: 60px 0;">
    <div class="row data">

        <?php
        $sql = "SELECT * FROM tbl_donor";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['safe_life_date'] == '0') {
                    echo "<div class='col-sm-3 col-sm-6 col-md-3 col-md-6 col-lg-3 donors_data'>
		<span class='name'>" . $row['donor_name'] . "</span>
		<span>" . $row['blood_group'] . "</span>
		<span>" . $row['gender'] . "</span>
		<span>" . $row['city'] . "</span>
		<span>" . $row['contact_no'] . "</span>
		<span>" . $row['email_address'] . "</span>
                </div>";
                } else {
                    $safeDate=$row['safe_life_date'];
                    $start = date_create("$safeDate");
                    $end = date_create();
                    $diff = date_diff($start, $end);
                    $diffyear = $diff->y;
                    $diffmonth = $diff->m;
                    $diffday = $diff->d;

                    if ($diffmonth >= 3) {
                        echo "<div class='col-sm-3 col-sm-6 col-md-3 col-md-6 col-lg-3 donors_data'>
                        <span class='name'>" . $row['donor_name'] . "</span>
                        <span>" . $row['blood_group'] . "</span>
                        <span>" . $row['gender'] . "</span>
                        <span>" . $row['city'] . "</span>
                        <span>" . $row['contact_no'] . "</span>
                        <span>" . $row['email_address'] . "</span>
                        </div>";
                    } else {
                        echo "<div class='col-sm-3 col-sm-6 col-md-3 col-md-6 col-lg-3 donors_data'>
                        <span class='name'>" . $row['donor_name'] . "</span>
                        <span>" . $row['blood_group'] . "</span>
                        <span>" . $row['gender'] . "</span>
                        <span>" . $row['city'] . "</span>
                        <h4 class='name text-center'>Donated</h4>
                        </div>";
                    }
                }
            }
        } else {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Data Not Found.</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
        }
        ?>
    </div>
</div>

<?php
include ('include/footer.php');
?>
