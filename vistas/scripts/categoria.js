var tabla;

//Función que se ejecuta al inicio
function init()
{
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	})

}

//Funcion Limpiar
function limpiar() 
{
	$("#idcategoria").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
}


//Funcion para mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadosregistros").hide();
		$("#formularioregistros").show();
		$("btnGuardar").prop("disabled",false);
	}
	else
	{
		$("#listadosregistros").show();
		$("#formularioregistros").hide();
	}
}

//Funcion cancelarForm
function cancelarForm()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar() 
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true, //Activamos el procesamiento del datatables
		"aServerSide": true, // Paginación y filtrado realizados por el servidor
		dom: 'Bfrtip', //Definimos los elementos del control de tabla	
		buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdf'
		],

		"ajax":
				{
					url: '../ajax/categoria.php?op=listar',
					type: "get",
					dataType: "json",
					error: function(e){
						console.log(e.responseText);
					}
				},

		"bDestroy": true,
		"iDisplayLength": 5, // Paginación
		"order": [[ 1, "asc"]]  //Ordenar (columna,orden) 
	}).DataTable();
}

//Funcion para guardar o editar

function guardaryeditar(e) 
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData= new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/categoria.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (datos) 
		{
			bootbox.alert(datos);
			mostrarform(false);
			tabla.ajax.reload();
		}
	});
	limpiar();
}

//Función para mostrar o editat
function mostrar(idcategoria)
{
	$.post("../ajax/categoria.php?op=mostrar",{idcategoria : idcategoria},function (data,status) 
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#nombre").val(data.nombre);
		$("#descripcion").val(data.descripcion);
		$("#idcategoria").val(data.idcategoria);
	})
}

function desactivarCategoria(idcategoria)
{
	bootbox.confirm("¿Estas seguro de desactivar la categoría?", function (result) 
	{
		if (result) 
		{
			$.post("../ajax/categoria.php?op=desactivar", {idcategoria : idcategoria}, function(e)
			{
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activarCategoria(idcategoria)
{
	bootbox.confirm("¿Estas seguro de activar la categoría?", function (result) {
		if (result) 
		{
			$.post("../ajax/categoria.php?op=activar", {idcategoria : idcategoria}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();