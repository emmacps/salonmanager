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
     
        <!-- Blog Post -->
        <?php if(count($members) > 0): ?>
          <?php foreach ($members as $member): ?>
          <div class="col-md-4">
        <div class="card mb-4">
          <a href="shop_profile.php?u=<?= $member['username'] ?>"><img class="img-fluid card-img-top" src="<?= $member['avatar'] ?>" alt="Card image cap" width="200"></a>
          <div class="card-body">
            <h2 class="card-title"><?=$member['username']?></h2>
           
            <a href="shop_profile.php?u=<?=$member['username'] ?>" class="btn btn-primary">Visit Salon &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Date Registered: <?=$member['join_date'] ?>
          </div>
        </div>
         </div>
      <?php endforeach; ?>

    <?php else: ?>
        <p>No member found</p>
    <?php endif; ?>
     

      <!-- Sidebar Widgets Column -->
     

    </div>
    <!-- /.row -->
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
  <!-- /.container -->

<?php  include_once 'partials/footers.php'; ?>

</body>

</html>
