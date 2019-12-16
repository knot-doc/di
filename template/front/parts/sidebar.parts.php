<?php
/** @var array $i18n */
/** @var string $lang */
/** @var string $page_id */
?>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link <?php if ($page_id == 'top') e('active'); ?> justify-content-end" href="/<?php e($lang); ?>/">
            <span data-feather="home"></span>
            <?php le('Home', $i18n); ?>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if ($page_id == 'introduction') e('active'); ?> justify-content-end" href="/<?php e($lang); ?>/introduction">
            <span data-feather="info"></span>
            <?php le('knot-lib/di Introduction', $i18n); ?>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if ($page_id == 'quick-start') e('active'); ?> justify-content-end" href="/<?php e($lang); ?>/quick-start">
            <span data-feather="youtube"></span>
            <?php le('Quick start', $i18n); ?>
        </a>
    </li>
</ul>

<a href="#" class="sidebar-heading d-flex px-3 mt-4 mb-1 text-muted justify-content-end">
    <span><?php le('Basic Usage', $i18n); ?></span>
</a>
<ul class="nav flex-column mb-2">
    <li class="nav-item">
        <a class="nav-link <?php if ($page_id == 'top') e('active'); ?> justify-content-end" href="/<?php e($lang); ?>/basic-usage/configuring-container">
            <span data-feather="file-text"></span>
            <?php le('Configuring container', $i18n); ?>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if ($page_id == 'top') e('active'); ?> justify-content-end" href="/<?php e($lang); ?>/basic-usage/using-container">
            <span data-feather="file-text"></span>
            <?php le('Using container', $i18n); ?>
        </a>
    </li>
</ul>
