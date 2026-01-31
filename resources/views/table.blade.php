@extends('app')

@section('title', 'Dashboard')

@section('content')

    <style>
        .table-container {
            margin-top: 30px;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .btn-group-sm {
            gap: 5px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }
    </style>
    </head>

    <body>
        <div class="py-5" style="background: #f8f9fa;">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Module Database</h2>
                    <a href="{{ route('form.solar') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add New Module
                    </a>
                </div>

                @if($modules->count() > 0)
                    <div class="card shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Country</th>
                                        <th>Sales Country</th>
                                        <th>Importer Name</th>
                                        <th>Production</th>
                                        <th>Delivery Date</th>
                                        <th>Serial Number</th>
                                        <th>Product Code</th>
                                        <th>Level</th>
                                        <th>Resu</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($modules as $index => $module)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $module->country }}</td>
                                            <td>{{ $module->power }}</td>
                                            <td>{{ $module->importer }}</td>
                                            <td>{{ \Carbon\Carbon::parse($module->production)->format('Y-m-d') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($module->delivery)->format('Y-m-d') }}</td>
                                            <td>{{ $module->serial }}</td>
                                            <td>{{ $module->product }}</td>
                                            <td>{{ $module->level }}</td>
                                            <td>{{ $module->result }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ route('edit.module', $module->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('delete.module', $module->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this module?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle"></i> No modules found. <a href="{{ route('form') }}">Add one now</a>.
                    </div>
                @endif
            </div>
        </div>

@endsection