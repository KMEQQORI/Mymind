<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $scheme = $context->getScheme();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }


        // home
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'App\\Controller\\CategoriesController::home',  '_route' => 'home',);
            if (substr($pathinfo, -1) !== '/') {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'home'));
            }

            return $ret;
        }

        if (0 === strpos($pathinfo, '/Categorie')) {
            // GenCategories
            if ('/Categorie/Generate' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\CategoriesController::Generate_Categories',  '_route' => 'GenCategories',);
            }

            // AllCategories
            if (preg_match('#^/Categorie/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'AllCategories')), array (  '_controller' => 'App\\Controller\\CategoriesController::showCategorie',));
            }

        }

        // comments
        if ('/comments' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\CommentsController::index',  '_route' => 'comments',);
        }

        if (0 === strpos($pathinfo, '/Tache')) {
            // CommentTache
            if (preg_match('#^/Tache/(?P<id>[^/]++)/Comment/(?P<commentaire>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'CommentTache')), array (  '_controller' => 'App\\Controller\\CommentsController::commentTache',));
            }

            if (0 === strpos($pathinfo, '/Taches')) {
                // GenTaches
                if ('/Taches/Generate' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\TachesController::Generate_Categories',  '_route' => 'GenTaches',);
                }

                // AllTaches
                if ('/Taches' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\TachesController::showAllTaches',  '_route' => 'AllTaches',);
                }

                // AllDoneTaches
                if ('/Taches/Done' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\TachesController::showAllDoneTaches',  '_route' => 'AllDoneTaches',);
                }

                // AllInProgressTaches
                if ('/Taches/InProgress' === $pathinfo) {
                    return array (  '_controller' => 'App\\Controller\\TachesController::showAllInProgressTaches',  '_route' => 'AllInProgressTaches',);
                }

            }

            // ShowTache
            if (preg_match('#^/Tache/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ShowTache')), array (  '_controller' => 'App\\Controller\\TachesController::showTache',));
            }

            // DoneTache
            if (0 === strpos($pathinfo, '/Tache/Done') && preg_match('#^/Tache/Done/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'DoneTache')), array (  '_controller' => 'App\\Controller\\TachesController::doneTache',));
            }

            // UnDoneTache
            if (0 === strpos($pathinfo, '/Tache/UnDone') && preg_match('#^/Tache/UnDone/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'UnDoneTache')), array (  '_controller' => 'App\\Controller\\TachesController::unDoneTache',));
            }

            if (0 === strpos($pathinfo, '/Taches')) {
                // TachesOfGOal
                if (0 === strpos($pathinfo, '/Taches/Goal') && preg_match('#^/Taches/Goal/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'TachesOfGOal')), array (  '_controller' => 'App\\Controller\\TachesController::showTachesOfGoal',));
                }

                // TachesOfCategorie
                if (0 === strpos($pathinfo, '/Taches/Categorie') && preg_match('#^/Taches/Categorie/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'TachesOfCategorie')), array (  '_controller' => 'App\\Controller\\TachesController::showTachesOfCategorie',));
                }

                // app_taches_addnewtache
                if ('/Taches/Add' === $pathinfo) {
                    if ('POST' !== $canonicalMethod) {
                        $allow[] = 'POST';
                        goto not_app_taches_addnewtache;
                    }

                    return array (  '_controller' => 'App\\Controller\\TachesController::AddNewTache',  '_route' => 'app_taches_addnewtache',);
                }
                not_app_taches_addnewtache:

            }

        }

        elseif (0 === strpos($pathinfo, '/Goal')) {
            // AllGoals
            if ('/Goals' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\GoalsController::showAllGoals',  '_route' => 'AllGoals',);
            }

            // AllGoal
            if (preg_match('#^/Goal/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'AllGoal')), array (  '_controller' => 'App\\Controller\\GoalsController::showGoal',));
            }

            // GoalsOfCategorie
            if (0 === strpos($pathinfo, '/Goals/Categorie') && preg_match('#^/Goals/Categorie/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'GoalsOfCategorie')), array (  '_controller' => 'App\\Controller\\GoalsController::showGoalsOfCategorie',));
            }

        }

        // _twig_error_test
        if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
