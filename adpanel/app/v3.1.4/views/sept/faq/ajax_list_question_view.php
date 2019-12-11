<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
    #question{
        list-style-type: none;
        cursor: move;
        padding-left: 0px;
    }
    #question li {
        display: block;
        padding: 10px 0px;
        color: #0088cc;
        border-bottom: 1px solid #e0e0e0;
    }
    #question li:hover{
        background-color: aliceblue;
    }
    #question .material-icons{
        font-size: 1.2em;
    }
</style>
<ul id="question" class="drag-drop" style="min-height: 30px">
    <?php if(empty($list_question)){?>
        Danh mục này chưa có câu hỏi, hãy thêm câu hỏi!
    <?php }else{ ?>
        <?php foreach ($list_question as $question){?>
            <?php $quesId = $question['ques_id'];?>
            <li id="question-<?=$quesId?>">
                <span onclick="$(this).siblings('#box-answer-<?=$question['ans_id']?>').slideToggle(); expand_more_less(this)">
                    <span style="float: left">
                        <i class="material-icons" style="font-size:20px;color:red; cursor: pointer">expand_more</i>
                    </span>
                    <a id="name-question-<?=$quesId?>" style="font-weight: bold;  cursor: pointer; font-size: 1em;"><?=ucwords($question['ques_content'])?></a>
                </span>
                <div id="form-edit-question-<?=$quesId?>" style="display: none; float: left; width: 95%;">
                    <input type="text" id="txt-edit-question-<?=$quesId?>" value="<?=ucwords($question['ques_content'])?>" style="width: 80%"/>
                    <input class="btn-edit-category" type="submit" value="OK" onclick="ajax_edit_question(<?=$quesId?>)" />
                    <input type="button" value="Hủy" onclick="btn_cancel_edit_ques(<?=$quesId?>)"/>
                </div>
                <span class="action-group" id="action-group-ques-<?=$quesId?>">
                   <a href="javascript:void(0);" class="action show" onclick="ajax_delete_question(<?=$quesId?>)"><i class="material-icons">delete</i></a>
                   <a href="javascript:void(0);" class="action show"
                      onclick="btn_edit_ques(<?=$quesId?>, this)"><i class="material-icons">edit</i></a>
               </span>
                <div style="clear: both"></div>
                <div class="box-answer" id="box-answer-<?=$question['ans_id']?>" style="display: none; padding: 5px">
                    <textarea class="mceEditor" style="width: 100%;" id="txt-edit-answer-<?=$question['ans_id']?>"><?=ucwords($question['ans_content'])?></textarea>
                    <div style="text-align: center; margin-top: 5px">
                        <button class="btn btn-primary btn-sm" onclick="ajax_edit_answer(<?=$question['ans_id']?>, <?=$question['ques_id']?>)" style="font-size: 15px">Cập nhật</button>
                    </div>
                </div>
            </li>
    <?php }} ?>
</ul>

<div id="box-add-ques-ans" style="margin-bottom: 20px">
    <div class="add-state" id="add-state-ques-ans" onclick="$('#form-add-ques-ans').show(); $(this).hide()"
         style="background-color: #f0f8ff;">
        <button class="btn btn-warning btn-sm" style="font-size: 15px;">+ Thêm câu hỏi mới</button>
    </div>
    <div class="add-form" id="form-add-ques-ans" style="margin: 10px 0; padding: 5px; background: aliceblue; display: none">
        <input type="text"  placeholder="Câu hỏi?" id="txt-add-question" style="width: 100%; margin-bottom: 3px"/>
        <textarea class="mceEditor" placeholder="Câu trả lời" rows="6" style="width: 100%;" id="txt-add-answer"></textarea>
        <div style="text-align: center; margin-top: 10px">
            <input type='submit' class="btn btn-primary btn-sm" value='Thêm' onclick="ajax_add_ques_ans($('#txt-add-question').val(), tinyMCE.get('txt-add-answer').getContent())"/>
            <input  type='button' class="btn btn-warning btn-sm" value='Hủy' onclick="$('#add-state-ques-ans').show();$('#form-add-ques-ans').hide()" />
        </div>
    </div>
</div>

