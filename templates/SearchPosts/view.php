<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchPost $searchPost
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Search Post'), ['action' => 'edit', $searchPost->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Search Post'), ['action' => 'delete', $searchPost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchPost->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Search Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Search Post'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="searchPosts view content">
            <h3><?= h($searchPost->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $searchPost->has('user') ? $this->Html->link($searchPost->user->name, ['controller' => 'Users', 'action' => 'view', $searchPost->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($searchPost->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content') ?></th>
                    <td><?= h($searchPost->content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($searchPost->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($searchPost->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($searchPost->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
