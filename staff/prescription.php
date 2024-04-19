          <?php require_once('../includes/header.php')

            ?>

          <link rel="stylesheet" href="../assets/css/style.css">
          </head>

          <body>
                
              <?php require_once('navbar.php')?>
                
              <div class="content-wrap login">
                    <?php
                    if(isset($_SESSION['prescribe_msg'])){
                        echo 
                        "<div class='alert alert-warning' role = 'alert'>
                            ".$_SESSION['prescribe_msg']."
                        </div>";
                        unset($_SESSION['prescribe_msg']);
                    }
                    ?>
                  <div class="printarea login-box">
                      <div class="login-image form-header">
                          <h2>Prescription Form</h2>
                      </div>
                      <form method="post" action="process/processPrescription.php">
                          <div class="login-form">
                              <div class="form-group form-category">
                                  <h2>Patient Information</h2>
                              </div>
                              <div class="form-group row">
                                  <div class="col-4">
                                      <label for="">ID</label>
                                      <div class="input-group">
                                          <div class="input-group-text">
                                              <input type="checkbox" id="pIdSelector" name="pIdSelector" aria-label="Checkbox for following text input">
                                          </div>
                                          <input type="text" id="pID" class="form-control" name="patientID" placeholder="ID.." aria-label="ID" onkeyup="showHint(this.value,'patientID.php','suggestions','pID')" disabled>
                                      </div>
                                      <div id="suggestions" class="suggestion"></div>
                                  </div>
                                  <div class="col-4">
                                      <label for=""> First Name <span class="require">*</span></label>
                                      <input type="text" id="fname" class="form-control" name="pFName" placeholder="First name.." aria-label="firstName" required>
                                  </div>
                                  <div class="col-4">
                                      <label for=""> Last Name <span class="require">*</span></label>
                                      <input type="text" id="lname" class="form-control" name="pLName" placeholder="Last name.." aria-label="lastName" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-8">
                                      <label for="">Email address <span class="require">*</span></label>
                                      <input type="email" id="email" class="form-control" name="email" placeholder="***@******.com" pattern="^\w+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*\.com$" title = "***@*****.com"required>

                                  </div>
                                  <div class="col-4">
                                      <label> Gender</label>
                                      <select name="gender" id="gender" class="form-select" aria-label="form gender-select">
                                          <option selected value="M">Male</option>
                                          <option value="F">Female</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group form-category">
                                  <h2>Diagnosis</h2>
                              </div>
                              <div class="form-group row">
                                  <div class=" col">
                                      <label for="">Diagnos with: <span class="require">*</span></label>
                                      <input type="text" class="form-control" name="illness" placeholder="" aria-label="Illness" required>
                                  </div>
                              </div>
                              <div class="form-group" style="color:#00856f; border-bottom: solid 2px;">
                                  <h2>Prescribe Medicine</h2>
                              </div>
                              <div class="form-group row">
                                  <div class="col">
                                      <label for="">ID</label>
                                      <div class="input-group">
                                          <div class="input-group-text">
                                              <input type="checkbox" id="mIdSelector" name="mIdSelector" aria-label="Checkbox for following text input">
                                          </div>
                                          <input type="text" id="mID" class="form-control" name="mID" placeholder="ID.." aria-label="ID" onkeyup="showHint(this.value,'medID.php','medSuggestions','mID')" disabled>
                                      </div>
                                      <div id="medSuggestions" class="suggestion"></div>
                                  </div>
                                  <div class="col">
                                      <label for="">Name and Type</label>
                                      <input class="form-control" name="medName" id="medName" placeholder="Name-Type" pattern="^\w+-(Liquid|Tablet|Capsule)$" title = "med-Liquid|Tablet|Capsule" required>

                                  </div>
                                  <div class="col">
                                      <label for="">Dosage </label>
                                      <input type="text" class="form-control" name="MedDosage" pattern="^[1-9][0-9]*$" title="Enter only numbers (minimum of 1)" aria-label="Drug dosage">
                                  </div>
                              </div>

                              <div class="text-center"><input type="submit" name="prescribe" class="btn btn-primary" value="Prescribe"></div>
                          </div>
                      </form>
                  </div>
              </div>

              <script src="../assets/jscript/showHint.js"></script>
              <script>
                  const idSelector = document.getElementById("pIdSelector");
                  const pID = document.getElementById("pID");
                  const fname = document.getElementById("fname");
                  const lname = document.getElementById("lname");
                  const email = document.getElementById("email");
                  const gender = document.getElementById("gender");

                  idSelector.addEventListener("change", function() {
                      if (idSelector.checked) {
                          pID.required = true;
                          pID.disabled = false;
                          fname.disabled = true;
                          lname.disabled = true;
                          email.disabled = true;
                          gender.disabled = true;
                      } else {
                          pID.required = false;
                          pID.disabled = true;
                          fname.disabled = false;
                          lname.disabled = false;
                          email.disabled = false;
                          gender.disabled = false;
                      }
                  });

                  const mIdSelector = document.getElementById("mIdSelector");
                  const mID = document.getElementById("mID");
                  const medName = document.getElementById("medName");
                  mIdSelector.addEventListener("change", function() {
                      if (mIdSelector.checked) {
                          mID.required = true;
                          mID.disabled = false;
                          medName.disabled = true;
                      } else {
                          mID.required = false;
                          mID.disabled = true;
                          medName.disabled = false;

                      }
                  });
              </script>
              <script>

              </script>
              </script>
              <?php require_once('../includes/footer.php') ?>