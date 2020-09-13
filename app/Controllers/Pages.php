<?php namespace App\Controllers;

use App\Models\BlogModel; // connect the model so that the controller can use it.

class Pages extends BaseController
{
	public function index() // this is where the posts are displayed
	{
    $model = new BlogModel();
    $data['news'] = $model->getPosts(); // this comes from the model, BlogModel.php, this method brings us all the posts in the database

    echo view('templates/header', $data); // pass the $data parameter inisde the view function, every key of the ['news'] array becomes a variable itself, inside ALL php files, therefore can be used in home, footer
    echo view('pages/home');
    echo view('templates/footer');
	}

  function showme($page = 'home'){

    // this will throw a 404 if the page doesn't exist
    if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
    {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    // do not continue past here
    echo view('templates/header');
    echo view('pages/'.$page);
    echo view('templates/footer');
  }
	//--------------------------------------------------------------------

}