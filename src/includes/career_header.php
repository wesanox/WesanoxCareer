<?php
$career_page = $pages->get("template=template_career");
?>
<section class="<?php echo pathinfo(__FILE__, PATHINFO_FILENAME); ?>" data-aos="fade-up">
    <?php
    if ($page->image) {
        echo $modules->get('WesanoxHelperClasses')->getHeaderImage($page->image, $page->image_tablet, $page->image_modile);
    } elseif ($career_page->image) {
        echo $modules->get('WesanoxHelperClasses')->getHeaderImage($career_page->image, $career_page->image_tablet, $career_page->image_modile);
    }
    ?>
</section>