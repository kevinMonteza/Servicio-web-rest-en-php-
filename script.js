
$(document).ready(function(){
   		     	iniciar();
   		     	limpiar();
   		     $("#buscar").bind('click',buscar);
   		     $("#ingresa").bind('click',registro);
   		     $("#elimina").bind('click',eliminar);
   		     $("#actualiza").click(function(){eliminar(1);registro(1);limpiar();});
          $("#actualiza").bind('click',actualiza);
          
        /*  function actualiza(){
           var url="http://ec2-18-216-128-25.us-east-2.compute.amazonaws.com/webservicePrestamo/productos/";
            var producto = new Object();
              producto.id=null;
              producto.nombre=$("#nombre").val();
              producto.descripcion=$("#descripcion").val();
              producto.categoria=$("#categoria").val();
              producto.precio=$("#precio").val();
              producto.existencia=$("#existencia").val();
              $.post(url,producto,function(datos,status){
              console.log(status+"el estado"+datos.response);
                if(e!==1){
                  alert('articulo actucalizado con exito');
                  limpiar();
                  iniciar();
                }
              });
          }*/

   		     function buscar(){
   		     	console.log($("#data").val());
   		     	var url="http://localhost/webservicePrestamo/productos/".concat($("#data").val());
   		     	console.log(url);
       			 $.get(url,function(datos){
       			  console.log(datos);
		       		 $("#cont").html("<p><Nombre: "+datos.response.nombre+"</p>");
		       		 $("#cont").append("<p>Descripcion: "+datos.response.descripcion+"</p>");
		       		 $("#cont").append("<p>Categoria: "+datos.response.categoria+"</p>");
		       		 $("#cont").append("<p> Precio: "+datos.response.precio+"</p>");
		       		 $("#cont").append("<p> Existencias: "+datos.response.existencia+"</p>");
       		 });
       			 $("#data").val("").focus();
   		     }
   		     function iniciar(){
   		     		var url="http://localhost/webservicePrestamo/productos/";
   		     	    console.log(url);
                $("#cuerpo").html("");
   		     		$.get(url,function(datos){
       		 	    datos.response.forEach(function(item,index){
       		 		$("#cuerpo").append("<tr>");
       		 		$("#cuerpo").append("<td style=\"border:2px solid;padding:4px 4px;\">"+item.id+"</td>");
       		 		$("#cuerpo").append("<td style=\"border:2px solid;padding:4px 4px;\">"+item.nombre+"</td>");
       		 		$("#cuerpo").append("<td style=\"border:2px solid;padding:4px 4px;\">"+item.descripcion+"</td>");
       		 		$("#cuerpo").append("<td style=\"border:2px solid;padding:4px 4px;\">"+item.categoria+"</td>");
       		 		$("#cuerpo").append("<td style=\"border:2px solid;padding:4px 4px;\">"+item.precio+"</td>");
       		 		$("#cuerpo").append("<td style=\"border:2px solid;padding:4px 4px;\">"+item.existencia+"</td>");
				    	$("#cuerpo").append("</tr><br>");
       		 	});
       		 }); 
          }
   		    function registro(e){
   		     	var url="http://ec2-18-216-128-25.us-east-2.compute.amazonaws.com/webservicePrestamo/productos/";
   		     	var producto = new Object();
   		     	  producto.id=null;
   		     	  producto.nombre=$("#nombre").val();
   		     	  producto.descripcion=$("#descripcion").val();
   		     	  producto.categoria=$("#categoria").val();
   		     	  producto.precio=$("#precio").val();
   		     	  producto.existencia=$("#existencia").val();
   		     	  $.post(url,producto,function(datos,status){
   		     	  	console.log(status+"el estado"+datos.response);
   		     	  	if(e!==1){
   		     	  	  alert('articulo ingresado con exito');
   		     	  	  limpiar();
   		     	  	  iniciar();
   		     	  	}
   		     	  });
   		     }
   		    function eliminar(e){
   		    	var url="http://ec2-18-216-128-25.us-east-2.compute.amazonaws.com/webservicePrestamo/productos/".concat($("#nombre").val());
            console.log(url);
            $.post(url,function(datos,status){
              if(e!==1){
                  console.log(status+"el estado"+datos);
                  alert('articulo eliminado con exito');
                  limpiar();
                  iniciar();
                }
              });
                } 
});
		function limpiar(event){
   		    	 $("#data").val("");
   		    	 $("#nombre").val("").focus();
   		     	 $("#descripcion").val("");
   		     	 $("#categoria").val("");
   		     	 $("#precio").val("");
   		     	 $("#existencia").val("");
   		    }
