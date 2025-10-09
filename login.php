<?php $titulo = "Login" ;?>
<?php include_once("templates/header.php");?>
    <main>
        <div class="login-container">
            <div class="login">
                <p>Acesso da área de gerenciamento</p>
                <br>
                <form action="?" method="post">
                    <p>Senha: <input type="password" name="senha" id="senha" required></p>
                    <br>
                    <input type="submit" value="enviar" name="enviar">
                </form>
                <br>
                <p id="msg"></p>
            </div>
        </div>
        <div class="voltar">
            <a href="<?=$BASE_URL?>/index.php"><h1>Voltar</h1></a>
        </div>
    </main>
<?php
if(isset($_POST['senha'])){
    if($_POST['senha'] == $pw){
        header("Location: ".$BASE_URL."/reservado.php");
        die();
    }
    else{
        echo "<script type='text/javascript'>
            document.getElementById('msg').innerHTML += 'Senha incorreta.'
            </script>";
    }
}
?>
</body>