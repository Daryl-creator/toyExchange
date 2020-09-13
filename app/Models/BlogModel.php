<?php namespace App\Models; // CI documentation

use CodeIgniter\Model; // CI documentation

class BlogModel extends Model{ // this is used if you have to interact with your database, all CRUD ops done through models. The Model class of CI
  protected $table = 'posts'; //related to the table name that you have created, toyExchange -> posts
  protected $allowedFields = ['title', 'slug', 'body']; // this is required by CI to prevent malicious insertions into your database!, e.g. someone putting in an ID field and in random info!, tells CI that you only want access to these fields!

  public function getPosts($slug = null){
    if(!$slug){ // if there is no slug, return all of the posts in the database
      return $this->findAll(); // CI4  syntax
    }

    return $this->asArray() // methods are chained here
                ->where(['slug' => $slug]) // 
                ->first();// grab on the first result from the array, like express
                
  }
}