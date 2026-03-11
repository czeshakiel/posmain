<!-- Body: Body -->
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card border-0 mb-4 no-bg">
                            <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                                <h3 class=" fw-bold flex-fill mb-0">Applicant Profile</h3>
                            </div>
                        </div>
                    </div>
                </div><!-- Row End -->                
                <div class="row g-3">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card teacher-card  mb-3">
                            <div class="card-body d-flex teacher-fulldeatil">
                                <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <a href="#">
                                        <img src="<?=base_url('design/assets/images/lg/avatar3.jpg');?>" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    </a>
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                        <h6 class="mb-0 fw-bold d-block fs-6"><a href="#" class="badge rounded-pill bg-warning" data-bs-toggle="modal" data-bs-target="#EditProfile"><i class="icofont-edit"></i> Edit Profile</a></h6>
                                        <span class="text-muted small">CLIENT ID : <?=$this->session->app_id;?></span>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-4 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6"><?=$applicant['app_firstname'];?> <?=$applicant['app_middlename'];?> <?=$applicant['app_lastname'];?></h6>
                                    <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">
                                        <?php
                                            if($applicant['course']==""){
                                                echo "Your course here.";
                                            }else{
                                                echo $applicant['course'];
                                            }
                                        ?>
                                    </span>
                                    <p class="mt-2 small"><?php
                                    if($applicant['app_address']==""){
                                        echo "Your address here...";
                                    }else{
                                        echo $applicant['app_address'];
                                    }
                                    ?></p>
                                    <div class="row g-2 pt-2">
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-ui-touch-phone"></i>
                                                <span class="ms-2 small"><?=$applicant['app_contact'];?> </span>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-email"></i>
                                                <span class="ms-2 small"><?=$applicant['app_email'];?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-birthday-cake"></i>
                                                <span class="ms-2 small">
                                                    <?php
                                                    if($applicant['app_birthdate']==""){
                                                        echo "Your birthday here";
                                                    }else{
                                                        echo datE('m/d/Y',strtotime($applicant['app_birthdate']));
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-address-book"></i>
                                                <span class="ms-2 small">
                                                    <?php
                                                    if($applicant['school_name']==""){
                                                        echo "Your school here.";
                                                    }else{
                                                        echo $applicant['school_name'].", ".$applicant['year_graduated'];
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                        <div class="info-header">
                                            <h6 class="mb-0 fw-bold ">Applicant Documents <a href="#" class="badge rounded-pill bg-primary" data-bs-toggle="modal" data-bs-target="#UploadDocument"><i class="icofont-upload"></i> Upload</a></h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                            <thead>
                                                <tr>                                                    
                                                    <th>No</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $x=1;
                                                foreach($documents as $doc){
                                                    echo "<tr>";
                                                        echo "<td>$x.</td>";
                                                        echo "<td>$doc[doc_title]</td>";
                                                        echo "<td>
                                                        <a href='#' title='View' data-bs-toggle='modal' data=bs=target='#pdfModal' class='btn rounded-pill bg-success btn-sm text-white viewPdfButton' data-id='$doc[id]'><i class='icofont-eye'></i> View</a>
                                                        <a href='#' class='btn rounded-pill bg-danger btn-sm text-white deleteDocument' data-bs-toggle='modal' data-bs-target='#DeleteDocument' data-id='$doc[id]'><i class='icofont-trash'></i> Remove</a>
                                                        </td>";
                                                    echo "</tr>";
                                                    $x++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row End -->
                    </div>                    
                </div><!-- Row End -->
            </div>
        </div>
