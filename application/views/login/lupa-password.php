<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
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
            <h2 class="border-bottom p-2">Ubah Password</h2>
            <div class="p-5">
                <form action="<?= base_url('auth/changePassword'); ?>" method="post">
                    <div class="mb-3">
                        <label for="password1" class="form-label">Password</label>
                        <input type="password" name="password1" class="form-control" id="password1" required>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Password</label>
                        <input type="password" name="password2" class="form-control" id="password2" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
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