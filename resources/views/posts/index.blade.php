@extends('layouts.main')

@section('title', 'Management Posts')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
                <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th scope="col">GAMBAR</th>
                        <th scope="col">JUDUL</th>
                        <th scope="col">CONTENT</th>
                        <th style="width: 15%">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($posts as $post)
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('storage/'.$post->image) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{!! $post->content !!}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                      @empty
                          <div class="alert alert-danger">
                              Data Post belum Tersedia.
                          </div>
                      @endforelse
                    </tbody>
                  </table>  
                  {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection()