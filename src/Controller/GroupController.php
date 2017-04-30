<?php

namespace US\Reunion\Controller;

use US\Reunion\Entity\Group;
use US\Reunion\Repository\GroupRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class GroupController
{
    /**
     * @var groupRepository
     */
    protected $groupRepository;

    /**
     * @param GroupRepository $groupRepository
     */
    function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function indexAction(Application $app)
    {
        $criteria = array();
        $orderBy = array('name' => 'ASC');
        $total = $this->groupRepository->count();
        if ($total > 0) {
            $groups = $this->groupRepository->findBy($criteria, $orderBy);
        } else {
            $groups = null;
        }

        return $app['twig']->render('group/groups_index.html.twig', array(
                'groups' => $groups,
                'url' => $app['url_generator']->generate('groups'),
        ));
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function adminAction(Application $app)
    {
        $criteria = array();
        $orderBy = array('name' => 'ASC');
        $total = $this->groupRepository->count();
        if ($total > 0) {
            $groups = $this->groupRepository->findBy($criteria, $orderBy);
        } else {
            $groups = null;
        }

        return $app['twig']->render('group/groups_admin.html.twig', array(
                'groups' => $groups,
                'url' => $app['url_generator']->generate('groups_admin'),
        ));
    }


    /**
     * @param Application $app
     * @param $id
     * @return Response/RedirectResponse
     */
    public function viewAction(Application $app, $id)
    {
        /** @var Group $group */
        $group = $this->groupRepository->find($id);
        if ($group) {
            $response = $app['twig']->render('group/group_view.html.twig', array(
                    'group' => $group
            ));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

    /**
     * @param Application $app
     * @param $id
     * @return RedirectResponse
     */
    private function redirectOnInvalidId(Application $app, $id)
    {
        $message = "There is no record for ID " . $id;
        $app['session']->getFlashBag()->add('danger', $message);
        return $app->redirect($app['url_generator']->generate('groups_admin'));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     */
    public function saveAction(Request $request, Application $app)
    {
        $data['name'] = $request->get('name');
        if ($data['id'] = $request->get('id')) {
            /** @var Group $group */
            $group = $this->groupRepository->find($data['id']);
            $group->setName($data['name']);
            $message = "Group has been updated"; // in case of success
            $redirect = $app['url_generator']->generate('group_edit', $data); // in case of failure
        } else {
            $group = new Group($data);
            $message = "Group has been created"; // in case of success
            $redirect = $app['url_generator']->generate('group_add'); // in case of failure
        }
        $this->groupRepository->save($group);

        // Valida los datos
        // http://silex.sensiolabs.org/doc/providers/validator.html
        /** @var array(ConstraintViolation) $errors */
        $errors = $app['validator']->validate($group);

        // Check for failure or success
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $message = $error->getPropertyPath() . ' ' . $error->getMessage();
                $app['session']->getFlashBag()->add('danger', $message);
            }
        } else {
            $this->groupRepository->save($group);
            $app['session']->getFlashBag()->add('success', $message);
            $redirect = $app['url_generator']->generate('groups_admin');
        }

        return $app->redirect($redirect);
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function addAction(Application $app)
    {
        return $app['twig']->render('group/group_add.html.twig');
    }

    /**
     * @param Application $app
     * @param int $id
     * @return Response/ResponseRedirect
     */
    public function editAction(Application $app, $id)
    {
        /** @var Group $group */
        $group = $this->groupRepository->find($id);
        if ($group) {
            $response = $app['twig']->render('group/group_edit.html.twig', array(
                    'group' => $group));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, Application $app)
    {
        $id = $request->get('id');
        /** @var Group $group */
        $group = $this->groupRepository->find($id);
        if ($group) {
            $this->groupRepository->delete($group);
            $response = $app->redirect($app['url_generator']->generate('groups'));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

}