/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function reporteIndividual(id_con_proyecto,id_delegacion){
    
    //    alert(id_con_proyecto);
    $.post("../../Reportes/controller/controllerSuplente.php",
            {id_con_proyecto:id_con_proyecto},
            function(data){
        if(data==1){
                                          
                    $(function() {
                        $( "#ventanAlertas" ).html("Este conductor no tiene Bitacoras");
                        $( "#ventanAlertas" ).attr('style', 'visible');
                        $( "#ventanAlertas" ).dialog({
                            modal: true,
                            title:'Conductor',
                            show:'explode',
                            hide: 'explode',
                            buttons: {
                                Aceptar: function() {
                                                            
                                    $( this ).dialog( "close" );
                                                                     
                                                        
                                }
                            }
                        });
                    });
    }else if(data!=1){
       $("#titulo_pagina_2").val("Reporte personal: ");
    
    
    $.ajax({
        
        url: "../../Reportes/view/viewPanelesReporte.php",
        success:function(data){
            $("#panelCenter_2_1").html(data);
          
        },
      
        beforeSend: function(){
//             $.blockUI({ message: '<img src=/SeguimientoTrue/trunk/interfaz/view/images/d.gif />' }); 
//         $.blockUI();
        },
        complete: function(){
           
            // carga la grafica de km
            $.ajax({
               
                url:"../../Reportes/controller/controllerGraficasPeronalesKm.php",
                data:{
                    id_con_proyecto:id_con_proyecto,
                    opcion:"completo"
                },
                success:function(data){
                   
                    $("#divGraficakm").html(data);
                   
                },
                complete: function(){
                     
                     
                  // carga la grafica de horas
//            $.ajax({
//               
//                url:"../../Reportes/controller/controllerGraficasPersonalesHr.php",
//                data:{
//                    id_con_proyecto:id_con_proyecto,
//                    opcion:"completo"
//                },
//                success:function(data){
//                   
//                    $("#divGraficasDatos").html(data);
//                   
//                },//sss
//                complete: function(){
                     
                     
                      // carga la grafica de horas
            $.ajax({
               
                url:"../../Reportes/controller/controllerGraficasPersonalesHr.php",
                data:{
                    id_con_proyecto:id_con_proyecto,
                    opcion:"completo"
                },
                success:function(data){
                   
                    $("#divGraficasDatos").html(data);
                   
                },
                complete: function(){
                     
                     
                        // carga la grafica de global
            $.ajax({
               
                url:"../../Reportes/controller/controllerDatosGraficar.php",
                data:{
                    id_con_proyecto:id_con_proyecto
                   
                },
                success:function(data){
                   
                   
            var valores= new Array();
            var num;
            //            alert(data);
        
            var a = new Array();
     
            a=eval(data);
     
            for(var i=0;i<a.length; i++){
         
                num=a[i].toString().split(",");
         
                valores[i]=num[1];


         
            }
   
            $(function () {
                $('#divAvance').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Grafica'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                        ['FDC Prep',  parseFloat(valores[1])],                    
                        ['FDC',   parseFloat( valores[2])],
                        ['DT equipment',  parseFloat( valores[3])],
                        ['DT Wheather',  parseFloat( valores[4])],
                        ['Travel & Commute',  parseFloat( valores[5])],
                        ['DT Other',   parseFloat(valores[6])],
                        ['Training',  parseFloat( valores[7])]
                        ]
                    }]
                });
    
    
            });

                   
                },
                complete: function(){
                     
                     //*************** datos por persona
                     
                     
                   $.ajax({
               
                url:"../../Reportes/controller/controllerGraficasXPersona.php",
                data:{
                    id_con_proyecto:id_con_proyecto,
            opcion:'completo'
                   
                },
                success:function(data){
                   
                   
             $("#divTablaDatos").html(data);
   
            

                   
                },
                complete: function(){
                     
                     
                  //*************** datos por indi
                     
                     
                   $.ajax({
               
                url:"../../Reportes/controller/controllerReporteIndividual.php",
                data:{
                    id_con_proyecto:id_con_proyecto,
            opcion:'completo'
                   
                },
                success:function(data){
                   
                   
             $("#divTotales").html(data);
   
            

                   
                },
                complete: function(){
                      
//                      $.unblockUI(); 
//                     alert('termino');
                     
                }
               
               
            });
                     
                }
               
               
            });
                     
                }
               
               
            });    
                     
                }
               
               
            });    
                     
//                }///--
//               
//               
//            });    
                     
                }
               
               
            });
           
        }
        
        
    })
    
    
   
    
    
    
      
    
    
    
    
    
    
}


