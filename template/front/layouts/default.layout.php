<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection HtmlRequiredTitleElement */
/** @noinspection PhpIncludeInspection */
/** @noinspection HtmlUnknownTarget */

use KnotDoc\Di\View\ViewHelper;

/** @var string $page_file */
/** @var string $lang */
/** @var ViewHelper $helper */
/** @var array $page_info */
?>
<!DOCTYPE html>
<html lang="<?php e($lang); ?>" class="no-js">
<head>
<?php require $helper->parts('html_head_meta'); ?>
    <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel='stylesheet' href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- page css: START -->
<?php foreach($page_info['css'] as $css) : ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
<?php endforeach; ?>
    <!-- page css: END -->
</head>
<body>
<!-- Start Header Area -->
<?php require $helper->parts('header'); ?>
<!-- End Header Area -->

<div class="container-fluid">
    <div class="row">

        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <?php require $helper->parts('sidebar'); ?>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 md">
            <?php require $page_file; ?>
        </main>

    </div>
</div>

<!-- Start footer Area -->
<?php require $helper->parts('footer'); ?>
<!-- End footer Area -->

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src='/js/bootstrap.js'></script>
<script type="text/javascript" src="/js/mdb.min.js"></script>
<script type="text/javascript" src="/js/header.js"></script>
<!-- page javascripts: START -->
<?php foreach($page_info['javascript'] as $js) : ?>
<script src="<?php echo $js; ?>"></script>
<?php endforeach; ?>
<!-- page javascripts: END -->
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="/js/feather.js"></script>
</body>
</html>