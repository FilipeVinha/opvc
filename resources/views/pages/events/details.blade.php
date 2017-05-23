@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    <link href="/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <link href="\vendors\bootstrap-wysiwyg\css\style.css" rel="stylesheet">

@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{$event->address}}</h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="row">
                                    <div class="content">
                                        <section class="panel">
                                            <div class="x_title">
                                                <h2>@lang('occurrences.details_containerPhotos')
                                                </h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="slider-for photos">
                                                    @foreach($event->photos as $photo)
                                                        <div><img src="/photos/{{$photo->photo}}"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="content">
                                        <section class="panel">
                                            <div class="x_title">
                                                <h2>@lang('occurrences.details_containerObs')
                                                </h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <div id="alerts"></div>
                                                {{--AQUI--}}
                                                <div class="btn-toolbar" data-role="editor-toolbar"
                                                     data-target="#editor">
                                                    <div class="btn-group">
                                                        <a class="btn btn-default dropdown-toggle"
                                                           data-toggle="dropdown" title="Font Size"><i
                                                                    class="fa fa-text-height"></i>&nbsp;<b
                                                                    class="caret"></b></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a data-edit="fontSize 5" class="fs-Five">Huge</a></li>
                                                            <li><a data-edit="fontSize 3" class="fs-Three">Normal</a>
                                                            </li>
                                                            <li><a data-edit="fontSize 1" class="fs-One">Small</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a class="btn btn-default" data-edit="bold"
                                                           title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                                        <a class="btn btn-default" data-edit="italic"
                                                           title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                                        <a class="btn btn-default" data-edit="strikethrough"
                                                           title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                                        <a class="btn btn-default" data-edit="underline"
                                                           title="Underline (Ctrl/Cmd+U)"><i
                                                                    class="fa fa-underline"></i></a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a class="btn btn-default" data-edit="insertunorderedlist"
                                                           title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                                        <a class="btn btn-default" data-edit="insertorderedlist"
                                                           title="Number list"><i class="fa fa-list-ol"></i></a>
                                                        <a class="btn btn-default" data-edit="outdent"
                                                           title="Reduce indent (Shift+Tab)"><i
                                                                    class="fa fa-outdent"></i></a>
                                                        <a class="btn btn-default" data-edit="indent"
                                                           title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a class="btn btn-default" data-edit="justifyleft"
                                                           title="Align Left (Ctrl/Cmd+L)"><i
                                                                    class="fa fa-align-left"></i></a>
                                                        <a class="btn btn-default" data-edit="justifycenter"
                                                           title="Center (Ctrl/Cmd+E)"><i
                                                                    class="fa fa-align-center"></i></a>
                                                        <a class="btn btn-default" data-edit="justifyright"
                                                           title="Align Right (Ctrl/Cmd+R)"><i
                                                                    class="fa fa-align-right"></i></a>
                                                        <a class="btn btn-default" data-edit="justifyfull"
                                                           title="Justify (Ctrl/Cmd+J)"><i
                                                                    class="fa fa-align-justify"></i></a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a class="btn btn-default dropdown-toggle"
                                                           data-toggle="dropdown" title="Hyperlink"><i
                                                                    class="fa fa-link"></i></a>
                                                        <div class="dropdown-menu input-append">
                                                            <input placeholder="URL" type="text"
                                                                   data-edit="createLink"/>
                                                            <button class="btn" type="button">Add</button>
                                                        </div>
                                                    </div>

                                                    <div class="btn-group">
                                                        <a class="btn btn-default" data-edit="undo"
                                                           title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                                        <a class="btn btn-default" data-edit="redo"
                                                           title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                                        <a class="btn btn-default" data-edit="html"
                                                           title="Clear Formatting"><i
                                                                    class='glyphicon glyphicon-pencil'></i></a>
                                                    </div>
                                                </div>
                                                <div id="editor" class="lead "></div>
                                                <button type="button" class="btn btn-warning"
                                                        onclick="cancelReview()">@lang('occurrences.events_cleanReview')</button>
                                                <button type="button" onclick="sendReview()"
                                                        class="btn btn-success">@lang('occurrences.events_newReview')</button>

                                                <div class="clearfix"></div>
                                                <ul class="messages" id="messages">
                                                    @foreach($event->reviews as $review)
                                                        <li>
                                                            <img src="/images/user.png" class="avatar" alt="Avatar">
                                                            <div class="message_date">
                                                                <h3 class="date text-info">{{date("d", strtotime($review->created_at))}}</h3>
                                                                <p class="month">{{date("M", strtotime($review->created_at))}}</p>
                                                            </div>
                                                            <div class="message_wrapper">
                                                                <h4 class="heading">{{$review->user->name}}</h4>
                                                                <blockquote class="message">{!! $review->review !!}
                                                                </blockquote>
                                                                <br>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </section>
                                    </div>
                                </div>


                            </div>

                            <!-- start project-detail sidebar -->
                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <section class="panel">

                                    <div class="x_title">
                                        <h2>@lang('occurrences.details_description')
                                        </h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="project_detail">

                                            <p class="title">@lang('occurrences.details_address')</p>
                                            <p>{{$event->address}}</p>
                                            <p class="title">@lang('occurrences.details_category')</p>
                                            <p>{{$event->occurrence->category->category}}</p>
                                            <p class="title">@lang('occurrences.details_subCategory')</p>
                                            <p>{{$event->occurrence->occurrence}}</p>
                                            <p class="title">@lang('occurrences.details_title')</p>
                                            <p>{{$event->lat}}, {{$event->lng}}</p>
                                            <p class="title">@lang('occurrences.details_registerBy')</p>
                                            <p>{{$event->user->name}}</p>
                                            <p class="title">@lang('occurrences.details_createdAt')</p>
                                            <p>{{$event->created_at}}</p>
                                        </div>

                                        <br/>
                                        <h5 class="title">@lang('occurrences.details_map')</h5>
                                        <div id="mapdiv" class="mapdiv" style="height: 450px">
                                            {{--<div id="popup"></div>--}}
                                        </div>
                                        <br/>

                                        {{--<div class="text-center mtop20">--}}
                                        {{--<a href="#" class="btn btn-sm btn-primary">Add files</a>--}}
                                        {{--<a href="#" class="btn btn-sm btn-warning">Report contact</a>--}}
                                        {{--</div>--}}
                                    </div>

                                </section>

                            </div>
                            <!-- end project-detail sidebar -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="/vendors/google-code-prettify/src/prettify.js"></script>
    <script src="/vendors/bootstrap-wysiwyg/src/bootstrap-wysiwyg.js"></script>

    <script src="/osm/OpenLayers.js"></script>
    <script>
        map = new OpenLayers.Map("mapdiv");
        map.addLayer(new OpenLayers.Layer.OSM());

        epsg4326 = new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
        projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)

        var lonLat = new OpenLayers.LonLat({{$event->lng}}, {{$event->lat}}).transform(epsg4326, projectTo);


        var zoom = 14;
        map.setCenter(lonLat, zoom);

        var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
        //init array
        // Define markers as "features" of the vector layer:
        var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point({{$event->lng}}, {{$event->lat}}).transform(epsg4326, projectTo),
            {description: "{{$event->occurrence->occurrence}}" + "</br><a href='/events/details/{{$event->id}}'>Ver detalhes</a>",},
            {
                externalGraphic: '/ol/icons/{{$event->occurrence->category->icon}}.png',
                graphicHeight: 35,
                graphicWidth: 35,
                graphicXOffset: -0,
                graphicYOffset: -10
            }
        );
        vectorLayer.addFeatures(feature);
        // end array
        map.addLayer(vectorLayer);


        //Add a selector control to the vectorLayer with popup functions
        var controls = {
            selector: new OpenLayers.Control.SelectFeature(vectorLayer, {
                onSelect: createPopup,
                onUnselect: destroyPopup
            })
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

        map.addControl(controls['selector']);
        controls['selector'].activate();

    </script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: true,
                dots: true
            });

        });

    </script>

    <script>
        function sendReview() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var review = $('#editor').cleanHtml();
            var user = {{Auth::User()->id}};
            var event = {{$event->id}};


            $.ajax({
                type: "POST",
                url: '/events/setReview',
                data: {'review': review, 'user': user, 'event': event},
                success: function (result) {
                    var obj = jQuery.parseJSON(result);
                    $("#messages").prepend(obj.reviews);
                    document.getElementById("editor").innerHTML = "";
                },
                error: function () {
                    alert('failure');
                }
            });
        }
    </script>



    <script type='text/javascript'>
        $('#editor').wysiwyg();

        $(".dropdown-menu > input").click(function (e) {
            e.stopPropagation();
        });
    </script>

    <script>
        function cancelReview() {
            document.getElementById("editor").innerHTML = "";
        }
    </script>
@endsection