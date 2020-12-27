<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchPost[]|\Cake\Collection\CollectionInterface $searchPosts
 */
?>
<div class="searchPosts index content">
    <?= $this->Html->link(__('New Search Post'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Search Posts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('content') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searchPosts as $searchPost): ?>
                <tr>
                    <td><?= $this->Number->format($searchPost->id) ?></td>
                    <td><?= $searchPost->has('user') ? $this->Html->link($searchPost->user->name, ['controller' => 'Users', 'action' => 'view', $searchPost->user->id]) : '' ?></td>
                    <td><?= h($searchPost->title) ?></td>
                    <td><?= h($searchPost->content) ?></td>
                    <td><?= h($searchPost->created_at) ?></td>
                    <td><?= h($searchPost->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $searchPost->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $searchPost->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $searchPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchPost->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
