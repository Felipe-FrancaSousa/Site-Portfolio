<?php include_once("templates/header.php");?>
    <main>
        <div>
            <?php foreach($data as $post):?>
                <script type="module">
                    var slider = tns({
                        container: '.my-slider<?= $post['id']?>',
                        items: 4, // Quantidade de itens que são exibidos ao mesmo tempo
                        slideBy: 'page',
                        autoplay: true,
                        mouseDrag: true, // Seta se o carousel pode ser rotacionado com o movimento de clicar e arrastar do mouse
                        autoplayButtonOutput: false, // Seta visibilidade do botão de auto play
                        controls: false, // seta visibilidade das setas de controle
                        nav: false // Seta visibilidade da navegação (3 pontinhos)
                    });
                </script>
                <div class="linhas-post">
                    <div class="conteiner-name">
                       <h1><?=$post['name']?></h1> 
                    </div>
                    <div class="my-slider<?= $post['id']?>">
                        <?php foreach($post['img'] as $img):?>
                            <div class="img-post" style ="background: url(<?=$BASE_URL?>/data/uploads/<?=$img?>); background-size:100% 100%;">
                                <div class = "caixa-overlay">
                                    <h1><?= pathinfo($img)['filename'] ?></h1>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
<?php include_once("templates/footer.php");?>