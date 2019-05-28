function    ajax(controlador,op)
{
    
    var paginamenu = "../../Controlador/"+controlador+".php?op=" + op;
    var xmlhttp;
    // en esta condicional Doble se valida la Version del Navegador
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();// creando un de Ajax Moderno
    } else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById('container').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", paginamenu, true);
    xmlhttp.send(null);
}

function    ajax1(controlador,op,val)
{
    
    var paginamenu = "../../Controlador/controlador"+controlador+".php?op=" + op +"&val="+val;
    var xmlhttp;
    // en esta condicional Doble se valida la Version del Navegador
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();// creando un de Ajax Moderno
    } else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById('container1').innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", paginamenu, true);
    xmlhttp.send(null);
}
function    ajax2(controlador,op,val,elemento)
{
    var paginamenu = "../../Controlador/"+controlador+".php?op=" + op +"&val="+val+"&elemento="+elemento;
    var xmlhttp;
    // en esta condicional Doble se valida la Version del Navegador
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();// creando un de Ajax Moderno
    } else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(elemento).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", paginamenu, true);
    xmlhttp.send(null);
}

