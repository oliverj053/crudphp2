$(document).ready(function(){
	$('#select').on('change', function(){

		var selectValor = '#'+$(this).val();

		$('#op').children('div').hide();
		$('#op').children(selectValor).show();
	});


});
$(document).ready(function(){
                    $("#on1").click(function(){
                          $("#div2").show();
                    });
    });

$(document).ready(function(){
$("#on1").click(function(){
$("#div2").toggle(1000);

});
});
