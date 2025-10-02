<?php $titulo = "Uploade de coleção" ;?>
<?php include_once("templates/header.php");?>
<main>
  <a href="<?=$BASE_URL?>/reservado.php"><h1>Voltar</h1></a>
<?php 

if (isset($_FILES['arquivo'])) {
  // Passa por cada arquivo enviado
  for ($i = 0; $i < count($_FILES['arquivo']['name']); $i++) {
    $name = $_FILES['arquivo']['name'][$i];
    $type = $_FILES['arquivo']['type'][$i];
    $size = $_FILES['arquivo']['size'][$i];
    $temp = $_FILES['arquivo']['tmp_name'][$i];
    $error = $_FILES['arquivo']['error'][$i];

    $target_dir = "data/artes/";
    $target_file = $target_dir . basename($name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imageName = basename($_FILES['arquivo']['name'][$i], (".".$imageFileType));


    // Checa se a imagem é real
    if(isset($_POST["submit"])) {
      $check = getimagesize($temp);
      if($check !== false) {
        echo "Imagem ". $name ." foi processada. <br>";
        $uploadOk = 1;
      } else {
        echo "Arquivo <b>". $name ."</b> não é uma imagem. <br>";
        $uploadOk = 0;
      }
    }

    // Checa se a imagem já existe
    if (file_exists($target_file)) {
      echo "Arquivo <b>". $name ."</b> já existe no banco de dados. <br>";
      $uploadOk = 0;
    }

    // Checa o tamanho do arquivo
    if ($size > 5120000) {
      echo "Arquivo <b>". $name ."</b> é muito grande, máximo permitido de 5MB. <br>";
      $uploadOk = 0;
    }

    // Define quais formatos de arquivos são aceitos
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Apenas arquivos no formato JPG, JPEG, PNG e GIF são permitidos. <br>";
      $uploadOk = 0;
    }

    // Checa se o $uploadOk foi definido pra 0 por algum erro
    if ($uploadOk == 0) {
      echo "Erro, arquivo <b>". $name ."</b> não foi enviado. <br>";
    
    // Se tudo estiver ok, tenta enviar o arquivo
    } else {
      if (move_uploaded_file($temp, $target_file)) {
        echo " > O arquivo <b>". htmlspecialchars( basename($name)). "</b> da coleção <b>". $_POST['colecao'] ."</b> foi enviado com sucesso! <br>";
      } else {
        echo "<br>Erro ao enviar arquivo. <br>";
      }
    }
  }

  // Se o arquivo da foto estiver ok, as informações são gravadas no XML
  if($uploadOk == 1){

    $id =($xml->posts->colecao[count($xml->posts->colecao)-1]['id'] + 1);

    // Cria a pasta onde a coleção irá ficar
    mkdir("data/artes/".$id);

    // Configuração do DOMDocument para formatação do XML
    $dom=new DOMDocument;
    $dom->ownerDocument;
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());

    // Define onde está a raiz do XML
    $root = $dom->getElementsByTagName('posts')->item(0);

    // Cria o elemento colecao com um atributo ID
    $colecao = $dom->createElement('colecao');
    $root->appendChild($colecao);
    $colecao->setAttribute('id', $id);

    // Cria e inclui os elemntos de nome da coleção e as imagens
    $nome = $dom->createElement('nome', $_POST['colecao']);
    $colecao->appendChild($nome);
    for ($i = 0; $i < count($_FILES['arquivo']['name']); $i++) {
      $name = $_FILES['arquivo']['name'][$i];
      $type = $_FILES['arquivo']['type'][$i];
      $size = $_FILES['arquivo']['size'][$i];
      $temp = $_FILES['arquivo']['tmp_name'][$i];
      $error = $_FILES['arquivo']['error'][$i];

      $target_dir = "data/artes/";
      $target_file = $target_dir . basename($name);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $imageName = basename($_FILES['arquivo']['name'][$i], (".".$imageFileType));
      
      // Cria e separa o elemento img de sua extenxão
      $img = $dom->createElement('img', $imageName);
      $colecao->appendChild($img);
      $img->setAttribute('type', $imageFileType);

      //Transfere as imagens para a pasta final
      rename("$target_dir$name", "$target_dir$id/$name");
    }
    // Salva o arquivo usando o DOMDocument para manter a formatação
    $dom->save('data/dados.xml') or die('XML Create Error');
    
  }
}
?>
</main>
<?php include_once("templates/footer.php");?>