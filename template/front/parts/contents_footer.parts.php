<?php
/** @var array $i18n */
/** @var array $pager */
/** @var string $lang */
/** @var string $page_id */
/** @var array $page_name */
/** @var array $page_url */
$prev = $pager['prev'] ?? '';
$next = $pager['next'] ?? '';

?>
<div class="row contents-footer">
    <div class="col-md-4">
<?php if (!empty($prev) && isset($page_name[$prev])): ?>
        <button onclick="location.href='/<?php e($lang . $page_url[$prev]); ?>'" class="btn btn-outline-dark btn-paging">
            <span data-feather="chevron-left"></span>
            <?php le($page_name[$prev], $i18n); ?>
        </button>

<?php endif; ?>
    </div>
    <div class="col-md-4">

    </div>
    <div class="col-md-4" style="text-align: right">
<?php if (!empty($next) && isset($page_name[$next])): ?>
        <button onclick="location.href='/<?php e($lang . $page_url[$next]); ?>'" class="btn btn-outline-dark btn-paging float-right">
            <?php le($page_name[$next], $i18n); ?>
            <span data-feather="chevron-right"></span>
        </button>

<?php endif; ?>
    </div>
</div>
