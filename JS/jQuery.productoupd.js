$(document).ready(
  function(){
    carga();
  }
);

function carga(){
	$.ajax({
    url:'/App/Controller/Controller-actualizaProductoUpd.php?action=ajax',
		success:function(data){
			$(".prod-table").html(data).fadeIn('slow');
		}
	})
}
