<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" id="success-alert">
        ✅ <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-success" id="error-alert">
        ⚠️ <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>
<div class="container-fluid mode to-back">
    <!-- header -->
    <div class="row p-2 align-items-center border-bottom">
        <!-- title -->
        <div class="col-6">
            <h1>Panel</h1>
        </div>
        <!-- icon pemberitahuan -->
        <div id="itahu" class="col" style="margin-left:10rem">
            <div class="item-create">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php base_url() ?>assets/icons/bell.svg" alt="">
                        <span id="unReadCount" class="badge text-bg-secondary"><?= $countNotif ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($notifikasi as $row) : ?>
                            <li class="main-notif">
                                <a class="dropdown-item" href="#">
                                    <div class="div">
                                        <p style="font-size: .8em;">
                                            <?= $row->waktu ?>
                                        </p>
                                        <p>
                                            <?= $row->pesan ?>
                                        </p>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach ?>
                        <?php if ($notifikasi) : ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('notifikasi/changeIsRead') ?>">Baca Semua</a>
                            </li>
                        <?php else : ?>
                            <?php null ?>
                        <?php endif; ?>
                    </ul>
                </li>
            </div>
        </div>
        <!-- icon create -->
        <div id="ibuat" class="col">
            <div class="item-create">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <img src="<?php base_url() ?>assets/icons/person-add.svg" alt="">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item btn-link" href="#" data-link="create-admin">
                                <img src="<?php base_url() ?>assets/icons/person-fill-add.svg" alt=""> Create Admin
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item btn-link" href="#" data-link="create-user">
                                <img src="<?php base_url() ?>assets/icons/person-fill-add.svg" alt=""> Create User
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item btn-link" href="#" data-link="create-hotel">
                                <img src="<?php base_url() ?>assets/icons/building-add.svg" alt=""> Create Hotel
                            </a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
        <!-- icon dark mode -->
        <div id="imode" class="col me-0">
            <div class="dark-mode">
                <span>
                    <img src="" alt="" id="img-icon" class="img-icons">
                </span>
            </div>
        </div>
        <!-- profile -->
        <div class="col">
            <img class="img-profile rounded-circle" src="<?= $foto ?>" alt="">
        </div>
    </div>
    <!-- end header -->
    <!-- dashboard -->
    <div class="row p-2" style="height:90vh;">
        <!-- nav -->
        <div id="border-nav" class="col-2 border-end text-center d-flex justify-content-between align-items-stretch flex-column gap-4 p-4">
            <div class="d-flex justify-content-start align-items-stretch flex-column gap-2">
                <div class="border-bottom p-2 mb-2">
                    <h3><?= $username  ?></h3>
                </div>
                <button id="idash" class="btn btn-info border-bottom btn-nav" data-tabs="admin">Dashboard</button>
                <button id="iuser" class="btn btn-info border-bottom btn-nav" data-tabs="user">User</button>
                <button id="ihotel" class="btn btn-info border-bottom btn-nav" data-tabs="hotel">Hotel</button>
                <button id="itrans" class="btn btn-info border-bottom  btn-nav" data-tabs="transaksi">Transaksi</button>
            </div>
            <div class="col-12">
                <a id="ilogout" onclick="logout()" href="<?= base_url('admin/logout') ?>" class="btn btn-info">Logout</a>
            </div>
        </div>
        <!-- admin -->
        <div class="col ms-1 content  p-2 active" id="admin">
            <div class="row">
                <div class="col-12 p-2">
                    <h3>Hai <span class="title"><?= $username ?></span></h3>
                    <p>Selamat Datang Kembali di Aplikasi <span class="title">Hotel.com</span></p>
                </div>
                <div class="col-12">
                    <div class="row text-center gap-3 p-2">
                        <div class="col border rounded bg-success bg-gradient text-center p-1">
                            <div class="text-start ms-2">
                                <img class="img-icons" src="<?php base_url() ?>assets/icons/people.svg" alt="">
                            </div>
                            <div class="p-1 mt-1">
                                <h2 class="total"><?= $total_user ?></h2>
                                <p>User</p>
                            </div>
                            <div class="p-1 mt-2 text-start  border-top">
                                <p>View Details ⇨</p>
                            </div>
                        </div>
                        <div class="col border rounded bg-warning bg-gradient p-1">
                            <div class="text-start ms-2">
                                <img class="img-icons" src="<?php base_url() ?>assets/icons/journal-arrow-down.svg" alt="">
                            </div>
                            <div class=" p-1 mt-1">
                                <h2 class="total"><?= $total_detail_reservasi ?></h2>
                                <p>Transaksi</p>
                            </div>
                            <div class="p-1 mt-2 text-start border-top">
                                <p>View Details ⇨</p>
                            </div>
                        </div>
                        <div class="col border rounded bg-secondary bg-gradient  p-1">
                            <div class="text-start ms-2">
                                <img class="img-icons" src="<?php base_url() ?>assets/icons/buildings.svg" alt="">
                            </div>
                            <div class=" p-1 mt-1">
                                <h2 class="total"><?= $total_hotel ?></h2>
                                <p>Hotel</p>
                            </div>
                            <div class="p-1 mt-2 text-start border-top">
                                <p>View Details ⇨</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="row text-center gap-3 p-2">
                        <div class="col p-2 border bg-info bg-gradient">
                            <p class="text-start p-1 border-bottom">Recently Users ⇲</p>
                            <?php foreach ($newUser as $row) : ?>
                                <div class="card-img ms-3 me-3">
                                    <img class="border rounded-circle img" src="<?= $row->image ?>" alt="">
                                    <p><?= $row->username ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col p-2 border bg-info bg-gradient">
                            <p class="text-start p-1 border-bottom">Recently Reservasi ⇲</p>
                            <?php foreach ($newReservasi as $row) : ?>
                                <div class="card-img ms-3 me-3">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <img class="border rounded-circle img" src="<?= $row->image ?>" alt="">
                                        <p class="sinama"><?= $row->nama ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- user -->
        <div class="col ms-1 p-4 content " id="user">
            <div class="row back bg-secondary">
                <div class="col">
                    <h2>Table User</h2>
                </div>
                <div class="col">
                    <div class="mt-3">
                        <select name="filterName" id="filterName">
                            <option value="id">Urutkan berdasarkan id</option>
                            <option value="name">Urutkan berdasarkan nama</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2 data" data-inp="user" type="search" placeholder="Search Name" aria-label="Search">
                                <button class="btn btn-outline-info cari" data-cari="user" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <table class="table table-hover table-light table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">isActive</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php $i = 1; ?>
                    <?php foreach ($user as $row) : ?>
                        <tr data-nama="<?= $row->nama ?>" data-id="<?= $row->id ?>" id="data-user">
                            <th scope="row" class="total"><?= $i ?></th>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->email ?></td>
                            <td><?= $row->username ?></td>
                            <td><?= $row->isActive ?></td>
                            <td>
                                <a href="<?= base_url('user/update_user?id=' . urlencode($row->id)); ?>" class="btn btn-warning image-container">
                                    <img class="img-icons " src="<?php base_url() ?>assets/icons/person-fill-up.svg" alt="icons-update">
                                    <span class="image-text">update</span>
                                </a>
                                <a id="delete" href="<?= base_url('user/delete_by_id?id=' . urlencode($row->id)); ?>" class="btn btn-danger image-container" onclick="return confirm('Hapus akun <?= $row->username; ?>?')">
                                    <img class="img-icons " src="<?php base_url() ?>assets/icons/person-x-fill.svg" alt="">
                                    <span class="image-text">Delete</span>
                                </a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- hotel -->
        <div class="col ms-1 p-4 content " id="hotel">
            <div class="row back bg-secondary">
                <div class="col">
                    <h2>Table Hotel</h2>
                </div>
                <div class="col">
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2 data-hotel" data-inp="hotel" type="search" placeholder="Search Name Hotel" aria-label="Search">
                                <button class="btn btn-outline-info cari" data-cari="hotel" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <table class="table table-hover table-light table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Hotel</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php $i = 1; ?>
                    <?php foreach ($hotels as $row) : ?>
                        <tr data-nama="<?= $row->nama_hotel ?>" data-id="<?= $row->id_hotel ?>" id="data-hotel">
                            <th scope="row" class="total"><?= $i ?></th>
                            <td><?= $row->nama_hotel ?></td>
                            <td><?= $row->kota ?></td>
                            <td><?= (strlen($row->desk) > 35) ? substr($row->desk, 0, 35) . '...' : $row->desk ?></td>
                            <td>
                                <a href="<?= base_url('hotel/update_hotel?id=' . urlencode($row->id_hotel)); ?>" class="btn btn-warning image-container">
                                    <img class="img-icon" src="<?php base_url() ?>assets/icons/person-fill-up.svg" alt="icons-update">
                                    <span class="image-text">update</span>
                                </a>
                                <a href="<?= base_url('hotel/delete_hotel?id=' . urlencode($row->id_hotel)); ?>" class="btn btn-danger image-container" onclick="return confirm('Hapus hotel <?= $row->nama_hotel; ?>?')">
                                    <img class="img-icon" src="<?php base_url() ?>assets/icons/person-x-fill.svg" alt="">
                                    <span class="image-text">Delete</span>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Transaksi -->
        <div class="col ms-1 p-4 content " id="transaksi">
            <div class="row back bg-secondary">
                <div class="col">
                    <h2>Table Hotel</h2>
                </div>
                <div class="col">
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2 data-transaksi" data-inp="transaksi" type="search" placeholder="Search Name transaksi" aria-label="Search">
                                <button class="btn btn-outline-info cari" data-cari="transaksi" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <table class="table table-hover table-light table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">Type</th>
                        <th scope="col">Reservasi</th>
                        <th scope="col">Checkin</th>
                        <th scope="col">Checkout</th>
                        <th scope="col">Orang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php $i = 1; ?>
                    <?php foreach ($reservasi as $row) : ?>
                        <tr data-nama="<?= $row->nama ?>" data-id="<?= $row->id_reservasi ?>" id="data-transaksi">
                            <th scope="row" class="total"><?= $i ?></th>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->nama_hotel ?></td>
                            <td><?= $row->no_kamar ?></td>
                            <td><?= $row->tipe_kamar ?></td>
                            <td><?= $row->tanggal_reservasi ?></td>
                            <td><?= $row->tanggal_checkin ?></td>
                            <td><?= $row->tanggal_checkout ?></td>
                            <td><?= $row->jumlah_orang ?></td>
                            <td><?= $row->status ?></td>
                            <td class="d-flex gap-3">
                                <a href="<?= base_url('transaksi/update_reservasi/' . $row->id_reservasi); ?>" class="btn btn-warning image-container">
                                    <img class="img-icon" src="<?php base_url() ?>assets/icons/person-fill-up.svg" alt="icons-update">
                                    <span class="image-text">update</span>
                                </a>
                                <a href="<?= base_url('transaksi/delete_transaksi?id=' . $row->id_reservasi); ?>" class="btn btn-danger image-container" onclick="return confirm('Hapus transaksi ini <?= $row->nama; ?>')">
                                    <img class="img-icon" src="<?php base_url() ?>assets/icons/person-x-fill.svg" alt="">
                                    <span class="image-text">Delete</span>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>