<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">レポート作成</div>

        <div class="panel-body">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">レポートの作成が完了しました</h5>
             <a href="/reports" class="btn btn-primary">一覧へ戻る</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>