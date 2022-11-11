        </div>
    </div>
    <div id="footer">
        <p><?php echo __('Copyright &copy;'); ?> <?php echo date('Y'); ?> <?php
        echo Format::htmlchars((string) $ost->company ?: 'osTicket.com'); ?> - <?php echo __('All rights reserved.'); ?></p>
    </div>
<div id="overlay"></div>
<div id="loading">
    <h4><?php echo __('Please Wait!');?></h4>
    <p><?php echo __('Please wait... it will take a second!');?></p>
</div>
<?php
if (($lang = Internationalization::getCurrentLanguage()) && $lang != 'en_US') { ?>
    <script type="text/javascript" src="<?php echo ROOT_PATH; ?>ajax.php/i18n/<?php
        echo $lang; ?>/js"></script>
<?php } ?>
<script type="text/javascript">
    getConfig().resolve(<?php
        include INCLUDE_DIR . 'ajax.config.php';
        $api = new ConfigAjaxAPI();
        print $api->client(false);
    ?>);
</script>

<script type="application/javascript">
      window.tiledeskSettings= 
      {
          projectid: "636dcf724c48ae0014e96f77"
      };
      (function(d, s, id) { 
          var w=window; var d=document; var i=function(){i.c(arguments);};
          i.q=[]; i.c=function(args){i.q.push(args);}; w.Tiledesk=i;                    
          var js, fjs=d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js=d.createElement(s); 
          js.id=id; js.async=true; js.src="https://widget.tiledesk.com/v5/launch.js";
          fjs.parentNode.insertBefore(js, fjs);
      }(document,'script','tiledesk-jssdk'));
  </script>

</body>
</html>
