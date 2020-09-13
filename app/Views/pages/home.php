<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Cover Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <main role="main" class="inner cover">

   <!-- the alert that comes up when you submit a new post -->
   <?php
    $session = \Config\Services::session();
    ?>
    <?php if (isset($session->success)): ?> 
      <!-- this is the name of the session that was setup in Blog.php controller line 43 arugument 1 -->
      <div class="alert alert-success text-center alert-dismissable fade show mb-0 " role="0">
  <?= $session->success ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php endif; ?>

    
    <h1 class="cover-heading">TOY EXCHANGE!</h1>
    <p class="lead">Facilitate Toy lending and borrowing while connecting with parents in your neighbourhood</p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
    </p>
  </main>

  <section class="blog-section">
    <div class="container">
    <!-- from Pages.php controller line 10, because passed $data array with news key, therefore the news key it can be accessed here! -->
      <?php if ($news): ?> 
        <!-- if this is not an empty array -->
        <?php foreach ($news as $newsItem): ?>
        <!-- for each $news var which is now $newsItem, display the table.title data -->
          <h3><a href="/blog/<?= $newsItem['slug'] ?>"><?= $newsItem['title'] ?></a></h3>
        <?php endforeach; ?>
        <?php else: ?>
        <!-- otherwise if it is empty 'else' in JS -->
          <p class="text-center">No posts have been found</p>
      <?php endif; ?>

    </div>
   
  </section>

  
</div>
</body>
</html>