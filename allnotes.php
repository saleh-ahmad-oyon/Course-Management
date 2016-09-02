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
                </div>
                <hr/>
                <div class="container">
                    <section>
                        <?php if(!count($notes)): ?>
                            <h3>No Data Found</h3>
                        <?php else:
                         foreach($notes as $key => $n):
                             $file = explode('/', $n['filepath'])?>
                            <?= $key+1 ?>. <a href="<?= $n['filepath'] ?>"><?= end($file); ?></a><br/><br/>
                        <?php endforeach; endif;?>
                    </section>
                </div>
            </main>
        </div>
        <?php require_once 'footer.php' ?>
    </body>
</html>