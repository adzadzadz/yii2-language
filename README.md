# Installation

### Install with composer. Add to composer.json from yii2 root dir.
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/adzadzadz/yii2-language"
    }
]
```
then from your terminal,
```
$ composer require adzadzadz/yii2-language:dev-master
```

### Migrate required tables.
- $ php yii migrate --migrationPath=vendor/adzadzadz/yii2-language/migration --interactive=0

### extract all translate/i18n enabled elements from all files
- From the root yii2 installation, enter command shown below.
```
$ php ./yii message/extract vendor/adzadzadz/yii2-language/config.php
```

### Don't forget to enable the module from your config file.
```
'modules' => [
    'language' => [
        'class' => 'adz\yii2\language\language',
        //'viewPath' => __DIR__ . '/../../frontend/views', // (optional) blogger will use default views from adzadzadz/yii2-language/views if not set
        'aliases' => [
            '@strepzAliasSample' => 'This is an alias sample', // echo \Yii::getAlias('@bloggerSample') ;
        ]
    ],
],
```

### AND MAKE SURE TO ENABLE i18n by adding this into your components
```
'i18n' => [
    'translations' => [
        // SIMPLY MEANS ALL CATEGORY
        '*' => [
            'class' => 'yii\i18n\DbMessageSource',
            'sourceMessageTable' => '{{%language_source}}',
            'messageTable' => '{{%language_message}}',
            'sourceLanguage' => 'en-US',
           ],
    ],
],
```
#### access http://yourdomain.com/index.php?r=language... That's it, you're all set.

## For suggestions, bug report, and whatsoever... Email me at adz@adzbyte.com