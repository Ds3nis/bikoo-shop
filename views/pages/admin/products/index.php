<?php
/**
 * @var \App\Kernel\View\View $view
 * @var array<\App\Models\Product> $products
 */
?>
<?php
$view->include("main");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Produkty</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin">Hlavní stránka</a></li>
                    <li class="breadcrumb-item active">Produkty</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row flex-column">
            <div class="col-1 mb-3">
                <a href="admin/products/create" class="btn btn-block btn-primary">Přidat</a>
            </div>
            <div class="mt-1">
                <?php $view->include("success-alert", [
                    "sessionKey" => "success"
                ]); ?>
                <?php $view->include("fail-alert", [
                    "sessionKey" => "failed"
                ]); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Produkty.</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 450px;">
                            <table class="table table-striped table-dark table-hover table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Název.</th>
                                    <th>Kód</th>
                                    <th>Cena</th>
                                    <th>Dostupnost</th>
                                    <th>Množství</th>
                                    <th>Událost</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($products as $product) {?>
                                <tr>
                                    <td><?php echo $product->id() ?></td>
                                    <td>
                                        <a href="/admin/products/<?php echo '?id=' . $product->id() ?>"><?php echo $product->name() ?></a>
                                    </td>
                                    <td><?php echo $product->code() ?></td>
                                    <td><?php echo $product->price() ?></td>
                                    <?php if ($product->availability() == 1) {?>
                                        <td>Skladem</td>
                                    <?php }elseif ($product->availability() == 0) {?>
                                        <td>Není skladem</td>
                                    <?php } ?>
                                    <td><?php echo $product->count() ?></td>
                                    <td>
                                        <a href="/admin/product1/edit"
                                        class="text-success">
                                        <i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

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