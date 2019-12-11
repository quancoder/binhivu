<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Start content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcrumb-holder">
					<h1 class="main-title float-left">Dashboard</h1>
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- end row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    tinymce - filemanager
                    <textarea class="mceEditor" placeholder="Câu trả lời" rows="6" style="width: 100%;" id="tinymce1">
                        <img src="/public/images/300x250.JPG" alt="" width="800" height="381" />
                    </textarea>
                </div>
                <div id="content">
                </div>
            </div>
        </div>    
    </div>
	<!-- END container-fluid -->

</div>
<!-- END content -->
<script src="<?php echo base_url() . "js/" . $template_f; ?>/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $('#content img').addClass('img-fluid');
    tinymce.init({
        selector: 'textarea.mceEditor',
        height: 400,
        menubar: true,
        width: '100%',
        theme: 'silver',
        language: 'vi',
//        plugins: [
//            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//            'searchreplace wordcount visualblocks visualchars code fullscreen',
//            'insertdatetime media nonbreaking save table contextmenu directionality',
//            'emoticons template paste textcolor colorpicker textpattern imagetools'
//        ],
        plugins: [
            "advlist autolink link image media filemanager code responsivefilemanager"
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        relative_urls: false,
        external_filemanager_path:"<?php echo base_url(); ?>plugins/filemanager/",
        filemanager_title:"Quản lý file " ,
        external_plugins: {
            "responsivefilemanager": "<?php echo base_url(); ?>plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager" : "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });
</script>

