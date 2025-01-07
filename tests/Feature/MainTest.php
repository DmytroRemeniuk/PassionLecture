<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\BookController;

class MainTest extends TestCase
{
    /**
     * Le test pour la vérification de la méthode findOrFail qui retourne un livre spécifié
     */
    public function test_bookcontroller_show(): void
    {
        //Arrange
        $id = 1;
        //Act
        $response = BookController::findOrFail($id);
        //Assert
        $this->assertTrue($response->titre == "Le Petit Prince");
    }
}
