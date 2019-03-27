<?php
if ($this->one_news): ?>
    <div class="row">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="card col-sm-12" style="background-color: ghostwhite;">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $this->one_news['name'] ?></strong></h5>
                        <p class="card-text"><?= $this->one_news['text'] ?></p>
                        <p class="card-text"><strong>Автор: <?= $this->one_news['author'] ?></strong></p>
                        <p class="card-text"><strong>Дата публикации: <?= $this->one_news['date_d'] ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="card col-sm-12" style="background-color: darkgray;">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Комментарии: <?= $this->count_comments["count(id)"] ?></strong></h5>

                        <?php foreach ($this->comments as $comment): ?>
                            <div class="card col-sm-12" style="margin-top: 5px;background-color: darkgoldenrod;">
                                <div class="card-body">
                                    <p class="card-text"><?= $comment['comm'] ?></p>
                                    <p class="card-text"><strong>Автор: <?= $comment['author'] ?></strong></p>
                                    <p class="card-text"><strong>Дата добавления: <?= $news_item['date_d'] ?></strong></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Добавить комментарий</strong></h5>

                        <form name="comment" action="../add_comment" method="post">
                            <p>
                                <label>Имя:</label>
                                <input type="text" name="author"/>
                            </p>
                            <p>
                                <label>Комментарий:</label>
                                <br/>
                                <textarea name="comm" cols="100" rows="5"></textarea>
                            </p>
                            <p>
                                <input type="hidden" name="news_id" value="<?= $this->one_news['id'] ?>"/>
                                <input type="submit" value="Отправить"/>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endif;