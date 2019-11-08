@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Disk Usage Overview</div>

                <div class="card-body">
                    <div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total Size:</label>
                            <label for="" class="col-sm-10 col-form-label">{{ $images->getMbyteSize() }} MB ({{ $images->getByteSize() }} B)</label>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No of files:</label>
                            <label for="" class="col-sm-10 col-form-label">{{ $images->count() }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-top:40px;">
                <div class="card-header">Disk Usage Composition</div>

                <div class="card-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Types</th>
                                    <th>No of files</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($types = $images->getAllFileType()))
                                @foreach ($types as $type =>  $imagetype)
                                <tr>
                                <td colspan="1" class="text-canter">{{ $type }}</td>
                                <td colspan="1" class="text-canter">{{ $images->getCountWithType($type) }}</td>
                                <td colspan="1" class="text-canter">{{ $images->getMbyteSize($type) }} MB ({{ $images->getByteSize($type) }} B)</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-canter">No data</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection