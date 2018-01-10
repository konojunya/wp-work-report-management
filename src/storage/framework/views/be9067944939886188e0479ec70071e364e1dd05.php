<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">レポート詳細</div>
          <div class="panel-body">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">レポートID</th>
                  <td><?php echo e($report->id); ?></td>
                </tr>
                <tr>
                  <th scope="row">報告者</th>
                  <td><?php echo e($report->user->us_name); ?></td>
                </tr>
                <tr>
                  <th scope="row">報告者メールアドレス</th>
                  <td><?php echo e($report->user->us_mail); ?></td>
                </tr>
                <tr>
                  <th scope="row">作業日</th>
                  <td><?php echo e($report->rp_date); ?></td>
                </tr>
                <tr>
                  <th scope="row">作業開始時刻</th>
                  <td><?php echo e($report->rp_time_from); ?></td>
                </tr>
                <tr>
                  <th scope="row">作業終了時刻</th>
                  <td><?php echo e($report->rp_time_to); ?></td>
                </tr>
                <tr>
                  <th scope="row">作業種類</th>
                  <td><?php echo e($report->reportcate->rc_name); ?></td>
                </tr>
                <tr>
                  <th scope="row">作業内容</th>
                  <td><?php echo nl2br($report->rp_content); ?></td>
                </tr>
              </tbody>
            </table>
            <div style="display: flex;">
              <a href="/<?php echo e($report->id); ?>/edit" class="btn btn-primary" style="margin-left: auto;">編集</a>
              <a href="/<?php echo e($report->id); ?>/delete" class="btn btn-danger" style="margin-left: 5px;">削除</a>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>