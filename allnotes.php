<?php
require 'session.php';
if (!isset($_SESSION['stud'])) {
    header('Location: '.SERVER.'');
}

$notes = getNotes($_GET['id1']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'templates/default/head.php'; ?>
</head>
<body>
  <div id="wrap">
    <main>
      <div class="container">
        <header>
          <div class="row">
            <div class="col-md-12">
              <?php require_once 'templates/default/header.php'; ?>
            </div>
          </div>
        </header>
        <hr/>
        <section>
          <div class="col-md-12">
            <h3 class="text-center">
              <ins>
                <a href="<?= SERVER; ?>/course/student/<?= htmlentities(stripcslashes($_GET['id1']), ENT_QUOTES, 'UTF-8'); ?>">
                  <?= getCourseName($_GET['id1']) ?>
                </a>
              </ins>
            </h3>
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
<?php require_once 'templates/default/footer.php' ?>
</body>
</html>