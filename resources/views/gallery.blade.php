@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gallery</div>
                <div class="card-body">
                    <div id='gallery'>
                        <image-gallery :defaultimage="defaultimage"></image-gallery>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var defaultImage = {!! $iamgeList->toJson() !!};
</script>
<script src="{{ asset('js/gallery.js') }}"></script>  
@endsection