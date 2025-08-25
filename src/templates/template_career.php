<div id="content">
    <?php echo $files->render('includes/career/career_header.php'); ?>
    <?php echo $files->render('includes/career/career_breadcrumb.php'); ?>
    <section class="carrer_content">
        <div class="container">
            <div class="row">
                <?php echo $files->render('includes/career/career_menu.php'); ?>
                <div class="col-lg-8 offset-lg-1" data-aos="fade-left">
                    <?php echo $modules->get('WesanoxHelperClasses')->getHeadline($page->headline, $page->headline_tags, $page->headline_class, $page->headline_align); ?>
                    <?php echo $page->text; ?>
                </div>
            </div>
        </div>
    </section>
    <?php echo $modules->get('WesanoxHelperClasses')->renderMatrix('basic', $page->matrix_basic,  'section'); ?>
</div>