<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm tài liệu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?=site_url('document')?>">Tài liệu</a></li>
                    <li class="breadcrumb-item active">Thêm tài liệu</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $success > 0 ? 'block' : 'none'?>">
        <strong>Thành công!</strong>
        Bạn đã thêm thành công tài liệu. <a href="<?=site_url('document', $langcode)?>">Quay lại danh sách.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: <?= !empty($error) > 0 ? 'block' : 'none'?>">
        <strong>Thất bại!</strong>
        <a href="<?=site_url('document', $langcode)?>">Quay lại danh sách.</a>
        <?php var_dump($error)?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>


    <form method="post" action="<?= site_url('document/add', $langcode)?>" id="form">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Thông tin cơ bản</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="doc_name"><i class="fa fa-pencil"></i> Tên tài liệu</label>
                                    <textarea id="doc_name" name="doc_name"  class="form-control" placeholder="Tên tài liệu:" required><?= $info['doc_name']?></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="doc_tag"><i class="fa fa-pencil"></i> Từ khóa (cách nhau bởi dấu phẩy)</label>
                                    <input id="doc_tag" name="doc_tag" data-role="tagsinput"  value="<?= $info['doc_tag'] ?>" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="doc_price"><i class="fa fa-pencil"></i> Giá tài liệu</label>
                                    <input type="number" id="doc_price" name="doc_price" step="any" class="form-control" value="<?= $info['doc_price'] ?>"/>
                                </div>

                                <div class="input-group">
                                    <label class="col-form-label" for="doc_free" style="margin-right: 15px">Cho phép tải miễn phí</label>
                                    <label class="checkbox-custom" >
                                        <input id="doc_free"  name="doc_free" type="checkbox" checked="<?= $info['doc_free'] ==1 ? 'checked' : '' ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Ảnh và file</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label class="col-form-label"><i class="fa fa-image"></i> Upload tài liệu</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="doc_path_file" name="doc_path_file" value="<?= $info['doc_path_file']?>" required/>
                                    <div class="input-group-prepend">
                                        <button class="quanlt-open-modal-filemanager btn btn-secondary" type="button"
                                                data-src='<?= FILEMANAGER_PATH.'extensions=["rar"]&field_id=doc_path_file&fldr=tai-lieu/du-lieu' ?>'> Chọn file </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label class="col-form-label"><i class="fa fa-image"></i> Ảnh</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="doc_image" name="doc_image" value="<?= $info['doc_image'] ?>" required/>
                                    <button class="quanlt-open-modal-filemanager btn btn-secondary" type="button"
                                            data-src='<?= FILEMANAGER_PATH.'extensions=["jpg","png"]&field_id=doc_image&fldr=tai-lieu/anh' ?>'> Chọn ảnh </button>
                                    <div style="margin: 10px 0;">
                                        <img id="image_preview" class="bg-white w-100" src="<?=$info['doc_image'] ?>" style="border: 2px solid #cccccc; display: <?= $info['doc_image'] == '' ? 'none' : 'block'?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Nội dung tài liệu</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label" for="doc_des"><i class="fa fa-pencil"></i> Mô tả</label>
                            <textarea id="doc_des" name="doc_des"  class="form-control" placeholder="Mô tả:" required rows="4"><?= $info['doc_des'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <textarea id="doc_content" name="doc_content" class="form-control" ><?= $info['doc_content'] ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="doc_status_1" value="ok" class="btn btn-danger float-left"><i class="fa fa-pencil"></i> Đăng lên trang chủ</button>

                        <div class="float-right">
                            <button type="reset" class="btn btn-default"><i class="fa fa-pencil" ></i> Nhập lại</button>
                            <button type="submit" name="doc_status_4" value="ok" class="btn btn-default"><i class="fa fa-pencil"></i> Lưu nháp</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    function responsive_filemanager_callback(field_id){
        if(field_id == 'doc_image')
        {
            var url = jQuery('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            jQuery('#'+field_id).val(url);
            $("#image_preview").attr('src', url).show();
        }else if(field_id == 'doc_path_file')
        {
            var url = jQuery('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            jQuery('#'+field_id).val(url);
        }
    }

    $('#content img').addClass('img-fluid');

    tinymce.init({
        selector: '#doc_content',
        menubar: true,
        width: '100%',
        theme: 'silver',
        language: 'vi',
        plugins: [
            "autoresize advlist autolink lists link image charmap print preview anchor visualblocks code fullscreen insertdatetime media table paste code help filemanager responsivefilemanager"
        ],
        toolbar1: 'fontselect fontsizeselect |insertfile undo redo | styleselect | forecolor backcolor emoticons| bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview fullscreen media print',
        image_advtab: true,
        relative_urls: false,
        external_filemanager_path: "<?php echo base_url(); ?>plugins/filemanager/",
        filemanager_title: "Quản lý tài nguyên ",
        filemanager_subfolder: "tai-lieu/anh",
        external_plugins: {
            "responsivefilemanager": "<?php echo base_url(); ?>plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager": "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });
</script>

