@extends('layouts.app')

@section('content')
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
                  <td>{{ $report->id }}</td>
                </tr>
                <tr>
                  <th scope="row">報告者</th>
                  <td>{{ $report->user->us_name }}</td>
                </tr>
                <tr>
                  <th scope="row">報告者メールアドレス</th>
                  <td>{{ $report->user->us_mail }}</td>
                </tr>
                <tr>
                  <th scope="row">作業日</th>
                  <td>{{ $report->rp_date }}</td>
                </tr>
                <tr>
                  <th scope="row">作業開始時刻</th>
                  <td>{{ $report->rp_time_from }}</td>
                </tr>
                <tr>
                  <th scope="row">作業終了時刻</th>
                  <td>{{ $report->rp_time_to }}</td>
                </tr>
                <tr>
                  <th scope="row">作業種類</th>
                  <td>{{ $report->reportcate->rc_name }}</td>
                </tr>
                <tr>
                  <th scope="row">作業内容</th>
                  <td>{!! nl2br($report->rp_content) !!}</td>
                </tr>
              </tbody>
            </table>
            <div style="display: flex;">
              <a href="/{{ $report->id }}/edit" class="btn btn-primary" style="margin-left: auto;">編集</a>
              <a href="/{{ $report->id }}/delete" class="btn btn-danger" style="margin-left: 5px;">削除</a>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

