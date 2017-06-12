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
<?php                   
} else if($plugins == 'plugins_pagesettings') {
?>
    <script src="<?php echo base_url(); ?>assets/templates/js/pages/page_settings.min.js"></script>
    <script>
        // load parsley config (altair_admin_common.js)
        altair_forms.parsley_validation_config();
    </script>
    <script src="<?php echo base_url(); ?>assets/bower_components/parsleyjs/dist/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/templates/js/pages/forms_validation.min.js"></script>
<?php } ?>

<!-- jquery.idle -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-idletimer/dist/idle-timer.min.js"></script>
<script>
    $(function() {
        if(isHighDensity()) {
            $.getScript( "<?php echo base_url();?>assets/bower_components/dense/src/dense.js", function() {
                // enable hires images
                altair_helpers.retina_images();
            })
        }
        if(Modernizr.touch) {
            // fastClick (touch devices)
            FastClick.attach(document.body);
        }
    });
    $window.load(function() {
        // ie fixes
        altair_helpers.ie_fix();
    });
</script>
<script type="text/javascript">
  // append modal to <body>
  $body.append('<div class="uk-modal" id="modal_idle">' +
    '<div class="uk-modal-dialog">' +
    '<div class="uk-modal-header">' +
    '<h3 class="uk-modal-title">Sesi aktifitas kamu akan segera berakhir</h3>' +
    '</div>' +
    '<p>Sistem membaca tidak ada aktifitas untuk beberapa saat. Demi keamanan kamu, sistem akan mengeluarkan kamu secara otomatis.</p>' +
    '<p>Klik "Tetap disini" untuk melanjutkan aktifitas kamu.</p>' +
    '<p>Aktifitas kamu akan berakhir pada <span class="uk-text-bold md-color-red-500" id="sessionSecondsRemaining"></span> detik.</p>' +
    '<div class="uk-modal-footer uk-text-right">' +
    '<button id="staySigned" type="button" class="md-btn md-btn-flat uk-modal-close">Tetap disini</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary" id="logoutSession">Keluar</button>' +
    '</div>' +
    '</div>' +
    '</div>');

  var modal = UIkit.modal("#modal_idle", {
    bgclose: false
}),
  session = {
        //Logout Settings
        inactiveTimeout: 10800000,      //(ms) The time until we display a warning message
        warningTimeout: 120000,      //(ms) The time until we log them out
        minWarning: 5000,           //(ms) If they come back to page (on mobile), The minumum amount, before we just log them out
        warningStart: null,         //Date time the warning was started
        warningTimer: null,         //Timer running every second to countdown to logout
        autologout: {
            logouturl: "<?php echo base_url();?>login/logout"
        },
        logout: function () {       //Logout function once warningTimeout has expired
            window.location = session.autologout.logouturl;
        }
    },
    $sessionCounter = $('#sessionSecondsRemaining').html(session.warningTimeout/1000);

    $(document).on("idle.idleTimer", function (event, elem, obj) {
    //Get time when user was last active
    var diff = (+new Date()) - obj.lastActive - obj.timeout,
    warning = (+new Date()) - diff;

    //On mobile js is paused, so see if this was triggered while we were sleeping
    if (diff >= session.warningTimeout || warning <= session.minWarning) {
        modal.hide();
    } else {
        //Show dialog, and note the time
        $sessionCounter.html(Math.round((session.warningTimeout - diff) / 1000));
        modal.show();
        session.warningStart = (+new Date()) - diff;

        //Update counter downer every second
        session.warningTimer = setInterval(function () {
            var remaining = Math.round((session.warningTimeout / 1000) - (((+new Date()) - session.warningStart) / 1000));
            if (remaining >= 0) {
                $sessionCounter.html(remaining);
            } else {
                session.logout();
            }
        }, 1000)
    }
});

    $body
    //User clicked ok to stay online
    .on('click','#staySigned', function () {
        clearTimeout(session.warningTimer);
        modal.hide();
    })
    //User clicked logout
    .on('click','#logoutSession', function () {
        session.logout();
    });

//Set up the timer, if inactive for 5 seconds log them out
$(document).idleTimer(session.inactiveTimeout);
</script>