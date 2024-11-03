
<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var array<\App\Models\Product> $products
 */

?>

<?php $view->component("head", [
    'title' => "Bikoo|Jízdní kola",
    'styles' => [
            "assets/css/products.css",
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
        <section class="catalog-grid">
            <div class="container catalog-grid__container">
                <div class="catalog-grid__props catalog-props">
                    <div class="catalog-props__top">
                        <div class="catalog-props__available">
                            <span class="catalog-props__txt">Dostupnost:</span>
                            <form class="catalog-props__form" action="#" method="GET">
                                <input type="checkbox" name="available" id="available" />
                                <label for="available">Skladem</label>
                            </form>
                            <span class="catalog-props__quantity"> 249 produktů </span>
                        </div>

                        <form action="#" method="GET">
                            <select
                                class="catalog-props__sort"
                                name="sort_by"
                                id="sort_by"
                            >
                                <option class="selected" selected value="0">
                                    Seřadit podle
                                </option>
                                <option value="1">No Wrapper</option>
                                <option value="2">No JS</option>
                                <option value="3">Nice!</option>
                            </select>
                        </form>
                    </div>
                </div>
                <ul class="catalog-grid__list catalog-list">
                    <?php foreach ($products as $index => $product) { ?>
                        <li class="catalog-list__item">
                            <article class="product">
                                <?php
                                $images = explode('|', $product->images());
                                $images = array_filter($images);
                                if (!empty($images)) { ?>
                                        <img
                                                class="product__img"
                                                src="<?php echo htmlspecialchars($images[0]); ?>"
                                                alt="bike <?php echo $index?>"
                                        />
                                <?php } ?>
                                <div class="product__description">
                                    <h3 class="product__title product__title--less">
                                        <?php echo $product->name() ?>
                                    </h3>
                                    <span class="product__price"><?php echo $product->price() ?> Kč</span>
                                    <form method="post" action="/shopping-cart/add">
                                        <input type="hidden" name="product_id" value="<?php echo $product->id()?>">
                                        <button type="submit" class="product__bag-link" href="#">
                                            přidat do košíku
                                            <svg
                                                    fill="#000000"
                                                    version="1.1"
                                                    id="Capa_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    viewBox="0 0 483.1 483.1"
                                                    xml:space="preserve"
                                            >
                        <g>
                            <path
                                    d="M434.55,418.7l-27.8-313.3c-0.5-6.2-5.7-10.9-12-10.9h-58.6c-0.1-52.1-42.5-94.5-94.6-94.5s-94.5,42.4-94.6,94.5h-58.6
      c-6.2,0-11.4,4.7-12,10.9l-27.8,313.3c0,0.4,0,0.7,0,1.1c0,34.9,32.1,63.3,71.5,63.3h243c39.4,0,71.5-28.4,71.5-63.3
      C434.55,419.4,434.55,419.1,434.55,418.7z M241.55,24c38.9,0,70.5,31.6,70.6,70.5h-141.2C171.05,55.6,202.65,24,241.55,24z
       M363.05,459h-243c-26,0-47.2-17.3-47.5-38.8l26.8-301.7h47.6v42.1c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h141.2v42.1
      c0,6.6,5.4,12,12,12s12-5.4,12-12v-42.1h47.6l26.8,301.8C410.25,441.7,389.05,459,363.05,459z"
                            />
                        </g>
                      </svg>
                                        </button>
                                    </form>
                                </div>
                                <a class="product__view cloud-btn" href="/catalog/product/?id=<?php echo $product->id()?>">
                                    <nav>
                                        <ul class="cloud-btn__list">
                                            <li class="cloud-btn__item cloud-btn__item--red">
                                                PŘEHLED
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </a>
                            </article>
                        </li>
                    <?php } ?>
                </ul>
                <div class="catalog-grid__pagination pagination">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"
                                >2 <span class="sr-only"></span
                                    ></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer") ?>
</div>
<script defer src="assets/js/burger.js"></script>
</body>
</html>
