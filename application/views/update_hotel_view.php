<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .error {
            color: white;
            font-weight: bold;
            font-size: .8em;
            border: 1px;
            border-radius: 10px;
            background-color: red;
            width: 50%;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-info p-2 overflow-y-hidden" style="height:100vh;">
        <div class=" border border-2 rounded w-50 bg-primary text-center mx-auto  p-2">
            <h2 class="border-bottom p-2">Update Hotel</h2>
            <div class="p-5">
                <!-- dalam tag form di base_urlnya itu didalam mengirimkan paramter id -->
                <form action="<?= base_url('hotel/procces_update_hotel/' . $hotel->id_hotel) ?>" method="post">
                    <input type="hidden" name="id" value="<?= $hotel->id_hotel ?>">
                    <div class="mb-3">
                        <label for="nama_hotel" class="form-label">Nama Hotel</label>
                        <input type="text" class="form-control" name="nama_hotel" value="<?= $hotel->nama_hotel ?>">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" name="kota" value="<?= $hotel->kota ?>">
                    </div>
                    <div class="mb-3">
                        <label for="desk" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="desk" value="<?= $hotel->desk ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="<?= $hotel->password ?>">
                    </div> -->

                    <button type="submit" class="btn btn-danger mb-3">Update</button>
                </form>
            </div>
        </div>
    </div>

    <div class="error">
        <?php echo validation_errors() ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>