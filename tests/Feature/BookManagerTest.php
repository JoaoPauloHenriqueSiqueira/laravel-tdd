<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManagerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_added_to_the_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/book',
            $this->data()
        );

        $book = Book::first();

        //$response->assertOk();
        $response->assertRedirect($book->path());
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
            array_merge($this->data(), ['author_id' => ''])
        );

        $response->assertSessionHasErrors('author_id');

    }

    /** @test */
    public function a_book_can_updated()
    {
        $this->post('/book',
            $this->data()
        );

        $book = Book::first();

        $response = $this->patch($book->path(), [
            'title' => "New Title",
            'author_id' => "New Author",
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertCount(2, Author::all());
        $response->assertRedirect($book->fresh()->path());
    }

    /** @test */
    public function a_book_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $this->post('/book',
            $this->data()
        );

        $book = Book::first();
        $this->assertCount(1, Book::all());

        $response = $this->delete($book->path());

        $this->assertCount(0, Book::all());
        $response->assertRedirect('/book');

    }

    /** @test */
    public function a_new_author_is_automatically_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/book',
            [
                'title' => 'Tesde de livro',
                'author_id' => "João Siqueira",
            ]
        );

        $book = Book::first();
        $author = Author::first();

        $this->assertEquals($author->id, $book->author_id);
        $this->assertCount(1, Author::all());
    }

    /**
     * @return string[]
     */
    public function data(): array
    {
        return [
            'title' => 'Tesde de livro',
            'author_id' => "João Siqueira",
        ];
    }


}
