@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">投稿一覧</div>
          {{-- <button type="button" class="btn btn-primary mb-3 d-block w-100" onclick="location.href='{{route('stores.create')}}">
            新規投稿
          </button> --}}
          <a href="{{ route('stores.create') }}" class="btn btn-primary mb-3 d-block w-100">新規投稿</a>
        <div class="card-body">
          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>タイトル</th>
                  <th>本文</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($stores))
                @foreach ($stores as $store)
                <tr>
                  <td>{{ $store->name }}</td>
                  <td>{{ $store->description }}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection