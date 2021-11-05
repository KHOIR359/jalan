<x-app>
    <div class="min-h-screen">
        <div class="p-4 px-5 bg-white border border-gray-200 rounded-lg shadow lg:mx-8">
            <h3 class="mb-4 text-3xl font-bold text-center text-gray-700">Review Laporan Terbaru</h3>
            <div class="grid grid-cols-1 gap-4 p-4 mb-4 bg-white border border-gray-100 shadow lg:grid-cols-2 rounded-2xl">
                @foreach ($laporan as $lapor)

                <div class="col-span-1 bg-white border border-gray-200 shadow rounded-2xl">
                    <div class="card-header">
                        <img src="{{asset($lapor['photo'])}}" alt="{{$lapor['description']}}" class="object-cover w-full h-64 rounded-lg">
                    </div>
                    <div class="p-4 card-body ">
                        <h3 class="mb-2 text-lg font-bold text-gray-700 lg:text-xl">{{$lapor['location']}}</h3>
                        <div class="col-span-2 py-3 font-bold text-gray-600 lg:text-lg">Description : {{$lapor['description']}}</div>
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="col-span-1 y-2">
                                <div class="col-span-2 p-3 my-1 font-semibold text-gray-600 border border-gray-200 rounded-md lg:text-lg">Latitude : {{$lapor['lat']}}</div>
                                <div class="col-span-2 p-3 my-1 font-semibold text-gray-600 border border-gray-200 rounded-md lg:text-lg">Longitude : {{$lapor['long']}}</div>
                                <div class="col-span-2 p-3 my-1 font-semibold text-gray-600 border border-gray-200 rounded-md lg:text-lg">tanggal : {{$lapor['created_at']}}</div>
                            </div>
                            <div class="grid col-span-1 grid-rows-3 p-2 bg-white border border-gray-200 rounded-lg shadow ">

                                <div class="w-full row-span-2 font-semibold text-center text-gray-700 border border-gray-200 rounded-lg rounded-b-none ">
                                    <p class="py-1 text-lg font-bold border border-gray-200 rounded-lg justify-self-start">Status</p>
                                    <div class="p-4">

                                        @switch($lapor['status'])
                                        @case(-1)
                                        <p class="text-red-500">Ditolak</p>
                                        @break
                                        @case(0)
                                        <p class="text-yellow-500">Diproses</p>
                                        @break
                                        @break
                                        @case(1)
                                        <p class="text-green-500">Diterima</p>
                                        @break
                                        @break
                                        @case(2)
                                        <p class="text-red-500">Selesai</p>
                                        @break
                                        @default

                                        @endswitch
                                    </div>

                                </div>
                                <a href="{{route('laporan.show', $lapor['id'])}}" class="w-full row-span-1 py-2 font-semibold text-center text-white bg-indigo-500 border border-gray-200 rounded-lg rounded-t-none hover:bg-indigo-700">
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app>
