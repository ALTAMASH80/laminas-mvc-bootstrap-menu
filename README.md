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
## HcOffCanvas Menu


```php
<?php

// Application/config/module.config.php
use LRPHPT\Navigation\Page as LrphptPage;

return [

    // ...
    'navigation' => [
      'default' => [
        'home' => [
           'label' => 'Home',
           'route' => 'home',
           'liClass' => 'collections',
           'type' => LrphptPage\MvcPage::class,
        ],
        'cryptocurrency' => [
          'label' => 'Cryptocurrency',
          'type' => LrphptPage\UriPage::class,
          'liClass' => 'cryptocurrency',
          'uri' => 'https://www.google.com/search?q=Crypto',
          'pages' => [
            'bitcoin' => [
              'label' => 'Bitcoin',
              'uri' => 'https://www.php.net',
              'type' => LrphptPage\UriPage::class,
            ],
            'ethereum' => [
              'label' => 'Ethereum',
              'uri' => 'https://getlaminas.org/',
              'type' => LrphptPage\UriPage::class,
            ],
          ],
        ],
        'devices' => [
          'label' => 'Devices',
          'type' => LrphptPage\UriPage::class,
          'liClass' => 'devices',
          'uri' => '#',
          'type' => LrphptPage\UriPage::class,
          'pages' => [
            'mobile' => [
              'label' => 'Mobile Phones',
              'uri' => '#',
              'liClass' => 'mobile',
              'type' => LrphptPage\UriPage::class,
              'pages' => [
                'mobile1' => [
                  'label' => 'Super Smart Phone',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
                'mobile2' => [
                  'label' => 'Thin Magic Mobile',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
                'mobile3' => [
                  'label' => 'Performance Crusher',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
              ],
            ],
            'television' => [
              'label' => 'Television',
              'uri' => '#',
              'liClass' => 'television',
              'type' => LrphptPage\UriPage::class,
              'pages' => [
                'television1' => [
                  'label' => 'Flat Superscreen',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
                'television2' => [
                  'label' => 'Gigantic LED',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
                'television3' => [
                  'label' => '3D Experience',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
              ],
            ],
            'camera' => [
              'label' => 'Cameras',
              'uri' => '#',
              'liClass' => 'camera',
              'type' => LrphptPage\UriPage::class,
              'pages' => [
                'camera1' => [
                  'label' => 'Smart Shot',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
                'camera2' => [
                  'label' => 'Power Shooter',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
                'camera3' => [
                  'label' => 'Easy Photo Maker',
                  'uri' => '#',
                  'type' => LrphptPage\UriPage::class,
                ],
              ],
            ],
          ],
        ],
        'magazines' => [
          'label' => 'Magazines',
          'uri' => '#',
          'liClass' => 'magazines',
          'type' => LrphptPage\UriPage::class,
          'pages' => [
            'magazines1' => [
              'label' => 'National Geographic',
              'uri' => '#',
              'type' => LrphptPage\UriPage::class,
            ],
            'magazines2' => [
              'label' => 'Scientific American',
              'uri' => '#',
              'type' => LrphptPage\UriPage::class,
            ],
            'magazines3' => [
              'label' => 'The Spectator',
              'uri' => '#',
              'type' => LrphptPage\UriPage::class,
            ],
          ],
        ],
      ]
    ],
];

```

## Usage in MVC View

```php

<?=$this->navigation('default')
                    ->hcOffCanvasMenu()
                    ->setUlClass('first-nav')
                    // Optional setting to use with LmcRbac route guard.
                    ->setAuthorizationService($this->LmcRbacAuthorizationServiceHelper())
                    ; ?>
```
 ![hcoffcanvas](https://github.com/ALTAMASH80/laminas-mvc-bootstrap-menu/assets/3577323/420d7c04-5b1b-4f5f-8654-b7a7312c558b)
