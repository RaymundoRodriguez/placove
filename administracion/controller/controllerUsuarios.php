<?php
require '../model/modelAltaUsuario.php';
require'../../sesion/model/clsSesion.php';
 Sesion::verificarSesion();
 $arregloSesion = Sesion::obtenerSesion();
            foreach ($arregloSesion as $array) 
                {
                    $estado=$array['activo'];
                    $permiso= $array['jerarquia'];
                }
             if($permiso!=1||$estado=0)
                {
                        return false;
                }
                else
                    {
                        $page = $_GET['page']; // get the requested page 
                        $limit = $_GET['rows']; // get how many rows we want to have into the grid 
                        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort 
                        $sord = $_GET['sord']; // get the direction 
                        if(!$sidx) $sidx =1;
                        
                        
                        $objdatos  =  new datosUsuario();
                        $usuarios=$objdatos->traerUsuarioPjGrid();

                        $count=count($usuarios);
                        
                        if( $count >0 ) 
                            { 
                                $total_pages = ceil($count/$limit); 
                            } 
                            else 
                                { 
                                    $total_pages = 0;
                                }
                        if ($page > $total_pages) $page=$total_pages; 
                        $start = $limit*$page - $limit;
                        
                         //$total_pages=round(($record/10)+.5);
                         $responce->page = $page; 
                         $responce->total = $total_pages; 
                         $responce->records = $count; 
                         
                         $usuarios=$objdatos->UsuariojGrid($sidx,$sord,$start,$limit);
                         
                                foreach ($usuarios as $key => $value) {
                                        $responce->rows[$key]['id']=$key; 
                                        $responce->rows[$key]['cell']=array($value->id_usuario, $value->nombre, $value->ap_paterno, $value->ap_materno, $value->usuario, $value->correo,$value->activo, $value->tipo);
                                }
                        echo json_encode($responce);
                    }
?>
