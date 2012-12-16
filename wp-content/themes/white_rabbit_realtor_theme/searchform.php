<form action="" id="searchform" method="get">
  <?php $temp_sq = esc_attr(apply_filters('the_search_query', get_search_query())) ?>
  <input type="text" id="s" name="s" value="<?php if (($temp_sq == '') || ($_GET['s'] == 'filter_listing_mode')) : echo 'Search Website For Keywords ...'; else : echo $temp_sq; endif; ?>"  class="fx_input_field" />
  <button type="submit" id="search_submit" class="png_fix fx_button_hover" >
    <span>Search</span>
  </button>
</form>