<?php
    if (isset($_POST['entrada']) ){
         //obtengo el string del text area
        $entrada = $_POST['entrada'];
        //obtengo el valor del radiobutton elegido
        $radio = $_POST['envio'];
        //compruebo si el checkbox esta seleccionado
        $check = isset($_POST["check"]) ? $_POST["check"]:"";

        //convierto el string en array utilizando como separador los espacios entre palabras
        $palabras = explode(" ", $entrada);

        if($radio == "repetidas"){//si hemos elegido la opcion de eliminar palabras repetidas
            //elimino del array las palabras repetidas
            $eliminadas = array_unique($palabras);
            //convierto el array en un string
            $final = implode(" ", $eliminadas);
            //header("Location: index.php?caso1=".$final);
            header("Location: index.php?caso1=".$final."&entrada=".$entrada);
        }else{//si hemos elegido ordenar
            if(!$check){//ordenar ascendentemente
                
                sort($palabras);
                $final = implode(" ", $palabras);
                //header("Location: index.php?caso2=".$final);
                header("Location: index.php?caso2=".$final."&entrada=".$entrada);
            }else{//ordenar descendentemente
                rsort($palabras);
                $final = implode(" ", $palabras);
                //header("Location: index.php?caso3=".$final);
                header("Location: index.php?caso3=".$final."&entrada=".$entrada);
            }
            
        }

    }

        
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
   
    <form action="index.php" method="POST">
        <fieldset style="width: 25%">
            <legend> <strong>Entrada</strong></legend>
            <div>
                <textarea name="entrada" id="entrada" cols=50" rows="10"><?php
                    //imprimo en el text area el string enviado como formulario para evitar que se borre 
                    $entrada= isset( $_GET["entrada"]) ? $_GET["entrada"]:"";
                    echo $entrada;?></textarea>
                <div>
                    <input type="radio" name="envio" checked value="repetidas"><label for="repetidas">Repetidas</label>
                    <input type="radio" name="envio" value="ordenadas"><label for="ordenar">Ordenar</label>
                </div>
                <br>
                <input type="checkbox" name="check" id="check" value="on"><label for="descendente">Descendente</label>
                <br>
                <br>
                <input type="submit" value="Enviar palabras"/>
            </div>
        </fieldset>
    </form>
    
    <br/>
    <fieldset style="width: 25%">
        <legend><strong>Salida</strong></legend>
        <div>
            <textarea name="textoSalida" id="" cols="50" rows="10"><?php                    
                    $caso1= isset( $_GET["caso1"]) ? $_GET["caso1"]:"";
                    echo $caso1;
                    $caso2= isset( $_GET["caso2"]) ? $_GET["caso2"]:"";
                    echo $caso2;
                    $caso3= isset( $_GET["caso3"]) ? $_GET["caso3"]:"";
                    echo $caso3;
                ?></textarea>
        </div>
    </fieldset>

</body>
</html>