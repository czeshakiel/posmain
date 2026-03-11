<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Leaving so soon?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Do you wish to logout?</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, I will stay.</button>
                <a href="<?=base_url('logout');?>" class="btn btn-danger text-white">Yes, I will go.</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditProfile" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="basic-form" method="post" novalidate action="<?=base_url('update_profile');?>">
            <div class="modal-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <div class="form-group mb-1">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="app_lastname" required value="<?=$applicant['app_lastname'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="app_firstname" required value="<?=$applicant['app_firstname'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="app_middlename" value="<?=$applicant['app_middlename'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Suffix</label>
                            <input type="text" class="form-control" name="app_suffix" value="<?=$applicant['app_suffix'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="app_address" rows="3" cols="30" required><?=$applicant['app_address'];?></textarea>
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Birthdate</label>
                            <input type="date" class="form-control" name="app_birthdate" required value="<?=$applicant['app_birthdate'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Contact No.</label>
                            <input type="text" class="form-control" name="app_contact" required value="<?=$applicant['app_contact'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="app_email" required value="<?=$applicant['app_email'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">School Graduated</label>
                            <input type="text" class="form-control" name="school_name" required value="<?=$applicant['school_name'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Course</label>
                            <input type="text" class="form-control" name="course" required value="<?=$applicant['course'];?>">
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Year Graduated</label>
                            <input type="text" class="form-control" name="year_graduated" required value="<?=$applicant['year_graduated'];?>">
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="modal-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <div class="form-group mb-1">
                            <label class="form-label">Select Preferred Branch To Apply</label>                               
                            <select name="branch" class="form-control" required>                                
                                <option value="<?=$applicant['branch'];?>"><?=$applicant['branch'];?></option>
                                <option value="Kidapawan Medical Specialists Center, Inc.">Kidapawan Medical Specialists Center, Inc.</option>
                                <option value="Makilala Medical Specialists Hospital, Inc.">Makilala Medical Specialists Hospital, Inc.</option>
                                <option value="Antipas Medical Specialists Hospital, Inc.">Antipas Medical Specialists Hospital, Inc.</option>
                                <option value="Centeno Medical Specialists Hospital, Inc.">Centeno Medical Specialists Hospital, Inc.</option>
                                <option value="Magsaysay Medical Hospital, Inc.">Magsaysay Medical Hospital, Inc.</option>
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">Select Preferred Department to Apply</label>                            
                            <select name="department" class="form-control" required>
                                <option value="<?=$applicant['department'];?>"><?=$applicant['department'];?></option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="NURSING">NURSING</option>
                                <option value="LABORATORY">LABORATORY</option>
                                <option value="PHYSICAL THERAPY">PHYSICAL THERAPY</option>
                                <option value="RESPIRATORY">RESPIRATORY</option>
                                <option value="IT">IT</option>
                                <option value="PHARMACY">PHARAMCY</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger text-white">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="UploadDocument" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Document Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="basic-form" method="post" novalidate action="<?=base_url('upload_document');?>" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <div class="form-group mb-1">
                            <label class="form-label">Document Title</label>
                            <input type="text" class="form-control" name="doc_title" required>
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="file" required accept="application/pdf">
                            <label style="color:red;">* Upload only .pdf file.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Upload</a>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfFrame" src="" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="DeleteDocument" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url('delete_document');?>" method="POST">
                <input type="hidden" name="id" id="doc_id">
            <div class="modal-body">
                <h2>Do you wish to REMOVE this document?</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, It will stay!</button>
                <button type="submit" class="btn btn-danger text-white">Yes, Remove it!</a>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ChangePassword" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url('change_password');?>" method="POST">                
            <div class="modal-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-12">
                        <div class="form-group mb-1">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="oldpass" required>
                        </div>
                        <div class="form-group mb-1">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="newpass" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger text-white">Change</a>
            </div>
            </form>
        </div>
    </div>
</div>