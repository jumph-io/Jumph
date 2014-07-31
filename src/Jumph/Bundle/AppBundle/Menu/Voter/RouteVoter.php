<?php
namespace Jumph\Bundle\AppBundle\Menu\Voter;

use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\Voter\RouteVoter as KnpRouteVoter;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RouteVoter extends KnpRouteVoter
{
    /**
     * @var Request $request
     */
    private $request;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->request = $container->get('request');
    }

    /**
     * match item to route
     *
     * @param ItemInterface $item
     *
     * @return null|boolean true if the item is current, null if not
     */
    public function matchItem(ItemInterface $item)
    {
        if (null === $this->request) {
            return null;
        }

        $route = $this->request->attributes->get('_route');
        if (null === $route) {
            return null;
        }

        $routes = (array) $item->getExtra('routes', array());

        foreach ($routes as $itemRoute) {
            if (isset($itemRoute['route'])) {
                if (is_string($itemRoute['route'])) {
                    $itemRoute = array(
                        'route' => $itemRoute['route'],
                        'pattern' => '/'.$itemRoute['route'].'/'
                    );

                    if ($this->isMatchingRoute($itemRoute)) {
                        return true;
                    }
                }
            }
        }

        return null;
    }

    /**
     * Check if we can match a route
     *
     * @param array $itemRoute An array with the route and the route pattern
     *
     * @return boolean true if a match was found, false if not
     */
    private function isMatchingRoute(array $itemRoute)
    {
        $route = $this->request->attributes->get('_route');
        $route = $this->getBaseRoute($route);

        if (!empty($itemRoute['route'])) {
            if ($this->getBaseRoute($itemRoute['route']) === $route) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the base of the route
     *
     * @param $route
     * @return string
     */
    private function getBaseRoute($route)
    {
        $chunks = explode("_", $route);
        return implode("_", array_slice($chunks, 0, 2));
    }
}
