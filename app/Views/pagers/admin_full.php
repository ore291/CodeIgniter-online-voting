<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination border border-1 border-primary">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="bg-dark">
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="false"><?= lang('Pager.first') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <span aria-hidden="false"><?= lang('Pager.previous') ?></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="active page-item"' : '' ?> class="page-item bg-black">
                <a href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>

        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <?php foreach ($pager->links() as $link) : ?>
                <li <?= $link['active'] ? 'class="active page-item"' : '' ?> class="page-item bg-black">
                    <a href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>

            <?php endforeach ?>
            <li>
                <a href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                    <span>next</span>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>