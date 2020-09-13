<section>
  <div class="container">
  <article class="blog-post">
  <h1><?= $post['title'] ?></h1>
  <!-- <div class="details">
  
    Posted on: <?= date('M d Y', strtotime($post['created_at']))?> by aDaryl Chen
    
  </div> -->
  <?= $post['body'] ?>
  </article>
  </div>
</section>
