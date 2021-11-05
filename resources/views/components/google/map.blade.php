<div>
    <div class="relative h-96" id="map"></div>


    <script>
        function initialize() {
            // Variabel untuk menyimpan informasi (desc)
            var infoWindow = new google.maps.InfoWindow; // informasi lokasi atau deskripsi diambil dari database

            //  Variabel untuk menyimpan peta Roadmap
            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP // disini Lat long disimpan untuk lokasi jalan
            }

            // Pembuatan petanya
            var map = new google.maps.Map(document.getElementById('map'),
                mapOptions); // mapOptions untuk lokasi log,lat , getElementById('map')
            // Variabel untuk menyimpan batas kordinat
            var bounds = new google.maps.LatLngBounds();
            // Pengambilan data dari database
            @isset($laporan)
                @if ($laporan)
                    @foreach ($laporan as $lapor)
                        addMarker({!! $lapor['lat'] !!}, {!! $lapor['long'] !!}, `<b>Pelapor : {!! $lapor['email'] !!} <br><b>Tanggal
                                Laporan : {{ $lapor['created_at'] }} <br>Latitude : {{ $lapor['lat'] }}</br>Longitude :
                                {{ $lapor['long'] }}<br> `,
                                @if ($lapor['status'] == 0)
                                    '{{ asset('markers/yellow_MarkerA.png') }}'

                                @elseif($lapor['status'] == 1)
                                    '{{ asset('markers/green_MarkerA.png') }}'
                                @elseif($lapor['status'] == -1)
                                    '{{ asset('markers/red_MarkerA.png') }}'

                                @endif
                                );
                    @endforeach
                @endif
            @endisset

            @isset($lapor)
                @if ($lapor)
                    addMarker({!! $lapor['lat'] !!}, {!! $lapor['long'] !!}, `<b>Pelapor : {!! $lapor['email'] !!} <br><b>Tanggal
                            Laporan
                            : {{ $lapor['created_at'] }} <br>Latitude : {{ $lapor['lat'] }}</br>Longitude :
                            {{ $lapor['long'] }}<br> `,
                            @if ($lapor['status'] == 0)
                                '{{ asset('markers/yellow_MarkerA.png') }}'

                            @elseif($lapor['status'] == 1)
                                '{{ asset('markers/green_MarkerA.png') }}'
                            @elseif($lapor['status'] == -1)
                                '{{ asset('markers/red_MarkerA.png') }}'

                            @endif
                            );
                        @else
                @endif
            @endisset

            function addMarker(lat, lng, info, icon, id) {
                var lokasi = new google.maps.LatLng(lat, lng);
                bounds.extend(lokasi);
                var marker = new google.maps.Marker({
                    map: map,
                    position: lokasi,
                    icon: icon,
                    animation: google.maps.Animation.DROP,
                });
                map.fitBounds(bounds);
                bindInfoWindow(marker, map, infoWindow, info, id);
            }

            function bindInfoWindow(marker, map, infoWindow, html, id) {
                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                    Pelapor.value = id;
                });
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</div>
