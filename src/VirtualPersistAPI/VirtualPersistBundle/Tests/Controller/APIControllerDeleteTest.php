<?php

namespace VirtualPersistAPI\VirtualPersistBundle\Tests\Controller;

use VirtualPersistAPI\VirtualPersistBundle\Tests\TestCases\AppFixtureTestCase;
use VirtualPersistAPI\VirtualPersistBundle\Tests\TestCases\AppFixtureTestCaseInterface;
use VirtualPersistAPI\VirtualPersistBundle\DataFixtures\ORM\LoadAPIControllerTestData;

/**
 * Functional tests for the VirtualPersistAPI controller.
 *
 * Note that we assume FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF
 * is always a bad UUID, and that 00000000-0000-0000-0000-000000000000
 * is in the fixture.
 *
 * @TODO: test authentication.
 */
class APIControllerDeleteTest extends AppFixtureTestCase implements AppFixtureTestCaseInterface {

  public static function getFixtureClass() {
    return 'VirtualPersistAPI\VirtualPersistBundle\DataFixtures\ORM\LoadAPIControllerTestData';
  }

  /**
   * Test data to delete.
   */
  public function deleteTheseRecordsNoError() {
    return array(
      array(
        '00000000-0000-0000-0000-000000000000',
        'extantCategory',
        'extantKey',
      ),
    );
  }

  /**
   * Test data to delete that will generate an error.
   */
  public function deleteTheseRecordsError() {
    return array(
      array(
        'FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF',
        'extantCategory',
        'extantKey',
      ),
      array(
        '00000000-0000-0000-0000-000000000000',
        'badCategory',
        'extantKey',
      ),
      array(
        '00000000-0000-0000-0000-000000000000',
        'extantCategory',
        'badKey',
      ),
      array(
        'FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF',
        'badCategory',
        'badKey',
      ),
    );
  }

  /**
   * @dataProvider deleteTheseRecordsNoError
   */
  public function testDelete($uuid, $category, $key) {
    // We assume the controller's prefix is /api
    $path = "/api/$uuid/$category/$key";
    $client = static::createClientForApp();

    $crawler = $client->request('GET', $path);
    $status = $client->getResponse()->getStatusCode();
    $this->assertEquals(200, $status, 'Confirmed record exists:' . $path);

    $crawler = $client->request('DELETE', $path);
    $status = $client->getResponse()->getStatusCode();
    $this->assertEquals(200, $status, 'Deleted record for path: ' . $path);

    $crawler = $client->request('GET', $path);
    $status = $client->getResponse()->getStatusCode();
    $this->assertEquals(404, $status, 'Confirmed delete:' . $path);
  }

  /**
   * @dataProvider deleteTheseRecordsError
   */
  public function testBadDelete($uuid, $category, $key) {
    // We assume the controller's prefix is /api
    $path = "/api/$uuid/$category/$key";
    $client = static::createClientForApp();
    $crawler = $client->request('DELETE', $path);
    $status = $client->getResponse()->getStatusCode();
    $this->assertEquals(404, $status, 'Error deleting path: ' . $path);
  }

}
