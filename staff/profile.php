<?php require_once('../includes/header.php');
      require_once('profileSup.php')
?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script>
    function myFunction() {
  var MyJSStringVar = "<?php Print($result["staffPassword"]); ?>";
  var x = document.getElementById("myDIV");
  if (x.innerHTML === MyJSStringVar) {
    x.innerHTML = "Swapped text!";
  } else {
    x.innerHTML = MyJSStringVar;
  }
}
</script>
</head>
<body>
<?php require_once('navbar.php')?>
    <div class="content-wrap">
    <div class="login">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold"><p><?php echo $result["fname"]." ".$result["lname"]; ?></p></span>
                <span class="text-black-50"><p><?php echo $result["ID"]; ?></span>
                <span> </span>
            </div>

</div>
        <div class="col-7 border-right">  
            <div class="p-4 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Personal Information</h4>
            </div>
            <div class="row">
                 <div class="col-3"><p class="text-center"><mark><b>Username: </b></mark></p></div>
                 <div class="col-9"><p class="text-center"><?php echo $result["staffUserName"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-3"><p class="text-center"><mark><b>Password: </b></mark></p></div>
                 <div class="col-7"><p class="text-center" id = "myDIV"><?php echo $result["staffPassword"]; ?></p></div> 
                 <div class="col-2"><button onclick="myFunction()">Click Me</button></div>
            </div>  
            <div class="row">
                 <div class="col-7"><p class="text-justify"><mark><b>Date start work: </b></mark></p></div>
                 <div class="col-5"><p class="text-justify"><?php echo $result["dateS"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-2"><p class="text-justify"><mark><b>Email: </b></mark></p></div>
                 <div class="col-10"><p class="text-justify"><?php echo $result["email"]; ?></p></div>
            </div>
            <div class="row">
                 <div class="col-2"><p class="text-justify"><mark><b>Email: </b></mark></p></div>
                 <div class="col-10"><p class="text-justify"><?php echo $result["email"]; ?></p></div>
            </div>
            </div>   
        </div>
        <div class="col-2">
        </div>
    </div>
</div>
</div>
    </div>
<?php require_once('../includes/footer.php')?>