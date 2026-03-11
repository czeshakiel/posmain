    </div>
</div>
<style type="text/css">
    /* .swal2-title{
        font-size:10px;
    } */
</style>
<!-- Jquery Core Js -->
<script src="<?=base_url('design/assets/bundles/libscripts.bundle.js');?>"></script>

<!-- Plugin Js-->
<script src="<?=base_url('design/assets/bundles/dataTables.bundle.js');?>"></script>

<!-- Jquery Page Js -->
<!-- <script src="<?=base_url('design/js/template.js');?>"></script> -->
<!-- <script src="<?=base_url('design/js/sweetalert.min.js');?>"></script> -->
 <script src="https://unpkg.com/sweetalert2@7.1.2/dist/sweetalert2.all.js"></script>
<script>
     // project data table
     $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    });
    function sbview(){
        const sidebar = document.querySelector('.sidebar');
        if(sidebar.style.transform == 'translateX(-100%)'){sidebar.style.transform = 'translateX(0)';}
        else{sidebar.style.transform = 'translateX(-100%)';}
    }
    const sidebar = document.querySelector('.sidebar');
    const mediaQuery = window.matchMedia("(min-width: 1275.99px)");
    const handleMediaQueryChange = (mediaQuery) => {
    if (mediaQuery.matches) {sidebar.style.transform = 'translateX(0)';} 
    else {sidebar.style.transform = 'translateX(-100%)';}
    }

    mediaQuery.addListener(handleMediaQueryChange);
    handleMediaQueryChange(mediaQuery);

     $('.viewPdfButton').on('click', function() {
        var pdfId = $(this).data('id'); // Get the ID from a data attribute
        $('#pdfFrame').attr('src', '<?=base_url('view_document/');?>' + pdfId);
        $('#pdfModal').modal('show');
    });
    $('.deleteDocument').click(function(){
        var id=$(this).data('id');
        document.getElementById('doc_id').value=id;
    });
</script>

<?php
if($this->session->flashdata('success')):
    ?>
        <script type="text/javascript">
            swal({
            title: 'Success',
            text: '<?=$this->session->success;?>',              
            imageWidth: 50,
            imageHeight: 50,          
            timer: 3000,
            buttons: false
          });
        </script>
        <?php
endif;
?>

<?php
if($this->session->flashdata('failed')):
    ?>
        <script type="text/javascript">
            swal({
            title: 'ERROR',
            text: '<?=$this->session->failed;?>',             
            imageWidth: 50,
            imageHeight: 50,          
            timer: 3000,
            buttons: false
          });
        </script>
        <?php
endif;
?>
<?php
if($this->session->flashdata('login')):
    ?>
        <script type="text/javascript">
            swal({
            title: 'Important Reminders!',
            html: '<p style="font-size:14px; text-align:left;">1. Address your application letter to <font style="font-weight:bold;">IRENE JOY B. DOMINGUEZ, RN, MAHA</font>, Corporate HR Director<br>2. Update your information and ensure that all required documents are uploaded.<br>3. Your account may be permanently deleted if it remains inactive for 10 months.<br>4. Once your profile is complete and documents are uploaded, we will contact you for an interview if you meet the qualifications for a vancant role. Thank you.</p>',  
            textAlign: "left",
            width: 800,
            showCancelButton: false,
          });
        </script>
                <?php
endif;
?>

</body>
</html>