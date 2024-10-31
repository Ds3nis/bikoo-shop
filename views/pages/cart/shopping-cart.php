<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\View\ViewInterface $view
 */

?>

<?php $view->component("head",[
     'title' => "Bikoo|Košik",
    'styles' => [
        "assets/css/breadcrumb-banner.css",
        "assets/css/shopping-cart.css"
    ],
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>
<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <section class="breadcrumb-banner breadcrumb-banner--cart">
            <div class="container breadcrumb__container">
                <div class="breadcrumb__content">
                    <div class="breadcrumb__title">
                        <h1>Zobrazit košík</h1>
                    </div>
                    <ul class="breadcrumb__list">
                        <li class="breadcrumb__item">
                            <a class="breadcrumb__link" href="#">Hlavní</a>
                        </li>
                        <li class="breadcrumb__list">
                            <span class="spacer"> // </span>
                        </li>
                        <li class="breadcrumb__item">
                            <a class="breadcrumb__link" href="#">Zobrazit košík</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="shopping-cart">
            <div class="container cart__container">
                <div class="container px-3 my-5 clearfix">
                    <!-- Shopping cart table -->
                    <div class="card">
                        <div class="card-header">
                            <h2>Košík</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered m-0">
                                    <thead>
                                    <tr>
                                        <!-- Set columns width -->
                                        <th
                                            class="text-center py-3 px-4"
                                            style="min-width: 400px"
                                        >
                                            Název produktu &amp; Podrobnosti
                                        </th>
                                        <th class="text-right py-3 px-4" style="width: 100px">
                                            Cena
                                        </th>
                                        <th
                                            class="text-center py-3 px-4"
                                            style="width: 120px"
                                        >
                                            Množství
                                        </th>
                                        <th class="text-right py-3 px-4" style="width: 100px">
                                            Celkem
                                        </th>
                                        <th
                                            class="text-center align-middle py-3 px-0"
                                            style="min-width: 40px"
                                        >
                                            <a
                                                href="#"
                                                class="shop-tooltip float-none text-light"
                                                title=""
                                                data-original-title="Clear cart"
                                            ><i class="ino ion-md-trash"></i
                                                ></a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="p-4">
                                            <div
                                                class="d-flex align-items-center gap-5 media align-items-center"
                                            >
                                                <img
                                                    src="../img/cart-item1.png"
                                                    class="d-block ui-bordered mr-4"
                                                    alt=""
                                                />
                                                <div class="media-body">
                                                    <a href="#" class="d-block text-dark"
                                                    >Sarrio Mc 02
                                                    </a>
                                                    <p>Downhill Mountain Bike</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="text-right font-weight-semibold align-middle p-4"
                                        >
                                            57.55 CZK
                                        </td>
                                        <td class="align-middle p-4">
                                            <div class="cart-container">
                                                <div class="cart-quantity">
                                                    <button class="btn-reset minus-btn">-</button>
                                                    <input
                                                        type="number"
                                                        value="1"
                                                        class="quantity"
                                                        readonly=""
                                                    />
                                                    <button class="btn-reset plus-btn">+</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="text-right font-weight-semibold align-middle p-4"
                                        >
                                            115.1 CZK
                                        </td>
                                        <td class="text-center align-middle px-0">
                                            <a
                                                href="#"
                                                class="shop-tooltip close float-none text-danger"
                                                title=""
                                                data-original-title="Remove"
                                            >×</a
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">
                                            <div
                                                class="d-flex align-items-center gap-5 media align-items-center"
                                            >
                                                <img
                                                    src="../img/cart-item1.png"
                                                    class="d-block ui-bordered mr-4"
                                                    alt=""
                                                />
                                                <div class="media-body">
                                                    <a href="#" class="d-block text-dark"
                                                    >Product 1</a
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="text-right font-weight-semibold align-middle p-4"
                                        >
                                            57.55 CZK
                                        </td>
                                        <td class="align-middle p-4">
                                            <div class="cart-container">
                                                <div class="cart-quantity">
                                                    <button class="btn-reset minus-btn">-</button>
                                                    <input
                                                        type="number"
                                                        value="1"
                                                        class="quantity"
                                                        readonly=""
                                                    />
                                                    <button class="btn-reset plus-btn">+</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="text-right font-weight-semibold align-middle p-4"
                                        >
                                            115.1 CZK
                                        </td>
                                        <td class="text-center align-middle px-0">
                                            <a
                                                href="#"
                                                class="shop-tooltip close float-none text-danger"
                                                title=""
                                                data-original-title="Remove"
                                            >×</a
                                            >
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- / Shopping cart table -->
                            <div
                                class="d-flex flex-wrap justify-content-end align-items-center pb-4"
                            >
                                <div class="d-flex">
                                    <div class="text-right mt-4">
                                        <label class="text-muted font-weight-normal m-0"
                                        >Celková cena</label
                                        >
                                        <div class="text-large">
                                            <strong>1164.65 CZK</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="d-flex flex-wrap justify-content-between align-items-center pb-4"
                            >
                                <a class="cloud-btn checkout-btn" href="#">
                                    <nav>
                                        <ul class="cloud-btn__list">
                                            <li class="cloud-btn__item cloud-btn__item--spray">
                                                Pokračovat v nakupování
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </a>
                                <a class="cloud-btn continue-btn" href="#">
                                    <nav>
                                        <ul class="cloud-btn__list">
                                            <li class="cloud-btn__item cloud-btn__item--black">
                                                Postup k pokladně
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer") ?>
</div>
<script src="assets/js/burger.js"></script>
<script src="assets/js/counter.js"></script>
</body>
</html>