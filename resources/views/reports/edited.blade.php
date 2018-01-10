@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">レポート編集</div>

        <div class="panel-body">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">レポートの編集が完了しました</h5>
             <a href="/reports" class="btn btn-primary">一覧へ戻る</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
