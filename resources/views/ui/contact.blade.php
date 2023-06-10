<!--Including main layouts-->
@extends('layouts.main')

@section('title','Nous Contacter')
@section('meta')
    <!--balise meta ici-->
@endsection
@push('custom_css') @endpush
@section('content')
<!--Start Page Banner-->
<div class="page-banner-area " style="height:20px!important;background-image:url('{{ asset(siteInfos()->getBg()) }}')">
    <div class="container">
        <div class="page-banner-content">
            <h1>Contactez-nous</h1>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</div>
<!--End Page Banner-->

<!--Start Contact Us Area-->
<div class="contact-us-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contacts-form">
                    <h3>Laissez-nous un message</h3>
                    <!-- Contact Message start -->
                    <div class="global-message info d-none"></div>
                    <!--End Contact Message-->
                    <form id="contactForm" method="POST" onsubmit="return false" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control" required data-error="Please enter your name" placeholder="Votre nom complet">
                                    <div class="help-block with-errors error text-danger fullname"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Votre Adresse email">
                                    <div class="help-block with-errors error text-danger email"></div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Votre Sujet">
                                    <div class="help-block with-errors error text-danger subject"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="saisissez votre message..."></textarea>
                                    <div class="help-block with-errors error text-danger message"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" id="send-message-btn" class="default-btn">Envoyer le message<span></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-and-address">
                    <h2>Ukatesh contact</h2>
                    <p>
                        Bienvenu sur cette page, vous avez besoins d'informations sur nous ?
                        n'hésitez pas de nous contacter via tous les moyens disponibles sur cette page!
                    </p>
                    <div class="contact-and-address-content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="contact-card">
                                    <div class="icon">
                                        <i class="ri-phone-line"></i>
                                    </div>


                                    <h4>Informations de Contact</h4>
                                    <p><b>N° Téléphone</b></p>
                                    <p><a href="tel:+243819002615">+243(0)81-900-2615</a></p>
                                    <p><b>Adresse électronique</b></p>
                                    <p><a href="mailto:contact@ukatesh.org">info@ukatesh.org</a></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="contact-card" style="text-align: left;line-height:0px">
                                    <div class="icon">
                                        <i class="ri-map-pin-line"></i>
                                    </div>
                                    <h4>Adresse Physique</h4>
                                    <p>Avenue Lumande</p>
                                    <p>Quartier Latin</p>
                                    <p>Commune de Manika</p>
                                    <p>Ville de Kolwezi</p>
                                    <p>RDC, Province du Lualaba</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="social-media">
                        <h3>Ukatesh Réseaux Sociaux</h3>
                        <p>
                            En cours de développement ...
                        </p>
                        <ul>
                            <li>
                                <a href="javascript:void(0)" target="_blank"><i class="flaticon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" target="_blank"><i class="flaticon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" target="_blank"><i class="flaticon-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" target="_blank"><i class="flaticon-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Contact Us Area-->

@endsection
@push('custom_js')
    <script>
        let clearData=(parent,elements)=>{
            elements.forEach(element=>{
                $(parent).find("[name='"+element+"']").val('');

            })
        }

        $(document).on('click','#send-message-btn',(e)=>{
            e.preventDefault()
            let $this=e.target;

            let crsf_token=$($this).parents("form").find("input[name='_token']").val()
            let fullname=$($this).parents("form").find("input[name='fullname']").val()
            let email=$($this).parents("form").find("input[name='email']").val()
            let subject=$($this).parents("form").find("input[name='subject']").val()
            let message=$($this).parents("form").find("textarea[name='message']").val()
            console.log(crsf_token);
            console.log(message);


            let formData= new FormData();
            formData.append('_token',crsf_token);
            formData.append('fullname',fullname);
            formData.append('email',email);
            formData.append('subject',subject);
            formData.append('message',message);

            $.ajax({
                url:"{{ route('contact.store') }}",
                data:formData,
                type:'POST',
                datatype:'JSON',
                processData:false,
                contentType:false,
                success: function (data) {
                    //console.log(data)
                    if(data.success){
                        $(".global-message").removeClass('d-none');
                        $(".global-message").addClass('alert alert-info');
                        $(".global-message").text(data.message);
                        clearData($($this).parents("form"),['fullname','email','subject','message']);
                        setTimeout( ()=>{
                            $('.global-message').fadeOut()
                        },5000)
                    }
                    else{
                        for(const error in data.errors)
                        {
                            $("div."+error).text(data.errors[error])
                        }
                    }
                }
            })
        })
    </script>
@endpush

