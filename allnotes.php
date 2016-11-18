<?php
require 'session.php';
if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])) {
    header('Location: '.SERVER.'');
}

$notes = getNotes($_GET['id1']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'head.php'; ?>
</head>
<body>
  <div id="wrap">
    <main>
      <div class="container">
        <header>
          <div class="row">
            <div class="col-md-12">
              <?php require_once 'header.php'; ?>
            </div>
          </div>
        </header>
        <hr/>
        <section>
          <div class="col-md-12">
            <h3 class="text-center"><ins><?= getCourseName($_GET['id1']) ?></ins></h3>
              <?php if(!count($notes)): ?>
                <h3>No Data Found</h3>
              <?php else: foreach($notes as $key => $n):
                $file = explode('/', $n['filepath'])?>
                <?= $key+1 ?>. <a href="<?= SERVER ?>/controller/download.php?file=<?= $n['filepath'] ?>"><?= end($file); ?></a>
                <br/><br/>
              <?php endforeach; endif;?>
          </div>
        </section>
      </div><!-- /.container -->
    </main>
  </div><!-- /#wrap -->
<?php require_once 'footer.php' ?>
</body>
</html>