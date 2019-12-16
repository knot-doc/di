<?php
/** @var array $page_info */
/** @var string $lang */
?>
<div class="card error">
    <div class="card-body error-body">
        <h1>404/Page Not Found</h1>
        <div>
            <?php e($path); ?> is not found on this server.
        </div>
        <hr class="my-4 pb-2">

        <a href="<?php e('/' . $lang . '/'); ?>" class="btn blue-gradient btn-rounded">
            HOME <i class="fas fa-home"></i>
        </a>
    </div>
</div>


<script>
function get_page_id()
{
    return '';
}
</script>