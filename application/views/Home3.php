<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Duotonal HTML Coming Soon Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" href="<?php echo base_url();?>assets/frontend/img/favicon.png">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/tingle.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/css/responsive.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,700" rel="stylesheet">
        
    </head>
    <body id="style3">

        <div class="preloader" id="preloader">
            <div></div>
            <div></div>
            <div></div>
            <div></div><br><br>
            <p>Please wait...</p>
        </div> <!-- end id Preloader / class Preloader -->

        <main id="home">

            <section>
                <div class="logo-wrapper">
                    <svg viewBox="50 0 792 612" width="50">
                        <style type="text/css">
                            .st0 { fill:#EE2A7B; }
                            .st1 { fill:#F1F2F2; }
                            .st2 { fill:#D7DF23; }
                        </style>
                        <g id="XMLID_4_">
                            <path class="st0" d="M433.4,2.2L433.4,2.2C264.8,2.2,128,138.9,128,307.6v0c0,89.4,38.4,169.7,99.6,225.6C289.1,406.7,398.2,173.7,452.8,2.8C446.4,2.4,439.9,2.2,433.4,2.2z"/>
                            <path class="st1" d="M650,92.3C599,40.9,529.7,7.6,452.8,2.8c-54.6,170.9-163.6,403.9-225.2,530.4
                                c4.7,4.3,9.5,8.4,14.5,12.4c6.1,4.9,12.4,9.5,18.8,14c76.4-33.4,318.7-153.8,447.7-384.7C693.7,144.1,673.8,116.2,650,92.3z"/>
                            <path class="st2" d="M433.4,613c168.7,0,305.4-136.7,305.4-305.4v0c0-47.6-10.9-92.6-30.3-132.8
                                c-129,230.9-371.3,351.3-447.7,384.7C310,593.3,369.4,613,433.4,613L433.4,613z"/>
                        </g>
                    </svg> <!-- end Logo SVG -->
                </div> <!-- end class Logo-Wrapper-->
                <div class="captioner">
                    <h2>We will be</h2>
                    <h2>coming <span class="brow">back</span></h2>
                    <h2>very soon.</h2>
                </div> <!-- end class Captioner -->

                <div class="countdown" id="countdown"></div> <!-- end id Countdown -->
                
                <div class="former">
                    <button class="button toggle-popup" id="button-subscribe">
                        <i class="mdi mdi-rss"></i> Notify Me!
                    </button>
                </div> <!-- end class Former -->
            </section> <!-- end Section of Main -->

        </main> <!-- end main -->

        <!-- start the Modal using Tingle.js -->
        <section class="content-section" id="subscribe">

            <div class="wrapper">
                <div class="title-wrapper">
                    <h2 class="section-title">Subscribe</h2>
                    <h5 class="section-sub-title">You Gotta be <br> the First!</h5>
                    <div class="section-description">
                        Be the first to know when will we online. <br> Put your email here and you'll get noticed once we're ready.
                    </div>
                </div> <!-- end class Title-Wrapper -->

                <div class="subscribe-form-wrapper">
                    <form action="<?php echo base_url();?>subscribe/send" method="post" id="subscribe-form" name="subscribe-form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
                        <div class="subscribe-form-info"></div>
                        <div class="subscribe-form-inner">
                            <div class="subscribe-form-field form-group">
                                <input type="email" class="form-control" name="email" data-parsley-trigger="blur" required="" placeholder="Enter your email...">
                            </div>
                            <div class="subscribe-form-submit">
                                <button type="submit" name="submit" id="subscribe-form-submit"><i class="mdi mdi-rss"></i>Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end class Subscribe-Form-Wrapper -->

                <ul class="social-icons">
                    <li>
                        <a href="#"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="mdi mdi-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="mdi mdi-pinterest"></i></a>
                    </li>
                </ul> <!-- end class Social-Icons-->

                <div class="balls">
                    <span></span>
                    <span></span>
                    <span></span>
                </div> <!-- end class Balss -->

            </div> <!-- end class Wrapper -->
        </section> <!-- end section id Subscribe / Modal -->
        <script src="<?php echo base_url();?>assets/frontend/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

        <!-- Main js files -->
        <script src="<?php echo base_url();?>assets/frontend/js/plugins.js"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/main.js"></script>

        <!-- Plugins by vendors -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/tingle.min.js"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/parsley.min.js"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/backstretch.min.js"></script>
        <script type="text/javascript">
            $("#style1 main").backstretch([
                "<?php echo base_url();?>assets/frontend/img/bg1.jpg",
                "<?php echo base_url();?>assets/frontend/img/bg2.jpg",
                "<?php echo base_url();?>assets/frontend/img/bg3.jpg",
                "<?php echo base_url();?>assets/frontend/img/bg4.jpg"
            ],  {
                    duration: 4000,
                    fade: 1400
            });
        </script>
        <script src="<?php echo base_url();?>assets/frontend/js/jquery.countdown.min.js"></script>

    </body> <!-- end Body -->
</html>
