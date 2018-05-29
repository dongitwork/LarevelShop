$("div.alert").delay(5000).slideUp(500);

$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});

$('#province').change(function(){
    var ProvinceId = $("#province option:selected").val();
    $.get('loadDistrict/'+ProvinceId, function(data){
        $('#district').empty().append($('<option></option>').attr('value', null).text('-- Vui lòng chọn --'));
        for(row in data){
            $('#district').append($('<option></option>').attr('value', data[row].DistrictId).text(data[row].DistrictName));
        }
    });
});

$('#district').change(function(){
    var DistrictId = $("#district option:selected").val();
    //alert(DistrictId);
    $.get('loadWard/'+DistrictId, function(data){
        $('#ward').empty().append($('<option></option>').attr('value', null).text('-- Vui lòng chọn --'));
        for(row in data){
            $('#ward').append($('<option></option>').attr('value', data[row].WardId).text(data[row].WardName));
        }
    });
});


$('#order_status').change( function() {
    $('div.shipper').hide();
    var value = $(this).val();
    if (value == 2 || value == 3 || value == 4) {
        $('div.shipper').show();
    } else {
        $('div.shipper').hide();
        $('#shipper').val(null);
    }
}).trigger('change');
