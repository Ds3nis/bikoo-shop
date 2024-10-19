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
                <h1 class="m-0">Produkt name</h1>
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
                <a href="/admin/product1/edit"
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
                        <form action="/admin/product1/delete"
                              method="post">
                            <div class="modal-body">
                                {{ $product->title}}
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
            <div class="card-body table-responsive p-0" style="height: 450px;">
                <table class="table table-striped table-dark table-hover table-head-fixed text-nowrap">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Název produktu:</th>
                        <td>fdfd</td>
                    </tr>

                    <tr>
                        <th>Obrázek:</th>
                        <td><img style="width: 300px" src=""></td>
                    </tr>


                    <tr>
                        <th>Kód produktu:</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Cena produktu:</th>
                        <td>10 CZK</td>
                    </tr>
                    <tr>
                        <th>Dostupnost:</th>

                        <td>Na skladě</td>
                    </tr>
                    <tr>
                        <th>Množství:</th>
                        <td>1 ks.</td>
                    </tr>
                    <tr>
                        <th>Popis:</th>
                        <td style="white-space: pre-wrap; text-align: justify">
                            {!! htmlspecialchars_decode($product->description) !!}
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
