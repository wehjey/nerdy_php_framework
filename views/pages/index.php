<?php require APP_ROOT . '/views/includes/header.php'; ?>

<h1><?php echo $data['title'] ?></h1>

<p>
    This is the Nerdy PHP MVC Lightweight framework. Please refer to docs on how to use 😊
</p>

<?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title">
            <?php echo $post->title ?>
        </h4>
    </div>
<?php endforeach ?>

<?php require APP_ROOT . '/views/includes/footer.php';
