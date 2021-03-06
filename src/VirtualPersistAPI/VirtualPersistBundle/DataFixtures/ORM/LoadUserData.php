<?php

/**
 * @file
 * Fixture data for testing User objects.
 */

namespace VirtualPersisAPI\VirtualPersistBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VirtualPersistAPI\VirtualPersistBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

  public function userFixtureDataSource() {
    $data = array(
      array(
        'uuid' => '6CA62CA0-5651-40AB-9EFD-43661889224A',
        'password' => 'foo',
        'username' => 'you',
        'email' => 'foo@foo.com',
      ),
      array(
        'uuid' => 'FF56D32A-DB4D-4E15-8C4C-29295118A61D',
        'password' => 'foo',
        'username' => 'me',
        'email' => 'foo2@foo.com',
      ),
    );
    return $data;
  }

  /**
   * {@inheritDoc}
   */
  public function load(ObjectManager $manager)
  {
    $data = $this->userFixtureDataSource();
    // Have to keep a reference to all the user objects
    // or else they can't be flushed all at once.
    $users = array();
    foreach ($data as $item) {
      $user = new User();
      $user->setUuid($item['uuid'])
        ->setPassword($item['password'])
        ->setUsername($item['username'])
        ->setEmail($item['email']);
      $this->addReference($user->getUuid(), $user);
      $users[] = $user;
      $manager->persist($user);
    }
    $manager->flush();
  }
  
  public function getOrder() {
    return 1;
  }
}
