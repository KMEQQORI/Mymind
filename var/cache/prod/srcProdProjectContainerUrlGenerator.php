<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcProdProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\CategoriesController::home',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'GenCategories' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\CategoriesController::Generate_Categories',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Categorie/Generate',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllCategories' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\CategoriesController::showCategorie',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Categorie',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllGoals' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\GoalsController::showAllGoals',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Goals',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllGoal' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\GoalsController::showGoal',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Goal',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'GoalsOfCategorie' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\GoalsController::showGoalsOfCategorie',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Goals/Categorie',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'GenTaches' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::Generate_Categories',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches/Generate',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllTaches' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showAllTaches',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllFinishedTaches' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showAllFinishedTaches',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches/Finished',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ShowTache' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Tache',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'TachesOfGOal' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showTachesOfGoal',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Taches/Goal',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'TachesOfCategorie' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showTachesOfCategorie',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Taches/Categorie',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_taches_addnewtache' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::AddNewTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches/Add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
