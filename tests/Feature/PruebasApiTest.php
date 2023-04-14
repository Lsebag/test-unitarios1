<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PruebasApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_get_all_books(): void
    {
        $book = Book::factory()->count(4)->create();
        $response = $this->getJson(route("books.index"));
        $response->assertJsonFragment([
            'titulo'=>$book[0]->titulo
        ])
        ->assertJsonFragment([
                    'titulo'=>$book[1]->titulo
        ]);
    
       }

       public function can_get_one_book():void{
        $book=Book::factory()->create();
        $response = $this->getJson(route("books.index"));
        $response->assertJsonFragment([
                'titulo'=>$book->titulo
        ]);
    }

    public function can_crate_book():void{

        $this->postJson(route('books.store'),[
            'titulo'=>"Mi libro de pruebas"
        ])->assertJsonFragment([
            'titulo'=>"Mi libro de pruebas"
        ]);
        $this->assertDatabaseHas('books',
            ['titulo'=>"Mi libro de pruebas"]
        );
    }
}
