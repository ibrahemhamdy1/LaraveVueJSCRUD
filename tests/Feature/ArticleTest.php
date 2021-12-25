<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Article;

class ArticleTest extends TestCase
{

    public function setUp() : void {
        parent::setUp();
    }

    /**
     * Test the get all articles.
     *
     * @return void
     */
    public function testGettingAllArticles()
    {
        Article::insert(
            [
                ['title' => 'hema', 'description'=>'hamdy'],
                ['title' => 'ahmed', 'description'=>'ahmed'],
            ]
        );
        $response = $this->get('/api/v1/articles')->assertStatus(200);
        $response = json_decode($response->getContent());

        $this->assertCount(2, $response);
    }

    /**
     * Test the create article.
     *
     * @return void
     */
    public function testCreateArticle()
    {
        $this->assertEquals(0, Article::count());

        $response = $this->post('/api/v1/articles',
            ['title' => 'hema', 'description'=>'hamdy'],
        )->assertStatus(200);

        $response = json_decode($response->getContent());
        $this->assertEquals(1, Article::count());
    }

    /**
     * Test the update article.
     *
     * @return void
     */
    public function testUpdateArticle()
    {
        $article = Article::create(
            ['title' => 'hema', 'description'=>'hamdy'],
        );

        $response = $this->patch("/api/v1/articles/$article->id",
            ['title' => 'ahmed', 'description'=>'ali'],
        )->assertStatus(200);

        $response = json_decode($response->getContent());

        $this->assertEquals(Article::first()->title, 'ahmed');
    }

    /**
     * Test the delete article.
     *
     * @return void
     */
    public function testDeleteArticle()
    {
        $article = Article::create(
            ['title' => 'hema', 'description'=>'hamdy'],
        );

        $this->delete("/api/v1/articles/$article->id")->assertStatus(200);

        $this->assertEquals(Article::count(),0);
    }


}
