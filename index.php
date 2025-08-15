<?php include_once("templates/header.php");?>
    <main>
        <div class="topo">
            <h1><?php echo $titulo?></h1>
        </div>
        <div>
            <?php foreach($data as $post):?>
                <div class="linhas-post">
                    <div class="conteiner-name">
                       <h1><?=$post['name']?></h1> 
                    </div>
                    <div class="conteiner-post">
                        <?php foreach($post['img'] as $img):?>
                            <div class="caixa-post" style ="background: url(<?=$BASE_URL?>/img/<?=$img?>); background-size:100% 100%;">
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