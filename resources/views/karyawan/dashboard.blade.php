@extends('welcome')
@section('content')
    @include('components.navbar')
    <div class="w-full h-full flex">
        <div class="w-full flex flex-col bg-[#333333]">
            <div class="h-auto w-9/12 m-4 p-8 bg-white self-center rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4 text-center text-[#333333]">Data Karyawan</p>
                <hr><br>
                <div>
                    <form action="{{ route('karyawan.ubah', $karyawan->id) }}" method="post" class="flex flex-col gap-2">
                        @csrf
                        <div>
                            <label for="">NIK : </label>
                            <input type="text" name="nik" value="{{ $karyawan->nik }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Nama : </label>
                            <input type="text" name="nama" value="{{ $karyawan->nama }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Posisi : </label>
                            <input type="text" name="posisi" value="{{ $karyawan->posisi }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Perusahaan : </label>
                            <input type="text" name="namaperusahaan" readonly value="{{ $perusahaan->nama }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Tempat Lahir : </label>
                            <input type="text" name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Lahir : </label>
                            <input type="date" name="lahir" value="{{ $karyawan->lahir }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Umur : </label>
                            <input type="number" min="18" name="umur" readonly value="{{ $umur }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Alamat : </label>
                            <input type="text" name="alamat" value="{{ $karyawan->alamat }}"
                                class="w-fit bg-slate-200 rounded-md p-1"><br>
                        </div>
                        <div>
                            <label for="">Jenis Kelamin : </label> <br>
                            <input type="radio" name="gender" value="Laki-laki"
                                <?= $karyawan->gender == 'Laki-laki' ? 'checked' : '' ?>> Laki-laki <br>
                            <input type="radio" name="gender" value="Perempuan"
                                <?= $karyawan->gender == 'Perempuan' ? 'checked' : '' ?>> Perempuan <br>
                        </div>
                        <div>
                            <label for="">Pengalaman Kerja : </label> <br>
                            @foreach ($riwayats as $riwayat)
                                @if (isset($perusahaan_lama[$riwayat->id]))
                                    <p>
                                        {{ $perusahaan_lama[$riwayat]->nama }}, {{ $riwayat->mulai }} -
                                        {{ $riwayat->akhir }}
                                    </p><br>
                                @else
                                    <p>{{ $perusahaan->nama }}, {{ $riwayat->mulai }} -
                                        {{ $riwayat->akhir }}</p><br>
                                @endif
                            @endforeach
                        </div>
                        <div class="pb-8 self-center">
                            @foreach ($riwayats as $riwayat)
                                @if ($riwayat->status == 'menunggu' && $riwayat->nik == $karyawan->nik)
                                    <button type="submit" name="ubah"
                                        class="bg-yellow-400 px-4 py-1 rounded-lg">Ubah</button>
                    </form>
                    <form action="{{ route('karyawan.batal', $riwayat->id) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-red-600 px-4 py-1 rounded-lg">Batal Pemberhentian</button>
                    </form>
                @elseif ($riwayat->status == 'masih bekerja' && $riwayat->nik == $karyawan->nik)
                    <button type="submit" name="ubah" class="bg-yellow-400 px-4 py-1 rounded-lg">Ubah</button>
                    </form>
                    <form action="{{ route('karyawan.berhenti', $riwayat->id) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-red-600 px-4 py-1 rounded-lg" name="berhenti">Ajukan
                            Pemberhentian</button>
                    </form>
                    @endif
                    @endforeach
                    @if ($riwayat->status == 'masih bekerja' && $riwayat->nik == $karyawan->nik && $riwayat->status == 'menunggu')
                        <button type="submit" name="ubah" class="bg-yellow-400 px-4 py-1 rounded-lg">Ubah</button>
                        </form>
                    @endif
                </div>
                <hr><br>
            </div>
        </div>
    </div>
    </div>
    @include('components.footer')
@endsection
