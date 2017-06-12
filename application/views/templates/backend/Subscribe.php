<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    $title1 = 'Subscriber';
    $actions = 'sendingnewsletter';
    $controller = 'subscribe';

    $url = base_url().$controller.'/'.$actions;
?>
<div class="uk-width-medium-1-1">
  <h4 class="heading_a uk-margin-bottom"><?php echo $title1;?></h4>

  <?php if (!empty($message)){ ?>
      <div class="uk-alert uk-alert-<?php echo $message['type']; ?>" data-uk-alert>
        <a href="#" class="uk-alert-close uk-close"></a>
        <h4><?php echo $message['title']; ?></h4>
        <?php echo $message['text']; ?>
      </div>
  <?php } ?>

  <div class="md-card">
    <div class="md-card-content">
      <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_4'}">
        <li class="uk-width-1-2 uk-active>"><a href="#">Daftar Subscriber</a></li>
        <li class="uk-width-1-2"><a href="#">Form Subscriber</a></li>
      </ul>
      <ul id="tabs_4" class="uk-switcher uk-margin">
      <!-- START LIST SLIDER -->
        <li>
          <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Status</th>
                <th>Dibuat</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
	              <th>Email</th>
                <th>Status</th>
	              <th>Dibuat</th>
              </tr>
            </tfoot>
            <tbody>
            <?php 
            if(!empty($subscriber)){
              foreach ($subscriber  as $key => $subscribe) {
            ?>
             <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $subscribe->emailSUBSCRIBE; ?></td>
                <td><?php echo $subscribe->status;?></td>
                <td><?php echo date('d F Y', strtotime($subscribe->createdateSUBSCRIBE));?></td>
              </tr>
            <?php } ?>
            <?php } ?>
            </tbody>
          </table>
        </li>
        <!-- END LIST SLIDER -->

        <!-- START FORM INPUT AREA -->
        <li>
          <h3 class="heading_a uk-margin-bottom">Broadcast Subscriber</h3>
          <form method="post" name="formsubscribe" action="<?php echo $url;?>" enctype="multipart/form-data" id="form_validation">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
           <div class="uk-grid" data-uk-grid-margin>
             <div class="uk-width-medium-1-1 uk-margin-top">
              <label>Judul</label>
              <br>
                <input type="text" class="md-input label-fixed" name="subject" required autocomplete/>
                <p class="text-red"><?php echo form_error('subject'); ?></p>
              </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
              <div class="uk-width-medium-1-1 uk-margin-top">
                <label>Deskripsi</label>
                <br>
                <textarea cols="30" rows="4" name="textmessage" class="md-input label-fixed"></textarea>
                <p class="text-red"><?php echo form_error('textmessage'); ?></p>
              </div>
              </div>
              <div class="uk-width-medium-1-1 uk-margin-top">
               <div class="uk-form-row">
                 <span class="uk-input-group-addon"><?php echo form_submit('submit', 'SIMPAN', 'class="md-btn md-btn-primary" id="show_preloader_md"'); ?></span>
               </div>
              </div>
              </div>
            </div>
          </div>
        </form>
      </li>
      <!-- END FORM INPUT AREA -->
    </ul>
  </div>
</div>
</div>