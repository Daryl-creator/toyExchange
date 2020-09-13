<div class="container">
<h1>Create New Post</h1>

<?php if($_POST): ?> 
  <!-- if this is a server POST request -->
  <?= \Config\Services::validation()->listErrors() ?>
  <!-- this shows all the errors that have been generated during the form validation process in the Blog.php controller line 23 -->
  <!-- This function will return any error messages sent back by the validator. If there are no messages it returns an empty string.
  https://codeigniter4.github.io/userguide/libraries/validation.html#working-with-errors -->
  <!-- this will show the title, body is req etc. -->
<?php endif; ?>
<!-- will need to create this actions in Routes.php file -->
<form class="" action="/blog/create" method="post"> 
<!-- method="post" sends the information input-->
  <div class="form-group">
<label for="change"><strong>Title:</strong></label>
<!-- these name='title' is coming from the table data, which is being passed from the Pages.php controller -->
<input type="text" class="form-control" name="title" id="change" value="">
  </div>
  <div class="form-group">
<label for="change"><strong>Body</strong></label>
<!-- these name='body' is coming from the table data, which is being passed from the Pages.php controller -->
<textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Create</button>
  </div>
</form>
</div>