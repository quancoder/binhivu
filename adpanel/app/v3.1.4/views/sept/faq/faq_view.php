<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
    #parent, .group-category {
        list-style-type: none;
    }
    #parent{
        padding-left: 0px;
    }
    #parent input{
        font-size: 0.9em;
    }
    #parent li{
        cursor: move;
    }

    #parent li.parent-li{
        display: block;
        margin: 0px 0px 20px 0px;
        padding: 5px 0 0 0;
        color: #0088cc;
        background-color: #dadada;
        border: 1px solid #f8f8f8;
    }
    #parent .parent-li .name-parent{
        cursor: pointer;
        font-size: 1em;
        padding-left: 5px;
        font-weight: bold;
    }

    #parent .material-icons{
        font-size: 1.2em;
    }

    .group-category{
        margin-top: 5px;
        background-color: #f8f8f8;
        border-top: 1px solid #afafaf;
    }
    .group-category .name-category{
        cursor: pointer;
    }
    .group-category .category-li{
        font-size: 0.9em;
        display: block;
        padding: 5px 5px;
        font-weight: normal;
        border-left: none;
        border-bottom: 1px solid #e0e0e0;
    }
    .group-category li.active{
        background-color: #dadada;
        border-left: 2px solid #e80000
    }
    .action{
        float: right;
        padding: 0 5px;
        font-size: 0.9em !important;
        font-weight: bold;
    }
    .add-state{
        text-align: center;
        padding: 5px 0px;
        cursor: pointer;
        font-weight: bold;
        background-color: #f8f8f8;
    }
    .add-form-category{
        margin: 5px;
    }
