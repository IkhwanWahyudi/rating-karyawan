@extends('welcome')
@section('content')
    <div class="w-dvw h-dvh flex flex-col">
        <div class="w-full h-full flex">
            @include('perusahaan.navbar', ['nama' => $nama])
            <div class="w-full flex flex-col bg-white">
                <div class="h-auto m-4 p-8 bg-[#1E293B] rounded-lg drop-shadow-md">
                    <table class="text-white w-full">
                        <thead>
                            <tr colspan="3">
                                <th class="text-4xl font-bold mb-4 text-white">
                                    <p class="py-2">Detail Perusahaan</p>
                                    <div class="py-2">
                                        <hr>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="flex gap-3">
                                <td class="p-1">Nama</td>
                                <td class="p-1">:</td>
                                <td> <input type="text" class="bg-[#1E293B] hover:bg-slate-200 hover:text-[#1E293B] focus:text-[#1E293B] focus:bg-slate-200 p-1 rounded-sm" value="{{$perusahaan->nama}}"></td>
                            </tr>
                            <tr class="flex gap-3">
                                <td class="p-1">Alamat</td>
                                <td class="p-1">:</td>
                                <td class="w-full"> <input type="text" class="bg-[#1E293B] hover:bg-slate-200 hover:text-[#1E293B] focus:text-[#1E293B] focus:bg-slate-200 p-1 rounded-sm w-1/2" value="{{$perusahaan->alamat}}"></td>
                            </tr>
                            <tr class="flex gap-3">
                                <td class="p-1">Pemilik</td>
                                <td class="p-1">:</td>
                                <td> <input type="text" class="bg-[#1E293B] hover:bg-slate-200 hover:text-[#1E293B] focus:text-[#1E293B] focus:bg-slate-200 p-1 rounded-sm" value="{{$perusahaan->pemilik}}"></td>
                            </tr>
                            <tr class="flex gap-3">
                                <td class="p-1">Tahun Berdiri</td>
                                <td class="p-1">:</td>
                                <td>{{$perusahaan->tahun_berdiri}}</td>
                            </tr>
                            <tr class="flex gap-3">
                                <td class="p-1">Nomor Pokok Wajib Pajak (NPWP)</td>
                                <td class="p-1">:</td>
                                <td> <input type="text" class="bg-[#1E293B] hover:bg-slate-200 hover:text-[#1E293B] focus:text-[#1E293B] focus:bg-slate-200 p-1 rounded-sm" value="{{$perusahaan->npwp}}"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="py-2">
                        <hr>
                    </div>
                    <div class="w-full flex justify-center p-2">
                        <button class="text-white w-1/5 bg-black h-10 rounded-lg">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>
@endsection
