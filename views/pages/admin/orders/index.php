<?php
/**
 * @var \App\Kernel\View\View $view
 * @var array<\App\Models\Product> $products
 * @var array<\App\Models\Order> $orders
 */
?>
<?php
$view->include("main");
?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Objednávky zákazníků</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Hlavní stránka</a></li>
                        <li class="breadcrumb-item active">Objednávky</li>
                    </ol>
                </div><!-- /.col -->
                <div class="row">
                    <div class="col-12">
                        <?php
                        $view->include("success-alert", [
                            "sessionKey" => "success-delete"
                        ]);

                        $view->include("fail-alert", [
                            "sessionKey" => "fail-delete"
                        ]);
                        ?>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
<!--            <div class="row">-->
<!--                <div class="col-12">-->
<!--                    <a href="" class="btn btn-success">Завершені замовлення</a>-->
<!--                </div>-->
<!--            </div>-->
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Objednavky</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input id="search-input" type="text" name="table_search"
                                               class="form-control float-right"
                                               placeholder="Hledat" >
                                        <div class="input-group-append">
                                            <button id="search-btn" type="button" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <script defer>
                                    function sendRequest(xhr ,method, url, data = null) {
                                        return new Promise((resolve, reject) => {
                                            xhr.responseType = "json";
                                            xhr.open(method, url);

                                            xhr.setRequestHeader("Content-Type", "application/json"); // якщо потрібен JSON

                                            xhr.onload = function () {
                                                if (xhr.status >= 400) {
                                                    reject(xhr.response);
                                                } else {
                                                    resolve(xhr.response);
                                                }
                                            };

                                            xhr.onerror = function () {
                                                reject(xhr.response);
                                            };

                                            xhr.send(data ? JSON.stringify(data) : null);
                                        });
                                    }

                                    function updateTable(orders) {
                                        const tableBody = document.querySelector('table tbody');
                                        tableBody.innerHTML = ''; // Очищення таблиці перед додаванням нових результатів

                                        if (orders.length === 0) {
                                            tableBody.innerHTML = `<tr><td colspan="6" class="text-center">Žádné objednávky nenalezeny</td></tr>`;
                                            return;
                                        }

                                        orders.forEach(order => {
                                            const row = document.createElement('tr');
                                            row.innerHTML = `
                                            <td>${order.id}</td>
                                            <td>${order.cele_jmeno}</td>
                                            <td>${order.datum}</td>
                                            <td>${order.cena} Kč</td>
                                            <td>
                                                ${order.stav === 1 ? "Zpracovává se" : (order.stav === 2 ? "Odesláno" : "Doručeno")}
                                            </td>
                                            <td>
                                                <a href="/admin/orders/?id=${order.id}" class="btn btn-flat btn-block btn-success">Otevřít</a>
                                              </td>
                                        `;
                                            tableBody.appendChild(row);
                                        });
                                    }


                                    document.addEventListener("DOMContentLoaded", function () {
                                        const searchInput = document.getElementById("search-input");
                                        const searchButton = document.getElementById("search-btn");

                                        function performSearch() {
                                            const searchQuery = searchInput.value.trim();
                                            const xhr = new XMLHttpRequest();
                                            sendRequest(xhr,"POST", "/admin/orders", { search: searchQuery })
                                                .then(response => {
                                                    console.log(response);
                                                    updateTable(response.orders);
                                                })
                                                .catch(error => {
                                                    console.error("Chyba při odesílání:", error);
                                                    const tableBody = document.querySelector('table tbody');
                                                    tableBody.innerHTML = `<tr><td colspan="6" class="text-center text-danger">Chyba při načítání objednávek</td></tr>`;
                                                });
                                        }


                                        searchButton.addEventListener("click", function () {
                                            performSearch();
                                        });

                                        searchInput.addEventListener("keydown", function (event) {
                                            if (event.key === "Enter") {
                                                performSearch();
                                            }
                                        });


                                        searchInput.addEventListener("input", function () {
                                            performSearch();
                                        });
                                    });

                                </script>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 450px;">
                                <table class="table table-striped table-dark table-hover table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jméno</th>
                                        <th>Datum objednávky</th>
                                        <th>Cena</th>
                                        <th>Status</th>
                                        <th>Akce</th>
                                    </tr>
                                    </thead>
                                    <tbody id="orders-tbody">
                                    <?php foreach($orders as $order) { ?>
                                        <tr>
                                            <td><?php echo $order->id() ?></td>
                                            <td>
                                                <?php echo $order->fullName() ?>
                                            </td>
                                            <td><?php echo $order->date() ?></td>
                                            <td><?php echo $order->price() ?> Kč</td>
                                            <td>
                                                <?php
                                                echo $order->status() == 1 ? "Zpracovává se" : ($order->status() == 2 ? "Odesláno" : "Doručeno");
                                                ?>
                                            </td>
                                            <td>
                                                <a href="/admin/orders/?id=<?php echo $order->id() ?>"
                                                class="btn btn-flat btn-block btn-success">
                                                Otevřít
                                                </a>
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

        </div><!-- /.container-fluid -->
    </section>
<?php
$view->include("ends");
?>