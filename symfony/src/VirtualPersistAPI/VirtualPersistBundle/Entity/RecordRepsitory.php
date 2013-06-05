<?php

namespace VirtualPersistAPI\VirtualPersistBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * RecordRepsitory
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RecordRepsitory extends EntityRepository {

  // NOTE: This method requires the existence of a view called
  // RecordForActiveUser
// ## Create the view
// ##
// drop view if exists RecordForActiveUser;
// create view RecordForActiveUser as
// 	select u.uuid, u.id as 'uid', u.is_active, r.id, r.category, r.aKey, r.data
// 	from `User` as u
// 	left join `Record` as r
// 	on u.id = r.owner
// 	where u.is_active != 0;
  public function findOneByUuidCategoryKey_View($uuid, $category, $key) { 
    $rsm = new ResultSetMapping;
    $rsm->addEntityResult('VirtualPersistBundle:Record', 'r');
    $rsm->addFieldResult('r', 'id', 'id');
    $rsm->addFieldResult('r', 'category', 'category');
    $rsm->addFieldResult('r', 'data', 'data');
    $rsm->addFieldResult('r', 'key', 'aKey');

    $query = $this->getEntityManager()->createNativeQuery(
      'SELECT id, category, aKey, data FROM RecordForActiveUser WHERE uuid = ? AND category = ? AND aKey = ? LIMIT 1',
      $rsm
    );
    $query->setParameter(1, $uuid);
    $query->setParameter(2, $category);
    $query->setParameter(3, $key);

    $record = $query->getResult();
    return reset($record);
  }

  public function findOneByUserCategoryKey(User $user, $category, $key) {
    $query = $this->getEntityManager()
      ->createQuery('
        SELECT r FROM VirtualPersistBundle:Record r
        WHERE r.owner = :user AND r.category = :category AND r.aKey = :key'
      )
      ->setParameter('user', $user->getId())
      ->setParameter('category', $category)
      ->setParameter('key', $key);
    try {
      $result = $query->getSingleResult();
      return $result;
    } catch (\Exception $e) {
      // The show must go on.
      return null;
    }
  }

  public function findByUserCategory(User $user, $category) {
    $query = $this->getEntityManager()
      ->createQuery('
        SELECT r FROM VirtualPersistBundle:Record r WHERE r.owner = :owner AND r.category = :category'
      )
      ->setParameter('owner', $user->getId())
      ->setParameter('category', $category);
    try {
      return $query->getResult();
    } catch (\Exception $e) {
    throw $e;
      // The show must go on.
      return null;
    }
  }

  public function findByUserCategoryKey($user, $category, $key) {
    $query = $this->getEntityManager()
      ->createQuery('
        SELECT r FROM VirtualPersistBundle:Record r
        WHERE r.owner = :owner AND r.category = :category AND r.aKey = :key'
      )
      ->setParameter('owner', $user->getId())
      ->setParameter('category', $category)
      ->setParameter('key', $key);
    try {
      return $query->getResult();
    } catch (\Exception $e) {
      // The show must go on.
      return null;
    }
  }


  public function categoriesForUUID($uuid) {
    $em = $this->getEntityManager();
    $user = $em
      ->getRepository('VirtualPersistBundle:User')
      ->userForUUID($uuid);
    if ($user) {
      $query = $em
        ->createQuery('
          SELECT DISTINCT r.category FROM VirtualPersistBundle:Record r
          WHERE r.owner = :owner'
        )
        ->setParameter('owner', $user->getId());
      try {
        return $query->getResult();
      } catch (\Exception $e) {
        return null;
      }
    }
    return null;
  }

  public function keysForUUIDCategory($uuid, $category) {
    $em = $this->getEntityManager();
    $user = $em
      ->getRepository('VirtualPersistBundle:User')
      ->userForUUID($uuid);
    if ($user) {
      $query = $this->getEntityManager()
              ->createQuery('
          SELECT DISTINCT r.aKey FROM VirtualPersistBundle:Record r
          WHERE r.owner = :owner AND r.category = :category'
              )
              ->setParameter('owner', $user->getId())
              ->setParameter('category', $category);
      try {
        return $query->getResult();
      } catch (\Exception $e) {
        return null;
      }
    }
    return null;
  }

  public function uniqueCategories() {
    $query = $this->getEntityManager()
      ->createQuery('
        SELECT DISTINCT r.category FROM VirtualPersistBundle:Record r
      ');
    try {
      return $query->getResult();
    } catch (\Exception $e) {
      return null;
    }
  }

/*  public function deleteAllForUserCategoryKey($user, $category, $key) {
//  error_log('deleteallforusercategorykey');
    $id = $user->getId();
    $query = $this->getEntityManager()
      ->createQuery('
        DELETE VirtualPersistBundle:Record r
        WHERE r.id = :id AND r.category = :category AND r.aKey = :key'
      )
      ->setParameter('id', $id)
      ->setParameter('category', $category)
      ->setParameter('key', $key)
      ->execute();
  }*/
}

