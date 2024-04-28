<style>
    .nav-treeview .nav-item .nav-link .far {
        margin-left: 25px;
        /* Sesuaikan dengan jumlah indentasi yang diinginkan */
    }
</style>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="index.php?page=dashboard" class="nav-link">
                <i class="nav-icon fas bi bi-speedometer2"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=schedule" class="nav-link">
                <i class="nav-icon fas bi bi-calendar"></i>
                <p>
                    Schedule List
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=today_schedule" class="nav-link">
                <i class="nav-icon fas bi bi-calendar-check"></i>
                <p>
                    Schedule Today
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=report" class="nav-link">
                <i class="nav-icon fas bi bi-clipboard-check"></i>
                <p>
                    Report
                </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas bi bi-house-gear"></i>
                <p>
                    Maintanance
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="index.php?page=ship" class="nav-link">
                        <i class="far bi bi-train-freight-front nav-icon"></i>
                        <p>Vessel List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=port" class="nav-link">
                        <i class="far bi bi-sign-stop-lights nav-icon"></i>
                        <p>Port List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=accomodation" class="nav-link">
                        <i class="far bi bi-tag nav-icon"></i>
                        <p>Accomodation List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=price" class="nav-link">
                        <i class="far bi bi-tags nav-icon"></i>
                        <p>Price List</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.nav-item.menu-open').removeClass('menu-open');
        $('.nav-item.menu-open > a').click(function() {
            $('.nav-item.menu-open').removeClass('menu-open');
            $(this).parent().addClass('menu-open');
        });
    });
</script>