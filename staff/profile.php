<?php session_start();  ?>
<?php require_once('../includes/header.php');?>
<?php require_once('profileSup.php');?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    function myFunction() {
  var staffPassword = "<?php Print($result["staffPassword"]); ?>";
  var hidden = "<?php Print($hidden); ?>";
  
  var x = document.getElementById("mypass");
  if (x.innerHTML === hidden) {
    x.innerHTML = staffPassword;
  } else {
    x.innerHTML = hidden;
  }
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
            const inputTypeSelect = document.getElementById('inputTypeSelect');
            const dynamicInput = document.getElementById('dynamicInput');

            // Event listener for select change
            inputTypeSelect.addEventListener('change', function () {
                const selectedType = inputTypeSelect.value;
                if (selectedType === 'staffPassword' || selectedType === 'phoneNumber') {
                    dynamicInput.type = 'text';
                } else {
                    dynamicInput.type = selectedType;
                }
                dynamicInput.value = ''; // Clear the input value when changing type
            });
        });
    </script>
<style>
    .change {
        overflow: auto;
    }
</style>
</head>
<body>
<?php require_once('navbar.php')?>
    <div class="content-wrap login" style="width:1000px">
    <!-- style="padding-bottom: 150px" -->
    <div class="login-box" > 
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><p><?php echo $result["fname"]." ".$result["lname"]; ?></p></span>
                <span class="text-black"><p><?php echo $result["ID"]; ?></span>
                <span> </span>
            </div>

        </div>
        <div class="col-7 border-right">  
            <div class="p-4 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Personal Information</h4>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Username: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify change"><?php echo $result["staffUserName"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-3"><p class="text-justify"><mark><b>Password: </b></mark></p></div>
                 <div class="col-5"><p class="text-center change" id = "mypass"><?php echo $hidden; ?></p></div> 
                 <div class="col-4"><button type="button" onclick="myFunction()" class="btn btn-primary btn-sm ">Show</button></div>
            </div>  
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Gender: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify change"><?php echo $result["gender"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Task: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify change"><?php echo $result["task"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Start date: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify change"><?php echo date_format(date_create($result["startDate"]), "d/m/Y"); ?></p></div>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Email: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify change"><?php echo $result["email"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Phone number: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify change"><?php echo $result["phoneNumber"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Department: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify change"><?php 
                    switch($result['prof']) {
                        case "01": echo "Department of Pharmacy";
                        break;
                        case "02": echo "Department of Cardiology";
                        break;
                        case "03": echo "Department of Pediatrics";
                        break;
                        case "04": echo "Intensive Care Unit";
                        break;
                        case "05": echo "Department of Otorhinolaryngology";
                        break;
                        case "06": echo "Department of Obstetric";
                        break;
                    }
                 ?></p></div>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Department ID: </b></mark></p></div>
                 <div class="col-7"><p class="text-justify"><?php echo $result["prof"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-5"><p class="text-justify"><mark><b>Annual Leave Dates</b></mark></p></div>
                 <div class="col-7"><p class="text-justify"><?php echo $result["annualLeaveDay"]; ?></p></div>
            </div>
            </div>   
        </div>
        <div class="col-2">
            <div class="p-3 py-5">
                <div class="row">
                    <p class="text-center"><mark><b>Diploma</b></mark></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DIPLOMA">More Info</button>
                </div>
                <div class="row">
                    <p class="text-center"><mark><b>Contract </b></mark></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contract">More Info</button>
                </div>
                <div class="row">
                    <p class="text-center"><mark><b>Edit Profile </b></mark></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditProfile">More Info</button>
                </div>
                <div class="row">
                    <p class="text-center"><mark><b>Report </b></mark></p>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Report">More Info</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DIPLOMA" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px">
            <div class="modal-content" style="width: 1000px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Diploma</h5>
            </div>
            <div class="modal-body">
                        <?php
                            if($diploma) {
                                echo '<table class="table">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th scope="col" class="text-center">Diploma ID</th>';
                                echo '<th scope="col" class="text-center">College</th>';
                                echo '<th scope="col" class="text-center">Nation</th>';
                                echo '<th scope="col" class="text-center">Graduation Year</th>';
                                echo '<th scope="col" class="text-center">Major</th>';
                                echo '<th scope="col" class="text-center">Specialized Field</th>';
                                echo '<th scope="col" class="text-center">Program Type</th>';
                                echo '<th scope="col" class="text-center">Honor</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                foreach(array_values($diploma) as $record) {
                                    echo '<tr>';
                                    echo '<td class="text-center">'.$record['DIPID'].'</td>';
                                    echo '<td class="text-center">'.$record['college'].'</td>';
                                    echo '<td class="text-center">'.$record['nation'].'</td>';
                                    echo '<td class="text-center">'.$record['gYear'].'</td>';
                                    echo '<td class="text-center">'.$record['major'].'</td>';
                                    echo '<td class="text-center">'.$record['specializedField'].'</td>';
                                    echo '<td class="text-center">'.$record['programType'].'</td>';
                                    echo '<td class="text-center">'.$record['honor'].'</td>';
                                    echo '</tr>';
                                }
                                echo '</tbody>';
                                echo '</table>';
                            } else {
                                echo '<p>Please contact the admin for more information.</p>';
                            }
                        ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
            </div>
            </div>
            </div>
        </div>

        <!-- modal for contract -->
        <div class="modal fade" id="contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Contract info</h5>
            </div>
            <div class="modal-body">
                <?php
                    if(!$contract) {
                        echo '<p>Please contact the admin for more information.</p>';
                    } else {
                        echo '<div class="row">
                        <div class="col-6"><p class="text-justify"><mark><b>Name: </b></mark></p></div>
                        <div class="col-6"><p class="text-justify">'.$result["fname"]." ".$result["lname"].'</p></div>
                        </div>' ;
                        echo '<div class="row">
                        <div class="col-6"><p class="text-justify"><mark><b>Identification: </b></mark></p></div>
                        <div class="col-6"><p class="text-justify">'.$contract["CCCD"].'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Employee"."'s Address: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["address"].'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Expired Date: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".date_format(date_create($contract["exDate"]), "d/m/Y").'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Salary: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["salary"]." $".'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Assuarance Fee: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["assure"]." $".'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Working Place: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["hospital"].'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Working Place"."'s Address: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["hospitaladdress"].'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Employer"."'s Name: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["director"].'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Employer"."'s Position: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["dPosition"].'</p></div>
                        </div>' ;
                        echo "<div class='row'>
                        <div class='col-6'><p class='text-justify'><mark><b>Form of Employment: </b></mark></p></div>
                        <div class='col-6'><p class='text-justify'>".$contract["form"].'</p></div>
                        </div>' ;
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
            </div>
            </div>
            </div>
        </div>
        
        <div class="modal fade" id="EditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
            </div>
            <div class="modal-body">
                <form method="post"  action="updateContent.php">
                    <div class="form-group">
                        <label for="inputTypeSelect" >Attribute</label>
                            <select class="form-control" name="attri" id="inputTypeSelect">
                            <option value="staffPassword">Password</option>
                            <option value="email">Email</option>
                            <option value="phoneNumber">Phone Number</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="dynamicInput">Update Content</label>
                        <input type="text" id="dynamicInput" class="form-control" name="updatecontent" placeholder="Update Content" required>
                    </div>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="updateSubmit" class="btn btn-primary " style="margin-bottom: 0px" value="Update">
            </div>
            </form>
            </div>
            </div>
        </div>

        <div class="modal fade" id="Report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Report to Admin</h5>
            </div>
            <div class="modal-body">
                <form method="post"  action="reportStaff.php">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" rows="5" name="content" placeholder="Content" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-bottom: 0px">Close</button>
                <input type="submit" name="reportSubmit" class="btn btn-primary " style="margin-bottom: 0px" value="Report">
            </div>
            </form>
            </div>
            </div>
        </div>

</div>
</div>
    </div>
<?php
    if (isset($_SESSION['alert_message'])) {
        echo '<script>alert("' . $_SESSION['alert_message'] . '");</script>';
        unset($_SESSION['alert_message']); // Clear the session variable
    }  
require_once('../includes/footer.php')?>