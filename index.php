<?php $titulo = "Artes" ;?>
<?php include_once("templates/header.php");?>
    <main>
        <div>
            <!-- Cria o carrossel de imagens, $i é usado para conseguir criar vários carrosseis TinySlider2 na página -->
            <?php $i = 0; foreach($xml->data as $data):?>
                <script type="module">
                    var slider = tns({
                        container: '.my-slider<?= $i ?>',
                        items: 4, // Quantidade de itens que são exibidos ao mesmo tempo
                        slideBy: 'page',
                        autoplay: true,
                        mouseDrag: true, // Seta se o carousel pode ser rotacionado com o movimento de clicar e arrastar do mouse
                        autoplayButtonOutput: false, // Seta visibilidade do botão de auto play
                        controls: false, // seta visibilidade das setas de controle
                        nav: false // Seta visibilidade da navegação (3 pontinhos)
                    });
                </script>
                <!-- Puxa o nome da coleção do XML --> 
                <div class="linhas-post">
                    <div class="conteiner-name">
                       <h1><?=$data->nome?></h1> 
                    </div>
                    <!-- Cria o conteudo dos carrosseis --> 
                    <div class="my-slider<?= $i?>">
                        <?php foreach($data->img as $arquivo):?>
                            <div class="img-post" style ="background: url(<?=$BASE_URL?>data/uploads/<?=$data['id']?>/<?= str_replace(' ', '%20', $arquivo)?>.<?=$arquivo['type']?>);background-size:100% 100%;">
                                <!-- Cria o overlay com o nome da imagem --> 
                                <div class = "caixa-overlay">
                                    <h1><?php echo $arquivo; ?></h1>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </div>
    </main>
<?php include_once("templates/footer.php");?>