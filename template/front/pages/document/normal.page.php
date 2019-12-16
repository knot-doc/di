<?php /** @noinspection PhpIncludeInspection */

use KnotDoc\Di\View\ViewHelper;

/** @var string $page_html */
/** @var string $page_id */
/** @var array $page_url */
/** @var ViewHelper $helper */
?>
<div class="row">
    <div class="col-md-8 offset-md-2 contents">
        <?php echo($page_html), PHP_EOL; ?>
    </div>
</div>

<?php require $helper->parts('contents_footer'); ?>

<script>
function get_page_url()
{
    return '<?php e($page_url[$page_id]); ?>';
}
</script>
