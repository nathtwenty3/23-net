@extends('layouts.app')

@section('content')
    <div class="container-xxl">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert" id="alert">
                <i class="icofont-check-circled fs-4 me-2"></i>
                <strong>Success !</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show " role="alert" id="alert">
                <i class="icofont-warning-alt fs-4 me-2"></i>
                <strong>Error !</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
        @endif
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Create Role</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <form id="form-validation-2" class="form" method="POST" action="{{ route('role.store') }}">
                            @csrf
                            <div class="mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Enter name" >
                                <small >Error Message</small>
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" type="text"
                                    placeholder="Enter description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit form</button>
                        </form><!--end form-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->

    </div><!-- container -->
@endsection