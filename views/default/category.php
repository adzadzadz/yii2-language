<?php

    $this->title = 'Language Module';

    use yii\helpers\Url;
?>

<?php foreach ($config['languages'] as $each) { ?>
<a href="<?= Url::toRoute(['translate', 'language' => $each]) ?>" class="btn btn-primary btn-lg">
    <?= $each ?>
</a>        
<?php } ?>