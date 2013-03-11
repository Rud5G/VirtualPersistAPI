<?php

namespace VirtualPersistAPI\VirtualPersistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use VirtualPersistAPI\VirtualPersistBundle\Entity\User;
use VirtualPersistAPI\VirtualPersistBundle\Entity\Record;

/**
 * Our prefix:
 * @Route("/api")
 */
class APIController extends Controller
{
    /**
     * @Route("/{uuid}/{category}/{key}", requirements={"uuid" = "[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}"})
     * @Method({"GET"})
     */
    public function getAction($uuid, $category, $key)
    {
      $doctrine = $this->getDoctrine();
      $record = $doctrine
        ->getRepository('VirtualPersistBundle:Record')
        ->findOneByUUIDCategoryKey($uuid, $category, $key);

      // Did we get a record?
      if ($record) {
        $user = $doctrine
          ->getRepository('VirtualPersistBundle:User')
          ->findOneByUuid($uuid);
        if ($user) { // if($user->has_authentication)
          $tellme = 'uuid: ' . $uuid . ' category: ' . $category . ' key: ' . $key;
          if ($record) $tellme = $record->getData();

          $response = new Response();
          $response->setContent($tellme);
          $request = Request::createFromGlobals();
          $response->prepare($request);
          return $response;
        }
      }

      return new Response ('404: No Such Item.', 404);
    }

    /**
     * @Route("/{uuid}/{category}/{key}", requirements={"uuid" = "[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}"})
     * @Method({"DELETE"})
     */
    public function deleteAction($uuid, $category, $key)
    {
      $doctrine = $this->getDoctrine();
      $record = $doctrine
        ->getRepository('VirtualPersistBundle:Record')
        ->findOneByUUIDCategoryKey($uuid, $category, $key);

      // Did we get a record?
      if ($record) {
        $user = $doctrine
          ->getRepository('VirtualPersistBundle:User')
          ->findOneByUuid($uuid);
        if ($user) { // if($user->has_authentication)
          // Do the delete.
          $entityManager = $doctrine->getEntityManager();
          $entityManager->remove($record);
          $entityManager->flush();

          // Tell the user.
          $response = new Response('Item deleted.', 200);
          $request = Request::createFromGlobals();
          $response->prepare($request);
          return $response;
        }
      }

      return new Response ('No Such Item.', 404, array('content-type' => 'text/plain'));
    }

    /**
     * @Route("/categories/{uuid}", requirements={"uuid" = "[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}"})
     * @Method({"GET"})
     */
    public function categoriesAction($uuid) {
      $doctrine = $this->getDoctrine();
      $categories = $doctrine
        ->getRepository('VirtualPersistBundle:Record')
        ->categoriesForUUID($uuid);

      // Did we get an answer?
      if ($categories) {
        $user = $doctrine
          ->getRepository('VirtualPersistBundle:User')
          ->findOneByUuid($uuid);
        if ($user) { // if($user->has_authentication)
          // for now we just return json.
          return new Response(
            json_encode($categories),
            200,
            array('content-type' => 'application/json')
          );
        }
      }

      return new Response ('No Such User.', 404, array('content-type' => 'text/plain'));
    }

    /**
     * @Route("/keys/{uuid}/{category}", requirements={"uuid" = "[a-fA-F0-9]{8}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{4}-[a-fA-F0-9]{12}"})
     * @Method({"GET"})
     */
    public function keysAction($uuid, $category) {
      $doctrine = $this->getDoctrine();
      $keys = $doctrine
        ->getRepository('VirtualPersistBundle:Record')
        ->keysForUUIDCategory($uuid, $category);

      // Did we get an answer?
      if ($keys) {
        $user = $doctrine
          ->getRepository('VirtualPersistBundle:User')
          ->findOneByUuid($uuid);
        if ($user) { // if($user->has_authentication)
          // for now we just return json.
          return new Response(
            json_encode($keys),
            200,
            array('content-type' => 'application/json')
          );
        }
      }

      return new Response ('No Such User.', 404, array('content-type' => 'text/plain'));
    }

}

