<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_book_can_added_to_the_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/book',
            [
                'title' => 'Tesde de livro',
                'author' => "João Siqueira",
            ]
        );

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }


    /** @test */
    public function a_title_is_required()
    {

        $response = $this->post('/book',
            [
                'title' => '',
                'author' => "João Siqueira",
            ]
        );

        $response->assertSessionHasErrors('title');

    }

    /** @test */
    public function a_author_is_required()
    {
        $response = $this->post('/book',
            [
                'title' => 'Tesde de livro',
                'author' => "",
            ]
        );

        $response->assertSessionHasErrors('author');

    }

    /** @test */
    public function a_book_can_updated()
    {
        $this->withoutExceptionHandling();

        $this->post('/book',
            [
                'title' => 'Tesde de livro',
                'author' => "João
                ",
            ]
        );

        $book = Book::first();

        $response = $this->patch('/book/' . $book->id,[
            'title' => "New Title",
            'author' => "Jenifer",
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('Jenifer', Book::first()->author);

    }

}
