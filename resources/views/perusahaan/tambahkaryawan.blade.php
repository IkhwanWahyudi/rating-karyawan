@extends('welcome')
@section('content')
    <div class="w-dvw h-dvh flex-col">
        <div class="flex">
            {{-- @include('perusahaan.navbar') --}}
            <div class="w-full h-full flex">
                <div class="w-full flex flex-col items-center bg-white">
                    <div class="h-auto w-[50%] m-4 p-8 bg-[#1E293B] rounded-lg drop-shadow-md flex flex-col items-center">
                        <p class="text-4xl font-bold mb-4 text-white">Tambah Karyawan</p>
                        <form action="{{ route('karyawan.store') }}" method="get" class="text-xl text-white">
                            @csrf
                            <div class="flex flex-col gap-2">
                                <hr><br>
                                <div class="flex flex-row justify-between w-80">
                                    <label for="">NIK </label>
                                    <input type="number" required min="0" name="nik" class="text-black p-1 rounded-sm">
                                </div>
                                <div class="flex flex-row justify-between w-80">
                                    <label for="">Nama </label>
                                    <input type="text" required name="nama" class="text-black p-1 rounded-sm">
                                </div>
                                <div class="flex flex-row justify-between w-80">
                                    <label for="">Posisi </label>
                                    <input type="text" required name="posisi" class="text-black p-1 rounded-sm">
                                </div>
                                <div class="flex flex-row justify-between w-80">
                                    <label for="">Tahun Masuk </label>
                                    <input type="number" required min="1" name="mulai" class="text-black p-1 rounded-sm">
                                </div>
                                <div class="flex flex-row justify-between w-80">
                                    <label for="">Alamat </label>
                                    <input type="text" required name="alamat" class="text-black p-1 rounded-sm">
                                </div>
                                <div class="flex flex-row justify-between w-80">
                                    <label for="">Tempat Lahir </label>
                                    <input type="Text" required name="tempat_lahir" class="text-black p-1 rounded-sm">
                                </div>
                                <div class="flex flex-row justify-between w-80">
                                    <label for="">Tanggal Lahir </label>
                                    <input type="date" required id="lahir" name="lahir" class="text-black p-1 rounded-sm">
                                </div>
                                <div class="flex flex-row justify-start gap-5 w-80">
                                    <label for="">Gender </label>
                                    <div class="flex items-center gap-2">
                                        <input type="radio" id="male" name="gender" value="Laki-laki"
                                            class="text-black" required>
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="Perempuan"
                                            class="text-black" required>
                                        <label for="female">Female</label>
                                    </div>
                                </div>
                                <hr class="mt-8">
                                <button type="submit" class="bg-slate-400 rounded-md py-2 mt-4">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var datePicker = document.getElementById("lahir");

            // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
            var today = new Date().toISOString().split("T")[0];

            // Menetapkan tanggal hari ini sebagai nilai minimal
            datePicker.max = today;
        </script>
        @include('components.footer')
    </div>
@endsection
