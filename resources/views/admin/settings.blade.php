@extends('admin.layout.admin-master')
@section('title', 'Settings')

@section('main')
<div class="container-fluid mt-4 px-4 py-4">

    @if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card mb-4">
            <div class="card-header">
                <h4>General Settings</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="mb-1">Home Heading</label>
                    <input type="text" name="home_heading" class="form-control" value="{{ $settings->home_heading ?? '' }}">
                </div>
                <div class="mb-4">
                    <label class="mb-1">Home Description</label>
                    <textarea name="home_desc" class="form-control">{{ $settings->home_desc ?? '' }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="mb-1 form-label">About Description</label>
                    <textarea id="about_desc" name="about_desc" class="form-control">{{ $settings->about_desc ?? '' }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="mb-1 form-label">Mission and Vision</label>
                    <textarea id="mission_vision" name="mission_vision" class="form-control">{{ $settings->mission_vision ?? '' }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="mb-1">Branches Heading</label>
                    <input type="text" name="branches_header" class="form-control" value="{{ $settings->branches_header ?? '' }}">
                </div>

                <div class="mb-4">
                    <label class="mb-1">Branches Description</label>
                    <textarea name="branches_desc" class="form-control">{{ $settings->branches_desc ?? '' }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="mb-1">Company Name</label>
                    <textarea name="company" class="form-control">{{ $settings->company ?? '' }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="mb-1">Logo</label><br>
                    @if($settings && $settings->logo)
                    <img src="{{ asset('upload/'.$settings->logo) }}" width="100" alt="logo">
                    @endif
                    <input type="file" name="logo" class="form-control mt-1">
                </div>
                <div class="mb-4">
                    <label class="mb-1">Contact Email</label>
                    <input type="email" name="contact_mail" class="form-control" value="{{ $settings->contact_mail ?? '' }}">
                </div>
                <div class="mb-4">
                    <label class="mb-1">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ $settings->phone_number ?? '' }}">
                </div>
                <div class="mb-4">
                    <label class="mb-1">Address</label>
                    <textarea name="address" class="form-control">{{ $settings->address ?? '' }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="mb-1">Google Map (Embeded map src only (iframe src="copy this"))</label>
                    <textarea name="google_map" class="form-control">{{ $settings->google_map ?? '' }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label class="mb-1">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{ $settings->facebook ?? '' }}">
                </div>

                <div class="mb-4">
                    <label class="mb-1">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control" value="{{ $settings->linkedin ?? '' }}">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary mb-4">Update Settings</button>
    </form>
</div>
<script>
    setTimeout(function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000);
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#about_desc'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#mission_vision'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection