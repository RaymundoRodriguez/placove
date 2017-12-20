<?php
require_once '../../sesion/model/clsSesion.php';
if (Sesion::verificarSesion()) {
    $valores = Sesion::obtenerSesion();
    $bname = Sesion::bitacoraNavegador();
}
$_SESSION['id'] = $valores[0]['id_usuario'];
$_SESSION['username'] = $valores[0]['usuario'];
?>

<!DOCTYPE html>
<html>
    <!--https://developers.google.com/speed/libraries/devguide?hl=es-ES&csw=1#jquery-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Seguimiento Levantamientos </title>


        <link rel="shortcut icon" href="../../favicon(2).ico"  type="image/x-icon">
        <link rel="icon" href="../../favicon(2).ico"  type="image/x-icon">
        <!-- temas de JQueryUI -->
        <link type="text/css" href="../view/css/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" />


        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">



        <!--<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css" />-->


        <link type="text/css" href="../view/js/plugins/FooTable-2/css/footable.metro.css" rel="stylesheet">        
        <!--<link type="text/css" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">-->
        <link type="text/css" href="../view/js/plugins/FooTable-2/css/footable.core.css" rel="stylesheet">

        <link type="text/css"rel="stylesheet" href="../../Conductor/view/css/estiloInput.css" />
        <link type="text/css"rel="stylesheet" href="../../interfaz/view/css/estilos.css" media="all" />
        <link rel='stylesheet' type='text/css' href='../../interfaz/view/js/plugins/jquery.qtip.custom/jquery.qtip.css' />
        <!--        <link rel='stylesheet' type='text/css' href='../view/js/plugins/fullcalendar/fullcalendar.css' />-->
        <link rel="stylesheet" type="text/css" media="screen" href="../view/js/plugins/organizationChart/orgchart.css" />
        <link type="text/css" href="../view/js/plugins/paginate/style-paginate.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="js/plugins/rte/jquery.rte.css" />
        <link type="text/css" href="../view/js/plugins/treeview/jquery.treeview.css" rel="stylesheet" />
        <link type="text/css" href="../view/js/plugins/ui.panel/ui.panel.css" rel="stylesheet" />
        <link type="text/css" href="../view/css/init.css" rel="stylesheet" />
        <link href="css/layout.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="../../interfaz/view/css/color.css" rel="stylesheet">    
        <link type="text/css" href="../../interfaz/view/css/jquery.dataTables.css" rel="stylesheet"> 

        <!--<script type="text/javascript" src="../view/js/jquery-1.6.2.min.js"></script>-->
        <!--<script type="text/javascript" src="../view/js/jquery-ui-1.8.16.custom.min.js"></script>-->

