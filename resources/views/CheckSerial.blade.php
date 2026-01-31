<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Module Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .logo img { height: 40px; }
    </style>
</head>

<body>

<header class="bg-white shadow-sm py-2">
    <div class="container">
        <div class="logo">
            <img src="{{ asset('JinKo Solar Logo.svg') }}">
        </div>
    </div>
</header>

<div class="container mt-5 col-lg-8">

    @if(isset($module))
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Module Verification Result
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th>Country Entered</th><td>{{ $module->country }}</td></tr>
                    <tr><th>Sales Country</th><td>{{ $module->power }}</td></tr>
                    <tr><th>Importer</th><td>{{ $module->importer }}</td></tr>
                    <tr><th>Production Date</th><td>{{ $module->production }}</td></tr>
                    <tr><th>Delivery Date</th><td>{{ $module->delivery }}</td></tr>
                    <tr><th>Serial Number</th><td>{{ $module->serial }}</td></tr>
                    <tr><th>Product Code</th><td>{{ $module->product }}</td></tr>
                    <tr><th>Level</th><td>{{ $module->level }}</td></tr>
                    <tr>
                        <th>Result</th>
                        <td class="fw-bold text-success">{{ $module->result }}</td>
                    </tr>
                </table>
            </div>
        </div>

    @else
        <div class="alert alert-danger shadow">
            <h5>Verification Failed</h5>
            <p>
                Dear user, we regret to inform you that the serial number you entered
                cannot be verified.
            </p>
            <p>
                If your module was purchased before 2016, please contact us via:
                <br>
                <strong>https://cs.jinkosolar.com</strong>
            </p>
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('check.serial') }}" class="btn btn-secondary">Back</a>
    </div>

</div>

<footer class="bg-light text-center py-3 mt-5">
    © {{ date('Y') }} Jinko Solar
</footer>

</body>
</html>
