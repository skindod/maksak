

	</body>
	<!-- end::Body -->
</html>
<script>
    <?php if(isset($_SESSION['msgstatus'])){ ?>
        <?php if($_SESSION['msgstatus'] == 1){ ?>
            var status = "success";
        <?php } else { ?>
            var status = "error";
        <?php } ?>
        var msg = "<?php echo $_SESSION['msg']; ?>";
        Command: toastr[status](msg);

        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "400",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        <?php $this->session->unset_userdata('msgstatus'); $this->session->unset_userdata('msg'); ?>
    <?php } ?>
</script>