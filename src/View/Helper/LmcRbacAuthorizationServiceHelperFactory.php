<?php 

namespace LRPHPT\View\Helper;

use Laminas\ServiceManager\Factory\FactoryInterface;
use LmcRbacMvc\Service\AuthorizationService;
use Psr\Container\ContainerInterface;
use LmcRbacMvc\Service\RoleService;
use LmcRbacMvc\Options\ModuleOptions;

class LmcRbacAuthorizationServiceHelperFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null){
        $config = $container->get('Config');
        $config = $config['lmc_rbac']['guards']['LmcRbacMvc\Guard\RouteGuard'];
        return new LmcRbacAuthorizationService($container->get(RoleService::class), $config);
    }
}