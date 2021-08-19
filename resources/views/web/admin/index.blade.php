@extends('web.admin.main')
@push('styles')

@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <table id="users-table" class="table display nowrap row-border table-hover">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Institution</th>
                    <th>Participation</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('scripts')

@endpush