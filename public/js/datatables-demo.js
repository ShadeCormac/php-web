// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    bFilter: false
  });

  $(document).on("click", ".btn-delete", function(e) {
    if (!confirm("Are you sure you want to delete this?")) {
      return false;
    }

    var product_id = $(this).data("id");
    window.location = "/php-web/admin/delete_product/" + product_id;
  });
});
