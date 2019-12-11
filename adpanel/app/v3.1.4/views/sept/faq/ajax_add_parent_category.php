<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($focus=='parent'){?>
    <li class="parent-li" id="parent-<?=$new_id?>" data-parent="<?=$new_id?>">
        <a class="name-parent" id="name-parent-<?=$new_id?>"><?=ucwords($new_name)?></a>
        <div class="form-edit-parent" id="form-edit-parent-<?=$new_id?>" style="display: none; float: left; width: 100%; margin-left: 5px">
            <input type="text" id="txt-edit-parent-<?=$new_id?>" value="<?=ucwords($new_name)?>" style="width: 70%"/>
            <input class='btn-edit-parent' type='submit' value='OK' onclick="ajax_edit_parent(<?=$new_id?>)"/>
            <input type='button' value='Hủy' onclick="$('#name-parent-'+<?=$new_id?>).show(); $('#form-edit-parent-'+<?=$new_id?>).hide()"/>
        </div>
        <span class="action-group" style="display: none">
            <a href="javascript:void(0);" class="action"  onclick="ajax_delete_parent(<?=$new_id?>)"><i class="material-icons">delete</i></a>
            <a href="javascript:void(0);" class="action"
               onclick="$('#form-edit-parent-'+<?=$new_id?>).show();$('#name-parent-'+<?=$new_id?>).hide(); $(this).parent().hide()"><i class="material-icons">edit</i></a>
        </span>
        <div style="clear: both"></div>
        <ul id="group-category-<?=$new_id?>" class="group-category sortable">
        </ul>
        <div class="add-state" id="add-state-category-<?=$new_id?>"
             onclick="$('#form-add-category-<?=$new_id?>').show(); $(this).hide()">
            <button class="btn btn-primary btn-sm" style="font-size: 10px;">+ Thêm danh mục mới</button>
        </div>
        <div class="add-form add-form-category" id="form-add-category-<?=$new_id?>" style="display: none">
            <input type="text" placeholder="Thêm danh mục" id="txt-add-category-<?=$new_id?>" style="width: 65%"/>
            <input class='btn-add-category' type='submit' value='Thêm' data-category="<?=$new_id?>"
                   onclick="ajax_add_category(<?=$new_id?>, $('#txt-add-category-<?=$new_id?>').val())"/>
            <input class='' type='button' value='Hủy'
                   onclick="$('#form-add-category-<?=$new_id?>').hide(); $('#add-state-category-<?=$new_id?>').show();"/>
        </div>
    </li>
    <script>
        $('.parent-li, .category-li').hover(
            function() {
                $(this).find('.action-group:eq(0)').show();
            }, function() {
                $(this).find('.action-group:eq(0)').hide();
            }
        );

        $("#group-category-<?php echo $new_id?>").sortable({
            axis: "y",
            update: function(event, ui) {
                var productOrder = $(this).sortable('toArray').toString();
                console.log(productOrder);
            }
        });
    </script>
<?php }else if($focus == 'category'){?>
    <li id="category-<?=$new_id?>" class="category-li" data-category="<?=$new_id?>">
        <a class="name-category" id="name-category-<?=$new_id?>"
           onclick="ajax_get_question_by_category('<?=$new_parent ?>','<?=$new_id?>', '<?=ucwords($new_name)?>')"><?=ucwords($new_name)?></a>
        <div id="form-edit-category-<?=$new_id?>" style="display: none; float: left; width: 100%">
            <input type="text" class="" id="txt-edit-category-<?=$new_id?>" value="<?=ucwords($new_name)?>" style="width: 70%"/>
            <input type='button' value='OK' onclick="ajax_edit_category(<?=$new_id?>, <?=$new_parent?>)"/>
            <input type='button' value='Hủy' onclick="$('#name-category-'+<?=$new_id?>).show(); $('#form-edit-category-'+<?=$new_id?>).hide()"/>
        </div>
        <span class="action-group" style="display: none">
            <a href="javascript:void(0);" class="action"  onclick="ajax_delete_category(<?=$new_id?>)"><i class="material-icons">delete</i></a>
            <a href="javascript:void(0);" class="action"
               onclick="$('#form-edit-category-'+<?=$new_id?>).show(); $('#name-category-'+<?=$new_id?>).hide();$(this).parent().hide()"><i class="material-icons">edit</i></a>
        </span>
        <div style="clear: both"></div>
    </li>
    <script>
        $('.parent-li, .category-li').hover(
            function() {
                $(this).find('.action-group:eq(0)').show();
            }, function() {
                $(this).find('.action-group:eq(0)').hide();
            }
        );
    </script>
<?php } ?>
