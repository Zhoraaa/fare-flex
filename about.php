<?php
include "./funcs/pageBase.php";
?>
<main id="first-content-on-page" class="brad20 p20 inner-shadow flex column g10 ai-c">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d242.82464414304863!2d55.9113224815602!3d54.61895907720964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sru!4v1688114474815!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="brad20"></iframe>
    <div class="flex column g10 m20">
        <div class="flex jc-sb">
            <span>Обратная связь:</span><b>fareflex@mail.ru</b>
        </div>
        <div class="flex jc-sb">
            <span>Телефон горячей линии:</span>
            <b> +7 900 (293) 90-06</b>
        </div>
        <div class="flex jc-sb">
            <span>ОГРНИП:</span>
            <b>02232814466</b>
        </div>
        <div class="flex jc-sb">
            <span>ИП:</span>
            <b>Мухамедьянов Тагир Салаватович</b>
        </div>
    </div>
    <?php 
    if ($user['role'] == 3) {
    ?>
    <a href="formNewTaxist.php" style="text-decoration: underline;">Хочу стать таксистом</a>
    <?php } ?>
</main>