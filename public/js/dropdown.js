// $("#division").change(event => {
// 	$.get('areas/${event.target.value}', function(res,sta){
// 		$("#area").empty();
// 		res.forEach(element => {
// 			$("#areas").append('<option value=${element.id}> ${element.nombre}</option>')
// 		});
// 	});
// });

$("#division").change(function(event){
	$.get("areas/"+event.target.value+"",function(response,division){
		//console.log(response);
		$("#area").empty();
		$("#area").append("<option value='0'>...</option>");
		for (i = 0 ; i<response.length; i++){
			$("#area").append("<option value='"+response[i].id+"'> "+response[i].nombre+"</option>");
		}
	});
});