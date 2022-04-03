$(document).ready(
  function(){
    carga_t();
    console.log('funciona');
  }
);

function carga_t(){
	// var q= $("#q").val();
	// $("#loader").fadeIn('slow');
	$.ajax({
		// url:'/App/Controller/Controller-dashboard.php?action=ajax&page='+page+'&q='+q,
    url:'/App/Controller/Controller-dashboard.php?action=ajax',
		// beforeSend: function(objeto){
		// 	$('#loader').html('<img src="/Script/IMG/ajax-loader.gif"> Cargando...');
		// },
		success:function(data){
			$(".productos").html(data).fadeIn('slow');
			// $('#loader').html('');
		}
	})
}
