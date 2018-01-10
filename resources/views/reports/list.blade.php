@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('message'))
  <div class="alert alert-success">{{ session('message') }}</div>
@endif
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
                @foreach ($reports as $report)
                  <tr>
                    <th scope="row">{{ $report['id'] }}</th>
                    <td>{{ $report['rp_date'] }}</td>
                    <td>{{ mb_substr($report['rp_content'], 0, 10).((mb_strlen($report->rp_content) >= 10) ? ". . .": "") }}</td>
                    <td>{{ $report->user->us_name }}</td>
                    <td><a href="/{{ $report['id'] }}" class="btn btn-primary">詳細を見る</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            {{ $reports->links() }}
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

