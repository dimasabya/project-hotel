<!-- form cretae admin, user dan hotel -->
<div class="row">
    <!-- admin -->
    <div class="col link-create" id="create-admin">
        <span class="link-close">X</span>
        <div class=" border border-2 rounded w-50 bg-primary text-center mx-auto mt-5 p-2">
            <h2 class="border-bottom p-2">Create Admin</h2>
            <div class="p-5">
                <form action="<?= base_url('admin/create_admin'); ?>" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="emailAdmin" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- user -->
    <div class="col link-create" id="create-user">
        <span class="link-close">X</span>
        <div class=" border border-2 rounded w-50 bg-primary text-center mx-auto mt-5 p-2">
            <h2 class="border-bottom p-2">Create User</h2>
            <div class="p-5">
                <form action="<?= base_url('admin/create_user'); ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="emailUser" required>
                    </div>
                    <div class="mb-3">
                        <label for="username_user" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_user" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password_user" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- hotel -->
    <div class="col link-create" id="create-hotel">
        <span class="link-close">X</span>
        <div class=" border border-2 rounded w-50 bg-primary text-center mx-auto mt-5 p-2">
            <h2 class="border-bottom p-2">Create User</h2>
            <div class="p-5">
                <form action="<?= base_url('admin/create_hotel'); ?>" method="post">
                    <div class="mb-3">
                        <label for="nama_hotel" class="form-label">Nama Hotel</label>
                        <input type="text" name="nama_hotel" class="form-control" id="nama_hotel" required>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control" id="kota" required>
                    </div>
                    <div class="mb-3">
                        <label for="desk" class="form-label">Deskripsi</label>
                        <input type="text" name="desk" class="form-control" id="desk" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>