<?php
declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 * @var array $timelineItems
 */
$this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', ['block' => true]);
$this->Html->css('https://cdn.jsdelivr.net/npm/jquery-roadmap@1/dist/jquery.roadmap.min.css', ['block' => true]);
$this->Html->script('https://cdn.jsdelivr.net/npm/jquery-roadmap@1/dist/jquery.roadmap.min.js', ['block' => true]);
?>
<div class="index content">
    <h3><?= __('Timeline') ?></h3>
    <div id="my-roadmap"></div>
</div>
<script>
    var data = <?php echo json_encode($timelineItems);?>;
    console.info('data', data)
    $("#my-roadmap").roadmap(data, {
        eventsPerSlide: <?php echo count($timelineItems) / 2;?>,
    });
</script>
