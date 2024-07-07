@extends('layouts.user')
<style>
    .heading {
        padding-bottom: 10px;
        margin-bottom: 20px;
        font-size: 40px;
        font-weight: bold;
        color: #000;
        /* border-bottom: solid 1px gray; */

    }
</style>
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5"
        style="background-image: url('assets/img/hero.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; filter: brightness(0.8);">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Selamat Datang</h1>
                <p class="lead fw-normal text-white-50 mb-0">Apa yang bisa kami bantu hari ini?</p>
            </div>
        </div>
    </header>


    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="card mb-3" style="max-width: full; border: none">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/img/hero.jpg') }}" class="img-fluid" style="border-radius: 5%" alt="...">
                    </div>
                    <div class="col-md-7 offset-md-1 " >
                        <div class="card-body" >
                            <h1 class="card-title">Colaqo Grafika Palembang</h1>
                            <p class="card-text">Melayani dengan senyum, mencetak dengan sempurna, kepuasan anda adalah
                                tujuan kami</p>
                            <p class="card-text" style="text-align: justify"><small class="text-muted">Colaqo Colaqo Grafika Palembang adalah sebuah
                                    usaha yang bergerak di ranah Digital Printing, Percetakan, dan Advertising. Menjadi
                                    salah satu pilihan dalam memenuhi kebutuhan cetak dan advertising di wilayah Palembang.
                                    Mempunyai logo Perusahaan berlambangkan kupu-kupu yang melambangkan perjalanan yang
                                    penuh perjuangan hingga mencapai bentuk yang indah, 4 sayap kupu-kupu pada lambing
                                    tersebut juga berbentuk seperti cairan butiran tinta yang mana melambangkan bahwa logo
                                    tersebut bergerak pada industri percetakan. Colaqo Grafika telah memperkenalkan beragam
                                    produk dan jasa berkualitas tinggi kepada masyarakat. Mulai dari pembuatan spanduk yang
                                    eye-catching, stiker yang berkualitas, hingga produk-produk berbahan akrilik yang
                                    elegan. Colaqo Grafika memiliki beragam solusi cetak untuk memenuhi kebutuhan promosi
                                    dan branding pelanggan. Tak hanya itu, layanan pembuatan Id card yang profesional dan
                                    papan nama yang eksklusif juga menjadi andalan Colaqo Grafika.
                                   </small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="">
                <h1 class="heading">Produk Terlaris</h1>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
                @foreach ($produks as $produk)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img style="height: 50%; object-fit: cover" class="card-img-top"
                                src="{{ asset('storage/' . $produk->gambar) }}" alt="...">

                            <!-- Product details-->
                            <div class="card-body d-flex justify-content-center align-items-center  ">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $produk->namaProduk }}</h5>
                                    <!-- Product price-->
                                    {{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class=" p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#cekoutmodal"
                                    class="w-100 h-100 btn btn-outline-dark mt-auto">Cekout
                                    Sekarang</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="cekoutmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Form -->
                                <form action="{{ route('cekout') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Display errors -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!-- Form Group for Quantity -->
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="qty" class="col-form-label">Jumlah</label>
                                                <input value="{{ old('qty') }}" type="number"
                                                    class="form-control @error('qty') is-invalid @enderror" name="qty"
                                                    id="qty" placeholder="Masukan Jumlah Barang">
                                                @error('qty')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Form Group for Catatan -->
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="catatan" class="col-form-label">Catatan</label>
                                                <input value="{{ old('catatan') }}" type="text"
                                                    class="form-control @error('catatan') is-invalid @enderror"
                                                    name="catatan" id="catatan" placeholder="Berikan Kami Catatan">
                                                @error('catatan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_pembayaran" class="col-form-label">Pembayaran</label>
                                            <div class="col-sm-12">
                                                <select
                                                    class="form-control mb-2 @error('id_pembayaran') is-invalid @enderror"
                                                    name="id_pembayaran" id="id_pembayaran" onchange="updateBukti()">
                                                    @foreach ($pembayarans as $pembayaran)
                                                        <option value="{{ $pembayaran->id }}"
                                                            data-nomer="{{ $pembayaran->nomer }}"
                                                            {{ old('id_pembayaran') == $pembayaran->id ? 'selected' : '' }}>
                                                            {{ $pembayaran->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="">Nomer Transaksi</label>
                                                <input type="number"
                                                    class="form-control @error('bukti') is-invalid @enderror" id="bukti"
                                                    disabled>
                                                @error('id_pembayaran')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="bukti" class="col-form-label">Bukti Pembayaran</label>
                                                <input type="file"
                                                    class="form-control @error('bukti') is-invalid @enderror" name="bukti"
                                                    id="bukti">
                                                @error('bukti')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>





    <script>
        function updateBukti() {
            var pembayaranSelect = document.getElementById('id_pembayaran');
            var selectedOption = pembayaranSelect.options[pembayaranSelect.selectedIndex];
            var nomer = selectedOption.getAttribute('data-nomer');
            document.getElementById('bukti').value = nomer;
        }

        // Call updateBukti on page load to set the initial value
        document.addEventListener('DOMContentLoaded', function() {
            updateBukti();
        });
    </script>
@endsection
