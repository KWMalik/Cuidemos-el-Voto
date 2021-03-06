<?php 
/**
 * Alerts view page.
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     API Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?>

<div id="content">
  <div class="content-bg">
    <!-- start alerts block -->
    <div class="big-block">
      <div class="big-block-top">
	<div class="big-block-bottom">
	  <h1><?php echo Kohana::lang('ui_main.alerts_get'); ?></h1>
	  <?php
	     if ($form_error) {
	     ?>
	  <!-- red-box -->
	  <div class="red-box">
	    <h3>Error!</h3>
	    <ul>
	      <?php
                 foreach ($errors as $error_item => $error_description)
	      {
	      // print "<li>" . $error_description . "</li>";
	      print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
	      }
	      ?>
	    </ul>
	  </div>
	  <?php
	     }
	     ?>
	  <div class="step-1">
	    <h2><?php echo Kohana::lang('ui_main.alerts_step1_select_city'); ?></h2>
	    <div class="location">
	      <form>
		<label><?php echo Kohana::lang('ui_main.alerts_alert_me'); ?></label>
		<?php print form::dropdown('alert_city',$cities,''); ?>
	      </form>
	    </div>
	    <div class="map">
	      <p><?php echo Kohana::lang('ui_main.alerts_place_spot'); ?></p>
	      <div class="map-holder" id="divMap"></div>
	    </div>
	  </div>
	  <?php print form::open() ?>
	  <input type="hidden" id="alert_lat" name="alert_lat" value="<?php echo $form['alert_lat']; ?>">
	  <input type="hidden" id="alert_lon" name="alert_lon" value="<?php echo $form['alert_lon']; ?>">
	  <div class="step-2-holder">
	    <div class="step-2">
	      <h2><?php echo Kohana::lang('ui_main.alerts_step2_send_alerts'); ?></h2>
	      <div class="holder">
		<div class="box">
		  <label>
		    <?php
		       if ($form['alert_mobile_yes'] == 1) {
		       $checked = true;
		       }
		       else
		       {
		       $checked = false;
		       }
		       print form::checkbox('alert_mobile_yes', '1', $checked);
		       ?>
		    <span><strong><?php echo Kohana::lang('ui_main.alerts_mobile_phone'); ?></strong><br /><?php echo Kohana::lang('ui_main.alerts_enter_mobile'); ?></span>
		  </label>
		  <span><?php print form::input('alert_mobile', $form['alert_mobile']); ?></span>
		</div>
		<div class="box">
		  <label>
		    <?php
		       if ($form['alert_email_yes'] == 1) {
		       $checked = true;
		       }
		       else
		       {
		       $checked = false;
		       }
		       print form::checkbox('alert_email_yes', '1', $checked);
		       ?>
		    <span><strong><?php echo Kohana::lang('ui_main.alerts_email'); ?></strong><br /><?php echo Kohana::lang('ui_main.alerts_enter_email'); ?></span>
		  </label>
		  <span><?php print form::input('alert_email', $form['alert_email']); ?></span>
		</div>
		<?php
		if ($allow_feed == 1 )
		{
		?>
		<div class="box">
		  <label>
		    <input type="checkbox" checked="checked" readonly="readonly" />
		    <span><?php echo Kohana::lang('ui_main.alerts_rss'); ?></span>
		  </label>
		  <span><input type="text" value="http://<?php echo $_SERVER['SERVER_NAME']; ?>/feed/" readonly="readonly" /></span>
		</div>
		<?php
		}
		?>
	      </div>
	    </div>
	    <input id="btn-send-alerts" type="submit" value="<?php echo Kohana::lang('ui_main.alerts_btn_send'); ?>" />
	  </div>
	  <?php print form::close(); ?>
	</div>
      </div>
    </div>
    <!-- end alerts block -->
  </div>
</div>
