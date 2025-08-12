<?php include_once("templates/header.php");?>
    <main>
        <div class="topo">
            <h1>Halfafa tropical!</h1>
        </div>
        <div class="conteudo">
            <?php foreach($data as $post):?>
                <div class="caixa-post" >
                    <img src="<?=$BASE_URL?>/img/<?=$post['img']?>" alt="<?=$post['name']?>">
                    <h1><?=$post['name']?></h1>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
<?php include_once("templates/footer.php");?>