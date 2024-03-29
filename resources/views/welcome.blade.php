@extends('layout.landing')
@section('content')
    <div class="h-dvh w-dvw flex justify-center relative">
        <div class="self-center absolute w-[100%] h-full bg-[#00000090] grid justify-center content-center">
            <div class="bg-opacity-50 bg-black p-10 rounded-md flex flex-col gap-5 w-full h-full">
                <div class="flex gap-3 text-white">
                    <p class="text-xl text-[#448699]">Login</p>
                    <a href="{{ route('daftar') }}">
                        <p class="text-sm pt-1.5 hover:text-xl hover:pt-0 hover:duration-300 ease-in-out">Registrasi</p>
                    </a>
                </div>
                <hr>
                <form action="{{ route('login.action') }}" method="post">
                    @csrf
                    <div class="w-[250px] relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="h-6 fill-[#448699]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                <path
                                    d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                            </svg>
                        </div>
                        <input type="username" name="username" placeholder="Username"
                            class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                    </div>
                    <div class="w-[250px] relative mt-6">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="h-6 fill-[#448699]" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                                <path
                                    d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z" />
                            </svg>
                        </div>
                        <input type="password" name="password" placeholder="Password"
                            class="w-full ps-12 pe-4 py-2 bg-slate-50 rounded-sm ring-1 ring-[#448699] focus:outline-none focus:ring-[#397282] text-slate-600">
                    </div>
                    <button type="submit"
                        class="w-[250px] h-auto py-2 mt-5 text-white hover:text-black font-medium bg-[#448699] hover:bg-[#326472] rounded-md flex justify-center items-center">Login</button>
                </form>
            </div>
        </div>
        <img src="{{ asset('assets/login-page.jpeg') }}" class="w-full object-cover -z-10" alt="">
    </div>
@endsection
