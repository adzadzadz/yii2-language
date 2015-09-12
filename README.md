# Installation

### Install with composer. Add to composer.json from yii2 root dir.
```
"require": {
    "php": ">=5.4.0",
    "yiisoft/yii2": ">=2.0.6",
    "yiisoft/yii2-bootstrap": "*",
    "yiisoft/yii2-swiftmailer": "*",
    "adzadzadz/yii2-language": "*"
},
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/adzadzadz/yii2-language"
    }
]
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
            'class' => 'adz\yii2\language',
            //'viewPath' => __DIR__ . '/../../frontend/views', // (optional) blogger will use default views from adzadzadz/yii2-language/views if not set
            'aliases' => [
                '@strepzAliasSample' => 'This is an alias sample', // echo \Yii::getAlias('@bloggerSample') ;
            ]
        ],
    ],
];
```

#### access http://yourdomain.com/index.php?r=language... That's it, you're all set.

## For suggestions, bug report, and whatsoever... Email me at adz@adzbyte.com