<div>
    <div class="d-none" id="map"></div>
    <div class="py-4">
        <div class="max-w-md p-2 mx-auto bg-white border border-gray-100 rounded-lg shadow md:max-w-xl lg:px-5 lg:">
            <div class="mb-4">
                <h3 class="text-4xl text-center text-gray-600">Tambah Data</h3>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="name">
                    name
                </label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="name" readonly value="{{Auth::user()->name}}" wire:model="name">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="email">
                    email
                </label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="email" readonly value="{{Auth::user()->email}}" wire:model="email">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="phone">
                    phone
                </label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="phone" type="text" placeholder="phone" readonly value="{{Auth::user()->phone}}" wire:model="phone">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="location">
                    location
                </label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="location" type="text" placeholder="location" wire:model="location">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="lat">
                    lat
                </label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="lat" type="text" placeholder="lat">
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="long">
                    long
                </label>
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="long" type="text" placeholder="long">
            </div>

            <div class="mb-4" x-data="data()">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="long">
                    Ruas Jalan
                </label>
                <input type="hidden" :value="selected" id="road" wire:model="road">
                <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" x-model="search" placeholder="Click to search..." @click="optionsVisible = !optionsVisible">
                <div x-show="optionsVisible" class="overflow-y-scroll shadow max-h-48">
                    <template x-for="option in filteredOptions()">
                        <a @click.prevent="selected = option; search=option; optionsVisible = false;@this.set('road', option);" x-text="option" class="block p-2 cursor-pointer hover:bg-gray-200"></a>
                    </template>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="flex flex-col col-span-1 mb-4 lg:items-center">
                    <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="photo">
                        photo
                    </label>
                    @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" class="object-cover w-full mb-3 border border-gray-200 rounded-md h-44">
                    @endif
                    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">

                    <label
                           class="flex flex-col items-center w-64 px-4 py-6 tracking-wide text-purple-600 uppercase transition-all duration-150 ease-linear bg-white border rounded-md shadow-md cursor-pointer border-blue hover:bg-purple-600 hover:text-white">
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type='file' class="hidden" wire:model="photo" />
                    </label>
                </div>
                <div class="flex flex-col col-span-1 mb-4 lg:items-center">
                    <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="photo2">
                        photo patokan jalan
                    </label>
                    @if ($photo2)
                    <img src="{{ $photo2->temporaryUrl() }}" class="object-cover w-full mb-3 border border-gray-200 rounded-md h-44">
                    @endif
                    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">

                    <label
                           class="flex flex-col items-center w-64 px-4 py-6 tracking-wide text-purple-600 uppercase transition-all duration-150 ease-linear bg-white border rounded-md shadow-md cursor-pointer border-blue hover:bg-purple-600 hover:text-white">
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type='file' class="hidden" wire:model="photo2" />
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="description">
                    description
                </label>
                <textarea wire:model="description" rows="3" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none resize-none focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Description"></textarea>
            </div>
            <div>
                <button wire:click="addData" class="w-full py-2 font-semibold text-white bg-green-500 rounded hover:bg-green-700">Lapor</button>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', ()=>{
          initialize()
        })

        const initialize = async ()=> {
          let lat = document.getElementById('lat');
          let long = document.getElementById('long');
          var geocoder = new google.maps.Geocoder;
          var infowindow = new google.maps.InfoWindow;


          navigator.geolocation.getCurrentPosition((position)=>{
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 8,
              center: {
                lat: position.coords.latitude,
              lng: position.coords.longitude
              }
            });
            console.log(position)
            lat.value = position.coords.latitude
            long.value = position.coords.longitude
            @this.set('lat',position.coords.latitude);
            @this.set('long',position.coords.longitude);
            geocodeLatLng(geocoder, map, infowindow, position.coords.latitude, position.coords.longitude);
          });
        }
        namajalan = document.getElementById("location");

        function geocodeLatLng(geocoder, map, infowindow, latt, lon) {

        // input = document.getElementById('latlng').value;
        // latlngStr = input.split(',', 2);
        // latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        var latlng = {
        lat: parseFloat(latt),
        lng: parseFloat(lon)
        };
        geocoder.geocode({
        'location': latlng
        },
        function(results, status) {
        if (status === 'OK') {
        if (results[1]) {
        map.setZoom(15);
        var marker = new google.maps.Marker({
        position: latlng,
        map: map
        });
        // (results[4].address_components[4].long_name === kab) {
        //
        // ('Bukan Jalan Sleman');
        // else {
        //
        // ('Bukan jasld Sleman');
        //

        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);
        } else {
        window.alert('No results found');
        }
        } else {
        window.alert('Geocoder failed due to: ' + status);
        }
        namajalan.value = infowindow.getContent();
        @this.set('location',infowindow.getContent());
        });
        }



        function data() {
        return {
        optionsVisible: false,
        search: "",
        selected: {
        label: "",
        value: ""
        },
        options: [
            'Jl. Sp. Tugu-Darussalam - Batas Aceh Besar, Kota Banda Aceh',
            'Jl. Batas Kota Banda Aceh - Sp.Lam Ateuk, Aceh Besar',
            'Jl. Lingkar Darussalam, Kota Banda Aceh',
            'Jl. Sp. Tujuh - Sp. Limpok, Kota Banda Aceh',
            'Jl. Ir. M.Taher, Kota Banda Aceh',
            'Jl. Ir. M.Taher, Aceh Besar',
            'Jl. Simpang Tiga - Keutapang Dua (Jalan Sudirman), Kota Banda Aceh',
            'Jl. Keutapang Dua - Mata Ie, Aceh Besar',
            'Jl. Sp. Lamreung - Cot Iri, Aceh Besar',
            'Jl. Sp. Cot Iri - Sp. Siron, Aceh Besar',
            'Jl. P. Nyak Makam I, Kota Banda Aceh',
            'Jl. P. Nyak Makam II, Kota Banda Aceh',
            'Jl. Mayjen T. Hamzah Bendahara, Kota Banda Aceh',
            'Jl. T.Iskandar (Banda Aceh - Batas Aceh Besar), Kota Banda Aceh',
            'Jl. Batas Banda Aceh - Blang Bintang, Aceh Besar',
            'Jl. Blang Bintang - Krueng Raya, Aceh Besar',
            'Jl. Kota Jantho - Alue Glong, Aceh Besar',
            'Jl. Jantho - Batas Aceh Jaya, Aceh Besar',
            'Jl. Batas Aceh Besar - Lamno, Aceh Jaya',
            'Jl. Keliling Pulo Breuh, Aceh Besar',
            'Jl. Krueng Raya - Batas Pidie, Aceh Besar',
            'Jl. Batas Aceh Besar - Tibang, Pidie',
            'Jl. Lingkar Kota Sigli, Pidie',
            'Jl. Lingkar Kota Sigli, Pidie',
            'Jl. Perintis, Pidie',
            'Jl. Cut Meutia, Pidie',
            'Jl. Perdagangan, Pidie',
            'Jl. Samudera, Pidie',
            'Jl. Iskandar Muda (Sigli), Pidie',
            'Jl. Peukan Pidie - Jabal Ghafur - Ujung Rimba - Bili Aron, Pidie',
            'Jl. Sp. Bili Aron -Teupin Raya, Pidie',
            'Jl. Sigli - Sp. Tiga - Kb. Tanjong - Teupin Raya, Pidie',
            'Jl. Geumpang - Batas Aceh Barat, Pidie',
            'Jl. Batas Pidie - Meulaboh, Aceh Barat',
            'Jl. Sp.Turu - Lutung - Geumpang, Pidie',
            'Jl. Trieng Gadeng - Batas Bireuen, Pidie Jaya',
            'Jl. Batas Pidie Jaya - Samalanga, Bireuen',
            'Jl. Samalanga - Sp. Samalanga, Bireuen',
            'Jl. Sp. Pangwa - Dayah Pangwa, Pidie Jaya',
            'Jl. Meureudeu - Babah Jurong, Pidie Jaya',
            'Jl. Krueng Geukueh - Batas Bener Meriah, Aceh Utara',
            'Jl. Batas Aceh Utara - Bandara Rembele, Bener Meriah',
            'Jl. Bandara Rembele - Batas Aceh Tengah, Bener Meriah',
            'Jl. Batas Bener Meriah - Sp. Kebayakan, Aceh Tengah',
            'Jl. Sp. Kebayakan - Bintang, Aceh Tengah',
            'Jl. Bintang - Sp.Kraft, Aceh Tengah',
            'Jl. Lhoksukon - Cot Girek, Aceh Utara',
            'Jl. Sp. Tiga Redelong- Pondok Baru - Samar Kilang, Bener Meriah',
            'Jl. Geudong - Makam Malikussaleh - Mancang, Aceh Utara',
            'Jl. Lingkar Kota Redelong (Bener Meriah), Bener Meriah',
            'Jl. Cunda - Lhokseumawe, Kota Lhokseumawe',
            'Jl. Peureulak - Lokop - Batas Gayo Lues, Aceh Timur',
            'Jl. Batas Aceh Timur-Pining - Blangkejeren, Gayo Lues',
            'Jl. Batas Aceh Timur - Kota Karang Baru, Aceh Tamiang',
            'Jl. Lingkar Kota Langsa, Kota Langsa',
            'Jl. Blangkejeren - Tongra - Batas Aceh Barat Daya, Gayo Lues',
            'Jl. Batas Gayo Lues - Babah Roet, Aceh Barat Daya',
            'Jl. Takengon - Sp. Kebayakan, Aceh Tengah',
            'Jl. Takengon - Bintang, Aceh Tengah',
            'Jl. Isaq - Jagong Jeget - Sp. Gelelungi, Aceh Tengah',
            'Jl. Sp.Lawe Deski - Muara Situlen - Batas Kota Subulussalam, Aceh Tenggara',
            'Jl. Batas Aceh Tenggara - Gelombang, Kota Subulussalam',
            'Jl. Krueng Luas - Batas Kota Subulussalam, Aceh Selatan',
            'Jl. Batas Aceh selatan - Rundeng, Kota Subulussalam',
            'Jl. Subulussalam - Rundeng, Kota Subulussalam',
            'Jl. Gunung Kapur - Trumon, Aceh Selatan',
            'Jl. Trumon - Batas Singkil, Aceh Selatan',
            'Jl. Batas Aceh Selatan - Kuala Baru - Singkil - Telaga Bakti, Aceh Singkil',
            'Jl. Trumon - Pulo Paya, Aceh Selatan',
            'Jl. Lipat Kajang - Telaga Bakti, Aceh Singkil',
            'Jl. Sp. Siomping - Keras - Batas Sumatera Utara, Aceh Singkil',
            'Jl. Pulau Balai-Pulau Ujung Batu, Aceh Singkil',
            'Jl. Pulau Ujung Batu - Teluk Nibung, Aceh Singkil',
            'Jl. Blangpidie - Cot Mane, Aceh Barat Daya',
            'Jl. Kuala Tuha - Lamie, Nagan Raya',
            'Jl. Sentosa, Aceh Barat',
            'Jl. Pribue - Kuala Bee - Sp. Suak Timah, Aceh Barat',
            'Jl. Kuala Bubon - Pinem, Aceh Barat',
            'Jl. Aneuk Laot - Balohan, Kota Sabang',
            'Jl. Sinabang - Sibigo, Simeulue',
            'Jl. Nasreuhe - Lewak - Sibigo, Simeulue',
        ],
        filteredOptions() {
        return this.options.filter((option) => {
        return option.toLowerCase().includes(this.search.toLowerCase());
        });
        }
        };
        }
    </script>
</div>
