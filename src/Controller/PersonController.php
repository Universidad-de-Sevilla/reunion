<?php

namespace US\Reunion\Controller;

use US\Reunion\Entity\Person;
use US\Reunion\Repository\PersonRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonController
{
    /**
     * @var personRepository
     */
    protected $personRepository;

    /**
     * @param PersonRepository $personRepository
     */
    function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * function indexAction
     * @param Application $app
     * @return Response
     */
    public function indexAction(Application $app)
    {
        $criteria = array();
        $orderBy = array('lastName' => 'ASC');
        $total = $this->personRepository->count();
        if ($total > 0) {
            $people = $this->personRepository->findBy($criteria, $orderBy);
        } else {
            $people = null;
        }

        return $app['twig']->render('person/people_index.html.twig', array(
                'people' => $people,
                'url' => $app['url_generator']->generate('people'),
        ));
    }

    /**
     * @param Application $app
     * @param $id
     * @return Response/RedirectResponse
     */
    public function viewAction(Application $app, $id)
    {
        /** @var Person $person */
        $person = $this->personRepository->find($id);
        if ($person) {
            $response = $app['twig']->render('person/person_view.html.twig', array(
                    'person' => $person
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
        return $app->redirect($app['url_generator']->generate('people'));
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return RedirectResponse
     */
    public function saveAction(Request $request, Application $app)
    {
        $data['email'] = $request->get('email');
        $data['firstName'] = $request->get('firstName');
        $data['lastName'] = $request->get('lastName');
        $data['phoneNumber'] = $request->get('phoneNumber');
        if ($data['id'] = $request->get('id')) {
            /** @var Person $person */
            $person = $this->personRepository->find($data['id']);
            $person->setFirstName($data['firstName']);
            $person->setLastName($data['lastName']);
            $person->setEmail($data['email']);
            $person->setPhoneNumber($data['phoneNumber']);
            $message = "Person data has been updated"; // in case of success
            $redirect = $app['url_generator']->generate('person_edit', $data); // in case of failure
        } else {
            $person = new Person($data);
            $message = "Person has been created"; // in case of success
            $redirect = $app['url_generator']->generate('person_add'); // in case of failure
        }
        $this->personRepository->save($person);

        // Valida los datos
        // http://silex.sensiolabs.org/doc/providers/validator.html
        /** @var array(ConstraintViolation) $errors */
        $errors = $app['validator']->validate($person);

        // Check for failure or success
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $message = $error->getPropertyPath() . ' ' . $error->getMessage();
                $app['session']->getFlashBag()->add('danger', $message);
            }
        } else {
            $this->personRepository->save($person);
            $app['session']->getFlashBag()->add('success', $message);
            $redirect = $app['url_generator']->generate('person_view', array('id' => $person->getId()));
        }

        return $app->redirect($redirect);
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function addAction(Application $app)
    {
        return $app['twig']->render('person/person_add.html.twig');
    }

    /**
     * @param Application $app
     * @param int $id
     * @return Response/ResponseRedirect
     */
    public function editAction(Application $app, $id)
    {
        /** @var Person $person */
        $person = $this->personRepository->find($id);
        if ($person) {
            $response = $app['twig']->render('person/person_edit.html.twig', array(
                    'person' => $person));
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
        /** @var Person $person */
        $person = $this->personRepository->find($id);
        if ($person) {
            $this->personRepository->delete($person);
            $response = $app->redirect($app['url_generator']->generate('people'));
        } else {
            $response = $this->redirectOnInvalidId($app, $id);
        }

        return $response;
    }

}