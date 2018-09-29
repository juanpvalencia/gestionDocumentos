<!DOCTYPE html>

<?php

$dependencias=json_decode(file_get_contents('scheme.json'),true);
function agregarConsecutivo(){
    $obj= $_GET['depedencias'].selectedIndex;
    //echo "Mio $obj";
    
    //$nObj= echo '<script type='text/javascript'> agregar2(); </script>';
    //$datos= json_encode($nObj);
    //file_put_contents('scheme.json',$datos);

}
if(isset($_GET["dep"]) or isset($_GET["sub"]))
{
    $depen = $_GET["dep"];
    $subdepen = $_GET["sub"];
    if($depen < 3){
        if($subdepen < 2){
            
            $info=json_decode(file_get_contents('scheme.json'),true);
            //echo "$data";
            //$datos= var_dump(json_dencode($dependencias));
            $info[$depen]['subdependencias'][$subdepen]['consecutivo']++;
            //$info[$depen].'subdependencias'[$subdepen]['consecutivo']++ ;
            $datos= json_encode($info);
            file_put_contents('scheme.json',$datos);
        }
    }else{
        echo "Error, número dado no encontrado";
    }
            
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestor de Códigos Consecutivos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="script.js"></script>

    
</head>
<body>    
    <div class="centrado">       
        <form class = "centrado" method="get" action="">
            <select id="dependencias" onchange="llenarSubDep()">
                <option value="0"><?php echo $dependencias[0]['nombre'];?></option>
                <option value="1"><?php echo $dependencias[1]['nombre']?></option>
                <option value="2"><?php echo $dependencias[2]['nombre']?></option>                
            </select>
            <select id="subdependencias" onchange="actualizarConsecutivo()">
            </select>
            <div>
            <input type="button" value="Agregar" onclick="agregar()">
            </div>
            
            <p id="mostrarConsecutivo">      
            </p>
           

        </form>
        <p id="hide">
        <?php print json_encode($dependencias);?>
        </p>
        <p class="centrado"> 
                Permite agregar códigos consecutivos para la gestión de documentos
        </p>    
        
    </div>   

</body>
</html>