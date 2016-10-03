function getCropList(farmerCrop) {
  var link = "/customers/crop/list";

  $.ajax({
    type: "GET",
    url: link,
    dataType: "json",
    success: function(crops) {
      var options = '';

      if ('undefined' === typeof farmerCrop || null === $.trim(farmerCrop) || null === farmerCrop) {
        options += '<option value="">None</option>';
      }

      for (var i = 0; i < crops.length; i++) {
        console.log(String(crops[i].product_name).toLowerCase());
        console.log(String(farmerCrop).toLowerCase());

        if (String(crops[i].product_name).toLowerCase() === String(farmerCrop).toLowerCase()) {
          options += '<option selected="selected" value="' + crops[i].product_name + '">' + crops[i].product_name + '</option>';
        } else {
          options += '<option value="' + crops[i].product_name + '">' + crops[i].product_name + '</option>';
        }
      }

      $("#farmer_crop").html(options).selectpicker('refresh');
    }
  });
}