<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/admin/assets/vendor/libs/popper/popper.js"></script>
<script src="assets/admin/assets/vendor/js/bootstrap.js"></script>
<script src="assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="assets/admin/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="assets/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="assets/admin/assets/js/main.js"></script>

<!-- Page JS -->
<script src="assets/admin/assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    const table = new DataTable('#klasemen', {
      columnDefs: [{
        searchable: false,
        orderable: false,
        targets: 0
      }],
      order: [
        [8, 'desc'],
        [6, 'desc'],
      ]
    });
    table
      .on('order.dt search.dt', function() {
        let i = 1;

        table
          .cells(null, 0, {
            search: 'applied',
            order: 'applied'
          })
          .every(function(cell) {
            this.data(i++);
          });
      })
      .draw();
  });
</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="assets/vendors/pnotify/dist/pnotify.js"></script>
<script src="assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
</body>

</html>