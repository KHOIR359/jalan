<x-app useMap="true">
    <main class="mx-4 sm:container sm:mx-auto sm:mt-10 lg:mx-38">
        <div class="w-full sm:px-6">


            <div class="mb-5 bg-white border border-gray-100 rounded-lg shadow card">
                <div class="px-4 py-2 pb-2 text-gray-600 bg-white rounded-lg">
                    <h3 class="text-3xl text-center">Daftar Jalanan Rusak</h3>
                </div>

                <x-google.map :laporan="$laporan"></x-google.map>

                <div class="p-4 px-5 rounded-lg">
                    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                        @php
                        $ditolak = count($laporan->filter(function ($value, $key) {return $value['status'] == -1;}));
                        $diproses = count($laporan->filter(function ($value, $key) {return $value['status'] == 0;}));
                        $selesai = count($laporan->filter(function ($value, $key) {return $value['status'] == 1;}));

                        @endphp
                        <x-smallbox color="green" value="{{$selesai}}" icon="fa-check">Diterima</x-smallbox>
                        <x-smallbox color="red" value="{{$ditolak}}" icon="fa-times">Ditolak</x-smallbox>
                        <x-smallbox color="yellow" value="{{$diproses}}" icon="fa-clock">Diproses</x-smallbox>
                        <x-smallbox color="indigo" value="{{count($laporan)}}" icon="fa-book">Total</x-smallbox>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <div class="px-5 py-5 text-center bg-white rounded-lg shadow">
                    <h3 class="mb-2 text-3xl">Punya Keluhan Jalanan Rusak?</h3>
                    <p class="mb-4 text-lg">Segera laporkan masalah jalanan rusak secepatnya melalui tombol di bawah ini.</p>
                    <a href="{{route('laporan.create')}}" class="inline-block p-3 text-xl font-bold text-white bg-green-500 rounded px-7">Buat Laporan</a>
                </div>
            </div>

            <div class="my-2 bg-white rounded-lg shadow">
                <div class="py-2 text-center text-gray-800 header">
                    <p class="text-2xl">Laporan Terbaru</p>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        @foreach ($laporan as $lapor )
                        @if ($loop->iteration > 4)
                        @break
                        @endif
                        <div class="grid grid-cols-3 col-span-1 overflow-hidden bg-white border border-gray-200 rounded-md shadow cursor-pointer hover:text-blue-800 hover:underline lg:max-h-36 hover:bg-blue-200 ">
                            <div class="col-span-1">
                                <div class="h-full overflow-hidden lg:max-h-36">
                                    <a href="{{route('laporan.show', $lapor['id'] )}}">
                                        <img src="{{asset($lapor['photo'])}}" alt="gambar" class="object-cover w-full h-full rounded-md">
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center col-span-2 px-4 py-2">
                                <a href="{{route('laporan.show', $lapor['id'] )}}">
                                    <h3>{{$lapor['location']}}</h3>
                                    <p class="mt-2 text-sm text-gray-800 capitalize ">{{$lapor['description']}}</p>
                                    <p class="mt-2 text-sm text-gray-700">{{$lapor['created_at']}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-span-full">
                            <a href="{{route('laporan.index')}}" class="inline-block w-full py-2 font-semibold text-center text-white bg-blue-500 rounded-md">More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</x-app>
