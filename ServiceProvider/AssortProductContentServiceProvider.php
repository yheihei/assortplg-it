<?php
namespace Plugin\AssortContent\ServiceProvider;

use Eccube\Application;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class AssortProductContentServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        //Repository
        $app['assort_content.repository.assort_product_content'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\AssortContent\Entity\AssortProductContent');
        });
    }

    public function boot(BaseApplication $app)
    {
    }
}