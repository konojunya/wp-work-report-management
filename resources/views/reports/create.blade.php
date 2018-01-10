@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">レポート作成</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ url('reports/create') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('rp_date') ? ' has-error' : '' }}" id="datepicker-default">
              <label for="rp_date" class="col-md-4 control-label">作業日</label>

              <div class="col-md-6">
                <div class="input-group date">
                  <input id="rp_date" type="text" class="form-control" name="rp_date" value="{{ old('rp_date') }}" required autofocus>
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>

                @if ($errors->has('rp_date'))
                  <span class="help-block">
                    <strong>{{ $errors->first('rp_date') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('rp_time_from') ? ' has-error' : '' }}">
              <label for="rp_time_from" class="col-md-4 control-label">作業開始時刻</label>

              <div class="col-md-6">
                <input id="rp_time_from" type="time" class="form-control" name="rp_time_from" value="{{ old('rp_time_from') }}" required>

                @if ($errors->has('rp_time_from'))
                  <span class="help-block">
                    <strong>{{ $errors->first('rp_time_from') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('rp_time_to') ? ' has-error' : '' }}">
              <label for="rp_time_to" class="col-md-4 control-label">作業終了時刻</label>

              <div class="col-md-6">
                <input id="rp_time_to" type="time" class="form-control" name="rp_time_to" value="{{ old('rp_time_to') }}" required>

                @if ($errors->has('rp_time_to'))
                  <span class="help-block">
                    <strong>{{ $errors->first('rp_time_to') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('reportcate_id') ? ' has-error' : '' }}">
              <label for="reportcate_id" class="col-md-4 control-label">作業種別</label>

              <div class="col-md-6">
                {{ old('reportcate_id') }}
                <select class="form-control" id="reportcate_id" name="reportcate_id" required>
                  @foreach ($reportcates as $reportcate)
                    <option value="{{ $reportcate['id'] }}">{{ $reportcate['rc_name'] }}</option>
                  @endforeach
                </select>

                @if ($errors->has('reportcate_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('reportcate_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('rp_content') ? ' has-error' : '' }}">
              <label for="rp_content" class="col-md-4 control-label">作業内容</label>

              <div class="col-md-6">
                <input id="rp_content" type="text" class="form-control" name="rp_content" value="{{ old('rp_content') }}" required>

                @if ($errors->has('rp_content'))
                  <span class="help-block">
                    <strong>{{ $errors->first('rp_content') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  レポートを追加する
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
