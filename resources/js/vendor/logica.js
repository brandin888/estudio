$(function () {
  $('[data-toggle="tooltip"]').tooltip();

  var route = site_url+'fechas-promocionales';
  $.ajax({
      url: route,
      data : {},
      type : 'GET',
      dataType: 'json',
      success : function(response){
        // console.log(response)
        var d;
        var a;
        var date2;
        var dia_promocion = [];
        var mes_promocion = [];
        var anio_promocion = [];
        var descripcion = [];
        $.each(response.fechas, function(i, item) {
            d = item.fecha;
            a = d.split("-");
            var date2 = new Date(a[0], (a[1] - 1), a[2]) ;
            dia_promocion[i] = date2.getDate();
            mes_promocion[i] = date2.getMonth()
            anio_promocion[i] = date2.getFullYear()
            descripcion[i] = item.descripcion;
        });

        calendario(dia_promocion,mes_promocion,anio_promocion, descripcion);
      }
  });

})

function calendario(dia_promocion,mes_promocion,anio_promocion, descripcion){

    var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'octubre', 'Noviembre', 'Diciembre'];

    var fecha = new Date();
    var dia_actual = fecha.getDate();
    var mes_actual = fecha.getMonth();
    var anio_actual = fecha.getFullYear();

    var mes_actual2 = fecha.getMonth();


    var dias = $('#dias');
    var mes = $('#mes');
    var anio = $('#anio');

    var atras = $('#atras');
    var siguiente = $('#siguiente');

    mes.text(meses[mes_actual]);
    anio.text(anio_actual.toString());

    atras.click(function(){
      console.log(mes_actual)

         return mes_atras();
    });

    siguiente.click(function () {
      console.log(mes_actual)
        return mes_siguiente();
    });

    mes_dias(mes_actual);
    function mes_dias(month) {
        var html = '';
        var descuento = [''];
        var togg = [''];
        var plomo = [''];

        for (var i = hoy(); i > 0; i--) {
            html += ' <div class="calendar__date calendar__item calendar__last-days"></div>';
        }

        for (var _i = 1; _i <= total_dias(month); _i++) {

          for(var _j=0; _j < dia_promocion.length; _j++){

            if(_i == dia_promocion[_j] && month == mes_promocion[_j] && anio_actual == anio_promocion[_j]){
              // console.log(dia_promocion[_j])
                 descuento[_i] = descripcion[_j];
                 togg[_i] = 'tooltip';
                 plomo[_i] = 'pintar_plomo';
            }
          }

           if(togg[_i] === undefined && descuento[_i] === undefined){
             togg[_i] = '';
             descuento[_i] = '';
             plomo[_i] = '';
           }

            if (_i === dia_actual && mes_actual2 === month)
                html += ' <div class="calendar__date dia" data-toggle="'+togg[_i]+'" title="'+descuento[_i]+'"  ><div class="pintado" select="ok" mes="'+(month+1)+'" dia="'+_i+'" anio="'+anio_actual+'" onclick="select_f(this)">' + _i + '</div></div>';
            else
                html += ' <div class="calendar__date dia" data-toggle="'+togg[_i]+'" title="'+descuento[_i]+'"  ><div class="'+plomo[_i]+'" onclick="select_f(this)" mes="'+(month+1)+'" dia="'+_i+'" anio="'+anio_actual+'">' + _i + '</div></div>';

        }

        dias.html(html);
    }

    function total_dias(month) {
        if (month === -1) month = 11;

        if (month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
            return 31;
        } else if (month == 3 || month == 5 || month == 8 || month == 10) {
            return 30;
        } else {

            return valida_anio() ? 29 : 28;
        }
    }

    function valida_anio() {
        return anio_actual % 100 !== 0 && anio_actual % 4 === 0 || anio_actual % 400 === 0;
    }

    function hoy() {
        var hoy__ = new Date(anio_actual, mes_actual, 1);
        return hoy__.getDay() - 1 === -1 ? 6 : hoy__.getDay() - 1;
    }

    function mes_atras() {

        if (mes_actual !== 0) {
            mes_actual--;
        } else {
            mes_actual = 11;
            anio_actual--;
        }
        nueva_fecha();
    }

    function mes_siguiente() {

        if (mes_actual !== 11) {
            mes_actual++;
        } else {
            mes_actual = 0;
            anio_actual++;
        }
        nueva_fecha();
    }

    function nueva_fecha() {
        fecha.setFullYear(anio_actual, mes_actual, dia_actual);
        mes.text(meses[mes_actual]);
        anio.text(anio_actual.toString());
        dias.text('');
        mes_dias(mes_actual);
    }

    sin_seleccion_mes_actual = mes_actual + 1;
    var fecha_actual = dia_actual + '/' + sin_seleccion_mes_actual + '/'+ anio_actual;
    $('#fechaActual').val(fecha_actual);


}
