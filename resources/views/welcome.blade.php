<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Authenticity</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .hero {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-card {
            position: relative;
            top: -300px;
            z-index: 10;
        }

        .logo img {
            height: 40px;
        }

        .logo span {
            color: #0c9936;
            font-weight: 700;
            font-size: 1.5rem;
            margin-left: 8px;
        }

        .verification-group img {
            height: 40px;
        }

        .btn {
            background-color: green;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="bg-white shadow-sm py-2">
        <div class="container d-flex align-items-center">
            <div class="logo d-flex align-items-center">
                <img src="{{ asset('JinKo Solar Logo.svg') }}" alt="Canadian Solar Logo">
            </div>
        </div>
    </header>

    <!-- Hero Section with full-width background -->
    <section class="hero">
        <img src="{{ asset('images (1).jpg') }}" alt="Solar Panels Background">
    </section>

    <!-- Form Card (half overlay) -->
    <div class="container form-card col-lg-6 col-md-8 col-sm-12">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body p-4">
                <h1 class="card-title mb-3">Module Authenticity</h1>
                <hr>
                <h5>Dear users, you can identify the authenticity of the product by entering the module's serial number
                </h5>
                <img src="{{ asset('Image of barcode (4).png') }}" alt="Module serial number location guide"
                    class="img-fluid mt-2 border">
                <form action="{{ route('search.module') }}" method="POST">
                    @csrf
                    <!-- Country Selection -->
                    <div class="mb-3"> <label for="country" class="form-label">Please select your country</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="">-- Select Country --</option>
                            <option value="USA">United States</option>
                            <option value="Canada">Canada</option>
                            <option value="UK">United Kingdom</option>
                            <option value="Australia">Australia</option>
                            <option value="India">India</option>
                            <option value="Germany">Germany</option>
                            <option value="France">France</option>
                            <option value="Italy">Italy</option>
                            <option value="Spain">Spain</option>
                            <option value="China">China</option>
                            <option value="Japan">Japan</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Russia">Russia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="UAE">United Arab Emirates</option>
                            <option value="Singapore">Singapore</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="serial" class="form-label">Serial Number</label>
                        <input type="text" name="serial" id="serial" class="form-control"
                            placeholder="Enter serial number" required>
                    </div>

                    <!-- CAPTCHA Section -->
                    <div class="mb-3">
                        <label class="form-label">Verification Code</label>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-secondary fs-5 me-2">{{ $captcha }}</span>
                            <button type="button" class="btn btn-outline btn-sm"
                                onclick="window.location.reload();">Refresh</button>
                        </div>
                        <input type="text" name="captcha_input" class="form-control" placeholder="Enter the code above"
                            required>
                        @error('captcha_input')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn w-100 fw-bold">Check Module</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-light text-center py-3 mt-5">
        © {{ date('Y') }} Jinko Solar
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>