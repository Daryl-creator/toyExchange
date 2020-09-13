<?php namespace App\Controllers;

use App\Models\BlogModel;

class Blog extends BaseController 
{


  function post($slug){
    $model =  new BlogModel(); // dont't forget to tell the controller to use it! line 3
    // https://stackoverflow.com/questions/19335215/what-is-a-slug
  
    $data['post'] = $model->getPosts($slug); // 

    echo view('templates/header', $data);
    echo view('blog/post');
    echo view('templates/footer');
  
  }

  function create(){
    helper('form'); // this is a CI function, documentation, loads up upon request to keep app light, this gives us access to the CI validation methods
    $model =  new BlogModel(); // dont't forget to tell the controller to use it! line 3

    if(! $this->validate([ // get access to CI validate method by adding the helper('form') on line 19, (if this validation is not true), render the form again
      // array of key:value pairs with rules to what the form inputs are to be able to submit to database
      'title' => 'required|min_length[3]|max_length[255]', // rules, required method
      'body' => 'required'
    ])){
      echo view('templates/header');
      echo view('blog/create'); // here is the re rendder from line 22
      echo view('templates/footer');
    }else{
      $model->save( // this is a CI save function of which inside there will be an array of key:value pairs stored in the database, this creates an SQL insert statement
        [ // this is a POST request to the server
          'title' => $this->request->getVar('title'), // accessed from CI
          'body' => $this->request->getVar('body'),
          'slug' => url_title($this->request->getVar('title')), // title to be converted into a URL friendly format therefore, pass the string you want to convert as a url, url_title is a CI method
          // https://stackoverflow.com/questions/19335215/what-is-a-slug
        ]
      );

      $session = \Config\Services::session(); // this should run only ONCE per project
      //https://www.php.net/manual/en/session.examples.basic.php
      $session->setFlashdata('success', 'New post was created!');// name, value  = session variable displayed only once when being redirected then auto deleted fromt eh session.
      // https://codeigniter.com/user_guide/libraries/sessions.html?highlight=flashdata#using-the-session-class
      // https://codeigniter.com/user_guide/libraries/sessions.html?highlight=flashdata#flashdata

      return redirect()->to('/'); 
      //redirect is a CI function, specific http path to redirect to ('/') = home
    }
  }
	//--------------------------------------------------------------------


}