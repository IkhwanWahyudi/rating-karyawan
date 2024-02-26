@extends('welcome')
@section('content')
    @include('components.navbar')
    <div class="w-full h-dvh flex">
        <div class="w-full flex flex-col bg-[#333333]">
            <div class="h-auto m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-[#333333]">Data Perusahaan</p>
                <hr><br>
                <div>
                    <form action="" method="get" class="flex flex-col gap-2">
                        @csrf
                        <div>
                            <label for="">Nama : </label> <br>
                            <input type="text" name="nama" id="" readonly value="{{ $perusahaan->nama }}"
                                class="w-fit bg-slate-200 rounded-md p-1 cursor-default"><br>
                        </div>
                        <div>
                            <label for="">Alamat : </label><br>
                            <input type="text" name="posisi" id="" readonly value="{{ $perusahaan->alamat }}"
                                class="w-full bg-slate-200 rounded-md p-1 cursor-default"><br>
                        </div>
                        <div>
                            <label for="">Pemilik : </label><br>
                            <input type="text" name="namaperusahaan" readonly id=""
                                value="{{ $perusahaan->pemilik }}" class="w-fit bg-slate-200 rounded-md p-1 cursor-default"><br>
                        </div>
                        <div>
                            <label for="">Tahun Berdiri : </label><br>
                            <input type="number" min="1000" name="umur" readonly id=""
                                value="{{ $perusahaan->tahun_berdiri }}" class="w-fit bg-slate-200 rounded-md p-1 cursor-default"><br>
                        </div>
                        <div>
                            <label for="">Nomor Pokok Wajib Pajak (NPWP) : </label><br>
                            <input type="text" name="alamat" id="" readonly value="{{ $perusahaan->npwp }}"
                                class="w-fit bg-slate-200 rounded-md p-1 cursor-default">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
