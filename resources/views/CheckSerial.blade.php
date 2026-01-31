@extends('ap')
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
            top: -100px;
            z-index: 10;
        }

        .logo img {
            height: 40px;
        }

        .logo span {
            color: #e31e25;
            font-weight: 700;
            font-size: 1.5rem;
            margin-left: 8px;
        }

        .verification-group img {
            height: 40px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="bg-white shadow-sm py-2">
        <div class="container d-flex align-items-center">
            <div class="logo d-flex align-items-center">
                <img src="data:image/png;base64,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"
                    alt="Canadian Solar Logo">
                <span>CanadianSolar</span>
            </div>
        </div>
    </header>

    <!-- Hero Section with full-width background -->
    <section class="hero">
        <img src="/1751799050.jpg" alt="Solar Panels Background">
    </section>

    <!-- Form Card (half overlay) -->
    <div class="container form-card col-lg-6 col-md-8 col-sm-12">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body p-4">
                <h1 class="card-title mb-3">Module Authenticity</h1>
                <hr>
                <form action="#" method="POST">
                    <!-- Serial Number -->
                    <div class="mb-3">
                        <label for="serial" class="form-label">Input Product Serial Number</label>
                        <input type="text" class="form-control" id="serial" name="serial"
                            placeholder="Please input the product serial number">
                        <div class="form-text">Module serial number location (A string of numbers & letter combinations)
                        </div>
                       
                    </div>

                    <!-- Verification Code -->
                    <div class="mb-3">
                        <label for="verification" class="form-label">Input Verification Code</label>
                        <div class="d-flex align-items-center gap-2">
                            <input type="text" class="form-control" id="verification" name="verification"
                                placeholder="Please input the verification">
                            <img src="verification-code-power.png" alt="Verification Code">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-danger w-100 fw-bold">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>