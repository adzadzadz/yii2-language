<?php

    $this->title = 'Language Module';

    use yii\helpers\Url;
    use app\modules\yii2language\assets\MainAsset;
    MainAsset::register($this);
?>

<section id="language-translation-module">
    <div class="col-md-10">
        <h3><?= Yii::t('yii2language_module', 'You are translating') ?> <?= $language ?></h3>

        <!-- common data -->
        <div id="common-data" 
            data-saveurl="<?= Url::toRoute(['update']) ?>"
            data-language="<?= $language ?>"
            data-success="<?= Yii::t('yii2language_module', 'translation saved') ?>"
            data-failed="<?= Yii::t('yii2language_module', 'save unsuccesful') ?>"
        ></div>
        <!-- common data - end -->

        <table class="table table-striped">
            <thead>
                <tr>
                    <td><?= Yii::t('yii2language_module', 'ID') ?></td>
                    <td><?= Yii::t('yii2language_module', 'Category') ?></td>
                    <td><?= Yii::t('yii2language_module', 'Message') ?></td>
                    <td><?= Yii::t('yii2language_module', 'Translation') ?></td>
                </tr>
            </thead>
            <?php foreach ($translation['source'] as $eachSource) { ?>
                <tr>
                    <td><?= $eachSource->id ?></td>
                    <td><?= $eachSource->category ?></td>
                    <td><?= $eachSource->message ?></td>
                <?php foreach ($translation['message'] as $eachMessage) { ?>
                    <?php if ($eachSource->id === $eachMessage->id && $eachMessage->language === $language): ?>
                        <td width="50%">
                            <div class="input-group translate-field-group">
                                <input type="text" class="form-control translate" data-id="<?= $eachMessage->id ?>" value="<?= $eachMessage->translation ?>">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-text-size"></span></div>
                            </div>
                        </td>
                    <?php endif ?>
                <?php } ?>
                </tr>
            <?php } ?>
        </table>
        
    </div>
    <div class="col-sm-2 hidden-xs" id="result" style="position: fixed; right: 0px; top: 100px; height: 80%; overflow: auto;">
        <h3><?= Yii::t('yii2language_module', 'Notifications') ?></h3>
        <div id="notif-container">
                      
        </div>
    </div>
</section>
<div class="clearfix"></div>