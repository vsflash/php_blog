<?php if ($this->all_news): ?>
    <div class="slider-content">
        <h2 class="text-center">Популярные</h2>
        <div class="single-item" style="margin-top: 100px;">
            <?php foreach ($this->most_commented as $most_commented_item): ?>
                <div>
                    <h3>
                        <?= mb_strimwidth(htmlspecialchars($most_commented_item['text'], ENT_QUOTES | ENT_SUBSTITUTE), 0, 100, "...") ?>
                        <a href="/news/view/<?= $most_commented_item['id'] ?>" class="btn btn-primary">Open</a>
                    </h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container">

        <?php if (!empty($this->all_news)): ?>

            <?php foreach ($this->all_news as $news_item): ?>
                <div class="card col-sm-12" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= htmlspecialchars($news_item['name'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></h5>
                        <p class="card-text"><?= mb_strimwidth(htmlspecialchars($news_item['text'], ENT_QUOTES | ENT_SUBSTITUTE), 0, 100, "...") ?></p>
                        <p class="card-text"><strong>Автор: <?= htmlspecialchars($news_item['author'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></p>
                        <p class="card-text"><strong>Дата публикации: <?= htmlspecialchars($news_item['date_d'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></p>
                        <p class="card-text"><strong>Комментариев: <?= $news_item['count_comments'] ?></strong></p>
                        <a href="/news/view/<?= $news_item['id'] ?>" class="btn btn-primary">Open</a>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.single-item').slick({
                infinite: true
            });
        });
    </script>
<?php
endif; ?>
<!-- Modal Add-->
<div class="modal fade" id="createNews" tabindex="-1" role="dialog" aria-labelledby="createModel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModelLabel">Добавить новую запсь</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body-form">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Название</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea class="form-control" id="text-news" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-form-label">Автор</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
