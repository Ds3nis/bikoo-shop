<section class="breadcrumb-banner breadcrumb-banner--profile">
    <div class="container breadcrumb__container">
        <div class="breadcrumb__content">
            <div class="breadcrumb__title">
                <?php if(!empty($title)) { ?>
                    <h1><?php echo $title?></h1>
                <?php }else { ?>
                    <h1>Osobní účet</h1>
                <?php } ?>
            </div>
            <ul class="breadcrumb__list">
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link" href="/">Hlavní</a>
                </li>
                <li class="breadcrumb__list">
                    <span class="spacer"> // </span>
                </li>
                <li class="breadcrumb__item">
                    <a class="breadcrumb__link" href="/profile">Osobní účet</a>
                </li>
            </ul>
        </div>
    </div>
</section>