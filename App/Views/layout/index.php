<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>

<div class="container mt-3">
    <h1>
        <?php
        $count = count($todo);
        echo "Having $count ToDos";
        ?>
    </h1>
    <div class="d-flex flex-wrap">

        <?php foreach ($todo as $item) : ?>
            <div class="card shadow m-2" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['task'] ?></h5>
                    <span class="card-text"><?php echo $item['due_date'] ?></span>
                </div>
                <div class="card-footer d-flex justify-content-around">
                    <a href="<?php url('layout/edit/' . $item['id']) ;?>" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="<?php url('layout/delete/' . $item['id']) ;?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>

<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>