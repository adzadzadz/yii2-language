<?php

    $this->title = 'Language Module';

    use yii\helpers\Url;
    use yii\helpers\Html;
    use adz\yii2\language\assets\MainAsset;
    MainAsset::register($this);

?>
<section class="row">
<div class="col-md-6">
<?php foreach ($config['languages'] as $each) { ?>
<a href="<?= Url::toRoute(['translate', 'language' => $each]) ?>" class="btn btn-primary btn-lg">
    <?= $each ?>
</a>
<?php } ?>
</div>
</section>

<section id="language-changer" class="row">
	<div class="col-md-6">
		<h3>Built in Language Changer</h3>
		<div id="language-selector">
		<?= Html::beginForm(['/language/default/language'], 'post', ['enctype' => 'multipart/form-data', 'id' => 'general-setting-language', 'class' => 'form-inline']) ?>
		  <div class="form-group">
		    <?= Html::label('Select Language', 'language') ?>
		    <?= Html::dropDownList('language', Yii::$app->language, $config['lang_code_equiv'], ['id' => 'general-settings-language-select', 'class' => 'form-control']) ?>
		  </div><!-- /.form-group -->
		<?= Html::endForm() ?>
		</div>
	</div>
</section>