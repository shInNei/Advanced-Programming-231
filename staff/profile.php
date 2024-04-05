<?php require_once('../includes/header.php');
      require_once('profileSup.php')
?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
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
</head>
<body>
<?php require_once('navbar.php')?>
    <div class="content-wrap login" style="width:900px">
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
                 <div class="col-6"><p class="text-justify"><mark><b>Username: </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["staffUserName"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-3"><p class="text-justify"><mark><b>Password: </b></mark></p></div>
                 <div class="col-7"><p class="text-center" id = "mypass"><?php echo $hidden; ?></p></div> 
                 <div class="col-2"><button type="button" onclick="myFunction()" class="btn btn-primary btn-sm">Show</button></div>
            </div>  
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Gender: </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["gender"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Task: </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["task"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Start date: </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["startDate"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Email: </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["email"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Phone number: </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["phoneNumber"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Department: </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["prof"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Department ID </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["prof"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-6"><p class="text-justify"><mark><b>Department ID </b></mark></p></div>
                 <div class="col-6"><p class="text-justify"><?php echo $result["prof"]; ?></p></div>
            </div>
            </div>   
        </div>
        <div class="col-2">
            <div class="p-3 py-5">
                <div class="row">
                    <p class="text-center"><mark><b>Experience </b></mark></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteSpecific">More Info</button>
                </div>
                <div class="row">
                    <p class="text-center"><mark><b>Contract </b></mark></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteSpecific">More Info</button>
                </div>
                <div class="row">
                    <p class="text-center"><mark><b>Edit Profile </b></mark></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteSpecific">More Info</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    </div>
<?php require_once('../includes/footer.php')?>