<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>-->
<!--<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->

        <script src="../../interfaz/view/js/plugins/jquery/jquery-1.9.1.min.js"></script>

        <script src="../../interfaz/view/js/plugins/jquery/jquery-ui.min-1.10.2.js"></script>

        <script src="../../interfaz/view/js/plugins/jquery/jquery-ui-1.10.2.custom.min.js"></script>
        <!-- plugin para ordenar las tablas -->
        <script type="text/javascript" src="../../interfaz/view/js/sortable.min.js"></script>
        <!--<link rel="stylesheet" href="../../Reportes/view/sortable-theme-dark.css" />-->
        <script type="text/javascript" src="../view/js/init.js"></script>

 <!--<script type="text/javascript" src="../view/js/ui/jquery.ui.widget.js"></script>-->
 <!--<script type="text/javascript" src="../view/js/ui/jquery.ui.position.js"></script>-->
 <!--<script type="text/javascript" src="js/ui/jquery.ui.tabs.js"></script>-->

        <!-- Plugins -->
        <script type="text/javascript" src="../view/js/plugins/ui.panel/ui.panel.min.js"></script>
        <!--<script type="text/javascript" src="../view/js/plugins/ui.panel/jquery.cookie.js"></script>-->
        <script type="text/javascript" src="../view/js/plugins/treeview/jquery.treeview.js"></script>        
        <script type="text/javascript" src="js/plugins/rte/jquery.rte.js"></script>
        <script type="text/javascript" src="js/plugins/rte/jquery.rte.tb.js"></script>
        <script type="text/javascript" src="../view/js/plugins/paginate/jquery.paginate.js"></script>
        <script src="../view/js/plugins/organizationChart/textchildren.js" type="text/javascript"></script>
        <script src="../view/js/plugins/organizationChart/orgchart.js" type="text/javascript"></script>
        <!--<script type='text/javascript' src='../view/js/plugins/fullcalendar/fullcalendar.min.js'></script>-->
        <!-- tablas -->
        <script type="text/javascript" src="../view/js/plugins/FooTable-2/js/footable.js"></script>
        <script type="text/javascript" src="../view/js/plugins/FooTable-2/js/footable.paginate.js"></script>
        <script src="js/plugins/highcharts/highcharts.js"></script>
        <script src="js/plugins/highcharts/exporting.js"></script>
        <script type="text/javascript" src="../view/js/plugins/jquery.ui.autocomplete.js"></script>
        <script type="text/javascript" src="../view/js/plugins/blockUI/blockUI.js"></script>
        <!-- inicio qtip -->

        <script src="../../interfaz/view/js/plugins/jquery.qtip.custom/jquery.qtip.js"></script> 

        <!--Fin qtip -->
        <script type="text/javascript" src="../view/js/plugins/Highcharts2/grafTheme.js"></script>

        <!--Inicio Conductores-->  

        <script type="text/javascript" src="../../Conductor/view/js/funcionesConductor.js"></script>
        <script type="text/javascript" src="../../Reportes/view/js/funcionesReporteIndividual.js"></script>
        <!--Fin conductores--> 
        <script type="text/javascript" src="../../Proyecto/view/js/FuncionesProyectoEstatus.js"></script>
        <script type="text/javascript" src="../../Proyecto/view/js/funcionesArmarProyecto.js"></script>




        <!--Inicio Vehiculos--> 
        <!--cargarArchivos-->
        <script type="text/javascript" src="../../Vehiculo/view/js/CargarImagenVehiculo.js"></script>

        <script type="text/javascript" src="../../Vehiculo/view/js/functionesVehiculo.js"></script>
        <!--Fin Vehiculos--> 
        <!--Mostrar reporte proyecto -->
        <script type="text/javascript" src="../../Reportes/view/js/ReporteProyecto.js"></script>
        <script type="text/javascript" src="../../Reportes/view/js/funcionesbitacorapordia.js"></script>

        <!--Inicio bitacoras-->  

        <script type="text/javascript" src="../../Bitacora/view/js/funcionesBitacora.js"></script>

        <script type="text/javascript" src="../../Bitacora/view/js/funcionesActividades.js"></script>

        <script type="text/javascript" src="../../Bitacora/view/js/funcionesElimnarBitacora.js"></script>
        <!--Fin bitacoras--> 
        <!-- Funcion modificar Conductores a Proyecto-->
        <script type="text/javascript" src="../../Proyecto/view/js/FuncionesModificarConductoresProyecto.js"></script>
        <!-- funcion subir archivos del conductor-->
        <script type="text/javascript" src="../../Conductor/view/js/funcionescargarArchivosConductor.js"></script>


        <!-- Drag and drop-->
        <link href='../../interfaz/view/js/plugins/fullcalendar/fullcalendar.css' rel='stylesheet' />
        <link href='../../interfaz/view/js/plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />

        <script src='../../interfaz/view/js/plugins/fullcalendar/fullcalendar.min.js'></script>
        <script src="../../DragDrop/view/js/funcionescalendario.js" type='text/javascript'></script>
        <!-- JQgrid-->

        <!--Inicio Telefonos-->  

        <script type="text/javascript" src="../../Telefono/view/js/functionesTelefono.js"></script>
        <script type="text/javascript" src="../../Telefono/view/js/funcionescargarArchivosTelefono.js"></script>
        <!--Fin Telefonos--> 


        <!--Inicio Proyectos-->  

        <script type="text/javascript" src="../../Proyecto/view/js/functionesProyecto.js"></script>
        <script type="text/javascript" src="../../Proyecto/view/js/funcionesSuplente.js"></script>
        <script type="text/javascript" src="../../Reportes//view/js/ReporteCentauro.js"></script>


        <!--Fin Proeyctos--> 
        
        <!--Inicio Bitafcora-->  

        <script type="text/javascript" src="../../Bitacora/view/js/funcionesBitacora.js"></script>
        <script type="text/javascript" src="../../Bitacora/view/js/funcionesAddModBitacora.js"></script>
        <!--Fin Bitacora--> 
        <!-- JQgrid-->


        <link href="js/plugins/jQgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css">
        <script src="js/plugins/jQgrid/js/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="js/plugins/jQgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script> 

        <!-- Fin JQgrid-->

        <!-- Plugin sencillo para subir archivos  -->

        <link rel="stylesheet" type="text/css" href="js/plugins/valumFileUploader/fileuploader.css"> 
        <script type="text/javascript" src="js/plugins/valumFileUploader/fileuploader.js" ></script>
        <script type="text/javascript" src="../../Bitacora/view/js/funcionesCargarArchivos.js" ></script>
        <script type="text/javascript" src="js/jquery.form.js" ></script>


        <!-- Funciones de los modulos -->

        <script type="text/javascript" src="../../sesion/view/js/bitacora.js"></script>
        <script type="text/javascript" src="../../administracion/view/js/inicialAdmin.js"></script>


        <!-- Inicio Salir  -->
        <script type="text/javascript" src="js/salir.js"></script> 
        <!-- Fin Salir -->

        <!-- Inicio Validacion  -->

        <script type="text/javascript" src="../../utils/validar.js"></script> 

        <!-- Fin Validacion -->


        <script type="text/javascript">
            //    $.post('../../bitacora/controller/controllerNavegador.php?navegador=<?php echo $bname ?>'+'&id='+<?php echo $valores[0]['id_usuario'] ?>,{},function(data){});
        </script>

    </head>
    <body >
        <div class="box">
            <div id="desktopHeader">
                <div id="desktopTitlebarWrapper">
                    <div id="desktopTitlebar">
                        <h1 class="applicationTitle">prueba</h1>
                        <h2 class="tagline">
                            Bienvenido <b><?php echo $valores[0]['nombre'] ?> </b>
                        </h2>
