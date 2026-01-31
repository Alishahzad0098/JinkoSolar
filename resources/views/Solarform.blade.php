@extends('app')

@section('title', 'Dashboard')
@section('content')

    <body>
        <div class="form-back py-5" style="background: #f8f9fa;">
            <div class="container">
                <div class="card shadow-sm rounded-3">
                    <div class="card-body p-5">
                        <h2 class="mb-4 text-center">Add New Module Information</h2>

                        <form method="POST" action="{{ route('store.info') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="country" class="form-label fw-bold">Country Entered</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    placeholder="Enter Country " required>
                            </div>

                            <div class="mb-3">
                                <label for="sales" class="form-label fw-bold">Sales Country</label>
                                <input type="text" name="power" id="power" class="form-control" placeholder="Enter power"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label for="importer" class="form-label fw-bold">Destination Importer Name</label>
                                <input type="text" name="importer" id="importer" class="form-control"
                                    placeholder="Enter importer name" required>
                            </div>

                            <div class="mb-3">
                                <label for="production" class="form-label fw-bold">Production:</label>
                                <input type="date" name="production" id="production" class="form-control"
                                    placeholder="Enter production" required>
                            </div>
                            <div class="mb-3">
                                <label for="delivery" class="form-label fw-bold">Delivery Date</label>
                                <input type="date" class="form-control" id="delivery" name="delivery"
                                    placeholder="Enter Delivery Date" required>
                            </div>
                            <div class="mb-3">
                                <label for="serial" class="form-label fw-bold">Serial Number</label>
                                <input type="text" name="serial" id="serial" class="form-control"
                                    placeholder="Enter serial number" required>
                            </div>
                            <div class="mb-3">
                                <label for="product" class="form-label fw-bold">Product Code</label>
                                <input type="text" name="product" id="product" class="form-control"
                                    placeholder="Enter product code" required>
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label fw-bold">Level</label>
                                <input type="text" name="level" id="level" class="form-control" placeholder="Enter level"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="result" class="form-label fw-bold">Result</label>
                                <input type="text" name="result" id="result" class="form-control" placeholder="Enter result"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection