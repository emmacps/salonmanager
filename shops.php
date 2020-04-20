<?php
$page_title = "User Authentication - Homepage";
include_once 'partials/headers.php';
include_once 'partials/parseMembers.php';
?>

<body>


  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">List of Registered Salons.</h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Shops</li>
    </ol>

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <!-- Blog Post -->
        <?php if(count($members) > 0): ?>
          <?php foreach ($members as $member): ?>
        <div class="card mb-4">
          <a href="shop_profile.php?u=<?= $member['username'] ?>"><img class="card-img-top" src="<?= $member['avatar'] ?>" alt="Card image cap"></a>
          <div class="card-body">
            <h2 class="card-title"><?=$member['username']?></h2>
           
            <a href="shop_profile.php?u=<?=$member['username'] ?>" class="btn btn-primary">Visit Salon &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Date Registered: <?=$member['join_date'] ?>
          </div>
        </div>
      <?php endforeach; ?>

    <?php else: ?>
        <p>No member found</p>
    <?php endif; ?>


        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php  include_once 'partials/footers.php'; ?>

</body>

</html>
