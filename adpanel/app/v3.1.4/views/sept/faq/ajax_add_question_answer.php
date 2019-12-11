<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<li id="question-<?=$question['ques_id']?>">
    <span onclick="$(this).siblings('#box-answer-<?=$answer['ans_id']?>').slideToggle(); expand_more_less(this)">
        <span style="float: left">
            <i class="material-icons" style="font-size:20px;color:red; cursor: pointer">expand_more</i>
        </span>
        <a id="name-question-<?=$question['ques_id']?>" style="font-weight: bold;  cursor: pointer; font-size: 1em;"><?=ucwords($question['name'])?></a>
    </span>
    <div id="form-edit-question-<?=$question['ques_id']?>" style="display: none; float: left; width: 95%;">
        <input type="text" id="txt-edit-question-<?=$question['ques_id']?>" value="<?=ucwords($question['name'])?>" style="width: 80%"/>
        <input class="btn-edit-category" type="submit" value="OK" onclick="ajax_edit_question(<?=$question['ques_id']?>)" />
        <input type="button" value="Hủy" onclick="btn_cancel_edit_ques(<?=$question['ques_id']?>)"/>
    </div>
    <span class="action-group" id="action-group-ques-<?=$question['ques_id']?>">
       <a href="javascript:void(0);" class="action show" onclick="ajax_delete_question(<?=$question['ques_id']?>)"><i class="material-icons">delete</i></a>
       <a href="javascript:void(0);" class="action show"
          onclick="btn_edit_ques(<?=$question['ques_id']?>, this)"><i class="material-icons">edit</i></a>
   </span>
    <div style="clear: both"></div>
    <div class="box-answer" id="box-answer-<?=$answer['ans_id']?>" style="display: block">
        <p id="answer-<?=$answer['ans_id']?>" style="color: black; margin: 5px;"">
            <span class="answer-content" style="font-size: 0.9em;">
                <?=ucwords($answer['content'])?>
            </span>
            <a href="javascript:void(0);" class="action show" style="float: none" onclick="show_edit_answer(<?=$answer['ans_id']?>);" >Sửa</a>
        </p>
        <p id="form-edit-answer-<?=$answer['ans_id']?>" style="display: none;  margin: 5px;">
            <textarea style="width: 100%;" id="txt-edit-answer-<?=$answer['ans_id']?>"><?=ucwords($answer['content'])?></textarea>
            <button class="btn btn-primary btn-sm" onclick="ajax_edit_answer(<?=$answer['ans_id']?>, <?=$answer['ques_id']?>)" style="font-size: 10px">Cập nhật</button>
            <button class="btn btn-warning btn-sm" onclick="$('#answer-'+<?=$answer['ans_id']?>).show(); $('#form-edit-answer-'+<?=$answer['ans_id']?>).hide()" style="font-size: 10px">Hủy</button>
        </p>
    </div>
</li>

