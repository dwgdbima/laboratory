@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        {{$dataTable->table()}}
    </div>
</div>

@endsection
@push('scripts')
{{$dataTable->scripts()}}
@endpush