<x-app useMap="true">
    <div class="min-h-screen">
        <div class="p-4 px-5 lg:mx-8 ">
            <div class="grid grid-cols-1 gap-4 p-4 mb-4 bg-white border border-gray-100 shadow lg:grid-cols-3 rounded-2xl">
                <div class="col-span-3">
                    <div class="grid grid-cols-2 bg-white lg:grid-cols-3 rounded-2xl">
                        <div class="order-1 col-span-1 lg:col-span-2">
                            <p class="mb-3 text-xl font-bold text-center text-gray-700">Map</p>
                            <x-google.map :lapor="$lapor"></x-google.map>
                        </div>
                        <div class="order-2 col-span-1 lg:order-1">
                            <p class="mb-3 text-xl font-bold text-center text-gray-700">Gambar</p>
                            <img src="{{asset($lapor['photo'])}}" alt="Photo Jalan" title="Photo Jalan" class="object-cover w-full h-40 rounded-l-none hover:object-contain focus:object-fill lg:h-96 rounded-2xl ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 mb-4 bg-white border border-gray-100 shadow rounded-2xl">
                <div class="grid col-span-1 gap-4 lg:grid-cols-3">
                    <div class="col-span-1 lg:col-span-1">
                        <h3 class="mb-4 text-xl font-bold text-center text-gray-700 md:text-3xl">Informasi Pelapor</h3>
                        <div class="">
                            <div class="p-2 mx-1 my-2 font-semibold text-gray-700 capitalize border border-gray-400 rounded-md text-md">
                                <div class="mb-2 text-lg font-bold">Nama : </div>{{$lapor['name']}}
                            </div>
                            <div class="p-2 mx-1 my-2 font-semibold text-gray-700 border border-gray-400 rounded-md text-md">
                                <div class="mb-2 text-lg font-bold">Email : </div>{{$lapor['email']}}
                            </div>
                            <div class="p-2 mx-1 my-2 font-semibold text-gray-700 border border-gray-400 rounded-md text-md">
                                <div class="mb-2 text-lg font-bold">NoTelp : </div>{{$lapor['phone']}}
                            </div>
                            <a href="https://wa.me/+62{{substr($lapor['phone'], 1)}}" target="_blank" class="block p-2 mx-1 my-2 font-semibold text-gray-200 bg-green-400 border border-gray-400 rounded-md text-md">
                                <div class="mb-2 text-lg font-bold"><i class="fab fa-whatsapp"></i> Whatsapp </div>{{$lapor['phone']}}
                            </a>
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2">
                        <h3 class="mb-4 text-xl font-bold text-center text-gray-700 md:text-3xl">Informasi Lokasi</h3>
                        <div class="p-2 mx-1 my-2 font-semibold text-gray-700 capitalize border border-gray-400 rounded-md text-md">
                            <div class="mb-2 text-lg font-bold">Latitude : </div>{{$lapor['lat']}}
                        </div>
                        <div class="p-2 mx-1 my-2 font-semibold text-gray-700 capitalize border border-gray-400 rounded-md text-md">
                            <div class="mb-2 text-lg font-bold">Longitude : </div>{{$lapor['long']}}
                        </div>
                        <div class="p-2 mx-1 my-2 font-semibold text-gray-700 capitalize border border-gray-400 rounded-md lg:truncate text-md">
                            <div class="mb-2 text-lg font-bold">Jalan : </div>{{$lapor['road']}}
                        </div>
                        <div class="p-2 mx-1 my-2 font-semibold text-gray-700 capitalize border border-gray-400 rounded-md lg:truncate text-md" title="{{$lapor['location']}}">
                            <div class="mb-2 text-lg font-bold">Lokasi : </div>{{$lapor['location']}}
                        </div>
                    </div>
                    <div class="col-span-1 lg:col-span-2">
                        <h3 class="mb-4 text-xl font-bold text-center text-gray-700 md:text-3xl">Catatan Pelapor</h3>
                        <div class="p-2 mx-1 font-semibold text-center text-gray-700 capitalize border border-gray-400 rounded-md text-md">
                            <div class="mb-2 text-lg font-bold lg:text-2xl">Deskripsi : </div>{{$lapor['description']}}
                        </div>
                    </div>
                    <div class="col-span-1">
                        <h3 class="mb-4 text-xl font-bold text-center text-gray-700 md:text-3xl">Action</h3>
                        <div class="flex flex-col items-stretch p-2 bg-white border border-gray-200 shadow rounded-2xl">
                            <a href="{{route('accept', $lapor['id'])}}" class="inline-block w-full h-full py-2 my-1 text-center text-white bg-green-500 rounded-lg hover:bg-green-700">Terima</a>
                            <a href="{{route('reject', $lapor['id'])}}" class="inline-block w-full h-full py-2 my-1 text-center text-white bg-red-500 rounded-lg hover:bg-red-700">Tolak</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app>
