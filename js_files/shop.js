$(document).ready(function () {
  $("#searchInput").on("input", function () {
    var query = $(this).val();
    if (query !== "") {
      $.ajax({
        url: "php_files/php_search.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
          $("#shopcontainer").html(data);
        },
      });
    } else {
      $("#shopcontainer").html("");
    }
  });
});
