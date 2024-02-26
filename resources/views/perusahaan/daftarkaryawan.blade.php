@extends('welcome')
@section('content')
    <div class="w-dvw h-dvh flex-col">
        <div class="flex">
            @include('perusahaan.navbar', ['nama' => $nama])
            <div class="w-full h-full flex">
                <div class="w-full flex flex-col bg-white">
                    <div class="h-auto m-4 p-8 bg-[#1E293B] rounded-lg drop-shadow-md">
                        <p class="text-4xl font-bold mb-4 text-white">Daftar Karyawan</p>
                        <hr><br>
                        <div class="w-full h-auto flex justify-start">
                            <a href="{{ route('tambah-karyawan') }}">
                                <button
                                    class="px-4 py-2 bg-[#8ad456] hover:bg-[#70ab45] rounded-md text text-black hover:text-white font-semibold">Tambah</button>
                            </a>
                        </div><br>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-[#333333] uppercase bg-gray-300 text-center">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Posisi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jenis Kelamin
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tahun Bergabung
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($karyawans as $index => $karyawan)
                                        <tr
                                            class="bg-[#1E293B] border-b hover:bg-white text-white font-medium hover:text-[#1E293B]">
                                            <th scope="row" class="px-6 py-4 whitespace-nowrap">
                                                {{-- {{ $karyawan['id'] }} --}}
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $karyawan->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $karyawan->posisi }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $karyawan->alamat }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $karyawan->gender }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if (isset($riwayats[$loop->iteration-1]))
                                                    {{ $riwayats[$loop->iteration-1]->mulai }}
                                                @else
                                                    Riwayat tidak tersedia
                                                @endif
                                            </td>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="w-full h-auto flex justify-center gap-2">
                                                    {{-- <a href="">
                                                        <button
                                                            class="px-4 py-2 bg-yellow-300 rounded-md text-black hover:bg-yellow-500 hover:text-white font-semibold">Ubah</button>
                                                    </a> --}}
                                                    <form action="" method="post">
                                                        @csrf
                                                        <button
                                                            class="px-4 py-2 bg-red-600 rounded-md text-black hover:bg-red-800 hover:text-white font-semibold">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection
