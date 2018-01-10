@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">レポート詳細</div>
          <div class="panel-body">
            <!-- <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              </div>
            </div> -->
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
                  <td>{{ $report->rp_content }}</td>
                </tr>
              </tbody>
            </table>
            <a href="/reports/{{ $report->id }}/edit" class="btn btn-primary">編集</a>
            <a href="#" class="btn btn-primary">削除</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

