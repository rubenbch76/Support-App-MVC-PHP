<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\RequestController;

class RequestControllerTest extends TestCase
{
        /** @test */
        public function test_function_index_return_view_home()
        {
            $controller = new RequestController;

            $view = $controller->index();

            $this->assertIsObject($view);
            $this->assertEquals('home', $view->getView());
        }

        /** @test */
        public function test_function_create_return_view_to_add_a_request()
        {
            $controller = new RequestController;

            $view = $controller->create();

            $this->assertIsObject($view);
            $this->assertEquals('create', $view->getView());
        }     
        
}