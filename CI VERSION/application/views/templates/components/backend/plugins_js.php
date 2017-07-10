<script src="<?php echo base_url(); ?>assets/templates/js/common.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/js/uikit_custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/js/altair_admin_common.js"></script>

<?php 
$datatables = '
<script src="'.base_url().'assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="'.base_url().'assets/templates/js/custom/datatables/datatables.uikit.min.js"></script>
<script src="'.base_url().'assets/templates/js/pages/plugins_datatables.min.js"></script>
';
$forms_advanced='<script src="'.base_url().'assets/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="'.base_url().'assets/templates/js/pages/forms_advanced.min.js"></script>';
?>
<script src="<?php echo base_url(); ?>assets/templates/js/pages/components_preloaders.min.js"></script>
<?php
if($plugins == 'plugins_datatables'){
    ?>
    <?php echo $datatables;?>
    
    <?php echo $forms_advanced;?>
    <script>
        // load parsley config (altair_admin_common.js)
        altair_forms.parsley_validation_config();
    </script>
    <script src="<?php echo base_url(); ?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/templates/js/pages/forms_validation.min.js"></script>
<?php } ?>