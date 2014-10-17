<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Lexik\Bundle\FormFilterBundle\LexikFormFilterBundle(),
            new Jumph\Bundle\IssueBundle\JumphIssueBundle(),
            new Jumph\Bundle\TimeTrackerBundle\JumphTimeTrackerBundle(),
            new Jumph\Bundle\ProjectBundle\JumphProjectBundle(),
            new Jumph\Bundle\EmailBundle\JumphEmailBundle(),
            new Jumph\Bundle\QuotationBundle\JumphQuotationBundle(),
            new Jumph\Bundle\UserBundle\JumphUserBundle(),
            new Jumph\Bundle\DashboardBundle\JumphDashboardBundle(),
            new Jumph\Bundle\AppBundle\JumphAppBundle(),
            new Jumph\Bundle\ClientBundle\JumphClientBundle(),
            new Jumph\Bundle\CalendarBundle\JumphCalendarBundle(),
            new Jumph\Bundle\InstallerBundle\JumphInstallerBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Webfactory\Bundle\ExceptionsBundle\WebfactoryExceptionsBundle();
        }

        if (in_array($this->getEnvironment(), array('test'))) {
            $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
            $bundles[] = new Liip\FunctionalTestBundle\LiipFunctionalTestBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    public function getCacheDir()
    {
        if (in_array($this->environment, array('dev', 'test'))) {
            return sys_get_temp_dir().'/jumph/cache/' .  $this->environment;
        }

        return parent::getCacheDir();
    }

    public function getLogDir()
    {
        if (in_array($this->environment, array('dev', 'test'))) {
            return sys_get_temp_dir().'/jumph/logs';
        }

        return parent::getLogDir();
    }
}
