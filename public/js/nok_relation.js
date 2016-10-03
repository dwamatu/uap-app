var rel = ["", "Mother", "Father", "Brother", "Sister"];

var reloption = "";
$.each(rel, function (i) {
    reloption += '<option value="' + rel[i] + '">' + rel[i] + '</option>';
});
$('#next_of_kin_relation').append(reloption);
