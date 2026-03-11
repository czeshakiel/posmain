<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>KMSCI Recruitment Portal</title>
    <!-- <link rel="icon" href="<?=base_url('design/favicon.ico');?>" type="image/x-icon">  -->
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
                            <form class="row g-1 p-3 p-md-4" action="<?=base_url('verify_account');?>" method="POST">
                                 <div class="col-12 text-center mb-1 mb-lg-5">
                                    <img src="<?=base_url('design/assets/images/verify.svg');?>" class="w240 mb-4" alt="" />                                    
                                    <h1>Verification</h1>
                                    <span>We sent a verification code to your phone number <?=$this->session->contactno;?>. Enter the code in the field below.</span>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" class="form-control form-control-lg text-center single-char-input" name="c1" placeholder="-" maxlength="1">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" class="form-control form-control-lg text-center single-char-input" name="c2" placeholder="-" maxlength="1">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" class="form-control form-control-lg text-center single-char-input" name="c3" placeholder="-" maxlength="1">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <input type="text" class="form-control form-control-lg text-center single-char-input" name="c4" placeholder="-" maxlength="1">
                                    </div>
                                </div>                                
                                <div class="col-12 text-center">
                                    <font color="red"><?=$this->session->error;?></font>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" title="" class="btn btn-lg btn-block btn-light lift text-uppercase">Verify my account</a>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted"><div id="timer" class="text-secondary"></div><div id="resendcode"> Haven't received it? <a href="<?=base_url('resend_code');?>" class="text-secondary">Resend a new code.</a></div></span>
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
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.single-char-input');

        inputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                if (this.value.length === 1) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
            });
        });
    }); 
</script>

<script>
    const targetTime = new Date().getTime() + <?=$this->session->ctime;?> * 60 * 1000;
    function updateTimer() {
        const now = new Date().getTime();
        const timeLeft = targetTime - now;
        if (timeLeft <= 0) {
        //document.getElementById("timer").textContent = "Time's up!";        
        clearInterval(interval);
        return;
        }
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
        if(minutes==0 && seconds==0){
            document.getElementById("timer").textContent = "";
        }else{
            document.getElementById("timer").textContent =
        `Resend in ${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}.` + ' Please DO NOT refresh the page!';
        }    
        if(minutes==0 && seconds==0){        
            document.getElementById("resendcode").style.display='block';
        }else{
            document.getElementById("resendcode").style.display='none';
        }
    }
    const interval = setInterval(updateTimer, 1000);
    updateTimer();
</script>
</body>
</html>