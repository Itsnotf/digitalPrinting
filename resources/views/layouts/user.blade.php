<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/template/startbootstrap-shop-homepage-gh-pages/css/styles.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

</head>
<style>
    * {
        font-family: "Manrope", sans-serif;
        font-optical-sizing: auto;
    }
</style>

<body>

    @include('includes.nav')

    @yield('content')
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <div class="row">

                <div class="col-md-7 col-sm-12" style="margin-bottom: 20px">
                    <h1 class="mb-3" style="color: white; ">Lokasi Kami</h1>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6006252992042!2d104.7803661747294!3d-2.930540697045772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b7702fd91d23b%3A0xb43cf4d9b53c0ddc!2sColaqo%20Printing%20%26%20Advertising!5e0!3m2!1sen!2sid!4v1720365431482!5m2!1sen!2sid"
                        width="100%" height="300" style="border:0; border-radius: 10px" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="offset-md-1 col-md-4 col-sm-12">
                    <h1 class="mb-5" style="color: white">Kontak Kami</h1>
                    <ul class="list-group gap-2" style="list-style: none;">
                        <li style="color: white;  border-bottom: 1px solid; padding-bottom: 5px; cursor: pointer; "><a
                                class="" style="text-decoration: none; display: flex; color: white"
                                href="https://api.whatsapp.com/message/FVXCZD7WPMSJE1?autoload=1&app_absent=0"><i
                                    class="bi bi-whatsapp" style="margin-right: 20px"></i>
                                <h5>+62 89627001200</h5>
                            </a></li>
                        <li style="color: white;  border-bottom: 1px solid; padding-bottom: 5px; cursor: pointer; "><a
                                class="" style="text-decoration: none; display: flex; color: white"
                                href="https://www.instagram.com/colaqografika?igsh=MTY2dmgwdnFvaWJ3aw=="><i
                                    class="bi bi-instagram" style="margin-right: 20px"></i>
                                <h5>colaqografika</h5>
                            </a></li>
                        <li style="color: white;  border-bottom: 1px solid; padding-bottom: 5px; cursor: pointer; "><a
                                class="" style="text-decoration: none; display: flex; color: white"
                                href=""><i class="bi bi-google" style="margin-right: 20px"></i>
                                <h5>cetakcolaqo@gmail.com</h5>
                            </a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>


    @include('includes.script')
    @stack('scripts')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/template/startbootstrap-shop-homepage-gh-pages/js/scripts.js') }}"></script>
</body>

</html>
