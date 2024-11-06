<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var array<\App\Models\Product> $product
 */

?>

<?php $view->component("head", [
    'title' => "Bikoo|{$product->name()}",
    'styles' => [
        "assets/css/product-page.css",
        "assets/css/breadcrumb-banner.css",
    ],
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>
<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <?php $view->component("breadcrumb") ?>
        <section class="product-details">
            <div class="container product-details__container">
                <?php $view->component("success", [
                    "sessionKey" => "success"
                ]); ?>
                <div class="product-details__inner">
                    <div class="product-details__slides product-images">
                        <div class="swiper product-swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $images = explode('|', $product->images());
                                $images = array_filter($images);

                                if (!empty($images)) {
                                    foreach ($images as $imagePath) {
                                        ?>
                                        <div class="swiper-slide product-swiper__slide">
                                            <img
                                                src="<?php echo htmlspecialchars($imagePath); ?>"
                                                alt="bike-photo"
                                            />
                                        </div>
                                    <?php } } else { ?>
                                    <div class="swiper-slide product-swiper__slide">
                                        <img
                                            src="assets/img/bike-detais-slider.png"
                                            alt="bike-photo"
                                        />
                                    </div>
                                    <?php } ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="product-details__info product-info">
                        <h2 class="product-info__title"><?php echo $product->name() ?></h2>
                        <h3 class="product-info__price"><?php echo $product->price() ?> <span>Kč</span></h3>
                        <p class="product-info__description">
                            <?php echo $product->description() ?>
                        </p>
                        <form class="product-info__form" action="/shopping-cart/add" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product->id() ?>">
                            <h3>Množství: <span><?php echo $product->count() ?></span></h3>
                            <div class="cart-quantity">
                                <button type="button" class="btn-reset minus-btn">-</button>
                                <input
                                    type="number"
                                    value="1"
                                    name="counter"
                                    class="quantity"
                                    readonly=""
                                />
                                <button type="button" class="btn-reset plus-btn">+</button>
                            </div>

                            <button
                                class="product-info__submit cloud-btn btn-reset"
                                type="submit"
                            >
                                <nav>
                                    <ul class="cloud-btn__list">
                                        <li class="cloud-btn__item cloud-btn__item--redblack">
                                            Přidat do košíku
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </li>
                                    </ul>
                                </nav>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="product-details__description product-desript">
                <div class="container">
                    <div class="product-descript__title">
                        <h2 class="">Popis</h2>
                    </div>
                    <p class="product-descript__text">
                        <?php echo htmlspecialchars_decode($product->description()) ?>
                    </p>
<!--                    <ul class="product-descript__list">-->
<!--                        <li class="product-descript__item">-->
<!--                            - Kona 6061 Aluminum Butted frame-->
<!--                        </li>-->
<!--                        <li class="product-descript__item">-->
<!--                            - RockShox Revelation DebonAir 130mm fork-->
<!--                        </li>-->
<!--                        <li class="product-descript__item">-->
<!--                            - SRAM NX/SX Eagle 1x12 drivetrain/li>-->
<!--                        </li>-->
<!--                        <li class="product-descript__item">-->
<!--                            - WTB ST i35 27.5" rims w/Maxxis Minion/Rekon 2.8" tires-->
<!--                        </li>-->
<!--                        <li class="product-descript__item">-->
<!--                            - Trans-X Dropper seatpost-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <p class="product-descript__text">-->
<!--                        The Big Honzo DL is a simple concept: all the bike you want in a-->
<!--                        package you can afford. We love the feel of the 130mm RockShox-->
<!--                        Revelation RC fork and pedal-friendly SRAM NX/SX Eagle 12-speed-->
<!--                        drivetrain. 2.8" tires provide ample traction on all kinds of-->
<!--                        terrain, making climbing and descending fun and-->
<!--                        confidence-inspiring. Equipped with a Trans-X dropper post with-->
<!--                        up to 200mm of insertion depth, the Big Honzo DL is the perfect-->
<!--                        all-around hardtail. The Big Honzo DL is a simple concept: all-->
<!--                        the bike you want in a package you can afford. We love the feel-->
<!--                        of the 130mm RockShox Revelation RC fork and pedal-friendly SRAM-->
<!--                        NX/SX Eagle 12-speed drivetrain. 2.8" tires provide ample-->
<!--                        traction on all kinds of terrain, making climbing and descending-->
<!--                        fun and confidence-inspiring. Equipped with a Trans-X dropper-->
<!--                        post with up to 200mm of insertion depth, the Big Honzo DL is-->
<!--                        the perfect all-around hardtail.-->
<!--                    </p>-->
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer") ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/counter.js"></script>
<script defer src="assets/js/burger.js"></script>
</body>
</html>
