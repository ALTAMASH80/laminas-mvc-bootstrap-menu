<?php

namespace LRPHPT\View\Helper;

use Laminas\View\Helper\Navigation as NavigationHelper;
use Laminas\View\Helper\Navigation\Menu;
use Psr\Container\ContainerInterface;
use LRPHPT\View\Helper\Navigation\BootstrapSimpleMenu as lrphptMenu;

class NavigationHelperDelegator
{
    public function __invoke(
        ContainerInterface $container,
        string $name,
        callable $callback,
        array $options = null
        ): NavigationHelper {
            /** @var NavigationHelper $helper */
            $helper = $callback();
            
            // Add new helper
            $helper->getPluginManager()->setInvokableClass(
                lrphptMenu::class,
                lrphptMenu::class
            );
            $helper->getPluginManager()->setAlias(
                'bootstrapMenu',
                lrphptMenu::class
            );
            
            return $helper;
    }
}
