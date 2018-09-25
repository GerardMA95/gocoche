@extends('web.layout.master')

@section('title', 'Quality luxe cars')

@section('style')
    @parent
@endsection
@section('header-main')
    <div id="map" class="page-header header-small" data-parallax="true">
    </div>
@endsection
@section('section-name', 'contact-us')
@section('main')
    <div class="contact-content">
        <div class="container">
            <h2 class="title">Contacto</h2>
            <div class="row">
                <div class="col-md-6">
                    <p class="description">Estaremos encantados de responder cualquier correo relacionado con nuestros productos.
                        <br>
                        <br>
                    </p>
                    <form action="{{ route('contactSendEmail') }}" class="form needs-validation" novalidate role="form" id="contact-form" method="post">
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Su nombre</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            <div class="invalid-tooltip">
                                Introduzca su nombre, por favor.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmails" class="bmd-label-floating">Su correo electrónico</label>
                            <input type="email" name="email_from" class="form-control" id="exampleInputEmails" required>
                            <div class="invalid-tooltip">
                                Introduzca su correo electrónico, por favor.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Asunto</label>
                            <input type="text" name="subject" class="form-control" id="name" required>
                            <div class="invalid-tooltip">
                                Introduzca el asunto del mensaje, por favor.
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label class="form-control-label bmd-label-floating" for="message">Mensaje</label>
                            <textarea class="form-control" name="message" rows="6" id="message" required></textarea>
                            <div class="invalid-tooltip">
                                Introduzca el mensaje que quiere mandar, por favor.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="bmd-label-floating">Teléfono</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>
                        <div class="submit text-center pt-3">
                            <input type="submit" class="btn btn-primary btn-raised btn-round" value="Enviar">
                        </div>
                        {!! csrf_field() !!}
                    </form>
                </div>
                <div class="col-md-4 ml-auto">
                    <div class="info info-horizontal">
                        <div class="icon icon-primary">
                            <i class="material-icons">pin_drop</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">¿Dónde encontrarnos?</h4>
                            <p> N-340, 407
                                <br> 43830 Torredembarra,
                                <br> Tarragona
                            </p>
                        </div>
                    </div>
                    <div class="info info-horizontal">
                        <div class="icon icon-primary">
                            <i class="material-icons">phone</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">¡Llámanos!</h4>
                            <p> Juanjo Rebollo
                                <br> <a href="tel:671328659">671 328 659</a>
                                <br> <a href="tel:977075712">977 075 712</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
        var map;
        function initMap() {
            var qualityCarLocation = {lat: 41.1525223, lng: 1.4247942};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: qualityCarLocation
            });

            var infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);

            service.getDetails({
                placeId: 'ChIJn1-bRnXxoxIRD77Y_A8dTXU'
            }, function(place, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: place.geometry.location
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                            place.formatted_address + '</div>');
                        infowindow.open(map, this);
                    });
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAyHeMT43jKh8ky9UCVDErReznStKSae4&libraries=places&callback=initMap"
            async defer></script>
@endsection