<script src="<?php echo base_url() . "js/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.mceEditor',
        height: 400,
        menubar: true,
        width: '100%',
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            //'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '<?php echo base_url(); ?>skins/<?php echo $template_f; ?>tinymce.css?v=3'
        ],
        relative_urls: false,
        external_filemanager_path:"<?php echo base_url(); ?>plugins/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        filemanager_token: "<?php echo EncryptData::Encode(json_encode(array('uid'=>$userid, 'uname'=>$username, 'time'=>time())), ENCRYPT_DATA_PRIVATE_KEY); ?>",
        external_plugins: { "filemanager" : "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });
</script>
<script>

    $("#question ").sortable({
        axis: "y",
        update: function(event, ui) {
            var data = $(this).sortable('toArray');
            ajax_list_ques_priority_set(data);
        }
    });
    function expand_more_less(o) {
        if($(o).find('i').text() === 'expand_more'){
            $(o).find('i').text('expand_less');
        }else{
            $(o).find('i').text('expand_more');
        }
    }
    function ajax_list_ques_priority_set(productOrder) {
        var data = [];
        productOrder = productOrder.filter(Boolean);
        productOrder.forEach(function (id, i) {
            id = id.replace('question-', '');
            data[i] = parseInt(id);
        });
        var _onSuccess = function(data){
            if(data == 'NOT_LOGIN')
                window.location.reload(true);
            else if(data==='false')
                alert('Có lỗi xảy ra!');
        };

        var params = {
            '_ques_priority':data
        };

        getAjax('<?=site_url('faq/ajax_list_ques_priority_set', $langcode); ?>', params, 'POST', _onSuccess);
    }

    //QUESTION
    function btn_edit_ques(id, o) {
        $('#form-edit-question-'+id).show();
        $('#name-question-'+id).hide();
        $(o).parent().hide();
    }
    function btn_cancel_edit_ques(id) {
        $('#name-question-'+id).show();
        $('#form-edit-question-'+id).hide();
        $('#action-group-ques-'+id).show();
    }

    function ajax_add_ques_ans(ques_name, ans_content) {
        var cat_id = $("#box-question").attr('data-category');
        if(ques_name !=='' && ques_name !== 'undefined' && ans_content !=='' && ans_content !== 'undefined' )
        {
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    $("#question").append(data);
                    $("#question").sortable('refresh');
                    $("#txt-add-question").val('');
                    $("#txt-add-answer").val('');
                    $("#form-add-ques-ans").hide();
                    $("#add-state-ques-ans").show();
                    ajax_list_ques_priority_set($("#question").sortable('toArray'));
                }
            };

            var params = {
                '_cat_id':cat_id,
                '_ques_name':ques_name,
                '_ans_content':ans_content,
                '_langcode':'<?=$langcodeid ?>'
            };

            getAjax('<?=site_url('faq/ajax_question_ans_insert', $langcode); ?>', params, 'POST', _onSuccess);
        }else{
            alert('Nội dung không được bỏ trống!');
        }
    }

    function ajax_edit_question(id) {
        var txt_name = $("#txt-edit-question-"+id).val();
        var cat_id = $("#box-question").attr('data-category');
        if(txt_name !== '' && txt_name !== 'undefined'){
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    $("#name-question-"+id).html(txt_name);
                    $("#txt-edit-question-"+id).html(txt_name);
                    $("#form-edit-question-"+id).hide();
                    $("#name-question-"+id).show();
                    $("#action-group-ques-"+id).show();
                }
            };

            var params = {
                '_ques_id':id,
                '_cat_id':cat_id,
                '_name':txt_name
            };

            getAjax('<?=site_url('faq/ajax_question_update', $langcode); ?>', params, 'POST', _onSuccess);
        }else{
            alert('Nội dung không được bỏ trống!');
        }
    }

    function ajax_delete_question(id) {
        var r = confirm("Bạn chắc chắn muốn xóa câu hỏi này!");
        if(r){
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                    $("#question-"+id).remove();
            };
            var params = {
                '_ques_id':id
            };

            getAjax('<?=site_url('faq/ajax_question_delete', $langcode); ?>', params, 'POST', _onSuccess);
        }
    }

    //ANSWER
    function ajax_edit_answer(ans_id, ques_id) {
        var txt_name = tinyMCE.get("txt-edit-answer-"+ans_id).getContent();
        if(txt_name !== '' && txt_name !== 'undefined'){
            var _onSuccess = function(data){
                if(data == 'NOT_LOGIN')
                    window.location.reload(true);
                else if(data==='false')
                    alert('Có lỗi xảy ra!');
                else
                {
                    console.log('thanh cong');
                }
            };

            var params = {
                '_ans_id':ans_id,
                '_ques_id':ques_id,
                '_content':txt_name,
                '_langcode':'<?=$langcodeid ?>'
            };

            getAjax('<?=site_url('faq/ajax_answer_update', $langcode); ?>', params, 'POST', _onSuccess);
        }else{
            alert('Nội dung không được bỏ trống!');
        }
    }
    function tinyMCEGetValue(eID)
    {
        return tinyMCE.get(eID).getContent();
    }

    function tinyMCEGetCheckValue(eID)
    {
        var a = tinyMCE.get(eID).getContent();
        a = stripHtmlTags(a);
        a = a.replace(/&nbsp;/gi, '');
        return a;
    }

    function tinyMCESetValue(eID, content)
    {
        tinyMCE.get(eID).setContent(content);
    }
</script>