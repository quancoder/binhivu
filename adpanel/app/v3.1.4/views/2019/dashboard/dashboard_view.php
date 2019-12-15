<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Starter Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tinymce - Filemanager</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <textarea class="mceEditor" placeholder="Câu trả lời" rows="6" style="width: 100%;" id="tinymce1">
                            <img src="/public/images/300x250.JPG" alt="" width="800" height="381" />
                        </textarea>
                    </div>
                    <div class="card-footer">
                        Tinymce - Filemanager
                    </div>
                </div>
                <div id="content">
                </div>
            </div>
        </div>
    </div>
</div>

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
        filemanager_title:"Quản lý tài nguyên " ,
        external_plugins: {
            "responsivefilemanager": "<?php echo base_url(); ?>plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager" : "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });
</script>

