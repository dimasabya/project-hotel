<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authtentikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="mt-5">
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
            <div class="card">
                <div class="card-header">
                    <?= $title ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $mainTitle ?></h5>
                    <p class="card-text"><?= $date ?></p>
                    <p class="card-text"><?= $pesan ?></p>
                    <p class="card-text"><?= $end ?></p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/login.js"></script>
</body>

</html>