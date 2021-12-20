<?php

namespace Tests\Integration;

use App\Models\RequestModel;
use App\Repositories\MysqlRepository\MysqlConnection;
use PHPUnit\Framework\TestCase;

class RequestIntegrationTest extends TestCase {
    
    private $db;

    private function initDB()
    {
        $database = new MysqlConnection();
        $database->mysql->query("DELETE FROM requests");
        $database->mysql->query("ALTER TABLE requests AUTO_INCREMENT = 1");
        $this->db = $database;
    }

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->initDB();
    }
    public function test_can_retrieve_an_requests_list()
    {
        // Given
        $this->db->mysql->query("INSERT INTO requests (topic,description,user_name) VALUE ('print error','lorem apsum','pepe')");
        $this->db->mysql->query("INSERT INTO requests (topic,description,user_name) VALUE ('windows blue screen','larem apsum','pepa')");

        // When
        $requestsList = RequestModel::all();

        // Then
        $this->assertEquals("print error", $requestsList[0]->getTopic());
        $this->assertEquals("lorem apsum", $requestsList[0]->getDescription());
        $this->assertEquals("pepe", $requestsList[0]->getUserName());
        $this->assertEquals("windows blue screen", $requestsList[1]->getTopic());
        $this->assertEquals("larem apsum", $requestsList[1]->getDescription());
        $this->assertEquals("pepa", $requestsList[1]->getUserName());
    }

    public function test_function_find_by_id()
    {
        $this->db->mysql->query("INSERT INTO requests (topic,description,user_name) VALUE ('print error','lorem apsum','pepe')");
        $this->db->mysql->query("INSERT INTO requests (topic,description,user_name) VALUE ('print error','lorem ipsum','pepa')");
        $id_request = 2;

        $request = RequestModel::findById($id_request);

        $this->assertEquals(2, $request[0]->getId());
        $this->assertEquals("pepa", $request[0]->getUserName());
    }

    /** @test */
    public function test_function_to_update_request()
    {
        // Given
        $this->db->mysql->query("INSERT INTO requests (topic,description,user_name) VALUE ('print error','lorem apsum','pepa')");
        $this->db->mysql->query("INSERT INTO requests (topic,description,user_name) VALUE ('print error','lorem','pepo')");
        $id_request = 1;
        $data = [
            "topic" => "Blue screen error",
            "description" => "data updated",
            "user_name" => "giaco"
        ];

        RequestModel::update($id_request, $data);
        
        $request = RequestModel::findById($id_request);

        $this->assertEquals($data['topic'], $request[0]->getTopic());
        $this->assertEquals($data['description'], $request[0]->getDescription());
        $this->assertEquals($data['user_name'], $request[0]->getUserName());
    }
    


}