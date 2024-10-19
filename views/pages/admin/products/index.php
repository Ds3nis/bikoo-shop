<?php
/**
 * @var \App\Kernel\View\View $view
 */
?>
<?php
$view->include("main");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Товари</h1>
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
        <div class="row">
            <div class="col-1 mb-3">
                <a href="admin/products/create" class="btn btn-block btn-primary">Přidat</a>
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
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <a href="/admin/products/product1">title</a>
                                    </td>
                                    <td>code</td>
                                    <td>price</td>

                                    <td>В наявності</td>

                                    <td>Немає в наявності</td>

                                    <td>4</td>
                                    <td>
                                        <a href="/admin/product1/edit"
                                        class="text-success">
                                        <i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
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