<!--                        <div id="here" ><img src="images/Here.png"/></div>-->
                        <div id="topNav">

                            <b><label id="lbl_salir" class="ui-panel-title-text" onclick="return false;">Salir</label></b>
                        </div>

                    </div>
                </div>

                <input type="hidden" value="<?php echo $valores[0]['id_usuario'] ?>" id="txtid_usuario"/>


                <div id="container" style="position: static;"> 
                    <div id="lLeft">
                        <div id="panelLeft_1" class="navPanel">
                            <h3>ARBOL</h3>
                            <div id="panelLeft_1_1">
                                <ul id="browser" class="filetree">
                                    <li><span class="folder"> Seguimiento</span>
                                        <ul id="aa">

                                            <li  class="closed"><span class="folder" >Conductores</span>
                                                <ul id="aa">    
                                                    <li class="seleccionado" id="agregarcond"> <img src="/interfaz/view/images/Iconos_jqgrid/agregar2.png" id="d">
                                                        <a  id="id_arb_agregar_conductor">Agregar</a></li>
                                                    <li  class="closed"> <span class="folder" >Mostrar</span>
                                                        <ul id="aa">
                                                            <li class="seleccionado" id="activoc"> <span class="file" id="d"><a href="#" id="id_arb_conduc_activos">Activos</a></span></li>
                                                            <li class="seleccionado" id="noactivoc"> <span class="file" id="d"><a href="#" id="id_arb_conduc_noactivos">No Activos</a></span></li>
                                                            <li class="seleccionado" id="todosc"> <span class="file" id="d"><a href="#" id="id_arb_conduc_todos">Todos</a></span></li>
                                                            <li class="seleccionado" id="bajac"> <span class="file" id="d"><a href="#" id="id_arb_conduc_baja">Baja</a></span></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li  class="closed"><span class="folder">Veh&iacute;culos</span>
                                                <ul id="aa">    
                                                    <li class="seleccionado" id="agregarvehi"> <img src="/interfaz/view/images/Iconos_jqgrid/vw-beetle-iconAdd.png" width="20" height="20" id="d"><a href="#" id="id_agregar_vehiculo">Agregar</a></li>

                                                    <li  class="closed"> <span class="folder" >Mostrar</span>
                                                        <ul id="aa">
                                                            <li class="seleccionado" id="activov"> <span class="file" id="d"><a href="#" id="id_arb_vehiculos_activos">Activos</a></span></li>
                                                            <li class="seleccionado" id="noactivov"> <span class="file" id="d"><a href="#" id="id_arb_vehiculos_noactivos">No Activos</a></span></li>
                                                            <li class="seleccionado" id="todosv"> <span class="file" id="d"><a href="#" id="id_arb_vehiculos_todos">Todos</a></span></li>
                                                            <li class="seleccionado" id="bajav"> <span class="file" id="d"><a href="#" id="id_arb_vehiculos_baja">Baja</a></span></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li  class="closed"><span class="folder">Tel&eacute;fonos</span>
                                                <ul id="aa">    
                                                    <li class="seleccionado" id="agregartel"> <img src="/interfaz/view/images/Iconos_jqgrid/telefono.jpg" width="20" height="20" id="d">
                                                        <a id="id_arb_agregar_telefono">Agregar</a></li>
                                                    <li  class="closed"> <span class="folder" >Mostrar</span>
                                                        <ul id="aa">
                                                            <li class="seleccionado" id="activot"> <span class="file" id="d"><a href="#" id="id_arb_tel_activos">Activos</a></span></li>
                                                            <li class="seleccionado" id="noactivot"> <span class="file" id="d"><a href="#" id="id_arb_tel_noactivos">No Activos</a></span></li>
                                                            <li class="seleccionado" id="todost"> <span class="file" id="d"><a href="#" id="id_arb_tel_todos">Todos</a></span></li>
                                                            <li class="seleccionado" id="bajat"> <span class="file" id="d"><a href="#" id="id_arb_tel_baja">Baja</a></span></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li  class="closed"><span class="folder">Proyectos</span>
                                                <ul id="aa">    
                                                    <li class="seleccionado" id="agregarproy">  <img src="/interfaz/view/images/Iconos_jqgrid/Agregarproyecto.png" id="d"><a href="#" id="id_agregar_Proyecto">Agregar</a></li>

                                                    <li  class="closed"> <span class="folder" >Mostrar</span>
                                                        <ul id="aa">
                                                            <li class="seleccionado" id="activop"> <span class="file" id="d"><a href="#" id="id_arb_proyectos_activos">Activos</a></span></li>
                                                            <li class="seleccionado" id="noactivop"> <span class="file" id="d"><a href="#" id="id_arb_proyectos_concluidos">Concluidos</a></span></li>
                                                            <li class="seleccionado" id="todosp"> <span class="file" id="d"><a href="#" id="id_arb_proyectos_todos">Todos</a></span></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li  class="closed"><span class="folder">Reportes</span>
                                                <ul id="aa">    
                                                    <li class="seleccionado" id="reportes"> <span class="file" id="d"> <a href="#" id="id_agregar_Proyecto">Proyectos</a></span></li>                                                
                                                    <li class="seleccionado" id="reporteCentauro"> <span class="file" id="d"> <a href="#" id="id_reporte_Centauro">Centauro</a></span></li>                                                
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>


                                </ul>
                            </div>

                            <div id="panelLeft_2" class="navPanel">
                                <h3><input class="ui-panel-title-text" type="text" value="Bitacoras" id="titulo_pagina_3" readonly = "readonly" /></h3>


                                <div id="panelLeft_2_1" class="clase" >                                 

                                </div>


                            </div>
                        </div>



                    </div>

                    <!--                    <div id="lRight">
                                            <div id="panellRight_1" class="navPanel" >
                                                <h3><label id="nombreBitacora">Bitacora</label></h3>
                                                <h3 id="nombreBitacora">Bitacora</h3>
                    
                                                <div id="panellRight_1_1">
                                                </div>
                    
                                            </div>
                                        </div>-->
                    <div id="lCenter" style="position: static;">
                        <!--<div id="desktop">-->
                        <div id="panelCenter_1" class="centralPanel">
                            <h3><input class="ui-panel-title-text" type="text" value="PANEL PRINCIPAL" id="titulo_pagina_1" readonly = "readonly" /></h3>

                            <div id="panelCenter_1_1">

                            </div>

                        </div>
                        <div id="panelCenter_2" class="centralPanel">
                            <h3><input class="ui-panel-title-text" style="float: left;" type="text" value="" id="titulo_pagina_2" readonly = "readonly" /></h3>
                            <div id="panelCenter_2_1" >
                            </div>
                            <div id="panelCenter_2_2" class="ui-helper-reset ui-widget-content ui-panel-content ui-corner-bottom">

                            </div>
                        </div> 
                        <!-- div oculto para consultar errores -->

                        <div id="divTextErrores" style="visibility:hidden; display: none" ></div>
                        <div id="ventanAlertas" style="visibility:hidden; display: none" ></div>

                        <!--</div>-->
                    </div>
                </div>
                </body>
                </html>
