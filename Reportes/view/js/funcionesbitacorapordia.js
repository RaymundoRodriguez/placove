function greficasbitacoraspordia(id_bitacora)
{
    
    $('#pager6').show().load('../../Reportes/controller/controllerDatosGrafDia.php',{
        id_bitacora:id_bitacora
    },function(data){
    
    $.post("../../Reportes/controller/controllerReporteBitacoraporDia.php",{
            id_bitacora:id_bitacora
        },function(data){
        
            var valores= new Array();
            var num;
            //alert(data);
        
            var a = new Array();
     
            a=eval(data);
     
            for(var i=0;i< a.length; i++){
         
                num=a[i].toString().split(",");
         
                valores[i]=num[1];


         
            }
   
            $(function () {
                $('#graficas').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                         events: {
                load: function(event) {
                    $.unblockUI(); 
                }}
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
      
      
        });
        
        });
}


