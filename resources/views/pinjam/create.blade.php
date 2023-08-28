@extends('layout.main')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="row justify-content-md-center">
                <div class="col-md-9">
                    <div class="card px-5 mt-4 shadow pb-5">
                        <h1 class="text-primary pt-4 text-center mb-4">Tambah Data Peminjaman</h1>

                        <form action="{{ route('pinjam.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Form input barcode anggota -->
                                    <label for="barcodeAnggota">Barcode Anggota: <small id="msgAnggota" class="text-danger font-weight-bold" style="font-weight: 600"></small></label>
                                    <input type="text" class="form-control mb-2" id="barcodeAnggota" name="barcodeAnggota" autofocus required>
                                </div>
                                <div class="col-md-6">
                                    <label for="id_anggota">Nama anggota:</label>
                                    <select name="id_anggota" id="id_anggota" class="form-control" readonly required></select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Form input barcode buku -->
                                    <label for="barcodeBuku">Barcode Buku: <small id="msgBuku" class="text-danger font-weight-bold" style="font-weight: 600"></small></label>
                                    <input type="text" class="form-control mb-2" id="barcodeBuku" name="barcodeBuku" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="id_buku">Judul buku:</label>
                                    <select name="id_buku" id="id_buku" class="form-control" readonly required></select>
                                </div>
                            </div>

                            <!-- Form input tanggal pinjam -->
                            <label for="tgl_pinjam">Tanggal Pinjam:</label>
                            <input type="date" class="form-control mb-2" name="tgl_pinjam" id="tgl_pinjam" value="{{ date('Y-m-d') }}" required>

                            <!-- Form input status -->
                            <div class="mb-3">
                                <label for="">Lama Peminjaman:</label>
                                <select class="form-select" name="lama_pinjam" required>
                                    <option value="">-select lama peminjaman</option>
                                    <option value="3">+3 Hari</option>
                                    <option value="5">+5 Hari</option>
                                    <option value="7">+7 Hari</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Tambah Peminjaman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function() {
        $('#barcodeAnggota').on('input', function(e) {
            e.preventDefault();

            var barcodeAnggota = $(this).val().toString();
            $.ajax({
                type: "POST",
                url: "{{ route('get.anggota') }}",
                data: {
                    barcodeAnggota: barcodeAnggota,
                    timestamp: new Date().getTime() //cache buster
                },
                dataType: "json",
                success: function(res) {
                    if (res.status == 'ok') {
                        if (res.anggota == null) {
                            $('#msgAnggota').html('⛔invalid barcode anggota')
                            $('#id_anggota').html('')
                        } else {
                            $('#msgAnggota').html('✅barcode valid')
                            var data = '';
                            data += `<option value="${res.anggota.id_anggota}" hidden>${res.anggota.nama_anggota}</option>`
                            $('#id_anggota').append(data);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Menampilkan respons error di konsol
                }
            });
        })

        $('#barcodeBuku').on('input', function(e) {
            e.preventDefault();

            var barcodeBuku = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('get.buku') }}",
                data: {
                    barcodeBuku: barcodeBuku,
                    timestamp: new Date().getTime() // Cache-buster
                },
                dataType: "json",
                success: function(res) {
                    if (res.status == 'ok') {
                        if (res.buku == null) {
                            $('#msgBuku').html('⛔invalid barcode buku')
                            $('#id_buku').html('')
                        } else {
                            $('#msgBuku').html('✅barcode valid')
                            var data = '';
                            data += `<option value="${res.buku.id_buku}" hidden>${res.buku.judul}</option>`
                            $('#id_buku').append(data);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Menampilkan respons error di konsol
                }
            });
        })
    });
</script>
@endpush


@endsection