<section class="content">
    <h1 class="text-center" style="font-size:40px;">Obrigado!</h1>
    <p class="text-center" style="font-size:18px;">Sua Sugestão e Feedback Foi Encaminhados com Sucesso</p>

    <h1 class="text-center" style="font-size:30px;">Nossa Equipe Agradeçe</h1>

    <div>
        <?php foreach($list as $item): ?>
        <p class="text-center"><?php echo $item['frase'] ?></p>
        <?php endforeach ?>
    </div>
</section>