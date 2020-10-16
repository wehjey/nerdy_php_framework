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
        <div class="bg-light p-2 mb-3">
            written by <?php echo $post->name ?> on <?php echo $post->post_created_at ?>
        </div>
        <p class="card-text"><?php echo $post->body ?></p>
        <a href="<?php echo URL_ROOT ?>/posts/show/<?php echo $post->postId ?>" class="btn btn-dark">more</a>
    </div>
<?php endforeach ?>


<?php require APP_ROOT . '/views/includes/footer.php';
