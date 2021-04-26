</div>

</main>

<!-- FOOTER -->
<footer class="bg-grey mt-5 pt-3 pb-2">
  <div class="container">
    <p class="float-right"><a href="<?= base_url('admin/auth'); ?>">Admin Log</a></p>
    <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </div>
</footer>



</body>

<script>
  window.jQuery || document.write('<script src="<?= base_url('assets/home/'); ?>jquery.slim.min.js"><\/script>')
</script>
<script src="<?= base_url('assets/admin/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/home/'); ?>bootstrap.bundle.js"></script>
<script src="<?= base_url('assets/admin/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function() {
    $('.DataTable').DataTable();
    $('.select2').select2()
  })
</script>


</html>