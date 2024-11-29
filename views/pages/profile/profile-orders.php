<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 * @var \App\Kernel\Session\SessionInterface $session
 * @var array<\App\Models\Order> $orders
 * @var array<\App\Models\Product> $ordersProduct
 */
?>

<?php $view->component("head", [
    'title' => "Bikoo|Osobní účet",
    'styles' => [
        "assets/css/breadcrumb-banner.css",
        "assets/css/office.css"
    ],
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>

<body>
<div class="wrapper">
    <?php $view->component("header") ?>
    <main class="main">
        <?php $view->component("breadcrumb", [
            "title" => "Osobní účet",
            "image" => "breadcrumb-banner--profile",
            "links" => [
                [
                    "title" => "Moje objednávky",
                    "link" => "/profile/orders"
                ]
            ]
        ]); ?>
        <section class="profile">
            <div class="container profile__container">
                <div class="office">
                    <div class="office__account account">
                        <?php $view->component("profile-menu", [
                                "orders" => "orders"
                        ]) ?>
                        <div class="account__content account-content">
                            <div class="container">

                                <?php
                                if (count($orders) > 0) {
                                    foreach ($orders as $order) {?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-5">
                                            <div class="card-header bg-success">
                                                <h4 class="text-white">Objednávka № <?php echo $order->id() ?> stav</h4>
                                                <?php if ($order->status() == 1): ?>
                                                    <h4 class="text-white">
                                                        Stav objednávky: Ve zpracování
                                                    </h4>
                                                <?php elseif ($order->status() == 2): ?>
                                                    <h4 class="text-white">
                                                        Stav objednávky: Odesláno
                                                    </h4>
                                                <?php elseif ($order->status() == 3): ?>
                                                    <h4 class="text-white">
                                                        Stav objednávky: Doručeno
                                                    </h4>
                                                <?php endif; ?>

                                                <h4 class="text-white">Datum objednávky: <?php echo $order->date() ?> </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <h5>Informace o objednávce</h5>
                                                    <div class="col-md-5">
                                                        <label for="">Jmeno</label>
                                                        <div class="border p-2"><?php echo $order->fullName() ?></div>
<!--                                                        <label for="">E-mail</label>-->
<!--                                                        <div class="border p-2">--><?php //echo $order->email() ?><!--</div>-->
                                                        <label for="">Kontakty</label>
                                                        <div class="border p-2">+ <?php echo $order->phone() ?></div>
                                                        <label for="">Adresa</label>
                                                        <div class="border p-2"><?php echo $order->city() . " " .
                                                                $order->street() . " " . $order->homeNumber()?></div>
                                                    </div>
                                                    <div class="col">
                                                        <table class="table table-bordered table-hover">
                                                            <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Název</th>
                                                                <th scope="col">Množství</th>
                                                                <th scope="col">Cena</th>
                                                                <th scope="col">Obrázek</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($ordersProduct[$order->id()] as $product) {?>
                                                            <tr>
                                                                <td style="font-size: 15px; cursor: pointer">
                                                                    <a href="/catalog/product/?id=<?php echo $product->id() ?>" class="link-primary"><?php echo $product->name() ?></a>
                                                                </td>
                                                                <td><?php echo $product->countInOrder() ?></td>
                                                                <td><?php echo $product->price() ?> CZK</td>
                                                                <td>
                                                                    <?php
                                                                    $images = explode('|', $product->images());
                                                                    $imagesPath = array_filter($images);
                                                                    ?>
                                                                    <img
                                                                        style=" object-fit:contain;"
                                                                        src="<?php echo $imagesPath[0] ?>"
                                                                        alt="<?php echo $product->name() ?>"
                                                                    />
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <h4 class="px-2">
                                                            Celková částka:
                                                            <span class="float-end"><?php echo $order->price() ?> CZK</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }}else{ ?>
                                <div class="account-content__title">
                                    <p>Zatím nemáte žádné objednávky</p>
                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $view->component("footer") ?>
</div>
<script defer src="assets/js/burger.js"></script>
</body>
</html>
