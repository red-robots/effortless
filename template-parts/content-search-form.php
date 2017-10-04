<?php $placeholder = get_field("search_placeholder");?>
<form class="bella-search" action="<?php the_permalink();?>" method="POST">
    <input type="text" name="search" <?php if($placeholder) echo 'placeholder="'.$placeholder.'"';?> <?php if(isset($_POST['search'])) echo 'value="'.$_POST['search'].'"';?>>
</form>