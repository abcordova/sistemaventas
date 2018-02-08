<?php

	require_once "../modelos/Categoria.php";

	$categoria = new Categoria();

	$idcategoria = isset($_POST["idcategoria"])?limpiarCadena($_POST["idcategoria"]):"";
	$nombre = isset($_POST["nombre"])?limpiarCadena($_POST["nombre"]):"";
	$descripcion = isset($_POST["descripcion"])?limpiarCadena($_POST["descripcion"]):"";

	switch ($_GET["op"]) 
	{
		case 'guardaryeditar':
			if (empty($idcategoria)) 
			{
				$respuesta = $categoria->insetarCategoria($nombre, $descripcion);
				echo $respuesta ? "Categoría registrada" : "No se pudo registrar la categoría";
			}
			else
			{
				$respuesta = $categoria->editarCategoria($idcategoria, $nombre, $descripcion);
				echo $respuesta ? "Categoría actualiza" : "No se pudo actualizar la categoría";
			}
			
			break;
		
		case 'desactivar':
				$respuesta = $categoria->desactivarCategoria($idcategoria);
				echo $respuesta ? "Categoría desactivada" : "No se pudo desactivar la categoría";
			
			break;
		case 'activar':
				$respuesta = $categoria->activarCategoria($idcategoria);
				echo $respuesta ? "Categoría activada" : "No se pudo activar la categoría";
			break;
		case 'mostrar':
				$respuesta = $categoria->mostrarCategoria($idcategoria);
				//Codificar el resultado utilizando json
				echo json_encode($respuesta);
			break;
		case 'listar':
				$respuesta = $categoria->listarCategoria();
				
				//Vamos a declarar un array 
				$data = array();

				while ($reg = $respuesta->fetch_object())
				{
					$data[] = array(
						"0" =>($reg->condicion)?'<button class="btn btn-primary btn-sm" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-danger btn-sm" onclick="desactivarCategoria('.$reg->idcategoria.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-primary btn-sm" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-edit"></i></button>'.' <button class="btn btn-success btn-sm" onclick="activarCategoria('.$reg->idcategoria.')"><i class="fa fa-check"></i></button>'
						, 
						"1" =>$reg->nombre,
						"2" =>$reg->descripcion,
						"3" =>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
					);	
				}
				$results = array(
					"strEcho" => 1, //Información para el datatables
					"iTotalRecords"=>count($data), //enciamos el total registros al datatable
					"iTotalDisplayRecords"=>count($data), //Enviamos el total de registros a visualizar
					"aaData"=>$data
				);
				echo json_encode($results);
			break;
		

		default:
			
			break;
	}
?>