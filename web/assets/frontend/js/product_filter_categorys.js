$("#btn-filter").live("click",function(){
	var id_categoria = $("#filter :selected").val();
	window.location = "http://sumi_cs/productos/listar/cat/"+id_categoria;
});
// $("#btn-clean").live("click",function(){
// 	$("#filter").val("");
// 	$("#value").val("");
// 	window.location = "' .PUBLIC_FOLDER_ADMIN .'trabajos/listar.html";
// });
