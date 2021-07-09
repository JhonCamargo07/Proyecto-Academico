<style>
    .parrafo__php{
        color: #ff0000;
        text-align: center;
        font-size: 17px;
        font-weight: bold;
    }
</style>

<?php
    if(isset($_POST['ingresar'])){
        $usuario = "JhonCamargo21";
        $clave = "jhon007";

        $usuarioWeb = $_POST['usuario'];
        $contraseñaWeb = $_POST['contraseña'];


        if($usuarioWeb === $usuario && $contraseñaWeb === $clave){
            session_start();

            $_SESSION['usuario'] = $usuario;
            
            header("location:menu.php");
        }
        else{
            echo '<p class="parrafo__php">El usuario y/o la contraseña son incorrectos<p>';
        }
    }
?>