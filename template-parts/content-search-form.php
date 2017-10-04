<form class="bella-search" action="<?php the_permalink();?>" method="POST">
    <input type="text" name="search" <?php if(isset($_POST['search'])) echo 'value="'.$_POST['search'].'"';?>>
    <input type="submit" value="submit">
</form>