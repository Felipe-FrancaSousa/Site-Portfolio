<?php $titulo = "Gerenciamento" ;?>
<?php include_once("templates/header.php");?>    
    <main>
        <a href="<?=$BASE_URL?>/index.php"><h1>Voltar</h1></a>
        <form action="uploadeColecao.php" method="post" enctype="multipart/form-data">
            <h1>Selecionar coleção para upload:</h1>
            <br>
            <p>Nome da coleção: <input type="text" name="colecao" id="colecao" required></p>
            <br>
            <p>Arquivo: <input type="file" name="arquivo[]" id="arquivo" multiple required></p>
            <br>
            <p><input type="submit" value="Enviar" name="submit"></p>
        </form>
        <br>
        <form action="uploadeEvento.php" method="post" enctype="multipart/form-data">
            <h1>Selecionar foto de evento anterior para upload:</h1>
            <br>
            <p>Nome do evento: <input type="text" name="nomeEvento" id="nomeEvento" required></p>
            <br>
            <p>Data do evento: <input type="date" name="date" id="date" required></p>
            <br>
            <p>Foto: <input type="file" name="foto" id="foto" required></p>
            <br>
            <p><input type="submit" value="Enviar" name="submit"></p>
        </form>
        <br> 
    </main>
<?php include_once("templates/footer.php");?>