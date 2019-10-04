<?php
if ($this->one_news): ?>
    <div class="row">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="card col-sm-12" style="background-color: ghostwhite;">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= htmlspecialchars($this->one_news['name'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></h5>
                        <p class="card-text"><?= htmlspecialchars($this->one_news['text'], ENT_QUOTES | ENT_SUBSTITUTE) ?></p>
                        <p class="card-text"><strong>Автор: <?= htmlspecialchars($this->one_news['author'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></p>
                        <p class="card-text"><strong>Дата публикации: <?= htmlspecialchars($this->one_news['date_d'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="card col-sm-12" style="background-color: darkgray;">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Комментарии: <?= $this->count_comments["count(id)"] ?></strong>
                        </h5>

                        <?php if (!empty($this->comments)): ?>

                            <?php foreach ($this->comments as $comment): ?>
                                <div class="card col-sm-12" style="margin-top: 5px;background-color: darkgoldenrod;">
                                    <div class="card-body">
                                        <p class="card-text"><?= htmlspecialchars($comment['comm'], ENT_QUOTES | ENT_SUBSTITUTE) ?></p>
                                        <p class="card-text"><strong>Автор: <?= htmlspecialchars($comment['author'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></p>
                                        <p class="card-text"><strong>Дата
                                                добавления: <?= htmlspecialchars($comment['date_d'], ENT_QUOTES | ENT_SUBSTITUTE) ?></strong></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>

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