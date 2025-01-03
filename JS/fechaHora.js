(function(){
    var actualizarhora = function(){
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear();
        
        var pHoras = document.getElementById("horas"),
            pAMPM = document.getElementById("ampm");
            pMinutos = document.getElementById("minutos"),
            pSegundos = document.getElementById("segundos"),
            pDiaSemana = document.getElementById("diaSemana"),
            pDia = document.getElementById("dia"),
            pMes = document.getElementById("mes"),
            pYear = document.getElementById("year");

        var semana =['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
        pDiaSemana.textContent = semana[diaSemana];     
        pDia.textContent = dia;

        var meses =['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        pMes.textContent = meses[mes];
        pYear.textContent = year;

        //horas
        //condicional 12 horas
        if(horas >= 12){
            horas = horas -12;
            ampm = 'PM';
        }else{
            ampm = 'AM';
        }
        //horas 12 0
        if(horas == 0){
            horas = 12;
        };
        pHoras.textContent = horas;
        pAMPM.textContent = ampm;

        //minutos
        if(minutos < 10){
            minutos = "0"+ minutos;
        };
        pMinutos.textContent = minutos;

        //segundos
        if(segundos < 10){
            segundos = "0"+ segundos;
        }
        pSegundos.textContent = segundos;

    };  
    
    actualizarhora();
    var intervalo = setInterval(actualizarhora, 1000);
}())

