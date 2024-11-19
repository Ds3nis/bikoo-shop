<?php
/**
 * @var \App\Kernel\View\ViewInterface $view
 */

?>

<!DOCTYPE html>
<html lang="en">

<?php $view->component("head", [
    'title' => "Bikoo|Not found",
    'styles' => [
        "assets/css/404page.css",
        "https://fonts.googleapis.com/css?family=Nunito:400,700"
    ],
    'bootstrap' => [
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    ]
]) ?>

<body>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404"></div>
        <h1>404</h1>
        <h2>Oops! Page Not Be Found</h2>
        <p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
        <a href="/">Back to homepage</a>
    </div>
</div>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</body>
</html>
