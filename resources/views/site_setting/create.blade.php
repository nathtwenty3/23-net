@extends('layouts.app')

@section('content')
    <div class="container-xxl">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="icofont-check-circled fs-4 me-2"></i>
                <strong>Success !</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- @if ($errors->any()){
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            }
        @endif --}}
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Create Site</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <form id="form-validation-2" class="form" method="POST" action="{{ route('site_setting.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $row->title ?? '') }}" name="title" type="text"placeholder="Enter Title"/>
                                @error('title')
                                    <div class="form-text text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control"  rows="3"  name="description" type="text" placeholder="Enter Description"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" rows="3" name="content" type="text" placeholder="Enter content"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input class="form-control" name="facebook" type="text" placeholder="Enter Facebook" />
                            </div>
                            <div class="mb-2">
                                <label for="telegram" class="form-label">Telegram</label>
                                <input class="form-control" name="telegram" type="text" placeholder="Enter Telegram" />
                            </div>
                            <div class="mb-2">
                                <label for="youtube" class="form-label">YouTube</label>
                                <input class="form-control" name="youtube" type="text" placeholder="Enter YouTube" />
                            </div>
                            <div class="mb-3">
                                <label for="inputImage" class="form-label"><strong>Image:</strong></label>
                                <input type="file" name="logo" class="form-control @error('image') is-invalid @enderror" id="inputImage">
                                <img  id="previewImage" src="preview_image" width="70" class="mt-2" style="display: none;">
                                @error('image')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form><!--end form-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->

    </div><!-- container -->
@endsection