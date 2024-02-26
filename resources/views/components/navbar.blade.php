<nav id="scroll-bg"
    class="z-50 grid grid-flow-col w-full content-center sticky justify-around bg-transparent top-0 backdrop-blur-[2px]">
    <a href="{{ route('karyawan.view', $id) }}" class="flex justify-center bg-transparent opacity-80 w-full">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo Shoes.co" class="w-fit h-[100px] top-3 brightness-0">
    </a>
    <div
        class="bg-transparent grid justify-around grid-flow-col content-center gap-6 self-center w-auto h-14 text-black font-semibold opacity-80">
        <a href="{{ route('karyawan.view', $id) }}">
            <p>Data Pribadi</p>
        </a>
        <a href="{{ route('detailperusahaan', $id) }}">
            <p>Detail Perusahaan</p>
        </a>
        <p class="text-black">|</p>
        <a href="{{ route("logout") }}">
            <p>Logout</p>
        </a>
    </div>
</nav>
