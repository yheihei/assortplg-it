<?php
namespace Plugin\AssortContent\ServiceProvider;

use Eccube\Application;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class AssortContentServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        //Repository
        $app['assort_content.repository.assort_content'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\AssortContent\Entity\AssortContent');
        });
    }

    public function boot(BaseApplication $app)
    {
    }
}