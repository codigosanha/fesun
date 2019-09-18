$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
	      autoclose: true,
	      language:'es'
	    })
	});	

$(document).ready(function(){
	 $('.timepicker').timepicker({
      showInputs: false
    });
	$("#checkChangePassword").on("change", function(){
		$("#password").val(null);
		if($(this).prop('checked')) {
		    $(this).val("1");
		    
		    $("#password").removeAttr("disabled");
		    $("#password").attr("required","required");

		}else{
			$(this).val("0");
			$("#password").attr("disabled","disabled");
			$("#password").removeAttr("required");
		}
	});

	$(document).on("click","#btn-import", function(){
		$("body").prepend("<div class='loader'></div>");
	});

	 $(document).on("click",".btn-view-asociado", function(){
	 	idasociado = $(this).attr("data-href");
		window.open(base_url +'backend/asociados/view/'+idasociado, '_blank', 'fullscreen=yes'); return false;
	});
	$(document).on("click", ".btnAprobarSolicitud", function(){
		idasociado = $(this).val();
		estado = 1;
		CambiarEstadoSolicitud(idasociado,estado);
	});
	$(document).on("click",".btnDesaprobarSolicitud", function(){
		idasociado = $(this).val();
		estado = 0;
		CambiarEstadoSolicitud(idasociado,estado);
	});

	function CambiarEstadoSolicitud(asociado,estado){
		$.ajax({
			url: base_url + "backend/asociados/changeEstadoSolicitud",
			type: "POST",
			data: {idasociado:asociado,estado:estado},
			success:function(data){
				//alert(data);
				if (data==1) {
					swal({
				     title: "Hecho!",
				     text: "El estado de la solicitud fue cambiado",
				     type: "success",
				     timer: 3000
				     },
				     function () {
				            location.reload(true);
				            tr.hide();
				    });
				}else{
					swal("Error!","No se pudo actualizar el estado de la solicitud.", "error");

				}
				
			}
		});
	}

	$("#form-finca").submit(function(e){
		e.preventDefault();

		data = $(this).serialize();
		$.ajax({
			url: base_url + "administrador/usuarios/saveFinca",
			type : "POST",
			data: data,
			success:function(resp){
				if (resp=="0") {
					swal("Error!","No se pudo asignar la finca al usuario", "error");
				}else{
					$(".usuariofincas").html(resp);
				}
			}
		});
	});
	
	$(document).on("click", ".btn-add-finca", function(){
		id = $(this).val();
		$("#idUsuario").val(id);
		$.ajax({
			url: base_url + "administrador/usuarios/getFincas",
			type:"POST",
			data:{id:id},
			success: function(resp){
				$(".usuariofincas").html(resp);
			}
		});
	});
	$("#guardar").click(function() {
		
		var inputs = $("input[required='required']");
		var selects = $("select[required='required']");
		
		inputs.each(function() {

		    if ($(this).val() == "") {

		      	var current = $(this).closest(".panel-collapse");

		      	if (!current.hasClass("in")) {
		       		current.collapse("show");
		       		
		      	}

		      return false;
		    }
		});
		selects.each(function() {

		    if ($(this).val() == "") {

		      	var current = $(this).closest(".panel-collapse");

		      	if (!current.hasClass("in")) {
		       		current.collapse("show");
		       		
		      	}

		      return false;
		    }
		});
		/*selects.each(function() {

		    if ($(this).val() == "") {

		      var current = $(this).closest(".panel-collapse");

		      	if (!current.hasClass("in")) {
		       		current.collapse("show");
		      	}

		      return false;
		    }
		});*/

		/*$.ajax({
			url: base_url + "backend/asociados/save",
			type: "POST",
			data: data,
			success: function(resp){

				if (resp == "1") {
					swal({
				     title: "Bien Hecho!",
				     text: "La informacion del formulario fue guardada",
				     type: "success",
				     timer: 3000
				     },
				     function () {
				            location.reload(true);
				            tr.hide();
					});
				}else{
					swal("Error!","No se pudo guardar la informacion del formulario", "error");

				}
				
			}

		});*/

	});
	$('.select2').select2();

	function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
	}
	$('.panel-group').on('hidden.bs.collapse', toggleIcon);
	$('.panel-group').on('shown.bs.collapse', toggleIcon);

	$("#vinculado_fondo").on("change", function(){
		if ($(this).val() == 1) {
			$("#nombre_entidad").removeAttr("disabled").attr("required","required");

		}else{
			$("#nombre_entidad").removeAttr("required").attr("disabled","disabled").val(null);

		}
	});
	$("#tipo_poblacion").on("change", function(){
		if ($(this).val() == 3) {
			$("#otra_poblacion").removeAttr("disabled").attr("required","required");

		}else{
			$("#otra_poblacion").removeAttr("required").attr("disabled","disabled").val(null);

		}
	});
	$(document).on("click", ".btn-add-beneficiario", function(){
		columns = $(this).closest("tr").html();
		html = "<tr>"+columns+"</tr>";
		$("#tb-beneficiarios tbody").append(html);
		$(this).removeClass("btn-success btn-add-beneficiario").addClass("btn-danger btn-delete-beneficiario");
		$(this).children("span").removeClass("fa-plus").addClass("fa-times");
		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
	      autoclose: true,
	      language:'es'
	    })

	});
	$(document).on("click", ".btn-delete-beneficiario", function(){
		$(this).closest("tr").remove();
	});

	$(document).on("click", ".btn-add-familiar", function(){
		$(this).removeClass("btn-success btn-add-familiar").addClass("btn-danger btn-delete-familiar");
		$(this).children("span").removeClass("fa-plus").addClass("fa-times");
		html = '<tr>'+
                    '<td>'+
                        '<input type="text" class="form-control" name="familiares[]">'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" name="parentesco[]">'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success btn-add-familiar"><span class="fa fa-plus"></span></button>'+
                    '</td>'+
                '</tr>';
        $("#tb-familiares tbody").append(html);
	});
	$(document).on("click", ".btn-delete-familiar", function(){
		$(this).closest("tr").remove();
	});

	$("#departamento").on("change", function(){
		$("#municipio").find('option').not(':first').remove();
		iddep = $(this).val();
		$.ajax({
			url: base_url + "backend/asociados/getMunicipios",
			type: "POST",
			data: {id:iddep},
			dataType:"json",
			success: function(resp){
				html = "";
				$.each(resp, function(key, value){
					html += "<option value='"+value.id_municipio+"'>"+value.municipio+"</option>";
				});
				$("#municipio").append(html);
			}
		});
	});
	$("#dep_nacimiento").on("change", function(){
		$("#mun_nacimiento").find('option').not(':first').remove();
		iddep = $(this).val();
		$.ajax({
			url: base_url + "backend/asociados/getMunicipios",
			type: "POST",
			data: {id:iddep},
			dataType:"json",
			success: function(resp){
				html = "";
				$.each(resp, function(key, value){
					html += "<option value='"+value.id_municipio+"'>"+value.municipio+"</option>";
				});
				$("#mun_nacimiento").append(html);
			}
		});
	});
	$("#dep_raices").on("change", function(){
		$("#ciudad_raices").find('option').not(':first').remove();
		iddep = $(this).val();
		$.ajax({
			url: base_url + "backend/asociados/getMunicipios",
			type: "POST",
			data: {id:iddep},
			dataType:"json",
			success: function(resp){
				html = "";
				$.each(resp, function(key, value){
					html += "<option value='"+value.id_municipio+"'>"+value.municipio+"</option>";
				});
				$("#ciudad_raices").append(html);
			}
		});
	});

	$(document).on("click", ".btn-edit-file", function(){
		archivo = $(this).val();
		nombre = $(this).closest("tr").children("td:eq(1)").find("a").text();
		descripcion = $(this).closest("tr").find("td:eq(2)").text();
		$("#archivo").val(archivo);
		$("#nombre").val(nombre);
		$("#descripcion").val(descripcion);
	});
	$(".btn-compartir").on("click", function(){
		id = $(this).val();
		$("#idArchivo").val(id);
		$.ajax({
			url: base_url + "filemanager/archivos/getUsersShared",
			type: "POST",
			data: {id: id},
			dataType: "json",
			success: function(resp){
				html = "";
				if (resp.length > 0 ) {
					$.each(resp,function(key, value){
						html += "<tr>";
						html += "<td>"+value.nombres+"</td>";
						html += "<td>"+value.fecha_shared+"</td>";
						html += "</tr>";
					});
				}else{
					html +="<tr><td colspan='2' class='text-center'>Aun no se ha compartido el archivo</td></tr>"; 
				}
				

				$("#tbUsers tbody").html(html);
			}
		});
	});

	$(document).on("click", ".btn-info-file", function(e){
		e.preventDefault();
		id = $(this).attr("id");
		$.ajax({
			url: base_url + "filemanager/archivos/view",
			type: "POST",
			data:{id: id},
			success: function(resp){
				$("#modal-info .modal-body").html(resp);
			}
		});
	});
	$(document).on("keyup",".dataTables_filter input",function() {
	    var value = $(this).val();
	    $("#search").val(value);
	});

	$(document).on("submit","#upload-data",function(e){
		e.preventDefault();

		swal({
		    title: "¿Estas seguro de importar los datos del archivo selecionado?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	var formData = new FormData($("#upload-data")[0]);

				$.ajax({
					url: base_url + "administrador/usuarios/importar",
					type:"POST",
					data: formData,
					cache:false,
					contentType:false,
					processData:false,
					//dataType:"json",
					success:function(resp){
						if (Number(resp) == 1) {
							swal({
							     title: "Bien Hecho!",
							     text: "La importación de los datos fue exitosa",
							     type: "success",
							     timer: 3000
							     },
							     function () {
							            location.reload(true);
							            tr.hide();
							    });
							/*swal("Registro Exitoso!", "Su imagen de Perfil fue actualizada", "success");
							window.location.href = base_url + "usuario/perfil";*/
						}else{
							//alert(resp.error);
							swal("Error!","No se pudo importar los datos", "error");
						}
					}
				});
		    } 
		 });

		
	});
	

	$(document).on("click", ".btn-view",function(){
		id = $(this).val();
		modulo = $("#modulo").val();
		$.ajax({
			url: base_url + "equipos/"+modulo+"/view",
			type: "POST",
			data: {id:id},
			success: function(resp){
				$("#modal-default .modal-body").html(resp);
			}
		});
	});
	$(document).on("click", ".btn-view-conf",function(){
		id = $(this).val();
		modulo = $("#modulo").val();
		$.ajax({
			url: base_url + "configuraciones/"+modulo+"/view",
			type: "POST",
			data: {id:id},
			success: function(resp){
				$("#modal-default .modal-body").html(resp);
			}
		});
	});

	$(document).on("click", ".btn-delete", function(e){
		e.preventDefault();
		ruta = $(this).attr("href");
		swal({
		    title: "¿Estas seguro de eliminar el registro?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	$.ajax({
					url: ruta,
					type: "POST",
					success: function(resp){
						//window.location.href = base_url + resp;
						location.reload(true);
					}
				});
		    } 
		 });
		
	});
	
	$('.btn-group button , .btn-group a').tooltip(); 



	$(document).on("click", ".btn-mante", function(){
		idequipo = $(this).val();

		$("#idequipo").val(idequipo);
		modulo = $("#modulo").val();

		$.ajax({
			url: base_url + "equipos/"+modulo+"/getMantenimientos",
			type: "POST",
			data:{idequipo:idequipo},
			dataType: "json",
			success:function(resp){
				html = "";
				$.each(resp, function( index, value ) {
					html += "<tr>";
					html += "<td>"+value.id+"</td>";
					html += "<td>"+value.fecha+"</td>";
					html += "<td>"+value.tecnico+"</td>";
					html += "<td>"+value.descripcion+"</td>"
					html += "</tr>";
				});

				$("#tbmantenimientos tbody").html(html);
			}
		});


	}); 

	$("#tb-without-buttons").DataTable({
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
	}); 

	$("#tb-with-buttons").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [':visible :not(:last-child)']
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [':visible :not(:last-child)']
	                }
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 18, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
	}); 

	$("#tbcomputadora").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	                
	            }
            ],
            "columnDefs": [
	            {
	                "targets": [ 2 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 3 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 4 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 5 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 12 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 14 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 15 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 16 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 17 ],
	                "visible": false,
	                "searchable": false
	            },
	           	{
	                "targets": [ 18 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 20 ],
	                "visible": false,
	                "searchable": false
	            },

	        ],
	});

	$("#tbmonitor").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	                
	            }
            ],
            "columnDefs": [
	            {
	                "targets": [ 3 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 6 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 7 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 8 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 9 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 11 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            

	        ],
	});

	$("#tbimpresora").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	                
	            }
            ],
            "columnDefs": [
	            {
	                "targets": [ 2 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 5 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 6 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 7 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 8 ],
	                "visible": false,
	                "searchable": false
	            },

	        ],
	});

	$(document).ready(function () {
		/*var url_complete = base_url + "filemanager/archivos/getArchivos";
		if (uri_segment != '') {
			url_complete = base_url + "filemanager/archivos/getArchivos/"+uri_segment;
		}*/
        $('#tbarchivos').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url + "filemanager/archivos/getArchivos/"+uri_segment,
                "dataType": "json",
                "type": "POST",
                "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
            },
            "columns": [
                { "data": "id" },
                { "data": "finca" },
                { "data": "nombre",
			        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
			        	if (oData.tipo == 1) {
			        		html = '<a data-target="#modal-info" data-toggle="modal" class="btn-info-file" id="'+oData.id+'" href="#modal-default">'+oData.nombre+'</a>';
			        	}else{
			        		html = '<a href="'+base_url+'myfiles/'+oData.codigo+'">'+oData.nombre+'</a>';
			        	}
			            $(nTd).html(html);
			        }
			    },
                { "data": "descripcion" },
                { "data": "fecha_subida" },
                {
                    mRender: function (data, type, row) {
                    	console.log(row);
                    	var btnCompartir = '<button type="button" class="btn btn-primary btn-flat btn-compartir" data-toggle="modal" data-target="#modal-compartir" value="'+row.id+'">'+
                                                '<i class="fa fa-user-plus" aria-hidden="true"></i>'+
                                            '</button>';
                    	var btnEditar = '<button type="button" class="btn btn-warning btn-flat btn-edit-file" data-toggle="modal" data-target="#modal-editar" title="Editar" value="'+row.id+'"><span class="fa fa-pencil"></span></button>';
                    	var btnEliminar ='';
                    	if (rol == 1) {
                    		var btnEliminar = '<a href="'+base_url+'filemanager/archivos/delete/'+row.id+'" class="btn btn-danger btn-flat btn-delete" title="Eliminar">'+
                                                    '<span class="fa fa-times"></span>'+
                                                '</a>';

                    	}
                        return btnCompartir+' '+btnEditar+' '+btnEliminar;
                    }
                } 
            ],
            "language": tradutorDataTables()  

        });
    });

    $(document).ready(function () {
		/*var url_complete = base_url + "filemanager/archivos/getArchivos";
		if (uri_segment != '') {
			url_complete = base_url + "filemanager/archivos/getArchivos/"+uri_segment;
		}*/
        $('#tbasociados').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url + "backend/asociados/getAsociados",
                "dataType": "json",
                "type": "POST",
                "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
            },
            "columns": [
                { "data": "num_identificacion" },
                { "data": "primer_apellido" },
                { "data": "segundo_apellido" },
                { "data": "nombres" },
                { "data": "tipo_vinculacion" },
                { "data": "datetime" },
                { "data": "text_estado" },
                {
                    mRender: function (data, type, row) {
                    	console.log(row);
                    	var btnView = "<a href='#' data-href='"+row.id+"'  class='btn btn-primary btn-sm btn-view-asociado' data-toggle='tooltip' title='Ver'>";
                            btnView +='<span class="fa fa-eye"></span>';
                            btnView +='</a>';
                    	var btnEditar = '';
                    	var btnAprobar ='';
                    	var btnDesaprobar ='';
                    	
                    		btnEditar = '<a href="'+base_url + 'backend/asociados/edit/'+row.id+'" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar">'+
                                            '<span class="fa fa-pencil"></span>'+
                                        '</a>';
                        if (rol == 1) {
                        	if (row.estado == 0) {
                        		btnAprobar = '<button type="button" class="btn btn-success btn-flat btn-sm btnAprobarSolicitud" value="'+row.id+'" data-toggle="tooltip" title="Aprobar">'+
                                            '<span class="fa fa-check"></span>'+ 
                                         '</button>';
                                btnDesaprobar = '<button type="button" class="btn btn-danger btn-flat btn-sm btnDesaprobarSolicitud" value="'+row.id+'" data-toggle="tooltip" title="No Aprobar">'+
                                                '<span class="fa fa-times"></span>'+ 
                                            '</button>';
                            } else if(row.estado == 1) {
                            	btnDesaprobar = '<button type="button" class="btn btn-danger btn-flat btn-sm btnDesaprobarSolicitud" value="'+row.id+'" data-toggle="tooltip" title="No Aprobar">'+
                                                '<span class="fa fa-times"></span>'+ 
                                            '</button>';
                            } else{
                            	btnAprobar = '<button type="button" class="btn btn-success btn-flat btn-sm btnAprobarSolicitud" value="'+row.id+'" data-toggle="tooltip" title="Aprobar">'+
                                            '<span class="fa fa-check"></span>'+ 
                                         '</button>';
                            }
                        	
                        }
                            

                    	
                        return btnView+' '+btnEditar+' '+btnAprobar+' '+btnDesaprobar;
                    }
                } 
            ],
            "language": tradutorDataTables()  

        });
    });

    $(document).ready(function () {
		/*var url_complete = base_url + "filemanager/archivos/getArchivos";
		if (uri_segment != '') {
			url_complete = base_url + "filemanager/archivos/getArchivos/"+uri_segment;
		}*/
        $('#tbusuario').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": base_url + "administrador/usuarios/getUsuarios",
                "dataType": "json",
                "type": "POST",
                "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
            },
            "columns": [
                { "data": "id" },
                { "data": "cedula" },
                { "data": "nombres" },
                { "data": "email" },
                { "data": "rol" },
                { "data": "estado" },
                {
                    mRender: function (data, type, row) {
                        var btnFinca = '<button type="button" class="btn btn-primary btn-sm btn-add-finca" data-toggle="modal" data-target="#modal-fincas" value="'+row.id+'">';
                        btnFinca += '<span class="fa fa-eye"></span>';
                        btnFinca += '</button>';
                        return btnFinca;
                    }
                },
                {
                    mRender: function (data, type, row) {
                    	var btnEditar = '<a href="'+base_url+'administrador/usuarios/edit/'+row.id+'" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i></a>';
                        var btnEliminar = '<button type="button" class="btn btn-danger btn-sm bn-flat btn-deshabilitar" value="'+row.id+'">';
                        btnEliminar += '<i class="fa fa-times"></i>';
                        btnEliminar += '</button>';
                        return '<div class="btn-group">' + btnEditar +' '+ btnEliminar+ "</div>";
                    }
                } 
            ],
            "language": tradutorDataTables()  

        });
    });

    function tradutorDataTables(){
        return {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            };
    }
	

	$(document).on("click", "#btn-agregar-mantenimiento", function(){
		$("#form-mantenimiento")[0].reset();
		$("#idMantenimiento").val(null);
	});
	$(document).on("click", ".btn-edit-mantenimiento", function(){
		id = $(this).val();
		$("#idMantenimiento").val(id);
		$.ajax({
			url: base_url + "mantenimientos/vehiculos/getMantenimiento",
			type: "POST",
			data: {id: id},
			dataType:"json",
			success:function(resp){
				$("#numfac").val(resp.numfac);
				$("#costo").val(resp.costo);
				$("#descripcion").val(resp.descripcion);
				$("#proveedor").val(resp.proveedor);
				$("#fecha").val(resp.fecha_vencimiento);
				$("#tipomantenimiento").val(resp.tipomantenimiento_id);
				$("#cantidad").val(resp.cantidad);
			}
		});
	});
	$(document).on("click", ".btn-subir", function(){
		valorbtn = $(this).val(); 
		info = valorbtn.split("*");
		$("#idUsuario").val(info[0]);
		if (info[1] !="") {
			html = "<img src='"+base_url+"assets/images/firmas/"+info[1]+"' class='imagen-firma img-responsive'>";
			$(".imagen").html(html);
			$(".label-imagen").text("Actualizar Firma:");
		} else{
			$(".imagen").html("");
			$(".label-imagen").text("Subir Firma:");
		}

	});

	$(document).on("submit","#form-change-firma",function(e){
		e.preventDefault();

		var formData = new FormData($("#form-change-firma")[0]);

		$.ajax({
			url: base_url + "administrador/usuarios/changeFirma",
			type:"POST",
			data: formData,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			success:function(resp){
				if (resp.status == 1) {
					swal({
					     title: "Hecho!",
					     text: "Su imagen de Firma fue actualizada",
					     type: "success",
					     timer: 3000
					     },
					     function () {
					            location.reload(true);
					            tr.hide();
					    });
					/*swal("Registro Exitoso!", "Su imagen de Perfil fue actualizada", "success");
					window.location.href = base_url + "usuario/perfil";*/
				}else{
					//alert(resp.error);
					swal("Error!", resp.error.replace(/(<([^>]+)>)/ig,""), "error");
				}
			}
		});
	});
	$("#form-change-hoja").submit(function(e){
		e.preventDefault();
		var formData = new FormData($("#form-change-hoja")[0]);

		$.ajax({
			url: base_url + "administrador/usuarios/changeHoja",
			type:"POST",
			data: formData,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			success:function(resp){
				if (resp.status == 1) {
					swal({
					     title: "Bien Hecho!",
					     text: "Su hoja de vida fue actualizada",
					     type: "success",
					     timer: 3000
					     },
					     function () {
					            location.reload(true);
					            tr.hide();
					    });
				}else{
					swal("Error!", resp.error.replace(/(<([^>]+)>)/ig,""), "error");
				}
			}
		});
	});
	$("#form-change-image").submit(function(e){
		e.preventDefault();

		var formData = new FormData($("#form-change-image")[0]);

		$.ajax({
			url: base_url + "administrador/usuarios/changeImagen",
			type:"POST",
			data: formData,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			success:function(resp){
				if (resp.status == 1) {
					swal({
					     title: "Bien Hecho!",
					     text: "Su imagen de Perfil fue actualizada",
					     type: "success",
					     timer: 3000
					     },
					     function () {
					            location.reload(true);
					            tr.hide();
					    });
					/*swal("Registro Exitoso!", "Su imagen de Perfil fue actualizada", "success");
					window.location.href = base_url + "usuario/perfil";*/
				}else{
					//alert(resp.error);
					swal("Error!", resp.error.replace(/(<([^>]+)>)/ig,""), "error");
				}
			}
		});
	});



	$(document).on("click",".btn-print",function(){

        $(".modal-body").print({
            globalStyles: true,
            mediaPrint: false,
            stylesheet: null,
            noPrintSelector: ".no-print",
            append: null,
            prepend: null,
            manuallyCopyFormValues: true,
            deferred: $.Deferred(),
            timeout: 750,
            title: "  ",
            doctype: '<!doctype html>'
        });
    });

    $(document).on("click",".btn-print-asociado",function(){

        $("#print").print({
        	 globalStyles: true,
            mediaPrint: false,
            stylesheet: null,
            noPrintSelector: ".no-print",
            append: null,
            prepend: null,
            manuallyCopyFormValues: true,
            deferred: $.Deferred(),
            timeout: 750,
            title: "  ",
            doctype: '<!doctype html>'
        });
    });

	$(".btn-view-proveedor").on("click", function(){
		id = $(this).val();
		$.ajax({
				url: base_url + "ingresos/proveedores/view",
				type:"POST",
				data: {id: id},
				success:function(resp){
					$("#modal-default .modal-body").html(resp);
				}
			});
	});



	$(".btn-habilitar").on("click", function(){
		id = $(this).val();
		swal({
		    title: "¿Estas de habilitar al usuario seleccionado?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	ActualizarUsuario(id, 1);
		    } 
		 });
		

		//ActualizarUsuario(id, 1);
	});
	$(".btn-deshabilitar").on("click", function(){
		id = $(this).val();

		swal({
		    title: "¿Estas de deshabilitar al usuario seleccionado?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	ActualizarUsuario(id, 0);
		    } 
		 });
		
	});
	$(document).ready(function() {
        $('#tbproveedor').DataTable({
            dom: 'lBfrtip',
            language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de Proveedores",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5,6,7 ]
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de Proveedores",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5 ,6,7]
	                }
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 18, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
        });
    } );

   
    $(document).ready(function() {
        $('#tbmantenimiento').DataTable({
            dom: 'lBfrtip',
            language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de Mantenimientos",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5,6,7,8,9 ]
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de Mantenimientos",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5 ,6,7,8,9]
	                },
	                orientation: 'landscape',
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 10, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
        });
    } );

    /*$(document).ready(function() {
        $('#tbusuario').DataTable({
            dom: 'lBfrtip',
            language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de Usuarios",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4]
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de Usuarios",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4]
	                }
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 18, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
        });
    } );*/

});

function ActualizarUsuario(idusuario, estado){
	$.ajax({
		url: base_url + "administrador/usuarios/actEstado",
		type: "POST",
		data: {id:idusuario,estado:estado},
		success:function(resp){
			window.location.href = base_url + resp;
		}
	});
}