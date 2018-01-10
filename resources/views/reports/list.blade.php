@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          レポートリスト
          <a href="/reports/create" class="btn btn-primary">追加</a>
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
                    <td>{{ $report['rp_content'] }}</td>
                    <td>{{ $report['name'] }}</td>
                    <td><a href="/reports/{{ $report['id'] }}" class="btn btn-primary">詳細を見る</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
    </div>
  </div>
</div>
@endsection

