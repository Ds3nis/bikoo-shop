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
                <h1 class="m-0">Uživatel 1</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin">Hlavní stránka</a></li>
                    <li class="breadcrumb-item active">Uživatelé</li>
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
                <a href="admin/user1/edit"
                   class="btn btn-block btn-primary">Upravit</a>
            </div>

            <form action="/admin/user1/delete" class="col-2 mb-3" method="post">
                <button type="submit" class="btn btn-block btn-danger">Smazat</button>
            </form>

        </div>
        <div class="row">
            <div class="card-body table-responsive p-0" style="height: 450px;">
                <table class="table table-striped table-dark table-hover table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Jméno</th>
                        <th>Příjmení</th>
                        <th>Prostřední jméno</th>
                        <th>Adresa</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Datum vytvoření</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
