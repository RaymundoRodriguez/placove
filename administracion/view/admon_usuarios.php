<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; ccharset=UTF-8" />
		<title>Administracion de Usuarios</title>             
                <script language="javascript" src="../../administracion/view/js/funciones.js"></script>
	</head>
<body>
<br/>
<div id="dialogEliminarUsu" title="Confirmacion Requerida" style="visibility:hidden; display: none">
    <p>¿Deseas eliminar el usuario?</p><span id="spEliminarUsu"></span>
</div>
<div id="dialogPermisoUsuario" title="Confirmacion Requerida" style="visibility:hidden; display: none">
    <p id="contenidoDialogUsuario"></p>
</div>

    <table id="tabla_usuarios" ></table>
    <div id="pager2" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable ui-resizable"></div>
    <div id="divtablausuarios" style="margin-left: 1%; margin-top: 1%">
    <input value="Alta de Usuario" id="btnNuevoUsu" name="mostrarAltaUsuario" class="ui-state-default ui-corner-bottom ui-corner-top" type="button" style="width:120px;" />                                     
 </div>
</body>
</html>