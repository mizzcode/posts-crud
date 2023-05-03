@extends('layouts.main')

@section('title', 'Edit')

    @section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="fs-5">GAMBAR</label>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-preview img-thumbnail d-block mb-2" width="200px">
                            <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                        </div>

                        <div class="form-group mb-3">
                            <label class="fs-5">JUDUL</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}" placeholder="Masukkan Judul Post">
                        
                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fs-5">KONTEN</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Post">{{ old('content', $post->content) }}</textarea>
                        
                            <!-- error message untuk content -->
                            @error('content')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex mt-3">
                            <a href="{{ route('posts.index') }}" class="btn btn-danger">Back</a>
                            <button type="reset" class="btn btn-md btn-warning mx-4">RESET</button>
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    @endsection

    <script>
        const previewImage = () => {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')
    
            const fileReader = new FileReader()
            
            fileReader.readAsDataURL(image.files[0])
    
        // ketika image di load maka otomatis menambahkan atribut src di img kosongan yang udah kita ambil dengan class imgPreview
            fileReader.onload = (e) => {
                imgPreview.src = e.target.result
            }
        }
    </script>