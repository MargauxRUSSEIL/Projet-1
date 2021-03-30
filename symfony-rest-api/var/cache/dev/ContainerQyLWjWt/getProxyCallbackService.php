<?php

namespace ContainerQyLWjWt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProxyCallbackService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'EcPhp\CasBundle\Controller\ProxyCallback' shared autowired service.
     *
     * @return \EcPhp\CasBundle\Controller\ProxyCallback
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ecphp/cas-bundle/src/Controller/ProxyCallback.php';

        return $container->services['EcPhp\\CasBundle\\Controller\\ProxyCallback'] = new \EcPhp\CasBundle\Controller\ProxyCallback();
    }
}