<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('img/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= session()->get('nama_user') ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i>
                    <?php if (session()->get('level') == 1) { ?>
                        Admin
                    <?php } else if (session()->get('level') == 2) { ?>
                        User
                    <?php } else { ?>
                        Pelanggan
                    <?php } ?></a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php if (session()->get('level') == 1) { ?>
                <li>
                    <a href="<?= base_url('menu/menuAdmin') ?>">
                        <i class="fa fa-home"></i> <span>Menu Admin 1</span>
                    </a>
                </li>

                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Menu Admin 2</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (session()->get('level') == 2) { ?>
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Menu User 1</span>
                    </a>
                </li>
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Menu User 2</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (session()->get('level') == 3) { ?>
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Menu pelanggan 1</span>
                    </a>
                </li>
                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Menu pelanggan 2</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">