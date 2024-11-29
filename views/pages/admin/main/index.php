<?php
/**
 * @var \App\Kernel\View\View $view
 * @var array<\App\Models\User> $users
 * @var array<\App\Models\Product> $products
 * @var array<\App\Models\Order> $orders
 */
?>
<?php
$view->include("main");

?>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Přístrojový panel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Hlavní</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo count($users) ?></h3>

                                <p>Správa uživatelů</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/admin/users" class="small-box-footer">Více informací<i class="ml-2 fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo count($orders) ?></h3>

                                <p>Objednávky</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="/admin/orders" class="small-box-footer">Více informací <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo count($products) ?></h3>

                                <p>Správa jízdních kol</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-bicycle"></i>
                            </div>
                            <a href="/admin/products" class="small-box-footer">Více informací <i class="ml-2 fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


<?php
$view->include("ends");
?>