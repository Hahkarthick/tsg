$(document).ready(function(){
//alert('entred');
	$('.weight ,.purity').on('change',function(){
  // alert('entred');
  		var weight=$(this,'.weight').val();
      //alert(weight);
      var purity=$(this,'.purity').val();
      //alert(purity);
      //var netgms=$('').val();
      var result=(weight*purity)/100;
      $('.netGms').val(result);
      //alert(result);
      
  });
  $('.mCharge').on('change',function(){
  	var weight=$('.weight').val();
    var mCharge=$(this).val();
    var result=(weight*mCharge);
    $('.amount').val(result)
  });
});