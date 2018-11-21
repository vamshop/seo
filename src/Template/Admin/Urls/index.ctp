<?php
$this->assign('title', __d('vamshop', 'URLs'));
$this->extend('/Common/admin_index');

$this->Html->addCrumb(__d('vamshop', 'URLs'));

$this->start('actions');
echo $this->Vamshop->adminAction(__d('seo_lite', 'New URL'), ['action' => 'add'], ['button' => 'success']);
$this->end();
$this->append('table-heading');

$tableHeaders = $this->Html->tableHeaders([
    $this->Paginator->sort('id'),
    $this->Paginator->sort('url'),
    $this->Paginator->sort('created'),
    $this->Paginator->sort('created_by'),
    $this->Paginator->sort('updated'),
    $this->Paginator->sort('updated_by'),
    $this->Paginator->sort('status'),
    __d('vamshop', 'Actions'),
]);
echo $this->Html->tag('thead', $tableHeaders);

$this->end();

$this->append('table-body');

foreach ($urls as $url): ?>
    <tr>
        <td><?= h($url->id); ?>&nbsp;</td>
        <td>
            <?php
            echo $this->Html->div(null, $url->url, [
                'title' => $url->description,
            ]);
            ?>&nbsp;
        </td>
        <td><?= h($url->created); ?>&nbsp;</td>
        <td><?= h($url['TrackableCreator']['username']); ?>&nbsp;</td>
        <td><?= h($url->updated); ?>&nbsp;</td>
        <td><?= h($url['TrackableUpdater']['username']); ?>&nbsp;</td>
        <td><?= $this->Html->status($url->status); ?>&nbsp;</td>
        <td class="item-actions">
            <?= $this->Vamshop->adminRowAction('', ['action' => 'view', $url->id],
                ['icon' => 'eye-open']); ?>
            <?= $this->Vamshop->adminRowAction('', ['action' => 'edit', $url->id],
                ['icon' => 'pencil']); ?>
            <?= $this->Vamshop->adminRowAction('', ['action' => 'delete', $url->id],
                ['icon' => 'trash'],
                __d('vamshop', 'Are you sure you want to delete # {0}?', $url->id)); ?>
        </td>
    </tr>
<?php endforeach;

$this->end();
