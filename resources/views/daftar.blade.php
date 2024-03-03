@extends('layout.landing')
@section('content')
    <div class="h-dvh w-dvw flex justify-center relative">
        <div class="self-center absolute w-[100%] h-full bg-[#00000090] grid justify-center content-center">
            <div class="bg-opacity-50 bg-black p-10 rounded-md flex flex-col gap-5 w-full h-full">
                <div class="flex gap-3 text-white">
                    <a href="/">
                        <p class="text-sm pt-1.5 hover:text-xl hover:pt-0 hover:duration-300 ease-in-out">Login</p>
                    </a>
                    <p class="text-xl text-[#448699]">Registrasi</p>
                </div>
                <hr>
                <form action="{{ route('daftar.action') }}" method="post">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="w-[250px] relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="h-6 fill-[#448699]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                    <path
                                        d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                </svg>
                            </div>
                            <input type="username" name="username" placeholder="Username" required
                                class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                        </div>
                        <div class="w-[250px] relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="h-6 fill-[#448699]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                    <path
                                        d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                                </svg>
                            </div>
                            <input type="password" name="password" placeholder="Password" required
                                class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                        </div>
                        <div class="w-[250px] relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#448699]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                                </svg>

                            </div>
                            <input type="number" name="npwp" placeholder="NPWP" min="0" required
                                class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                        </div>
                        <div class="w-[250px] relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#448699]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                                </svg>
                            </div>
                            <input type="text" name="nama" placeholder="Nama" required
                                class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                        </div>
                        <div class="w-[250px] relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6  stroke-[#448699]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                </svg>
                            </div>
                            {{-- <textarea name="" id="" cols="23" rows="2" class="rounded-sm bg-slate-50 ring-1 ring-slate-300 focus:outline-none focus:ring-slate-600 text-slate-600 ps-12 pe-4 py-2"></textarea> --}}
                            <input type="text" name="alamat" placeholder="Alamat" required
                                class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                        </div>
                        <div class="w-[250px] relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#448699]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                </svg>
                            </div>
                            <input type="text" name="pemilik" placeholder="Pemilik" required
                                class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                        </div>
                        <div class="w-[250px] relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#448699]">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                            </div>
                            <input type="number" name="tahun_berdiri" placeholder="Tahun Berdiri" required min="0"
                                max="2024"
                                class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                        </div>
                    </div>
                    <input type="hidden" name="role" value="perusahaan">
                    <button type="submit"
                        class="w-[250px] h-auto py-2 mt-5 text-white hover:text-black font-medium bg-[#448699] hover:bg-[#326472] rounded-md flex justify-center items-center">Daftar</button>
                </form>
            </div>
        </div>
        <img src="{{ asset('assets/login-page.jpeg') }}" class="w-full object-cover -z-10" alt="">
    </div>
@endsection
