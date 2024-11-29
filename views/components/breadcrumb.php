<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var string $title
 * @var string $image
 * @var array $links
 */
?>

<section class="breadcrumb-banner  <?php echo isset($image) && !empty($image) ? $image : 'breadcrumb-banner--profile';?>" >
    <div class="container breadcrumb__container">
        <div class="breadcrumb__content">
            <div class="breadcrumb__title">
                <?php if(!empty($title)) { ?>
                    <h1><?php echo $title?></h1>
                <?php }else { ?>
                    <h1>Breadcrumb</h1>
                <?php } ?>
            </div>
            <ul class="breadcrumb__list">
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link" href="/">Hlavní</a>
                </li>
                <li class="breadcrumb__list">
                    <span class="spacer"> // </span>
                </li>
                <?php foreach ($links as $index=>$link) {?>
                    <li class="breadcrumb__item">
                        <a class="breadcrumb__link" <?php echo isset($link["link"]) ? "href='{$link["link"]}'" : ""; ?>><?php echo $link["title"]; ?></a>
                    </li>
                <?php  if (count($links) - 1 != $index){
                        echo '<li class="breadcrumb__list">
                                    <span class="spacer"> // </span>
                               </li>';
                } } ?>
            </ul>
        </div>
    </div>
</section>