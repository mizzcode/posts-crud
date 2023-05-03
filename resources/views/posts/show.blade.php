@extends('layouts.main')

    @section('title', 'Detail Post')

    @section('container')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <img src="{{ asset('storage/'.$post->image) }}" class="w-100 rounded">
                    <hr>
                    <h4>{{ $post->title }}</h4>
                    <p class="tmt-3">
                        {!! $post->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endsection