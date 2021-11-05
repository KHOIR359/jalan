<x-app>
    @php
    $ditolak = $laporan->filter(function ($value, $key) {return $value['status'] == -1;});
    $diproses = $laporan->filter(function ($value, $key) {return $value['status'] == 0;});
    $selesai = $laporan->filter(function ($value, $key) {return $value['status'] == 1;});
    @endphp
    <div class="min-h-screen">
        <div class="p-4 px-5 bg-white border border-gray-200 rounded-lg shadow lg:mx-8">
            <h3 class="mb-4 text-3xl font-bold text-center text-gray-700">Review Laporan Terbaru</h3>
            <div class="grid grid-cols-1 gap-4 p-4 mb-4 bg-white border border-gray-100 shadow lg:grid-cols-2 rounded-2xl">
                @foreach ($diproses as $proses)

                <div class="col-span-1 bg-white border border-gray-200 shadow rounded-2xl">
                    <div class="card-header">
                        <img src="{{asset($proses['photo'])}}" alt="{{$proses['description']}}" class="object-cover w-full h-64 rounded-lg">
                    </div>
                    <div class="p-4 card-body ">
                        <h3 class="mb-2 text-lg font-bold text-gray-700 lg:text-xl">{{$proses['location']}}</h3>
                        <div class="col-span-2 py-3 font-bold text-gray-600 lg:text-lg">Description : {{$proses['description']}}</div>
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="col-span-1 y-2">
                                <div class="col-span-2 p-3 my-1 font-semibold text-gray-600 border border-gray-200 rounded-md lg:text-lg">Latitude : {{$proses['lat']}}</div>
                                <div class="col-span-2 p-3 my-1 font-semibold text-gray-600 border border-gray-200 rounded-md lg:text-lg">Longitude : {{$proses['long']}}</div>
                                <div class="col-span-2 p-3 my-1 font-semibold text-gray-600 border border-gray-200 rounded-md lg:text-lg">tanggal : {{$proses['created_at']}}</div>
                            </div>
                            <div class="grid col-span-1 p-2 bg-white border border-gray-200 rounded-lg shadow grid-col">
                                <a href="{{route('review.show', $proses['id'])}}" class="w-full col-span-1 py-2 font-semibold text-center text-white bg-indigo-500 border border-gray-200 rounded-lg rounded-b-none hover:bg-indigo-700">
                                    Review</a>
                                <a href="{{route('accept', $proses['id'])}}" class="w-full col-span-1 py-2 font-semibold text-center text-white bg-green-500 border border-gray-200 hover:bg-green-700 ">
                                    Accept</a>
                                <a href="{{route('reject', $proses['id'])}}" class="w-full col-span-1 py-2 font-semibold text-center text-white bg-red-500 border border-gray-200 rounded-lg rounded-t-none hover:bg-red-700 ">
                                    Reject</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app>
