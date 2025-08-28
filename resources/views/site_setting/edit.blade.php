@extends('layouts.app')

@section('content')
    <div class="container-xxl">                    
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Edit Site</h4>                      
                                            </div><!--end col-->
                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <form id="form-validation-2" class="form" method="POST" action="{{ route('site_setting.update', $row->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-2">
                                                <label for="title" class="form-label">Title</label>
                                                <input class="form-control" name="title" type="text" placeholder="Enter Title" value="{{ $row->title }}"/>
                                                <small>Error Message</small>
                                            </div>
                                            <div class="mb-2">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" name="description" type="text" placeholder="Enter Description">{{ $row->description }}</textarea>
                                            </div>
                                            <div class="mb-2">
                                                <label for="content" class="form-label">Content</label>
                                                <textarea class="form-control" name="content" type="text" placeholder="Enter content">{{ $row->content }}</textarea>
                                            </div>
                                            <div class="mb-2">
                                                <label for="facebook" class="form-label">Facebook</label>
                                                <input class="form-control" name="facebook" type="text" placeholder="Enter Facebook" value="{{ $row->facebook }}"/>
                                            </div>
                                            <div class="mb-2">
                                                <label for="telegram" class="form-label">Telegram</label>
                                                <input class="form-control" name="telegram" type="text" placeholder="Enter Telegram" value="{{ $row->telegram }}"/>
                                            </div>
                                            <div class="mb-2">
                                                <label for="youtube" class="form-label">YouTube</label>
                                                <input class="form-control" name="youtube" type="text" placeholder="Enter YouTube" value="{{ $row->youtube }}"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputImage" class="form-label"><strong>Image:</strong></label>
                                                <input type="file" name="logo" class="form-control @error('image') is-invalid @enderror" id="inputImage" value="{{ $row->logo }}">
                                                <img src="{{asset('uploads/sites/' . $row->logo) }}" alt="Image" width="70" class="mt-2" id="previewImage">
                                                {{-- <img id="previewImage" src="preview_image" width="70" class="mt-2" style="display: none;"> --}}
                                                @error('image')
                                                <div class="form-text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </form><!--end form-->            
                                    </div><!--end card-body--> 
                                </div><!--end card--> 
                            </div> <!--end col-->                                                                                
                        </div><!--end row-->

                    </div><!-- container -->
@endsection