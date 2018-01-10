<?php $__env->startSection('content'); ?>
<div class="container">
<?php if(Session::has('message')): ?>
  <div class="alert alert-success"><?php echo e(session('message')); ?></div>
<?php endif; ?>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading" style="display: flex; align-items: center;">
          レポートリスト
          <a href="/create" class="btn btn-primary" style="margin-left: auto;">追加</a>
        </div>

          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>作業日</th>
                  <th>作業内容</th>
                  <th>報告者名</th>
                  <th>詳細</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row"><?php echo e($report['id']); ?></th>
                    <td><?php echo e($report['rp_date']); ?></td>
                    <td><?php echo e(mb_substr($report['rp_content'], 0, 10).((mb_strlen($report->rp_content) >= 10) ? ". . .": "")); ?></td>
                    <td><?php echo e($report->user->us_name); ?></td>
                    <td><a href="/<?php echo e($report['id']); ?>" class="btn btn-primary">詳細を見る</a></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>

            <?php echo e($reports->links()); ?>

          </div>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>