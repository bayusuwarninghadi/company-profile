<? function create_location_combobox($locations = array(), $selected = ''){ ?>
      <?php foreach ($locations as $loc) { ?>
      <option <? if ($selected == $loc['pk_i_id']) echo 'selected="selected"'?>
            data-depth='<?php echo $loc['i_depth']?>'
            data-slug='<?php echo $loc['s_slug']?>'
            value='<?php echo $loc['pk_i_id']?>'>
            <?=str_repeat("&nbsp;&nbsp;&nbsp;", $loc['i_depth'])?> <?php echo $loc['s_name']?>
      </option>
      <? if ($loc['sub']) echo create_location_combobox($loc['sub'], $selected);?>
      <?php } ?>

<? } ?>
<select name="fk_i_loc_id">
      <option selected="selected" value=''>Select Location</option>
      <?=create_location_combobox($locations, $fk_i_loc_id)?>
</select>