
//var objDep=document.getElementById("hide").innerHTML;
//var dependencias=JSON.parse(objDep);
var obj;
function llenarSubDep(){
    console.log(obj);
    console.log(obj[1].subdependencias[0].nombre);
    document.getElementById("subdependencias").innerHTML="";
    //document.getElementById("subdependencias").remove(0);
    //document.getElementById("subdependencias").remove(1);
    var index=document.getElementById("dependencias").selectedIndex;
    var sel=document.getElementById("subdependencias");
    for(var i=0;i<obj[index].subdependencias.length;i++){
        console.log(i);
        var op=document.createElement("option");
        op.setAttribute("value",i);
        op.setAttribute("label",obj[index].subdependencias[i].nombre);
        console.log(obj[index].subdependencias[i].nombre);
        sel.appendChild(op);
    }
    actualizarConsecutivo();
}
function actualizarConsecutivo(){
    var x = Math.floor((Math.random() * 150)+100);
    var y = Math.floor((Math.random() * 150)+100);
    var z = Math.floor((Math.random() * 150)+100);

    var ind=document.getElementById("dependencias").selectedIndex;
    var ind2=document.getElementById("subdependencias").selectedIndex;
    document.getElementById("mostrarConsecutivo").style.backgroundColor="rgb(" + x + "," + y + "," + z + ")";
    document.getElementById("mostrarConsecutivo").innerHTML=
    "8."+
    obj[ind].numero+"."+
    obj[ind].subdependencias[ind2].numero+"/"+
    obj[ind].subdependencias[ind2].consecutivo  
    ;

}
function agregar(){
    console.log("Agregando");

    var ind=document.getElementById("dependencias").selectedIndex;
    var ind2=document.getElementById("subdependencias").selectedIndex;
    window.location.href = "index.php?dep="+ind+"&sub="+ind2;
   
   /* obj[ind].subdependencias[ind2].consecutivo+=1;
    fs.writeFile("scheme.json",JSON.stringify(obj, null, 4), (err) => {
        if (err) {
            console.error(err);
            return;
        }
    });*/

}

function recibeObj(){
    var objDep=document.getElementById("hide").innerHTML;
    obj=JSON.parse(objDep);
}
window.onload=function load(){
    recibeObj();
    llenarSubDep();
    actualizarConsecutivo();  

}
