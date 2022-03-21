@extends('layouts.master')
@section('title', 'Add Slider ')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Banner</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Banner</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <h6 class="alert alert-success">
                        {{ session('status') }}
                    </h6>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="text-sm-right">
                            <a href="{{ route('banner') }}" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                    class="bx bx-arrow-back mr-1"></i> View Banner </a>
                        </div>

                        <form class="custom-validation" action="{{ route('add-banner') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Banner name</label>
                                <div>
                                    <input type="text" name="banner_name" class="form-control"
                                        placeholder="Enter banner name.." value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <div>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter banner title.." value="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Body Content</label>
                                <div>
                                    <textarea id="summernote1" name="description" class="form-control" cols="30" rows="10"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>link</label>
                                <div>
                                    <input type="text" name="link" class="form-control" placeholder="Enter link " value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="resume">Banner Image</label>
                                <input type="file" name="image" class="form-control-file" id="notice-img">
                            </div>

                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->


@endsection
