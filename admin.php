<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <?php
    include("components/admin_components/admin_header.php");
    ?>

    <div class="app-main">
        <?php include("components/admin_components/admin_sidebar.php"); ?>
        <div class="app-main__outer">
            <div class="app-main__inner">

                <?php
                include("views/admin/admin_views.php");
                ?>
            </div>
        </div>
    </div>

    <?php
    include("resources/inc/adminScripts/adminScripts.php");
    ?>

</div>