</style>
<!-- Start content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcrumb-holder">
					<h1 class="main-title float-left">Các câu hỏi thường gặp</h1>
					<ul class="breadcrumb float-right">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- end row -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <ul id="parent" class="sortable">
                            <?php foreach ($list_parent as $parent) { ?>
                                <?php $parent_id = $parent['cat_id']?>
                                <li class="parent-li" id="parent-<?=$parent_id?>" data-parent="<?=$parent_id?>">
                                    <a class="name-parent" id="name-parent-<?=$parent_id?>"><?=ucwords($parent['name'])?></a>
                                    <div class="form-edit-parent" id="form-edit-parent-<?=$parent_id?>" style="display: none; float: left; width: 100%; margin-left: 5px">
                                        <input type="text" id="txt-edit-parent-<?=$parent_id?>" value="<?=ucwords($parent['name'])?>" style="width: 70%"/>
                                        <input class='btn-edit-parent' type='submit' value='OK' onclick="ajax_edit_parent(<?=$parent_id?>)"/>
                                        <input type='button' value='Hủy' onclick="$('#name-parent-'+<?=$parent_id?>).show(); $('#form-edit-parent-'+<?=$parent_id?>).hide()"/>
                                    </div>
                                    <span class="action-group" style="display: none">
                                        <a href="javascript:void(0);" class="action"  onclick="ajax_delete_parent(<?=$parent_id?>)"><i class="material-icons">delete</i></a>
                                        <a href="javascript:void(0);" class="action"
                                           onclick="$('#form-edit-parent-'+<?=$parent_id?>).show();$('#name-parent-'+<?=$parent_id?>).hide(); $(this).parent().hide()"><i class="material-icons">edit</i></a>
                                    </span>
                                    <div style="clear: both"></div>
                                    <ul id="group-category-<?=$parent_id?>" class="group-category sortable">
                                        <?php foreach ($parent['category'] as $cat){ ?>
                                            <?php $cat_id = $cat['cat_id']?>
                                            <li id="category-<?=$cat_id?>" class="category-li" data-category="<?=$cat_id?>">
                                                <a class="name-category" id="name-category-<?=$cat_id?>"
                                                   onclick="ajax_get_question_by_category('<?=$parent_id ?>','<?=$cat_id?>', '<?=ucwords($cat['name'])?>')"><?=ucwords($cat['name'])?></a>
                                                <div id="form-edit-category-<?=$cat_id?>" style="display: none; float: left; width: 100%">
                                                    <input type="text" class="" id="txt-edit-category-<?=$cat_id?>" value="<?=ucwords($cat['name'])?>" style="width: 70%"/>
                                                    <input type='button' value='OK' onclick="ajax_edit_category(<?=$cat_id?>, <?=$parent_id?>)"/>
                                                    <input type='button' value='Hủy' onclick="$('#name-category-'+<?=$cat_id?>).show(); $('#form-edit-category-'+<?=$cat_id?>).hide()"/>
                                                </div>
                                                <span class="action-group" style="display: none">
                                                    <a href="javascript:void(0);" class="action"  onclick="ajax_delete_category(<?=$cat_id?>)"><i class="material-icons">delete</i></a>
                                                    <a href="javascript:void(0);" class="action"
                                                       onclick="$('#form-edit-category-'+<?=$cat_id?>).show(); $('#name-category-'+<?=$cat_id?>).hide();$(this).parent().hide()"><i class="material-icons">edit</i></a>
                                                </span>
                                                <div style="clear: both"></div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="add-state" id="add-state-category-<?=$parent_id?>"
                                         onclick="$('#form-add-category-<?=$parent_id?>').show(); $(this).hide()">
                                        <button class="btn btn-primary btn-sm" style="font-size: 10px;">+ Thêm danh mục mới</button>
                                    </div>
                                    <div class="add-form add-form-category" id="form-add-category-<?=$parent_id?>" style="display: none">
                                        <input type="text" placeholder="Thêm danh mục" id="txt-add-category-<?=$parent_id?>" style="width: 65%"/>
                                        <input class='btn-add-category' type='submit' value='Thêm' data-category="<?=$parent_id?>"
                                               onclick="ajax_add_category(<?=$parent_id?>, $('#txt-add-category-<?=$parent_id?>').val())"/>
                                        <input class='' type='button' value='Hủy'
                                               onclick="$('#form-add-category-<?=$parent_id?>').hide(); $('#add-state-category-<?=$parent_id?>').show();"/>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="add-state" id="add-state-parent" onclick="$('#form-add-parent').show(); $(this).hide()" style="    background-color: #dadada;">
                            <button class="btn btn-warning btn-sm" style="font-size: 11px;">+ Thêm nhóm danh mục mới</button>
                        </div>
                        <div class="add-form" id="form-add-parent" style="margin: 10px 0; padding: 5px; background: #dadada; display: none">
                            <input type="text" placeholder="Thêm nhóm danh mục" id="txt-add-parent" style="width: 65%"/>
                            <input type='button' value='Thêm' onclick="ajax_add_parent($('#txt-add-parent').val())"/>
                            <input  type='button' value="Hủy" onclick="$('#add-state-parent').show();$('#form-add-parent').hide()" />
                        </div>
                    </div>

                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                        <div id="box-question" data-parent="" data-category="">
                            <h1 style="font-size: 18px; font-weight: bold; text-align: center" id="question-name"></h1>
                            <section></section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- END container-fluid -->
</div>
<!-- END content -->
<script>
    //drag drop
    $(function  () {
        //sortable
        $("#parent, .group-category").sortable({
            axis: "y",
            update: function(event, ui) {
                var data = $(this).sortable('toArray');
                ajax_list_category_priority_set(data);
            }
        });

        //hove li
        $('.parent-li, .category-li').hover(
            function() {
                var a = $(this).find('a').first().css('display');
                if(a!=='none'){
                    $(this).find('.action-group:eq(0)').show();
                }
            }, function() {
                $(this).find('.action-group:eq(0)').hide();
            }
        );

        //init question box
        var parent_first = $(".parent-li").first().attr("data-parent");
        var cat_first = $(".category-li").first().attr("data-category");
        var name_first = $("#name-category-"+cat_first).html();
        if(cat_first !== '' && cat_first !== 'undefined'){
            ajax_get_question_by_category(parent_first, cat_first,name_first );
        }
    });

    function ajax_list_category_priority_set(productOrder) {
        var data = [];
        productOrder = productOrder.filter(Boolean);
        productOrder.forEach(function (id, i) {
            id = id.replace('category-', '').replace('parent-', '');
            data[i] = parseInt(id);
        });
        var _onSuccess = function(data){
            if(data == 'NOT_LOGIN')
                window.location.reload(true);
            else if(data==='false')
                alert('Có lỗi xảy ra!');
        };

        var params = {
            '_cat_priority':data
        };

        getAjax('<?=site_url('faq/ajax_list_category_priority_set', $langcode); ?>', params, 'POST', _onSuccess);
    }

    //PARENT
    function ajax_add_parent(name) {
        if(name !=='' && name !== 'undefined')
        {
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    $("#parent").append(data);
                    $("#parent").sortable('refresh');
                    $("#add-state-parent").show();
                    $("#form-add-parent").hide();
                    $("#txt-add-parent").val('');
                    ajax_list_category_priority_set($("#parent").sortable('toArray'));
                }
            };

            var params = {
                '_name':name,
                '_parent_id':0,
                '_langcode':'<?=$langcodeid ?>'
            };

            getAjax('<?=site_url('faq/ajax_category_insert', $langcode); ?>', params, 'POST', _onSuccess);
        }else{
            alert('Nội dung không được bỏ trống!');
        }
    }

    function ajax_edit_parent(id) {
        var txt_name = $("#txt-edit-parent-"+id).val();
        if(txt_name !== '' && txt_name !== 'undefined'){
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    $("#name-parent-"+id).html(txt_name);
                    $("#txt-edit-parent-"+id).html(txt_name);
                    $("#form-edit-parent-"+id).hide();
                    $("#name-parent-"+id).show();
                }
            };

            var params = {
                '_cat_id':id,
                '_parent_id':0,
                '_name':txt_name
            };

            getAjax('<?=site_url('faq/ajax_category_update', $langcode); ?>', params, 'POST', _onSuccess);
        }else{
            alert('Nội dung không được bỏ trống!');
        }
    }

    function ajax_delete_parent(id){
        var r = confirm("Bạn chắc chắn muốn xóa nhóm danh mục này!");
        if(r){
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    $("#parent-"+id).remove();
                    var parentId = $("#box-question").attr('data-parent');
                    if(parseInt(parentId) === id){
                        $("#question-name").text('');
                        $('#question').html('');
                        $('#box-add-ques-ans').hide();
                    }
                }
            };

            var params = {
                '_cat_id':id
            };

            getAjax('<?=site_url('faq/ajax_category_delete', $langcode); ?>', params, 'POST', _onSuccess);
        }
    }
    //CATEGORY
    function ajax_add_category(parentId, name) {
        if(name !=='' && name !== 'undefined')
        {
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    $("#group-category-"+parentId).append(data);
                    $("#group-category-"+parentId).sortable('refresh');
                    $("#add-state-category-"+parentId).show();
                    $("#form-add-category-"+parentId).hide();
                    $("#txt-add-category-"+parentId).val('');
                    ajax_list_category_priority_set($("#group-category-"+parentId).sortable('toArray'));
                }
            };

            var params = {
                '_name':name,
                '_parent_id':parentId,
                '_langcode':'<?=$langcodeid ?>'
            };

            getAjax('<?=site_url('faq/ajax_category_insert', $langcode); ?>', params, 'POST', _onSuccess);
        }else{
            alert('Nội dung không được bỏ trống!');
        }
    }

    function ajax_edit_category(id, par_id) {
        var txt_name = $("#txt-edit-category-"+id).val();
        if(txt_name !== '' && txt_name !== 'undefined'){
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    $("#name-category-"+id).html(txt_name);
                    $("#txt-edit-category-"+id).html(txt_name);
                    $("#form-edit-category-"+id).hide();
                    $("#name-category-"+id).show();
                }
            };

            var params = {
                '_cat_id':id,
                '_parent_id':par_id,
                '_name':txt_name
            };

            getAjax('<?=site_url('faq/ajax_category_update', $langcode); ?>', params, 'POST', _onSuccess);
        }else{
            alert('Nội dung không được bỏ trống!');
        }
    }

    function ajax_delete_category(id) {
        var r = confirm("Bạn chắc chắn muốn xóa danh mục này!");
        if(r){
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                {
                    window.location.reload(true);
                }
                else if(data==='false')
                {
                    alert('Có lỗi xảy ra!');
                }
                else
                {
                    $("#category-"+id).remove();
                    var catId = $("#box-question").attr('data-category');
                    if(parseInt(catId) === id){
                        $('#question-name').html('');
                        $('#question').html('');
                        $('#box-add-ques-ans').hide();
                    }
                }
            };

            var params = {
                '_cat_id':id
            };

            getAjax('<?=site_url('faq/ajax_category_delete', $langcode); ?>', params, 'POST', _onSuccess);
        }
    }

    function ajax_get_question_by_category(par_id, cat_id, cat_name='') {

        $('#box-question').attr("data-parent",par_id);
        $('#box-question').attr("data-category",cat_id);
        $('#question-name').html(cat_name);
        $("#box-question section").html('');
        $('.category-li').removeClass('active');
        $('#category-'+cat_id).addClass('active');

        var _onSuccess = function(data){
            $("#question").html('');
            if(data == 'NOT_LOGIN')
            {
                window.location.reload(true);
            }
            else if(data==='false')
            {
                alert('Danh mục "'+cat_name+'" không tồn tại!');
            }
            else
            {
                $("#box-question section").html(data);
                $("#box-add-ques-ans").show();
                $("#question").sortable('refresh');
            }
        };

        var params = {
            '_cat_id': cat_id,
            '_langcode':'<?=$langcodeid ?>'
        };

        getAjax('<?=site_url('faq/ajax_question_list_all', $langcode); ?>', params, 'POST', _onSuccess);
    }
</script>