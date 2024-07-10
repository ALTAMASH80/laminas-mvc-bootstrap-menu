<?php
declare(strict_types=1);

namespace LRPHPT\View\Helper;

use Laminas\View\Helper\Navigation as NavigationHelper;
use Laminas\View\Helper\Navigation\Menu;
use Psr\Container\ContainerInterface;
use LRPHPT\View\Helper\Navigation\BootstrapSimpleMenu as lrphptMenu;
use LRPHPT\View\Helper\Navigation\HcOffCanvasMenu;

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

            $helper->getPluginManager()->setAlias(
                'menu',
                Menu::class
            );
            // Add new helper
            $helper->getPluginManager()->setInvokableClass(
                lrphptMenu::class,
                lrphptMenu::class
            );
            $helper->getPluginManager()->setAlias(
                'bootstrapMenu',
                lrphptMenu::class
            );

            $helper->getPluginManager()->setInvokableClass(
                HcOffCanvasMenu::class,
                HcOffCanvasMenu::class
            );
            $helper->getPluginManager()->setAlias(
                'hcOffCanvasMenu',
                HcOffCanvasMenu::class
            );

            return $helper;
    }
}
