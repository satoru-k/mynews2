@extends('layouts.front')

@section('content')
  <div class="container">
    <hr color="#c0c0c0">
    @if ($headline != null)
      <div class="row">
        <div class="headline col-md-10 mx-auto">
          <div class="row">
            <div class="col-md-6">
              <div class="caption mx-auto">
                <div class="image">
                  @if ($headline->image_path)
                    <img src="{{ asset('storage/image/'.$headline->image_path) }}">
                  @endif
                </div>
                <div class="title p-2">
                  <h1>{{ str_limit($headline->title, 70) }}</h1>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
            </div>
          </div>
        </div>
      </div>
    @endif
    <hr color="#c0c0c0">
    <div class="row">
      <div class="posts col-md-8 mx-auto mt-3">
        @foreach($posts as $p)
          <div class="post">
            <div class="row">
              <div class="text col-md-6">
                <div class="date">
                  {{ $p->updated_at->format('Y年m月d日') }}
                </div>
                <div class="title">
                  {{ str_limit($p->title, 150) }}
                </div>
                <div class="body mt-3">
                  {{ str_limit($p->body, 1500) }}
                </div>
              </div>
              <div class="image col-md-6 text-right mt-4">
                @if ($p->image_path)
                  <img src="{{ asset('storage/image/'.$p->image_path) }}">
                @endif
              </div>
            </div>
          </div>
        <hr color="#c0c0c0">
        @endforeach
      </div>
    </div>
  </div>
@stop
