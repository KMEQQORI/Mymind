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
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        // home
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'App\\Controller\\CategoriesController::home',  '_route' => 'home',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_home;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'home'));
            }

            return $ret;
        }
        not_home:

        if (0 === strpos($pathinfo, '/Categorie')) {
            // GenCategories
            if ('/Categorie/Generate' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\CategoriesController::Generate_Categories',  '_route' => 'GenCategories',);
            }

            // AllCategories
            if (preg_match('#^/Categorie/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'AllCategories')), array (  '_controller' => 'App\\Controller\\CategoriesController::showCategorie',));
            }

        }

        // comments
        if ('/comments' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\CommentsController::index',  '_route' => 'comments',);
        }

        if (0 === strpos($pathinfo, '/Tache')) {
            // CommentTache
            if (preg_match('#^/Tache/(?P<id>[^/]++)/Comment/(?P<commentaire>[^/]++)$#sD', $pathinfo, $matches)) {
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
            if (preg_match('#^/Tache/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ShowTache')), array (  '_controller' => 'App\\Controller\\TachesController::showTache',));
            }

            // DoneTache
            if (0 === strpos($pathinfo, '/Tache/Done') && preg_match('#^/Tache/Done/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'DoneTache')), array (  '_controller' => 'App\\Controller\\TachesController::doneTache',));
            }

            // WipTache
            if (0 === strpos($pathinfo, '/Tache/Wip') && preg_match('#^/Tache/Wip/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'WipTache')), array (  '_controller' => 'App\\Controller\\TachesController::WipToggleTache',));
            }

            // ConfTache
            if (0 === strpos($pathinfo, '/Tache/Conf') && preg_match('#^/Tache/Conf/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ConfTache')), array (  '_controller' => 'App\\Controller\\TachesController::ConfTache',));
            }

            // CancelTache
            if (0 === strpos($pathinfo, '/Tache/Cancel') && preg_match('#^/Tache/Cancel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'CancelTache')), array (  '_controller' => 'App\\Controller\\TachesController::CancelTache',));
            }

            // UnDoneTache
            if (0 === strpos($pathinfo, '/Tache/UnDone') && preg_match('#^/Tache/UnDone/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'UnDoneTache')), array (  '_controller' => 'App\\Controller\\TachesController::unDoneTache',));
            }

            if (0 === strpos($pathinfo, '/Taches')) {
                // TachesOfGOal
                if (0 === strpos($pathinfo, '/Taches/Goal') && preg_match('#^/Taches/Goal/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'TachesOfGOal')), array (  '_controller' => 'App\\Controller\\TachesController::showTachesOfGoal',));
                }

                // TachesOfCategorie
                if (0 === strpos($pathinfo, '/Taches/Categorie') && preg_match('#^/Taches/Categorie/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'TachesOfCategorie')), array (  '_controller' => 'App\\Controller\\TachesController::showTachesOfCategorie',));
                }

                // app_taches_addnewtache
                if ('/Taches/Add' === $pathinfo) {
                    $ret = array (  '_controller' => 'App\\Controller\\TachesController::AddNewTache',  '_route' => 'app_taches_addnewtache',);
                    if (!in_array($requestMethod, array('POST'))) {
                        $allow = array_merge($allow, array('POST'));
                        goto not_app_taches_addnewtache;
                    }

                    return $ret;
                }
                not_app_taches_addnewtache:

                // app_taches_duplicatetache
                if (0 === strpos($pathinfo, '/Taches/Duplicate') && preg_match('#^/Taches/Duplicate/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'app_taches_duplicatetache')), array (  '_controller' => 'App\\Controller\\TachesController::DuplicateTache',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_taches_duplicatetache;
                    }

                    return $ret;
                }
                not_app_taches_duplicatetache:

                // app_taches_deletetache
                if (0 === strpos($pathinfo, '/Taches/Delete') && preg_match('#^/Taches/Delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'app_taches_deletetache')), array (  '_controller' => 'App\\Controller\\TachesController::DeleteTache',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_taches_deletetache;
                    }

                    return $ret;
                }
                not_app_taches_deletetache:

            }

        }

        elseif (0 === strpos($pathinfo, '/Goal')) {
            // AllGoals
            if ('/Goals' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\GoalsController::showAllGoals',  '_route' => 'AllGoals',);
            }

            // AllGoal
            if (preg_match('#^/Goal/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'AllGoal')), array (  '_controller' => 'App\\Controller\\GoalsController::showGoal',));
            }

            // GoalsOfCategorie
            if (0 === strpos($pathinfo, '/Goals/Categorie') && preg_match('#^/Goals/Categorie/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'GoalsOfCategorie')), array (  '_controller' => 'App\\Controller\\GoalsController::showGoalsOfCategorie',));
            }

            // app_goals_addnewgoal
            if ('/Goals/Add' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\GoalsController::AddNewGoal',  '_route' => 'app_goals_addnewgoal',);
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_app_goals_addnewgoal;
                }

                return $ret;
            }
            not_app_goals_addnewgoal:

            // app_goals_deletegoal
            if (0 === strpos($pathinfo, '/Goal/Delete') && preg_match('#^/Goal/Delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'app_goals_deletegoal')), array (  '_controller' => 'App\\Controller\\GoalsController::DeleteGoal',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_app_goals_deletegoal;
                }

                return $ret;
            }
            not_app_goals_deletegoal:

            // DoneGoal
            if (0 === strpos($pathinfo, '/Goal/Done') && preg_match('#^/Goal/Done/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'DoneGoal')), array (  '_controller' => 'App\\Controller\\TachesController::DoneGoal',));
            }

            // UnDoneGoal
            if (0 === strpos($pathinfo, '/Goal/UnDone') && preg_match('#^/Goal/UnDone/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'UnDoneGoal')), array (  '_controller' => 'App\\Controller\\TachesController::UnDoneGoal',));
            }

            // CancelGoal
            if (0 === strpos($pathinfo, '/Goal/Cancel') && preg_match('#^/Goal/Cancel/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'CancelGoal')), array (  '_controller' => 'App\\Controller\\TachesController::CancelGoal',));
            }

        }

        // _twig_error_test
        if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
