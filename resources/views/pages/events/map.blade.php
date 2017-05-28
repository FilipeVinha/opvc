@extends('layouts.app')
@section('css')
    <script src="/ol/ol.js"></script>
@endsection
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="box box-default" role="main">
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h2>@lang('occurrences.map_containerTitle')</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="box-body">

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

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">@lang('user.user_saveDefaultPositionTitle')</h4>
                </div>
                <div class="modal-body">

                    <p>@lang('user.user_saveDefaultPositionMessage')</p>
                    <p id="localizacao"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info"
                            id="default">@lang('user.user_saveDefaultPositionDefault')</button>
                    <button type="button" class="btn btn-primary"
                            id="save">@lang('user.user_saveDefaultPositionSave')</button>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/osm/OpenLayers.js"></script>
    <script>
        $(document).ready(function () {
            $("#group-event").addClass("active");
            $("#group-event-map").addClass("active");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

    </script>
    <script>
        var localizacao;
        var user = {{Auth::User()->id}};
        var lat = {{Auth::User()->profile->lat}};
        var lon = {{Auth::User()->profile->lon}};

        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());

        epsg4326 = new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
        projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)

                {{--var lonLat = new OpenLayers.LonLat({{Config::get('config.lat')}}, {{Config::get('config.long')}}).transform(epsg4326, projectTo);--}}
        var lonLat = new OpenLayers.LonLat(lon, lat).transform(epsg4326, projectTo);


        var zoom = 14;
        map.setCenter(lonLat, zoom);

        var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
        //init array
        // Define markers as "features" of the vector layer:
                @foreach($events as $event)
        var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point({{$event->lng}}, {{$event->lat}}).transform(epsg4326, projectTo),
            {description: "{{$event->occurrence->occurrence}}" + "</br><a href='/events/details/{{$event->id}}'>Ver detalhes</a>",},
            {
                externalGraphic: '/ol/icons/{{$event->occurrence->category->icon}}.png',
                graphicHeight: 35,
                graphicWidth: 35,
                graphicXOffset: 0,
                graphicYOffset: -25
            }
            );
        vectorLayer.addFeatures(feature);
        // end array
        map.addLayer(vectorLayer);
        @endforeach

        //Add a selector control to the vectorLayer with popup functions
        var controls = {
            selector: new OpenLayers.Control.SelectFeature(vectorLayer, {
                onSelect: createPopup,
                onUnselect: destroyPopup
            }),
        };

        function createPopup(feature) {
            feature.popup = new OpenLayers.Popup.FramedCloud("pop",
                feature.geometry.getBounds().getCenterLonLat(),
                null,
                '<div class="markerContent">' + feature.attributes.description + '</div>',
                null,
                true,
                function () {
                    controls['selector'].unselectAll();
                }
            );
            //feature.popup.closeOnMove = true;
            map.addPopup(feature.popup);
        }

        function destroyPopup(feature) {
            feature.popup.destroy();
            feature.popup = null;
        }
        map.events.register("click", map, function (evt) {

            var lonlat = map.getLonLatFromViewPortPx(evt.xy);
            localizacao = new OpenLayers.LonLat(lonlat.lon, lonlat.lat).transform('EPSG:3857', 'EPSG:4326');

            $.ajax({
                type: "get",
                url: ' //nominatim.openstreetmap.org/reverse?format=xml&lat=' + localizacao.lat + '&lon=' + localizacao.lon + '&zoom=18&format=json',
                success: function (result) {

                    var local = result.address.road + ', ' + result.address.city_district + ', ' + result.address.county;
                    $('#localizacao').text(local);
                    $('.modal').modal('show');
                }
            });


        });
        map.addControl(controls['selector']);
        controls['selector'].activate();

        $("#save").click(function () {
            $('.modal').modal('hide');


            $.ajax({
                type: "POST",
                url: '/user/profile/mapcenter',
                data: {'lon': localizacao.lon, 'lat': localizacao.lat, 'user': user},
                success: function (result) {
                }
            });
        });
        $("#default").click(function () {
            var lat = {{Config::get('config.lat')}};
            var lon = {{Config::get('config.long')}};


            $('.modal').modal('hide');
            $.ajax({
                type: "POST",
                url: '/user/profile/mapcenter',
                data: {'lon': lon, 'lat': lat, 'user': user},
                success: function (result) {
                    alert(result);
                }
            })
            ;
        });
    </script>
@endsection