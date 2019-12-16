<?php
/** @var string $lang */
?>
<div class="jumbotron text-center blue-grey lighten-5">

    <img src="/images/knot.png" width="128" height="128" alt="knot">
    <h2>knot-lib/di</h2>

    <p class="indigo-text my-4 font-weight-bold">
        Pimple-like DI container library
    </p>

    <div class="row d-flex justify-content-center">

        <!-- Grid column -->
        <div class="col-xl-7 pb-2">

            <p class="card-text">
                knot-lib/di is a library of DI(Dependency Injection) container.
            </p>

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->

    <hr class="my-4 pb-2">

    <a href="<?php e('/' . $lang . '/'); ?>" class="btn blue-gradient btn-rounded">
        Document <i class="fas fa-book"></i>
    </a>
    <a href="https://github.com/knot-lib/di" class="btn btn-indigo btn-rounded" target="_blank">
        GitHub <i class="fas fa-download ml-1"></i>
    </a>

</div>

<script>
function get_page_url()
{
    return '/';
}
</script>