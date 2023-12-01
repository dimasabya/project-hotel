<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
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