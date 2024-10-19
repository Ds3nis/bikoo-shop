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
                <h1 class="m-0">Úprava produktu</h1>
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
        <div class="row justify-content-center">
            <div class="pt-3 col-9 card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upravit produkt 1</h3></div>
                <form action="/admin/product1/edit" enctype="multipart/form-data"
                      method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Změnit název</label>
                            <textarea type="text" class="form-control" name="title" id="title"
                                      placeholder="Zadejte název" style="resize: none;">{{ $product->title ?? old("title") }}
                                </textarea>

                            <div class="text-danger">{{$message}}</div>

                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="hidden-input" name="hidden" hidden>
                        <label for="exampleInputFile">Vložení souboru</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"
                                       id="exampleInputFile" name="image[]" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Vyberte
                                    obrázek</label>
                            </div>
                        </div>
                        <ul class="custom-file-input-list">



                            <li>
                                <img style="width: 150px" src="">
                            </li>

                        </ul>

                        <span class="text-danger">{{ $message }} </span>

                    </div>
                    <div class="form-group">
                        <label for="price">Změnit cenu</label>
                        <input type="number" class="form-control" name="price" id="price"
                               placeholder="Zadejte cenu"
                               value="">

                        <div class="text-danger">{{$message}}</div>

                    </div>
                    <div class="form-group">
                        <label for="is_available">Změnit dostupnost</label>
                        <select class="form-control" name="is_available" id="is_available">
                            <option @selected($product->is_available) value="1">K dispozici
                            </option>
                            <option @selected(!$product->is_available) value="0">Není k dispozici
                            </option>
                        </select>

                        <div class="text-danger">{{$message}}</div>

                    </div>
                    <div class="form-group">
                        <label for="quantity">Změnit množství</label>
                        <input type="number" min="0" class="form-control" name="quantity" id="quantity"
                               placeholder="Zadejte množství"
                               value="">

                        <div class="text-danger">{{$message}}</div>

                    </div>
                    <div class="form-group">
                        <label for="summernote">Změnit popis</label>
                        <textarea name="description"
                                  id="summernote">{{ $product->description ?? old("content") }}</textarea>
                        <div class="text-danger">{{$message}}</div>
                    </div>
                    <div class="card">
                        <button type="submit" class="btn btn-primary">Uložit změny</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php
$view->include("ends");
?>
