<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Models\Product $product
 */
?>
<?php
$view->include("main");


?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?php echo $product->name()?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Hlavní</a></li>
                    <li class="breadcrumb-item active">Produkty</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-2 mb-3">
                <a href="/admin/product/edit/?id=<?php echo $product->id()?>"
                   class="btn btn-block btn-primary">Upravit</a>
            </div>
            <div class="col-2 mb-3">
                <button data-toggle="modal" data-target="#exampleModal1" class="btn btn-block btn-danger">Smazat
                </button>
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Opravdu chcete
                                smazat tento
                                produkt?</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/admin/product/delete"
                              method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product->id()?>">
                            <div class="modal-body">
                                <?php echo $product->name()?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Zrušit
                                </button>
                                <button type="submit" class="btn btn-primary">Smazat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-body table-responsive p-0" >
                <table class="table table-striped table-dark table-hover table-head-fixed text-nowrap">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td><?php echo $product->id()?></td>
                    </tr>
                    <tr>
                        <th>Název produktu:</th>
                        <td><?php echo $product->name() ?></td>
                    </tr>


                    <?php
                    $images = explode('|', $product->images());
                    $images = array_filter($images);

                    if (!empty($images)) {
                        foreach ($images as $imagePath) {
                            ?>
                            <tr>
                                <th>Obrázek:</th>
                                <td><img style="width: 300px" src="<?php echo htmlspecialchars($imagePath); ?>"></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="2">Nejsou k dispozici žádné obrázky</td>
                        </tr>
                        <?php
                    }
                    ?>



                    <tr>
                        <th>Kód produktu:</th>
                        <td><?php echo $product->code() ?></td>
                    </tr>
                    <tr>
                        <th>Cena produktu:</th>
                        <td><?php echo $product->price() ?> CZK</td>
                    </tr>
                    <tr>
                        <th>Dostupnost:</th>
                        <?php if ($product->availability() == 1) {?>
                            <td>Skladem</td>
                        <?php }elseif ($product->availability() == 0) {?>
                            <td>Není skladem</td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Množství:</th>
                        <td><?php echo $product->count() ?> ks.</td>
                    </tr>
                    <tr>
                        <th>Popis:</th>
                        <td style="white-space: pre-wrap; text-align: justify">
                            <?php echo htmlspecialchars_decode($product->description()) ?>
                        </td>
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
