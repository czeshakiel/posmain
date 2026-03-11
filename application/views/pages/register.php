<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>KMSCI Recruitment Portal</title>
    <link rel="icon" href="<?=base_url();?>design/assets/images/medmatrix-logo.png" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="<?=base_url('design/assets/css/my-task.style.min.css');?>">
</head>

<body>

<div id="mytask-layout" class="theme-indigo" style="background: url(<?=base_url('design/assets/images/kmscibackground.jpg');?>) no-repeat; background-size: cover;">

    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-3 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                 <!-- <svg  width="4rem" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                </svg> -->
                            </div>
                            <div class="mb-5">
                                <!-- <h2 class="color-900 text-center">My-Task Let's Management Better</h2> -->
                            </div>
                            <!-- Image block -->
                            <div class="">
                                <!-- <img src="../assets/images/login-img.svg" alt="login-img"> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" action="<?=base_url('submit_registration');?>" method="POST" onsubmit=" return validateTwoTextboxes()">
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <h1>Create your account</h1>
                                    <span>Register to proceed on recruitment process.</span>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label class="form-label">Full name</label>
                                        <input type="text" class="form-control form-control-lg" name="app_firstname" placeholder="First Name" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <label class="form-label">&nbsp;</label>
                                        <input type="text" class="form-control form-control-lg" name="app_lastname" placeholder="Last Name" required  autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Contact No</label>
                                        <input type="text" class="form-control form-control-lg" name="app_contactno" placeholder="091xxxxxxxxx" required  autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control form-control-lg" name="app_email" placeholder="name@example.com" required>
                                        <labe>
                                            <p class="text-danger"><?=$this->session->feedback;?></p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-lg" name="app_password" placeholder="Your password" required id="password">
                                        <labe>
                                            <p class="text-danger" id="p1"></p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Confirm password</label>
                                        <input type="password" class="form-control form-control-lg" name="app_password_confirm" placeholder="Your password confirm" required id="confirmpassword">
                                        <labe>
                                            <p class="text-danger" id="p2"></p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I accept the <a href="#" title="Terms and Conditions" class="text-secondary">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" alt="SIGNUP">SIGN UP</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Already have an account? <a href="<?=base_url();?>" title="Sign in" class="text-secondary">Sign in here</a></span>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?=base_url('design/assets/bundles/libscripts.bundle.js');?>"></script>
<script>
function validateTwoTextboxes() {
  const textbox1 = document.getElementById('password');
  const textbox2 = document.getElementById('confirmpassword');

  // Example 1: Check if both textboxes are not empty
//   if (textbox1.value.trim() === '' || textbox2.value.trim() === '') {
//     alert('Both textboxes must be filled out.');
//     return false; // Prevent form submission
//   }

  // Example 2: Check if textbox1's value is equal to textbox2's value
  if (textbox1.value !== textbox2.value) {
    //alert('Password values must match.');
    document.getElementById('p1').innerHTML = '* Password do not match!';
    document.getElementById('p2').innerHTML = '* Password do not match!';
    return false; // Prevent form submission
  }

  // If all validation rules pass, allow form submission
  return true;
}
</script>
</body>
</html>