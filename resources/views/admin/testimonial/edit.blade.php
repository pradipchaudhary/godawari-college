@extends('layouts.master')
@section('title', 'Edit Testimonial ')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Edit Testimonial </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Testimonial</li>
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
                            <a href="{{ route('testimonial') }}" type="button"
                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                    class="bx bx-arrow-back mr-1"></i> View Testimonial </a>
                        </div>

                        <form class="custom-validation" action="{{ route('update-testimonial', $testimonial->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label> Name</label>
                                <div>
                                    <input type="text" name="name" class="form-control" placeholder="Enter  name.."
                                        value="{{ $testimonial->name }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <div>
                                    <input type="text" name="position" class="form-control" placeholder="Enter position"
                                        value="{{ $testimonial->position }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <div>
                                    <textarea id="summernote1" name="message" class="form-control" cols="30" rows="10">
                                        {{ $testimonial->message }}
                                    </textarea>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="resume"> Image</label>
                                <input type="file" name="image" class="form-control-file" id="notice-img">
                                <img class="mt-2"
                                    src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" width="200px" alt="">
                            </div>

                            <input type="hidden" value="{{ $testimonial->image }}" name="old_image">

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
