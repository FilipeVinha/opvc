
@extends('layouts.app')
@section('css')
    <script src="/ol/ol.js"></script>
@endsection
@section('content')

    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>  @lang('occurrences.map_title')</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('occurrences.map_containerTitle')</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="bs-example" data-example-id="simple-jumbotron">
                        <div>
                            <div id="map" class="map" style="height: 450px">
                                <div id="popup"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
                @if(count($events)>=1)
        var vectorSource = new ol.source.Vector({});
                @foreach($events as $event)
        var iconFeature = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.transform([{{$event->lng}}, {{$event->lat}}], 'EPSG:4326',
                    'EPSG:3857')),
                name: "{{$event->occurrence->occurrence}}" + "</br><a href='/events/details/{{$event->id}}'>Ver detalhes</a>",
                population: 4000,
                rainfall: 500
            });

        var iconStyle = new ol.style.Style({
            image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
                anchor: [0.5, 0.75],
                scale: 1,
                opacity: 0.75,
                src: '/ol/icons/{{$event->occurrence->category->icon}}.png'
            }))
        });
        iconFeature.setStyle(iconStyle);
        vectorSource.addFeature(iconFeature);

                @endforeach
        var vectorLayer = new ol.layer.Vector({
                source: vectorSource,
                style: iconStyle
            });
                @endif
        var rasterLayer = new ol.layer.Tile({
                source: new ol.source.TileJSON({
                    url: 'http://api.tiles.mapbox.com/v3/mapbox.geography-class.json'
                })
            });
        //                            CENTRAR O MAPA
        var map = new ol.Map({
            layers: [rasterLayer],
            target: document.getElementById('map'),
            view: new ol.View({
                center: ol.proj.transform([{{Config::get('config.lat')}}, {{Config::get('config.long')}}], 'EPSG:4326', 'EPSG:3857'),
                zoom: {{Config::get('config.zoom')}},
                minZoom: 0
            }),

            layers: [
                new ol.layer.Tile({
                    source: new ol.source.BingMaps({
                        imagerySet: 'Road',
                        key: 'AkGbxXx6tDWf1swIhPJyoAVp06H0s0gDTYslNWWHZ6RoPqMpB9ld5FY1WutX8UoF'
                    })
                }),
                {!! count($events)==0?'':'vectorLayer'!!}
            ]
        });

        var element = document.getElementById('popup');

        var popup = new ol.Overlay({
            element: element,
            positioning: 'bottom-center',
            stopEvent: false
        });
        popup.setOffset([0, -25]);
        map.addOverlay(popup);

        // display popup on click
        map.on('click', function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel,
                function (feature, layer) {
                    return feature;
                });
            if (feature) {
                var geometry = feature.getGeometry();
                var coord = geometry.getCoordinates();
                popup.setPosition(coord);
                $(element).attr('data-placement', 'top');
                $(element).attr('data-html', true);
                $(element).attr('data-content', feature.get('name'));
                $(element).popover('show');
            } else {
                $(element).popover('destroy');
            }
        });

        // change mouse cursor when over marker
        $(map.getViewport()).on('mousemove', function (e) {
            var pixel = map.getEventPixel(e.originalEvent);
            var hit = map.forEachFeatureAtPixel(pixel, function (feature, layer) {
                return true;
            });
            if (hit) {
                map.getTarget().style.cursor = 'pointer';
            } else {
                map.getTarget().style.cursor = '';
            }
        });
    </script>
@endsection