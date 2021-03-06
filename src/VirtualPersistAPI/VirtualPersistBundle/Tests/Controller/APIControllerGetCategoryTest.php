<?php

namespace VirtualPersistAPI\VirtualPersistBundle\Tests\Controller;

use VirtualPersistAPI\VirtualPersistBundle\Tests\TestCases\AppFixtureTestCase;
use VirtualPersistAPI\VirtualPersistBundle\Tests\TestCases\AppFixtureTestCaseInterface;
use VirtualPersistAPI\VirtualPersistBundle\DataFixtures\ORM\LoadAPIControllerTestData;

/**
 * Functional tests for VirtualPersistAPI category query.
 *
 * 22222222-2222-2222-2222-222222222222 is always the user for this test.
 */
class APIControllerGetCategoryTest extends AppFixtureTestCase implements AppFixtureTestCaseInterface {

  public static function getFixtureClass() {
    return 'VirtualPersistAPI\VirtualPersistBundle\DataFixtures\ORM\LoadAPIControllerTestData';
  }

  /**
   * Test data to delete.
   */
  public function categoryTestDataProvider() {
    return array(
      array(
        '22222222-2222-2222-2222-222222222222',
        'categoryTest',
      ),
    );
  }

  /**
   * @dataProvider categoryTestDataProvider
   */
  public function testGetCategory($uuid, $category) {
    // We assume the controller's prefix is /api
    $path = "/api/$uuid/$category";
    $client = static::createClientForApp();

    $crawler = $client->request('GET', $path);
    $response = $client->getResponse();
    $status = $response->getStatusCode();
    $this->assertEquals(200, $status, 'Confirmed record exists:' . $path);
    $this->assertEquals('{"category":"categoryTest","results":[{"key":"a","data":"aData","timestamp":1},{"key":"b","data":"bData","timestamp":315554400},{"key":"c","data":"cData","timestamp":978328800}]}',
      $response->getContent(),
      'JSON category response is correct'
    );
  }

  /**
   * @dataProvider categoryTestDataProvider
   */
  public function testGetCategorySince($uuid, $category) {
    // We assume the controller's prefix is /api
    $path = "/api/$uuid/$category";
    $client = static::createClientForApp();

    $crawler = $client->request('GET', $path, array('since'=>'200'));
    $response = $client->getResponse();
    $status = $response->getStatusCode();
    $this->assertEquals(200, $status, 'Confirmed record exists:' . $path);
    $this->assertEquals('{"category":"categoryTest","results":[{"key":"b","data":"bData","timestamp":315554400},{"key":"c","data":"cData","timestamp":978328800}]}',
      $response->getContent(),
      'JSON category response is correct'
    );
  }

  /**
   * @dataProvider categoryTestDataProvider
   */
  public function testGetCategories($uuid, $category) {
    // We assume the controller's prefix is /api
    $path = "/api/categories/$uuid";
    $client = static::createClientForApp();

    $crawler = $client->request('GET', $path);
    $response = $client->getResponse();
    $status = $response->getStatusCode();
    $this->assertEquals(200, $status, 'Confirmed record exists:' . $path);
    $this->assertEquals('["categoryTest"]',
      $response->getContent(),
      'JSON category response is correct'
    );
  }

  /**
   * @dataProvider categoryTestDataProvider
   */
  public function testJsonP($uuid, $category) {
    // We assume the controller's prefix is /api
    $path = "/api/$uuid/$category";
    $client = static::createClientForApp();

    $crawler = $client->request('GET', $path, array('since'=>'200', 'callback'=>'callback'));
    $response = $client->getResponse();
    $status = $response->getStatusCode();
    $this->assertEquals(200, $status, 'Confirmed record exists:' . $path);
    $this->assertEquals('/**/callback({"category":"categoryTest","results":[{"key":"b","data":"bData","timestamp":315554400},{"key":"c","data":"cData","timestamp":978328800}]});',
      $response->getContent()
    );
  }

}
