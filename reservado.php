<?php $titulo = "Gerenciamento" ;?>
<?php include_once("templates/header.php");?>    
    <main>
        <form action="uploader.php" method="post" enctype="multipart/form-data">
            <h1>Selecionar coleção para upload:</h1>
            <br>
            <p>Nome da coleção: <input type="text" name="colecao" id="colecao" required></p>
            <br>
            <p>Foto: <input type="file" name="arquivo[]" id="arquivo" multiple required></p>
            <br>
            <p><input type="submit" value="Enviar" name="submit"></p>
        </form>
        <br>
    </main>
<?php include_once("templates/footer.php");?>