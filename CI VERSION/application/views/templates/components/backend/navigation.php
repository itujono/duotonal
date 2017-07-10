<!-- main header -->
<header id="header_main">
  <div class="header_main_content">
    <nav class="uk-navbar">

      <!-- main sidebar switch -->
      <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
        <span class="sSwitchIcon"></span>
      </a>
      <!-- secondary sidebar switch -->
      <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
        <span class="sSwitchIcon"></span>
      </a>

      <div class="uk-navbar-flip">
        <ul class="uk-navbar-nav user_actions">
          <li><a href="#" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE192;</i>&nbsp; {elapsed_time} detik.</a></li>
          <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
          <li><a href="#" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">account_balance</i>&nbsp;Hello <?php echo $this->session->userdata('Email');?>!</a></li>
          <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
            <a href="#" class="user_action_image">
              <img class="md-user-image" src="<?php echo base_url();?>assets/templates/img/avatars/avatar_11_tn.png" alt="<?php echo $this->session->userdata('Email');?>"/>
            </a>
            <div class="uk-dropdown uk-dropdown-small">
              <ul class="uk-nav js-uk-prevent">
                <li><a href="<?php echo base_url();?>changepassword">Rubah kata sandi</a></li>
                <li><a href="<?php echo base_url(); ?>login/logout">Keluar</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header><!-- main header end -->
<!-- main sidebar -->
<aside id="sidebar_main">

  <div class="sidebar_main_header">
    <div class="sidebar_logo">
      <a href="index.html" class="sSidebar_hide"><img src="<?php echo base_url();?>assets/templates/img/logo_main.png" alt="" height="15" width="71"/></a>
      <a href="index.html" class="sSidebar_show"><img src="<?php echo base_url();?>assets/templates/img/logo_main_small.png" alt="" height="32" width="32"/></a>
    </div>
  </div>

  <div class="menu_section">
    <ul>
      <li title="Dashboard">
      <a href="<?php echo base_url();?>bot/dashboard">
          <span class="menu_icon"><i class="material-icons">dashboard</i></span>
          <span class="menu_title">Dashboard</span>
        </a>
      </li>
    </ul>
  </div>
</aside><!-- main sidebar end -->