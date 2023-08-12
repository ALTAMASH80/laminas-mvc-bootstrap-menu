# laminas-mvc-bootstrap-menu
This repository will contain bootstrap menu integration with laminas-mvc

## Pre-Requisites
You need to have bootstrap css and js files included in your layout.phtml. If not, you can still be able to see the generated html.

## Introduction

This package generates a bootstrap menu based on the configuration given in your application. 
Which should be compatible with Laminas-Navigation. Because this package extends Laminas-Navigation therefore the configuration 
should match with Laminas-Navigation. This package came into existence with the help of [Frank Brückner](https://discourse.laminas.dev/u/froschdesign).
Thanks for the help Frank Brückner. My first contribution to Laminas MVC. 

## Installation using Composer
```bash
composer require altamash80/laminas-mvc-bootstrap-menu
```

## Registering the modules in your application

```php
<?php
return [
    'modules' => [
        // ...
        'Laminas\Navigation', // <-- Add this line if not present
        'LRPHPT', // <-- Add this line in your root_path/config/modules.config.php file
        'Application',
    ],
];
```

## Menu Container Array
```php
<?php

// Application/config/module.config.php
return [

    // ...
    'navigation' => [
      'default' => [
        'home' => [
           'label' => 'Home',
           'route' => 'home',
           'resource' => 'home',
        ],
        'category' => [
          'label' => 'Category',
          'uri' => '#',
          'pages' => [
            'php' => [
              'label' => 'PHP',
              'uri' => 'https://www.php.net',
            ],
            'laminas' => [
              'label' => 'Laminas',
              'uri' => 'https://getlaminas.org/',
              'resource' => 'lmcuser',
            ],
            'devider' => [
               'label' => '--devider--', // most important
               'uri' => '#',
            ],
            'magento' => [
              'label' => 'Magento',
              'uri' => 'https://business.adobe.com/products/magento/magento-commerce.html',
            ],
          ],
        ]
      ]
    ],
];

```

## Usage in MVC View

```php

<?=$this->navigation('default')
                    ->bootstrapMenu()
                    ->setUlClass('navbar-nav')
                    // Optional setting to use with LmcRbac route guard.
                    ->setAuthorizationService($this->LmcRbacAuthorizationServiceHelper())
                    ; ?>
```
## Below is a list of some tutorials I've written.
1. [Installation](https://www.lrphpt.com/blog/post/tutorial-installation-of-laminas-mvc-and-digesting-it/13)
2. [Setting up LmcUser in Laminas MVC with Doctrine](https://www.lrphpt.com/blog/post/tutorial-2-to-use-lmcuser-in-laminas-mvc-a-user-creation-module-with-doctrine/14)
3. [Setting up LmcRbacMVC with LmcUser](https://www.lrphpt.com/blog/post/tutorial-3-usage-of-lmcrbacmvc-with-lmcuserdoctrine/15)
 
