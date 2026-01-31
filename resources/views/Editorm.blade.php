@extends('app')

@section('title', 'Edit Module')
@section('content')

    <div class="form-back py-5" style="background: #f8f9fa;">
        <div class="container">
            <div class="card shadow-sm rounded-3">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center">Edit Module Information</h2>

                    <form method="POST" action="{{ route('update.module', $module->id ?? 0) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="country" class="form-label fw-bold">Country Entered</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ old('country', $module->country ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="power" class="form-label fw-bold">Sales Country / Power</label>
                            <input type="text" name="power" id="power" class="form-control"
                                value="{{ old('power', $module->power ?? '') }}" required />
                        </div>

                        <div class="mb-3">
                            <label for="importer" class="form-label fw-bold">Destination Importer Name</label>
                            <input type="text" name="importer" id="importer" class="form-control"
                                value="{{ old('importer', $module->importer ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="production" class="form-label fw-bold">Production</label>
                            <input type="date" name="production" id="production" class="form-control"
                                value="{{ old('production', isset($module->production) ? date('Y-m-d', strtotime($module->production)) : '') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="delivery" class="form-label fw-bold">Delivery Date</label>
                            <input type="date" class="form-control" id="delivery" name="delivery"
                                value="{{ old('delivery', isset($module->delivery) ? date('Y-m-d', strtotime($module->delivery)) : '') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="serial" class="form-label fw-bold">Serial Number</label>
                            <input type="text" name="serial" id="serial" class="form-control"
                                value="{{ old('serial', $module->serial ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="product" class="form-label fw-bold">Product Code</label>
                            <input type="text" name="product" id="product" class="form-control"
                                value="{{ old('product', $module->product ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label fw-bold">Level</label>
                            <input type="text" name="level" id="level" class="form-control"
                                value="{{ old('level', $module->level ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="result" class="form-label fw-bold">Result</label>
                            <input type="text" name="result" id="result" class="form-control"
                                value="{{ old('result', $module->result ?? '') }}" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Update</button>
                            <a href="{{ route('view.table') }}" class="btn btn-secondary py-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection