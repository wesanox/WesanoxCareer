<?php
$limit = ($page->text_count_items) ? ', limit=' . $page->text_count_items : '';

/**
 * If the recruitee module is installed, this fields will be used to get the job filtered by city and company
 */
if ($fields->get('dynamic_city') && $fields->get('dynamic_company')) :
    $city_string ='';
    $city = '';
    $company_string ='';
    $company = '';

    $city_key = 0;
    $company_key = 0;

    if($page->dynamic_city) {
        foreach ( $page->dynamic_city AS $string ) {
            if ( $city_key == 0) {
                $city_string .= $string;
            }

            if ( count($page->dynamic_city) > 1 && $city_key > 0 ) {
                $city_string .= '|' . $string;
            }

            $city_key++;
        }

        $city = ', dynamic_city=' . $city_string;
    }

    if($page->dynamic_company) {
        foreach ( $page->dynamic_company AS $string ) {
            if ( $company_key == 0) {
                $company_string .= $string;
            }

            if ( count($page->dynamic_company) > 1 && $company_key > 0 ) {
                $company_string .= '|' . $string;
            }

            $company_key++;
        }

        $company = ', dynamic_company=' . $company_string;
    }

    $jobs = $pages->find('template=template_career_job' .$limit . $city . $company);

    if( count($jobs) != 0) :
        ?>
        <section class="<?php echo $page->matrix('type'); ?> py-5">
            <div class="container">
                <div class="pb-5">
                    <?php echo $modules->get('WesanoxHelperClasses')->getHeadline($page->edit('headline'), $page->headline_tags, $page->headline_class, $page->headline_align); ?>
                    <div class="text-center pt-2">
                        <?php echo $page->edit('text'); ?>
                    </div>
                </div>
                <div class="swiper basic_teaser_career_swiper" data-aos="fade-up" data-aos-duration="1500">
                    <div class="swiper-wrapper">
                        <?php foreach ($jobs as $job) : ?>
                            <a class="swiper-slide text-black border p-4" href="<?php echo $job->url; ?>" aria-label="Jetzt mehr erfahren über - <?php echo $job->title; ?>">
                                <small><?php echo $job->dynamic_city[0]; ?></small>
                                <div class="fs-3 fw-normal py-2">
                                    <?php echo $job->title; ?>
                                </div>
                                <small><?php echo $job->dynamic_company[0]; ?></small>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination-career d-block text-center mt-5"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php else : ?>
    <section class="<?php echo $page->matrix('type'); ?> py-5">
        <div class="container">
            <div class="pb-5">
                <?php echo $modules->get('WesanoxHelperClasses')->getHeadline($page->edit('headline'), $page->headline_tags, $page->headline_class, $page->headline_align); ?>
                <div class="text-center pt-2">
                    <?php echo $page->edit('text'); ?>
                </div>
            </div>
            <div class="swiper basic_teaser_career_swiper" data-aos="fade-up" data-aos-duration="1500">
                <div class="swiper-wrapper">
                    <?php foreach ($pages->find('template=template_career_job' . $limit) as $job) : ?>
                        <a class="swiper-slide text-black border p-4" href="<?php echo $job->url; ?>" aria-label="Jetzt mehr erfahren über - <?php echo $job->title; ?>">
                            <div class="fs-3 fw-normal py-2">
                                <?php echo $job->title; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination-career d-block text-center mt-5"></div>
            </div>
        </div>
    </section>
<?php endif;