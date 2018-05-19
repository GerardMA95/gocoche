@extends('web.layout.master')

@section('title', 'Quality luxe cars')

@section('style')
    @parent
@endsection
@section('header-main')
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url({{ asset('images/web/main/testMap.jpg') }});">
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
                    <form role="form" id="contact-form" method="post">
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Su nombre</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmails" class="bmd-label-floating">Su correo electrónico</label>
                            <input type="email" class="form-control" id="exampleInputEmails">
                            <span class="bmd-help">No guardemos su correo para fines comerciales ni lo compartiremos con nadie.</span>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="bmd-label-floating">Teléfono</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group label-floating">
                            <label class="form-control-label bmd-label-floating" for="message">Mensaje</label>
                            <textarea class="form-control" rows="6" id="message"></textarea>
                        </div>
                        <div class="submit text-center">
                            <input type="submit" class="btn btn-primary btn-raised btn-round" value="Enviar">
                        </div>
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
@endsection