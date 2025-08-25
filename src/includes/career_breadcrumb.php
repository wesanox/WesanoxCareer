<?php $count = 0; ?>
<section class="<?php echo pathinfo(__FILE__, PATHINFO_FILENAME); ?>" data-aos="fade-up">
    <nav class="breadcrumbs container my-3 px-0" aria-labelledby="breadcrumblist">
        <ul class="nav d-flex gap-2" itemscope itemtype="http://schema.org/BreadcrumbList">
            <?php foreach($page->parents() as $item) : $count++; ?>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" class="pe-2" href="<?php echo $item->url; ?>">
                        <span itemprop="name">
                            <?php echo $item->title; ?>
                        </span>
                    </a>>
                    <meta itemprop="position" content="<?php echo $count; ?>">
                </li>
            <?php
            endforeach;

            $count = $count + 1;
            ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <link itemprop="item" href="<?php echo $page->url; ?>">
                <span itemprop="name" aria-current="page">
                    <?php echo $page->title; ?>
                </span>
                <meta itemprop="position" content="<?php echo $count; ?>">
            </li>
        </ul>
    </nav>
</section>