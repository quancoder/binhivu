<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
	
    </div><!-- END content-page -->
			
    <div class="row" style="display: none">
        <div class="col-12 col-sm-12 col-md-6">
            &copy;2019 BinhiVu All rights reserved
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            Powered by <a target="_blank" href="https://BinhiVu.com"><b>BinhiVu.com</b></a>
        </div>
    </div>

	</div><!-- end div#main -->
	<div id="bg-loading">
        <img src="images/<?php echo ltrim(URI_PATH . '/', '/'); ?>loading.gif" alt="loading" />
    </div>
	
    <script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>pikeadmin.js"></script>
    <script>
        $( window ).resize(function() {
            set_min_height();
        });
    </script>
</body>
</html>
<?php
	ob_end_flush();
?>