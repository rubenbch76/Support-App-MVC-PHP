<?php

use App\Models\RequestModel;
use PHPUnit\Framework\TestCase;

class RequestModelTest extends TestCase {
    
    /** @test */
    public function test_request_can_access_to_all_attributes_not_include_id_and_create_at()
    {
        $requestData = [
            "id" => null,
            "topic" => "Printer problem",
            "description" => "Impossible print with printer",
            "userName" => "giaco",
            "create_at" => "",
        ];

        $request = new RequestModel($requestData["topic"], $requestData["description"], $requestData["userName"], $requestData["id"], $requestData["create_at"]);

        $this->assertEquals("Printer problem", $request->getTopic());
        $this->assertEquals("Impossible print with printer", $request->getDescription());
        $this->assertEquals("giaco", $request->getUserName());
    }
    

}