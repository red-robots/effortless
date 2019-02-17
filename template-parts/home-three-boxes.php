<?php $boxes = get_field('row_2_boxes');
    if( $boxes ) {  ?>
    <section class="section three-boxes-sections clear">
        <div class="mid_wrapper">
            <div class="row clear flex-container">
                <?php foreach( $boxes as $box ) {  
                $title = $box['title'];
                $description = $box['description'];
                $image = $box['image'];
                $button_name = $box['button_name'];
                $button_link = $box['button_link']; 
                ?>
                <div class="col col-3">
                    <div class="inside clear">
                        <?php if($image) { ?>
                        <div class="imagediv" style="background-image:url('<?php echo $image['sizes']['medium_large']?>');">
                            <img src="<?php echo $image['sizes']['medium']?>" alt="<?php echo $image['title']?>" />
                        </div>
                        <?php } ?>
                        <div class="description clear">
                            <?php if($title) { ?>
                                <h2 class="title"><?php echo $title; ?></h2>
                                <div class="floral-icon"><span></span></div>
                            <?php } ?>
                            <?php if($description) { ?>
                                <div class="desc"><?php echo $description; ?></div>
                            <?php } ?>
                            <?php if($button_name && $button_link) { ?>
                                <div class="button"><a href="<?php echo $button_link; ?>"><?php echo $button_name; ?></a></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>  
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

