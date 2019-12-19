<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thay đổi thông tin sách</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?=site_url('Book')?>">Sách</a></li>
                    <li class="breadcrumb-item active">Thay đổi thông tin sách</li>
                    <li class="ml-3 float-right">
                        <a href="<?= site_url('book/add', $langcode) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Thêm sách</a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $success > 0 ? 'block' : 'none'?>">
        <strong>Thành công!</strong>
        Bạn đã thêm thành công sách. <a href="<?=site_url('Book', $langcode)?>">Quay lại danh sách.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: <?= !empty($error) > 0 ? 'block' : 'none'?>">
        <strong>Thất bại!</strong>
        <a href="<?=site_url('Book', $langcode)?>">Quay lại danh sách.</a>
        <?php var_dump($error)?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>


    <form method="post" action="<?= site_url('book/edit/'.$info['b_id'], $langcode)?>" id="form">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Thông tin chính</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label class="col-form-label" for="b_status"><i class="fa fa-pencil"></i> Chuyển trạng thái</label>
                                <div class="form-group">
                                    <select class="form-control" name="b_status">
                                        <option value="1" <?= $info['b_status']==1 ? 'selected': ''?>>Hiển thị ra trang chủ</option>
                                        <option value="2" <?= $info['b_status']==2 ? 'selected': ''?>>Dừng hiển thị</option>
                                        <option value="3" <?= $info['b_status']==3 ? 'selected': ''?>>Lưu trữ thùng rác</option>
                                        <option value="4" <?= $info['b_status']==4 ? 'selected': ''?>>Lưu vào nháp</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="b_price"><i class="fa fa-pencil"></i> Giá sách</label>
                                    <input type="number" id="b_price" name="b_price" step="any" class="form-control" value="<?= $info['b_price'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="b_author"><i class="fa fa-pencil"></i> Tác giả</label>
                                    <input type="text" id="b_author" name="b_author" step="any" class="form-control" value="<?= $info['b_author'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="b_nxb"><i class="fa fa-pencil"></i> NXB</label>
                                    <input type="text" id="b_nxb" name="b_nxb" step="any" class="form-control" value="<?= $info['b_nxb'] ?>"/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="b_name"><i class="fa fa-pencil"></i> Tên sách</label>
                                    <textarea id="b_name" name="b_name"  class="form-control" placeholder="Tên sách:" required rows="4"><?= $info['b_name']?></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label" for="b_tag"><i class="fa fa-pencil"></i> Từ khóa</label>
                                    <input id="b_tag" name="b_tag" data-role="tagsinput"  value="<?= $info['b_tag'] ?>" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Ảnh và file </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label class="col-form-label"><i class="fa fa-image"></i> Ảnh</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="b_image" name="b_image" value="<?= $info['b_image'] ?>" required />
                                    <div class="input-group-prepend">
                                        <button class="quanlt-open-modal-filemanager btn btn-secondary" type="button"
                                                data-src='<?= FILEMANAGER_PATH.'extensions=["jpg","png"]&field_id=b_image&fldr=sach/images' ?>'> Chọn ảnh </button>
                                    </div>
                                </div>
                                <img id="image_preview" class="bg-white w-100 mt-2" src="<?=$info['b_image'] ?>" style="border: 2px solid #cccccc; display: <?= $info['b_image'] == '' ? 'none' : 'block'?>"/>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label class="col-form-label"><i class="fa fa-image"></i> Upload file sách</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="b_path_file" name="b_path_file" value="<?= $info['b_path_file'] ?>" required />
                                    <div class="input-group-prepend">
                                        <button class="quanlt-open-modal-filemanager btn btn-secondary" type="button"
                                                data-src='<?= FILEMANAGER_PATH.'extensions=["rar"]&field_id=b_path_file&fldr=sach/file' ?>'> Chọn file</button>
                                    </div>
                                </div>
                                <label class="col-form-label" for="b_free" style="margin-right: 15px">Cho phép tải miễn phí</label>
                                <div class="input-group">
                                    <label class="col-form-label" for="b_free"></label>
                                    <label class="checkbox-custom" >
                                        <input id="b_free"  name="b_free" type="checkbox" <?=$info['b_free'] == 1 ? 'checked' : '' ?> >
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Nội dung sách</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label" for="b_des"><i class="fa fa-pencil"></i> Mô tả</label>
                            <textarea id="b_des" name="b_des"  class="form-control" placeholder="Mô tả:" required rows="4"><?= $info['b_des'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <textarea id="b_content" name="b_content" class="form-control" ><?= $info['b_content'] ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" value="ok" class="btn btn-danger"><i class="fa fa-pencil"></i> Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<script type="text/javascript">

    function responsive_filemanager_callback(field_id){
        if(field_id == 'b_image')
        {
            var url = jQuery('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            jQuery('#'+field_id).val(url);
            $("#image_preview").attr('src', url).show();
        }else if(field_id == 'b_path_file')
        {
            var url = jQuery('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            jQuery('#'+field_id).val(url);
        }
    }

    $('#content img').addClass('img-fluid');

    tinymce.init({
        selector: '#b_content',
        menubar: true,
        width: '100%',
        theme: 'silver',
        language: 'vi',
        plugins: [
            "autoresize advlist autolink lists link image charmap print preview anchor visualblocks code fullscreen insertdatetime media table paste code help filemanager responsivefilemanager"
        ],
        toolbar1: 'insertfile undo redo | styleselect | forecolor backcolor emoticons| bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview fullscreen media print',
        image_advtab: true,
        relative_urls: false,
        external_filemanager_path: "<?php echo base_url(); ?>plugins/filemanager/",
        filemanager_title: "Quản lý tài nguyên ",
        filemanager_subfolder: "sach/images",
        external_plugins: {
            "responsivefilemanager": "<?php echo base_url(); ?>plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager": "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });
</script>

