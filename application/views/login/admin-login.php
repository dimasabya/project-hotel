<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css">
</head>

<body>
    <div class="container-fluid bg-info p-5" style="height:100vh;">
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
        <div id="log" class=" border border-2 rounded w-50 bg-primary text-center mx-auto mt-5 p-2">
            <h2 class="border-bottom p-2">Admin Login</h2>
            <div class="p-5">
                <form action="<?= base_url('auth/process_login'); ?>" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
                <div class="mt-3 text-start">
                    <a href="#" class="forgot text-white">Lupa Password?</a>
                </div>
            </div>
            <?php
            //menampilkan san kesalahan yg dikirim dari controller
            if (isset($error_message)) {
                echo "<span class='text-light border p-2 mb-2 bg-danger d-inline-block'>⚠️ $error_message</span>";
            }
            ?>
        </div>
        <div id="changePassword" class="border border-2 rounded w-50 bg-primary text-center mx-auto mt-5 p-2 close">
            <h2 class="border-bottom p-2">Lupa Password</h2>
            <div class="p-5">
                <form action="<?= base_url('auth/getEmail'); ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <p style="font-size:.8em; color:red;">⚠️Masukan email yang telah terdaftar⚠️</p>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
                <div class="mt-3 text-start">
                    <a href="<?php base_url('admin'); ?>" class="forgot text-white">Login</a>
                </div>
            </div>
            <?php
            //menampilkan san kesalahan yg dikirim dari controller
            if (isset($error_message)) {
                echo "<span class='text-light border p-2 mb-2 bg-danger d-inline-block'>⚠️ $error_message</span>";
            }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/login.js"></script>
</body>

</html>