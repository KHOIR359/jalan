
<div>
    <div class="d-none" id="map"></div>
    <div class="py-4">
        <div class="max-w-md p-2 pb-4 mx-2 bg-white border border-gray-100 rounded-lg shadow md:mx-auto md:max-w-xl lg:px-5 lg:">
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


            <div class="grid grid-cols-1 lg:grid-cols-2" x-data="{img: `{{asset('img/contoh.jpg')}}`}">

                <div class="flex flex-col col-span-1 mb-4 lg:items-center">
                    <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="photo">
                        photo
                    </label>
                    @if ($photo)
                    <img onclick="document.getElementById('labelInput').click()" src="{{ $photo->temporaryUrl() }}" class="object-cover w-full mb-3 border border-gray-200 rounded-md h-44">

                    @endif
                    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">

                    <label
                           class="@if ($photo) hidden @endif flex flex-col items-center w-64 px-4 py-6 tracking-wide text-purple-600 uppercase transition-all duration-150 ease-linear bg-white border rounded-md shadow-md cursor-pointer border-blue hover:bg-purple-600 hover:text-white">
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input id="labelInput" type='file' class="hidden" wire:model="photo" />
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-semibold text-gray-700 capitalize" for="description">
                    description
                </label>
                <textarea required wire:model="description" rows="3" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none resize-none focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Deskripsi untuk kerusakan jalan atau lokasi lebih rinci"></textarea>
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





    </script>
</div>
