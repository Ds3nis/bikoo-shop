<?php
/**
 * @var \App\Kernel\Session\SessionInterface $session
 * @var \App\Kernel\View\ViewInterface $view
 * @var  \App\Models\Order $order
 * @var array<\App\Models\Product> $products
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
                    <?php if (!empty($order) && !empty($products)) { ?>
                    <div class="card">
                        <div class="card-header">
                            <h2>Košík</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered m-0">
                                    <thead>
                                    <tr>
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
                                    <?php foreach ($products as $product) {?>
                                        <tr>
                                            <td class="p-4">
                                                <div class="d-flex align-items-center gap-5 media align-items-center">
                                                    <?php
                                                    $images = explode('|', $product->images());
                                                    $imagesPath = array_filter($images);
                                                    ?>
                                                    <img
                                                            src="<?php echo $imagesPath[0] ?>"
                                                            class="d-block ui-bordered mr-4"
                                                            alt=""
                                                            style="width: 50%; height: 250px; object-fit: contain;"
                                                    />
                                                    <div class="media-body">
                                                        <a href="/catalog/product/?id=<?php echo $product->id() ?>" class="d-block text-dark">
                                                            <?php echo $product->name()?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                <?php  echo $product->price()?> CZK
                                            </td>
                                            <td class="align-middle p-4">
                                                <div class="cart-container">
                                                    <form action="/shopping-cart/change-quantity" method="post">
                                                        <div class="cart-quantity">
                                                            <input type="hidden" name="product_id" value="<?php echo $product->id() ?>" />
                                                            <button type="submit" name="action" value="decrease" class="btn-reset minus-btn">-</button>
                                                            <input
                                                                    type="number"
                                                                    name="quantity"
                                                                    value="<?php echo $product->countInOrder()?>"
                                                                    class="quantity"
                                                                    readonly=""
                                                                    min=1
                                                                    max=<?php echo $product->count()?>
                                                            />
                                                            <button type="submit" name="action" value="increase" class="btn-reset plus-btn">+</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                <?php echo $product->price() * $product->countInOrder() ?> CZK
                                            </td>
                                            <td class="text-center align-middle px-0">
                                                <form action="/shopping-cart/remove" method="post">
                                                    <input type="hidden" name="product_id" value="<?php echo $product->id() ?>" />
                                                    <button type="submit" class="shop-tooltip float-none text-danger">×</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex flex-wrap justify-content-end align-items-center pb-4">
                                <div class="d-flex">
                                    <div class="text-right mt-4">
                                        <label class="text-muted font-weight-normal m-0"
                                        >Celková cena</label
                                        >
                                        <div class="text-large">
                                            <strong><?php echo $order->price()?> CZK</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                                <a class="cloud-btn checkout-btn" href="/catalog">
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
                                <a class="cloud-btn continue-btn" href="/checkout-order">
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
                    <?php } else{?>
                    <h4 class="text-center">Koš je prázdný, ale nikdy není pozdě to napravit :)</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <svg height="240" viewBox="0 0 240 240" width="240" xmlns="http://www.w3.org/2000/svg">
                                <path d="m9.30006 136.5c-.6 12.8 8.70004 27.2 20.70004 31.7 18.1 6.8 30.3-10.2 41-21.9 8.2-9 18.5-17.2 30.4999-18.8 7-1 14 .3 21 1.3 17.7 2.6 35.8 4.2 53.2.3s34.2-13.5 43.4-28.8c2.3-3.9 4.1-8.1 4.8-12.5 1.8-9.7-1.3-19.7-6-28.2-6.6-12.1-16.5-22.4-28.5-29.4-11.1-6.4-24.3-10.1-37-7.6-18 3.6-31.3 18.6-42.9 33-11.3999 14.3-23.9999 29.6-41.7999 34.5-5.5 1.5-11.3 1.8-16.7 3.3-16.5 4.2-31.9 17-38.9 32.6-1.7 3.7-2.50004 7.2-2.80004 10.5z"
                                      fill="#f5f5f5"/>
                                <path d="m218.9 99.1c-2.8-13.7-6.5-27.2-7.3-30 0-.7-.2-1.3-.6-1.9-1-1.5-3-4.8-39.4-12.9-18.5-4.2-38.7-7.9-46-8.8-1.5-.2-3.3-.3-5.4-.4l-2.5-1.8c-4.9-6.8-13-10.8-21.4-10.3l-35.9 2c-4.5.2-8.3 2.8-10.3 6.9-1.9 4.1-1.5 8.7 1.2 12.3l5.4 7.4c1.3 9.2 6.6 26.6 14.6 51.5 1.3 4.1 2.4 7.4 2.9 9.1.4 1.5 1.7 2.8 3.8 3.9 2.2 9.2 12.5 52.6 17.6 61.1.6 1.1 1.7 2.1 3.1 3-2 1.3-3.3 3.8-3.3 6.6 0 4.2 3 7.7 6.8 7.7 3.7 0 6.8-3.4 6.8-7.7 0-1-.2-1.9-.5-2.8 9.3 2.5 23.1 4.3 40.2 6.3 9.7 1.1 18 2.1 22.5 3.2 1.3.3 2.7.5 4.1.7-.7 1.2-1.1 2.6-1.1 4.1 0 4.2 3 7.7 6.8 7.7 3.7 0 6.8-3.4 6.8-7.7 0-1.6-.4-3.1-1.2-4.4 5.6-.8 11-2.4 15.4-4.6-.3.8-.4 1.8-.4 2.7 0 4.2 3 7.7 6.8 7.7 3.7 0 6.8-3.4 6.8-7.7 0-3.9-2.5-7-5.8-7.6 1.4-1.4 2.5-2.8 3-4.2.5-1.2.3-2.4-.3-3.5-2.6-4.4-16.1-6.7-52.8-11-12.7-1.5-25.8-3-28.3-4.2-3.3-1.4-7.5-18.5-9.4-38 5.5.5 11.5 1 18.1 1.5 10.6.8 19.8 1.5 23.8 2.3 5.5 1 13.9 1.5 22.7 1.5 13.3 0 27.3-1.2 32.7-3.6 4-1.8 5.7-8.7 0-36.1zm-48.7 33.3-1.5-7c2.6 0 6.4-.3 10.7-.6l1.1 8.2c-3.7-.1-7.2-.3-10.3-.6zm-61.6-5.9-1.7-8.9c4.9.7 10.1 1.4 15.3 2.1l1.6 8.3c-5.2-.5-10.3-1-15.2-1.5zm-28.8-6.1c-.4-1.4-1.2-3.8-2.1-6.8 2.4.3 6.3.9 11.1 1.5l1.6 8.7c-8.4-1.6-10.2-3-10.6-3.4zm12.1 3.7-1.7-8.8c4.5.6 9.7 1.3 15.2 2.1l1.7 8.9c-2-.2-3.9-.5-5.8-.7-3.8-.5-6.9-1-9.4-1.5zm-25.6-47.4c3.4.6 8.9 1.6 15.7 2.8l3.1 16.5c-6-.8-10.8-1.5-13.6-1.9-1.8-5.7-3.6-11.8-5.2-17.4zm140.9-1.7c1 3.7 1.9 7.3 2.8 10.8-2.4.2-6.9.6-12.4 1.1l-1.6-11.5c4.9-.2 8.8-.3 11.2-.4zm-90 10.4c6.1 1 12.2 1.9 17.8 2.6l2.8 14.8c-5.8-.7-11.8-1.4-17.8-2.2zm1.4 15c-5.2-.7-10.3-1.3-15.3-2l-3-15.8c5 .8 10.2 1.7 15.3 2.5zm18-12.2c7.1.9 13.5 1.7 18.5 2l3.2 14.9c-5.5-.6-12-1.3-18.9-2.1zm24.5 2.3c3.7 0 8.5-.2 13.7-.5l2.1 16c-4 .1-8.2 0-12.5-.3zm15.1-.6c6.7-.4 13.9-1 20-1.5l2.1 15.8c-5.8.8-12.6 1.5-20 1.7zm21.5-1.6c5.7-.5 10.3-.9 12.6-1.1 1.2 5.1 2.3 9.9 3.2 14.3-2.8.7-7.6 1.7-13.7 2.6zm-3.2-12.9 1.5 11.6c-6.2.5-13.4 1.1-20 1.5l-1.6-12.4c7.1-.2 14.2-.5 20.1-.7zm-21.6.8 1.6 12.4c-5.3.3-10.1.5-13.8.5l-2.7-12.3c4.8-.3 9.9-.4 14.9-.6zm-21 .7h.3l2.6 11.9c-5-.4-11.4-1.1-18.4-2.1l-2.1-11.2c7 .9 13.2 1.4 17.6 1.4zm-19.2-1.6 2.1 11.2c-5.7-.8-11.7-1.7-17.8-2.6l-2.1-11.3c6.1 1 12.2 2 17.8 2.7zm-19.4-2.9 2.1 11.3c-5.2-.8-10.4-1.7-15.3-2.5l-2.2-11.4c5.1.8 10.3 1.7 15.4 2.6zm-16.9-3 2.2 11.5c-5.5-.9-10.7-1.8-15.3-2.6l-2.3-11.8c4.8 1 10 1.9 15.4 2.9zm-16.9-3.2 2.2 11.8c-7-1.2-12.6-2.3-15.8-2.9-1.3-4.7-2.4-8.9-3-12.2 3.8.8 9.7 2 16.6 3.3zm4 13.6c4.7.8 9.9 1.7 15.3 2.6l3 15.8c-5.5-.7-10.7-1.4-15.2-2.1zm18.6 19.9 3 16.2c-5.6-.8-10.8-1.5-15.2-2.1l-3-16.1c4.6.6 9.7 1.3 15.2 2zm4.6 16.4-3-16.2c4.9.7 10.1 1.3 15.3 2l3.1 16.2c-5.3-.6-10.5-1.3-15.4-2zm13.7-14c6 .8 12 1.5 17.8 2.2l3.1 16.4c-5.6-.7-11.6-1.6-17.8-2.4zm19.2 2.4c7 .8 13.5 1.6 19 2.1l3.7 16.9c-4.2-.5-11.2-1.4-19.5-2.5zm28.7 19.4-3.6-16.8c3.3.2 6.6.3 9.8.3h2.5l2.1 16c-4.4.3-8.2.5-10.8.5zm10.2-16.5c7.4-.2 14.2-.9 20-1.7l2.1 15.9c-6.5.6-13.8 1.2-20 1.7zm21.4-1.9c6.1-.9 10.9-1.9 13.8-2.6 1.4 6.9 2.2 12.7 2.7 17.2-3 .3-8.3.8-14.3 1.4zm4.2-36.2c-10.3.3-34.1 1.1-50.8 1.8-17 .7-75.6-11.1-90.6-14.2 5-3.3 35.6-6.9 55.6-6.1.7.3 1.4.3 2 .1 1.6.1 3.2.2 4.6.4 15 1.8 67.3 12.6 79.2 18zm-148.6-25c1-2.1 3-3.4 5.3-3.6l35.9-2c5.6-.3 11.1 2 14.9 6.2-7.5.1-16.3.5-24.4 1.2-8.2.8-24.2 2.3-29.2 7.2l-1.9-2.6c-1.4-1.9-1.6-4.3-.6-6.4zm16.4 51.3c3 .4 7.7 1.1 13.4 1.9l3 16.1c-5-.7-9-1.2-11.3-1.5-.1-.3-.2-.5-.3-.8-.9-3.6-2.8-9.3-4.8-15.7zm46.2 56.2c3.6 19.8 7.4 23.9 10.4 25.2.2.1.4.2.7.3-2 1.3-3.3 3.8-3.3 6.6 0 4.2 3 7.7 6.8 7.7 3.7 0 6.8-3.4 6.8-7.7 0-1.8-.6-3.5-1.5-4.8 5 .7 11.8 1.6 20.5 2.6 14.8 1.7 41.6 4.9 47.6 7.8-3.9 5-20.6 11.6-33.6 8.5-4.9-1.1-13.4-2.2-23.2-3.3-16-1.9-45.9-5.5-48.7-10.3-3.8-6.2-12-38.7-16-55.7 6.7 1.8 16.8 3.2 31 4.5.3 3.3 1.1 10.8 2.5 18.6zm7.2-23.7-1.5-8.2c6.2.8 12.2 1.6 17.8 2.4l1.4 7.3c-.9-.1-1.9-.1-2.8-.2-4.9-.5-9.9-.9-14.9-1.3zm19 1.5-1.3-7.2c8.5 1.1 15.6 2 19.6 2.5l1.4 6.6c-3.9-.6-10.8-1.2-19.7-1.9zm37.6 3.4-1.1-8.3c6.3-.5 13.5-1.1 20-1.7l1.2 9.4c-6.1.5-13.3.7-20.1.6zm34.2-2.9c-2.4 1-7 1.7-12.6 2.2l-1.2-9.4c6-.6 11.2-1.1 14.3-1.4.3 4.6.1 7.5-.5 8.6z"
                                      fill="#008363"/>
                                <path d="m62.7 182.7c-.6-17.1 6.4-22.5 12.5-22.5 5.5-.1 12.2.6 18.6-3.7.6-.4.6-1.3 0-1.7-4.3-2.3-9.8-4.4-14.6-3.8-5.9.8-10.5 5-13.2 7.7-.7.8-1.9-.1-1.4-1.1 2-4.7 5.3-6.4 8.2-9.1 3.5-3.2 9.2-5.2 13-8 5.8-4.5 9.4-10.8 12.8-17.4.4-.6-.1-1.4-.9-1.4-6.3.4-10.3 1.9-15.5 6.5-4.4 4-11.7 15.6-15.4 19.5-.7.7-1.9.1-1.5-.8 2.2-8 10.7-18.3 14.4-27.1 4.9-11.4 3.7-20.4.2-28.9-.3-.7-1.5-.8-1.7 0-2.4 11.1-10.8 13.3-13.7 40.5-.2 1.9-.6 6.4-1.2 6.9-.9.8-1.2 0-1.7-1.1-2.9-7.6-.6-47.2-22.1-60.2-.8-.4-1.7.2-1.4 1 6.4 23.1-9.2 26 21.6 67.8.1.2.4.6.5.8.8 2.1-.6 2.5-1.3 2.4-3.9-.5-18.9-27.6-48.90004-24.1-.8 0-1.1 1-.6 1.6 7.30004 8 15.00004 15.7 24.80004 19.8 6 2.6 14 3.1 19.6 6.6 5 3.1 7.7 9.6 6.1 15.2-.3.8-1.3 1.1-1.6.3-2.8-4.8-9.5-8.6-14.7-10.2-5.6-1.7-10.2-1.5-15.8-1.6-.8 0-1.2.9-.8 1.5 11.7 16.7 28.6 3.5 31 23.3 0 .3.3.7.6.8 3.3.9 6.5 1.8 6.4-1.7z"
                                      fill="#1c398e"/>
                                <path d="m76.8 180.1-33.1-1.1c-1.5-.1-1.4 1.2-1.2 2.6l6 30.5c.2 1.1 1.3 2 2.4 1.9l16.2.4c1-.1 1.7-.8 2-1.7l8.4-31.3c.3-.6-.1-1.2-.7-1.3z"
                                      fill="#da3404"/>
                            </svg>
                        </div>
                    <?php } ?>
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