function reporteIndividualSuplente(id_con_proyecto,id_suplente,nombre){
    
     
    
    
    
    $("#titulo_pagina_2").val("Reporte personal: "+nombre);
   $.ajax({
        
        url: "../../Reportes/view/viewPanelesReporte.php",
        success:function(data){
            $("#panelCenter_2_1").html(data);
          
        },
      
        beforeSend: function(){
           //Se pone para que en todos los llamados ajax se bloquee la pantalla mostrando el mensaje Procesando...
     $.blockUI({ message: '<img src=/SeguimientoTrue/trunk/interfaz/view/images/d.gif />' }); 
        },
        complete: function(){
           
            // carga la grafica de km
            $.ajax({
               
                url:"../../Reportes/controller/controllerGraficasPeronalesKm.php",
                data:{
                    id_con_proyecto:id_con_proyecto,id_suplente:id_suplente,
                    opcion:"suplente"
                },
                success:function(data){
                   
                    $("#divGraficakm").html(data);
                   
                },
                complete: function(){
                     
                     
                  // carga la grafica de horas
            $.ajax({
               
                url:"../../Reportes/controller/controllerGraficasPersonalesHr.php",
                data:{
                    id_con_proyecto:id_con_proyecto,id_suplente:id_suplente,
                    opcion:"completo"
                },
                success:function(data){
                   
                    $("#divGraficasDatos").html(data);
                   
                },
                complete: function(){
                     
                     
                      // carga la grafica de horas
//            $.ajax({
//               
//                url:"../../Reportes/controller/controllerGraficasPersonalesHr.php",
//                data:{
//                    id_con_proyecto:id_con_proyecto,id_suplente:id_suplente,
//                    opcion:"suplente"
//                },
//                success:function(data){
//                   
//                    $("#divGraficasDatos").html(data);
//                   
//                },
//                complete: function(){
                     
                     
                        // carga la grafica de global
            $.ajax({
               
                url:"../../Reportes/controller/controllerDatosGraficar.php",
                data:{
                    id_con_proyecto:id_con_proyecto
                   
                },
                success:function(data){
                   
                   
            var valores= new Array();
            var num;
            //            alert(data);
        
            var a = new Array();
     
            a=eval(data);
     
            for(var i=0;i<a.length; i++){
         
                num=a[i].toString().split(",");
         
                valores[i]=num[1];


         
            }
   
            $(function () {
                $('#divAvance').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Grafica'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Browser share',
                        data: [
                        ['FDC Prep',  parseFloat(valores[1])],                    
                        ['FDC',   parseFloat( valores[2])],
                        ['DT equipment',  parseFloat( valores[3])],
                        ['DT Wheather',  parseFloat( valores[4])],
                        ['Travel & Commute',  parseFloat( valores[5])],
                        ['DT Other',   parseFloat(valores[6])],
                        ['Training',  parseFloat( valores[7])]
                        ]
                    }]
                });
    
    
            });

                   
                },
                complete: function(){
                     
                     //*************** datos por persona
                     
                     
                   $.ajax({
               
                url:"../../Reportes/controller/controllerGraficasXPersona.php",
                data:{
                    id_con_proyecto:id_con_proyecto,id_suplente:id_suplente,
            opcion:'suplente'
                   
                },
                success:function(data){
                   
                   
             $("#divTablaDatos").html(data);
   
            

                   
                },
                complete: function(){
                     
                     
                  //*************** datos por indi
                     
                     
                   $.ajax({
               
                url:"../../Reportes/controller/controllerReporteIndividual.php",
                data:{
                    id_con_proyecto:id_con_proyecto,id_suplente:id_suplente,
            opcion:'suplente'
                   
                },
                success:function(data){
                   
                   
             $("#divTotales").html(data);
   
            

                   
                },
                complete: function(){
                     
               $.unblockUI();
                  
                     
                }
               
               
            });
                     
                }
               
               
            });
                     
                }
               
               
            });    
                     
//                }
               
               
//            });    
                     
                }
               
               
            });    
                     
                }
               
               
            });
           
        }
        
        
    })
    
    
    
    
    
    
     
    }
});
    
    
    
}