<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
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
        'comments' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\CommentsController::index',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/comments',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'CommentTache' => array (  0 =>   array (    0 => 'id',    1 => 'commentaire',  ),  1 =>   array (    '_controller' => 'App\\Controller\\CommentsController::commentTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'commentaire',    ),    1 =>     array (      0 => 'text',      1 => '/Comment',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    3 =>     array (      0 => 'text',      1 => '/Tache',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllGoals' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\GoalsController::showAllGoals',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Goals',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllGoal' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\GoalsController::showGoal',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Goal',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'GoalsOfCategorie' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\GoalsController::showGoalsOfCategorie',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Goals/Categorie',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_goals_addnewgoal' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\GoalsController::AddNewGoal',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Goals/Add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'GenTaches' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::Generate_Categories',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches/Generate',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllTaches' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showAllTaches',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllDoneTaches' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showAllDoneTaches',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches/Done',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'AllInProgressTaches' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showAllInProgressTaches',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches/InProgress',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ShowTache' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Tache',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'DoneTache' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::doneTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Tache/Done',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'ArchiveTache' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::ArchiveTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Tache/Archive',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'UnDoneTache' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::unDoneTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Tache/UnDone',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'TachesOfGOal' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showTachesOfGoal',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Taches/Goal',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'TachesOfCategorie' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::showTachesOfCategorie',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Taches/Categorie',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_taches_addnewtache' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::AddNewTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/Taches/Add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_taches_deletetache' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\TachesController::DeleteTache',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/Taches/Delete',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_twig_error_test' => array (  0 =>   array (    0 => 'code',    1 => '_format',  ),  1 =>   array (    '_controller' => 'twig.controller.preview_error:previewErrorPageAction',    '_format' => 'html',  ),  2 =>   array (    'code' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'code',    ),    2 =>     array (      0 => 'text',      1 => '/_error',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
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
