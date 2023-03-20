<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">PENGMAS</div>
    </a>

    <!-- ADMIN SIDEBAR -->
    <?php if ($user['role'] == 'admin') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('C_admin')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } ?>
    <!-- END ADMIN SIDEBAR -->

    <!-- PETUGAS SIDEBAR -->
    <?php if ($user['role'] == 'petugas') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('C_petugas')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php } ?>
    <!-- END PETUGAS SIDEBAR -->

    <?php if ($user['role'] == 'admin') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER DATA
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_admin/kategori')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kategori</span></a>
    </li>
    <?php } ?>

    <?php if ($user['role'] == 'admin') { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_admin/masyarakat')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Masyarakat</span></a>
    </li>
    <?php } ?>

    <?php if ($user['role'] == 'admin') { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_admin/petugas')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Petugas</span></a>
    </li>
    <?php } ?>


    <?php if ($user['role'] == 'admin') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        PENGADUAN
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_admin/pengaduan')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pengaduan</span></a>
    </li>
    <?php } ?>


    <?php if ($user['role'] == 'petugas') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER DATA
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_petugas/kategori')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kategori</span></a>
    </li>
    <?php } ?>

    <?php if ($user['role'] == 'petugas') { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_petugas/masyarakat')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Masyarakat</span></a>
    </li>
    <?php } ?>

    <?php if ($user['role'] == 'petugas') { ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_petugas/petugas')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Petugas</span></a>
    </li>
    <?php } ?>


    <?php if ($user['role'] == 'petugas') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        PENGADUAN
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('C_petugas/pengaduan')?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pengaduan</span></a>
    </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    

</ul>
<!-- End of Sidebar -->