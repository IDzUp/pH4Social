<?php

# app/tests/controllers/PostsControllerTest.php

class PostsControllerTest extends TestCase
{

    /*  public function testIndex()
      {
          $this->client->request('GET', 'posts');
      }
     */

    public function testIndex()
    {
        $this->call('GET', 'posts');

        $this->assertViewHas('posts');
    }


}