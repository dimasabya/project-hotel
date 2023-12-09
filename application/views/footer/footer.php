<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
<script>
    function showDriver() {

        const driver = window.driver.js.driver

        const driverObj = driver({
            showProgress: true,
            overlayColor: 'red',
            steps: [{
                    element: '#itahu',
                    popover: {
                        title: 'Icon Pemberitahuan',
                        description: 'Berfungsi ketika ada user baru registrasi maka akan berfungsi icon ini'
                    }
                },
                {
                    element: '#ibuat',
                    popover: {
                        title: 'Icon Create',
                        description: 'Berfungsi untuk menambah admin, user dan hotel'
                    }
                },
                {
                    element: '#imode',
                    popover: {
                        title: 'Icon DarkMOde',
                        description: 'Digunakan untuk merubah tampilan dashboard'
                    }
                },
                {
                    element: '#idash',
                    popover: {
                        title: 'Button Dashboard',
                        description: 'Navigasi untuk ke halaman utama dashboard'
                    }
                },
                {
                    element: '#iuser',
                    popover: {
                        title: 'Button Users',
                        description: 'Navigasi untuk ke halaman users'
                    }
                },
                {
                    element: '#ihotel',
                    popover: {
                        title: 'Button Hotels',
                        description: 'Navigasi untuk ke halaman hotels'
                    }
                },
                {
                    element: '#itrans',
                    popover: {
                        title: 'Button Transaksi',
                        description: 'Navigasi untuk ke halaman tansaksi'
                    }
                },
            ]
        })

        driverObj.drive()
        localStorage.setItem('driverShow', true)
    }

    const show = localStorage.getItem('driverShow')
    if (!show) {
        showDriver()
    }

    function logout() {
        localStorage.removeItem("driverShow");
    }
</script>
<script src="<?= base_url(); ?>assets/js/admin.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<!-- <script>
    function updateNotifikasi() {
        $.ajax({
            url: '<?php echo site_url('notifikasi/getUnreadCount'); ?>',
            type: 'Get',
            dataType: 'json',
            success: function(response) {
                $('#unReadCount').text(response.unReadCount)
            }
        })

    }
    $(document).ready(function() {
        console.log('oke')
        updateNotifikasi()


        setInterval(updateNotifikasi, 8000)
    })
</script> -->
</body>

</html>