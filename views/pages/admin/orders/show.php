<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Models\Product $product
 * @var \App\Models\Order $order
 * @var array<\App\Models\Product> $products
 * @var array $orderProducts
 * @var int $countProducts
 */
?>
<?php
$view->include("main");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Objednávka <?php echo $order->id()?> </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Hlavní stránka</a></li>
                    <li class="breadcrumb-item active">Objednávka</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-4 mb-3">
                <button data-toggle="modal" data-target="#exampleModal1" class="btn btn-block btn-danger">Smazat</button>
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Opravdu chcete smazat tuto objednávku?</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                Objednávka číslo
                                <?php echo $order->id(); ?>
                            </div>
                            <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Zrušit
                                        </button>
                                        <button type="submit" id="delete-order" value=" <?php echo $order->id(); ?>" class="btn btn-primary">Smazat</button>
                            </div>
                        <script defer>
                            document.addEventListener("DOMContentLoaded", function () {
                                var delete_btn = document.getElementById("delete-order");
                                var order_id = document.getElementById("delete-order").value;
                                console.log(order_id);
                                function deleteOrder() {
                                    if (order_id != null){
                                        const xhr1 = new XMLHttpRequest();
                                        sendRequest(xhr1,"DELETE", "/admin/orders/delete", { order_id: order_id })
                                            .then(response => {
                                                console.log(response);
                                                window.location.href = "/admin/orders";
                                            })
                                            .catch(error => {
                                                alert("Chyba při smazani:", error);
                                                console.error("Chyba při smazani:", error);
                                            });
                                    }
                                }


                                delete_btn.addEventListener("click", function () {
                                    deleteOrder()
                                });

                            });

                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-body table-responsive p-0" style="height: 450px;">
                <table class="table table-striped table-light table-hover table-head-fixed text-nowrap">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td><?php echo $order->id(); ?></td>
                    </tr>
                    <tr>
                        <th>Datum a čas objednávky</th>
                        <td><?php echo $order->date(); ?></td>
                    </tr>
                    <tr>
                        <th>Jméno a příjmení:</th>
                        <td><?php echo $order->fullName(); ?></td>
                    </tr>
                    <tr>
                        <th>Telefon:</th>
                        <td><?php echo $order->phone(); ?></td>
                    </tr>
                    <tr>
                        <th>Adresa:</th>
                        <td><?php echo $order->city() . ' ' . $order->street() . ' ' . $order->homeNumber() . ' ' . $order->psc(); ?></td>
                    </tr>
                    <tr>
                        <th>Celková cena objednávky:</th>
                        <td><?php echo $order->price(); ?></td>
                    </tr>
                    <tr>
                        <th>Počet produktů:</th>
                        <td><?php echo $countProducts; ?></td>
                    </tr>
                    <tr>
                        <th>Status objednávky:</th>
                        <?php if ($order->status() == 1)  {?>
                            <td class="bg-success">Probíhá zpracování</td>
                        <?php }elseif($order->status() == 2) { ?>
                            <td class="bg-warning">Odesláno</td>
                        <?php }elseif($order->status() == 3) {?>
                            <td class="bg-primary">Doručeno</td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Objednané produkty:</th>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <table class="table table-striped table-hover table-success">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Název</th>
                                <th scope="col">Kód</th>
                                <th scope="col">Obrázek</th>
                                <th scope="col">Množství</th>
                                <th scope="col">Cena</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orderProducts as $orderProduct) {?>
                                <tr>
                                    <th scope="row"><?php echo $orderProduct["id_prvek_produkt"]; ?></th>
                                    <td style="width: 30%">
                                        <a href="/catalog/product/?id=<?php echo $orderProduct["id_prvek_produkt"]; ?>"> <?php echo $products[$orderProduct["id_prvek_produkt"]]->name(); ?> </a>
                                    </td>
                                    <td><?php echo $products[$orderProduct["id_prvek_produkt"]]->code(); ?></td>
                                    <td>
                                        <?php
                                        $photos = explode("|", $products[$orderProduct["id_prvek_produkt"]]->images());
                                        $photos = array_filter($photos);
                                        ?>
                                        <img style="height: 200px" src="<?php echo htmlspecialchars($photos[0]); ?>"
                                             alt="<?php echo $products[$orderProduct["id_prvek_produkt"]]->name(); ?>">
                                    </td>
                                    <td><?php echo $orderProduct["mnozstvi"]; ?></td>
                                    <td><?php echo $orderProduct["cena"]; ?> Kč</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php
$view->include("ends");
?>
