$(document).ready(function() {
  $(".amount").val(0);
  //alert('entred');
  removeRec();
  calculation();
  $('#new_row').click(function() {
    var val = $(this).attr("data-id");
    var inc = parseInt(val) + 1;
    $('#form_inc').val(inc);
    // var inc=++val;
    $(this).attr('data-id', inc);
    var container = $("<tr data-id=" + inc + " id='rec_" + inc + "'>" +
      "<td class='sm_table'><input type='text' name='sno_" + inc + "' value='" + inc + "'></td>" +
      "<td> <input type='text' name='particular_" + inc + "' value=''></td>" +
      "<td class='sm_table'><input name='weight_" + inc + "' class=weight type='text'></td>" +
      "<td><input class='purity' name='purity_" + inc + "' value='' type='text'></td>" +
      "<td><input class='netGms' name='netgms_" + inc + "' value='' type='text'></td>" +
      "<td><input class='mCharge' name='mcharge_" + inc + "'  value='' type='text'></td>" +
      "<td><input class='amount'  data-id='"+inc+"'  name='amount_" + inc + "'  value='' type='text'></td>" +
      "<td>"+
        "<span data-id='"+inc+"' class='fa fa-plus trigAddRow' aria-hidden='true'></span>"+
        "<span data-id='rec_" + inc + "'  class='delete_row  glyphicon glyphicon-remove'></span>"+
        "</td></tr>");
    container.appendTo($('#usertbl'));
    $("input[name='drug_code_" + inc + "']").focus();
    removeRec();
  });
});

function autoSum() {
  var sum = 0;
  $(".amount").each(function() {
    sum += parseInt($(this).val());
  });
  $('.totalCol span').text(sum);
  var cgstval = $('.cgst').attr("data-value");
  var cgst = ((sum * cgstval) / 100);
  $('.cgst span').html(cgst);
  var sgstval = $('.sgst').attr("data-value");
  var sgst = ((sum * sgstval) / 100);
  $('.sgst span').html(sgst);
  var totalAmount = cgst + sgst + sum;
  $('.sumTotal span').html(totalAmount);
}

function removeRec() {
  $('#usertbl').find('.delete_row').click(function(){
		var tr_rec=$(this).attr('data-id');
		$('#usertbl').find('#'+tr_rec).remove();
		var id = $('#usertbl tr:last').attr('data-id');
		$('#new_row').attr('data-id',id);
	});
  $('.next_row').bind('keypress', function(event) {
	  if(event.which === 13) {
	  	var next_row=$('#new_row').attr('data-id');
	  	var next_btn=$(this).attr('data-id');
		  	if (next_row==next_btn) {
		     $( "#new_row" ).trigger( "click" );
		       $(this).next('input').focus();
		 	}
	  }
      calculation();
	});
  $('.trigAddRow').on('click', function(event) {
	  	var next_row=$('#new_row').attr('data-id');
	  	var next_btn=$(this).attr('data-id');
		  	if (next_row==next_btn) {
		     $( "#new_row" ).trigger( "click" );
		       $(this).next('input').focus();
		 	}
      calculation();
	});
}
function calculation(){
  $('.weight ,.purity').on('change', function() {
    var weight = $(this, '.weight').val();
    //alert(weight);
    var purity = $(this, '.purity').val();
    //alert(purity);
    //var netgms=$('').val();
    var result = (weight * purity) / 100;

    $(this).parent().siblings().find('.netGms').val(result);


  });
  $('.mCharge').on('change', function() {
    var weight = $('.weight').val();
    var mCharge = $(this).val();
    var result = (weight * mCharge);
    $(this).closest('tr').find('.amount').val(result);
    autoSum();
  });

}
