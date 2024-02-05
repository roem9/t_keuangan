<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
    id="sidenav-main" data-color="info">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <img src="<?= base_url()?>/assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold"></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto pb-0" id="sidenav-collapse-mai">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#civitasMenu" class="nav-link <?= ($sidebar == "civitas") ? 'active' : '' ?>" aria-controls="civitasMenu"
                    role="button" aria-expanded="<?= ($sidebar == "civitas") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Civitas</span>
                </a>
                <div class="collapse <?= ($sidebar == "civitas") ? 'show' : '' ?>" id="civitasMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "karyawan") ? 'active' : '' ?>" href="
                                <?= base_url()?>civitas/karyawan">
                                <span class="sidenav-normal"> Karyawan </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kpq") ? 'active' : '' ?>" href="
                                <?= base_url()?>civitas/kpq">
                                <span class="sidenav-normal"> KPQ </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($sidebar == "rekap honor") ? 'active' : '' ?>" href="<?=base_url()?>rekap/honor">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Rekap Honor</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#transaksiMenu" class="nav-link <?= ($sidebar == "transaksi") ? 'active' : '' ?>" aria-controls="transaksiMenu"
                    role="button" aria-expanded="<?= ($sidebar == "transaksi") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Transaksi</span>
                </a>
                <div class="collapse <?= ($sidebar == "transaksi") ? 'show' : '' ?>" id="transaksiMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "piutang reguler") ? 'active' : '' ?>" href="
                                <?= base_url()?>piutang/reguler">
                                <span class="sidenav-normal"> Piutang Reguler </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "piutang pv khusus") ? 'active' : '' ?>" href="
                                <?= base_url()?>piutang/pvkhusus">
                                <span class="sidenav-normal"> Piutang PV Khusus </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "piutang pv luar") ? 'active' : '' ?>" href="
                                <?= base_url()?>piutang/pvluar">
                                <span class="sidenav-normal"> Piutang PV Luar </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "piutang pv instansi") ? 'active' : '' ?>" href="
                                <?= base_url()?>piutang/pvinstansi">
                                <span class="sidenav-normal"> Piutang PV Instansi </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "piutang civitas") ? 'active' : '' ?>" href="
                                <?= base_url()?>piutang/kpq">
                                <span class="sidenav-normal"> Piutang Civitas </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" onclick="return confirm('Apakah Anda yakin akan mengenerate piutang peserta reguler?')" href="<?=base_url()?>piutang/generatepiutangreguler">
                                <span class="sidenav-normal bg-danger"> Generate Piutang Reguler </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" onclick="return confirm('Apakah Anda yakin akan mengenerate piutang peserta privat?')" href="<?=base_url()?>piutang/generatepiutangprivat">
                                <span class="sidenav-normal bg-danger"> Generate Piutang Privat </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#transaksiLainMenu" class="nav-link <?= ($sidebar == "transaksi lain") ? 'active' : '' ?>" aria-controls="transaksiLainMenu"
                    role="button" aria-expanded="<?= ($sidebar == "transaksi lain") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Transaksi Lain</span>
                </a>
                <div class="collapse <?= ($sidebar == "transaksi lain") ? 'show' : '' ?>" id="transaksiLainMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "invoice lainnya") ? 'active' : '' ?>" href="<?=base_url()?>transaksi/invoice">
                                <span class="sidenav-normal"> Invoice Lainnya </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "transaksi lainnya") ? 'active' : '' ?>" href="<?=base_url()?>transaksi/lainnya">
                                <span class="sidenav-normal"> Transaksi Lainnya </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($sidebar == "ppu") ? 'active' : '' ?>" href="
                    <?= base_url('ppu') ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">PPU</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($sidebar == "laporan") ? 'active' : '' ?>" href="
                    <?= base_url('transaksi/laporan') ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                            <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Laporan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="logout()">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                            href="javascript:void(0);">Pages</a></li>
                    <?php if (isset($breadcrumbs)) : ?>
                    <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        <?= $breadcrumb ?>
                    </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (isset($breadcrumbSelect)) : ?>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                        <select name="moveSelected" id="moveSelected" style="border:none; background-color: inherit">
                            <?php foreach ($breadcrumbSelect as $select) : ?>
                            <?= $select ?>
                            <?php endforeach; ?>
                        </select>
                    </li>
                    <?php endif; ?>
                </ol>
                <h6 class="font-weight-bolder mb-0">
                    <?= $title ?>
                </h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
                <div
                    class="navbar-nav <?= (isset($searchButton) && $searchButton) ? 'justify-content-between' : 'justify-content-end' ?>">
                    <?php if (isset($searchButton) && $searchButton) : ?>
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="cari client" id="formSearch">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->


    <div class="container-fluid py-4">
        