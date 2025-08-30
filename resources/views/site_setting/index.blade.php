@extends('layouts.app')
@section('content')
    <div class="container-xxl"> 
                        <div class="row">
                            <div class="col-12">
                                <!-- alert -->
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="icofont-check-circled fs-4 me-2"></i>
                                        <strong>Success !</strong> {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                @if ($errors->any()){
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    }
                                @endif
                                
                                <!-- end alert -->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">                      
                                                <h4 class="card-title">Site Setting</h4>                      
                                            </div><!--end col-->
                                            <div class="col-auto"> 
                                                <form class="row g-2">
                                                    <div class="col-auto">
                                                        <a class="btn bg-primary-subtle text-primary dropdown-toggle d-flex align-items-center arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" data-bs-auto-close="outside">
                                                            <i class="iconoir-filter-alt me-1"></i> Filter
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-start">
                                                            <div class="p-2">
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" checked id="filter-all">
                                                                    <label class="form-check-label" for="filter-all">
                                                                      All 
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" checked id="filter-one">
                                                                    <label class="form-check-label" for="filter-one">
                                                                        New
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" checked id="filter-two">
                                                                    <label class="form-check-label" for="filter-two">
                                                                        VIP
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" checked id="filter-three">
                                                                    <label class="form-check-label" for="filter-three">
                                                                        Repeat
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" checked id="filter-four">
                                                                    <label class="form-check-label" for="filter-four">
                                                                        Referral
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" class="form-check-input" checked id="filter-five">
                                                                    <label class="form-check-label" for="filter-five">
                                                                        Inactive
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" checked id="filter-six">
                                                                    <label class="form-check-label" for="filter-six">
                                                                        Loyal
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--end col-->

                                                    <div class="col-auto">
                                                      {{-- <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addBoard"><i class="fa-solid fa-plus me-1"></i> Add Product</button> --}}
                                                      <a type="button" class="btn btn-primary"  href="{{ route('site_setting.create') }}">
                                                        <i class="fa-solid fa-plus me-1"></i>Add Site</a>                                                
                                                    </div><!--end col-->
                                                </form>    
                                            </div><!--end col-->
                                        </div><!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table mb-0 checkbox-all" id="datatable_1">
                                                <thead class="table-light container">
                                                  <tr>
                                                    <th style="width: 20px;">#</th>
                                                    <th class="ps-0">title</th>
                                                    <th>Description</th>
                                                    <th>Content</th>
                                                    <th>Facebook</th>
                                                    <th>Telegram</th>
                                                    <th>Youtube</th>
                                                    <th>Logo</th>
                                                    <th class="text-end">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @if($rows)
                                                        @php($i = 1)
                                                        @foreach ($rows as $row)
                                                            <tr>
                                                                <td>{{$i++}}<d>
                                                                <td class="ps-0"> {{ $row['title']}}</td>
                                                                <td>{{ $row['description']}}</td>
                                                                <td>{{ $row['content']}}</td>
                                                                <td>{{ $row['facebook']}}</td>
                                                                <td>{{ $row['telegram']}}</td>
                                                                <td>{{ $row['youtube']}}</td>
                                                                <td>
                                                                    <img src="{{asset ('uploads/sites/'. $row->logo) }}" alt="" width="60">
                                                                </td>
                                                                <td class="text-end">                                                       
                                                                    <a href="{{ route('site_setting.edit', $row->id)}}"><i class="las la-pen text-secondary fs-18"></i></a>
                                                                    <a href="{{ route('site_setting.delete', $row->id)}}"><i class="las la-trash-alt text-danger fs-18"></i></a>
                                                                </td>
                                                            </tr>                                                                               
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->                                     
                    </div><!-- container -->
@endsection