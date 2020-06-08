@extends('layout')

@section('content')
<style>

  
.modal-open {
  overflow: hidden;
}

.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto;
}

.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: none;
  overflow: hidden;
  outline: 0;
}

.modal-dialog {
  position: relative;
  width: auto;
  margin: 0.5rem;
  pointer-events: none;
}

.modal.fade .modal-dialog {
  -webkit-transition: -webkit-transform 0.3s ease-out;
  transition: -webkit-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
  -webkit-transform: translate(0, -25%);
          transform: translate(0, -25%);
}

@media screen and (prefers-reduced-motion: reduce) {
  .modal.fade .modal-dialog {
    -webkit-transition: none;
    transition: none;
  }
}

.modal.show .modal-dialog {
  -webkit-transform: translate(0, 0);
          transform: translate(0, 0);
}

.modal-dialog-centered {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  min-height: calc(100% - (0.5rem * 2));
}

.modal-dialog-centered::before {
  display: block;
  height: calc(100vh - (0.5rem * 2));
  content: "";
}

.modal-content {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.2);
  outline: 0;
}

.modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  background-color: #000;
}

.modal-backdrop.fade {
  opacity: 0;
}

.modal-backdrop.show {
  opacity: 0.5;
}

.modal-header {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
      -ms-flex-align: start;
          align-items: flex-start;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  padding: 1rem;
  border-bottom: 1px solid #e9ecef;
}

.modal-header .close {
  padding: 1rem;
  margin: -1rem -1rem -1rem auto;
}

.modal-title {
  margin-bottom: 0;
  line-height: 1.6;
}

.modal-body {
  position: relative;
  -webkit-box-flex: 1;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
  padding: 1rem;
}

.modal-footer {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: end;
      -ms-flex-pack: end;
          justify-content: flex-end;
  padding: 1rem;
  border-top: 1px solid #e9ecef;
}

.modal-footer > :not(:first-child) {
  margin-left: .25rem;
}

.modal-footer > :not(:last-child) {
  margin-right: .25rem;
}

.modal-scrollbar-measure {
  position: absolute;
  top: -9999px;
  width: 50px;
  height: 50px;
  overflow: scroll;
}

@media (min-width: 576px) {
  .modal-dialog {
    max-width: 500px;
    margin: 1.75rem auto;
  }

  .modal-dialog-centered {
    min-height: calc(100% - (1.75rem * 2));
  }

  .modal-dialog-centered::before {
    height: calc(100vh - (1.75rem * 2));
  }

  .modal-sm {
    max-width: 300px;
  }
}

@media (min-width: 992px) {
  .modal-lg {
    max-width: 800px;
  }
}

.modal-content .modal-body form .input-group-prepend .input-group-text {
  background: transparent;
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
  border-color: rgba(218, 178, 254, 0.29);
  border-right: 1px solid transparent;
}

.modal-content .modal-body form .input-group input {
  background-color: transparent;
  height: 42px;
  border-bottom-right-radius: 6px;
  border-top-right-radius: 6px;
  border-color: rgba(218, 178, 254, 0.29);
  border-left: 1px solid transparent;
  color: #fff;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
}

.modal-content .modal-body form .input-group input:focus {
  -webkit-box-shadow: none;
          box-shadow: none;
}

.modal-content .modal-body form .input-group input::-webkit-input-placeholder {
  color: #fff;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  font-weight: 700;
}

.modal-content .modal-body form .input-group input::-ms-input-placeholder {
  color: #fff;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  font-weight: 700;
}

.modal-content .modal-body form .input-group input::placeholder {
  color: #fff;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  font-weight: 700;
}

.modal-content .modal-body form .input-group .btn-ingresa {
  display: block;
  width: 100%;
  padding: 10px;
  font-weight: 900;
  font-family: 'Lato', sans-serif;
  margin: auto;
}

@media (max-width: 320px) {
  section h2 {
    font-size: 20px;
  }
}

.mapa-distri-icono {
  position: absolute;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
  color: white !important;
  width: 60px;
  height: 63px;
  -webkit-box-shadow: 1px 4px 5px #1b1b1b36;
  box-shadow: 1px 4px 5px #1b1b1b36;
  font-size: 22px;
  z-index: 1;
  padding-top: 18px;
  padding-left: 26px;
  font-size: 18px;
  top: 0;
  bottom: 0;
  margin: auto;
  display: none;
}

.maps__content--bottom--listado::-webkit-scrollbar {
  width: 3px;
  border-radius: 5px;
}

/* Track */

.maps__content--bottom--listado::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */

.maps__content--bottom--listado::-webkit-scrollbar-thumb {
  background: #f99300;
}

/* Handle on hover */

.maps__content--bottom--listado::-webkit-scrollbar-thumb:hover {
  background: #ff9803;
}

@media (min-width: 768px) and (max-width: 910px) {
  .maps__content {
    width: 40%;
    left: 2%;
  }

  .maps__content--bottom--listado--item .item__content__card span {
    font-size: 11px;
    line-height: 15px;
  }

  .maps__content--bottom--listado--item .item__content h3 {
    font-size: 14px;
  }
}

@media (min-width: 911px) and (max-width: 1024px) {
  .maps__content {
    width: 36%;
    left: 4%;
  }
}

.ocultarcuadro {
  -webkit-transform: translate(-660px);
  transform: translate(-660px);
}

.mostrarcuadro {
  -webkit-transform: translateX(0px) !important;
          transform: translateX(0px) !important;
}

@media (max-width: 767px) {
  .mapa-distri-icono {
    display: block;
  }

  .maps #map {
    height: 85vh;
  }

  .maps__content {
    width: 66%;
    height: 50vh;
    border-radius: 10px;
    left: 0;
    z-index: 1;
    -webkit-transition: all 0.7s;
    transition: all 0.7s;
    -webkit-transform: translate(-660px);
    transform: translate(-660px);
  }

  .maps__content--top {
    padding: 17px 27px;
  }

  .maps__content--bottom--listado {
    height: 42vh;
  }

  .maps__content--bottom--listado--item .item__content {
    padding: 10px 25px;
  }

  .maps__content--bottom--listado--item .item__content__card span {
    font-size: 10px;
  }

  .maps__content--bottom--listado--item .item__content h3 {
    font-size: 14px;
  }

  .contacto {
    padding: 50px 15px;
  }
}

@media (max-width: 425px) {
  .maps__content--top h2 {
    margin-top: 3px;
  }

  .maps #map {
    height: 80vh;
  }

  .maps__content {
    width: 80%;
    height: 60vh;
    border-radius: 10px;
  }

  .maps__content--top {
    padding: 17px 27px;
  }

  .maps__content--bottom--listado {
    height: 48vh;
  }

  .maps__content--bottom--listado--item .item__content {
    padding: 10px 25px;
  }

  .maps__content--bottom--listado--item .item__content__card span {
    font-size: 10px;
  }

  .maps__content--bottom--listado--item .item__content h3 {
    font-size: 14px;
  }
}

@media (max-width: 1757px) {
  .contacto__img {
    width: 70%;
    margin-top: 70px;
  }
}


.mapa__modal {
  height: 500px !important;
  width: 100% !important;
}
.ubicaciones {
  padding: 20px 0px 80px;
}

.ubicaciones h2 {
  text-align: center;
  margin-bottom: 30px;
}

.ubicaciones__card {
  background-color: #FFF7ED;
  border-radius: 10px;
  padding: 20px  33px;
  margin: 16px 0px;
  min-height: 224px;
}

.ubicaciones__card__titulo {
  color: #2EC4B6;
  font-family: 'Paytone One', sans-serif;
  font-size: 18px;
  text-transform: uppercase;
}

.ubicaciones__card__subtitulo {
  color: #bcc1d5;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  font-size: 16px;
}

.ubicaciones__card__datos {
  padding: 0;
  margin: 0;
}

.ubicaciones__card__datos li {
  list-style: none;
  color: #2EC4B6;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  padding: 9px 0px;
  position: relative;
}

.ubicaciones__card__datos li i {
  color: #f99300;
  position: absolute;
  top: 16px;
}

.ubicaciones__card__datos li i.icon__telefono {
  -webkit-transform: rotate(100deg);
          transform: rotate(100deg);
}

.ubicaciones__card__datos li span {
  display: block;
  margin-left: 20px;
}

.ubicaciones__card__datos li a {
  color: #a7b3d2;
  font-family: 'Lato', sans-serif;
  text-transform: uppercase;
  text-decoration: none;
}

.ubicaciones__card__datos li a:hover {
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}





.ubicaciones__card {
    padding: 16px  20px;
  }

  .ubicaciones__card__titulo {
    font-size: 11px;
  }

  .ubicaciones__card__subtitulo {
    font-size: 11px;
  }

  .ubicaciones__card__datos li {
    font-size: 12px;
  }
}

@media (min-width: 992px) and (max-width: 1024px) {
  .ubicaciones__card__titulo {
    font-size: 13px;
  }

  .ubicaciones__card__subtitulo {
    font-size: 12px;
  }

  .ubicaciones__card__datos li span {
    font-size: 12px;
  }

  .btn-secondary {
    padding: 12px !important;
  }

  .btn-primary {
    padding: 12px !important;
  }

  .promociones__item__content {
    padding: 16px;
    height: 292px;
  }

  .promociones__item__content .btn__general--transparente {
    padding: 10px 38px;
    margin-top: 11px;
  }

  .promociones__item__content--parrafo {
    line-height: 22px;
    font-size: 14px;
  }

  .promociones__item__content--precio span {
    font-size: 39px;
  }

  .promociones__item--muneco {
    bottom: -9px;
    width: 167px;
  }

  .nuestras__atracciones__content--item {
    height: 315px;
  }

  .carousel__text-container {
    font-size: 1.75rem;
  }
}

@media (min-width: 1025px) and (max-width: 1440px) {
  .carousel__text-container {
    font-size: 2.75rem;
  }

  .promociones__item__content {
    padding: 3px 20px;
    height: 300px;
  }

  .promociones__item__content--parrafo {
    font-size: 16px;
  }

  .promociones__item__content--precio span {
    font-size: 48px;
  }
}

@media (max-width: 425px) {
  .ubicaciones__card__titulo {
    font-size: 14px;
  }

  .ubicaciones__card__subtitulo {
    font-size: 13px;
  }

  .ubicaciones__card__datos li {
    font-size: 13px;
  }
}

@media (min-width: 576px) {
  .modalUbicacion__dialog {
    max-width: 800px !important;
  }
}











  
.formulario__content {
  padding: 35px 44px;
  margin-top: 40px;
  border-radius: 10px;
  background-color: white;
}

.formulario__content h3 {
  color: #003b70;
  font-size: 18px;
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
  margin-bottom: 30px;
}

.formulario__content form label {
  color: #253b56;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  font-weight: 900;
}

.formulario__content form input {
  border-radius: 4px;
  height: 47px;
  border: 1px solid #e8e8e8;
  color: #f99300;
}

.formulario__content form input:focus {
  -webkit-box-shadow: none;
          box-shadow: none;
  color: #f99300;
}

.formulario__content form input::-webkit-input-placeholder {
  color: #253b5670;
  font-family: 'Lato', sans-serif;
  font-style: italic;
}

.formulario__content form input::-ms-input-placeholder {
  color: #253b5670;
  font-family: 'Lato', sans-serif;
  font-style: italic;
}

.formulario__content form input::placeholder {
  color: #253b5670;
  font-family: 'Lato', sans-serif;
  font-style: italic;
}

.formulario__content form textarea {
  border-radius: 4px;
  border: 1px solid #e8e8e8;
  resize: none;
}

.formulario__content form textarea:focus {
  color: #f99300;
  -webkit-box-shadow: none;
          box-shadow: none;
}

.formulario__content form textarea::-webkit-input-placeholder {
  color: #253b5670;
  font-family: 'Lato', sans-serif;
  font-style: italic;
}

.formulario__content form textarea::-ms-input-placeholder {
  color: #253b5670;
  font-family: 'Lato', sans-serif;
  font-style: italic;
}

.formulario__content form textarea::placeholder {
  color: #253b5670;
  font-family: 'Lato', sans-serif;
  font-style: italic;
}

.formulario__content form select {
  border-radius: 4px;
  height: 47px;
  border: 1px solid #e8e8e8;
  color: #253b5670;
}

.formulario__content form select:focus {
  color: #f99300;
  -webkit-box-shadow: none;
          box-shadow: none;
}

.formulario__content form .btn__enviar {
  text-transform: uppercase;
  margin-top: 20px;
  padding: 10px 50px;
  font-family: 'Lato', sans-serif;
  font-weight: 900;
}

.formulario__content form .form-check {
  margin-left: 20px;
}

.formulario__content form .form-check .input-check {
  height: 20px;
}

.formulario__content form .form-check .politica {
  display: block;
  margin-left: 8px;
  color: rgba(37, 59, 86, 0.48);
  font-family: 'Lato', sans-serif;
  font-weight: 700;
}

.formulario__content form .form-check .politica a {
  color: rgba(37, 59, 86, 0.48);
  text-decoration: none;
}

.formulario__content form .adjuntar {
  margin-top: 20px;
}

.formulario__content form .adjuntar__titulo {
  font-size: 14px;
  font-family: 'Lato', sans-serif;
  color: #253b56;
}

.formulario__content form .adjuntar__link {
  font-size: 14px;
  color: #e8542c;
  font-family: 'Lato', sans-serif;
  text-decoration: underline;
}


.modalTrabaja__body .formulario__content {
  margin-top: 30px;
}

.modalTrabaja__body .formulario__content h3 {
  font-size: 24px;
}




  
@media (min-width: 768px) and (max-width: 900px) {
  .dropdown-menu {
    background: #fff;
    position: relative;
    left: -25% !important;
    top: -15% !important;
    padding: 0;
    min-width: auto;
    padding: 5px 35px 10px 35px;
  }

  #verificador {
    position: relative;
    top: 25px;
  }

  .wizards__content .local__centrado .numero {
    font-size: 40px;
  }

  .decimal {
    font-size: 15px;
    position: relative;
    top: -15px;
  }

  .wizards__content .card__img .precio {
    top: 0px;
  }

  .icono-mg {
    float: right;
    margin: -25px -25px 0px 0px;
  }

  .banner .btn__general--transparente {
    display: none;
  }

  .banner .scrollUp {
    height: 106px;
  }

  .banner .scrollUp:after {
    height: 76px;
  }

  .banner__media {
    height: 380px;
  }

  .banner__media__text__titulo {
    font-size: 36px;
    line-height: 40px;
  }

  .banner__media__text p {
    margin-bottom: 2px;
    padding-top: 10px;
  }

  .banner__chico {
    height: 250px;
  }

  .banner__chico__text {
    margin-top: 0px;
  }

  .banner__chico__text__titulo {
    font-size: 30px;
  }

  .formulario__content form label {
    font-size: 10px;
  }

  section h2 {
    font-size: 20px;
  }
}



.form-control {
  display: block;
  width: 100%;
  height: calc(2.19rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  line-height: 1.6;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0;
  -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}

@media screen and (prefers-reduced-motion: reduce) {
  .form-control {
    -webkit-transition: none;
    transition: none;
  }
}

.form-control::-ms-expand {
  background-color: transparent;
  border: 0;
}

.form-control:focus {
  color: #495057;
  background-color: #fff;
  border-color: #80bdff;
  outline: 0;
  -webkit-box-shadow: 0 0 0 0.2rem transparent;
          box-shadow: 0 0 0 0.2rem transparent;
}

.form-control::-webkit-input-placeholder {
  color: #6c757d;
  opacity: 1;
}

.form-control::-ms-input-placeholder {
  color: #6c757d;
  opacity: 1;
}

.form-control::placeholder {
  color: #6c757d;
  opacity: 1;
}

.form-control:disabled,
.form-control[readonly] {
  background-color: #e9ecef;
  opacity: 1;
}

select.form-control:focus::-ms-value {
  color: #495057;
  background-color: #fff;
}

.form-control-file,
.form-control-range {
  display: block;
  width: 100%;
}

.col-form-label {
  padding-top: calc(0.375rem + 1px);
  padding-bottom: calc(0.375rem + 1px);
  margin-bottom: 0;
  font-size: inherit;
  line-height: 1.6;
}

.col-form-label-lg {
  padding-top: calc(0.5rem + 1px);
  padding-bottom: calc(0.5rem + 1px);
  font-size: 1.125rem;
  line-height: 1.5;
}

.col-form-label-sm {
  padding-top: calc(0.25rem + 1px);
  padding-bottom: calc(0.25rem + 1px);
  font-size: 0.7875rem;
  line-height: 1.5;
}

.form-control-plaintext {
  display: block;
  width: 100%;
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  margin-bottom: 0;
  line-height: 1.6;
  color: #212529;
  background-color: transparent;
  border: solid transparent;
  border-width: 1px 0;
}

.form-control-plaintext.form-control-sm,
.form-control-plaintext.form-control-lg {
  padding-right: 0;
  padding-left: 0;
}

.form-control-sm {
  height: calc(1.68125rem + 2px);
  padding: 0.25rem 0.5rem;
  font-size: 0.7875rem;
  line-height: 1.5;
}

.form-control-lg {
  height: calc(2.6875rem + 2px);
  padding: 0.5rem 1rem;
  font-size: 1.125rem;
  line-height: 1.5;
}

select.form-control[size],
select.form-control[multiple] {
  height: auto;
}

textarea.form-control {
  height: auto;
}

.form-group {
  margin-bottom: 1rem;
}

.form-text {
  display: block;
  margin-top: 0.25rem;
}

.form-row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  margin-right: -5px;
  margin-left: -5px;
}

.form-row > .col,
.form-row > [class*="col-"] {
  padding-right: 5px;
  padding-left: 5px;
}

.form-check {
  position: relative;
  display: block;
  padding-left: 1.25rem;
}

.form-check-input {
  position: absolute;
  margin-top: 0.3rem;
  margin-left: -1.25rem;
}

.form-check-input:disabled ~ .form-check-label {
  color: #6c757d;
}

.form-check-label {
  margin-bottom: 0;
}

.form-check-inline {
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding-left: 0;
  margin-right: 0.75rem;
}

.form-check-inline .form-check-input {
  position: static;
  margin-top: 0;
  margin-right: 0.3125rem;
  margin-left: 0;
}

.valid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #28a745;
}

.valid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.5rem;
  margin-top: .1rem;
  font-size: 0.7875rem;
  line-height: 1.6;
  color: #fff;
  background-color: rgba(40, 167, 69, 0.9);
}

.was-validated .form-control:valid,
.form-control.is-valid,
.was-validated
.custom-select:valid,
.custom-select.is-valid {
  border-color: #28a745;
}

.was-validated .form-control:valid:focus,
.form-control.is-valid:focus,
.was-validated
.custom-select:valid:focus,
.custom-select.is-valid:focus {
  border-color: #28a745;
  -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.was-validated .form-control:valid ~ .valid-feedback,
.was-validated .form-control:valid ~ .valid-tooltip,
.form-control.is-valid ~ .valid-feedback,
.form-control.is-valid ~ .valid-tooltip,
.was-validated
.custom-select:valid ~ .valid-feedback,
.was-validated
.custom-select:valid ~ .valid-tooltip,
.custom-select.is-valid ~ .valid-feedback,
.custom-select.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .form-control-file:valid ~ .valid-feedback,
.was-validated .form-control-file:valid ~ .valid-tooltip,
.form-control-file.is-valid ~ .valid-feedback,
.form-control-file.is-valid ~ .valid-tooltip {
  display: block;
}



.was-validated .form-control:invalid,
.form-control.is-invalid,
.was-validated
.custom-select:invalid,
.custom-select.is-invalid {
  border-color: #dc3545;
}

.was-validated .form-control:invalid:focus,
.form-control.is-invalid:focus,
.was-validated
.custom-select:invalid:focus,
.custom-select.is-invalid:focus {
  border-color: #dc3545;
  -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
          box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.was-validated .form-control:invalid ~ .invalid-feedback,
.was-validated .form-control:invalid ~ .invalid-tooltip,
.form-control.is-invalid ~ .invalid-feedback,
.form-control.is-invalid ~ .invalid-tooltip,
.was-validated
.custom-select:invalid ~ .invalid-feedback,
.was-validated
.custom-select:invalid ~ .invalid-tooltip,
.custom-select.is-invalid ~ .invalid-feedback,
.custom-select.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .form-control-file:invalid ~ .invalid-feedback,
.was-validated .form-control-file:invalid ~ .invalid-tooltip,
.form-control-file.is-invalid ~ .invalid-feedback,
.form-control-file.is-invalid ~ .invalid-tooltip {
  display: block;
}

.form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
  }

  .form-inline .form-control-plaintext {
    display: inline-block;
  }


  
.input-group > .form-control,
.input-group > .custom-select,
.input-group > .custom-file {
  position: relative;
  -webkit-box-flex: 1;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
  width: 1%;
  margin-bottom: 0;
}

.input-group > .form-control + .form-control,
.input-group > .form-control + .custom-select,
.input-group > .form-control + .custom-file,
.input-group > .custom-select + .form-control,
.input-group > .custom-select + .custom-select,
.input-group > .custom-select + .custom-file,
.input-group > .custom-file + .form-control,
.input-group > .custom-file + .custom-select,
.input-group > .custom-file + .custom-file {
  margin-left: -1px;
}

.input-group > .form-control:focus,
.input-group > .custom-select:focus,
.input-group > .custom-file .custom-file-input:focus ~ .custom-file-label {
  z-index: 3;
}

.input-group > .custom-file .custom-file-input:focus {
  z-index: 4;
}

.input-group > .custom-file {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.input-group-prepend,
.input-group-append {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.input-group-prepend .btn,
.input-group-append .btn {
  position: relative;
  z-index: 2;
}

.input-group-prepend .btn + .btn,
.input-group-prepend .btn + .input-group-text,
.input-group-prepend .input-group-text + .input-group-text,
.input-group-prepend .input-group-text + .btn,
.input-group-append .btn + .btn,
.input-group-append .btn + .input-group-text,
.input-group-append .input-group-text + .input-group-text,
.input-group-append .input-group-text + .btn {
  margin-left: -1px;
}

.input-group-prepend {
  margin-right: -1px;
}

.input-group-append {
  margin-left: -1px;
}

.input-group-text {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 0.375rem 0.75rem;
  margin-bottom: 0;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #495057;
  text-align: center;
  white-space: nowrap;
  background-color: #e9ecef;
  border: 1px solid #ced4da;
}

.input-group-text input[type="radio"],
.input-group-text input[type="checkbox"] {
  margin-top: 0;
}

.input-group-lg > .form-control,
.input-group-lg > .input-group-prepend > .input-group-text,
.input-group-lg > .input-group-append > .input-group-text,
.input-group-lg > .input-group-prepend > .btn,
.input-group-lg > .input-group-append > .btn {
  height: calc(2.6875rem + 2px);
  padding: 0.5rem 1rem;
  font-size: 1.125rem;
  line-height: 1.5;
}

.input-group-sm > .form-control,
.input-group-sm > .input-group-prepend > .input-group-text,
.input-group-sm > .input-group-append > .input-group-text,
.input-group-sm > .input-group-prepend > .btn,
.input-group-sm > .input-group-append > .btn {
  height: calc(1.68125rem + 2px);
  padding: 0.25rem 0.5rem;
  font-size: 0.7875rem;
  line-height: 1.5;
}

.custom-control {
  position: relative;
  display: block;
  min-height: 1.44rem;
  padding-left: 1.5rem;
}

.custom-control-inline {
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  margin-right: 1rem;
}

.form-inline .form-group {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row wrap;
            flex-flow: row wrap;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    margin-bottom: 0;
  }


  
#mensajePolitica {
  color: #253b56;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-weight: 900;
  margin-left: 22px;
  font-size: 12px;
}


























@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700,900);@import url(https://fonts.googleapis.com/css?family=Paytone+One);@charset "UTF-8";

/**
 * Owl Carousel v2.2.1
 * Copyright 2013-2017 David Deutsch
 * Licensed under  ()
 */

.owl-carousel,
.owl-carousel .owl-item {
  -webkit-tap-highlight-color: transparent;
  position: relative;
}

.owl-carousel {
  display: none;
  width: 100%;
  z-index: 1;
}

.owl-carousel .owl-stage {
  position: relative;
  -ms-touch-action: pan-Y;
  -moz-backface-visibility: hidden;
}

.owl-carousel .owl-stage:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}

.owl-carousel .owl-stage-outer {
  position: relative;
  overflow: hidden;
  -webkit-transform: translate3d(0, 0, 0);
}

.owl-carousel .owl-item,
.owl-carousel .owl-wrapper {
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
}

.owl-carousel .owl-item {
  min-height: 1px;
  float: left;
  -webkit-backface-visibility: hidden;
  -webkit-touch-callout: none;
}

/*.owl-carousel .owl-item img {
     display: block;
     width: 100%
 }*/

.owl-carousel .owl-dots.disabled,
.owl-carousel .owl-nav.disabled {
  display: none;
}

.no-js .owl-carousel,
.owl-carousel.owl-loaded {
  display: block;
}

.owl-carousel .owl-dot,
.owl-carousel .owl-nav .owl-next,
.owl-carousel .owl-nav .owl-prev {
  cursor: pointer;
  cursor: hand;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.owl-carousel.owl-loading {
  opacity: 0;
  display: block;
}

.owl-carousel.owl-hidden {
  opacity: 0;
}

.owl-carousel.owl-refresh .owl-item {
  visibility: hidden;
}

.owl-carousel.owl-drag .owl-item {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.owl-carousel.owl-grab {
  cursor: move;
  cursor: -webkit-grab;
  cursor: grab;
}

.owl-carousel.owl-rtl {
  direction: rtl;
}

.owl-carousel.owl-rtl .owl-item {
  float: right;
}

.owl-carousel .animated {
  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
}

.owl-carousel .owl-animated-in {
  z-index: 0;
}

.owl-carousel .owl-animated-out {
  z-index: 1;
}

.owl-carousel .fadeOut {
  -webkit-animation-name: fadeOut;
          animation-name: fadeOut;
}

@keyframes fadeOut {
  0% {
    opacity: 1;
  }

  100% {
    opacity: 0;
  }
}

.owl-height {
  -webkit-transition: height .5s ease-in-out;
  transition: height .5s ease-in-out;
}

.owl-carousel .owl-item .owl-lazy {
  opacity: 0;
  -webkit-transition: opacity .4s ease;
  transition: opacity .4s ease;
}

.owl-carousel .owl-item img.owl-lazy {
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.owl-carousel .owl-video-wrapper {
  position: relative;
  height: 100%;
  background: #000;
}

.owl-carousel .owl-video-play-icon {
  position: absolute;
  height: 80px;
  width: 80px;
  left: 50%;
  top: 50%;
  margin-left: -40px;
  margin-top: -40px;
  /* background: url(owl.video.play.png) no-repeat;*/
  cursor: pointer;
  z-index: 1;
  -webkit-backface-visibility: hidden;
  -webkit-transition: -webkit-transform .1s ease;
  transition: -webkit-transform .1s ease;
  transition: transform .1s ease;
  transition: transform .1s ease, -webkit-transform .1s ease;
}

.owl-carousel .owl-video-play-icon:hover {
  -webkit-transform: scale(1.3, 1.3);
          transform: scale(1.3, 1.3);
}

.owl-carousel .owl-video-playing .owl-video-play-icon,
.owl-carousel .owl-video-playing .owl-video-tn {
  display: none;
}

.owl-carousel .owl-video-tn {
  opacity: 0;
  height: 100%;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: contain;
  -webkit-transition: opacity .4s ease;
  transition: opacity .4s ease;
}

.owl-carousel .owl-video-frame {
  position: relative;
  z-index: 1;
  height: 100%;
  width: 100%;
}

/**
 * Owl Carousel v2.2.1
 * Copyright 2013-2017 David Deutsch
 * Licensed under  ()
 */

.owl-theme .owl-dots,
.owl-theme .owl-nav {
  text-align: center;
  -webkit-tap-highlight-color: transparent;
}

.owl-theme .owl-nav {
  margin-top: 10px;
}

.owl-theme .owl-nav [class*=owl-] {
  color: #FFF;
  font-size: 14px;
  margin: 5px;
  padding: 4px 7px;
  background: #D6D6D6;
  display: inline-block;
  cursor: pointer;
  border-radius: 3px;
}

.owl-theme .owl-nav [class*=owl-]:hover {
  background: #869791;
  color: #FFF;
  text-decoration: none;
}

.owl-theme .owl-nav .disabled {
  opacity: .5;
  cursor: default;
}

.owl-theme .owl-nav.disabled + .owl-dots {
  margin-top: 10px;
}

.owl-theme .owl-dots .owl-dot {
  display: inline-block;
  zoom: 1;
}

.owl-theme .owl-dots .owl-dot span {
  width: 10px;
  height: 10px;
  margin: 5px 7px;
  background: #D6D6D6;
  display: block;
  -webkit-backface-visibility: visible;
  -webkit-transition: opacity .2s ease;
  transition: opacity .2s ease;
  border-radius: 30px;
}

.owl-theme .owl-dots .owl-dot.active span,
.owl-theme .owl-dots .owl-dot:hover span {
  background: #869791;
}

@font-face {
  font-family: 'Gotham Bold';
  src: url(../fonts/Gotham-Bold.eot?06e8c749d774b12cae5aa89a7178f552);
  src: url(../fonts/Gotham-Bold.eot?06e8c749d774b12cae5aa89a7178f552) format("embedded-opentype"), url(../fonts/Gotham-Bold.woff2?b1a28b6266c6600cde6de59264d68b1c) format("woff2"), url(../fonts/Gotham-Bold.woff?11249ee94f5cc42427ef669666dba3ee) format("woff"), url(../fonts/Gotham-Bold.svg?8b74beae4e946a9dadf21febd3cc8bd8) format("svg");
}

/*
  font-family: 'Paytone One', sans-serif;
  font-family: 'Lato', sans-serif;

*/

/*!
 * Bootstrap v4.1.3 (https://getbootstrap.com/)
 * Copyright 2011-2018 The Bootstrap Authors
 * Copyright 2011-2018 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

:root {
  --blue: #007bff;
  --indigo: #6610f2;
  --purple: #6f42c1;
  --pink: #e83e8c;
  --red: #dc3545;
  --orange: #fd7e14;
  --yellow: #ffc107;
  --green: #28a745;
  --teal: #20c997;
  --cyan: #17a2b8;
  --white: #fff;
  --gray: #6c757d;
  --gray-dark: #343a40;
  --primary: #007bff;
  --secondary: #6c757d;
  --success: #28a745;
  --info: #17a2b8;
  --warning: #ffc107;
  --danger: #dc3545;
  --light: #f8f9fa;
  --dark: #343a40;
  --naranja: #f58508;
  --breakpoint-xs: 0;
  --breakpoint-sm: 576px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 992px;
  --breakpoint-xl: 1200px;
  --breakpoint-xxl: 1356px;
  --breakpoint-xxxl: 1845px;
  --font-family-sans-serif: "Gotham Light", sans-serif;
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}

*,
*::before,
*::after {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

html {
  font-family: sans-serif;
  line-height: 1.15;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -ms-overflow-style: scrollbar;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

@-ms-viewport {
  width: device-width;
}

article,
aside,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section {
  display: block;
}

body {
  margin: 0;
  font-family: "Gotham Light", sans-serif;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #212529;
  text-align: left;
  background-color: #fff;
}

[tabindex="-1"]:focus {
  outline: 0 !important;
}

hr {
  -webkit-box-sizing: content-box;
          box-sizing: content-box;
  height: 0;
  overflow: visible;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  margin-top: 0;
  margin-bottom: 0.5rem;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

abbr[title],
abbr[data-original-title] {
  text-decoration: underline;
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
  cursor: help;
  border-bottom: 0;
}

address {
  margin-bottom: 1rem;
  font-style: normal;
  line-height: inherit;
}

ol,
ul,
dl {
  margin-top: 0;
  margin-bottom: 1rem;
}

ol ol,
ul ul,
ol ul,
ul ol {
  margin-bottom: 0;
}

dt {
  font-weight: 700;
}

dd {
  margin-bottom: .5rem;
  margin-left: 0;
}

blockquote {
  margin: 0 0 1rem;
}

dfn {
  font-style: italic;
}

b,
strong {
  font-weight: bolder;
}

small {
  font-size: 80%;
}

sub,
sup {
  position: relative;
  font-size: 75%;
  line-height: 0;
  vertical-align: baseline;
}

sub {
  bottom: -.25em;
}

sup {
  top: -.5em;
}

a {
  color: #007bff;
  text-decoration: none;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}

a:hover {
  color: #0056b3;
  text-decoration: underline;
}

a:not([href]):not([tabindex]) {
  color: inherit;
  text-decoration: none;
}

a:not([href]):not([tabindex]):hover,
a:not([href]):not([tabindex]):focus {
  color: inherit;
  text-decoration: none;
}

a:not([href]):not([tabindex]):focus {
  outline: 0;
}

pre,
code,
kbd,
samp {
  font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  font-size: 1em;
}

pre {
  margin-top: 0;
  margin-bottom: 1rem;
  overflow: auto;
  -ms-overflow-style: scrollbar;
}

figure {
  margin: 0 0 1rem;
}

img {
  vertical-align: middle;
  border-style: none;
}

svg {
  overflow: hidden;
  vertical-align: middle;
}

table {
  border-collapse: collapse;
}

caption {
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  color: #6c757d;
  text-align: left;
  caption-side: bottom;
}

th {
  text-align: inherit;
}

label {
  display: inline-block;
  margin-bottom: 0.5rem;
}

button {
  border-radius: 0;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}

input,
button,
select,
optgroup,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

button,
input {
  overflow: visible;
}

button,
select {
  text-transform: none;
}

button,
html [type="button"],
[type="reset"],
[type="submit"] {
  -webkit-appearance: button;
}

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  padding: 0;
  border-style: none;
}

input[type="radio"],
input[type="checkbox"] {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  padding: 0;
}

input[type="date"],
input[type="time"],
input[type="datetime-local"],
input[type="month"] {
  -webkit-appearance: listbox;
}

textarea {
  overflow: auto;
  resize: vertical;
}

fieldset {
  min-width: 0;
  padding: 0;
  margin: 0;
  border: 0;
}

legend {
  display: block;
  width: 100%;
  max-width: 100%;
  padding: 0;
  margin-bottom: .5rem;
  font-size: 1.5rem;
  line-height: inherit;
  color: inherit;
  white-space: normal;
}

progress {
  vertical-align: baseline;
}

[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

[type="search"] {
  outline-offset: -2px;
  -webkit-appearance: none;
}

[type="search"]::-webkit-search-cancel-button,
[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button;
}

output {
  display: inline-block;
}

summary {
  display: list-item;
  cursor: pointer;
}

template {
  display: none;
}

[hidden] {
  display: none !important;
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  margin-bottom: 0.5rem;
  font-family: inherit;
  font-weight: 500;
  line-height: 1.2;
  color: inherit;
}

h1,
.h1 {
  font-size: 2.25rem;
}

h2,
.h2 {
  font-size: 1.8rem;
}

h3,
.h3 {
  font-size: 1.575rem;
}

h4,
.h4 {
  font-size: 1.35rem;
}

h5,
.h5 {
  font-size: 1.125rem;
}

h6,
.h6 {
  font-size: 0.9rem;
}

.lead {
  font-size: 1.125rem;
  font-weight: 300;
}

.display-1 {
  font-size: 6rem;
  font-weight: 300;
  line-height: 1.2;
}

.display-2 {
  font-size: 5.5rem;
  font-weight: 300;
  line-height: 1.2;
}

.display-3 {
  font-size: 4.5rem;
  font-weight: 300;
  line-height: 1.2;
}

.display-4 {
  font-size: 3.5rem;
  font-weight: 300;
  line-height: 1.2;
}

hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}

small,
.small {
  font-size: 80%;
  font-weight: 400;
}

mark,
.mark {
  padding: 0.2em;
  background-color: #fcf8e3;
}

.list-unstyled {
  padding-left: 0;
  list-style: none;
}

.list-inline {
  padding-left: 0;
  list-style: none;
}

.list-inline-item {
  display: inline-block;
}

.list-inline-item:not(:last-child) {
  margin-right: 0.5rem;
}

.initialism {
  font-size: 90%;
  text-transform: uppercase;
}

.blockquote {
  margin-bottom: 1rem;
  font-size: 1.125rem;
}

.blockquote-footer {
  display: block;
  font-size: 80%;
  color: #6c757d;
}

.blockquote-footer::before {
  content: "\2014   \A0";
}

.img-fluid {
  max-width: 100%;
  height: auto;
}

.img-thumbnail {
  padding: 0.25rem;
  background-color: #fff;
  border: 1px solid #dee2e6;
  max-width: 100%;
  height: auto;
}

.figure {
  display: inline-block;
}

.figure-img {
  margin-bottom: 0.5rem;
  line-height: 1;
}

.figure-caption {
  font-size: 90%;
  color: #6c757d;
}

code {
  font-size: 87.5%;
  color: #e83e8c;
  word-break: break-word;
}

a > code {
  color: inherit;
}

kbd {
  padding: 0.2rem 0.4rem;
  font-size: 87.5%;
  color: #fff;
  background-color: #212529;
}

kbd kbd {
  padding: 0;
  font-size: 100%;
  font-weight: 700;
}

pre {
  display: block;
  font-size: 87.5%;
  color: #212529;
}

pre code {
  font-size: inherit;
  color: inherit;
  word-break: normal;
}

.pre-scrollable {
  max-height: 340px;
  overflow-y: scroll;
}

.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 1200px) {
  .container {
    max-width: 1440px;
  }
}

.container-fluid {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}

.no-gutters {
  margin-right: 0;
  margin-left: 0;
}

.no-gutters > .col,
.no-gutters > [class*="col-"] {
  padding-right: 0;
  padding-left: 0;
}

.col-1,
.col-2,
.col-3,
.col-4,
.col-5,
.col-6,
.col-7,
.col-8,
.col-9,
.col-10,
.col-11,
.col-12,
.col,
.col-auto,
.col-sm-1,
.col-sm-2,
.col-sm-3,
.col-sm-4,
.col-sm-5,
.col-sm-6,
.col-sm-7,
.col-sm-8,
.col-sm-9,
.col-sm-10,
.col-sm-11,
.col-sm-12,
.col-sm,
.col-sm-auto,
.col-md-1,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-md-10,
.col-md-11,
.col-md-12,
.col-md,
.col-md-auto,
.col-lg-1,
.col-lg-2,
.col-lg-3,
.col-lg-4,
.col-lg-5,
.col-lg-6,
.col-lg-7,
.col-lg-8,
.col-lg-9,
.col-lg-10,
.col-lg-11,
.col-lg-12,
.col-lg,
.col-lg-auto,
.col-xl-1,
.col-xl-2,
.col-xl-3,
.col-xl-4,
.col-xl-5,
.col-xl-6,
.col-xl-7,
.col-xl-8,
.col-xl-9,
.col-xl-10,
.col-xl-11,
.col-xl-12,
.col-xl,
.col-xl-auto,
.col-xxl-1,
.col-xxl-2,
.col-xxl-3,
.col-xxl-4,
.col-xxl-5,
.col-xxl-6,
.col-xxl-7,
.col-xxl-8,
.col-xxl-9,
.col-xxl-10,
.col-xxl-11,
.col-xxl-12,
.col-xxl,
.col-xxl-auto,
.col-xxxl-1,
.col-xxxl-2,
.col-xxxl-3,
.col-xxxl-4,
.col-xxxl-5,
.col-xxxl-6,
.col-xxxl-7,
.col-xxxl-8,
.col-xxxl-9,
.col-xxxl-10,
.col-xxxl-11,
.col-xxxl-12,
.col-xxxl,
.col-xxxl-auto {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col {
  -ms-flex-preferred-size: 0;
      flex-basis: 0;
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  max-width: 100%;
}

.col-auto {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 auto;
          flex: 0 0 auto;
  width: auto;
  max-width: none;
}

.col-1 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 8.33333333%;
          flex: 0 0 8.33333333%;
  max-width: 8.33333333%;
}

.col-2 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 16.66666667%;
          flex: 0 0 16.66666667%;
  max-width: 16.66666667%;
}

.col-3 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 25%;
          flex: 0 0 25%;
  max-width: 25%;
}

.col-4 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 33.33333333%;
          flex: 0 0 33.33333333%;
  max-width: 33.33333333%;
}

.col-5 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 41.66666667%;
          flex: 0 0 41.66666667%;
  max-width: 41.66666667%;
}

.col-6 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 50%;
          flex: 0 0 50%;
  max-width: 50%;
}

.col-7 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 58.33333333%;
          flex: 0 0 58.33333333%;
  max-width: 58.33333333%;
}

.col-8 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 66.66666667%;
          flex: 0 0 66.66666667%;
  max-width: 66.66666667%;
}

.col-9 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 75%;
          flex: 0 0 75%;
  max-width: 75%;
}

.col-10 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 83.33333333%;
          flex: 0 0 83.33333333%;
  max-width: 83.33333333%;
}

.col-11 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 91.66666667%;
          flex: 0 0 91.66666667%;
  max-width: 91.66666667%;
}

.col-12 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 100%;
          flex: 0 0 100%;
  max-width: 100%;
}

.order-first {
  -webkit-box-ordinal-group: 0;
      -ms-flex-order: -1;
          order: -1;
}

.order-last {
  -webkit-box-ordinal-group: 14;
      -ms-flex-order: 13;
          order: 13;
}

.order-0 {
  -webkit-box-ordinal-group: 1;
      -ms-flex-order: 0;
          order: 0;
}

.order-1 {
  -webkit-box-ordinal-group: 2;
      -ms-flex-order: 1;
          order: 1;
}

.order-2 {
  -webkit-box-ordinal-group: 3;
      -ms-flex-order: 2;
          order: 2;
}

.order-3 {
  -webkit-box-ordinal-group: 4;
      -ms-flex-order: 3;
          order: 3;
}

.order-4 {
  -webkit-box-ordinal-group: 5;
      -ms-flex-order: 4;
          order: 4;
}

.order-5 {
  -webkit-box-ordinal-group: 6;
      -ms-flex-order: 5;
          order: 5;
}

.order-6 {
  -webkit-box-ordinal-group: 7;
      -ms-flex-order: 6;
          order: 6;
}

.order-7 {
  -webkit-box-ordinal-group: 8;
      -ms-flex-order: 7;
          order: 7;
}

.order-8 {
  -webkit-box-ordinal-group: 9;
      -ms-flex-order: 8;
          order: 8;
}

.order-9 {
  -webkit-box-ordinal-group: 10;
      -ms-flex-order: 9;
          order: 9;
}

.order-10 {
  -webkit-box-ordinal-group: 11;
      -ms-flex-order: 10;
          order: 10;
}

.order-11 {
  -webkit-box-ordinal-group: 12;
      -ms-flex-order: 11;
          order: 11;
}

.order-12 {
  -webkit-box-ordinal-group: 13;
      -ms-flex-order: 12;
          order: 12;
}

.offset-1 {
  margin-left: 8.33333333%;
}

.offset-2 {
  margin-left: 16.66666667%;
}

.offset-3 {
  margin-left: 25%;
}

.offset-4 {
  margin-left: 33.33333333%;
}

.offset-5 {
  margin-left: 41.66666667%;
}

.offset-6 {
  margin-left: 50%;
}

.offset-7 {
  margin-left: 58.33333333%;
}

.offset-8 {
  margin-left: 66.66666667%;
}

.offset-9 {
  margin-left: 75%;
}

.offset-10 {
  margin-left: 83.33333333%;
}

.offset-11 {
  margin-left: 91.66666667%;
}

@media (min-width: 576px) {
  .col-sm {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
  }

  .col-sm-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
  }

  .col-sm-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.33333333%;
            flex: 0 0 8.33333333%;
    max-width: 8.33333333%;
  }

  .col-sm-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.66666667%;
            flex: 0 0 16.66666667%;
    max-width: 16.66666667%;
  }

  .col-sm-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
  }

  .col-sm-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.33333333%;
            flex: 0 0 33.33333333%;
    max-width: 33.33333333%;
  }

  .col-sm-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.66666667%;
            flex: 0 0 41.66666667%;
    max-width: 41.66666667%;
  }

  .col-sm-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
  }

  .col-sm-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.33333333%;
            flex: 0 0 58.33333333%;
    max-width: 58.33333333%;
  }

  .col-sm-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.66666667%;
            flex: 0 0 66.66666667%;
    max-width: 66.66666667%;
  }

  .col-sm-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
  }

  .col-sm-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.33333333%;
            flex: 0 0 83.33333333%;
    max-width: 83.33333333%;
  }

  .col-sm-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.66666667%;
            flex: 0 0 91.66666667%;
    max-width: 91.66666667%;
  }

  .col-sm-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
  }

  .order-sm-first {
    -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
            order: -1;
  }

  .order-sm-last {
    -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
            order: 13;
  }

  .order-sm-0 {
    -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
            order: 0;
  }

  .order-sm-1 {
    -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
            order: 1;
  }

  .order-sm-2 {
    -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
            order: 2;
  }

  .order-sm-3 {
    -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
            order: 3;
  }

  .order-sm-4 {
    -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
            order: 4;
  }

  .order-sm-5 {
    -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
            order: 5;
  }

  .order-sm-6 {
    -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
            order: 6;
  }

  .order-sm-7 {
    -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
            order: 7;
  }

  .order-sm-8 {
    -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
            order: 8;
  }

  .order-sm-9 {
    -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
            order: 9;
  }

  .order-sm-10 {
    -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
            order: 10;
  }

  .order-sm-11 {
    -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
            order: 11;
  }

  .order-sm-12 {
    -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
            order: 12;
  }

  .offset-sm-0 {
    margin-left: 0;
  }

  .offset-sm-1 {
    margin-left: 8.33333333%;
  }

  .offset-sm-2 {
    margin-left: 16.66666667%;
  }

  .offset-sm-3 {
    margin-left: 25%;
  }

  .offset-sm-4 {
    margin-left: 33.33333333%;
  }

  .offset-sm-5 {
    margin-left: 41.66666667%;
  }

  .offset-sm-6 {
    margin-left: 50%;
  }

  .offset-sm-7 {
    margin-left: 58.33333333%;
  }

  .offset-sm-8 {
    margin-left: 66.66666667%;
  }

  .offset-sm-9 {
    margin-left: 75%;
  }

  .offset-sm-10 {
    margin-left: 83.33333333%;
  }

  .offset-sm-11 {
    margin-left: 91.66666667%;
  }
}

@media (min-width: 768px) {
  .col-md {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
  }

  .col-md-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
  }

  .col-md-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.33333333%;
            flex: 0 0 8.33333333%;
    max-width: 8.33333333%;
  }

  .col-md-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.66666667%;
            flex: 0 0 16.66666667%;
    max-width: 16.66666667%;
  }

  .col-md-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
  }

  .col-md-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.33333333%;
            flex: 0 0 33.33333333%;
    max-width: 33.33333333%;
  }

  .col-md-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.66666667%;
            flex: 0 0 41.66666667%;
    max-width: 41.66666667%;
  }

  .col-md-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
  }

  .col-md-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.33333333%;
            flex: 0 0 58.33333333%;
    max-width: 58.33333333%;
  }

  .col-md-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.66666667%;
            flex: 0 0 66.66666667%;
    max-width: 66.66666667%;
  }

  .col-md-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
  }

  .col-md-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.33333333%;
            flex: 0 0 83.33333333%;
    max-width: 83.33333333%;
  }

  .col-md-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.66666667%;
            flex: 0 0 91.66666667%;
    max-width: 91.66666667%;
  }

  .col-md-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
  }

  .order-md-first {
    -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
            order: -1;
  }

  .order-md-last {
    -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
            order: 13;
  }

  .order-md-0 {
    -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
            order: 0;
  }

  .order-md-1 {
    -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
            order: 1;
  }

  .order-md-2 {
    -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
            order: 2;
  }

  .order-md-3 {
    -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
            order: 3;
  }

  .order-md-4 {
    -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
            order: 4;
  }

  .order-md-5 {
    -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
            order: 5;
  }

  .order-md-6 {
    -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
            order: 6;
  }

  .order-md-7 {
    -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
            order: 7;
  }

  .order-md-8 {
    -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
            order: 8;
  }

  .order-md-9 {
    -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
            order: 9;
  }

  .order-md-10 {
    -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
            order: 10;
  }

  .order-md-11 {
    -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
            order: 11;
  }

  .order-md-12 {
    -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
            order: 12;
  }

  .offset-md-0 {
    margin-left: 0;
  }

  .offset-md-1 {
    margin-left: 8.33333333%;
  }

  .offset-md-2 {
    margin-left: 16.66666667%;
  }

  .offset-md-3 {
    margin-left: 25%;
  }

  .offset-md-4 {
    margin-left: 33.33333333%;
  }

  .offset-md-5 {
    margin-left: 41.66666667%;
  }

  .offset-md-6 {
    margin-left: 50%;
  }

  .offset-md-7 {
    margin-left: 58.33333333%;
  }

  .offset-md-8 {
    margin-left: 66.66666667%;
  }

  .offset-md-9 {
    margin-left: 75%;
  }

  .offset-md-10 {
    margin-left: 83.33333333%;
  }

  .offset-md-11 {
    margin-left: 91.66666667%;
  }
}

@media (min-width: 992px) {
  .col-lg {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
  }

  .col-lg-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
  }

  .col-lg-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.33333333%;
            flex: 0 0 8.33333333%;
    max-width: 8.33333333%;
  }

  .col-lg-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.66666667%;
            flex: 0 0 16.66666667%;
    max-width: 16.66666667%;
  }

  .col-lg-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
  }

  .col-lg-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.33333333%;
            flex: 0 0 33.33333333%;
    max-width: 33.33333333%;
  }

  .col-lg-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.66666667%;
            flex: 0 0 41.66666667%;
    max-width: 41.66666667%;
  }

  .col-lg-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
  }

  .col-lg-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.33333333%;
            flex: 0 0 58.33333333%;
    max-width: 58.33333333%;
  }

  .col-lg-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.66666667%;
            flex: 0 0 66.66666667%;
    max-width: 66.66666667%;
  }

  .col-lg-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
  }

  .col-lg-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.33333333%;
            flex: 0 0 83.33333333%;
    max-width: 83.33333333%;
  }

  .col-lg-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.66666667%;
            flex: 0 0 91.66666667%;
    max-width: 91.66666667%;
  }

  .col-lg-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
  }

  .order-lg-first {
    -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
            order: -1;
  }

  .order-lg-last {
    -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
            order: 13;
  }

  .order-lg-0 {
    -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
            order: 0;
  }

  .order-lg-1 {
    -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
            order: 1;
  }

  .order-lg-2 {
    -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
            order: 2;
  }

  .order-lg-3 {
    -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
            order: 3;
  }

  .order-lg-4 {
    -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
            order: 4;
  }

  .order-lg-5 {
    -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
            order: 5;
  }

  .order-lg-6 {
    -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
            order: 6;
  }

  .order-lg-7 {
    -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
            order: 7;
  }

  .order-lg-8 {
    -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
            order: 8;
  }

  .order-lg-9 {
    -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
            order: 9;
  }

  .order-lg-10 {
    -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
            order: 10;
  }

  .order-lg-11 {
    -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
            order: 11;
  }

  .order-lg-12 {
    -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
            order: 12;
  }

  .offset-lg-0 {
    margin-left: 0;
  }

  .offset-lg-1 {
    margin-left: 8.33333333%;
  }

  .offset-lg-2 {
    margin-left: 16.66666667%;
  }

  .offset-lg-3 {
    margin-left: 25%;
  }

  .offset-lg-4 {
    margin-left: 33.33333333%;
  }

  .offset-lg-5 {
    margin-left: 41.66666667%;
  }

  .offset-lg-6 {
    margin-left: 50%;
  }

  .offset-lg-7 {
    margin-left: 58.33333333%;
  }

  .offset-lg-8 {
    margin-left: 66.66666667%;
  }

  .offset-lg-9 {
    margin-left: 75%;
  }

  .offset-lg-10 {
    margin-left: 83.33333333%;
  }

  .offset-lg-11 {
    margin-left: 91.66666667%;
  }
}

@media (min-width: 1200px) {
  .col-xl {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
  }

  .col-xl-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
  }

  .col-xl-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.33333333%;
            flex: 0 0 8.33333333%;
    max-width: 8.33333333%;
  }

  .col-xl-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.66666667%;
            flex: 0 0 16.66666667%;
    max-width: 16.66666667%;
  }

  .col-xl-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
  }

  .col-xl-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.33333333%;
            flex: 0 0 33.33333333%;
    max-width: 33.33333333%;
  }

  .col-xl-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.66666667%;
            flex: 0 0 41.66666667%;
    max-width: 41.66666667%;
  }

  .col-xl-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
  }

  .col-xl-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.33333333%;
            flex: 0 0 58.33333333%;
    max-width: 58.33333333%;
  }

  .col-xl-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.66666667%;
            flex: 0 0 66.66666667%;
    max-width: 66.66666667%;
  }

  .col-xl-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
  }

  .col-xl-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.33333333%;
            flex: 0 0 83.33333333%;
    max-width: 83.33333333%;
  }

  .col-xl-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.66666667%;
            flex: 0 0 91.66666667%;
    max-width: 91.66666667%;
  }

  .col-xl-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
  }

  .order-xl-first {
    -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
            order: -1;
  }

  .order-xl-last {
    -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
            order: 13;
  }

  .order-xl-0 {
    -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
            order: 0;
  }

  .order-xl-1 {
    -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
            order: 1;
  }

  .order-xl-2 {
    -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
            order: 2;
  }

  .order-xl-3 {
    -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
            order: 3;
  }

  .order-xl-4 {
    -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
            order: 4;
  }

  .order-xl-5 {
    -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
            order: 5;
  }

  .order-xl-6 {
    -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
            order: 6;
  }

  .order-xl-7 {
    -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
            order: 7;
  }

  .order-xl-8 {
    -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
            order: 8;
  }

  .order-xl-9 {
    -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
            order: 9;
  }

  .order-xl-10 {
    -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
            order: 10;
  }

  .order-xl-11 {
    -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
            order: 11;
  }

  .order-xl-12 {
    -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
            order: 12;
  }

  .offset-xl-0 {
    margin-left: 0;
  }

  .offset-xl-1 {
    margin-left: 8.33333333%;
  }

  .offset-xl-2 {
    margin-left: 16.66666667%;
  }

  .offset-xl-3 {
    margin-left: 25%;
  }

  .offset-xl-4 {
    margin-left: 33.33333333%;
  }

  .offset-xl-5 {
    margin-left: 41.66666667%;
  }

  .offset-xl-6 {
    margin-left: 50%;
  }

  .offset-xl-7 {
    margin-left: 58.33333333%;
  }

  .offset-xl-8 {
    margin-left: 66.66666667%;
  }

  .offset-xl-9 {
    margin-left: 75%;
  }

  .offset-xl-10 {
    margin-left: 83.33333333%;
  }

  .offset-xl-11 {
    margin-left: 91.66666667%;
  }
}

@media (min-width: 1356px) {
  .col-xxl {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
  }

  .col-xxl-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
  }

  .col-xxl-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.33333333%;
            flex: 0 0 8.33333333%;
    max-width: 8.33333333%;
  }

  .col-xxl-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.66666667%;
            flex: 0 0 16.66666667%;
    max-width: 16.66666667%;
  }

  .col-xxl-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
  }

  .col-xxl-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.33333333%;
            flex: 0 0 33.33333333%;
    max-width: 33.33333333%;
  }

  .col-xxl-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.66666667%;
            flex: 0 0 41.66666667%;
    max-width: 41.66666667%;
  }

  .col-xxl-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
  }

  .col-xxl-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.33333333%;
            flex: 0 0 58.33333333%;
    max-width: 58.33333333%;
  }

  .col-xxl-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.66666667%;
            flex: 0 0 66.66666667%;
    max-width: 66.66666667%;
  }

  .col-xxl-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
  }

  .col-xxl-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.33333333%;
            flex: 0 0 83.33333333%;
    max-width: 83.33333333%;
  }

  .col-xxl-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.66666667%;
            flex: 0 0 91.66666667%;
    max-width: 91.66666667%;
  }

  .col-xxl-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
  }

  .order-xxl-first {
    -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
            order: -1;
  }

  .order-xxl-last {
    -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
            order: 13;
  }

  .order-xxl-0 {
    -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
            order: 0;
  }

  .order-xxl-1 {
    -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
            order: 1;
  }

  .order-xxl-2 {
    -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
            order: 2;
  }

  .order-xxl-3 {
    -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
            order: 3;
  }

  .order-xxl-4 {
    -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
            order: 4;
  }

  .order-xxl-5 {
    -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
            order: 5;
  }

  .order-xxl-6 {
    -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
            order: 6;
  }

  .order-xxl-7 {
    -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
            order: 7;
  }

  .order-xxl-8 {
    -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
            order: 8;
  }

  .order-xxl-9 {
    -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
            order: 9;
  }

  .order-xxl-10 {
    -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
            order: 10;
  }

  .order-xxl-11 {
    -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
            order: 11;
  }

  .order-xxl-12 {
    -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
            order: 12;
  }

  .offset-xxl-0 {
    margin-left: 0;
  }

  .offset-xxl-1 {
    margin-left: 8.33333333%;
  }

  .offset-xxl-2 {
    margin-left: 16.66666667%;
  }

  .offset-xxl-3 {
    margin-left: 25%;
  }

  .offset-xxl-4 {
    margin-left: 33.33333333%;
  }

  .offset-xxl-5 {
    margin-left: 41.66666667%;
  }

  .offset-xxl-6 {
    margin-left: 50%;
  }

  .offset-xxl-7 {
    margin-left: 58.33333333%;
  }

  .offset-xxl-8 {
    margin-left: 66.66666667%;
  }

  .offset-xxl-9 {
    margin-left: 75%;
  }

  .offset-xxl-10 {
    margin-left: 83.33333333%;
  }

  .offset-xxl-11 {
    margin-left: 91.66666667%;
  }
}

@media (min-width: 1845px) {
  .col-xxxl {
    -ms-flex-preferred-size: 0;
        flex-basis: 0;
    -webkit-box-flex: 1;
        -ms-flex-positive: 1;
            flex-grow: 1;
    max-width: 100%;
  }

  .col-xxxl-auto {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
            flex: 0 0 auto;
    width: auto;
    max-width: none;
  }

  .col-xxxl-1 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 8.33333333%;
            flex: 0 0 8.33333333%;
    max-width: 8.33333333%;
  }

  .col-xxxl-2 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 16.66666667%;
            flex: 0 0 16.66666667%;
    max-width: 16.66666667%;
  }

  .col-xxxl-3 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
            flex: 0 0 25%;
    max-width: 25%;
  }

  .col-xxxl-4 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 33.33333333%;
            flex: 0 0 33.33333333%;
    max-width: 33.33333333%;
  }

  .col-xxxl-5 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 41.66666667%;
            flex: 0 0 41.66666667%;
    max-width: 41.66666667%;
  }

  .col-xxxl-6 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
            flex: 0 0 50%;
    max-width: 50%;
  }

  .col-xxxl-7 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 58.33333333%;
            flex: 0 0 58.33333333%;
    max-width: 58.33333333%;
  }

  .col-xxxl-8 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 66.66666667%;
            flex: 0 0 66.66666667%;
    max-width: 66.66666667%;
  }

  .col-xxxl-9 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
            flex: 0 0 75%;
    max-width: 75%;
  }

  .col-xxxl-10 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 83.33333333%;
            flex: 0 0 83.33333333%;
    max-width: 83.33333333%;
  }

  .col-xxxl-11 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 91.66666667%;
            flex: 0 0 91.66666667%;
    max-width: 91.66666667%;
  }

  .col-xxxl-12 {
    -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
            flex: 0 0 100%;
    max-width: 100%;
  }

  .order-xxxl-first {
    -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
            order: -1;
  }

  .order-xxxl-last {
    -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
            order: 13;
  }

  .order-xxxl-0 {
    -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
            order: 0;
  }

  .order-xxxl-1 {
    -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
            order: 1;
  }

  .order-xxxl-2 {
    -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
            order: 2;
  }

  .order-xxxl-3 {
    -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
            order: 3;
  }

  .order-xxxl-4 {
    -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
            order: 4;
  }

  .order-xxxl-5 {
    -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
            order: 5;
  }

  .order-xxxl-6 {
    -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
            order: 6;
  }

  .order-xxxl-7 {
    -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
            order: 7;
  }

  .order-xxxl-8 {
    -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
            order: 8;
  }

  .order-xxxl-9 {
    -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
            order: 9;
  }

  .order-xxxl-10 {
    -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
            order: 10;
  }

  .order-xxxl-11 {
    -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
            order: 11;
  }

  .order-xxxl-12 {
    -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
            order: 12;
  }

  .offset-xxxl-0 {
    margin-left: 0;
  }

  .offset-xxxl-1 {
    margin-left: 8.33333333%;
  }

  .offset-xxxl-2 {
    margin-left: 16.66666667%;
  }

  .offset-xxxl-3 {
    margin-left: 25%;
  }

  .offset-xxxl-4 {
    margin-left: 33.33333333%;
  }

  .offset-xxxl-5 {
    margin-left: 41.66666667%;
  }

  .offset-xxxl-6 {
    margin-left: 50%;
  }

  .offset-xxxl-7 {
    margin-left: 58.33333333%;
  }

  .offset-xxxl-8 {
    margin-left: 66.66666667%;
  }

  .offset-xxxl-9 {
    margin-left: 75%;
  }

  .offset-xxxl-10 {
    margin-left: 83.33333333%;
  }

  .offset-xxxl-11 {
    margin-left: 91.66666667%;
  }
}

.table {
  width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .table {
  background-color: #fff;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-borderless th,
.table-borderless td,
.table-borderless thead th,
.table-borderless tbody + tbody {
  border: 0;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-primary,
.table-primary > th,
.table-primary > td {
  background-color: #b8daff;
}

.table-hover .table-primary:hover {
  background-color: #9fcdff;
}

.table-hover .table-primary:hover > td,
.table-hover .table-primary:hover > th {
  background-color: #9fcdff;
}

.table-secondary,
.table-secondary > th,
.table-secondary > td {
  background-color: #d6d8db;
}

.table-hover .table-secondary:hover {
  background-color: #c8cbcf;
}

.table-hover .table-secondary:hover > td,
.table-hover .table-secondary:hover > th {
  background-color: #c8cbcf;
}

.table-success,
.table-success > th,
.table-success > td {
  background-color: #c3e6cb;
}

.table-hover .table-success:hover {
  background-color: #b1dfbb;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #b1dfbb;
}

.table-info,
.table-info > th,
.table-info > td {
  background-color: #bee5eb;
}

.table-hover .table-info:hover {
  background-color: #abdde5;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #abdde5;
}

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #ffeeba;
}

.table-hover .table-warning:hover {
  background-color: #ffe8a1;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #ffe8a1;
}

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #f5c6cb;
}

.table-hover .table-danger:hover {
  background-color: #f1b0b7;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #f1b0b7;
}

.table-light,
.table-light > th,
.table-light > td {
  background-color: #fdfdfe;
}

.table-hover .table-light:hover {
  background-color: #ececf6;
}

.table-hover .table-light:hover > td,
.table-hover .table-light:hover > th {
  background-color: #ececf6;
}

.table-dark,
.table-dark > th,
.table-dark > td {
  background-color: #c6c8ca;
}

.table-hover .table-dark:hover {
  background-color: #b9bbbe;
}

.table-hover .table-dark:hover > td,
.table-hover .table-dark:hover > th {
  background-color: #b9bbbe;
}

.table-naranja,
.table-naranja > th,
.table-naranja > td {
  background-color: #fcddba;
}

.table-hover .table-naranja:hover {
  background-color: #fbd1a2;
}

.table-hover .table-naranja:hover > td,
.table-hover .table-naranja:hover > th {
  background-color: #fbd1a2;
}

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}

.table .thead-dark th {
  color: #fff;
  background-color: #212529;
  border-color: #32383e;
}

.table .thead-light th {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.table-dark {
  color: #fff;
  background-color: #212529;
}

.table-dark th,
.table-dark td,
.table-dark thead th {
  border-color: #32383e;
}

.table-dark.table-bordered {
  border: 0;
}

.table-dark.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(255, 255, 255, 0.05);
}

.table-dark.table-hover tbody tr:hover {
  background-color: rgba(255, 255, 255, 0.075);
}

@media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }

  .table-responsive-sm > .table-bordered {
    border: 0;
  }
}

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }

  .table-responsive-md > .table-bordered {
    border: 0;
  }
}

@media (max-width: 991.98px) {
  .table-responsive-lg {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }

  .table-responsive-lg > .table-bordered {
    border: 0;
  }
}

@media (max-width: 1199.98px) {
  .table-responsive-xl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }

  .table-responsive-xl > .table-bordered {
    border: 0;
  }
}

@media (max-width: 1355.98px) {
  .table-responsive-xxl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }

  .table-responsive-xxl > .table-bordered {
    border: 0;
  }
}

@media (max-width: 1844.98px) {
  .table-responsive-xxxl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }

  .table-responsive-xxxl > .table-bordered {
    border: 0;
  }
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table-responsive > .table-bordered {
  border: 0;
}


.was-validated .form-check-input:valid ~ .form-check-label,
.form-check-input.is-valid ~ .form-check-label {
  color: #28a745;
}

.was-validated .form-check-input:valid ~ .valid-feedback,
.was-validated .form-check-input:valid ~ .valid-tooltip,
.form-check-input.is-valid ~ .valid-feedback,
.form-check-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-control-input:valid ~ .custom-control-label,
.custom-control-input.is-valid ~ .custom-control-label {
  color: #28a745;
}

.was-validated .custom-control-input:valid ~ .custom-control-label::before,
.custom-control-input.is-valid ~ .custom-control-label::before {
  background-color: #71dd8a;
}

.was-validated .custom-control-input:valid ~ .valid-feedback,
.was-validated .custom-control-input:valid ~ .valid-tooltip,
.custom-control-input.is-valid ~ .valid-feedback,
.custom-control-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-control-input:valid:checked ~ .custom-control-label::before,
.custom-control-input.is-valid:checked ~ .custom-control-label::before {
  background-color: #34ce57;
}

.was-validated .custom-control-input:valid:focus ~ .custom-control-label::before,
.custom-control-input.is-valid:focus ~ .custom-control-label::before {
  -webkit-box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
          box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.was-validated .custom-file-input:valid ~ .custom-file-label,
.custom-file-input.is-valid ~ .custom-file-label {
  border-color: #28a745;
}

.was-validated .custom-file-input:valid ~ .custom-file-label::after,
.custom-file-input.is-valid ~ .custom-file-label::after {
  border-color: inherit;
}

.was-validated .custom-file-input:valid ~ .valid-feedback,
.was-validated .custom-file-input:valid ~ .valid-tooltip,
.custom-file-input.is-valid ~ .valid-feedback,
.custom-file-input.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .custom-file-input:valid:focus ~ .custom-file-label,
.custom-file-input.is-valid:focus ~ .custom-file-label {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.invalid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #dc3545;
}

.invalid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.5rem;
  margin-top: .1rem;
  font-size: 0.7875rem;
  line-height: 1.6;
  color: #fff;
  background-color: rgba(220, 53, 69, 0.9);
}

.was-validated .form-check-input:invalid ~ .form-check-label,
.form-check-input.is-invalid ~ .form-check-label {
  color: #dc3545;
}

.was-validated .form-check-input:invalid ~ .invalid-feedback,
.was-validated .form-check-input:invalid ~ .invalid-tooltip,
.form-check-input.is-invalid ~ .invalid-feedback,
.form-check-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-control-input:invalid ~ .custom-control-label,
.custom-control-input.is-invalid ~ .custom-control-label {
  color: #dc3545;
}

.was-validated .custom-control-input:invalid ~ .custom-control-label::before,
.custom-control-input.is-invalid ~ .custom-control-label::before {
  background-color: #efa2a9;
}

.was-validated .custom-control-input:invalid ~ .invalid-feedback,
.was-validated .custom-control-input:invalid ~ .invalid-tooltip,
.custom-control-input.is-invalid ~ .invalid-feedback,
.custom-control-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-control-input:invalid:checked ~ .custom-control-label::before,
.custom-control-input.is-invalid:checked ~ .custom-control-label::before {
  background-color: #e4606d;
}

.was-validated .custom-control-input:invalid:focus ~ .custom-control-label::before,
.custom-control-input.is-invalid:focus ~ .custom-control-label::before {
  -webkit-box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
          box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.was-validated .custom-file-input:invalid ~ .custom-file-label,
.custom-file-input.is-invalid ~ .custom-file-label {
  border-color: #dc3545;
}

.was-validated .custom-file-input:invalid ~ .custom-file-label::after,
.custom-file-input.is-invalid ~ .custom-file-label::after {
  border-color: inherit;
}

.was-validated .custom-file-input:invalid ~ .invalid-feedback,
.was-validated .custom-file-input:invalid ~ .invalid-tooltip,
.custom-file-input.is-invalid ~ .invalid-feedback,
.custom-file-input.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .custom-file-input:invalid:focus ~ .custom-file-label,
.custom-file-input.is-invalid:focus ~ .custom-file-label {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
          box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.form-inline {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-flow: row wrap;
          flex-flow: row wrap;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.form-inline .form-check {
  width: 100%;
}

@media (min-width: 576px) {
  .form-inline label {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    margin-bottom: 0;
  }

  


  .form-inline .input-group,
  .form-inline .custom-select {
    width: auto;
  }

  .form-inline .form-check {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    width: auto;
    padding-left: 0;
  }

  .form-inline .form-check-input {
    position: relative;
    margin-top: 0;
    margin-right: 0.25rem;
    margin-left: 0;
  }

  .form-inline .custom-control {
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
  }

  .form-inline .custom-control-label {
    margin-bottom: 0;
  }
}

.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  line-height: 1.6;
  border-radius: 0;
  -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}

@media screen and (prefers-reduced-motion: reduce) {
  .btn {
    -webkit-transition: none;
    transition: none;
  }
}

.btn:hover,
.btn:focus {
  text-decoration: none;
}

.btn:focus,
.btn.focus {
  outline: 0;
  -webkit-box-shadow: 0 0 0 0.2rem transparent;
          box-shadow: 0 0 0 0.2rem transparent;
}

.btn.disabled,
.btn:disabled {
  opacity: 0.65;
}

.btn:not(:disabled):not(.disabled) {
  cursor: pointer;
}

a.btn.disabled,
fieldset:disabled a.btn {
  pointer-events: none;
}

.btn-primary {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  color: #fff;
  background-color: #0069d9;
  border-color: #0062cc;
}

.btn-primary:focus,
.btn-primary.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.btn-primary.disabled,
.btn-primary:disabled {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:not(:disabled):not(.disabled):active,
.btn-primary:not(:disabled):not(.disabled).active,
.show > .btn-primary.dropdown-toggle {
  color: #fff;
  background-color: #0062cc;
  border-color: #005cbf;
}

.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-primary.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.btn-secondary {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
}

.btn-secondary:hover {
  color: #fff;
  background-color: #5a6268;
  border-color: #545b62;
}

.btn-secondary:focus,
.btn-secondary.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
}

.btn-secondary.disabled,
.btn-secondary:disabled {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
}

.btn-secondary:not(:disabled):not(.disabled):active,
.btn-secondary:not(:disabled):not(.disabled).active,
.show > .btn-secondary.dropdown-toggle {
  color: #fff;
  background-color: #545b62;
  border-color: #4e555b;
}

.btn-secondary:not(:disabled):not(.disabled):active:focus,
.btn-secondary:not(:disabled):not(.disabled).active:focus,
.show > .btn-secondary.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
}

.btn-success {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}

.btn-success:hover {
  color: #fff;
  background-color: #218838;
  border-color: #1e7e34;
}

.btn-success:focus,
.btn-success.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
}

.btn-success.disabled,
.btn-success:disabled {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}

.btn-success:not(:disabled):not(.disabled):active,
.btn-success:not(:disabled):not(.disabled).active,
.show > .btn-success.dropdown-toggle {
  color: #fff;
  background-color: #1e7e34;
  border-color: #1c7430;
}

.btn-success:not(:disabled):not(.disabled):active:focus,
.btn-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-success.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
}

.btn-info {
  color: #fff;
  background-color: #17a2b8;
  border-color: #17a2b8;
}

.btn-info:hover {
  color: #fff;
  background-color: #138496;
  border-color: #117a8b;
}

.btn-info:focus,
.btn-info.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
}

.btn-info.disabled,
.btn-info:disabled {
  color: #fff;
  background-color: #17a2b8;
  border-color: #17a2b8;
}

.btn-info:not(:disabled):not(.disabled):active,
.btn-info:not(:disabled):not(.disabled).active,
.show > .btn-info.dropdown-toggle {
  color: #fff;
  background-color: #117a8b;
  border-color: #10707f;
}

.btn-info:not(:disabled):not(.disabled):active:focus,
.btn-info:not(:disabled):not(.disabled).active:focus,
.show > .btn-info.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
}

.btn-warning {
  color: #212529;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-warning:hover {
  color: #212529;
  background-color: #e0a800;
  border-color: #d39e00;
}

.btn-warning:focus,
.btn-warning.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-warning.disabled,
.btn-warning:disabled {
  color: #212529;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-warning:not(:disabled):not(.disabled):active,
.btn-warning:not(:disabled):not(.disabled).active,
.show > .btn-warning.dropdown-toggle {
  color: #212529;
  background-color: #d39e00;
  border-color: #c69500;
}

.btn-warning:not(:disabled):not(.disabled):active:focus,
.btn-warning:not(:disabled):not(.disabled).active:focus,
.show > .btn-warning.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-danger {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.btn-danger:hover {
  color: #fff;
  background-color: #c82333;
  border-color: #bd2130;
}

.btn-danger:focus,
.btn-danger.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
}

.btn-danger.disabled,
.btn-danger:disabled {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.btn-danger:not(:disabled):not(.disabled):active,
.btn-danger:not(:disabled):not(.disabled).active,
.show > .btn-danger.dropdown-toggle {
  color: #fff;
  background-color: #bd2130;
  border-color: #b21f2d;
}

.btn-danger:not(:disabled):not(.disabled):active:focus,
.btn-danger:not(:disabled):not(.disabled).active:focus,
.show > .btn-danger.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
}

.btn-light {
  color: #212529;
  background-color: #f8f9fa;
  border-color: #f8f9fa;
}

.btn-light:hover {
  color: #212529;
  background-color: #e2e6ea;
  border-color: #dae0e5;
}

.btn-light:focus,
.btn-light.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
}

.btn-light.disabled,
.btn-light:disabled {
  color: #212529;
  background-color: #f8f9fa;
  border-color: #f8f9fa;
}

.btn-light:not(:disabled):not(.disabled):active,
.btn-light:not(:disabled):not(.disabled).active,
.show > .btn-light.dropdown-toggle {
  color: #212529;
  background-color: #dae0e5;
  border-color: #d3d9df;
}

.btn-light:not(:disabled):not(.disabled):active:focus,
.btn-light:not(:disabled):not(.disabled).active:focus,
.show > .btn-light.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
}

.btn-dark {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40;
}

.btn-dark:hover {
  color: #fff;
  background-color: #23272b;
  border-color: #1d2124;
}

.btn-dark:focus,
.btn-dark.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
}

.btn-dark.disabled,
.btn-dark:disabled {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40;
}

.btn-dark:not(:disabled):not(.disabled):active,
.btn-dark:not(:disabled):not(.disabled).active,
.show > .btn-dark.dropdown-toggle {
  color: #fff;
  background-color: #1d2124;
  border-color: #171a1d;
}

.btn-dark:not(:disabled):not(.disabled):active:focus,
.btn-dark:not(:disabled):not(.disabled).active:focus,
.show > .btn-dark.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
}

.btn-naranja {
  color: #212529;
  background-color: #f58508;
  border-color: #f58508;
}

.btn-naranja:hover {
  color: #fff;
  background-color: #d07107;
  border-color: #c46a06;
}

.btn-naranja:focus,
.btn-naranja.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
}

.btn-naranja.disabled,
.btn-naranja:disabled {
  color: #212529;
  background-color: #f58508;
  border-color: #f58508;
}

.btn-naranja:not(:disabled):not(.disabled):active,
.btn-naranja:not(:disabled):not(.disabled).active,
.show > .btn-naranja.dropdown-toggle {
  color: #fff;
  background-color: #c46a06;
  border-color: #b76306;
}

.btn-naranja:not(:disabled):not(.disabled):active:focus,
.btn-naranja:not(:disabled):not(.disabled).active:focus,
.show > .btn-naranja.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
}

.btn-outline-primary {
  color: #007bff;
  background-color: transparent;
  background-image: none;
  border-color: #007bff;
}

.btn-outline-primary:hover {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-outline-primary:focus,
.btn-outline-primary.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.btn-outline-primary.disabled,
.btn-outline-primary:disabled {
  color: #007bff;
  background-color: transparent;
}

.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show > .btn-outline-primary.dropdown-toggle {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-outline-primary:not(:disabled):not(.disabled):active:focus,
.btn-outline-primary:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-primary.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

.btn-outline-secondary {
  color: #6c757d;
  background-color: transparent;
  background-image: none;
  border-color: #6c757d;
}

.btn-outline-secondary:hover {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
}

.btn-outline-secondary:focus,
.btn-outline-secondary.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
}

.btn-outline-secondary.disabled,
.btn-outline-secondary:disabled {
  color: #6c757d;
  background-color: transparent;
}

.btn-outline-secondary:not(:disabled):not(.disabled):active,
.btn-outline-secondary:not(:disabled):not(.disabled).active,
.show > .btn-outline-secondary.dropdown-toggle {
  color: #fff;
  background-color: #6c757d;
  border-color: #6c757d;
}

.btn-outline-secondary:not(:disabled):not(.disabled):active:focus,
.btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-secondary.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
}

.btn-outline-success {
  color: #28a745;
  background-color: transparent;
  background-image: none;
  border-color: #28a745;
}

.btn-outline-success:hover {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}

.btn-outline-success:focus,
.btn-outline-success.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
}

.btn-outline-success.disabled,
.btn-outline-success:disabled {
  color: #28a745;
  background-color: transparent;
}

.btn-outline-success:not(:disabled):not(.disabled):active,
.btn-outline-success:not(:disabled):not(.disabled).active,
.show > .btn-outline-success.dropdown-toggle {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}

.btn-outline-success:not(:disabled):not(.disabled):active:focus,
.btn-outline-success:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-success.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
}

.btn-outline-info {
  color: #17a2b8;
  background-color: transparent;
  background-image: none;
  border-color: #17a2b8;
}

.btn-outline-info:hover {
  color: #fff;
  background-color: #17a2b8;
  border-color: #17a2b8;
}

.btn-outline-info:focus,
.btn-outline-info.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
}

.btn-outline-info.disabled,
.btn-outline-info:disabled {
  color: #17a2b8;
  background-color: transparent;
}

.btn-outline-info:not(:disabled):not(.disabled):active,
.btn-outline-info:not(:disabled):not(.disabled).active,
.show > .btn-outline-info.dropdown-toggle {
  color: #fff;
  background-color: #17a2b8;
  border-color: #17a2b8;
}

.btn-outline-info:not(:disabled):not(.disabled):active:focus,
.btn-outline-info:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-info.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
}

.btn-outline-warning {
  color: #ffc107;
  background-color: transparent;
  background-image: none;
  border-color: #ffc107;
}

.btn-outline-warning:hover {
  color: #212529;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-outline-warning:focus,
.btn-outline-warning.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-outline-warning.disabled,
.btn-outline-warning:disabled {
  color: #ffc107;
  background-color: transparent;
}

.btn-outline-warning:not(:disabled):not(.disabled):active,
.btn-outline-warning:not(:disabled):not(.disabled).active,
.show > .btn-outline-warning.dropdown-toggle {
  color: #212529;
  background-color: #ffc107;
  border-color: #ffc107;
}

.btn-outline-warning:not(:disabled):not(.disabled):active:focus,
.btn-outline-warning:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-warning.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
}

.btn-outline-danger {
  color: #dc3545;
  background-color: transparent;
  background-image: none;
  border-color: #dc3545;
}

.btn-outline-danger:hover {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.btn-outline-danger:focus,
.btn-outline-danger.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
}

.btn-outline-danger.disabled,
.btn-outline-danger:disabled {
  color: #dc3545;
  background-color: transparent;
}

.btn-outline-danger:not(:disabled):not(.disabled):active,
.btn-outline-danger:not(:disabled):not(.disabled).active,
.show > .btn-outline-danger.dropdown-toggle {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}

.btn-outline-danger:not(:disabled):not(.disabled):active:focus,
.btn-outline-danger:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-danger.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
}

.btn-outline-light {
  color: #f8f9fa;
  background-color: transparent;
  background-image: none;
  border-color: #f8f9fa;
}

.btn-outline-light:hover {
  color: #212529;
  background-color: #f8f9fa;
  border-color: #f8f9fa;
}

.btn-outline-light:focus,
.btn-outline-light.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
}

.btn-outline-light.disabled,
.btn-outline-light:disabled {
  color: #f8f9fa;
  background-color: transparent;
}

.btn-outline-light:not(:disabled):not(.disabled):active,
.btn-outline-light:not(:disabled):not(.disabled).active,
.show > .btn-outline-light.dropdown-toggle {
  color: #212529;
  background-color: #f8f9fa;
  border-color: #f8f9fa;
}

.btn-outline-light:not(:disabled):not(.disabled):active:focus,
.btn-outline-light:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-light.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
}

.btn-outline-dark {
  color: #343a40;
  background-color: transparent;
  background-image: none;
  border-color: #343a40;
}

.btn-outline-dark:hover {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40;
}

.btn-outline-dark:focus,
.btn-outline-dark.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
}

.btn-outline-dark.disabled,
.btn-outline-dark:disabled {
  color: #343a40;
  background-color: transparent;
}

.btn-outline-dark:not(:disabled):not(.disabled):active,
.btn-outline-dark:not(:disabled):not(.disabled).active,
.show > .btn-outline-dark.dropdown-toggle {
  color: #fff;
  background-color: #343a40;
  border-color: #343a40;
}

.btn-outline-dark:not(:disabled):not(.disabled):active:focus,
.btn-outline-dark:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-dark.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
}

.btn-outline-naranja {
  color: #f58508;
  background-color: transparent;
  background-image: none;
  border-color: #f58508;
}

.btn-outline-naranja:hover {
  color: #212529;
  background-color: #f58508;
  border-color: #f58508;
}

.btn-outline-naranja:focus,
.btn-outline-naranja.focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
}

.btn-outline-naranja.disabled,
.btn-outline-naranja:disabled {
  color: #f58508;
  background-color: transparent;
}

.btn-outline-naranja:not(:disabled):not(.disabled):active,
.btn-outline-naranja:not(:disabled):not(.disabled).active,
.show > .btn-outline-naranja.dropdown-toggle {
  color: #212529;
  background-color: #f58508;
  border-color: #f58508;
}

.btn-outline-naranja:not(:disabled):not(.disabled):active:focus,
.btn-outline-naranja:not(:disabled):not(.disabled).active:focus,
.show > .btn-outline-naranja.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(245, 133, 8, 0.5);
}

.btn-link {
  font-weight: 400;
  color: #007bff;
  background-color: transparent;
}

.btn-link:hover {
  color: #0056b3;
  text-decoration: underline;
  background-color: transparent;
  border-color: transparent;
}

.btn-link:focus,
.btn-link.focus {
  text-decoration: underline;
  border-color: transparent;
  -webkit-box-shadow: none;
          box-shadow: none;
}

.btn-link:disabled,
.btn-link.disabled {
  color: #6c757d;
  pointer-events: none;
}

.btn-lg,
.btn-group-lg > .btn {
  padding: 0.5rem 1rem;
  font-size: 1.125rem;
  line-height: 1.5;
  border-radius: 0;
}

.btn-sm,
.btn-group-sm > .btn {
  padding: 0.25rem 0.5rem;
  font-size: 0.7875rem;
  line-height: 1.5;
  border-radius: 0;
}

.btn-block {
  display: block;
  width: 100%;
}

.btn-block + .btn-block {
  margin-top: 0.5rem;
}

input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%;
}

.fade {
  -webkit-transition: opacity 0.15s linear;
  transition: opacity 0.15s linear;
}

@media screen and (prefers-reduced-motion: reduce) {
  .fade {
    -webkit-transition: none;
    transition: none;
  }
}

.fade:not(.show) {
  opacity: 0;
}

.collapse:not(.show) {
  display: none;
}

.collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  -webkit-transition: height 0.35s ease;
  transition: height 0.35s ease;
}

@media screen and (prefers-reduced-motion: reduce) {
  .collapsing {
    -webkit-transition: none;
    transition: none;
  }
}

.dropup,
.dropright,
.dropdown,
.dropleft {
  position: relative;
}

.dropdown-toggle::after {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0.3em solid;
  border-right: 0.3em solid transparent;
  border-bottom: 0;
  border-left: 0.3em solid transparent;
}

.dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 10rem;
  padding: 0.5rem 0;
  margin: 0.125rem 0 0;
  font-size: 0.9rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.15);
}

.dropdown-menu-right {
  right: 0;
  left: auto;
}

.dropup .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: 0.125rem;
}

.dropup .dropdown-toggle::after {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0;
  border-right: 0.3em solid transparent;
  border-bottom: 0.3em solid;
  border-left: 0.3em solid transparent;
}

.dropup .dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropright .dropdown-menu {
  top: 0;
  right: auto;
  left: 100%;
  margin-top: 0;
  margin-left: 0.125rem;
}

.dropright .dropdown-toggle::after {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0.3em solid transparent;
  border-right: 0;
  border-bottom: 0.3em solid transparent;
  border-left: 0.3em solid;
}

.dropright .dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropright .dropdown-toggle::after {
  vertical-align: 0;
}

.dropleft .dropdown-menu {
  top: 0;
  right: 100%;
  left: auto;
  margin-top: 0;
  margin-right: 0.125rem;
}

.dropleft .dropdown-toggle::after {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  content: "";
}

.dropleft .dropdown-toggle::after {
  display: none;
}

.dropleft .dropdown-toggle::before {
  display: inline-block;
  width: 0;
  height: 0;
  margin-right: 0.255em;
  vertical-align: 0.255em;
  content: "";
  border-top: 0.3em solid transparent;
  border-right: 0.3em solid;
  border-bottom: 0.3em solid transparent;
}

.dropleft .dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropleft .dropdown-toggle::before {
  vertical-align: 0;
}

.dropdown-menu[x-placement^="top"],
.dropdown-menu[x-placement^="right"],
.dropdown-menu[x-placement^="bottom"],
.dropdown-menu[x-placement^="left"] {
  right: auto;
  bottom: auto;
}

.dropdown-divider {
  height: 0;
  margin: 0.5rem 0;
  overflow: hidden;
  border-top: 1px solid #e9ecef;
}

.dropdown-item {
  display: block;
  width: 100%;
  padding: 0.25rem 1.5rem;
  clear: both;
  font-weight: 400;
  color: #212529;
  text-align: inherit;
  white-space: nowrap;
  background-color: transparent;
  border: 0;
}

.dropdown-item:hover,
.dropdown-item:focus {
  color: #16181b;
  text-decoration: none;
  background-color: #f8f9fa;
}

.dropdown-item.active,
.dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: #007bff;
}

.dropdown-item.disabled,
.dropdown-item:disabled {
  color: #6c757d;
  background-color: transparent;
}

.dropdown-menu.show {
  display: block;
}

.dropdown-header {
  display: block;
  padding: 0.5rem 1.5rem;
  margin-bottom: 0;
  font-size: 0.7875rem;
  color: #6c757d;
  white-space: nowrap;
}

.dropdown-item-text {
  display: block;
  padding: 0.25rem 1.5rem;
  color: #212529;
}

.btn-group,
.btn-group-vertical {
  position: relative;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  vertical-align: middle;
}

.btn-group > .btn,
.btn-group-vertical > .btn {
  position: relative;
  -webkit-box-flex: 0;
      -ms-flex: 0 1 auto;
          flex: 0 1 auto;
}

.btn-group > .btn:hover,
.btn-group-vertical > .btn:hover {
  z-index: 1;
}

.btn-group > .btn:focus,
.btn-group > .btn:active,
.btn-group > .btn.active,
.btn-group-vertical > .btn:focus,
.btn-group-vertical > .btn:active,
.btn-group-vertical > .btn.active {
  z-index: 1;
}

.btn-group .btn + .btn,
.btn-group .btn + .btn-group,
.btn-group .btn-group + .btn,
.btn-group .btn-group + .btn-group,
.btn-group-vertical .btn + .btn,
.btn-group-vertical .btn + .btn-group,
.btn-group-vertical .btn-group + .btn,
.btn-group-vertical .btn-group + .btn-group {
  margin-left: -1px;
}

.btn-toolbar {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: start;
      -ms-flex-pack: start;
          justify-content: flex-start;
}

.btn-toolbar .input-group {
  width: auto;
}

.btn-group > .btn:first-child {
  margin-left: 0;
}

.dropdown-toggle-split {
  padding-right: 0.5625rem;
  padding-left: 0.5625rem;
}

.dropdown-toggle-split::after,
.dropup .dropdown-toggle-split::after,
.dropright .dropdown-toggle-split::after {
  margin-left: 0;
}

.dropleft .dropdown-toggle-split::before {
  margin-right: 0;
}

.btn-sm + .dropdown-toggle-split,
.btn-group-sm > .btn + .dropdown-toggle-split {
  padding-right: 0.375rem;
  padding-left: 0.375rem;
}

.btn-lg + .dropdown-toggle-split,
.btn-group-lg > .btn + .dropdown-toggle-split {
  padding-right: 0.75rem;
  padding-left: 0.75rem;
}

.btn-group-vertical {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-align: start;
      -ms-flex-align: start;
          align-items: flex-start;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.btn-group-vertical .btn,
.btn-group-vertical .btn-group {
  width: 100%;
}

.btn-group-vertical > .btn + .btn,
.btn-group-vertical > .btn + .btn-group,
.btn-group-vertical > .btn-group + .btn,
.btn-group-vertical > .btn-group + .btn-group {
  margin-top: -1px;
  margin-left: 0;
}

.btn-group-toggle > .btn,
.btn-group-toggle > .btn-group > .btn {
  margin-bottom: 0;
}

.btn-group-toggle > .btn input[type="radio"],
.btn-group-toggle > .btn input[type="checkbox"],
.btn-group-toggle > .btn-group > .btn input[type="radio"],
.btn-group-toggle > .btn-group > .btn input[type="checkbox"] {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  pointer-events: none;
}

.input-group {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-align: stretch;
      -ms-flex-align: stretch;
          align-items: stretch;
  width: 100%;
}


.custom-control-input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}

.custom-control-input:checked ~ .custom-control-label::before {
  color: #fff;
  background-color: #007bff;
}

.custom-control-input:focus ~ .custom-control-label::before {
  -webkit-box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem transparent;
          box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem transparent;
}

.custom-control-input:active ~ .custom-control-label::before {
  color: #fff;
  background-color: #b3d7ff;
}

.custom-control-input:disabled ~ .custom-control-label {
  color: #6c757d;
}

.custom-control-input:disabled ~ .custom-control-label::before {
  background-color: #e9ecef;
}

.custom-control-label {
  position: relative;
  margin-bottom: 0;
}

.custom-control-label::before {
  position: absolute;
  top: 0.22rem;
  left: -1.5rem;
  display: block;
  width: 1rem;
  height: 1rem;
  pointer-events: none;
  content: "";
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-color: #dee2e6;
}

.custom-control-label::after {
  position: absolute;
  top: 0.22rem;
  left: -1.5rem;
  display: block;
  width: 1rem;
  height: 1rem;
  content: "";
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 50% 50%;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #007bff;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E");
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
  background-color: #007bff;
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3E%3Cpath stroke='%23fff' d='M0 2h4'/%3E%3C/svg%3E");
}

.custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
  background-color: rgba(0, 123, 255, 0.5);
}

.custom-checkbox .custom-control-input:disabled:indeterminate ~ .custom-control-label::before {
  background-color: rgba(0, 123, 255, 0.5);
}

.custom-radio .custom-control-label::before {
  border-radius: 50%;
}

.custom-radio .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #007bff;
}

.custom-radio .custom-control-input:checked ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='%23fff'/%3E%3C/svg%3E");
}

.custom-radio .custom-control-input:disabled:checked ~ .custom-control-label::before {
  background-color: rgba(0, 123, 255, 0.5);
}

.custom-select {
  display: inline-block;
  width: 100%;
  height: calc(2.19rem + 2px);
  padding: 0.375rem 1.75rem 0.375rem 0.75rem;
  line-height: 1.6;
  color: #495057;
  vertical-align: middle;
  background: #fff url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right 0.75rem center;
  background-size: 8px 10px;
  border: 1px solid #ced4da;
  border-radius: 0;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}

.custom-select:focus {
  border-color: #80bdff;
  outline: 0;
  -webkit-box-shadow: 0 0 0 0.2rem rgba(128, 189, 255, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(128, 189, 255, 0.5);
}

.custom-select:focus::-ms-value {
  color: #495057;
  background-color: #fff;
}

.custom-select[multiple],
.custom-select[size]:not([size="1"]) {
  height: auto;
  padding-right: 0.75rem;
  background-image: none;
}

.custom-select:disabled {
  color: #6c757d;
  background-color: #e9ecef;
}

.custom-select::-ms-expand {
  opacity: 0;
}

.custom-select-sm {
  height: calc(1.68125rem + 2px);
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  font-size: 75%;
}

.custom-select-lg {
  height: calc(2.6875rem + 2px);
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  font-size: 125%;
}

.custom-file {
  position: relative;
  display: inline-block;
  width: 100%;
  height: calc(2.19rem + 2px);
  margin-bottom: 0;
}

.custom-file-input {
  position: relative;
  z-index: 2;
  width: 100%;
  height: calc(2.19rem + 2px);
  margin: 0;
  opacity: 0;
}

.custom-file-input:focus ~ .custom-file-label {
  border-color: #80bdff;
  -webkit-box-shadow: 0 0 0 0.2rem transparent;
          box-shadow: 0 0 0 0.2rem transparent;
}

.custom-file-input:focus ~ .custom-file-label::after {
  border-color: #80bdff;
}

.custom-file-input:disabled ~ .custom-file-label {
  background-color: #e9ecef;
}

.custom-file-input:lang(en) ~ .custom-file-label::after {
  content: "Browse";
}

.custom-file-label {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1;
  height: calc(2.19rem + 2px);
  padding: 0.375rem 0.75rem;
  line-height: 1.6;
  color: #495057;
  background-color: #fff;
  border: 1px solid #ced4da;
}

.custom-file-label::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 3;
  display: block;
  height: 2.19rem;
  padding: 0.375rem 0.75rem;
  line-height: 1.6;
  color: #495057;
  content: "Browse";
  background-color: #e9ecef;
  border-left: 1px solid #ced4da;
}

.custom-range {
  width: 100%;
  padding-left: 0;
  background-color: transparent;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}

.custom-range:focus {
  outline: none;
}

.custom-range:focus::-webkit-slider-thumb {
  -webkit-box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem transparent;
          box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem transparent;
}

.custom-range:focus::-moz-range-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem transparent;
}

.custom-range:focus::-ms-thumb {
  box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem transparent;
}

.custom-range::-moz-focus-outer {
  border: 0;
}

.custom-range::-webkit-slider-thumb {
  width: 1rem;
  height: 1rem;
  margin-top: -0.25rem;
  background-color: #007bff;
  border: 0;
  -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  -webkit-appearance: none;
          appearance: none;
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-range::-webkit-slider-thumb {
    -webkit-transition: none;
    transition: none;
  }
}

.custom-range::-webkit-slider-thumb:active {
  background-color: #b3d7ff;
}

.custom-range::-webkit-slider-runnable-track {
  width: 100%;
  height: 0.5rem;
  color: transparent;
  cursor: pointer;
  background-color: #dee2e6;
  border-color: transparent;
}

.custom-range::-moz-range-thumb {
  width: 1rem;
  height: 1rem;
  background-color: #007bff;
  border: 0;
  -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  -moz-appearance: none;
       appearance: none;
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-range::-moz-range-thumb {
    -webkit-transition: none;
    transition: none;
  }
}

.custom-range::-moz-range-thumb:active {
  background-color: #b3d7ff;
}

.custom-range::-moz-range-track {
  width: 100%;
  height: 0.5rem;
  color: transparent;
  cursor: pointer;
  background-color: #dee2e6;
  border-color: transparent;
}

.custom-range::-ms-thumb {
  width: 1rem;
  height: 1rem;
  margin-top: 0;
  margin-right: 0.2rem;
  margin-left: 0.2rem;
  background-color: #007bff;
  border: 0;
  -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  appearance: none;
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-range::-ms-thumb {
    -webkit-transition: none;
    transition: none;
  }
}

.custom-range::-ms-thumb:active {
  background-color: #b3d7ff;
}

.custom-range::-ms-track {
  width: 100%;
  height: 0.5rem;
  color: transparent;
  cursor: pointer;
  background-color: transparent;
  border-color: transparent;
  border-width: 0.5rem;
}

.custom-range::-ms-fill-lower {
  background-color: #dee2e6;
}

.custom-range::-ms-fill-upper {
  margin-right: 15px;
  background-color: #dee2e6;
}

.custom-control-label::before,
.custom-file-label,
.custom-select {
  -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}

@media screen and (prefers-reduced-motion: reduce) {
  .custom-control-label::before,
  .custom-file-label,
  .custom-select {
    -webkit-transition: none;
    transition: none;
  }
}

.nav {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.nav-link {
  display: block;
  padding: 0.5rem 1rem;
}

.nav-link:hover,
.nav-link:focus {
  text-decoration: none;
}

.nav-link.disabled {
  color: #6c757d;
}

.nav-tabs {
  border-bottom: 1px solid #dee2e6;
}

.nav-tabs .nav-item {
  margin-bottom: -1px;
}

.nav-tabs .nav-link {
  border: 1px solid transparent;
}

.nav-tabs .nav-link:hover,
.nav-tabs .nav-link:focus {
  border-color: #e9ecef #e9ecef #dee2e6;
}

.nav-tabs .nav-link.disabled {
  color: #6c757d;
  background-color: transparent;
  border-color: transparent;
}

.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .dropdown-menu {
  margin-top: -1px;
}

.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #007bff;
}

.nav-fill .nav-item {
  -webkit-box-flex: 1;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
  text-align: center;
}

.nav-justified .nav-item {
  -ms-flex-preferred-size: 0;
      flex-basis: 0;
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  text-align: center;
}

.tab-content > .tab-pane {
  display: none;
}

.tab-content > .active {
  display: block;
}

.navbar {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  padding: 0.5rem 1rem;
}

.navbar > .container,
.navbar > .container-fluid {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.navbar-brand {
  display: inline-block;
  padding-top: 0.32rem;
  padding-bottom: 0.32rem;
  margin-right: 1rem;
  font-size: 1.125rem;
  line-height: inherit;
  white-space: nowrap;
}

.navbar-brand:hover,
.navbar-brand:focus {
  text-decoration: none;
}

.navbar-nav {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.navbar-nav .nav-link {
  padding-right: 0;
  padding-left: 0;
}

.navbar-nav .dropdown-menu {
  position: static;
  float: none;
}

.navbar-text {
  display: inline-block;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.navbar-collapse {
  -ms-flex-preferred-size: 100%;
      flex-basis: 100%;
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.navbar-toggler {
  padding: 0.25rem 0.75rem;
  font-size: 1.125rem;
  line-height: 1;
  background-color: transparent;
  border: 1px solid transparent;
}

.navbar-toggler:hover,
.navbar-toggler:focus {
  text-decoration: none;
}

.navbar-toggler:not(:disabled):not(.disabled) {
  cursor: pointer;
}

.navbar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  content: "";
  background: no-repeat center center;
  background-size: 100% 100%;
}

@media (max-width: 575.98px) {
  .navbar-expand-sm > .container,
  .navbar-expand-sm > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 576px) {
  .navbar-expand-sm {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  }

  .navbar-expand-sm .navbar-nav {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
  }

  .navbar-expand-sm .navbar-nav .dropdown-menu {
    position: absolute;
  }

  .navbar-expand-sm .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }

  .navbar-expand-sm > .container,
  .navbar-expand-sm > .container-fluid {
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
  }

  .navbar-expand-sm .navbar-collapse {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
        flex-basis: auto;
  }

  .navbar-expand-sm .navbar-toggler {
    display: none;
  }
}

@media (max-width: 767.98px) {
  .navbar-expand-md > .container,
  .navbar-expand-md > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 768px) {
  .navbar-expand-md {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  }

  .navbar-expand-md .navbar-nav {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
  }

  .navbar-expand-md .navbar-nav .dropdown-menu {
    position: absolute;
  }

  .navbar-expand-md .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }

  .navbar-expand-md > .container,
  .navbar-expand-md > .container-fluid {
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
  }

  .navbar-expand-md .navbar-collapse {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
        flex-basis: auto;
  }

  .navbar-expand-md .navbar-toggler {
    display: none;
  }
}

@media (max-width: 991.98px) {
  .navbar-expand-lg > .container,
  .navbar-expand-lg > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 992px) {
  .navbar-expand-lg {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  }

  .navbar-expand-lg .navbar-nav {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
  }

  .navbar-expand-lg .navbar-nav .dropdown-menu {
    position: absolute;
  }

  .navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }

  .navbar-expand-lg > .container,
  .navbar-expand-lg > .container-fluid {
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
  }

  .navbar-expand-lg .navbar-collapse {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
        flex-basis: auto;
  }

  .navbar-expand-lg .navbar-toggler {
    display: none;
  }
}

@media (max-width: 1199.98px) {
  .navbar-expand-xl > .container,
  .navbar-expand-xl > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 1200px) {
  .navbar-expand-xl {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  }

  .navbar-expand-xl .navbar-nav {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
  }

  .navbar-expand-xl .navbar-nav .dropdown-menu {
    position: absolute;
  }

  .navbar-expand-xl .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }

  .navbar-expand-xl > .container,
  .navbar-expand-xl > .container-fluid {
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
  }

  .navbar-expand-xl .navbar-collapse {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
        flex-basis: auto;
  }

  .navbar-expand-xl .navbar-toggler {
    display: none;
  }
}

@media (max-width: 1355.98px) {
  .navbar-expand-xxl > .container,
  .navbar-expand-xxl > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 1356px) {
  .navbar-expand-xxl {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  }

  .navbar-expand-xxl .navbar-nav {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
  }

  .navbar-expand-xxl .navbar-nav .dropdown-menu {
    position: absolute;
  }

  .navbar-expand-xxl .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }

  .navbar-expand-xxl > .container,
  .navbar-expand-xxl > .container-fluid {
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
  }

  .navbar-expand-xxl .navbar-collapse {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
        flex-basis: auto;
  }

  .navbar-expand-xxl .navbar-toggler {
    display: none;
  }
}

@media (max-width: 1844.98px) {
  .navbar-expand-xxxl > .container,
  .navbar-expand-xxxl > .container-fluid {
    padding-right: 0;
    padding-left: 0;
  }
}

@media (min-width: 1845px) {
  .navbar-expand-xxxl {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
    -webkit-box-pack: start;
        -ms-flex-pack: start;
            justify-content: flex-start;
  }

  .navbar-expand-xxxl .navbar-nav {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
  }

  .navbar-expand-xxxl .navbar-nav .dropdown-menu {
    position: absolute;
  }

  .navbar-expand-xxxl .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }

  .navbar-expand-xxxl > .container,
  .navbar-expand-xxxl > .container-fluid {
    -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
  }

  .navbar-expand-xxxl .navbar-collapse {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
    -ms-flex-preferred-size: auto;
        flex-basis: auto;
  }

  .navbar-expand-xxxl .navbar-toggler {
    display: none;
  }
}

.navbar-expand {
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
  -webkit-box-pack: start;
      -ms-flex-pack: start;
          justify-content: flex-start;
}

.navbar-expand > .container,
.navbar-expand > .container-fluid {
  padding-right: 0;
  padding-left: 0;
}

.navbar-expand .navbar-nav {
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
}

.navbar-expand .navbar-nav .dropdown-menu {
  position: absolute;
}

.navbar-expand .navbar-nav .nav-link {
  padding-right: 0.5rem;
  padding-left: 0.5rem;
}

.navbar-expand > .container,
.navbar-expand > .container-fluid {
  -ms-flex-wrap: nowrap;
      flex-wrap: nowrap;
}

.navbar-expand .navbar-collapse {
  display: -webkit-box !important;
  display: -ms-flexbox !important;
  display: flex !important;
  -ms-flex-preferred-size: auto;
      flex-basis: auto;
}

.navbar-expand .navbar-toggler {
  display: none;
}

.navbar-light .navbar-brand {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-brand:hover,
.navbar-light .navbar-brand:focus {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-nav .nav-link {
  color: rgba(0, 0, 0, 0.5);
}

.navbar-light .navbar-nav .nav-link:hover,
.navbar-light .navbar-nav .nav-link:focus {
  color: rgba(0, 0, 0, 0.7);
}

.navbar-light .navbar-nav .nav-link.disabled {
  color: rgba(0, 0, 0, 0.3);
}

.navbar-light .navbar-nav .show > .nav-link,
.navbar-light .navbar-nav .active > .nav-link,
.navbar-light .navbar-nav .nav-link.show,
.navbar-light .navbar-nav .nav-link.active {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-toggler {
  color: rgba(0, 0, 0, 0.5);
  border-color: rgba(0, 0, 0, 0.1);
}

.navbar-light .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.navbar-light .navbar-text {
  color: rgba(0, 0, 0, 0.5);
}

.navbar-light .navbar-text a {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-light .navbar-text a:hover,
.navbar-light .navbar-text a:focus {
  color: rgba(0, 0, 0, 0.9);
}

.navbar-dark .navbar-brand {
  color: #fff;
}

.navbar-dark .navbar-brand:hover,
.navbar-dark .navbar-brand:focus {
  color: #fff;
}

.navbar-dark .navbar-nav .nav-link {
  color: rgba(255, 255, 255, 0.5);
}

.navbar-dark .navbar-nav .nav-link:hover,
.navbar-dark .navbar-nav .nav-link:focus {
  color: rgba(255, 255, 255, 0.75);
}

.navbar-dark .navbar-nav .nav-link.disabled {
  color: rgba(255, 255, 255, 0.25);
}

.navbar-dark .navbar-nav .show > .nav-link,
.navbar-dark .navbar-nav .active > .nav-link,
.navbar-dark .navbar-nav .nav-link.show,
.navbar-dark .navbar-nav .nav-link.active {
  color: #fff;
}

.navbar-dark .navbar-toggler {
  color: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.1);
}

.navbar-dark .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.navbar-dark .navbar-text {
  color: rgba(255, 255, 255, 0.5);
}

.navbar-dark .navbar-text a {
  color: #fff;
}

.navbar-dark .navbar-text a:hover,
.navbar-dark .navbar-text a:focus {
  color: #fff;
}

.card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
}

.card > hr {
  margin-right: 0;
  margin-left: 0;
}

.card-body {
  -webkit-box-flex: 1;
      -ms-flex: 1 1 auto;
          flex: 1 1 auto;
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.75rem;
}

.card-subtitle {
  margin-top: -0.375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link:hover {
  text-decoration: none;
}

.card-link + .card-link {
  margin-left: 1.25rem;
}

.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header + .list-group .list-group-item:first-child {
  border-top: 0;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header-tabs {
  margin-right: -0.625rem;
  margin-bottom: -0.75rem;
  margin-left: -0.625rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.625rem;
  margin-left: -0.625rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
}

.card-img {
  width: 100%;
}

.card-img-top {
  width: 100%;
}

.card-img-bottom {
  width: 100%;
}

.card-deck {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.card-deck .card {
  margin-bottom: 15px;
}

@media (min-width: 576px) {
  .card-deck {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row wrap;
            flex-flow: row wrap;
    margin-right: -15px;
    margin-left: -15px;
  }

  .card-deck .card {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
        -ms-flex: 1 0 0%;
            flex: 1 0 0%;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    margin-right: 15px;
    margin-bottom: 0;
    margin-left: 15px;
  }
}

.card-group {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.card-group > .card {
  margin-bottom: 15px;
}

@media (min-width: 576px) {
  .card-group {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-flow: row wrap;
            flex-flow: row wrap;
  }

  .card-group > .card {
    -webkit-box-flex: 1;
        -ms-flex: 1 0 0%;
            flex: 1 0 0%;
    margin-bottom: 0;
  }

  .card-group > .card + .card {
    margin-left: 0;
    border-left: 0;
  }
}

.card-columns .card {
  margin-bottom: 0.75rem;
}

@media (min-width: 576px) {
  .card-columns {
    -webkit-column-count: 3;
            column-count: 3;
    -webkit-column-gap: 1.25rem;
            column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }

  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}

.accordion .card:not(:first-of-type):not(:last-of-type) {
  border-bottom: 0;
  border-radius: 0;
}

.accordion .card:not(:first-of-type) .card-header:first-child {
  border-radius: 0;
}

.accordion .card:first-of-type {
  border-bottom: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.accordion .card:last-of-type {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.breadcrumb {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  padding: 0.75rem 1rem;
  margin-bottom: 1rem;
  list-style: none;
  background-color: #e9ecef;
}

.breadcrumb-item + .breadcrumb-item {
  padding-left: 0.5rem;
}

.breadcrumb-item + .breadcrumb-item::before {
  display: inline-block;
  padding-right: 0.5rem;
  color: #6c757d;
  content: "/";
}

.breadcrumb-item + .breadcrumb-item:hover::before {
  text-decoration: underline;
}

.breadcrumb-item + .breadcrumb-item:hover::before {
  text-decoration: none;
}

.breadcrumb-item.active {
  color: #6c757d;
}

.pagination {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding-left: 0;
  list-style: none;
}

.page-link {
  position: relative;
  display: block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #007bff;
  background-color: #fff;
  border: 1px solid #dee2e6;
}

.page-link:hover {
  z-index: 2;
  color: #0056b3;
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.page-link:focus {
  z-index: 2;
  outline: 0;
  -webkit-box-shadow: 0 0 0 0.2rem transparent;
          box-shadow: 0 0 0 0.2rem transparent;
}

.page-link:not(:disabled):not(.disabled) {
  cursor: pointer;
}

.page-item:first-child .page-link {
  margin-left: 0;
}

.page-item.active .page-link {
  z-index: 1;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  cursor: auto;
  background-color: #fff;
  border-color: #dee2e6;
}

.pagination-lg .page-link {
  padding: 0.75rem 1.5rem;
  font-size: 1.125rem;
  line-height: 1.5;
}

.pagination-sm .page-link {
  padding: 0.25rem 0.5rem;
  font-size: 0.7875rem;
  line-height: 1.5;
}

.badge {
  display: inline-block;
  padding: 0.25em 0.4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
}

.badge:empty {
  display: none;
}

.btn .badge {
  position: relative;
  top: -1px;
}

.badge-pill {
  padding-right: 0.6em;
  padding-left: 0.6em;
}

.badge-primary {
  color: #fff;
  background-color: #007bff;
}

.badge-primary[href]:hover,
.badge-primary[href]:focus {
  color: #fff;
  text-decoration: none;
  background-color: #0062cc;
}

.badge-secondary {
  color: #fff;
  background-color: #6c757d;
}

.badge-secondary[href]:hover,
.badge-secondary[href]:focus {
  color: #fff;
  text-decoration: none;
  background-color: #545b62;
}

.badge-success {
  color: #fff;
  background-color: #28a745;
}

.badge-success[href]:hover,
.badge-success[href]:focus {
  color: #fff;
  text-decoration: none;
  background-color: #1e7e34;
}

.badge-info {
  color: #fff;
  background-color: #17a2b8;
}

.badge-info[href]:hover,
.badge-info[href]:focus {
  color: #fff;
  text-decoration: none;
  background-color: #117a8b;
}

.badge-warning {
  color: #212529;
  background-color: #ffc107;
}

.badge-warning[href]:hover,
.badge-warning[href]:focus {
  color: #212529;
  text-decoration: none;
  background-color: #d39e00;
}

.badge-danger {
  color: #fff;
  background-color: #dc3545;
}

.badge-danger[href]:hover,
.badge-danger[href]:focus {
  color: #fff;
  text-decoration: none;
  background-color: #bd2130;
}

.badge-light {
  color: #212529;
  background-color: #f8f9fa;
}

.badge-light[href]:hover,
.badge-light[href]:focus {
  color: #212529;
  text-decoration: none;
  background-color: #dae0e5;
}

.badge-dark {
  color: #fff;
  background-color: #343a40;
}

.badge-dark[href]:hover,
.badge-dark[href]:focus {
  color: #fff;
  text-decoration: none;
  background-color: #1d2124;
}

.badge-naranja {
  color: #212529;
  background-color: #f58508;
}

.badge-naranja[href]:hover,
.badge-naranja[href]:focus {
  color: #212529;
  text-decoration: none;
  background-color: #c46a06;
}

.jumbotron {
  padding: 2rem 1rem;
  margin-bottom: 2rem;
  background-color: #e9ecef;
}

@media (min-width: 576px) {
  .jumbotron {
    padding: 4rem 2rem;
  }
}

.jumbotron-fluid {
  padding-right: 0;
  padding-left: 0;
}

.alert {
  position: relative;
  padding: 0.75rem 1.25rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
}

.alert-heading {
  color: inherit;
}

.alert-link {
  font-weight: 700;
}

.alert-dismissible {
  padding-right: 3.85rem;
}

.alert-dismissible .close {
  position: absolute;
  top: 0;
  right: 0;
  padding: 0.75rem 1.25rem;
  color: inherit;
}

.alert-primary {
  color: #004085;
  background-color: #cce5ff;
  border-color: #b8daff;
}

.alert-primary hr {
  border-top-color: #9fcdff;
}

.alert-primary .alert-link {
  color: #002752;
}

.alert-secondary {
  color: #383d41;
  background-color: #e2e3e5;
  border-color: #d6d8db;
}

.alert-secondary hr {
  border-top-color: #c8cbcf;
}

.alert-secondary .alert-link {
  color: #202326;
}

.alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
}

.alert-success hr {
  border-top-color: #b1dfbb;
}

.alert-success .alert-link {
  color: #0b2e13;
}

.alert-info {
  color: #0c5460;
  background-color: #d1ecf1;
  border-color: #bee5eb;
}

.alert-info hr {
  border-top-color: #abdde5;
}

.alert-info .alert-link {
  color: #062c33;
}

.alert-warning {
  color: #856404;
  background-color: #fff3cd;
  border-color: #ffeeba;
}

.alert-warning hr {
  border-top-color: #ffe8a1;
}

.alert-warning .alert-link {
  color: #533f03;
}

.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}

.alert-danger hr {
  border-top-color: #f1b0b7;
}

.alert-danger .alert-link {
  color: #491217;
}

.alert-light {
  color: #818182;
  background-color: #fefefe;
  border-color: #fdfdfe;
}

.alert-light hr {
  border-top-color: #ececf6;
}

.alert-light .alert-link {
  color: #686868;
}

.alert-dark {
  color: #1b1e21;
  background-color: #d6d8d9;
  border-color: #c6c8ca;
}

.alert-dark hr {
  border-top-color: #b9bbbe;
}

.alert-dark .alert-link {
  color: #040505;
}

.alert-naranja {
  color: #7f4504;
  background-color: #fde7ce;
  border-color: #fcddba;
}

.alert-naranja hr {
  border-top-color: #fbd1a2;
}

.alert-naranja .alert-link {
  color: #4e2a02;
}

@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0;
  }

  to {
    background-position: 0 0;
  }
}

@keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0;
  }

  to {
    background-position: 0 0;
  }
}

.progress {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  height: 1rem;
  overflow: hidden;
  font-size: 0.675rem;
  background-color: #e9ecef;
}

.progress-bar {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  background-color: #007bff;
  -webkit-transition: width 0.6s ease;
  transition: width 0.6s ease;
}

@media screen and (prefers-reduced-motion: reduce) {
  .progress-bar {
    -webkit-transition: none;
    transition: none;
  }
}

.progress-bar-striped {
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-size: 1rem 1rem;
}

.progress-bar-animated {
  -webkit-animation: progress-bar-stripes 1s linear infinite;
          animation: progress-bar-stripes 1s linear infinite;
}

.media {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
      -ms-flex-align: start;
          align-items: flex-start;
}

.media-body {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
}

.list-group {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
}

.list-group-item-action {
  width: 100%;
  color: #495057;
  text-align: inherit;
}

.list-group-item-action:hover,
.list-group-item-action:focus {
  color: #495057;
  text-decoration: none;
  background-color: #f8f9fa;
}

.list-group-item-action:active {
  color: #212529;
  background-color: #e9ecef;
}

.list-group-item {
  position: relative;
  display: block;
  padding: 0.75rem 1.25rem;
  margin-bottom: -1px;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.125);
}

.list-group-item:last-child {
  margin-bottom: 0;
}

.list-group-item:hover,
.list-group-item:focus {
  z-index: 1;
  text-decoration: none;
}

.list-group-item.disabled,
.list-group-item:disabled {
  color: #6c757d;
  background-color: #fff;
}

.list-group-item.active {
  z-index: 2;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.list-group-flush .list-group-item {
  border-right: 0;
  border-left: 0;
}

.list-group-flush:first-child .list-group-item:first-child {
  border-top: 0;
}

.list-group-flush:last-child .list-group-item:last-child {
  border-bottom: 0;
}

.list-group-item-primary {
  color: #004085;
  background-color: #b8daff;
}

.list-group-item-primary.list-group-item-action:hover,
.list-group-item-primary.list-group-item-action:focus {
  color: #004085;
  background-color: #9fcdff;
}

.list-group-item-primary.list-group-item-action.active {
  color: #fff;
  background-color: #004085;
  border-color: #004085;
}

.list-group-item-secondary {
  color: #383d41;
  background-color: #d6d8db;
}

.list-group-item-secondary.list-group-item-action:hover,
.list-group-item-secondary.list-group-item-action:focus {
  color: #383d41;
  background-color: #c8cbcf;
}

.list-group-item-secondary.list-group-item-action.active {
  color: #fff;
  background-color: #383d41;
  border-color: #383d41;
}

.list-group-item-success {
  color: #155724;
  background-color: #c3e6cb;
}

.list-group-item-success.list-group-item-action:hover,
.list-group-item-success.list-group-item-action:focus {
  color: #155724;
  background-color: #b1dfbb;
}

.list-group-item-success.list-group-item-action.active {
  color: #fff;
  background-color: #155724;
  border-color: #155724;
}

.list-group-item-info {
  color: #0c5460;
  background-color: #bee5eb;
}

.list-group-item-info.list-group-item-action:hover,
.list-group-item-info.list-group-item-action:focus {
  color: #0c5460;
  background-color: #abdde5;
}

.list-group-item-info.list-group-item-action.active {
  color: #fff;
  background-color: #0c5460;
  border-color: #0c5460;
}

.list-group-item-warning {
  color: #856404;
  background-color: #ffeeba;
}

.list-group-item-warning.list-group-item-action:hover,
.list-group-item-warning.list-group-item-action:focus {
  color: #856404;
  background-color: #ffe8a1;
}

.list-group-item-warning.list-group-item-action.active {
  color: #fff;
  background-color: #856404;
  border-color: #856404;
}

.list-group-item-danger {
  color: #721c24;
  background-color: #f5c6cb;
}

.list-group-item-danger.list-group-item-action:hover,
.list-group-item-danger.list-group-item-action:focus {
  color: #721c24;
  background-color: #f1b0b7;
}

.list-group-item-danger.list-group-item-action.active {
  color: #fff;
  background-color: #721c24;
  border-color: #721c24;
}

.list-group-item-light {
  color: #818182;
  background-color: #fdfdfe;
}

.list-group-item-light.list-group-item-action:hover,
.list-group-item-light.list-group-item-action:focus {
  color: #818182;
  background-color: #ececf6;
}

.list-group-item-light.list-group-item-action.active {
  color: #fff;
  background-color: #818182;
  border-color: #818182;
}

.list-group-item-dark {
  color: #1b1e21;
  background-color: #c6c8ca;
}

.list-group-item-dark.list-group-item-action:hover,
.list-group-item-dark.list-group-item-action:focus {
  color: #1b1e21;
  background-color: #b9bbbe;
}

.list-group-item-dark.list-group-item-action.active {
  color: #fff;
  background-color: #1b1e21;
  border-color: #1b1e21;
}

.list-group-item-naranja {
  color: #7f4504;
  background-color: #fcddba;
}

.list-group-item-naranja.list-group-item-action:hover,
.list-group-item-naranja.list-group-item-action:focus {
  color: #7f4504;
  background-color: #fbd1a2;
}

.list-group-item-naranja.list-group-item-action.active {
  color: #fff;
  background-color: #7f4504;
  border-color: #7f4504;
}

.close {
  float: right;
  font-size: 1.35rem;
  font-weight: 700;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  opacity: .5;
}

.close:not(:disabled):not(.disabled) {
  cursor: pointer;
}

.close:not(:disabled):not(.disabled):hover,
.close:not(:disabled):not(.disabled):focus {
  color: #000;
  text-decoration: none;
  opacity: .75;
}

button.close {
  padding: 0;
  background-color: transparent;
  border: 0;
  -webkit-appearance: none;
}

.tooltip {
  position: absolute;
  z-index: 1070;
  display: block;
  margin: 0;
  font-family: "Gotham Light", sans-serif;
  font-style: normal;
  font-weight: 400;
  line-height: 1.6;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: 0.7875rem;
  word-wrap: break-word;
  opacity: 0;
}

.tooltip.show {
  opacity: 0.9;
}

.tooltip .arrow {
  position: absolute;
  display: block;
  width: 0.8rem;
  height: 0.4rem;
}

.tooltip .arrow::before {
  position: absolute;
  content: "";
  border-color: transparent;
  border-style: solid;
}

.bs-tooltip-top,
.bs-tooltip-auto[x-placement^="top"] {
  padding: 0.4rem 0;
}

.bs-tooltip-top .arrow,
.bs-tooltip-auto[x-placement^="top"] .arrow {
  bottom: 0;
}

.bs-tooltip-top .arrow::before,
.bs-tooltip-auto[x-placement^="top"] .arrow::before {
  top: 0;
  border-width: 0.4rem 0.4rem 0;
  border-top-color: #000;
}

.bs-tooltip-right,
.bs-tooltip-auto[x-placement^="right"] {
  padding: 0 0.4rem;
}

.bs-tooltip-right .arrow,
.bs-tooltip-auto[x-placement^="right"] .arrow {
  left: 0;
  width: 0.4rem;
  height: 0.8rem;
}

.bs-tooltip-right .arrow::before,
.bs-tooltip-auto[x-placement^="right"] .arrow::before {
  right: 0;
  border-width: 0.4rem 0.4rem 0.4rem 0;
  border-right-color: #000;
}

.bs-tooltip-bottom,
.bs-tooltip-auto[x-placement^="bottom"] {
  padding: 0.4rem 0;
}

.bs-tooltip-bottom .arrow,
.bs-tooltip-auto[x-placement^="bottom"] .arrow {
  top: 0;
}

.bs-tooltip-bottom .arrow::before,
.bs-tooltip-auto[x-placement^="bottom"] .arrow::before {
  bottom: 0;
  border-width: 0 0.4rem 0.4rem;
  border-bottom-color: #000;
}

.bs-tooltip-left,
.bs-tooltip-auto[x-placement^="left"] {
  padding: 0 0.4rem;
}

.bs-tooltip-left .arrow,
.bs-tooltip-auto[x-placement^="left"] .arrow {
  right: 0;
  width: 0.4rem;
  height: 0.8rem;
}

.bs-tooltip-left .arrow::before,
.bs-tooltip-auto[x-placement^="left"] .arrow::before {
  left: 0;
  border-width: 0.4rem 0 0.4rem 0.4rem;
  border-left-color: #000;
}

.tooltip-inner {
  max-width: 200px;
  padding: 0.25rem 0.5rem;
  color: #fff;
  text-align: center;
  background-color: #000;
}

.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1060;
  display: block;
  max-width: 276px;
  font-family: "Gotham Light", sans-serif;
  font-style: normal;
  font-weight: 400;
  line-height: 1.6;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: 0.7875rem;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.2);
}

.popover .arrow {
  position: absolute;
  display: block;
  width: 1rem;
  height: 0.5rem;
  margin: 0 0.3rem;
}

.popover .arrow::before,
.popover .arrow::after {
  position: absolute;
  display: block;
  content: "";
  border-color: transparent;
  border-style: solid;
}

.bs-popover-top,
.bs-popover-auto[x-placement^="top"] {
  margin-bottom: 0.5rem;
}

.bs-popover-top .arrow,
.bs-popover-auto[x-placement^="top"] .arrow {
  bottom: calc((0.5rem + 1px) * -1);
}

.bs-popover-top .arrow::before,
.bs-popover-auto[x-placement^="top"] .arrow::before,
.bs-popover-top .arrow::after,
.bs-popover-auto[x-placement^="top"] .arrow::after {
  border-width: 0.5rem 0.5rem 0;
}

.bs-popover-top .arrow::before,
.bs-popover-auto[x-placement^="top"] .arrow::before {
  bottom: 0;
  border-top-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-top .arrow::after,
.bs-popover-auto[x-placement^="top"] .arrow::after {
  bottom: 1px;
  border-top-color: #fff;
}

.bs-popover-right,
.bs-popover-auto[x-placement^="right"] {
  margin-left: 0.5rem;
}

.bs-popover-right .arrow,
.bs-popover-auto[x-placement^="right"] .arrow {
  left: calc((0.5rem + 1px) * -1);
  width: 0.5rem;
  height: 1rem;
  margin: 0.3rem 0;
}

.bs-popover-right .arrow::before,
.bs-popover-auto[x-placement^="right"] .arrow::before,
.bs-popover-right .arrow::after,
.bs-popover-auto[x-placement^="right"] .arrow::after {
  border-width: 0.5rem 0.5rem 0.5rem 0;
}

.bs-popover-right .arrow::before,
.bs-popover-auto[x-placement^="right"] .arrow::before {
  left: 0;
  border-right-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-right .arrow::after,
.bs-popover-auto[x-placement^="right"] .arrow::after {
  left: 1px;
  border-right-color: #fff;
}

.bs-popover-bottom,
.bs-popover-auto[x-placement^="bottom"] {
  margin-top: 0.5rem;
}

.bs-popover-bottom .arrow,
.bs-popover-auto[x-placement^="bottom"] .arrow {
  top: calc((0.5rem + 1px) * -1);
}

.bs-popover-bottom .arrow::before,
.bs-popover-auto[x-placement^="bottom"] .arrow::before,
.bs-popover-bottom .arrow::after,
.bs-popover-auto[x-placement^="bottom"] .arrow::after {
  border-width: 0 0.5rem 0.5rem 0.5rem;
}

.bs-popover-bottom .arrow::before,
.bs-popover-auto[x-placement^="bottom"] .arrow::before {
  top: 0;
  border-bottom-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-bottom .arrow::after,
.bs-popover-auto[x-placement^="bottom"] .arrow::after {
  top: 1px;
  border-bottom-color: #fff;
}

.bs-popover-bottom .popover-header::before,
.bs-popover-auto[x-placement^="bottom"] .popover-header::before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 1rem;
  margin-left: -0.5rem;
  content: "";
  border-bottom: 1px solid #f7f7f7;
}

.bs-popover-left,
.bs-popover-auto[x-placement^="left"] {
  margin-right: 0.5rem;
}

.bs-popover-left .arrow,
.bs-popover-auto[x-placement^="left"] .arrow {
  right: calc((0.5rem + 1px) * -1);
  width: 0.5rem;
  height: 1rem;
  margin: 0.3rem 0;
}

.bs-popover-left .arrow::before,
.bs-popover-auto[x-placement^="left"] .arrow::before,
.bs-popover-left .arrow::after,
.bs-popover-auto[x-placement^="left"] .arrow::after {
  border-width: 0.5rem 0 0.5rem 0.5rem;
}

.bs-popover-left .arrow::before,
.bs-popover-auto[x-placement^="left"] .arrow::before {
  right: 0;
  border-left-color: rgba(0, 0, 0, 0.25);
}

.bs-popover-left .arrow::after,
.bs-popover-auto[x-placement^="left"] .arrow::after {
  right: 1px;
  border-left-color: #fff;
}

.popover-header {
  padding: 0.5rem 0.75rem;
  margin-bottom: 0;
  font-size: 0.9rem;
  color: inherit;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
}

.popover-header:empty {
  display: none;
}

.popover-body {
  padding: 0.5rem 0.75rem;
  color: #212529;
}

.carousel {
  position: relative;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-item {
  position: relative;
  display: none;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-perspective: 1000px;
          perspective: 1000px;
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block;
  -webkit-transition: -webkit-transform 0.6s ease;
  transition: -webkit-transform 0.6s ease;
  transition: transform 0.6s ease;
  transition: transform 0.6s ease, -webkit-transform 0.6s ease;
}

@media screen and (prefers-reduced-motion: reduce) {
  .carousel-item.active,
  .carousel-item-next,
  .carousel-item-prev {
    -webkit-transition: none;
    transition: none;
  }
}

.carousel-item-next,
.carousel-item-prev {
  position: absolute;
  top: 0;
}

.carousel-item-next.carousel-item-left,
.carousel-item-prev.carousel-item-right {
  -webkit-transform: translateX(0);
          transform: translateX(0);
}

@supports ((-webkit-transform-style: preserve-3d) or (transform-style: preserve-3d)) {
  .carousel-item-next.carousel-item-left,
  .carousel-item-prev.carousel-item-right {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
  }
}

.carousel-item-next,
.active.carousel-item-right {
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}

@supports ((-webkit-transform-style: preserve-3d) or (transform-style: preserve-3d)) {
  .carousel-item-next,
  .active.carousel-item-right {
    -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
  }
}

.carousel-item-prev,
.active.carousel-item-left {
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}

@supports ((-webkit-transform-style: preserve-3d) or (transform-style: preserve-3d)) {
  .carousel-item-prev,
  .active.carousel-item-left {
    -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
  }
}

.carousel-fade .carousel-item {
  opacity: 0;
  -webkit-transition-duration: .6s;
          transition-duration: .6s;
  -webkit-transition-property: opacity;
  transition-property: opacity;
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right {
  opacity: 1;
}

.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-right {
  opacity: 0;
}

.carousel-fade .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item.active,
.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-prev {
  -webkit-transform: translateX(0);
          transform: translateX(0);
}

@supports ((-webkit-transform-style: preserve-3d) or (transform-style: preserve-3d)) {
  .carousel-fade .carousel-item-next,
  .carousel-fade .carousel-item-prev,
  .carousel-fade .carousel-item.active,
  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-prev {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
  }
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 0;
  bottom: 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  width: 15%;
  color: #fff;
  text-align: center;
  opacity: 0.5;
}

.carousel-control-prev:hover,
.carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
  color: #fff;
  text-decoration: none;
  outline: 0;
  opacity: .9;
}

.carousel-control-prev {
  left: 0;
}

.carousel-control-next {
  right: 0;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background: transparent no-repeat center center;
  background-size: 100% 100%;
}

.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}

.carousel-indicators {
  position: absolute;
  right: 0;
  bottom: 10px;
  left: 0;
  z-index: 15;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  padding-left: 0;
  margin-right: 15%;
  margin-left: 15%;
  list-style: none;
}

.carousel-indicators li {
  position: relative;
  -webkit-box-flex: 0;
      -ms-flex: 0 1 auto;
          flex: 0 1 auto;
  width: 30px;
  height: 3px;
  margin-right: 3px;
  margin-left: 3px;
  text-indent: -999px;
  cursor: pointer;
  background-color: rgba(255, 255, 255, 0.5);
}

.carousel-indicators li::before {
  position: absolute;
  top: -10px;
  left: 0;
  display: inline-block;
  width: 100%;
  height: 10px;
  content: "";
}

.carousel-indicators li::after {
  position: absolute;
  bottom: -10px;
  left: 0;
  display: inline-block;
  width: 100%;
  height: 10px;
  content: "";
}

.carousel-indicators .active {
  background-color: #fff;
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
}

.align-baseline {
  vertical-align: baseline !important;
}

.align-top {
  vertical-align: top !important;
}

.align-middle {
  vertical-align: middle !important;
}

.align-bottom {
  vertical-align: bottom !important;
}

.align-text-bottom {
  vertical-align: text-bottom !important;
}

.align-text-top {
  vertical-align: text-top !important;
}

.bg-primary {
  background-color: #007bff !important;
}

a.bg-primary:hover,
a.bg-primary:focus,
button.bg-primary:hover,
button.bg-primary:focus {
  background-color: #0062cc !important;
}

.bg-secondary {
  background-color: #6c757d !important;
}

a.bg-secondary:hover,
a.bg-secondary:focus,
button.bg-secondary:hover,
button.bg-secondary:focus {
  background-color: #545b62 !important;
}

.bg-success {
  background-color: #28a745 !important;
}

a.bg-success:hover,
a.bg-success:focus,
button.bg-success:hover,
button.bg-success:focus {
  background-color: #1e7e34 !important;
}

.bg-info {
  background-color: #17a2b8 !important;
}

a.bg-info:hover,
a.bg-info:focus,
button.bg-info:hover,
button.bg-info:focus {
  background-color: #117a8b !important;
}

.bg-warning {
  background-color: #ffc107 !important;
}

a.bg-warning:hover,
a.bg-warning:focus,
button.bg-warning:hover,
button.bg-warning:focus {
  background-color: #d39e00 !important;
}

.bg-danger {
  background-color: #dc3545 !important;
}

a.bg-danger:hover,
a.bg-danger:focus,
button.bg-danger:hover,
button.bg-danger:focus {
  background-color: #bd2130 !important;
}

.bg-light {
  background-color: #f8f9fa !important;
}

a.bg-light:hover,
a.bg-light:focus,
button.bg-light:hover,
button.bg-light:focus {
  background-color: #dae0e5 !important;
}

.bg-dark {
  background-color: #343a40 !important;
}

a.bg-dark:hover,
a.bg-dark:focus,
button.bg-dark:hover,
button.bg-dark:focus {
  background-color: #1d2124 !important;
}

.bg-naranja {
  background-color: #f58508 !important;
}

a.bg-naranja:hover,
a.bg-naranja:focus,
button.bg-naranja:hover,
button.bg-naranja:focus {
  background-color: #c46a06 !important;
}

.bg-white {
  background-color: #fff !important;
}

.bg-transparent {
  background-color: transparent !important;
}

.border {
  border: 1px solid #dee2e6 !important;
}

.border-top {
  border-top: 1px solid #dee2e6 !important;
}

.border-right {
  border-right: 1px solid #dee2e6 !important;
}

.border-bottom {
  border-bottom: 1px solid #dee2e6 !important;
}

.border-left {
  border-left: 1px solid #dee2e6 !important;
}

.border-0 {
  border: 0 !important;
}

.border-top-0 {
  border-top: 0 !important;
}

.border-right-0 {
  border-right: 0 !important;
}

.border-bottom-0 {
  border-bottom: 0 !important;
}

.border-left-0 {
  border-left: 0 !important;
}

.border-primary {
  border-color: #007bff !important;
}

.border-secondary {
  border-color: #6c757d !important;
}

.border-success {
  border-color: #28a745 !important;
}

.border-info {
  border-color: #17a2b8 !important;
}

.border-warning {
  border-color: #ffc107 !important;
}

.border-danger {
  border-color: #dc3545 !important;
}

.border-light {
  border-color: #f8f9fa !important;
}

.border-dark {
  border-color: #343a40 !important;
}

.border-naranja {
  border-color: #f58508 !important;
}

.border-white {
  border-color: #fff !important;
}

.rounded {
  border-radius: 0 !important;
}

.rounded-top {
  border-top-left-radius: 0 !important;
  border-top-right-radius: 0 !important;
}

.rounded-right {
  border-top-right-radius: 0 !important;
  border-bottom-right-radius: 0 !important;
}

.rounded-bottom {
  border-bottom-right-radius: 0 !important;
  border-bottom-left-radius: 0 !important;
}

.rounded-left {
  border-top-left-radius: 0 !important;
  border-bottom-left-radius: 0 !important;
}

.rounded-circle {
  border-radius: 50% !important;
}

.rounded-0 {
  border-radius: 0 !important;
}

.clearfix::after {
  display: block;
  clear: both;
  content: "";
}

.d-none {
  display: none !important;
}

.d-inline {
  display: inline !important;
}

.d-inline-block {
  display: inline-block !important;
}

.d-block {
  display: block !important;
}

.d-table {
  display: table !important;
}

.d-table-row {
  display: table-row !important;
}

.d-table-cell {
  display: table-cell !important;
}

.d-flex {
  display: -webkit-box !important;
  display: -ms-flexbox !important;
  display: flex !important;
}

.d-inline-flex {
  display: -webkit-inline-box !important;
  display: -ms-inline-flexbox !important;
  display: inline-flex !important;
}

@media (min-width: 576px) {
  .d-sm-none {
    display: none !important;
  }

  .d-sm-inline {
    display: inline !important;
  }

  .d-sm-inline-block {
    display: inline-block !important;
  }

  .d-sm-block {
    display: block !important;
  }

  .d-sm-table {
    display: table !important;
  }

  .d-sm-table-row {
    display: table-row !important;
  }

  .d-sm-table-cell {
    display: table-cell !important;
  }

  .d-sm-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }

  .d-sm-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 768px) {
  .d-md-none {
    display: none !important;
  }

  .d-md-inline {
    display: inline !important;
  }

  .d-md-inline-block {
    display: inline-block !important;
  }

  .d-md-block {
    display: block !important;
  }

  .d-md-table {
    display: table !important;
  }

  .d-md-table-row {
    display: table-row !important;
  }

  .d-md-table-cell {
    display: table-cell !important;
  }

  .d-md-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }

  .d-md-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 992px) {
  .d-lg-none {
    display: none !important;
  }

  .d-lg-inline {
    display: inline !important;
  }

  .d-lg-inline-block {
    display: inline-block !important;
  }

  .d-lg-block {
    display: block !important;
  }

  .d-lg-table {
    display: table !important;
  }

  .d-lg-table-row {
    display: table-row !important;
  }

  .d-lg-table-cell {
    display: table-cell !important;
  }

  .d-lg-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }

  .d-lg-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 1200px) {
  .d-xl-none {
    display: none !important;
  }

  .d-xl-inline {
    display: inline !important;
  }

  .d-xl-inline-block {
    display: inline-block !important;
  }

  .d-xl-block {
    display: block !important;
  }

  .d-xl-table {
    display: table !important;
  }

  .d-xl-table-row {
    display: table-row !important;
  }

  .d-xl-table-cell {
    display: table-cell !important;
  }

  .d-xl-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }

  .d-xl-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 1356px) {
  .d-xxl-none {
    display: none !important;
  }

  .d-xxl-inline {
    display: inline !important;
  }

  .d-xxl-inline-block {
    display: inline-block !important;
  }

  .d-xxl-block {
    display: block !important;
  }

  .d-xxl-table {
    display: table !important;
  }

  .d-xxl-table-row {
    display: table-row !important;
  }

  .d-xxl-table-cell {
    display: table-cell !important;
  }

  .d-xxl-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }

  .d-xxl-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media (min-width: 1845px) {
  .d-xxxl-none {
    display: none !important;
  }

  .d-xxxl-inline {
    display: inline !important;
  }

  .d-xxxl-inline-block {
    display: inline-block !important;
  }

  .d-xxxl-block {
    display: block !important;
  }

  .d-xxxl-table {
    display: table !important;
  }

  .d-xxxl-table-row {
    display: table-row !important;
  }

  .d-xxxl-table-cell {
    display: table-cell !important;
  }

  .d-xxxl-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }

  .d-xxxl-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

@media print {
  .d-print-none {
    display: none !important;
  }

  .d-print-inline {
    display: inline !important;
  }

  .d-print-inline-block {
    display: inline-block !important;
  }

  .d-print-block {
    display: block !important;
  }

  .d-print-table {
    display: table !important;
  }

  .d-print-table-row {
    display: table-row !important;
  }

  .d-print-table-cell {
    display: table-cell !important;
  }

  .d-print-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
  }

  .d-print-inline-flex {
    display: -webkit-inline-box !important;
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}

.embed-responsive {
  position: relative;
  display: block;
  width: 100%;
  padding: 0;
  overflow: hidden;
}

.embed-responsive::before {
  display: block;
  content: "";
}

.embed-responsive .embed-responsive-item,
.embed-responsive iframe,
.embed-responsive embed,
.embed-responsive object,
.embed-responsive video {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
}

.embed-responsive-21by9::before {
  padding-top: 42.85714286%;
}

.embed-responsive-16by9::before {
  padding-top: 56.25%;
}

.embed-responsive-4by3::before {
  padding-top: 75%;
}

.embed-responsive-1by1::before {
  padding-top: 100%;
}

.flex-row {
  -webkit-box-orient: horizontal !important;
  -webkit-box-direction: normal !important;
      -ms-flex-direction: row !important;
          flex-direction: row !important;
}

.flex-column {
  -webkit-box-orient: vertical !important;
  -webkit-box-direction: normal !important;
      -ms-flex-direction: column !important;
          flex-direction: column !important;
}

.flex-row-reverse {
  -webkit-box-orient: horizontal !important;
  -webkit-box-direction: reverse !important;
      -ms-flex-direction: row-reverse !important;
          flex-direction: row-reverse !important;
}

.flex-column-reverse {
  -webkit-box-orient: vertical !important;
  -webkit-box-direction: reverse !important;
      -ms-flex-direction: column-reverse !important;
          flex-direction: column-reverse !important;
}

.flex-wrap {
  -ms-flex-wrap: wrap !important;
      flex-wrap: wrap !important;
}

.flex-nowrap {
  -ms-flex-wrap: nowrap !important;
      flex-wrap: nowrap !important;
}

.flex-wrap-reverse {
  -ms-flex-wrap: wrap-reverse !important;
      flex-wrap: wrap-reverse !important;
}

.flex-fill {
  -webkit-box-flex: 1 !important;
      -ms-flex: 1 1 auto !important;
          flex: 1 1 auto !important;
}

.flex-grow-0 {
  -webkit-box-flex: 0 !important;
      -ms-flex-positive: 0 !important;
          flex-grow: 0 !important;
}

.flex-grow-1 {
  -webkit-box-flex: 1 !important;
      -ms-flex-positive: 1 !important;
          flex-grow: 1 !important;
}

.flex-shrink-0 {
  -ms-flex-negative: 0 !important;
      flex-shrink: 0 !important;
}

.flex-shrink-1 {
  -ms-flex-negative: 1 !important;
      flex-shrink: 1 !important;
}

.justify-content-start {
  -webkit-box-pack: start !important;
      -ms-flex-pack: start !important;
          justify-content: flex-start !important;
}

.justify-content-end {
  -webkit-box-pack: end !important;
      -ms-flex-pack: end !important;
          justify-content: flex-end !important;
}

.justify-content-center {
  -webkit-box-pack: center !important;
      -ms-flex-pack: center !important;
          justify-content: center !important;
}

.justify-content-between {
  -webkit-box-pack: justify !important;
      -ms-flex-pack: justify !important;
          justify-content: space-between !important;
}

.justify-content-around {
  -ms-flex-pack: distribute !important;
      justify-content: space-around !important;
}

.align-items-start {
  -webkit-box-align: start !important;
      -ms-flex-align: start !important;
          align-items: flex-start !important;
}

.align-items-end {
  -webkit-box-align: end !important;
      -ms-flex-align: end !important;
          align-items: flex-end !important;
}

.align-items-center {
  -webkit-box-align: center !important;
      -ms-flex-align: center !important;
          align-items: center !important;
}

.align-items-baseline {
  -webkit-box-align: baseline !important;
      -ms-flex-align: baseline !important;
          align-items: baseline !important;
}

.align-items-stretch {
  -webkit-box-align: stretch !important;
      -ms-flex-align: stretch !important;
          align-items: stretch !important;
}

.align-content-start {
  -ms-flex-line-pack: start !important;
      align-content: flex-start !important;
}

.align-content-end {
  -ms-flex-line-pack: end !important;
      align-content: flex-end !important;
}

.align-content-center {
  -ms-flex-line-pack: center !important;
      align-content: center !important;
}

.align-content-between {
  -ms-flex-line-pack: justify !important;
      align-content: space-between !important;
}

.align-content-around {
  -ms-flex-line-pack: distribute !important;
      align-content: space-around !important;
}

.align-content-stretch {
  -ms-flex-line-pack: stretch !important;
      align-content: stretch !important;
}

.align-self-auto {
  -ms-flex-item-align: auto !important;
      align-self: auto !important;
}

.align-self-start {
  -ms-flex-item-align: start !important;
      align-self: flex-start !important;
}

.align-self-end {
  -ms-flex-item-align: end !important;
      align-self: flex-end !important;
}

.align-self-center {
  -ms-flex-item-align: center !important;
      align-self: center !important;
}

.align-self-baseline {
  -ms-flex-item-align: baseline !important;
      align-self: baseline !important;
}

.align-self-stretch {
  -ms-flex-item-align: stretch !important;
      align-self: stretch !important;
}

@media (min-width: 576px) {
  .flex-sm-row {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: row !important;
            flex-direction: row !important;
  }

  .flex-sm-column {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: column !important;
            flex-direction: column !important;
  }

  .flex-sm-row-reverse {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important;
  }

  .flex-sm-column-reverse {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important;
  }

  .flex-sm-wrap {
    -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
  }

  .flex-sm-nowrap {
    -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important;
  }

  .flex-sm-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important;
  }

  .flex-sm-fill {
    -webkit-box-flex: 1 !important;
        -ms-flex: 1 1 auto !important;
            flex: 1 1 auto !important;
  }

  .flex-sm-grow-0 {
    -webkit-box-flex: 0 !important;
        -ms-flex-positive: 0 !important;
            flex-grow: 0 !important;
  }

  .flex-sm-grow-1 {
    -webkit-box-flex: 1 !important;
        -ms-flex-positive: 1 !important;
            flex-grow: 1 !important;
  }

  .flex-sm-shrink-0 {
    -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important;
  }

  .flex-sm-shrink-1 {
    -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important;
  }

  .justify-content-sm-start {
    -webkit-box-pack: start !important;
        -ms-flex-pack: start !important;
            justify-content: flex-start !important;
  }

  .justify-content-sm-end {
    -webkit-box-pack: end !important;
        -ms-flex-pack: end !important;
            justify-content: flex-end !important;
  }

  .justify-content-sm-center {
    -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
            justify-content: center !important;
  }

  .justify-content-sm-between {
    -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
            justify-content: space-between !important;
  }

  .justify-content-sm-around {
    -ms-flex-pack: distribute !important;
        justify-content: space-around !important;
  }

  .align-items-sm-start {
    -webkit-box-align: start !important;
        -ms-flex-align: start !important;
            align-items: flex-start !important;
  }

  .align-items-sm-end {
    -webkit-box-align: end !important;
        -ms-flex-align: end !important;
            align-items: flex-end !important;
  }

  .align-items-sm-center {
    -webkit-box-align: center !important;
        -ms-flex-align: center !important;
            align-items: center !important;
  }

  .align-items-sm-baseline {
    -webkit-box-align: baseline !important;
        -ms-flex-align: baseline !important;
            align-items: baseline !important;
  }

  .align-items-sm-stretch {
    -webkit-box-align: stretch !important;
        -ms-flex-align: stretch !important;
            align-items: stretch !important;
  }

  .align-content-sm-start {
    -ms-flex-line-pack: start !important;
        align-content: flex-start !important;
  }

  .align-content-sm-end {
    -ms-flex-line-pack: end !important;
        align-content: flex-end !important;
  }

  .align-content-sm-center {
    -ms-flex-line-pack: center !important;
        align-content: center !important;
  }

  .align-content-sm-between {
    -ms-flex-line-pack: justify !important;
        align-content: space-between !important;
  }

  .align-content-sm-around {
    -ms-flex-line-pack: distribute !important;
        align-content: space-around !important;
  }

  .align-content-sm-stretch {
    -ms-flex-line-pack: stretch !important;
        align-content: stretch !important;
  }

  .align-self-sm-auto {
    -ms-flex-item-align: auto !important;
        align-self: auto !important;
  }

  .align-self-sm-start {
    -ms-flex-item-align: start !important;
        align-self: flex-start !important;
  }

  .align-self-sm-end {
    -ms-flex-item-align: end !important;
        align-self: flex-end !important;
  }

  .align-self-sm-center {
    -ms-flex-item-align: center !important;
        align-self: center !important;
  }

  .align-self-sm-baseline {
    -ms-flex-item-align: baseline !important;
        align-self: baseline !important;
  }

  .align-self-sm-stretch {
    -ms-flex-item-align: stretch !important;
        align-self: stretch !important;
  }
}

@media (min-width: 768px) {
  .flex-md-row {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: row !important;
            flex-direction: row !important;
  }

  .flex-md-column {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: column !important;
            flex-direction: column !important;
  }

  .flex-md-row-reverse {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important;
  }

  .flex-md-column-reverse {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important;
  }

  .flex-md-wrap {
    -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
  }

  .flex-md-nowrap {
    -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important;
  }

  .flex-md-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important;
  }

  .flex-md-fill {
    -webkit-box-flex: 1 !important;
        -ms-flex: 1 1 auto !important;
            flex: 1 1 auto !important;
  }

  .flex-md-grow-0 {
    -webkit-box-flex: 0 !important;
        -ms-flex-positive: 0 !important;
            flex-grow: 0 !important;
  }

  .flex-md-grow-1 {
    -webkit-box-flex: 1 !important;
        -ms-flex-positive: 1 !important;
            flex-grow: 1 !important;
  }

  .flex-md-shrink-0 {
    -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important;
  }

  .flex-md-shrink-1 {
    -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important;
  }

  .justify-content-md-start {
    -webkit-box-pack: start !important;
        -ms-flex-pack: start !important;
            justify-content: flex-start !important;
  }

  .justify-content-md-end {
    -webkit-box-pack: end !important;
        -ms-flex-pack: end !important;
            justify-content: flex-end !important;
  }

  .justify-content-md-center {
    -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
            justify-content: center !important;
  }

  .justify-content-md-between {
    -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
            justify-content: space-between !important;
  }

  .justify-content-md-around {
    -ms-flex-pack: distribute !important;
        justify-content: space-around !important;
  }

  .align-items-md-start {
    -webkit-box-align: start !important;
        -ms-flex-align: start !important;
            align-items: flex-start !important;
  }

  .align-items-md-end {
    -webkit-box-align: end !important;
        -ms-flex-align: end !important;
            align-items: flex-end !important;
  }

  .align-items-md-center {
    -webkit-box-align: center !important;
        -ms-flex-align: center !important;
            align-items: center !important;
  }

  .align-items-md-baseline {
    -webkit-box-align: baseline !important;
        -ms-flex-align: baseline !important;
            align-items: baseline !important;
  }

  .align-items-md-stretch {
    -webkit-box-align: stretch !important;
        -ms-flex-align: stretch !important;
            align-items: stretch !important;
  }

  .align-content-md-start {
    -ms-flex-line-pack: start !important;
        align-content: flex-start !important;
  }

  .align-content-md-end {
    -ms-flex-line-pack: end !important;
        align-content: flex-end !important;
  }

  .align-content-md-center {
    -ms-flex-line-pack: center !important;
        align-content: center !important;
  }

  .align-content-md-between {
    -ms-flex-line-pack: justify !important;
        align-content: space-between !important;
  }

  .align-content-md-around {
    -ms-flex-line-pack: distribute !important;
        align-content: space-around !important;
  }

  .align-content-md-stretch {
    -ms-flex-line-pack: stretch !important;
        align-content: stretch !important;
  }

  .align-self-md-auto {
    -ms-flex-item-align: auto !important;
        align-self: auto !important;
  }

  .align-self-md-start {
    -ms-flex-item-align: start !important;
        align-self: flex-start !important;
  }

  .align-self-md-end {
    -ms-flex-item-align: end !important;
        align-self: flex-end !important;
  }

  .align-self-md-center {
    -ms-flex-item-align: center !important;
        align-self: center !important;
  }

  .align-self-md-baseline {
    -ms-flex-item-align: baseline !important;
        align-self: baseline !important;
  }

  .align-self-md-stretch {
    -ms-flex-item-align: stretch !important;
        align-self: stretch !important;
  }
}

@media (min-width: 992px) {
  .flex-lg-row {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: row !important;
            flex-direction: row !important;
  }

  .flex-lg-column {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: column !important;
            flex-direction: column !important;
  }

  .flex-lg-row-reverse {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important;
  }

  .flex-lg-column-reverse {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important;
  }

  .flex-lg-wrap {
    -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
  }

  .flex-lg-nowrap {
    -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important;
  }

  .flex-lg-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important;
  }

  .flex-lg-fill {
    -webkit-box-flex: 1 !important;
        -ms-flex: 1 1 auto !important;
            flex: 1 1 auto !important;
  }

  .flex-lg-grow-0 {
    -webkit-box-flex: 0 !important;
        -ms-flex-positive: 0 !important;
            flex-grow: 0 !important;
  }

  .flex-lg-grow-1 {
    -webkit-box-flex: 1 !important;
        -ms-flex-positive: 1 !important;
            flex-grow: 1 !important;
  }

  .flex-lg-shrink-0 {
    -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important;
  }

  .flex-lg-shrink-1 {
    -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important;
  }

  .justify-content-lg-start {
    -webkit-box-pack: start !important;
        -ms-flex-pack: start !important;
            justify-content: flex-start !important;
  }

  .justify-content-lg-end {
    -webkit-box-pack: end !important;
        -ms-flex-pack: end !important;
            justify-content: flex-end !important;
  }

  .justify-content-lg-center {
    -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
            justify-content: center !important;
  }

  .justify-content-lg-between {
    -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
            justify-content: space-between !important;
  }

  .justify-content-lg-around {
    -ms-flex-pack: distribute !important;
        justify-content: space-around !important;
  }

  .align-items-lg-start {
    -webkit-box-align: start !important;
        -ms-flex-align: start !important;
            align-items: flex-start !important;
  }

  .align-items-lg-end {
    -webkit-box-align: end !important;
        -ms-flex-align: end !important;
            align-items: flex-end !important;
  }

  .align-items-lg-center {
    -webkit-box-align: center !important;
        -ms-flex-align: center !important;
            align-items: center !important;
  }

  .align-items-lg-baseline {
    -webkit-box-align: baseline !important;
        -ms-flex-align: baseline !important;
            align-items: baseline !important;
  }

  .align-items-lg-stretch {
    -webkit-box-align: stretch !important;
        -ms-flex-align: stretch !important;
            align-items: stretch !important;
  }

  .align-content-lg-start {
    -ms-flex-line-pack: start !important;
        align-content: flex-start !important;
  }

  .align-content-lg-end {
    -ms-flex-line-pack: end !important;
        align-content: flex-end !important;
  }

  .align-content-lg-center {
    -ms-flex-line-pack: center !important;
        align-content: center !important;
  }

  .align-content-lg-between {
    -ms-flex-line-pack: justify !important;
        align-content: space-between !important;
  }

  .align-content-lg-around {
    -ms-flex-line-pack: distribute !important;
        align-content: space-around !important;
  }

  .align-content-lg-stretch {
    -ms-flex-line-pack: stretch !important;
        align-content: stretch !important;
  }

  .align-self-lg-auto {
    -ms-flex-item-align: auto !important;
        align-self: auto !important;
  }

  .align-self-lg-start {
    -ms-flex-item-align: start !important;
        align-self: flex-start !important;
  }

  .align-self-lg-end {
    -ms-flex-item-align: end !important;
        align-self: flex-end !important;
  }

  .align-self-lg-center {
    -ms-flex-item-align: center !important;
        align-self: center !important;
  }

  .align-self-lg-baseline {
    -ms-flex-item-align: baseline !important;
        align-self: baseline !important;
  }

  .align-self-lg-stretch {
    -ms-flex-item-align: stretch !important;
        align-self: stretch !important;
  }
}

@media (min-width: 1200px) {
  .flex-xl-row {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: row !important;
            flex-direction: row !important;
  }

  .flex-xl-column {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: column !important;
            flex-direction: column !important;
  }

  .flex-xl-row-reverse {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important;
  }

  .flex-xl-column-reverse {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important;
  }

  .flex-xl-wrap {
    -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
  }

  .flex-xl-nowrap {
    -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important;
  }

  .flex-xl-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important;
  }

  .flex-xl-fill {
    -webkit-box-flex: 1 !important;
        -ms-flex: 1 1 auto !important;
            flex: 1 1 auto !important;
  }

  .flex-xl-grow-0 {
    -webkit-box-flex: 0 !important;
        -ms-flex-positive: 0 !important;
            flex-grow: 0 !important;
  }

  .flex-xl-grow-1 {
    -webkit-box-flex: 1 !important;
        -ms-flex-positive: 1 !important;
            flex-grow: 1 !important;
  }

  .flex-xl-shrink-0 {
    -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important;
  }

  .flex-xl-shrink-1 {
    -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important;
  }

  .justify-content-xl-start {
    -webkit-box-pack: start !important;
        -ms-flex-pack: start !important;
            justify-content: flex-start !important;
  }

  .justify-content-xl-end {
    -webkit-box-pack: end !important;
        -ms-flex-pack: end !important;
            justify-content: flex-end !important;
  }

  .justify-content-xl-center {
    -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
            justify-content: center !important;
  }

  .justify-content-xl-between {
    -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
            justify-content: space-between !important;
  }

  .justify-content-xl-around {
    -ms-flex-pack: distribute !important;
        justify-content: space-around !important;
  }

  .align-items-xl-start {
    -webkit-box-align: start !important;
        -ms-flex-align: start !important;
            align-items: flex-start !important;
  }

  .align-items-xl-end {
    -webkit-box-align: end !important;
        -ms-flex-align: end !important;
            align-items: flex-end !important;
  }

  .align-items-xl-center {
    -webkit-box-align: center !important;
        -ms-flex-align: center !important;
            align-items: center !important;
  }

  .align-items-xl-baseline {
    -webkit-box-align: baseline !important;
        -ms-flex-align: baseline !important;
            align-items: baseline !important;
  }

  .align-items-xl-stretch {
    -webkit-box-align: stretch !important;
        -ms-flex-align: stretch !important;
            align-items: stretch !important;
  }

  .align-content-xl-start {
    -ms-flex-line-pack: start !important;
        align-content: flex-start !important;
  }

  .align-content-xl-end {
    -ms-flex-line-pack: end !important;
        align-content: flex-end !important;
  }

  .align-content-xl-center {
    -ms-flex-line-pack: center !important;
        align-content: center !important;
  }

  .align-content-xl-between {
    -ms-flex-line-pack: justify !important;
        align-content: space-between !important;
  }

  .align-content-xl-around {
    -ms-flex-line-pack: distribute !important;
        align-content: space-around !important;
  }

  .align-content-xl-stretch {
    -ms-flex-line-pack: stretch !important;
        align-content: stretch !important;
  }

  .align-self-xl-auto {
    -ms-flex-item-align: auto !important;
        align-self: auto !important;
  }

  .align-self-xl-start {
    -ms-flex-item-align: start !important;
        align-self: flex-start !important;
  }

  .align-self-xl-end {
    -ms-flex-item-align: end !important;
        align-self: flex-end !important;
  }

  .align-self-xl-center {
    -ms-flex-item-align: center !important;
        align-self: center !important;
  }

  .align-self-xl-baseline {
    -ms-flex-item-align: baseline !important;
        align-self: baseline !important;
  }

  .align-self-xl-stretch {
    -ms-flex-item-align: stretch !important;
        align-self: stretch !important;
  }
}

@media (min-width: 1356px) {
  .flex-xxl-row {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: row !important;
            flex-direction: row !important;
  }

  .flex-xxl-column {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: column !important;
            flex-direction: column !important;
  }

  .flex-xxl-row-reverse {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important;
  }

  .flex-xxl-column-reverse {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important;
  }

  .flex-xxl-wrap {
    -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
  }

  .flex-xxl-nowrap {
    -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important;
  }

  .flex-xxl-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important;
  }

  .flex-xxl-fill {
    -webkit-box-flex: 1 !important;
        -ms-flex: 1 1 auto !important;
            flex: 1 1 auto !important;
  }

  .flex-xxl-grow-0 {
    -webkit-box-flex: 0 !important;
        -ms-flex-positive: 0 !important;
            flex-grow: 0 !important;
  }

  .flex-xxl-grow-1 {
    -webkit-box-flex: 1 !important;
        -ms-flex-positive: 1 !important;
            flex-grow: 1 !important;
  }

  .flex-xxl-shrink-0 {
    -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important;
  }

  .flex-xxl-shrink-1 {
    -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important;
  }

  .justify-content-xxl-start {
    -webkit-box-pack: start !important;
        -ms-flex-pack: start !important;
            justify-content: flex-start !important;
  }

  .justify-content-xxl-end {
    -webkit-box-pack: end !important;
        -ms-flex-pack: end !important;
            justify-content: flex-end !important;
  }

  .justify-content-xxl-center {
    -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
            justify-content: center !important;
  }

  .justify-content-xxl-between {
    -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
            justify-content: space-between !important;
  }

  .justify-content-xxl-around {
    -ms-flex-pack: distribute !important;
        justify-content: space-around !important;
  }

  .align-items-xxl-start {
    -webkit-box-align: start !important;
        -ms-flex-align: start !important;
            align-items: flex-start !important;
  }

  .align-items-xxl-end {
    -webkit-box-align: end !important;
        -ms-flex-align: end !important;
            align-items: flex-end !important;
  }

  .align-items-xxl-center {
    -webkit-box-align: center !important;
        -ms-flex-align: center !important;
            align-items: center !important;
  }

  .align-items-xxl-baseline {
    -webkit-box-align: baseline !important;
        -ms-flex-align: baseline !important;
            align-items: baseline !important;
  }

  .align-items-xxl-stretch {
    -webkit-box-align: stretch !important;
        -ms-flex-align: stretch !important;
            align-items: stretch !important;
  }

  .align-content-xxl-start {
    -ms-flex-line-pack: start !important;
        align-content: flex-start !important;
  }

  .align-content-xxl-end {
    -ms-flex-line-pack: end !important;
        align-content: flex-end !important;
  }

  .align-content-xxl-center {
    -ms-flex-line-pack: center !important;
        align-content: center !important;
  }

  .align-content-xxl-between {
    -ms-flex-line-pack: justify !important;
        align-content: space-between !important;
  }

  .align-content-xxl-around {
    -ms-flex-line-pack: distribute !important;
        align-content: space-around !important;
  }

  .align-content-xxl-stretch {
    -ms-flex-line-pack: stretch !important;
        align-content: stretch !important;
  }

  .align-self-xxl-auto {
    -ms-flex-item-align: auto !important;
        align-self: auto !important;
  }

  .align-self-xxl-start {
    -ms-flex-item-align: start !important;
        align-self: flex-start !important;
  }

  .align-self-xxl-end {
    -ms-flex-item-align: end !important;
        align-self: flex-end !important;
  }

  .align-self-xxl-center {
    -ms-flex-item-align: center !important;
        align-self: center !important;
  }

  .align-self-xxl-baseline {
    -ms-flex-item-align: baseline !important;
        align-self: baseline !important;
  }

  .align-self-xxl-stretch {
    -ms-flex-item-align: stretch !important;
        align-self: stretch !important;
  }
}

@media (min-width: 1845px) {
  .flex-xxxl-row {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: row !important;
            flex-direction: row !important;
  }

  .flex-xxxl-column {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: normal !important;
        -ms-flex-direction: column !important;
            flex-direction: column !important;
  }

  .flex-xxxl-row-reverse {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important;
  }

  .flex-xxxl-column-reverse {
    -webkit-box-orient: vertical !important;
    -webkit-box-direction: reverse !important;
        -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important;
  }

  .flex-xxxl-wrap {
    -ms-flex-wrap: wrap !important;
        flex-wrap: wrap !important;
  }

  .flex-xxxl-nowrap {
    -ms-flex-wrap: nowrap !important;
        flex-wrap: nowrap !important;
  }

  .flex-xxxl-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
        flex-wrap: wrap-reverse !important;
  }

  .flex-xxxl-fill {
    -webkit-box-flex: 1 !important;
        -ms-flex: 1 1 auto !important;
            flex: 1 1 auto !important;
  }

  .flex-xxxl-grow-0 {
    -webkit-box-flex: 0 !important;
        -ms-flex-positive: 0 !important;
            flex-grow: 0 !important;
  }

  .flex-xxxl-grow-1 {
    -webkit-box-flex: 1 !important;
        -ms-flex-positive: 1 !important;
            flex-grow: 1 !important;
  }

  .flex-xxxl-shrink-0 {
    -ms-flex-negative: 0 !important;
        flex-shrink: 0 !important;
  }

  .flex-xxxl-shrink-1 {
    -ms-flex-negative: 1 !important;
        flex-shrink: 1 !important;
  }

  .justify-content-xxxl-start {
    -webkit-box-pack: start !important;
        -ms-flex-pack: start !important;
            justify-content: flex-start !important;
  }

  .justify-content-xxxl-end {
    -webkit-box-pack: end !important;
        -ms-flex-pack: end !important;
            justify-content: flex-end !important;
  }

  .justify-content-xxxl-center {
    -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
            justify-content: center !important;
  }

  .justify-content-xxxl-between {
    -webkit-box-pack: justify !important;
        -ms-flex-pack: justify !important;
            justify-content: space-between !important;
  }

  .justify-content-xxxl-around {
    -ms-flex-pack: distribute !important;
        justify-content: space-around !important;
  }

  .align-items-xxxl-start {
    -webkit-box-align: start !important;
        -ms-flex-align: start !important;
            align-items: flex-start !important;
  }

  .align-items-xxxl-end {
    -webkit-box-align: end !important;
        -ms-flex-align: end !important;
            align-items: flex-end !important;
  }

  .align-items-xxxl-center {
    -webkit-box-align: center !important;
        -ms-flex-align: center !important;
            align-items: center !important;
  }

  .align-items-xxxl-baseline {
    -webkit-box-align: baseline !important;
        -ms-flex-align: baseline !important;
            align-items: baseline !important;
  }

  .align-items-xxxl-stretch {
    -webkit-box-align: stretch !important;
        -ms-flex-align: stretch !important;
            align-items: stretch !important;
  }

  .align-content-xxxl-start {
    -ms-flex-line-pack: start !important;
        align-content: flex-start !important;
  }

  .align-content-xxxl-end {
    -ms-flex-line-pack: end !important;
        align-content: flex-end !important;
  }

  .align-content-xxxl-center {
    -ms-flex-line-pack: center !important;
        align-content: center !important;
  }

  .align-content-xxxl-between {
    -ms-flex-line-pack: justify !important;
        align-content: space-between !important;
  }

  .align-content-xxxl-around {
    -ms-flex-line-pack: distribute !important;
        align-content: space-around !important;
  }

  .align-content-xxxl-stretch {
    -ms-flex-line-pack: stretch !important;
        align-content: stretch !important;
  }

  .align-self-xxxl-auto {
    -ms-flex-item-align: auto !important;
        align-self: auto !important;
  }

  .align-self-xxxl-start {
    -ms-flex-item-align: start !important;
        align-self: flex-start !important;
  }

  .align-self-xxxl-end {
    -ms-flex-item-align: end !important;
        align-self: flex-end !important;
  }

  .align-self-xxxl-center {
    -ms-flex-item-align: center !important;
        align-self: center !important;
  }

  .align-self-xxxl-baseline {
    -ms-flex-item-align: baseline !important;
        align-self: baseline !important;
  }

  .align-self-xxxl-stretch {
    -ms-flex-item-align: stretch !important;
        align-self: stretch !important;
  }
}

.float-left {
  float: left !important;
}

.float-right {
  float: right !important;
}

.float-none {
  float: none !important;
}

@media (min-width: 576px) {
  .float-sm-left {
    float: left !important;
  }

  .float-sm-right {
    float: right !important;
  }

  .float-sm-none {
    float: none !important;
  }
}

@media (min-width: 768px) {
  .float-md-left {
    float: left !important;
  }

  .float-md-right {
    float: right !important;
  }

  .float-md-none {
    float: none !important;
  }
}

@media (min-width: 992px) {
  .float-lg-left {
    float: left !important;
  }

  .float-lg-right {
    float: right !important;
  }

  .float-lg-none {
    float: none !important;
  }
}

@media (min-width: 1200px) {
  .float-xl-left {
    float: left !important;
  }

  .float-xl-right {
    float: right !important;
  }

  .float-xl-none {
    float: none !important;
  }
}

@media (min-width: 1356px) {
  .float-xxl-left {
    float: left !important;
  }

  .float-xxl-right {
    float: right !important;
  }

  .float-xxl-none {
    float: none !important;
  }
}

@media (min-width: 1845px) {
  .float-xxxl-left {
    float: left !important;
  }

  .float-xxxl-right {
    float: right !important;
  }

  .float-xxxl-none {
    float: none !important;
  }
}

.position-static {
  position: static !important;
}

.position-relative {
  position: relative !important;
}

.position-absolute {
  position: absolute !important;
}

.position-fixed {
  position: fixed !important;
}

.position-sticky {
  position: -webkit-sticky !important;
  position: sticky !important;
}

.fixed-top {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
}

.fixed-bottom {
  position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1030;
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sticky-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

.sr-only-focusable:active,
.sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  overflow: visible;
  clip: auto;
  white-space: normal;
}

.shadow-sm {
  -webkit-box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
          box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.shadow {
  -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
          box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.shadow-lg {
  -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
          box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
}

.shadow-none {
  -webkit-box-shadow: none !important;
          box-shadow: none !important;
}

.w-25 {
  width: 25% !important;
}

.w-50 {
  width: 50% !important;
}

.w-75 {
  width: 75% !important;
}

.w-100 {
  width: 100% !important;
}

.w-auto {
  width: auto !important;
}

.h-25 {
  height: 25% !important;
}

.h-50 {
  height: 50% !important;
}

.h-75 {
  height: 75% !important;
}

.h-100 {
  height: 100% !important;
}

.h-auto {
  height: auto !important;
}

.mw-100 {
  max-width: 100% !important;
}

.mh-100 {
  max-height: 100% !important;
}

.m-0 {
  margin: 0rem !important;
}

.mt-0,
.my-0 {
  margin-top: 0rem !important;
}

.mr-0,
.mx-0 {
  margin-right: 0rem !important;
}

.mb-0,
.my-0 {
  margin-bottom: 0rem !important;
}

.ml-0,
.mx-0 {
  margin-left: 0rem !important;
}

.m-1 {
  margin: 0.25rem !important;
}

.mt-1,
.my-1 {
  margin-top: 0.25rem !important;
}

.mr-1,
.mx-1 {
  margin-right: 0.25rem !important;
}

.mb-1,
.my-1 {
  margin-bottom: 0.25rem !important;
}

.ml-1,
.mx-1 {
  margin-left: 0.25rem !important;
}

.m-2 {
  margin: 0.5rem !important;
}

.mt-2,
.my-2 {
  margin-top: 0.5rem !important;
}

.mr-2,
.mx-2 {
  margin-right: 0.5rem !important;
}

.mb-2,
.my-2 {
  margin-bottom: 0.5rem !important;
}

.ml-2,
.mx-2 {
  margin-left: 0.5rem !important;
}

.m-3 {
  margin: 1rem !important;
}

.mt-3,
.my-3 {
  margin-top: 1rem !important;
}

.mr-3,
.mx-3 {
  margin-right: 1rem !important;
}

.mb-3,
.my-3 {
  margin-bottom: 1rem !important;
}

.ml-3,
.mx-3 {
  margin-left: 1rem !important;
}

.m-4 {
  margin: 1.5rem !important;
}

.mt-4,
.my-4 {
  margin-top: 1.5rem !important;
}

.mr-4,
.mx-4 {
  margin-right: 1.5rem !important;
}

.mb-4,
.my-4 {
  margin-bottom: 1.5rem !important;
}

.ml-4,
.mx-4 {
  margin-left: 1.5rem !important;
}

.m-5 {
  margin: 3rem !important;
}

.mt-5,
.my-5 {
  margin-top: 3rem !important;
}

.mr-5,
.mx-5 {
  margin-right: 3rem !important;
}

.mb-5,
.my-5 {
  margin-bottom: 3rem !important;
}

.ml-5,
.mx-5 {
  margin-left: 3rem !important;
}

.m-6 {
  margin: 4.5rem !important;
}

.mt-6,
.my-6 {
  margin-top: 4.5rem !important;
}

.mr-6,
.mx-6 {
  margin-right: 4.5rem !important;
}

.mb-6,
.my-6 {
  margin-bottom: 4.5rem !important;
}

.ml-6,
.mx-6 {
  margin-left: 4.5rem !important;
}

.m-7 {
  margin: 7.5rem !important;
}

.mt-7,
.my-7 {
  margin-top: 7.5rem !important;
}

.mr-7,
.mx-7 {
  margin-right: 7.5rem !important;
}

.mb-7,
.my-7 {
  margin-bottom: 7.5rem !important;
}

.ml-7,
.mx-7 {
  margin-left: 7.5rem !important;
}

.m-8 {
  margin: 9.5rem !important;
}

.mt-8,
.my-8 {
  margin-top: 9.5rem !important;
}

.mr-8,
.mx-8 {
  margin-right: 9.5rem !important;
}

.mb-8,
.my-8 {
  margin-bottom: 9.5rem !important;
}

.ml-8,
.mx-8 {
  margin-left: 9.5rem !important;
}

.m-9 {
  margin: 12rem !important;
}

.mt-9,
.my-9 {
  margin-top: 12rem !important;
}

.mr-9,
.mx-9 {
  margin-right: 12rem !important;
}

.mb-9,
.my-9 {
  margin-bottom: 12rem !important;
}

.ml-9,
.mx-9 {
  margin-left: 12rem !important;
}

.m-10 {
  margin: 14.5rem !important;
}

.mt-10,
.my-10 {
  margin-top: 14.5rem !important;
}

.mr-10,
.mx-10 {
  margin-right: 14.5rem !important;
}

.mb-10,
.my-10 {
  margin-bottom: 14.5rem !important;
}

.ml-10,
.mx-10 {
  margin-left: 14.5rem !important;
}

.p-0 {
  padding: 0rem !important;
}

.pt-0,
.py-0 {
  padding-top: 0rem !important;
}

.pr-0,
.px-0 {
  padding-right: 0rem !important;
}

.pb-0,
.py-0 {
  padding-bottom: 0rem !important;
}

.pl-0,
.px-0 {
  padding-left: 0rem !important;
}

.p-1 {
  padding: 0.25rem !important;
}

.pt-1,
.py-1 {
  padding-top: 0.25rem !important;
}

.pr-1,
.px-1 {
  padding-right: 0.25rem !important;
}

.pb-1,
.py-1 {
  padding-bottom: 0.25rem !important;
}

.pl-1,
.px-1 {
  padding-left: 0.25rem !important;
}

.p-2 {
  padding: 0.5rem !important;
}

.pt-2,
.py-2 {
  padding-top: 0.5rem !important;
}

.pr-2,
.px-2 {
  padding-right: 0.5rem !important;
}

.pb-2,
.py-2 {
  padding-bottom: 0.5rem !important;
}

.pl-2,
.px-2 {
  padding-left: 0.5rem !important;
}

.p-3 {
  padding: 1rem !important;
}

.pt-3,
.py-3 {
  padding-top: 1rem !important;
}

.pr-3,
.px-3 {
  padding-right: 1rem !important;
}

.pb-3,
.py-3 {
  padding-bottom: 1rem !important;
}

.pl-3,
.px-3 {
  padding-left: 1rem !important;
}

.p-4 {
  padding: 1.5rem !important;
}

.pt-4,
.py-4 {
  padding-top: 1.5rem !important;
}

.pr-4,
.px-4 {
  padding-right: 1.5rem !important;
}

.pb-4,
.py-4 {
  padding-bottom: 1.5rem !important;
}

.pl-4,
.px-4 {
  padding-left: 1.5rem !important;
}

.p-5 {
  padding: 3rem !important;
}

.pt-5,
.py-5 {
  padding-top: 3rem !important;
}

.pr-5,
.px-5 {
  padding-right: 3rem !important;
}

.pb-5,
.py-5 {
  padding-bottom: 3rem !important;
}

.pl-5,
.px-5 {
  padding-left: 3rem !important;
}

.p-6 {
  padding: 4.5rem !important;
}

.pt-6,
.py-6 {
  padding-top: 4.5rem !important;
}

.pr-6,
.px-6 {
  padding-right: 4.5rem !important;
}

.pb-6,
.py-6 {
  padding-bottom: 4.5rem !important;
}

.pl-6,
.px-6 {
  padding-left: 4.5rem !important;
}

.p-7 {
  padding: 7.5rem !important;
}

.pt-7,
.py-7 {
  padding-top: 7.5rem !important;
}

.pr-7,
.px-7 {
  padding-right: 7.5rem !important;
}

.pb-7,
.py-7 {
  padding-bottom: 7.5rem !important;
}

.pl-7,
.px-7 {
  padding-left: 7.5rem !important;
}

.p-8 {
  padding: 9.5rem !important;
}

.pt-8,
.py-8 {
  padding-top: 9.5rem !important;
}

.pr-8,
.px-8 {
  padding-right: 9.5rem !important;
}

.pb-8,
.py-8 {
  padding-bottom: 9.5rem !important;
}

.pl-8,
.px-8 {
  padding-left: 9.5rem !important;
}

.p-9 {
  padding: 12rem !important;
}

.pt-9,
.py-9 {
  padding-top: 12rem !important;
}

.pr-9,
.px-9 {
  padding-right: 12rem !important;
}

.pb-9,
.py-9 {
  padding-bottom: 12rem !important;
}

.pl-9,
.px-9 {
  padding-left: 12rem !important;
}

.p-10 {
  padding: 14.5rem !important;
}

.pt-10,
.py-10 {
  padding-top: 14.5rem !important;
}

.pr-10,
.px-10 {
  padding-right: 14.5rem !important;
}

.pb-10,
.py-10 {
  padding-bottom: 14.5rem !important;
}

.pl-10,
.px-10 {
  padding-left: 14.5rem !important;
}

.m-auto {
  margin: auto !important;
}

.mt-auto,
.my-auto {
  margin-top: auto !important;
}

.mr-auto,
.mx-auto {
  margin-right: auto !important;
}

.mb-auto,
.my-auto {
  margin-bottom: auto !important;
}

.ml-auto,
.mx-auto {
  margin-left: auto !important;
}

@media (min-width: 576px) {
  .m-sm-0 {
    margin: 0rem !important;
  }

  .mt-sm-0,
  .my-sm-0 {
    margin-top: 0rem !important;
  }

  .mr-sm-0,
  .mx-sm-0 {
    margin-right: 0rem !important;
  }

  .mb-sm-0,
  .my-sm-0 {
    margin-bottom: 0rem !important;
  }

  .ml-sm-0,
  .mx-sm-0 {
    margin-left: 0rem !important;
  }

  .m-sm-1 {
    margin: 0.25rem !important;
  }

  .mt-sm-1,
  .my-sm-1 {
    margin-top: 0.25rem !important;
  }

  .mr-sm-1,
  .mx-sm-1 {
    margin-right: 0.25rem !important;
  }

  .mb-sm-1,
  .my-sm-1 {
    margin-bottom: 0.25rem !important;
  }

  .ml-sm-1,
  .mx-sm-1 {
    margin-left: 0.25rem !important;
  }

  .m-sm-2 {
    margin: 0.5rem !important;
  }

  .mt-sm-2,
  .my-sm-2 {
    margin-top: 0.5rem !important;
  }

  .mr-sm-2,
  .mx-sm-2 {
    margin-right: 0.5rem !important;
  }

  .mb-sm-2,
  .my-sm-2 {
    margin-bottom: 0.5rem !important;
  }

  .ml-sm-2,
  .mx-sm-2 {
    margin-left: 0.5rem !important;
  }

  .m-sm-3 {
    margin: 1rem !important;
  }

  .mt-sm-3,
  .my-sm-3 {
    margin-top: 1rem !important;
  }

  .mr-sm-3,
  .mx-sm-3 {
    margin-right: 1rem !important;
  }

  .mb-sm-3,
  .my-sm-3 {
    margin-bottom: 1rem !important;
  }

  .ml-sm-3,
  .mx-sm-3 {
    margin-left: 1rem !important;
  }

  .m-sm-4 {
    margin: 1.5rem !important;
  }

  .mt-sm-4,
  .my-sm-4 {
    margin-top: 1.5rem !important;
  }

  .mr-sm-4,
  .mx-sm-4 {
    margin-right: 1.5rem !important;
  }

  .mb-sm-4,
  .my-sm-4 {
    margin-bottom: 1.5rem !important;
  }

  .ml-sm-4,
  .mx-sm-4 {
    margin-left: 1.5rem !important;
  }

  .m-sm-5 {
    margin: 3rem !important;
  }

  .mt-sm-5,
  .my-sm-5 {
    margin-top: 3rem !important;
  }

  .mr-sm-5,
  .mx-sm-5 {
    margin-right: 3rem !important;
  }

  .mb-sm-5,
  .my-sm-5 {
    margin-bottom: 3rem !important;
  }

  .ml-sm-5,
  .mx-sm-5 {
    margin-left: 3rem !important;
  }

  .m-sm-6 {
    margin: 4.5rem !important;
  }

  .mt-sm-6,
  .my-sm-6 {
    margin-top: 4.5rem !important;
  }

  .mr-sm-6,
  .mx-sm-6 {
    margin-right: 4.5rem !important;
  }

  .mb-sm-6,
  .my-sm-6 {
    margin-bottom: 4.5rem !important;
  }

  .ml-sm-6,
  .mx-sm-6 {
    margin-left: 4.5rem !important;
  }

  .m-sm-7 {
    margin: 7.5rem !important;
  }

  .mt-sm-7,
  .my-sm-7 {
    margin-top: 7.5rem !important;
  }

  .mr-sm-7,
  .mx-sm-7 {
    margin-right: 7.5rem !important;
  }

  .mb-sm-7,
  .my-sm-7 {
    margin-bottom: 7.5rem !important;
  }

  .ml-sm-7,
  .mx-sm-7 {
    margin-left: 7.5rem !important;
  }

  .m-sm-8 {
    margin: 9.5rem !important;
  }

  .mt-sm-8,
  .my-sm-8 {
    margin-top: 9.5rem !important;
  }

  .mr-sm-8,
  .mx-sm-8 {
    margin-right: 9.5rem !important;
  }

  .mb-sm-8,
  .my-sm-8 {
    margin-bottom: 9.5rem !important;
  }

  .ml-sm-8,
  .mx-sm-8 {
    margin-left: 9.5rem !important;
  }

  .m-sm-9 {
    margin: 12rem !important;
  }

  .mt-sm-9,
  .my-sm-9 {
    margin-top: 12rem !important;
  }

  .mr-sm-9,
  .mx-sm-9 {
    margin-right: 12rem !important;
  }

  .mb-sm-9,
  .my-sm-9 {
    margin-bottom: 12rem !important;
  }

  .ml-sm-9,
  .mx-sm-9 {
    margin-left: 12rem !important;
  }

  .m-sm-10 {
    margin: 14.5rem !important;
  }

  .mt-sm-10,
  .my-sm-10 {
    margin-top: 14.5rem !important;
  }

  .mr-sm-10,
  .mx-sm-10 {
    margin-right: 14.5rem !important;
  }

  .mb-sm-10,
  .my-sm-10 {
    margin-bottom: 14.5rem !important;
  }

  .ml-sm-10,
  .mx-sm-10 {
    margin-left: 14.5rem !important;
  }

  .p-sm-0 {
    padding: 0rem !important;
  }

  .pt-sm-0,
  .py-sm-0 {
    padding-top: 0rem !important;
  }

  .pr-sm-0,
  .px-sm-0 {
    padding-right: 0rem !important;
  }

  .pb-sm-0,
  .py-sm-0 {
    padding-bottom: 0rem !important;
  }

  .pl-sm-0,
  .px-sm-0 {
    padding-left: 0rem !important;
  }

  .p-sm-1 {
    padding: 0.25rem !important;
  }

  .pt-sm-1,
  .py-sm-1 {
    padding-top: 0.25rem !important;
  }

  .pr-sm-1,
  .px-sm-1 {
    padding-right: 0.25rem !important;
  }

  .pb-sm-1,
  .py-sm-1 {
    padding-bottom: 0.25rem !important;
  }

  .pl-sm-1,
  .px-sm-1 {
    padding-left: 0.25rem !important;
  }

  .p-sm-2 {
    padding: 0.5rem !important;
  }

  .pt-sm-2,
  .py-sm-2 {
    padding-top: 0.5rem !important;
  }

  .pr-sm-2,
  .px-sm-2 {
    padding-right: 0.5rem !important;
  }

  .pb-sm-2,
  .py-sm-2 {
    padding-bottom: 0.5rem !important;
  }

  .pl-sm-2,
  .px-sm-2 {
    padding-left: 0.5rem !important;
  }

  .p-sm-3 {
    padding: 1rem !important;
  }

  .pt-sm-3,
  .py-sm-3 {
    padding-top: 1rem !important;
  }

  .pr-sm-3,
  .px-sm-3 {
    padding-right: 1rem !important;
  }

  .pb-sm-3,
  .py-sm-3 {
    padding-bottom: 1rem !important;
  }

  .pl-sm-3,
  .px-sm-3 {
    padding-left: 1rem !important;
  }

  .p-sm-4 {
    padding: 1.5rem !important;
  }

  .pt-sm-4,
  .py-sm-4 {
    padding-top: 1.5rem !important;
  }

  .pr-sm-4,
  .px-sm-4 {
    padding-right: 1.5rem !important;
  }

  .pb-sm-4,
  .py-sm-4 {
    padding-bottom: 1.5rem !important;
  }

  .pl-sm-4,
  .px-sm-4 {
    padding-left: 1.5rem !important;
  }

  .p-sm-5 {
    padding: 3rem !important;
  }

  .pt-sm-5,
  .py-sm-5 {
    padding-top: 3rem !important;
  }

  .pr-sm-5,
  .px-sm-5 {
    padding-right: 3rem !important;
  }

  .pb-sm-5,
  .py-sm-5 {
    padding-bottom: 3rem !important;
  }

  .pl-sm-5,
  .px-sm-5 {
    padding-left: 3rem !important;
  }

  .p-sm-6 {
    padding: 4.5rem !important;
  }

  .pt-sm-6,
  .py-sm-6 {
    padding-top: 4.5rem !important;
  }

  .pr-sm-6,
  .px-sm-6 {
    padding-right: 4.5rem !important;
  }

  .pb-sm-6,
  .py-sm-6 {
    padding-bottom: 4.5rem !important;
  }

  .pl-sm-6,
  .px-sm-6 {
    padding-left: 4.5rem !important;
  }

  .p-sm-7 {
    padding: 7.5rem !important;
  }

  .pt-sm-7,
  .py-sm-7 {
    padding-top: 7.5rem !important;
  }

  .pr-sm-7,
  .px-sm-7 {
    padding-right: 7.5rem !important;
  }

  .pb-sm-7,
  .py-sm-7 {
    padding-bottom: 7.5rem !important;
  }

  .pl-sm-7,
  .px-sm-7 {
    padding-left: 7.5rem !important;
  }

  .p-sm-8 {
    padding: 9.5rem !important;
  }

  .pt-sm-8,
  .py-sm-8 {
    padding-top: 9.5rem !important;
  }

  .pr-sm-8,
  .px-sm-8 {
    padding-right: 9.5rem !important;
  }

  .pb-sm-8,
  .py-sm-8 {
    padding-bottom: 9.5rem !important;
  }

  .pl-sm-8,
  .px-sm-8 {
    padding-left: 9.5rem !important;
  }

  .p-sm-9 {
    padding: 12rem !important;
  }

  .pt-sm-9,
  .py-sm-9 {
    padding-top: 12rem !important;
  }

  .pr-sm-9,
  .px-sm-9 {
    padding-right: 12rem !important;
  }

  .pb-sm-9,
  .py-sm-9 {
    padding-bottom: 12rem !important;
  }

  .pl-sm-9,
  .px-sm-9 {
    padding-left: 12rem !important;
  }

  .p-sm-10 {
    padding: 14.5rem !important;
  }

  .pt-sm-10,
  .py-sm-10 {
    padding-top: 14.5rem !important;
  }

  .pr-sm-10,
  .px-sm-10 {
    padding-right: 14.5rem !important;
  }

  .pb-sm-10,
  .py-sm-10 {
    padding-bottom: 14.5rem !important;
  }

  .pl-sm-10,
  .px-sm-10 {
    padding-left: 14.5rem !important;
  }

  .m-sm-auto {
    margin: auto !important;
  }

  .mt-sm-auto,
  .my-sm-auto {
    margin-top: auto !important;
  }

  .mr-sm-auto,
  .mx-sm-auto {
    margin-right: auto !important;
  }

  .mb-sm-auto,
  .my-sm-auto {
    margin-bottom: auto !important;
  }

  .ml-sm-auto,
  .mx-sm-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 768px) {
  .m-md-0 {
    margin: 0rem !important;
  }

  .mt-md-0,
  .my-md-0 {
    margin-top: 0rem !important;
  }

  .mr-md-0,
  .mx-md-0 {
    margin-right: 0rem !important;
  }

  .mb-md-0,
  .my-md-0 {
    margin-bottom: 0rem !important;
  }

  .ml-md-0,
  .mx-md-0 {
    margin-left: 0rem !important;
  }

  .m-md-1 {
    margin: 0.25rem !important;
  }

  .mt-md-1,
  .my-md-1 {
    margin-top: 0.25rem !important;
  }

  .mr-md-1,
  .mx-md-1 {
    margin-right: 0.25rem !important;
  }

  .mb-md-1,
  .my-md-1 {
    margin-bottom: 0.25rem !important;
  }

  .ml-md-1,
  .mx-md-1 {
    margin-left: 0.25rem !important;
  }

  .m-md-2 {
    margin: 0.5rem !important;
  }

  .mt-md-2,
  .my-md-2 {
    margin-top: 0.5rem !important;
  }

  .mr-md-2,
  .mx-md-2 {
    margin-right: 0.5rem !important;
  }

  .mb-md-2,
  .my-md-2 {
    margin-bottom: 0.5rem !important;
  }

  .ml-md-2,
  .mx-md-2 {
    margin-left: 0.5rem !important;
  }

  .m-md-3 {
    margin: 1rem !important;
  }

  .mt-md-3,
  .my-md-3 {
    margin-top: 1rem !important;
  }

  .mr-md-3,
  .mx-md-3 {
    margin-right: 1rem !important;
  }

  .mb-md-3,
  .my-md-3 {
    margin-bottom: 1rem !important;
  }

  .ml-md-3,
  .mx-md-3 {
    margin-left: 1rem !important;
  }

  .m-md-4 {
    margin: 1.5rem !important;
  }

  .mt-md-4,
  .my-md-4 {
    margin-top: 1.5rem !important;
  }

  .mr-md-4,
  .mx-md-4 {
    margin-right: 1.5rem !important;
  }

  .mb-md-4,
  .my-md-4 {
    margin-bottom: 1.5rem !important;
  }

  .ml-md-4,
  .mx-md-4 {
    margin-left: 1.5rem !important;
  }

  .m-md-5 {
    margin: 3rem !important;
  }

  .mt-md-5,
  .my-md-5 {
    margin-top: 3rem !important;
  }

  .mr-md-5,
  .mx-md-5 {
    margin-right: 3rem !important;
  }

  .mb-md-5,
  .my-md-5 {
    margin-bottom: 3rem !important;
  }

  .ml-md-5,
  .mx-md-5 {
    margin-left: 3rem !important;
  }

  .m-md-6 {
    margin: 4.5rem !important;
  }

  .mt-md-6,
  .my-md-6 {
    margin-top: 4.5rem !important;
  }

  .mr-md-6,
  .mx-md-6 {
    margin-right: 4.5rem !important;
  }

  .mb-md-6,
  .my-md-6 {
    margin-bottom: 4.5rem !important;
  }

  .ml-md-6,
  .mx-md-6 {
    margin-left: 4.5rem !important;
  }

  .m-md-7 {
    margin: 7.5rem !important;
  }

  .mt-md-7,
  .my-md-7 {
    margin-top: 7.5rem !important;
  }

  .mr-md-7,
  .mx-md-7 {
    margin-right: 7.5rem !important;
  }

  .mb-md-7,
  .my-md-7 {
    margin-bottom: 7.5rem !important;
  }

  .ml-md-7,
  .mx-md-7 {
    margin-left: 7.5rem !important;
  }

  .m-md-8 {
    margin: 9.5rem !important;
  }

  .mt-md-8,
  .my-md-8 {
    margin-top: 9.5rem !important;
  }

  .mr-md-8,
  .mx-md-8 {
    margin-right: 9.5rem !important;
  }

  .mb-md-8,
  .my-md-8 {
    margin-bottom: 9.5rem !important;
  }

  .ml-md-8,
  .mx-md-8 {
    margin-left: 9.5rem !important;
  }

  .m-md-9 {
    margin: 12rem !important;
  }

  .mt-md-9,
  .my-md-9 {
    margin-top: 12rem !important;
  }

  .mr-md-9,
  .mx-md-9 {
    margin-right: 12rem !important;
  }

  .mb-md-9,
  .my-md-9 {
    margin-bottom: 12rem !important;
  }

  .ml-md-9,
  .mx-md-9 {
    margin-left: 12rem !important;
  }

  .m-md-10 {
    margin: 14.5rem !important;
  }

  .mt-md-10,
  .my-md-10 {
    margin-top: 14.5rem !important;
  }

  .mr-md-10,
  .mx-md-10 {
    margin-right: 14.5rem !important;
  }

  .mb-md-10,
  .my-md-10 {
    margin-bottom: 14.5rem !important;
  }

  .ml-md-10,
  .mx-md-10 {
    margin-left: 14.5rem !important;
  }

  .p-md-0 {
    padding: 0rem !important;
  }

  .pt-md-0,
  .py-md-0 {
    padding-top: 0rem !important;
  }

  .pr-md-0,
  .px-md-0 {
    padding-right: 0rem !important;
  }

  .pb-md-0,
  .py-md-0 {
    padding-bottom: 0rem !important;
  }

  .pl-md-0,
  .px-md-0 {
    padding-left: 0rem !important;
  }

  .p-md-1 {
    padding: 0.25rem !important;
  }

  .pt-md-1,
  .py-md-1 {
    padding-top: 0.25rem !important;
  }

  .pr-md-1,
  .px-md-1 {
    padding-right: 0.25rem !important;
  }

  .pb-md-1,
  .py-md-1 {
    padding-bottom: 0.25rem !important;
  }

  .pl-md-1,
  .px-md-1 {
    padding-left: 0.25rem !important;
  }

  .p-md-2 {
    padding: 0.5rem !important;
  }

  .pt-md-2,
  .py-md-2 {
    padding-top: 0.5rem !important;
  }

  .pr-md-2,
  .px-md-2 {
    padding-right: 0.5rem !important;
  }

  .pb-md-2,
  .py-md-2 {
    padding-bottom: 0.5rem !important;
  }

  .pl-md-2,
  .px-md-2 {
    padding-left: 0.5rem !important;
  }

  .p-md-3 {
    padding: 1rem !important;
  }

  .pt-md-3,
  .py-md-3 {
    padding-top: 1rem !important;
  }

  .pr-md-3,
  .px-md-3 {
    padding-right: 1rem !important;
  }

  .pb-md-3,
  .py-md-3 {
    padding-bottom: 1rem !important;
  }

  .pl-md-3,
  .px-md-3 {
    padding-left: 1rem !important;
  }

  .p-md-4 {
    padding: 1.5rem !important;
  }

  .pt-md-4,
  .py-md-4 {
    padding-top: 1.5rem !important;
  }

  .pr-md-4,
  .px-md-4 {
    padding-right: 1.5rem !important;
  }

  .pb-md-4,
  .py-md-4 {
    padding-bottom: 1.5rem !important;
  }

  .pl-md-4,
  .px-md-4 {
    padding-left: 1.5rem !important;
  }

  .p-md-5 {
    padding: 3rem !important;
  }

  .pt-md-5,
  .py-md-5 {
    padding-top: 3rem !important;
  }

  .pr-md-5,
  .px-md-5 {
    padding-right: 3rem !important;
  }

  .pb-md-5,
  .py-md-5 {
    padding-bottom: 3rem !important;
  }

  .pl-md-5,
  .px-md-5 {
    padding-left: 3rem !important;
  }

  .p-md-6 {
    padding: 4.5rem !important;
  }

  .pt-md-6,
  .py-md-6 {
    padding-top: 4.5rem !important;
  }

  .pr-md-6,
  .px-md-6 {
    padding-right: 4.5rem !important;
  }

  .pb-md-6,
  .py-md-6 {
    padding-bottom: 4.5rem !important;
  }

  .pl-md-6,
  .px-md-6 {
    padding-left: 4.5rem !important;
  }

  .p-md-7 {
    padding: 7.5rem !important;
  }

  .pt-md-7,
  .py-md-7 {
    padding-top: 7.5rem !important;
  }

  .pr-md-7,
  .px-md-7 {
    padding-right: 7.5rem !important;
  }

  .pb-md-7,
  .py-md-7 {
    padding-bottom: 7.5rem !important;
  }

  .pl-md-7,
  .px-md-7 {
    padding-left: 7.5rem !important;
  }

  .p-md-8 {
    padding: 9.5rem !important;
  }

  .pt-md-8,
  .py-md-8 {
    padding-top: 9.5rem !important;
  }

  .pr-md-8,
  .px-md-8 {
    padding-right: 9.5rem !important;
  }

  .pb-md-8,
  .py-md-8 {
    padding-bottom: 9.5rem !important;
  }

  .pl-md-8,
  .px-md-8 {
    padding-left: 9.5rem !important;
  }

  .p-md-9 {
    padding: 12rem !important;
  }

  .pt-md-9,
  .py-md-9 {
    padding-top: 12rem !important;
  }

  .pr-md-9,
  .px-md-9 {
    padding-right: 12rem !important;
  }

  .pb-md-9,
  .py-md-9 {
    padding-bottom: 12rem !important;
  }

  .pl-md-9,
  .px-md-9 {
    padding-left: 12rem !important;
  }

  .p-md-10 {
    padding: 14.5rem !important;
  }

  .pt-md-10,
  .py-md-10 {
    padding-top: 14.5rem !important;
  }

  .pr-md-10,
  .px-md-10 {
    padding-right: 14.5rem !important;
  }

  .pb-md-10,
  .py-md-10 {
    padding-bottom: 14.5rem !important;
  }

  .pl-md-10,
  .px-md-10 {
    padding-left: 14.5rem !important;
  }

  .m-md-auto {
    margin: auto !important;
  }

  .mt-md-auto,
  .my-md-auto {
    margin-top: auto !important;
  }

  .mr-md-auto,
  .mx-md-auto {
    margin-right: auto !important;
  }

  .mb-md-auto,
  .my-md-auto {
    margin-bottom: auto !important;
  }

  .ml-md-auto,
  .mx-md-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 992px) {
  .m-lg-0 {
    margin: 0rem !important;
  }

  .mt-lg-0,
  .my-lg-0 {
    margin-top: 0rem !important;
  }

  .mr-lg-0,
  .mx-lg-0 {
    margin-right: 0rem !important;
  }

  .mb-lg-0,
  .my-lg-0 {
    margin-bottom: 0rem !important;
  }

  .ml-lg-0,
  .mx-lg-0 {
    margin-left: 0rem !important;
  }

  .m-lg-1 {
    margin: 0.25rem !important;
  }

  .mt-lg-1,
  .my-lg-1 {
    margin-top: 0.25rem !important;
  }

  .mr-lg-1,
  .mx-lg-1 {
    margin-right: 0.25rem !important;
  }

  .mb-lg-1,
  .my-lg-1 {
    margin-bottom: 0.25rem !important;
  }

  .ml-lg-1,
  .mx-lg-1 {
    margin-left: 0.25rem !important;
  }

  .m-lg-2 {
    margin: 0.5rem !important;
  }

  .mt-lg-2,
  .my-lg-2 {
    margin-top: 0.5rem !important;
  }

  .mr-lg-2,
  .mx-lg-2 {
    margin-right: 0.5rem !important;
  }

  .mb-lg-2,
  .my-lg-2 {
    margin-bottom: 0.5rem !important;
  }

  .ml-lg-2,
  .mx-lg-2 {
    margin-left: 0.5rem !important;
  }

  .m-lg-3 {
    margin: 1rem !important;
  }

  .mt-lg-3,
  .my-lg-3 {
    margin-top: 1rem !important;
  }

  .mr-lg-3,
  .mx-lg-3 {
    margin-right: 1rem !important;
  }

  .mb-lg-3,
  .my-lg-3 {
    margin-bottom: 1rem !important;
  }

  .ml-lg-3,
  .mx-lg-3 {
    margin-left: 1rem !important;
  }

  .m-lg-4 {
    margin: 1.5rem !important;
  }

  .mt-lg-4,
  .my-lg-4 {
    margin-top: 1.5rem !important;
  }

  .mr-lg-4,
  .mx-lg-4 {
    margin-right: 1.5rem !important;
  }

  .mb-lg-4,
  .my-lg-4 {
    margin-bottom: 1.5rem !important;
  }

  .ml-lg-4,
  .mx-lg-4 {
    margin-left: 1.5rem !important;
  }

  .m-lg-5 {
    margin: 3rem !important;
  }

  .mt-lg-5,
  .my-lg-5 {
    margin-top: 3rem !important;
  }

  .mr-lg-5,
  .mx-lg-5 {
    margin-right: 3rem !important;
  }

  .mb-lg-5,
  .my-lg-5 {
    margin-bottom: 3rem !important;
  }

  .ml-lg-5,
  .mx-lg-5 {
    margin-left: 3rem !important;
  }

  .m-lg-6 {
    margin: 4.5rem !important;
  }

  .mt-lg-6,
  .my-lg-6 {
    margin-top: 4.5rem !important;
  }

  .mr-lg-6,
  .mx-lg-6 {
    margin-right: 4.5rem !important;
  }

  .mb-lg-6,
  .my-lg-6 {
    margin-bottom: 4.5rem !important;
  }

  .ml-lg-6,
  .mx-lg-6 {
    margin-left: 4.5rem !important;
  }

  .m-lg-7 {
    margin: 7.5rem !important;
  }

  .mt-lg-7,
  .my-lg-7 {
    margin-top: 7.5rem !important;
  }

  .mr-lg-7,
  .mx-lg-7 {
    margin-right: 7.5rem !important;
  }

  .mb-lg-7,
  .my-lg-7 {
    margin-bottom: 7.5rem !important;
  }

  .ml-lg-7,
  .mx-lg-7 {
    margin-left: 7.5rem !important;
  }

  .m-lg-8 {
    margin: 9.5rem !important;
  }

  .mt-lg-8,
  .my-lg-8 {
    margin-top: 9.5rem !important;
  }

  .mr-lg-8,
  .mx-lg-8 {
    margin-right: 9.5rem !important;
  }

  .mb-lg-8,
  .my-lg-8 {
    margin-bottom: 9.5rem !important;
  }

  .ml-lg-8,
  .mx-lg-8 {
    margin-left: 9.5rem !important;
  }

  .m-lg-9 {
    margin: 12rem !important;
  }

  .mt-lg-9,
  .my-lg-9 {
    margin-top: 12rem !important;
  }

  .mr-lg-9,
  .mx-lg-9 {
    margin-right: 12rem !important;
  }

  .mb-lg-9,
  .my-lg-9 {
    margin-bottom: 12rem !important;
  }

  .ml-lg-9,
  .mx-lg-9 {
    margin-left: 12rem !important;
  }

  .m-lg-10 {
    margin: 14.5rem !important;
  }

  .mt-lg-10,
  .my-lg-10 {
    margin-top: 14.5rem !important;
  }

  .mr-lg-10,
  .mx-lg-10 {
    margin-right: 14.5rem !important;
  }

  .mb-lg-10,
  .my-lg-10 {
    margin-bottom: 14.5rem !important;
  }

  .ml-lg-10,
  .mx-lg-10 {
    margin-left: 14.5rem !important;
  }

  .p-lg-0 {
    padding: 0rem !important;
  }

  .pt-lg-0,
  .py-lg-0 {
    padding-top: 0rem !important;
  }

  .pr-lg-0,
  .px-lg-0 {
    padding-right: 0rem !important;
  }

  .pb-lg-0,
  .py-lg-0 {
    padding-bottom: 0rem !important;
  }

  .pl-lg-0,
  .px-lg-0 {
    padding-left: 0rem !important;
  }

  .p-lg-1 {
    padding: 0.25rem !important;
  }

  .pt-lg-1,
  .py-lg-1 {
    padding-top: 0.25rem !important;
  }

  .pr-lg-1,
  .px-lg-1 {
    padding-right: 0.25rem !important;
  }

  .pb-lg-1,
  .py-lg-1 {
    padding-bottom: 0.25rem !important;
  }

  .pl-lg-1,
  .px-lg-1 {
    padding-left: 0.25rem !important;
  }

  .p-lg-2 {
    padding: 0.5rem !important;
  }

  .pt-lg-2,
  .py-lg-2 {
    padding-top: 0.5rem !important;
  }

  .pr-lg-2,
  .px-lg-2 {
    padding-right: 0.5rem !important;
  }

  .pb-lg-2,
  .py-lg-2 {
    padding-bottom: 0.5rem !important;
  }

  .pl-lg-2,
  .px-lg-2 {
    padding-left: 0.5rem !important;
  }

  .p-lg-3 {
    padding: 1rem !important;
  }

  .pt-lg-3,
  .py-lg-3 {
    padding-top: 1rem !important;
  }

  .pr-lg-3,
  .px-lg-3 {
    padding-right: 1rem !important;
  }

  .pb-lg-3,
  .py-lg-3 {
    padding-bottom: 1rem !important;
  }

  .pl-lg-3,
  .px-lg-3 {
    padding-left: 1rem !important;
  }

  .p-lg-4 {
    padding: 1.5rem !important;
  }

  .pt-lg-4,
  .py-lg-4 {
    padding-top: 1.5rem !important;
  }

  .pr-lg-4,
  .px-lg-4 {
    padding-right: 1.5rem !important;
  }

  .pb-lg-4,
  .py-lg-4 {
    padding-bottom: 1.5rem !important;
  }

  .pl-lg-4,
  .px-lg-4 {
    padding-left: 1.5rem !important;
  }

  .p-lg-5 {
    padding: 3rem !important;
  }

  .pt-lg-5,
  .py-lg-5 {
    padding-top: 3rem !important;
  }

  .pr-lg-5,
  .px-lg-5 {
    padding-right: 3rem !important;
  }

  .pb-lg-5,
  .py-lg-5 {
    padding-bottom: 3rem !important;
  }

  .pl-lg-5,
  .px-lg-5 {
    padding-left: 3rem !important;
  }

  .p-lg-6 {
    padding: 4.5rem !important;
  }

  .pt-lg-6,
  .py-lg-6 {
    padding-top: 4.5rem !important;
  }

  .pr-lg-6,
  .px-lg-6 {
    padding-right: 4.5rem !important;
  }

  .pb-lg-6,
  .py-lg-6 {
    padding-bottom: 4.5rem !important;
  }

  .pl-lg-6,
  .px-lg-6 {
    padding-left: 4.5rem !important;
  }

  .p-lg-7 {
    padding: 7.5rem !important;
  }

  .pt-lg-7,
  .py-lg-7 {
    padding-top: 7.5rem !important;
  }

  .pr-lg-7,
  .px-lg-7 {
    padding-right: 7.5rem !important;
  }

  .pb-lg-7,
  .py-lg-7 {
    padding-bottom: 7.5rem !important;
  }

  .pl-lg-7,
  .px-lg-7 {
    padding-left: 7.5rem !important;
  }

  .p-lg-8 {
    padding: 9.5rem !important;
  }

  .pt-lg-8,
  .py-lg-8 {
    padding-top: 9.5rem !important;
  }

  .pr-lg-8,
  .px-lg-8 {
    padding-right: 9.5rem !important;
  }

  .pb-lg-8,
  .py-lg-8 {
    padding-bottom: 9.5rem !important;
  }

  .pl-lg-8,
  .px-lg-8 {
    padding-left: 9.5rem !important;
  }

  .p-lg-9 {
    padding: 12rem !important;
  }

  .pt-lg-9,
  .py-lg-9 {
    padding-top: 12rem !important;
  }

  .pr-lg-9,
  .px-lg-9 {
    padding-right: 12rem !important;
  }

  .pb-lg-9,
  .py-lg-9 {
    padding-bottom: 12rem !important;
  }

  .pl-lg-9,
  .px-lg-9 {
    padding-left: 12rem !important;
  }

  .p-lg-10 {
    padding: 14.5rem !important;
  }

  .pt-lg-10,
  .py-lg-10 {
    padding-top: 14.5rem !important;
  }

  .pr-lg-10,
  .px-lg-10 {
    padding-right: 14.5rem !important;
  }

  .pb-lg-10,
  .py-lg-10 {
    padding-bottom: 14.5rem !important;
  }

  .pl-lg-10,
  .px-lg-10 {
    padding-left: 14.5rem !important;
  }

  .m-lg-auto {
    margin: auto !important;
  }

  .mt-lg-auto,
  .my-lg-auto {
    margin-top: auto !important;
  }

  .mr-lg-auto,
  .mx-lg-auto {
    margin-right: auto !important;
  }

  .mb-lg-auto,
  .my-lg-auto {
    margin-bottom: auto !important;
  }

  .ml-lg-auto,
  .mx-lg-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 1200px) {
  .m-xl-0 {
    margin: 0rem !important;
  }

  .mt-xl-0,
  .my-xl-0 {
    margin-top: 0rem !important;
  }

  .mr-xl-0,
  .mx-xl-0 {
    margin-right: 0rem !important;
  }

  .mb-xl-0,
  .my-xl-0 {
    margin-bottom: 0rem !important;
  }

  .ml-xl-0,
  .mx-xl-0 {
    margin-left: 0rem !important;
  }

  .m-xl-1 {
    margin: 0.25rem !important;
  }

  .mt-xl-1,
  .my-xl-1 {
    margin-top: 0.25rem !important;
  }

  .mr-xl-1,
  .mx-xl-1 {
    margin-right: 0.25rem !important;
  }

  .mb-xl-1,
  .my-xl-1 {
    margin-bottom: 0.25rem !important;
  }

  .ml-xl-1,
  .mx-xl-1 {
    margin-left: 0.25rem !important;
  }

  .m-xl-2 {
    margin: 0.5rem !important;
  }

  .mt-xl-2,
  .my-xl-2 {
    margin-top: 0.5rem !important;
  }

  .mr-xl-2,
  .mx-xl-2 {
    margin-right: 0.5rem !important;
  }

  .mb-xl-2,
  .my-xl-2 {
    margin-bottom: 0.5rem !important;
  }

  .ml-xl-2,
  .mx-xl-2 {
    margin-left: 0.5rem !important;
  }

  .m-xl-3 {
    margin: 1rem !important;
  }

  .mt-xl-3,
  .my-xl-3 {
    margin-top: 1rem !important;
  }

  .mr-xl-3,
  .mx-xl-3 {
    margin-right: 1rem !important;
  }

  .mb-xl-3,
  .my-xl-3 {
    margin-bottom: 1rem !important;
  }

  .ml-xl-3,
  .mx-xl-3 {
    margin-left: 1rem !important;
  }

  .m-xl-4 {
    margin: 1.5rem !important;
  }

  .mt-xl-4,
  .my-xl-4 {
    margin-top: 1.5rem !important;
  }

  .mr-xl-4,
  .mx-xl-4 {
    margin-right: 1.5rem !important;
  }

  .mb-xl-4,
  .my-xl-4 {
    margin-bottom: 1.5rem !important;
  }

  .ml-xl-4,
  .mx-xl-4 {
    margin-left: 1.5rem !important;
  }

  .m-xl-5 {
    margin: 3rem !important;
  }

  .mt-xl-5,
  .my-xl-5 {
    margin-top: 3rem !important;
  }

  .mr-xl-5,
  .mx-xl-5 {
    margin-right: 3rem !important;
  }

  .mb-xl-5,
  .my-xl-5 {
    margin-bottom: 3rem !important;
  }

  .ml-xl-5,
  .mx-xl-5 {
    margin-left: 3rem !important;
  }

  .m-xl-6 {
    margin: 4.5rem !important;
  }

  .mt-xl-6,
  .my-xl-6 {
    margin-top: 4.5rem !important;
  }

  .mr-xl-6,
  .mx-xl-6 {
    margin-right: 4.5rem !important;
  }

  .mb-xl-6,
  .my-xl-6 {
    margin-bottom: 4.5rem !important;
  }

  .ml-xl-6,
  .mx-xl-6 {
    margin-left: 4.5rem !important;
  }

  .m-xl-7 {
    margin: 7.5rem !important;
  }

  .mt-xl-7,
  .my-xl-7 {
    margin-top: 7.5rem !important;
  }

  .mr-xl-7,
  .mx-xl-7 {
    margin-right: 7.5rem !important;
  }

  .mb-xl-7,
  .my-xl-7 {
    margin-bottom: 7.5rem !important;
  }

  .ml-xl-7,
  .mx-xl-7 {
    margin-left: 7.5rem !important;
  }

  .m-xl-8 {
    margin: 9.5rem !important;
  }

  .mt-xl-8,
  .my-xl-8 {
    margin-top: 9.5rem !important;
  }

  .mr-xl-8,
  .mx-xl-8 {
    margin-right: 9.5rem !important;
  }

  .mb-xl-8,
  .my-xl-8 {
    margin-bottom: 9.5rem !important;
  }

  .ml-xl-8,
  .mx-xl-8 {
    margin-left: 9.5rem !important;
  }

  .m-xl-9 {
    margin: 12rem !important;
  }

  .mt-xl-9,
  .my-xl-9 {
    margin-top: 12rem !important;
  }

  .mr-xl-9,
  .mx-xl-9 {
    margin-right: 12rem !important;
  }

  .mb-xl-9,
  .my-xl-9 {
    margin-bottom: 12rem !important;
  }

  .ml-xl-9,
  .mx-xl-9 {
    margin-left: 12rem !important;
  }

  .m-xl-10 {
    margin: 14.5rem !important;
  }

  .mt-xl-10,
  .my-xl-10 {
    margin-top: 14.5rem !important;
  }

  .mr-xl-10,
  .mx-xl-10 {
    margin-right: 14.5rem !important;
  }

  .mb-xl-10,
  .my-xl-10 {
    margin-bottom: 14.5rem !important;
  }

  .ml-xl-10,
  .mx-xl-10 {
    margin-left: 14.5rem !important;
  }

  .p-xl-0 {
    padding: 0rem !important;
  }

  .pt-xl-0,
  .py-xl-0 {
    padding-top: 0rem !important;
  }

  .pr-xl-0,
  .px-xl-0 {
    padding-right: 0rem !important;
  }

  .pb-xl-0,
  .py-xl-0 {
    padding-bottom: 0rem !important;
  }

  .pl-xl-0,
  .px-xl-0 {
    padding-left: 0rem !important;
  }

  .p-xl-1 {
    padding: 0.25rem !important;
  }

  .pt-xl-1,
  .py-xl-1 {
    padding-top: 0.25rem !important;
  }

  .pr-xl-1,
  .px-xl-1 {
    padding-right: 0.25rem !important;
  }

  .pb-xl-1,
  .py-xl-1 {
    padding-bottom: 0.25rem !important;
  }

  .pl-xl-1,
  .px-xl-1 {
    padding-left: 0.25rem !important;
  }

  .p-xl-2 {
    padding: 0.5rem !important;
  }

  .pt-xl-2,
  .py-xl-2 {
    padding-top: 0.5rem !important;
  }

  .pr-xl-2,
  .px-xl-2 {
    padding-right: 0.5rem !important;
  }

  .pb-xl-2,
  .py-xl-2 {
    padding-bottom: 0.5rem !important;
  }

  .pl-xl-2,
  .px-xl-2 {
    padding-left: 0.5rem !important;
  }

  .p-xl-3 {
    padding: 1rem !important;
  }

  .pt-xl-3,
  .py-xl-3 {
    padding-top: 1rem !important;
  }

  .pr-xl-3,
  .px-xl-3 {
    padding-right: 1rem !important;
  }

  .pb-xl-3,
  .py-xl-3 {
    padding-bottom: 1rem !important;
  }

  .pl-xl-3,
  .px-xl-3 {
    padding-left: 1rem !important;
  }

  .p-xl-4 {
    padding: 1.5rem !important;
  }

  .pt-xl-4,
  .py-xl-4 {
    padding-top: 1.5rem !important;
  }

  .pr-xl-4,
  .px-xl-4 {
    padding-right: 1.5rem !important;
  }

  .pb-xl-4,
  .py-xl-4 {
    padding-bottom: 1.5rem !important;
  }

  .pl-xl-4,
  .px-xl-4 {
    padding-left: 1.5rem !important;
  }

  .p-xl-5 {
    padding: 3rem !important;
  }

  .pt-xl-5,
  .py-xl-5 {
    padding-top: 3rem !important;
  }

  .pr-xl-5,
  .px-xl-5 {
    padding-right: 3rem !important;
  }

  .pb-xl-5,
  .py-xl-5 {
    padding-bottom: 3rem !important;
  }

  .pl-xl-5,
  .px-xl-5 {
    padding-left: 3rem !important;
  }

  .p-xl-6 {
    padding: 4.5rem !important;
  }

  .pt-xl-6,
  .py-xl-6 {
    padding-top: 4.5rem !important;
  }

  .pr-xl-6,
  .px-xl-6 {
    padding-right: 4.5rem !important;
  }

  .pb-xl-6,
  .py-xl-6 {
    padding-bottom: 4.5rem !important;
  }

  .pl-xl-6,
  .px-xl-6 {
    padding-left: 4.5rem !important;
  }

  .p-xl-7 {
    padding: 7.5rem !important;
  }

  .pt-xl-7,
  .py-xl-7 {
    padding-top: 7.5rem !important;
  }

  .pr-xl-7,
  .px-xl-7 {
    padding-right: 7.5rem !important;
  }

  .pb-xl-7,
  .py-xl-7 {
    padding-bottom: 7.5rem !important;
  }

  .pl-xl-7,
  .px-xl-7 {
    padding-left: 7.5rem !important;
  }

  .p-xl-8 {
    padding: 9.5rem !important;
  }

  .pt-xl-8,
  .py-xl-8 {
    padding-top: 9.5rem !important;
  }

  .pr-xl-8,
  .px-xl-8 {
    padding-right: 9.5rem !important;
  }

  .pb-xl-8,
  .py-xl-8 {
    padding-bottom: 9.5rem !important;
  }

  .pl-xl-8,
  .px-xl-8 {
    padding-left: 9.5rem !important;
  }

  .p-xl-9 {
    padding: 12rem !important;
  }

  .pt-xl-9,
  .py-xl-9 {
    padding-top: 12rem !important;
  }

  .pr-xl-9,
  .px-xl-9 {
    padding-right: 12rem !important;
  }

  .pb-xl-9,
  .py-xl-9 {
    padding-bottom: 12rem !important;
  }

  .pl-xl-9,
  .px-xl-9 {
    padding-left: 12rem !important;
  }

  .p-xl-10 {
    padding: 14.5rem !important;
  }

  .pt-xl-10,
  .py-xl-10 {
    padding-top: 14.5rem !important;
  }

  .pr-xl-10,
  .px-xl-10 {
    padding-right: 14.5rem !important;
  }

  .pb-xl-10,
  .py-xl-10 {
    padding-bottom: 14.5rem !important;
  }

  .pl-xl-10,
  .px-xl-10 {
    padding-left: 14.5rem !important;
  }

  .m-xl-auto {
    margin: auto !important;
  }

  .mt-xl-auto,
  .my-xl-auto {
    margin-top: auto !important;
  }

  .mr-xl-auto,
  .mx-xl-auto {
    margin-right: auto !important;
  }

  .mb-xl-auto,
  .my-xl-auto {
    margin-bottom: auto !important;
  }

  .ml-xl-auto,
  .mx-xl-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 1356px) {
  .m-xxl-0 {
    margin: 0rem !important;
  }

  .mt-xxl-0,
  .my-xxl-0 {
    margin-top: 0rem !important;
  }

  .mr-xxl-0,
  .mx-xxl-0 {
    margin-right: 0rem !important;
  }

  .mb-xxl-0,
  .my-xxl-0 {
    margin-bottom: 0rem !important;
  }

  .ml-xxl-0,
  .mx-xxl-0 {
    margin-left: 0rem !important;
  }

  .m-xxl-1 {
    margin: 0.25rem !important;
  }

  .mt-xxl-1,
  .my-xxl-1 {
    margin-top: 0.25rem !important;
  }

  .mr-xxl-1,
  .mx-xxl-1 {
    margin-right: 0.25rem !important;
  }

  .mb-xxl-1,
  .my-xxl-1 {
    margin-bottom: 0.25rem !important;
  }

  .ml-xxl-1,
  .mx-xxl-1 {
    margin-left: 0.25rem !important;
  }

  .m-xxl-2 {
    margin: 0.5rem !important;
  }

  .mt-xxl-2,
  .my-xxl-2 {
    margin-top: 0.5rem !important;
  }

  .mr-xxl-2,
  .mx-xxl-2 {
    margin-right: 0.5rem !important;
  }

  .mb-xxl-2,
  .my-xxl-2 {
    margin-bottom: 0.5rem !important;
  }

  .ml-xxl-2,
  .mx-xxl-2 {
    margin-left: 0.5rem !important;
  }

  .m-xxl-3 {
    margin: 1rem !important;
  }

  .mt-xxl-3,
  .my-xxl-3 {
    margin-top: 1rem !important;
  }

  .mr-xxl-3,
  .mx-xxl-3 {
    margin-right: 1rem !important;
  }

  .mb-xxl-3,
  .my-xxl-3 {
    margin-bottom: 1rem !important;
  }

  .ml-xxl-3,
  .mx-xxl-3 {
    margin-left: 1rem !important;
  }

  .m-xxl-4 {
    margin: 1.5rem !important;
  }

  .mt-xxl-4,
  .my-xxl-4 {
    margin-top: 1.5rem !important;
  }

  .mr-xxl-4,
  .mx-xxl-4 {
    margin-right: 1.5rem !important;
  }

  .mb-xxl-4,
  .my-xxl-4 {
    margin-bottom: 1.5rem !important;
  }

  .ml-xxl-4,
  .mx-xxl-4 {
    margin-left: 1.5rem !important;
  }

  .m-xxl-5 {
    margin: 3rem !important;
  }

  .mt-xxl-5,
  .my-xxl-5 {
    margin-top: 3rem !important;
  }

  .mr-xxl-5,
  .mx-xxl-5 {
    margin-right: 3rem !important;
  }

  .mb-xxl-5,
  .my-xxl-5 {
    margin-bottom: 3rem !important;
  }

  .ml-xxl-5,
  .mx-xxl-5 {
    margin-left: 3rem !important;
  }

  .m-xxl-6 {
    margin: 4.5rem !important;
  }

  .mt-xxl-6,
  .my-xxl-6 {
    margin-top: 4.5rem !important;
  }

  .mr-xxl-6,
  .mx-xxl-6 {
    margin-right: 4.5rem !important;
  }

  .mb-xxl-6,
  .my-xxl-6 {
    margin-bottom: 4.5rem !important;
  }

  .ml-xxl-6,
  .mx-xxl-6 {
    margin-left: 4.5rem !important;
  }

  .m-xxl-7 {
    margin: 7.5rem !important;
  }

  .mt-xxl-7,
  .my-xxl-7 {
    margin-top: 7.5rem !important;
  }

  .mr-xxl-7,
  .mx-xxl-7 {
    margin-right: 7.5rem !important;
  }

  .mb-xxl-7,
  .my-xxl-7 {
    margin-bottom: 7.5rem !important;
  }

  .ml-xxl-7,
  .mx-xxl-7 {
    margin-left: 7.5rem !important;
  }

  .m-xxl-8 {
    margin: 9.5rem !important;
  }

  .mt-xxl-8,
  .my-xxl-8 {
    margin-top: 9.5rem !important;
  }

  .mr-xxl-8,
  .mx-xxl-8 {
    margin-right: 9.5rem !important;
  }

  .mb-xxl-8,
  .my-xxl-8 {
    margin-bottom: 9.5rem !important;
  }

  .ml-xxl-8,
  .mx-xxl-8 {
    margin-left: 9.5rem !important;
  }

  .m-xxl-9 {
    margin: 12rem !important;
  }

  .mt-xxl-9,
  .my-xxl-9 {
    margin-top: 12rem !important;
  }

  .mr-xxl-9,
  .mx-xxl-9 {
    margin-right: 12rem !important;
  }

  .mb-xxl-9,
  .my-xxl-9 {
    margin-bottom: 12rem !important;
  }

  .ml-xxl-9,
  .mx-xxl-9 {
    margin-left: 12rem !important;
  }

  .m-xxl-10 {
    margin: 14.5rem !important;
  }

  .mt-xxl-10,
  .my-xxl-10 {
    margin-top: 14.5rem !important;
  }

  .mr-xxl-10,
  .mx-xxl-10 {
    margin-right: 14.5rem !important;
  }

  .mb-xxl-10,
  .my-xxl-10 {
    margin-bottom: 14.5rem !important;
  }

  .ml-xxl-10,
  .mx-xxl-10 {
    margin-left: 14.5rem !important;
  }

  .p-xxl-0 {
    padding: 0rem !important;
  }

  .pt-xxl-0,
  .py-xxl-0 {
    padding-top: 0rem !important;
  }

  .pr-xxl-0,
  .px-xxl-0 {
    padding-right: 0rem !important;
  }

  .pb-xxl-0,
  .py-xxl-0 {
    padding-bottom: 0rem !important;
  }

  .pl-xxl-0,
  .px-xxl-0 {
    padding-left: 0rem !important;
  }

  .p-xxl-1 {
    padding: 0.25rem !important;
  }

  .pt-xxl-1,
  .py-xxl-1 {
    padding-top: 0.25rem !important;
  }

  .pr-xxl-1,
  .px-xxl-1 {
    padding-right: 0.25rem !important;
  }

  .pb-xxl-1,
  .py-xxl-1 {
    padding-bottom: 0.25rem !important;
  }

  .pl-xxl-1,
  .px-xxl-1 {
    padding-left: 0.25rem !important;
  }

  .p-xxl-2 {
    padding: 0.5rem !important;
  }

  .pt-xxl-2,
  .py-xxl-2 {
    padding-top: 0.5rem !important;
  }

  .pr-xxl-2,
  .px-xxl-2 {
    padding-right: 0.5rem !important;
  }

  .pb-xxl-2,
  .py-xxl-2 {
    padding-bottom: 0.5rem !important;
  }

  .pl-xxl-2,
  .px-xxl-2 {
    padding-left: 0.5rem !important;
  }

  .p-xxl-3 {
    padding: 1rem !important;
  }

  .pt-xxl-3,
  .py-xxl-3 {
    padding-top: 1rem !important;
  }

  .pr-xxl-3,
  .px-xxl-3 {
    padding-right: 1rem !important;
  }

  .pb-xxl-3,
  .py-xxl-3 {
    padding-bottom: 1rem !important;
  }

  .pl-xxl-3,
  .px-xxl-3 {
    padding-left: 1rem !important;
  }

  .p-xxl-4 {
    padding: 1.5rem !important;
  }

  .pt-xxl-4,
  .py-xxl-4 {
    padding-top: 1.5rem !important;
  }

  .pr-xxl-4,
  .px-xxl-4 {
    padding-right: 1.5rem !important;
  }

  .pb-xxl-4,
  .py-xxl-4 {
    padding-bottom: 1.5rem !important;
  }

  .pl-xxl-4,
  .px-xxl-4 {
    padding-left: 1.5rem !important;
  }

  .p-xxl-5 {
    padding: 3rem !important;
  }

  .pt-xxl-5,
  .py-xxl-5 {
    padding-top: 3rem !important;
  }

  .pr-xxl-5,
  .px-xxl-5 {
    padding-right: 3rem !important;
  }

  .pb-xxl-5,
  .py-xxl-5 {
    padding-bottom: 3rem !important;
  }

  .pl-xxl-5,
  .px-xxl-5 {
    padding-left: 3rem !important;
  }

  .p-xxl-6 {
    padding: 4.5rem !important;
  }

  .pt-xxl-6,
  .py-xxl-6 {
    padding-top: 4.5rem !important;
  }

  .pr-xxl-6,
  .px-xxl-6 {
    padding-right: 4.5rem !important;
  }

  .pb-xxl-6,
  .py-xxl-6 {
    padding-bottom: 4.5rem !important;
  }

  .pl-xxl-6,
  .px-xxl-6 {
    padding-left: 4.5rem !important;
  }

  .p-xxl-7 {
    padding: 7.5rem !important;
  }

  .pt-xxl-7,
  .py-xxl-7 {
    padding-top: 7.5rem !important;
  }

  .pr-xxl-7,
  .px-xxl-7 {
    padding-right: 7.5rem !important;
  }

  .pb-xxl-7,
  .py-xxl-7 {
    padding-bottom: 7.5rem !important;
  }

  .pl-xxl-7,
  .px-xxl-7 {
    padding-left: 7.5rem !important;
  }

  .p-xxl-8 {
    padding: 9.5rem !important;
  }

  .pt-xxl-8,
  .py-xxl-8 {
    padding-top: 9.5rem !important;
  }

  .pr-xxl-8,
  .px-xxl-8 {
    padding-right: 9.5rem !important;
  }

  .pb-xxl-8,
  .py-xxl-8 {
    padding-bottom: 9.5rem !important;
  }

  .pl-xxl-8,
  .px-xxl-8 {
    padding-left: 9.5rem !important;
  }

  .p-xxl-9 {
    padding: 12rem !important;
  }

  .pt-xxl-9,
  .py-xxl-9 {
    padding-top: 12rem !important;
  }

  .pr-xxl-9,
  .px-xxl-9 {
    padding-right: 12rem !important;
  }

  .pb-xxl-9,
  .py-xxl-9 {
    padding-bottom: 12rem !important;
  }

  .pl-xxl-9,
  .px-xxl-9 {
    padding-left: 12rem !important;
  }

  .p-xxl-10 {
    padding: 14.5rem !important;
  }

  .pt-xxl-10,
  .py-xxl-10 {
    padding-top: 14.5rem !important;
  }

  .pr-xxl-10,
  .px-xxl-10 {
    padding-right: 14.5rem !important;
  }

  .pb-xxl-10,
  .py-xxl-10 {
    padding-bottom: 14.5rem !important;
  }

  .pl-xxl-10,
  .px-xxl-10 {
    padding-left: 14.5rem !important;
  }

  .m-xxl-auto {
    margin: auto !important;
  }

  .mt-xxl-auto,
  .my-xxl-auto {
    margin-top: auto !important;
  }

  .mr-xxl-auto,
  .mx-xxl-auto {
    margin-right: auto !important;
  }

  .mb-xxl-auto,
  .my-xxl-auto {
    margin-bottom: auto !important;
  }

  .ml-xxl-auto,
  .mx-xxl-auto {
    margin-left: auto !important;
  }
}

@media (min-width: 1845px) {
  .m-xxxl-0 {
    margin: 0rem !important;
  }

  .mt-xxxl-0,
  .my-xxxl-0 {
    margin-top: 0rem !important;
  }

  .mr-xxxl-0,
  .mx-xxxl-0 {
    margin-right: 0rem !important;
  }

  .mb-xxxl-0,
  .my-xxxl-0 {
    margin-bottom: 0rem !important;
  }

  .ml-xxxl-0,
  .mx-xxxl-0 {
    margin-left: 0rem !important;
  }

  .m-xxxl-1 {
    margin: 0.25rem !important;
  }

  .mt-xxxl-1,
  .my-xxxl-1 {
    margin-top: 0.25rem !important;
  }

  .mr-xxxl-1,
  .mx-xxxl-1 {
    margin-right: 0.25rem !important;
  }

  .mb-xxxl-1,
  .my-xxxl-1 {
    margin-bottom: 0.25rem !important;
  }

  .ml-xxxl-1,
  .mx-xxxl-1 {
    margin-left: 0.25rem !important;
  }

  .m-xxxl-2 {
    margin: 0.5rem !important;
  }

  .mt-xxxl-2,
  .my-xxxl-2 {
    margin-top: 0.5rem !important;
  }

  .mr-xxxl-2,
  .mx-xxxl-2 {
    margin-right: 0.5rem !important;
  }

  .mb-xxxl-2,
  .my-xxxl-2 {
    margin-bottom: 0.5rem !important;
  }

  .ml-xxxl-2,
  .mx-xxxl-2 {
    margin-left: 0.5rem !important;
  }

  .m-xxxl-3 {
    margin: 1rem !important;
  }

  .mt-xxxl-3,
  .my-xxxl-3 {
    margin-top: 1rem !important;
  }

  .mr-xxxl-3,
  .mx-xxxl-3 {
    margin-right: 1rem !important;
  }

  .mb-xxxl-3,
  .my-xxxl-3 {
    margin-bottom: 1rem !important;
  }

  .ml-xxxl-3,
  .mx-xxxl-3 {
    margin-left: 1rem !important;
  }

  .m-xxxl-4 {
    margin: 1.5rem !important;
  }

  .mt-xxxl-4,
  .my-xxxl-4 {
    margin-top: 1.5rem !important;
  }

  .mr-xxxl-4,
  .mx-xxxl-4 {
    margin-right: 1.5rem !important;
  }

  .mb-xxxl-4,
  .my-xxxl-4 {
    margin-bottom: 1.5rem !important;
  }

  .ml-xxxl-4,
  .mx-xxxl-4 {
    margin-left: 1.5rem !important;
  }

  .m-xxxl-5 {
    margin: 3rem !important;
  }

  .mt-xxxl-5,
  .my-xxxl-5 {
    margin-top: 3rem !important;
  }

  .mr-xxxl-5,
  .mx-xxxl-5 {
    margin-right: 3rem !important;
  }

  .mb-xxxl-5,
  .my-xxxl-5 {
    margin-bottom: 3rem !important;
  }

  .ml-xxxl-5,
  .mx-xxxl-5 {
    margin-left: 3rem !important;
  }

  .m-xxxl-6 {
    margin: 4.5rem !important;
  }

  .mt-xxxl-6,
  .my-xxxl-6 {
    margin-top: 4.5rem !important;
  }

  .mr-xxxl-6,
  .mx-xxxl-6 {
    margin-right: 4.5rem !important;
  }

  .mb-xxxl-6,
  .my-xxxl-6 {
    margin-bottom: 4.5rem !important;
  }

  .ml-xxxl-6,
  .mx-xxxl-6 {
    margin-left: 4.5rem !important;
  }

  .m-xxxl-7 {
    margin: 7.5rem !important;
  }

  .mt-xxxl-7,
  .my-xxxl-7 {
    margin-top: 7.5rem !important;
  }

  .mr-xxxl-7,
  .mx-xxxl-7 {
    margin-right: 7.5rem !important;
  }

  .mb-xxxl-7,
  .my-xxxl-7 {
    margin-bottom: 7.5rem !important;
  }

  .ml-xxxl-7,
  .mx-xxxl-7 {
    margin-left: 7.5rem !important;
  }

  .m-xxxl-8 {
    margin: 9.5rem !important;
  }

  .mt-xxxl-8,
  .my-xxxl-8 {
    margin-top: 9.5rem !important;
  }

  .mr-xxxl-8,
  .mx-xxxl-8 {
    margin-right: 9.5rem !important;
  }

  .mb-xxxl-8,
  .my-xxxl-8 {
    margin-bottom: 9.5rem !important;
  }

  .ml-xxxl-8,
  .mx-xxxl-8 {
    margin-left: 9.5rem !important;
  }

  .m-xxxl-9 {
    margin: 12rem !important;
  }

  .mt-xxxl-9,
  .my-xxxl-9 {
    margin-top: 12rem !important;
  }

  .mr-xxxl-9,
  .mx-xxxl-9 {
    margin-right: 12rem !important;
  }

  .mb-xxxl-9,
  .my-xxxl-9 {
    margin-bottom: 12rem !important;
  }

  .ml-xxxl-9,
  .mx-xxxl-9 {
    margin-left: 12rem !important;
  }

  .m-xxxl-10 {
    margin: 14.5rem !important;
  }

  .mt-xxxl-10,
  .my-xxxl-10 {
    margin-top: 14.5rem !important;
  }

  .mr-xxxl-10,
  .mx-xxxl-10 {
    margin-right: 14.5rem !important;
  }

  .mb-xxxl-10,
  .my-xxxl-10 {
    margin-bottom: 14.5rem !important;
  }

  .ml-xxxl-10,
  .mx-xxxl-10 {
    margin-left: 14.5rem !important;
  }

  .p-xxxl-0 {
    padding: 0rem !important;
  }

  .pt-xxxl-0,
  .py-xxxl-0 {
    padding-top: 0rem !important;
  }

  .pr-xxxl-0,
  .px-xxxl-0 {
    padding-right: 0rem !important;
  }

  .pb-xxxl-0,
  .py-xxxl-0 {
    padding-bottom: 0rem !important;
  }

  .pl-xxxl-0,
  .px-xxxl-0 {
    padding-left: 0rem !important;
  }

  .p-xxxl-1 {
    padding: 0.25rem !important;
  }

  .pt-xxxl-1,
  .py-xxxl-1 {
    padding-top: 0.25rem !important;
  }

  .pr-xxxl-1,
  .px-xxxl-1 {
    padding-right: 0.25rem !important;
  }

  .pb-xxxl-1,
  .py-xxxl-1 {
    padding-bottom: 0.25rem !important;
  }

  .pl-xxxl-1,
  .px-xxxl-1 {
    padding-left: 0.25rem !important;
  }

  .p-xxxl-2 {
    padding: 0.5rem !important;
  }

  .pt-xxxl-2,
  .py-xxxl-2 {
    padding-top: 0.5rem !important;
  }

  .pr-xxxl-2,
  .px-xxxl-2 {
    padding-right: 0.5rem !important;
  }

  .pb-xxxl-2,
  .py-xxxl-2 {
    padding-bottom: 0.5rem !important;
  }

  .pl-xxxl-2,
  .px-xxxl-2 {
    padding-left: 0.5rem !important;
  }

  .p-xxxl-3 {
    padding: 1rem !important;
  }

  .pt-xxxl-3,
  .py-xxxl-3 {
    padding-top: 1rem !important;
  }

  .pr-xxxl-3,
  .px-xxxl-3 {
    padding-right: 1rem !important;
  }

  .pb-xxxl-3,
  .py-xxxl-3 {
    padding-bottom: 1rem !important;
  }

  .pl-xxxl-3,
  .px-xxxl-3 {
    padding-left: 1rem !important;
  }

  .p-xxxl-4 {
    padding: 1.5rem !important;
  }

  .pt-xxxl-4,
  .py-xxxl-4 {
    padding-top: 1.5rem !important;
  }

  .pr-xxxl-4,
  .px-xxxl-4 {
    padding-right: 1.5rem !important;
  }

  .pb-xxxl-4,
  .py-xxxl-4 {
    padding-bottom: 1.5rem !important;
  }

  .pl-xxxl-4,
  .px-xxxl-4 {
    padding-left: 1.5rem !important;
  }

  .p-xxxl-5 {
    padding: 3rem !important;
  }

  .pt-xxxl-5,
  .py-xxxl-5 {
    padding-top: 3rem !important;
  }

  .pr-xxxl-5,
  .px-xxxl-5 {
    padding-right: 3rem !important;
  }

  .pb-xxxl-5,
  .py-xxxl-5 {
    padding-bottom: 3rem !important;
  }

  .pl-xxxl-5,
  .px-xxxl-5 {
    padding-left: 3rem !important;
  }

  .p-xxxl-6 {
    padding: 4.5rem !important;
  }

  .pt-xxxl-6,
  .py-xxxl-6 {
    padding-top: 4.5rem !important;
  }

  .pr-xxxl-6,
  .px-xxxl-6 {
    padding-right: 4.5rem !important;
  }

  .pb-xxxl-6,
  .py-xxxl-6 {
    padding-bottom: 4.5rem !important;
  }

  .pl-xxxl-6,
  .px-xxxl-6 {
    padding-left: 4.5rem !important;
  }

  .p-xxxl-7 {
    padding: 7.5rem !important;
  }

  .pt-xxxl-7,
  .py-xxxl-7 {
    padding-top: 7.5rem !important;
  }

  .pr-xxxl-7,
  .px-xxxl-7 {
    padding-right: 7.5rem !important;
  }

  .pb-xxxl-7,
  .py-xxxl-7 {
    padding-bottom: 7.5rem !important;
  }

  .pl-xxxl-7,
  .px-xxxl-7 {
    padding-left: 7.5rem !important;
  }

  .p-xxxl-8 {
    padding: 9.5rem !important;
  }

  .pt-xxxl-8,
  .py-xxxl-8 {
    padding-top: 9.5rem !important;
  }

  .pr-xxxl-8,
  .px-xxxl-8 {
    padding-right: 9.5rem !important;
  }

  .pb-xxxl-8,
  .py-xxxl-8 {
    padding-bottom: 9.5rem !important;
  }

  .pl-xxxl-8,
  .px-xxxl-8 {
    padding-left: 9.5rem !important;
  }

  .p-xxxl-9 {
    padding: 12rem !important;
  }

  .pt-xxxl-9,
  .py-xxxl-9 {
    padding-top: 12rem !important;
  }

  .pr-xxxl-9,
  .px-xxxl-9 {
    padding-right: 12rem !important;
  }

  .pb-xxxl-9,
  .py-xxxl-9 {
    padding-bottom: 12rem !important;
  }

  .pl-xxxl-9,
  .px-xxxl-9 {
    padding-left: 12rem !important;
  }

  .p-xxxl-10 {
    padding: 14.5rem !important;
  }

  .pt-xxxl-10,
  .py-xxxl-10 {
    padding-top: 14.5rem !important;
  }

  .pr-xxxl-10,
  .px-xxxl-10 {
    padding-right: 14.5rem !important;
  }

  .pb-xxxl-10,
  .py-xxxl-10 {
    padding-bottom: 14.5rem !important;
  }

  .pl-xxxl-10,
  .px-xxxl-10 {
    padding-left: 14.5rem !important;
  }

  .m-xxxl-auto {
    margin: auto !important;
  }

  .mt-xxxl-auto,
  .my-xxxl-auto {
    margin-top: auto !important;
  }

  .mr-xxxl-auto,
  .mx-xxxl-auto {
    margin-right: auto !important;
  }

  .mb-xxxl-auto,
  .my-xxxl-auto {
    margin-bottom: auto !important;
  }

  .ml-xxxl-auto,
  .mx-xxxl-auto {
    margin-left: auto !important;
  }
}

.text-monospace {
  font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
}

.text-justify {
  text-align: justify !important;
}

.text-nowrap {
  white-space: nowrap !important;
}

.text-truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.text-left {
  text-align: left !important;
}

.text-right {
  text-align: right !important;
}

.text-center {
  text-align: center !important;
}

@media (min-width: 576px) {
  .text-sm-left {
    text-align: left !important;
  }

  .text-sm-right {
    text-align: right !important;
  }

  .text-sm-center {
    text-align: center !important;
  }
}

@media (min-width: 768px) {
  .text-md-left {
    text-align: left !important;
  }

  .text-md-right {
    text-align: right !important;
  }

  .text-md-center {
    text-align: center !important;
  }
}

@media (min-width: 992px) {
  .text-lg-left {
    text-align: left !important;
  }

  .text-lg-right {
    text-align: right !important;
  }

  .text-lg-center {
    text-align: center !important;
  }
}

@media (min-width: 1200px) {
  .text-xl-left {
    text-align: left !important;
  }

  .text-xl-right {
    text-align: right !important;
  }

  .text-xl-center {
    text-align: center !important;
  }
}

@media (min-width: 1356px) {
  .text-xxl-left {
    text-align: left !important;
  }

  .text-xxl-right {
    text-align: right !important;
  }

  .text-xxl-center {
    text-align: center !important;
  }
}

@media (min-width: 1845px) {
  .text-xxxl-left {
    text-align: left !important;
  }

  .text-xxxl-right {
    text-align: right !important;
  }

  .text-xxxl-center {
    text-align: center !important;
  }
}

.text-lowercase {
  text-transform: lowercase !important;
}

.text-uppercase {
  text-transform: uppercase !important;
}

.text-capitalize {
  text-transform: capitalize !important;
}

.font-weight-light {
  font-weight: 300 !important;
}

.font-weight-normal {
  font-weight: 400 !important;
}

.font-weight-bold {
  font-weight: 700 !important;
}

.font-italic {
  font-style: italic !important;
}

.text-white {
  color: #fff !important;
}

.text-primary {
  color: #007bff !important;
}

a.text-primary:hover,
a.text-primary:focus {
  color: #0062cc !important;
}

.text-secondary {
  color: #6c757d !important;
}

a.text-secondary:hover,
a.text-secondary:focus {
  color: #545b62 !important;
}

.text-success {
  color: #28a745 !important;
}

a.text-success:hover,
a.text-success:focus {
  color: #1e7e34 !important;
}

.text-info {
  color: #17a2b8 !important;
}

a.text-info:hover,
a.text-info:focus {
  color: #117a8b !important;
}

.text-warning {
  color: #ffc107 !important;
}

a.text-warning:hover,
a.text-warning:focus {
  color: #d39e00 !important;
}

.text-danger {
  color: #dc3545 !important;
}

a.text-danger:hover,
a.text-danger:focus {
  color: #bd2130 !important;
}

.text-light {
  color: #f8f9fa !important;
}

a.text-light:hover,
a.text-light:focus {
  color: #dae0e5 !important;
}

.text-dark {
  color: #343a40 !important;
}

a.text-dark:hover,
a.text-dark:focus {
  color: #1d2124 !important;
}

.text-naranja {
  color: #f58508 !important;
}

a.text-naranja:hover,
a.text-naranja:focus {
  color: #c46a06 !important;
}

.text-body {
  color: #212529 !important;
}

.text-muted {
  color: #6c757d !important;
}

.text-black-50 {
  color: rgba(0, 0, 0, 0.5) !important;
}

.text-white-50 {
  color: rgba(255, 255, 255, 0.5) !important;
}

.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.visible {
  visibility: visible !important;
}

.invisible {
  visibility: hidden !important;
}

@media print {
  *,
  *::before,
  *::after {
    text-shadow: none !important;
    -webkit-box-shadow: none !important;
            box-shadow: none !important;
  }

  a:not(.btn) {
    text-decoration: underline;
  }

  abbr[title]::after {
    content: " (" attr(title) ")";
  }

  pre {
    white-space: pre-wrap !important;
  }

  pre,
  blockquote {
    border: 1px solid #adb5bd;
    page-break-inside: avoid;
  }

  thead {
    display: table-header-group;
  }

  tr,
  img {
    page-break-inside: avoid;
  }

  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }

  h2,
  h3 {
    page-break-after: avoid;
  }

@page {
    size: a3;
}

  body {
    min-width: 992px !important;
  }

  .container {
    min-width: 992px !important;
  }

  .navbar {
    display: none;
  }

  .badge {
    border: 1px solid #000;
  }

  .table {
    border-collapse: collapse !important;
  }

  .table td,
  .table th {
    background-color: #fff !important;
  }

  .table-bordered th,
  .table-bordered td {
    border: 1px solid #dee2e6 !important;
  }

  .table-dark {
    color: inherit;
  }

  .table-dark th,
  .table-dark td,
  .table-dark thead th,
  .table-dark tbody + tbody {
    border-color: #dee2e6;
  }

  .table .thead-dark th {
    color: inherit;
    border-color: #dee2e6;
  }
}

/*!
 * animate.css -http://daneden.me/animate
 * Version - 3.7.0
 * Licensed under the MIT license - http://opensource.org/licenses/MIT
 *
 * Copyright (c) 2018 Daniel Eden
 */

@-webkit-keyframes bounce {
  from, 20%, 53%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  40%, 43% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -30px, 0);
    transform: translate3d(0, -30px, 0);
  }

  70% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -15px, 0);
    transform: translate3d(0, -15px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -4px, 0);
    transform: translate3d(0, -4px, 0);
  }
}

@keyframes bounce {
  from, 20%, 53%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  40%, 43% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -30px, 0);
    transform: translate3d(0, -30px, 0);
  }

  70% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -15px, 0);
    transform: translate3d(0, -15px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -4px, 0);
    transform: translate3d(0, -4px, 0);
  }
}

.bounce {
  -webkit-animation-name: bounce;
  animation-name: bounce;
  -webkit-transform-origin: center bottom;
  transform-origin: center bottom;
}

@-webkit-keyframes flash {
  from, 50%, to {
    opacity: 1;
  }

  25%, 75% {
    opacity: 0;
  }
}

@keyframes flash {
  from, 50%, to {
    opacity: 1;
  }

  25%, 75% {
    opacity: 0;
  }
}

.flash {
  -webkit-animation-name: flash;
  animation-name: flash;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes pulse {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  50% {
    -webkit-transform: scale3d(1.05, 1.05, 1.05);
    transform: scale3d(1.05, 1.05, 1.05);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes pulse {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  50% {
    -webkit-transform: scale3d(1.05, 1.05, 1.05);
    transform: scale3d(1.05, 1.05, 1.05);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.pulse {
  -webkit-animation-name: pulse;
  animation-name: pulse;
}

@-webkit-keyframes rubberBand {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }

  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }

  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }

  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }

  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes rubberBand {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }

  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }

  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }

  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }

  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}

@-webkit-keyframes shake {
  from, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  10%, 30%, 50%, 70%, 90% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  20%, 40%, 60%, 80% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }
}

@keyframes shake {
  from, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  10%, 30%, 50%, 70%, 90% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  20%, 40%, 60%, 80% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }
}

.shake {
  -webkit-animation-name: shake;
  animation-name: shake;
}

@-webkit-keyframes headShake {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }

  6.5% {
    -webkit-transform: translateX(-6px) rotateY(-9deg);
    transform: translateX(-6px) rotateY(-9deg);
  }

  18.5% {
    -webkit-transform: translateX(5px) rotateY(7deg);
    transform: translateX(5px) rotateY(7deg);
  }

  31.5% {
    -webkit-transform: translateX(-3px) rotateY(-5deg);
    transform: translateX(-3px) rotateY(-5deg);
  }

  43.5% {
    -webkit-transform: translateX(2px) rotateY(3deg);
    transform: translateX(2px) rotateY(3deg);
  }

  50% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}

@keyframes headShake {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }

  6.5% {
    -webkit-transform: translateX(-6px) rotateY(-9deg);
    transform: translateX(-6px) rotateY(-9deg);
  }

  18.5% {
    -webkit-transform: translateX(5px) rotateY(7deg);
    transform: translateX(5px) rotateY(7deg);
  }

  31.5% {
    -webkit-transform: translateX(-3px) rotateY(-5deg);
    transform: translateX(-3px) rotateY(-5deg);
  }

  43.5% {
    -webkit-transform: translateX(2px) rotateY(3deg);
    transform: translateX(2px) rotateY(3deg);
  }

  50% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}

.headShake {
  -webkit-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
  -webkit-animation-name: headShake;
  animation-name: headShake;
}

@-webkit-keyframes swing {
  20% {
    -webkit-transform: rotate3d(0, 0, 1, 15deg);
    transform: rotate3d(0, 0, 1, 15deg);
  }

  40% {
    -webkit-transform: rotate3d(0, 0, 1, -10deg);
    transform: rotate3d(0, 0, 1, -10deg);
  }

  60% {
    -webkit-transform: rotate3d(0, 0, 1, 5deg);
    transform: rotate3d(0, 0, 1, 5deg);
  }

  80% {
    -webkit-transform: rotate3d(0, 0, 1, -5deg);
    transform: rotate3d(0, 0, 1, -5deg);
  }

  to {
    -webkit-transform: rotate3d(0, 0, 1, 0deg);
    transform: rotate3d(0, 0, 1, 0deg);
  }
}

@keyframes swing {
  20% {
    -webkit-transform: rotate3d(0, 0, 1, 15deg);
    transform: rotate3d(0, 0, 1, 15deg);
  }

  40% {
    -webkit-transform: rotate3d(0, 0, 1, -10deg);
    transform: rotate3d(0, 0, 1, -10deg);
  }

  60% {
    -webkit-transform: rotate3d(0, 0, 1, 5deg);
    transform: rotate3d(0, 0, 1, 5deg);
  }

  80% {
    -webkit-transform: rotate3d(0, 0, 1, -5deg);
    transform: rotate3d(0, 0, 1, -5deg);
  }

  to {
    -webkit-transform: rotate3d(0, 0, 1, 0deg);
    transform: rotate3d(0, 0, 1, 0deg);
  }
}

.swing {
  -webkit-transform-origin: top center;
  transform-origin: top center;
  -webkit-animation-name: swing;
  animation-name: swing;
}

@-webkit-keyframes tada {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  10%, 20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
  }

  30%, 50%, 70%, 90% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
  }

  40%, 60%, 80% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes tada {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  10%, 20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
  }

  30%, 50%, 70%, 90% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
  }

  40%, 60%, 80% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.tada {
  -webkit-animation-name: tada;
  animation-name: tada;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes wobble {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  15% {
    -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
  }

  30% {
    -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
  }

  45% {
    -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
  }

  60% {
    -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
  }

  75% {
    -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes wobble {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  15% {
    -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
  }

  30% {
    -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
  }

  45% {
    -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
  }

  60% {
    -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
  }

  75% {
    -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.wobble {
  -webkit-animation-name: wobble;
  animation-name: wobble;
}

@-webkit-keyframes jello {
  from, 11.1%, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  22.2% {
    -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
    transform: skewX(-12.5deg) skewY(-12.5deg);
  }

  33.3% {
    -webkit-transform: skewX(6.25deg) skewY(6.25deg);
    transform: skewX(6.25deg) skewY(6.25deg);
  }

  44.4% {
    -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
    transform: skewX(-3.125deg) skewY(-3.125deg);
  }

  55.5% {
    -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
    transform: skewX(1.5625deg) skewY(1.5625deg);
  }

  66.6% {
    -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);
    transform: skewX(-0.78125deg) skewY(-0.78125deg);
  }

  77.7% {
    -webkit-transform: skewX(0.390625deg) skewY(0.390625deg);
    transform: skewX(0.390625deg) skewY(0.390625deg);
  }

  88.8% {
    -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
  }
}

@keyframes jello {
  from, 11.1%, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  22.2% {
    -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
    transform: skewX(-12.5deg) skewY(-12.5deg);
  }

  33.3% {
    -webkit-transform: skewX(6.25deg) skewY(6.25deg);
    transform: skewX(6.25deg) skewY(6.25deg);
  }

  44.4% {
    -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
    transform: skewX(-3.125deg) skewY(-3.125deg);
  }

  55.5% {
    -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
    transform: skewX(1.5625deg) skewY(1.5625deg);
  }

  66.6% {
    -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);
    transform: skewX(-0.78125deg) skewY(-0.78125deg);
  }

  77.7% {
    -webkit-transform: skewX(0.390625deg) skewY(0.390625deg);
    transform: skewX(0.390625deg) skewY(0.390625deg);
  }

  88.8% {
    -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
  }
}

.jello {
  -webkit-animation-name: jello;
  animation-name: jello;
  -webkit-transform-origin: center;
  transform-origin: center;
}

@-webkit-keyframes heartBeat {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  14% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  28% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  42% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  70% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

@keyframes heartBeat {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  14% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  28% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  42% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  70% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

.heartBeat {
  -webkit-animation-name: heartBeat;
  animation-name: heartBeat;
  -webkit-animation-duration: 1.3s;
  animation-duration: 1.3s;
  -webkit-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
}

@-webkit-keyframes bounceIn {
  from, 20%, 40%, 60%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  20% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  40% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(1.03, 1.03, 1.03);
    transform: scale3d(1.03, 1.03, 1.03);
  }

  80% {
    -webkit-transform: scale3d(0.97, 0.97, 0.97);
    transform: scale3d(0.97, 0.97, 0.97);
  }

  to {
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes bounceIn {
  from, 20%, 40%, 60%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  20% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  40% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(1.03, 1.03, 1.03);
    transform: scale3d(1.03, 1.03, 1.03);
  }

  80% {
    -webkit-transform: scale3d(0.97, 0.97, 0.97);
    transform: scale3d(0.97, 0.97, 0.97);
  }

  to {
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.bounceIn {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: bounceIn;
  animation-name: bounceIn;
}

@-webkit-keyframes bounceInDown {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -3000px, 0);
    transform: translate3d(0, -3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, 25px, 0);
    transform: translate3d(0, 25px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, 5px, 0);
    transform: translate3d(0, 5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInDown {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -3000px, 0);
    transform: translate3d(0, -3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, 25px, 0);
    transform: translate3d(0, 25px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, 5px, 0);
    transform: translate3d(0, 5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInDown {
  -webkit-animation-name: bounceInDown;
  animation-name: bounceInDown;
}

@-webkit-keyframes bounceInLeft {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(-3000px, 0, 0);
    transform: translate3d(-3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(25px, 0, 0);
    transform: translate3d(25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(5px, 0, 0);
    transform: translate3d(5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInLeft {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(-3000px, 0, 0);
    transform: translate3d(-3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(25px, 0, 0);
    transform: translate3d(25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(5px, 0, 0);
    transform: translate3d(5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInLeft {
  -webkit-animation-name: bounceInLeft;
  animation-name: bounceInLeft;
}

@-webkit-keyframes bounceInRight {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(3000px, 0, 0);
    transform: translate3d(3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(-25px, 0, 0);
    transform: translate3d(-25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(-5px, 0, 0);
    transform: translate3d(-5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInRight {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(3000px, 0, 0);
    transform: translate3d(3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(-25px, 0, 0);
    transform: translate3d(-25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(-5px, 0, 0);
    transform: translate3d(-5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInRight {
  -webkit-animation-name: bounceInRight;
  animation-name: bounceInRight;
}

@-webkit-keyframes bounceInUp {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 3000px, 0);
    transform: translate3d(0, 3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -5px, 0);
    transform: translate3d(0, -5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInUp {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 3000px, 0);
    transform: translate3d(0, 3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -5px, 0);
    transform: translate3d(0, -5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInUp {
  -webkit-animation-name: bounceInUp;
  animation-name: bounceInUp;
}

@-webkit-keyframes bounceOut {
  20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  50%, 55% {
    opacity: 1;
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
}

@keyframes bounceOut {
  20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  50%, 55% {
    opacity: 1;
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
}

.bounceOut {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: bounceOut;
  animation-name: bounceOut;
}

@-webkit-keyframes bounceOutDown {
  20% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

@keyframes bounceOutDown {
  20% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

.bounceOutDown {
  -webkit-animation-name: bounceOutDown;
  animation-name: bounceOutDown;
}

@-webkit-keyframes bounceOutLeft {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(20px, 0, 0);
    transform: translate3d(20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

@keyframes bounceOutLeft {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(20px, 0, 0);
    transform: translate3d(20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

.bounceOutLeft {
  -webkit-animation-name: bounceOutLeft;
  animation-name: bounceOutLeft;
}

@-webkit-keyframes bounceOutRight {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(-20px, 0, 0);
    transform: translate3d(-20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

@keyframes bounceOutRight {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(-20px, 0, 0);
    transform: translate3d(-20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

.bounceOutRight {
  -webkit-animation-name: bounceOutRight;
  animation-name: bounceOutRight;
}

@-webkit-keyframes bounceOutUp {
  20% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, 20px, 0);
    transform: translate3d(0, 20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

@keyframes bounceOutUp {
  20% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, 20px, 0);
    transform: translate3d(0, 20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

.bounceOutUp {
  -webkit-animation-name: bounceOutUp;
  animation-name: bounceOutUp;
}

@-webkit-keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}

@-webkit-keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
}

@-webkit-keyframes fadeInDownBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInDownBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInDownBig {
  -webkit-animation-name: fadeInDownBig;
  animation-name: fadeInDownBig;
}

@-webkit-keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInLeft {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft;
}

@-webkit-keyframes fadeInLeftBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInLeftBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInLeftBig {
  -webkit-animation-name: fadeInLeftBig;
  animation-name: fadeInLeftBig;
}

@-webkit-keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInRight {
  -webkit-animation-name: fadeInRight;
  animation-name: fadeInRight;
}

@-webkit-keyframes fadeInRightBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInRightBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInRightBig {
  -webkit-animation-name: fadeInRightBig;
  animation-name: fadeInRightBig;
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

@-webkit-keyframes fadeInUpBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUpBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInUpBig {
  -webkit-animation-name: fadeInUpBig;
  animation-name: fadeInUpBig;
}

@-webkit-keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}

@keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}

.fadeOut {
  -webkit-animation-name: fadeOut;
  animation-name: fadeOut;
}

@-webkit-keyframes fadeOutDown {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

@keyframes fadeOutDown {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

.fadeOutDown {
  -webkit-animation-name: fadeOutDown;
  animation-name: fadeOutDown;
}

@-webkit-keyframes fadeOutDownBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

@keyframes fadeOutDownBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

.fadeOutDownBig {
  -webkit-animation-name: fadeOutDownBig;
  animation-name: fadeOutDownBig;
}

@-webkit-keyframes fadeOutLeft {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

@keyframes fadeOutLeft {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

.fadeOutLeft {
  -webkit-animation-name: fadeOutLeft;
  animation-name: fadeOutLeft;
}

@-webkit-keyframes fadeOutLeftBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

@keyframes fadeOutLeftBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

.fadeOutLeftBig {
  -webkit-animation-name: fadeOutLeftBig;
  animation-name: fadeOutLeftBig;
}

@-webkit-keyframes fadeOutRight {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

@keyframes fadeOutRight {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

.fadeOutRight {
  -webkit-animation-name: fadeOutRight;
  animation-name: fadeOutRight;
}

@-webkit-keyframes fadeOutRightBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

@keyframes fadeOutRightBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

.fadeOutRightBig {
  -webkit-animation-name: fadeOutRightBig;
  animation-name: fadeOutRightBig;
}

@-webkit-keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

@keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

.fadeOutUp {
  -webkit-animation-name: fadeOutUp;
  animation-name: fadeOutUp;
}

@-webkit-keyframes fadeOutUpBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

@keyframes fadeOutUpBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

.fadeOutUpBig {
  -webkit-animation-name: fadeOutUpBig;
  animation-name: fadeOutUpBig;
}

@-webkit-keyframes flip {
  from {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  40% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  50% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  80% {
    -webkit-transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  to {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
}

@keyframes flip {
  from {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  40% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  50% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  80% {
    -webkit-transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  to {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
}

.animated.flip {
  -webkit-backface-visibility: visible;
  backface-visibility: visible;
  -webkit-animation-name: flip;
  animation-name: flip;
}

@-webkit-keyframes flipInX {
  from {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

@keyframes flipInX {
  from {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

.flipInX {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInX;
  animation-name: flipInX;
}

@-webkit-keyframes flipInY {
  from {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

@keyframes flipInY {
  from {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

.flipInY {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInY;
  animation-name: flipInY;
}

@-webkit-keyframes flipOutX {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    opacity: 0;
  }
}

@keyframes flipOutX {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    opacity: 0;
  }
}

.flipOutX {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: flipOutX;
  animation-name: flipOutX;
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
}

@-webkit-keyframes flipOutY {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    opacity: 0;
  }
}

@keyframes flipOutY {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    opacity: 0;
  }
}

.flipOutY {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipOutY;
  animation-name: flipOutY;
}

@-webkit-keyframes lightSpeedIn {
  from {
    -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);
    transform: translate3d(100%, 0, 0) skewX(-30deg);
    opacity: 0;
  }

  60% {
    -webkit-transform: skewX(20deg);
    transform: skewX(20deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: skewX(-5deg);
    transform: skewX(-5deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes lightSpeedIn {
  from {
    -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);
    transform: translate3d(100%, 0, 0) skewX(-30deg);
    opacity: 0;
  }

  60% {
    -webkit-transform: skewX(20deg);
    transform: skewX(20deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: skewX(-5deg);
    transform: skewX(-5deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.lightSpeedIn {
  -webkit-animation-name: lightSpeedIn;
  animation-name: lightSpeedIn;
  -webkit-animation-timing-function: ease-out;
  animation-timing-function: ease-out;
}

@-webkit-keyframes lightSpeedOut {
  from {
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);
    transform: translate3d(100%, 0, 0) skewX(30deg);
    opacity: 0;
  }
}

@keyframes lightSpeedOut {
  from {
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);
    transform: translate3d(100%, 0, 0) skewX(30deg);
    opacity: 0;
  }
}

.lightSpeedOut {
  -webkit-animation-name: lightSpeedOut;
  animation-name: lightSpeedOut;
  -webkit-animation-timing-function: ease-in;
  animation-timing-function: ease-in;
}

@-webkit-keyframes rotateIn {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, -200deg);
    transform: rotate3d(0, 0, 1, -200deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateIn {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, -200deg);
    transform: rotate3d(0, 0, 1, -200deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateIn {
  -webkit-animation-name: rotateIn;
  animation-name: rotateIn;
}

@-webkit-keyframes rotateInDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInDownLeft {
  -webkit-animation-name: rotateInDownLeft;
  animation-name: rotateInDownLeft;
}

@-webkit-keyframes rotateInDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInDownRight {
  -webkit-animation-name: rotateInDownRight;
  animation-name: rotateInDownRight;
}

@-webkit-keyframes rotateInUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInUpLeft {
  -webkit-animation-name: rotateInUpLeft;
  animation-name: rotateInUpLeft;
}

@-webkit-keyframes rotateInUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -90deg);
    transform: rotate3d(0, 0, 1, -90deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -90deg);
    transform: rotate3d(0, 0, 1, -90deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInUpRight {
  -webkit-animation-name: rotateInUpRight;
  animation-name: rotateInUpRight;
}

@-webkit-keyframes rotateOut {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, 200deg);
    transform: rotate3d(0, 0, 1, 200deg);
    opacity: 0;
  }
}

@keyframes rotateOut {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, 200deg);
    transform: rotate3d(0, 0, 1, 200deg);
    opacity: 0;
  }
}

.rotateOut {
  -webkit-animation-name: rotateOut;
  animation-name: rotateOut;
}

@-webkit-keyframes rotateOutDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }
}

@keyframes rotateOutDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }
}

.rotateOutDownLeft {
  -webkit-animation-name: rotateOutDownLeft;
  animation-name: rotateOutDownLeft;
}

@-webkit-keyframes rotateOutDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

@keyframes rotateOutDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

.rotateOutDownRight {
  -webkit-animation-name: rotateOutDownRight;
  animation-name: rotateOutDownRight;
}

@-webkit-keyframes rotateOutUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

@keyframes rotateOutUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

.rotateOutUpLeft {
  -webkit-animation-name: rotateOutUpLeft;
  animation-name: rotateOutUpLeft;
}

@-webkit-keyframes rotateOutUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 90deg);
    transform: rotate3d(0, 0, 1, 90deg);
    opacity: 0;
  }
}

@keyframes rotateOutUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 90deg);
    transform: rotate3d(0, 0, 1, 90deg);
    opacity: 0;
  }
}

.rotateOutUpRight {
  -webkit-animation-name: rotateOutUpRight;
  animation-name: rotateOutUpRight;
}

@-webkit-keyframes hinge {
  0% {
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  20%, 60% {
    -webkit-transform: rotate3d(0, 0, 1, 80deg);
    transform: rotate3d(0, 0, 1, 80deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  40%, 80% {
    -webkit-transform: rotate3d(0, 0, 1, 60deg);
    transform: rotate3d(0, 0, 1, 60deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(0, 700px, 0);
    transform: translate3d(0, 700px, 0);
    opacity: 0;
  }
}

@keyframes hinge {
  0% {
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  20%, 60% {
    -webkit-transform: rotate3d(0, 0, 1, 80deg);
    transform: rotate3d(0, 0, 1, 80deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  40%, 80% {
    -webkit-transform: rotate3d(0, 0, 1, 60deg);
    transform: rotate3d(0, 0, 1, 60deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(0, 700px, 0);
    transform: translate3d(0, 700px, 0);
    opacity: 0;
  }
}

.hinge {
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
  -webkit-animation-name: hinge;
  animation-name: hinge;
}

@-webkit-keyframes jackInTheBox {
  from {
    opacity: 0;
    -webkit-transform: scale(0.1) rotate(30deg);
    transform: scale(0.1) rotate(30deg);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
  }

  50% {
    -webkit-transform: rotate(-10deg);
    transform: rotate(-10deg);
  }

  70% {
    -webkit-transform: rotate(3deg);
    transform: rotate(3deg);
  }

  to {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

@keyframes jackInTheBox {
  from {
    opacity: 0;
    -webkit-transform: scale(0.1) rotate(30deg);
    transform: scale(0.1) rotate(30deg);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
  }

  50% {
    -webkit-transform: rotate(-10deg);
    transform: rotate(-10deg);
  }

  70% {
    -webkit-transform: rotate(3deg);
    transform: rotate(3deg);
  }

  to {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

.jackInTheBox {
  -webkit-animation-name: jackInTheBox;
  animation-name: jackInTheBox;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes rollIn {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes rollIn {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.rollIn {
  -webkit-animation-name: rollIn;
  animation-name: rollIn;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes rollOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
  }
}

@keyframes rollOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
  }
}

.rollOut {
  -webkit-animation-name: rollOut;
  animation-name: rollOut;
}

@-webkit-keyframes zoomIn {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  50% {
    opacity: 1;
  }
}

@keyframes zoomIn {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  50% {
    opacity: 1;
  }
}

.zoomIn {
  -webkit-animation-name: zoomIn;
  animation-name: zoomIn;
}

@-webkit-keyframes zoomInDown {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInDown {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInDown {
  -webkit-animation-name: zoomInDown;
  animation-name: zoomInDown;
}

@-webkit-keyframes zoomInLeft {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInLeft {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInLeft {
  -webkit-animation-name: zoomInLeft;
  animation-name: zoomInLeft;
}

@-webkit-keyframes zoomInRight {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInRight {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInRight {
  -webkit-animation-name: zoomInRight;
  animation-name: zoomInRight;
}

@-webkit-keyframes zoomInUp {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInUp {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInUp {
  -webkit-animation-name: zoomInUp;
  animation-name: zoomInUp;
}

@-webkit-keyframes zoomOut {
  from {
    opacity: 1;
  }

  50% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  to {
    opacity: 0;
  }
}

@keyframes zoomOut {
  from {
    opacity: 1;
  }

  50% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  to {
    opacity: 0;
  }
}

.zoomOut {
  -webkit-animation-name: zoomOut;
  animation-name: zoomOut;
}

@-webkit-keyframes zoomOutDown {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomOutDown {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomOutDown {
  -webkit-animation-name: zoomOutDown;
  animation-name: zoomOutDown;
}

@-webkit-keyframes zoomOutLeft {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(-2000px, 0, 0);
    transform: scale(0.1) translate3d(-2000px, 0, 0);
    -webkit-transform-origin: left center;
    transform-origin: left center;
  }
}

@keyframes zoomOutLeft {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(-2000px, 0, 0);
    transform: scale(0.1) translate3d(-2000px, 0, 0);
    -webkit-transform-origin: left center;
    transform-origin: left center;
  }
}

.zoomOutLeft {
  -webkit-animation-name: zoomOutLeft;
  animation-name: zoomOutLeft;
}

@-webkit-keyframes zoomOutRight {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(2000px, 0, 0);
    transform: scale(0.1) translate3d(2000px, 0, 0);
    -webkit-transform-origin: right center;
    transform-origin: right center;
  }
}

@keyframes zoomOutRight {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(2000px, 0, 0);
    transform: scale(0.1) translate3d(2000px, 0, 0);
    -webkit-transform-origin: right center;
    transform-origin: right center;
  }
}

.zoomOutRight {
  -webkit-animation-name: zoomOutRight;
  animation-name: zoomOutRight;
}

@-webkit-keyframes zoomOutUp {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomOutUp {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomOutUp {
  -webkit-animation-name: zoomOutUp;
  animation-name: zoomOutUp;
}

@-webkit-keyframes slideInDown {
  from {
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInDown {
  from {
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInDown {
  -webkit-animation-name: slideInDown;
  animation-name: slideInDown;
}

@-webkit-keyframes slideInLeft {
  from {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInLeft {
  from {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInLeft {
  -webkit-animation-name: slideInLeft;
  animation-name: slideInLeft;
}

@-webkit-keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInRight {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight;
}

@-webkit-keyframes slideInUp {
  from {
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInUp {
  from {
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInUp {
  -webkit-animation-name: slideInUp;
  animation-name: slideInUp;
}

@-webkit-keyframes slideOutDown {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

@keyframes slideOutDown {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

.slideOutDown {
  -webkit-animation-name: slideOutDown;
  animation-name: slideOutDown;
}

@-webkit-keyframes slideOutLeft {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

@keyframes slideOutLeft {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

.slideOutLeft {
  -webkit-animation-name: slideOutLeft;
  animation-name: slideOutLeft;
}

@-webkit-keyframes slideOutRight {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

@keyframes slideOutRight {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

.slideOutRight {
  -webkit-animation-name: slideOutRight;
  animation-name: slideOutRight;
}

@-webkit-keyframes slideOutUp {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

@keyframes slideOutUp {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

.slideOutUp {
  -webkit-animation-name: slideOutUp;
  animation-name: slideOutUp;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

.animated.infinite {
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
}

.animated.delay-1s {
  -webkit-animation-delay: 1s;
  animation-delay: 1s;
}

.animated.delay-2s {
  -webkit-animation-delay: 2s;
  animation-delay: 2s;
}

.animated.delay-3s {
  -webkit-animation-delay: 3s;
  animation-delay: 3s;
}

.animated.delay-4s {
  -webkit-animation-delay: 4s;
  animation-delay: 4s;
}

.animated.delay-5s {
  -webkit-animation-delay: 5s;
  animation-delay: 5s;
}

.animated.fast {
  -webkit-animation-duration: 800ms;
  animation-duration: 800ms;
}

.animated.faster {
  -webkit-animation-duration: 500ms;
  animation-duration: 500ms;
}

.animated.slow {
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
}

.animated.slower {
  -webkit-animation-duration: 3s;
  animation-duration: 3s;
}

@media (prefers-reduced-motion) {
  .animated {
    -webkit-animation: unset !important;
    animation: unset !important;
    -webkit-transition: none !important;
    transition: none !important;
  }
}

/* Slider */

.slick-slider {
  position: relative;
  display: block;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -ms-touch-action: pan-y;
  touch-action: pan-y;
  -webkit-tap-highlight-color: transparent;
}

.slick-list {
  position: relative;
  overflow: hidden;
  display: block;
  margin: 0;
  padding: 0;
}

.slick-list:focus {
  outline: none;
}

.slick-list.dragging {
  cursor: pointer;
  cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.slick-track {
  position: relative;
  left: 0;
  top: 0;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.slick-track:before,
.slick-track:after {
  content: "";
  display: table;
}

.slick-track:after {
  clear: both;
}

.slick-loading .slick-track {
  visibility: hidden;
}

.slick-slide {
  float: left;
  height: 100%;
  min-height: 1px;
  display: none;
}

[dir="rtl"] .slick-slide {
  float: right;
}

.slick-slide img {
  display: block;
}

.slick-slide.slick-loading img {
  display: none;
}

.slick-slide.dragging img {
  pointer-events: none;
}

.slick-initialized .slick-slide {
  display: block;
}

.slick-loading .slick-slide {
  visibility: hidden;
}

.slick-vertical .slick-slide {
  display: block;
  height: auto;
  border: 1px solid transparent;
}

.slick-arrow.slick-hidden {
  display: none;
}

/* Slider */

.slick-loading .slick-list {
  background: #fff url(../images/vendor/slick-carousel/slick/ajax-loader.gif?c5cd7f5300576ab4c88202b42f6ded62) center center no-repeat;
}

/* Icons */

@font-face {
  font-family: "slick";
  src: url(../fonts/vendor/slick-carousel/slick/slick.eot?ced611daf7709cc778da928fec876475);
  src: url(../fonts/vendor/slick-carousel/slick/slick.eot?ced611daf7709cc778da928fec876475) format("embedded-opentype"), url(../fonts/vendor/slick-carousel/slick/slick.woff?b7c9e1e479de3b53f1e4e30ebac2403a) format("woff"), url(../fonts/vendor/slick-carousel/slick/slick.ttf?d41f55a78e6f49a5512878df1737e58a) format("truetype"), url(../fonts/vendor/slick-carousel/slick/slick.svg?f97e3bbf73254b0112091d0192f17aec) format("svg");
  font-weight: normal;
  font-style: normal;
}

/* Arrows */

.slick-prev,
.slick-next {
  position: absolute;
  display: block;
  height: 20px;
  width: 20px;
  line-height: 0px;
  font-size: 0px;
  cursor: pointer;
  background: transparent;
  color: transparent;
  top: 50%;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  padding: 0;
  border: none;
  outline: none;
}

.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus {
  outline: none;
  background: transparent;
  color: transparent;
}

.slick-prev:hover:before,
.slick-prev:focus:before,
.slick-next:hover:before,
.slick-next:focus:before {
  opacity: 1;
}

.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before {
  opacity: 0.25;
}

.slick-prev:before,
.slick-next:before {
  font-family: "slick";
  font-size: 20px;
  line-height: 1;
  color: white;
  opacity: 0.75;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.slick-prev {
  left: -25px;
}

[dir="rtl"] .slick-prev {
  left: auto;
  right: -25px;
}

.slick-prev:before {
  content: "\2190";
}

[dir="rtl"] .slick-prev:before {
  content: "\2192";
}

.slick-next {
  right: -25px;
}

[dir="rtl"] .slick-next {
  left: -25px;
  right: auto;
}

.slick-next:before {
  content: "\2192";
}

[dir="rtl"] .slick-next:before {
  content: "\2190";
}

/* Dots */

.slick-dotted.slick-slider {
  margin-bottom: 30px;
}

.slick-dots {
  position: absolute;
  bottom: -25px;
  list-style: none;
  display: block;
  text-align: center;
  padding: 0;
  margin: 0;
  width: 100%;
}

.slick-dots li {
  position: relative;
  display: inline-block;
  height: 20px;
  width: 20px;
  margin: 0 5px;
  padding: 0;
  cursor: pointer;
}

.slick-dots li button {
  border: 0;
  background: transparent;
  display: block;
  height: 20px;
  width: 20px;
  outline: none;
  line-height: 0px;
  font-size: 0px;
  color: transparent;
  padding: 5px;
  cursor: pointer;
}

.slick-dots li button:hover,
.slick-dots li button:focus {
  outline: none;
}

.slick-dots li button:hover:before,
.slick-dots li button:focus:before {
  opacity: 1;
}

.slick-dots li button:before {
  position: absolute;
  top: 0;
  left: 0;
  content: "\2022";
  width: 20px;
  height: 20px;
  font-family: "slick";
  font-size: 6px;
  line-height: 20px;
  text-align: center;
  color: black;
  opacity: 0.25;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.slick-dots li.slick-active button:before {
  color: black;
  opacity: 0.75;
}

body[data-aos-duration='50'] [data-aos],
[data-aos][data-aos][data-aos-duration='50'] {
  -webkit-transition-duration: 50ms;
          transition-duration: 50ms;
}

body[data-aos-delay='50'] [data-aos],
[data-aos][data-aos][data-aos-delay='50'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='50'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='50'].aos-animate {
  -webkit-transition-delay: 50ms;
          transition-delay: 50ms;
}

body[data-aos-duration='100'] [data-aos],
[data-aos][data-aos][data-aos-duration='100'] {
  -webkit-transition-duration: 100ms;
          transition-duration: 100ms;
}

body[data-aos-delay='100'] [data-aos],
[data-aos][data-aos][data-aos-delay='100'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='100'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='100'].aos-animate {
  -webkit-transition-delay: 100ms;
          transition-delay: 100ms;
}

body[data-aos-duration='150'] [data-aos],
[data-aos][data-aos][data-aos-duration='150'] {
  -webkit-transition-duration: 150ms;
          transition-duration: 150ms;
}

body[data-aos-delay='150'] [data-aos],
[data-aos][data-aos][data-aos-delay='150'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='150'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='150'].aos-animate {
  -webkit-transition-delay: 150ms;
          transition-delay: 150ms;
}

body[data-aos-duration='200'] [data-aos],
[data-aos][data-aos][data-aos-duration='200'] {
  -webkit-transition-duration: 200ms;
          transition-duration: 200ms;
}

body[data-aos-delay='200'] [data-aos],
[data-aos][data-aos][data-aos-delay='200'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='200'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='200'].aos-animate {
  -webkit-transition-delay: 200ms;
          transition-delay: 200ms;
}

body[data-aos-duration='250'] [data-aos],
[data-aos][data-aos][data-aos-duration='250'] {
  -webkit-transition-duration: 250ms;
          transition-duration: 250ms;
}

body[data-aos-delay='250'] [data-aos],
[data-aos][data-aos][data-aos-delay='250'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='250'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='250'].aos-animate {
  -webkit-transition-delay: 250ms;
          transition-delay: 250ms;
}

body[data-aos-duration='300'] [data-aos],
[data-aos][data-aos][data-aos-duration='300'] {
  -webkit-transition-duration: 300ms;
          transition-duration: 300ms;
}

body[data-aos-delay='300'] [data-aos],
[data-aos][data-aos][data-aos-delay='300'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='300'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='300'].aos-animate {
  -webkit-transition-delay: 300ms;
          transition-delay: 300ms;
}

body[data-aos-duration='350'] [data-aos],
[data-aos][data-aos][data-aos-duration='350'] {
  -webkit-transition-duration: 350ms;
          transition-duration: 350ms;
}

body[data-aos-delay='350'] [data-aos],
[data-aos][data-aos][data-aos-delay='350'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='350'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='350'].aos-animate {
  -webkit-transition-delay: 350ms;
          transition-delay: 350ms;
}

body[data-aos-duration='400'] [data-aos],
[data-aos][data-aos][data-aos-duration='400'] {
  -webkit-transition-duration: 400ms;
          transition-duration: 400ms;
}

body[data-aos-delay='400'] [data-aos],
[data-aos][data-aos][data-aos-delay='400'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='400'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='400'].aos-animate {
  -webkit-transition-delay: 400ms;
          transition-delay: 400ms;
}

body[data-aos-duration='450'] [data-aos],
[data-aos][data-aos][data-aos-duration='450'] {
  -webkit-transition-duration: 450ms;
          transition-duration: 450ms;
}

body[data-aos-delay='450'] [data-aos],
[data-aos][data-aos][data-aos-delay='450'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='450'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='450'].aos-animate {
  -webkit-transition-delay: 450ms;
          transition-delay: 450ms;
}

body[data-aos-duration='500'] [data-aos],
[data-aos][data-aos][data-aos-duration='500'] {
  -webkit-transition-duration: 500ms;
          transition-duration: 500ms;
}

body[data-aos-delay='500'] [data-aos],
[data-aos][data-aos][data-aos-delay='500'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='500'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='500'].aos-animate {
  -webkit-transition-delay: 500ms;
          transition-delay: 500ms;
}

body[data-aos-duration='550'] [data-aos],
[data-aos][data-aos][data-aos-duration='550'] {
  -webkit-transition-duration: 550ms;
          transition-duration: 550ms;
}

body[data-aos-delay='550'] [data-aos],
[data-aos][data-aos][data-aos-delay='550'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='550'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='550'].aos-animate {
  -webkit-transition-delay: 550ms;
          transition-delay: 550ms;
}

body[data-aos-duration='600'] [data-aos],
[data-aos][data-aos][data-aos-duration='600'] {
  -webkit-transition-duration: 600ms;
          transition-duration: 600ms;
}

body[data-aos-delay='600'] [data-aos],
[data-aos][data-aos][data-aos-delay='600'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='600'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='600'].aos-animate {
  -webkit-transition-delay: 600ms;
          transition-delay: 600ms;
}

body[data-aos-duration='650'] [data-aos],
[data-aos][data-aos][data-aos-duration='650'] {
  -webkit-transition-duration: 650ms;
          transition-duration: 650ms;
}

body[data-aos-delay='650'] [data-aos],
[data-aos][data-aos][data-aos-delay='650'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='650'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='650'].aos-animate {
  -webkit-transition-delay: 650ms;
          transition-delay: 650ms;
}

body[data-aos-duration='700'] [data-aos],
[data-aos][data-aos][data-aos-duration='700'] {
  -webkit-transition-duration: 700ms;
          transition-duration: 700ms;
}

body[data-aos-delay='700'] [data-aos],
[data-aos][data-aos][data-aos-delay='700'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='700'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='700'].aos-animate {
  -webkit-transition-delay: 700ms;
          transition-delay: 700ms;
}

body[data-aos-duration='750'] [data-aos],
[data-aos][data-aos][data-aos-duration='750'] {
  -webkit-transition-duration: 750ms;
          transition-duration: 750ms;
}

body[data-aos-delay='750'] [data-aos],
[data-aos][data-aos][data-aos-delay='750'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='750'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='750'].aos-animate {
  -webkit-transition-delay: 750ms;
          transition-delay: 750ms;
}

body[data-aos-duration='800'] [data-aos],
[data-aos][data-aos][data-aos-duration='800'] {
  -webkit-transition-duration: 800ms;
          transition-duration: 800ms;
}

body[data-aos-delay='800'] [data-aos],
[data-aos][data-aos][data-aos-delay='800'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='800'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='800'].aos-animate {
  -webkit-transition-delay: 800ms;
          transition-delay: 800ms;
}

body[data-aos-duration='850'] [data-aos],
[data-aos][data-aos][data-aos-duration='850'] {
  -webkit-transition-duration: 850ms;
          transition-duration: 850ms;
}

body[data-aos-delay='850'] [data-aos],
[data-aos][data-aos][data-aos-delay='850'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='850'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='850'].aos-animate {
  -webkit-transition-delay: 850ms;
          transition-delay: 850ms;
}

body[data-aos-duration='900'] [data-aos],
[data-aos][data-aos][data-aos-duration='900'] {
  -webkit-transition-duration: 900ms;
          transition-duration: 900ms;
}

body[data-aos-delay='900'] [data-aos],
[data-aos][data-aos][data-aos-delay='900'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='900'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='900'].aos-animate {
  -webkit-transition-delay: 900ms;
          transition-delay: 900ms;
}

body[data-aos-duration='950'] [data-aos],
[data-aos][data-aos][data-aos-duration='950'] {
  -webkit-transition-duration: 950ms;
          transition-duration: 950ms;
}

body[data-aos-delay='950'] [data-aos],
[data-aos][data-aos][data-aos-delay='950'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='950'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='950'].aos-animate {
  -webkit-transition-delay: 950ms;
          transition-delay: 950ms;
}

body[data-aos-duration='1000'] [data-aos],
[data-aos][data-aos][data-aos-duration='1000'] {
  -webkit-transition-duration: 1000ms;
          transition-duration: 1000ms;
}

body[data-aos-delay='1000'] [data-aos],
[data-aos][data-aos][data-aos-delay='1000'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1000'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1000'].aos-animate {
  -webkit-transition-delay: 1000ms;
          transition-delay: 1000ms;
}

body[data-aos-duration='1050'] [data-aos],
[data-aos][data-aos][data-aos-duration='1050'] {
  -webkit-transition-duration: 1050ms;
          transition-duration: 1050ms;
}

body[data-aos-delay='1050'] [data-aos],
[data-aos][data-aos][data-aos-delay='1050'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1050'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1050'].aos-animate {
  -webkit-transition-delay: 1050ms;
          transition-delay: 1050ms;
}

body[data-aos-duration='1100'] [data-aos],
[data-aos][data-aos][data-aos-duration='1100'] {
  -webkit-transition-duration: 1100ms;
          transition-duration: 1100ms;
}

body[data-aos-delay='1100'] [data-aos],
[data-aos][data-aos][data-aos-delay='1100'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1100'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1100'].aos-animate {
  -webkit-transition-delay: 1100ms;
          transition-delay: 1100ms;
}

body[data-aos-duration='1150'] [data-aos],
[data-aos][data-aos][data-aos-duration='1150'] {
  -webkit-transition-duration: 1150ms;
          transition-duration: 1150ms;
}

body[data-aos-delay='1150'] [data-aos],
[data-aos][data-aos][data-aos-delay='1150'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1150'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1150'].aos-animate {
  -webkit-transition-delay: 1150ms;
          transition-delay: 1150ms;
}

body[data-aos-duration='1200'] [data-aos],
[data-aos][data-aos][data-aos-duration='1200'] {
  -webkit-transition-duration: 1200ms;
          transition-duration: 1200ms;
}

body[data-aos-delay='1200'] [data-aos],
[data-aos][data-aos][data-aos-delay='1200'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1200'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1200'].aos-animate {
  -webkit-transition-delay: 1200ms;
          transition-delay: 1200ms;
}

body[data-aos-duration='1250'] [data-aos],
[data-aos][data-aos][data-aos-duration='1250'] {
  -webkit-transition-duration: 1250ms;
          transition-duration: 1250ms;
}

body[data-aos-delay='1250'] [data-aos],
[data-aos][data-aos][data-aos-delay='1250'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1250'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1250'].aos-animate {
  -webkit-transition-delay: 1250ms;
          transition-delay: 1250ms;
}

body[data-aos-duration='1300'] [data-aos],
[data-aos][data-aos][data-aos-duration='1300'] {
  -webkit-transition-duration: 1300ms;
          transition-duration: 1300ms;
}

body[data-aos-delay='1300'] [data-aos],
[data-aos][data-aos][data-aos-delay='1300'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1300'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1300'].aos-animate {
  -webkit-transition-delay: 1300ms;
          transition-delay: 1300ms;
}

body[data-aos-duration='1350'] [data-aos],
[data-aos][data-aos][data-aos-duration='1350'] {
  -webkit-transition-duration: 1350ms;
          transition-duration: 1350ms;
}

body[data-aos-delay='1350'] [data-aos],
[data-aos][data-aos][data-aos-delay='1350'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1350'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1350'].aos-animate {
  -webkit-transition-delay: 1350ms;
          transition-delay: 1350ms;
}

body[data-aos-duration='1400'] [data-aos],
[data-aos][data-aos][data-aos-duration='1400'] {
  -webkit-transition-duration: 1400ms;
          transition-duration: 1400ms;
}

body[data-aos-delay='1400'] [data-aos],
[data-aos][data-aos][data-aos-delay='1400'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1400'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1400'].aos-animate {
  -webkit-transition-delay: 1400ms;
          transition-delay: 1400ms;
}

body[data-aos-duration='1450'] [data-aos],
[data-aos][data-aos][data-aos-duration='1450'] {
  -webkit-transition-duration: 1450ms;
          transition-duration: 1450ms;
}

body[data-aos-delay='1450'] [data-aos],
[data-aos][data-aos][data-aos-delay='1450'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1450'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1450'].aos-animate {
  -webkit-transition-delay: 1450ms;
          transition-delay: 1450ms;
}

body[data-aos-duration='1500'] [data-aos],
[data-aos][data-aos][data-aos-duration='1500'] {
  -webkit-transition-duration: 1500ms;
          transition-duration: 1500ms;
}

body[data-aos-delay='1500'] [data-aos],
[data-aos][data-aos][data-aos-delay='1500'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1500'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1500'].aos-animate {
  -webkit-transition-delay: 1500ms;
          transition-delay: 1500ms;
}

body[data-aos-duration='1550'] [data-aos],
[data-aos][data-aos][data-aos-duration='1550'] {
  -webkit-transition-duration: 1550ms;
          transition-duration: 1550ms;
}

body[data-aos-delay='1550'] [data-aos],
[data-aos][data-aos][data-aos-delay='1550'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1550'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1550'].aos-animate {
  -webkit-transition-delay: 1550ms;
          transition-delay: 1550ms;
}

body[data-aos-duration='1600'] [data-aos],
[data-aos][data-aos][data-aos-duration='1600'] {
  -webkit-transition-duration: 1600ms;
          transition-duration: 1600ms;
}

body[data-aos-delay='1600'] [data-aos],
[data-aos][data-aos][data-aos-delay='1600'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1600'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1600'].aos-animate {
  -webkit-transition-delay: 1600ms;
          transition-delay: 1600ms;
}

body[data-aos-duration='1650'] [data-aos],
[data-aos][data-aos][data-aos-duration='1650'] {
  -webkit-transition-duration: 1650ms;
          transition-duration: 1650ms;
}

body[data-aos-delay='1650'] [data-aos],
[data-aos][data-aos][data-aos-delay='1650'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1650'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1650'].aos-animate {
  -webkit-transition-delay: 1650ms;
          transition-delay: 1650ms;
}

body[data-aos-duration='1700'] [data-aos],
[data-aos][data-aos][data-aos-duration='1700'] {
  -webkit-transition-duration: 1700ms;
          transition-duration: 1700ms;
}

body[data-aos-delay='1700'] [data-aos],
[data-aos][data-aos][data-aos-delay='1700'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1700'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1700'].aos-animate {
  -webkit-transition-delay: 1700ms;
          transition-delay: 1700ms;
}

body[data-aos-duration='1750'] [data-aos],
[data-aos][data-aos][data-aos-duration='1750'] {
  -webkit-transition-duration: 1750ms;
          transition-duration: 1750ms;
}

body[data-aos-delay='1750'] [data-aos],
[data-aos][data-aos][data-aos-delay='1750'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1750'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1750'].aos-animate {
  -webkit-transition-delay: 1750ms;
          transition-delay: 1750ms;
}

body[data-aos-duration='1800'] [data-aos],
[data-aos][data-aos][data-aos-duration='1800'] {
  -webkit-transition-duration: 1800ms;
          transition-duration: 1800ms;
}

body[data-aos-delay='1800'] [data-aos],
[data-aos][data-aos][data-aos-delay='1800'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1800'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1800'].aos-animate {
  -webkit-transition-delay: 1800ms;
          transition-delay: 1800ms;
}

body[data-aos-duration='1850'] [data-aos],
[data-aos][data-aos][data-aos-duration='1850'] {
  -webkit-transition-duration: 1850ms;
          transition-duration: 1850ms;
}

body[data-aos-delay='1850'] [data-aos],
[data-aos][data-aos][data-aos-delay='1850'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1850'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1850'].aos-animate {
  -webkit-transition-delay: 1850ms;
          transition-delay: 1850ms;
}

body[data-aos-duration='1900'] [data-aos],
[data-aos][data-aos][data-aos-duration='1900'] {
  -webkit-transition-duration: 1900ms;
          transition-duration: 1900ms;
}

body[data-aos-delay='1900'] [data-aos],
[data-aos][data-aos][data-aos-delay='1900'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1900'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1900'].aos-animate {
  -webkit-transition-delay: 1900ms;
          transition-delay: 1900ms;
}

body[data-aos-duration='1950'] [data-aos],
[data-aos][data-aos][data-aos-duration='1950'] {
  -webkit-transition-duration: 1950ms;
          transition-duration: 1950ms;
}

body[data-aos-delay='1950'] [data-aos],
[data-aos][data-aos][data-aos-delay='1950'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='1950'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='1950'].aos-animate {
  -webkit-transition-delay: 1950ms;
          transition-delay: 1950ms;
}

body[data-aos-duration='2000'] [data-aos],
[data-aos][data-aos][data-aos-duration='2000'] {
  -webkit-transition-duration: 2000ms;
          transition-duration: 2000ms;
}

body[data-aos-delay='2000'] [data-aos],
[data-aos][data-aos][data-aos-delay='2000'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2000'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2000'].aos-animate {
  -webkit-transition-delay: 2000ms;
          transition-delay: 2000ms;
}

body[data-aos-duration='2050'] [data-aos],
[data-aos][data-aos][data-aos-duration='2050'] {
  -webkit-transition-duration: 2050ms;
          transition-duration: 2050ms;
}

body[data-aos-delay='2050'] [data-aos],
[data-aos][data-aos][data-aos-delay='2050'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2050'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2050'].aos-animate {
  -webkit-transition-delay: 2050ms;
          transition-delay: 2050ms;
}

body[data-aos-duration='2100'] [data-aos],
[data-aos][data-aos][data-aos-duration='2100'] {
  -webkit-transition-duration: 2100ms;
          transition-duration: 2100ms;
}

body[data-aos-delay='2100'] [data-aos],
[data-aos][data-aos][data-aos-delay='2100'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2100'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2100'].aos-animate {
  -webkit-transition-delay: 2100ms;
          transition-delay: 2100ms;
}

body[data-aos-duration='2150'] [data-aos],
[data-aos][data-aos][data-aos-duration='2150'] {
  -webkit-transition-duration: 2150ms;
          transition-duration: 2150ms;
}

body[data-aos-delay='2150'] [data-aos],
[data-aos][data-aos][data-aos-delay='2150'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2150'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2150'].aos-animate {
  -webkit-transition-delay: 2150ms;
          transition-delay: 2150ms;
}

body[data-aos-duration='2200'] [data-aos],
[data-aos][data-aos][data-aos-duration='2200'] {
  -webkit-transition-duration: 2200ms;
          transition-duration: 2200ms;
}

body[data-aos-delay='2200'] [data-aos],
[data-aos][data-aos][data-aos-delay='2200'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2200'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2200'].aos-animate {
  -webkit-transition-delay: 2200ms;
          transition-delay: 2200ms;
}

body[data-aos-duration='2250'] [data-aos],
[data-aos][data-aos][data-aos-duration='2250'] {
  -webkit-transition-duration: 2250ms;
          transition-duration: 2250ms;
}

body[data-aos-delay='2250'] [data-aos],
[data-aos][data-aos][data-aos-delay='2250'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2250'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2250'].aos-animate {
  -webkit-transition-delay: 2250ms;
          transition-delay: 2250ms;
}

body[data-aos-duration='2300'] [data-aos],
[data-aos][data-aos][data-aos-duration='2300'] {
  -webkit-transition-duration: 2300ms;
          transition-duration: 2300ms;
}

body[data-aos-delay='2300'] [data-aos],
[data-aos][data-aos][data-aos-delay='2300'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2300'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2300'].aos-animate {
  -webkit-transition-delay: 2300ms;
          transition-delay: 2300ms;
}

body[data-aos-duration='2350'] [data-aos],
[data-aos][data-aos][data-aos-duration='2350'] {
  -webkit-transition-duration: 2350ms;
          transition-duration: 2350ms;
}

body[data-aos-delay='2350'] [data-aos],
[data-aos][data-aos][data-aos-delay='2350'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2350'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2350'].aos-animate {
  -webkit-transition-delay: 2350ms;
          transition-delay: 2350ms;
}

body[data-aos-duration='2400'] [data-aos],
[data-aos][data-aos][data-aos-duration='2400'] {
  -webkit-transition-duration: 2400ms;
          transition-duration: 2400ms;
}

body[data-aos-delay='2400'] [data-aos],
[data-aos][data-aos][data-aos-delay='2400'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2400'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2400'].aos-animate {
  -webkit-transition-delay: 2400ms;
          transition-delay: 2400ms;
}

body[data-aos-duration='2450'] [data-aos],
[data-aos][data-aos][data-aos-duration='2450'] {
  -webkit-transition-duration: 2450ms;
          transition-duration: 2450ms;
}

body[data-aos-delay='2450'] [data-aos],
[data-aos][data-aos][data-aos-delay='2450'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2450'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2450'].aos-animate {
  -webkit-transition-delay: 2450ms;
          transition-delay: 2450ms;
}

body[data-aos-duration='2500'] [data-aos],
[data-aos][data-aos][data-aos-duration='2500'] {
  -webkit-transition-duration: 2500ms;
          transition-duration: 2500ms;
}

body[data-aos-delay='2500'] [data-aos],
[data-aos][data-aos][data-aos-delay='2500'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2500'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2500'].aos-animate {
  -webkit-transition-delay: 2500ms;
          transition-delay: 2500ms;
}

body[data-aos-duration='2550'] [data-aos],
[data-aos][data-aos][data-aos-duration='2550'] {
  -webkit-transition-duration: 2550ms;
          transition-duration: 2550ms;
}

body[data-aos-delay='2550'] [data-aos],
[data-aos][data-aos][data-aos-delay='2550'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2550'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2550'].aos-animate {
  -webkit-transition-delay: 2550ms;
          transition-delay: 2550ms;
}

body[data-aos-duration='2600'] [data-aos],
[data-aos][data-aos][data-aos-duration='2600'] {
  -webkit-transition-duration: 2600ms;
          transition-duration: 2600ms;
}

body[data-aos-delay='2600'] [data-aos],
[data-aos][data-aos][data-aos-delay='2600'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2600'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2600'].aos-animate {
  -webkit-transition-delay: 2600ms;
          transition-delay: 2600ms;
}

body[data-aos-duration='2650'] [data-aos],
[data-aos][data-aos][data-aos-duration='2650'] {
  -webkit-transition-duration: 2650ms;
          transition-duration: 2650ms;
}

body[data-aos-delay='2650'] [data-aos],
[data-aos][data-aos][data-aos-delay='2650'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2650'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2650'].aos-animate {
  -webkit-transition-delay: 2650ms;
          transition-delay: 2650ms;
}

body[data-aos-duration='2700'] [data-aos],
[data-aos][data-aos][data-aos-duration='2700'] {
  -webkit-transition-duration: 2700ms;
          transition-duration: 2700ms;
}

body[data-aos-delay='2700'] [data-aos],
[data-aos][data-aos][data-aos-delay='2700'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2700'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2700'].aos-animate {
  -webkit-transition-delay: 2700ms;
          transition-delay: 2700ms;
}

body[data-aos-duration='2750'] [data-aos],
[data-aos][data-aos][data-aos-duration='2750'] {
  -webkit-transition-duration: 2750ms;
          transition-duration: 2750ms;
}

body[data-aos-delay='2750'] [data-aos],
[data-aos][data-aos][data-aos-delay='2750'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2750'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2750'].aos-animate {
  -webkit-transition-delay: 2750ms;
          transition-delay: 2750ms;
}

body[data-aos-duration='2800'] [data-aos],
[data-aos][data-aos][data-aos-duration='2800'] {
  -webkit-transition-duration: 2800ms;
          transition-duration: 2800ms;
}

body[data-aos-delay='2800'] [data-aos],
[data-aos][data-aos][data-aos-delay='2800'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2800'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2800'].aos-animate {
  -webkit-transition-delay: 2800ms;
          transition-delay: 2800ms;
}

body[data-aos-duration='2850'] [data-aos],
[data-aos][data-aos][data-aos-duration='2850'] {
  -webkit-transition-duration: 2850ms;
          transition-duration: 2850ms;
}

body[data-aos-delay='2850'] [data-aos],
[data-aos][data-aos][data-aos-delay='2850'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2850'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2850'].aos-animate {
  -webkit-transition-delay: 2850ms;
          transition-delay: 2850ms;
}

body[data-aos-duration='2900'] [data-aos],
[data-aos][data-aos][data-aos-duration='2900'] {
  -webkit-transition-duration: 2900ms;
          transition-duration: 2900ms;
}

body[data-aos-delay='2900'] [data-aos],
[data-aos][data-aos][data-aos-delay='2900'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2900'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2900'].aos-animate {
  -webkit-transition-delay: 2900ms;
          transition-delay: 2900ms;
}

body[data-aos-duration='2950'] [data-aos],
[data-aos][data-aos][data-aos-duration='2950'] {
  -webkit-transition-duration: 2950ms;
          transition-duration: 2950ms;
}

body[data-aos-delay='2950'] [data-aos],
[data-aos][data-aos][data-aos-delay='2950'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='2950'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='2950'].aos-animate {
  -webkit-transition-delay: 2950ms;
          transition-delay: 2950ms;
}

body[data-aos-duration='3000'] [data-aos],
[data-aos][data-aos][data-aos-duration='3000'] {
  -webkit-transition-duration: 3000ms;
          transition-duration: 3000ms;
}

body[data-aos-delay='3000'] [data-aos],
[data-aos][data-aos][data-aos-delay='3000'] {
  -webkit-transition-delay: 0;
          transition-delay: 0;
}

body[data-aos-delay='3000'] [data-aos].aos-animate,
[data-aos][data-aos][data-aos-delay='3000'].aos-animate {
  -webkit-transition-delay: 3000ms;
          transition-delay: 3000ms;
}

body[data-aos-easing="linear"] [data-aos],
[data-aos][data-aos][data-aos-easing="linear"] {
  -webkit-transition-timing-function: cubic-bezier(0.25, 0.25, 0.75, 0.75);
          transition-timing-function: cubic-bezier(0.25, 0.25, 0.75, 0.75);
}

body[data-aos-easing="ease"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease"] {
  -webkit-transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
          transition-timing-function: cubic-bezier(0.25, 0.1, 0.25, 1);
}

body[data-aos-easing="ease-in"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in"] {
  -webkit-transition-timing-function: cubic-bezier(0.42, 0, 1, 1);
          transition-timing-function: cubic-bezier(0.42, 0, 1, 1);
}

body[data-aos-easing="ease-out"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-out"] {
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.58, 1);
          transition-timing-function: cubic-bezier(0, 0, 0.58, 1);
}

body[data-aos-easing="ease-in-out"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-out"] {
  -webkit-transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
          transition-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
}

body[data-aos-easing="ease-in-back"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-back"] {
  -webkit-transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, 0.045);
          transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, 0.045);
}

body[data-aos-easing="ease-out-back"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-out-back"] {
  -webkit-transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
          transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

body[data-aos-easing="ease-in-out-back"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-out-back"] {
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
          transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

body[data-aos-easing="ease-in-sine"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-sine"] {
  -webkit-transition-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
          transition-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
}

body[data-aos-easing="ease-out-sine"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-out-sine"] {
  -webkit-transition-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
          transition-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
}

body[data-aos-easing="ease-in-out-sine"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-out-sine"] {
  -webkit-transition-timing-function: cubic-bezier(0.445, 0.05, 0.55, 0.95);
          transition-timing-function: cubic-bezier(0.445, 0.05, 0.55, 0.95);
}

body[data-aos-easing="ease-in-quad"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-quad"] {
  -webkit-transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
          transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
}

body[data-aos-easing="ease-out-quad"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-out-quad"] {
  -webkit-transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
          transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

body[data-aos-easing="ease-in-out-quad"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-out-quad"] {
  -webkit-transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
          transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
}

body[data-aos-easing="ease-in-cubic"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-cubic"] {
  -webkit-transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
          transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
}

body[data-aos-easing="ease-out-cubic"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-out-cubic"] {
  -webkit-transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
          transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

body[data-aos-easing="ease-in-out-cubic"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-out-cubic"] {
  -webkit-transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
          transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
}

body[data-aos-easing="ease-in-quart"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-quart"] {
  -webkit-transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
          transition-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
}

body[data-aos-easing="ease-out-quart"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-out-quart"] {
  -webkit-transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
          transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

body[data-aos-easing="ease-in-out-quart"] [data-aos],
[data-aos][data-aos][data-aos-easing="ease-in-out-quart"] {
  -webkit-transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
          transition-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
}

/**
 * Fade animations:
 * fade
 * fade-up, fade-down, fade-left, fade-right
 * fade-up-right, fade-up-left, fade-down-right, fade-down-left
 */

[data-aos^='fade'][data-aos^='fade'] {
  opacity: 0;
  -webkit-transition-property: opacity, -webkit-transform;
  transition-property: opacity, -webkit-transform;
  transition-property: opacity, transform;
  transition-property: opacity, transform, -webkit-transform;
}

[data-aos^='fade'][data-aos^='fade'].aos-animate {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

[data-aos='fade-up'] {
  -webkit-transform: translate3d(0, 100px, 0);
          transform: translate3d(0, 100px, 0);
}

[data-aos='fade-down'] {
  -webkit-transform: translate3d(0, -100px, 0);
          transform: translate3d(0, -100px, 0);
}

[data-aos='fade-right'] {
  -webkit-transform: translate3d(-100px, 0, 0);
          transform: translate3d(-100px, 0, 0);
}

[data-aos='fade-left'] {
  -webkit-transform: translate3d(100px, 0, 0);
          transform: translate3d(100px, 0, 0);
}

[data-aos='fade-up-right'] {
  -webkit-transform: translate3d(-100px, 100px, 0);
          transform: translate3d(-100px, 100px, 0);
}

[data-aos='fade-up-left'] {
  -webkit-transform: translate3d(100px, 100px, 0);
          transform: translate3d(100px, 100px, 0);
}

[data-aos='fade-down-right'] {
  -webkit-transform: translate3d(-100px, -100px, 0);
          transform: translate3d(-100px, -100px, 0);
}

[data-aos='fade-down-left'] {
  -webkit-transform: translate3d(100px, -100px, 0);
          transform: translate3d(100px, -100px, 0);
}

/**
 * Zoom animations:
 * zoom-in, zoom-in-up, zoom-in-down, zoom-in-left, zoom-in-right
 * zoom-out, zoom-out-up, zoom-out-down, zoom-out-left, zoom-out-right
 */

[data-aos^='zoom'][data-aos^='zoom'] {
  opacity: 0;
  -webkit-transition-property: opacity, -webkit-transform;
  transition-property: opacity, -webkit-transform;
  transition-property: opacity, transform;
  transition-property: opacity, transform, -webkit-transform;
}

[data-aos^='zoom'][data-aos^='zoom'].aos-animate {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0) scale(1);
          transform: translate3d(0, 0, 0) scale(1);
}

[data-aos='zoom-in'] {
  -webkit-transform: scale(0.6);
          transform: scale(0.6);
}

[data-aos='zoom-in-up'] {
  -webkit-transform: translate3d(0, 100px, 0) scale(0.6);
          transform: translate3d(0, 100px, 0) scale(0.6);
}

[data-aos='zoom-in-down'] {
  -webkit-transform: translate3d(0, -100px, 0) scale(0.6);
          transform: translate3d(0, -100px, 0) scale(0.6);
}

[data-aos='zoom-in-right'] {
  -webkit-transform: translate3d(-100px, 0, 0) scale(0.6);
          transform: translate3d(-100px, 0, 0) scale(0.6);
}

[data-aos='zoom-in-left'] {
  -webkit-transform: translate3d(100px, 0, 0) scale(0.6);
          transform: translate3d(100px, 0, 0) scale(0.6);
}

[data-aos='zoom-out'] {
  -webkit-transform: scale(1.2);
          transform: scale(1.2);
}

[data-aos='zoom-out-up'] {
  -webkit-transform: translate3d(0, 100px, 0) scale(1.2);
          transform: translate3d(0, 100px, 0) scale(1.2);
}

[data-aos='zoom-out-down'] {
  -webkit-transform: translate3d(0, -100px, 0) scale(1.2);
          transform: translate3d(0, -100px, 0) scale(1.2);
}

[data-aos='zoom-out-right'] {
  -webkit-transform: translate3d(-100px, 0, 0) scale(1.2);
          transform: translate3d(-100px, 0, 0) scale(1.2);
}

[data-aos='zoom-out-left'] {
  -webkit-transform: translate3d(100px, 0, 0) scale(1.2);
          transform: translate3d(100px, 0, 0) scale(1.2);
}

/**
 * Slide animations
 */

[data-aos^='slide'][data-aos^='slide'] {
  -webkit-transition-property: -webkit-transform;
  transition-property: -webkit-transform;
  transition-property: transform;
  transition-property: transform, -webkit-transform;
}

[data-aos^='slide'][data-aos^='slide'].aos-animate {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

[data-aos='slide-up'] {
  -webkit-transform: translate3d(0, 100%, 0);
          transform: translate3d(0, 100%, 0);
}

[data-aos='slide-down'] {
  -webkit-transform: translate3d(0, -100%, 0);
          transform: translate3d(0, -100%, 0);
}

[data-aos='slide-right'] {
  -webkit-transform: translate3d(-100%, 0, 0);
          transform: translate3d(-100%, 0, 0);
}

[data-aos='slide-left'] {
  -webkit-transform: translate3d(100%, 0, 0);
          transform: translate3d(100%, 0, 0);
}

/**
 * Flip animations:
 * flip-left, flip-right, flip-up, flip-down
 */

[data-aos^='flip'][data-aos^='flip'] {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transition-property: -webkit-transform;
  transition-property: -webkit-transform;
  transition-property: transform;
  transition-property: transform, -webkit-transform;
}

[data-aos='flip-left'] {
  -webkit-transform: perspective(2500px) rotateY(-100deg);
          transform: perspective(2500px) rotateY(-100deg);
}

[data-aos='flip-left'].aos-animate {
  -webkit-transform: perspective(2500px) rotateY(0);
          transform: perspective(2500px) rotateY(0);
}

[data-aos='flip-right'] {
  -webkit-transform: perspective(2500px) rotateY(100deg);
          transform: perspective(2500px) rotateY(100deg);
}

[data-aos='flip-right'].aos-animate {
  -webkit-transform: perspective(2500px) rotateY(0);
          transform: perspective(2500px) rotateY(0);
}

[data-aos='flip-up'] {
  -webkit-transform: perspective(2500px) rotateX(-100deg);
          transform: perspective(2500px) rotateX(-100deg);
}

[data-aos='flip-up'].aos-animate {
  -webkit-transform: perspective(2500px) rotateX(0);
          transform: perspective(2500px) rotateX(0);
}

[data-aos='flip-down'] {
  -webkit-transform: perspective(2500px) rotateX(100deg);
          transform: perspective(2500px) rotateX(100deg);
}

[data-aos='flip-down'].aos-animate {
  -webkit-transform: perspective(2500px) rotateX(0);
          transform: perspective(2500px) rotateX(0);
}

/*!
 * Font Awesome Free 5.5.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */

.fa,
.fas,
.far,
.fal,
.fab {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
  line-height: 1;
}

.fa-lg {
  font-size: 1.33333333em;
  line-height: 0.75em;
  vertical-align: -.0667em;
}

.fa-xs {
  font-size: .75em;
}

.fa-sm {
  font-size: .875em;
}

.fa-1x {
  font-size: 1em;
}

.fa-2x {
  font-size: 2em;
}

.fa-3x {
  font-size: 3em;
}

.fa-4x {
  font-size: 4em;
}

.fa-5x {
  font-size: 5em;
}

.fa-6x {
  font-size: 6em;
}

.fa-7x {
  font-size: 7em;
}

.fa-8x {
  font-size: 8em;
}

.fa-9x {
  font-size: 9em;
}

.fa-10x {
  font-size: 10em;
}

.fa-fw {
  text-align: center;
  width: 1.25em;
}

.fa-ul {
  list-style-type: none;
  margin-left: 2.5em;
  padding-left: 0;
}

.fa-ul > li {
  position: relative;
}

.fa-li {
  left: -2em;
  position: absolute;
  text-align: center;
  width: 2em;
  line-height: inherit;
}

.fa-border {
  border: solid 0.08em #eee;
  border-radius: .1em;
  padding: .2em .25em .15em;
}

.fa-pull-left {
  float: left;
}

.fa-pull-right {
  float: right;
}

.fa.fa-pull-left,
.fas.fa-pull-left,
.far.fa-pull-left,
.fal.fa-pull-left,
.fab.fa-pull-left {
  margin-right: .3em;
}

.fa.fa-pull-right,
.fas.fa-pull-right,
.far.fa-pull-right,
.fal.fa-pull-right,
.fab.fa-pull-right {
  margin-left: .3em;
}

.fa-spin {
  -webkit-animation: fa-spin 2s infinite linear;
          animation: fa-spin 2s infinite linear;
}

.fa-pulse {
  -webkit-animation: fa-spin 1s infinite steps(8);
          animation: fa-spin 1s infinite steps(8);
}

@-webkit-keyframes fa-spin {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }

  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes fa-spin {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }

  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

.fa-rotate-90 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}

.fa-rotate-180 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}

.fa-rotate-270 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
  -webkit-transform: rotate(270deg);
          transform: rotate(270deg);
}

.fa-flip-horizontal {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
  -webkit-transform: scale(-1, 1);
          transform: scale(-1, 1);
}

.fa-flip-vertical {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
  -webkit-transform: scale(1, -1);
          transform: scale(1, -1);
}

.fa-flip-horizontal.fa-flip-vertical {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
  -webkit-transform: scale(-1, -1);
          transform: scale(-1, -1);
}

:root .fa-rotate-90,
:root .fa-rotate-180,
:root .fa-rotate-270,
:root .fa-flip-horizontal,
:root .fa-flip-vertical {
  -webkit-filter: none;
          filter: none;
}

.fa-stack {
  display: inline-block;
  height: 2em;
  line-height: 2em;
  position: relative;
  vertical-align: middle;
  width: 2.5em;
}

.fa-stack-1x,
.fa-stack-2x {
  left: 0;
  position: absolute;
  text-align: center;
  width: 100%;
}

.fa-stack-1x {
  line-height: inherit;
}

.fa-stack-2x {
  font-size: 2em;
}

.fa-inverse {
  color: #fff;
}

/* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
readers do not read off random characters that represent icons */

.fa-500px:before {
  content: "\F26E";
}

.fa-accessible-icon:before {
  content: "\F368";
}

.fa-accusoft:before {
  content: "\F369";
}

.fa-acquisitions-incorporated:before {
  content: "\F6AF";
}

.fa-ad:before {
  content: "\F641";
}

.fa-address-book:before {
  content: "\F2B9";
}

.fa-address-card:before {
  content: "\F2BB";
}

.fa-adjust:before {
  content: "\F042";
}

.fa-adn:before {
  content: "\F170";
}

.fa-adversal:before {
  content: "\F36A";
}

.fa-affiliatetheme:before {
  content: "\F36B";
}

.fa-air-freshener:before {
  content: "\F5D0";
}

.fa-algolia:before {
  content: "\F36C";
}

.fa-align-center:before {
  content: "\F037";
}

.fa-align-justify:before {
  content: "\F039";
}

.fa-align-left:before {
  content: "\F036";
}

.fa-align-right:before {
  content: "\F038";
}

.fa-alipay:before {
  content: "\F642";
}

.fa-allergies:before {
  content: "\F461";
}

.fa-amazon:before {
  content: "\F270";
}

.fa-amazon-pay:before {
  content: "\F42C";
}

.fa-ambulance:before {
  content: "\F0F9";
}

.fa-american-sign-language-interpreting:before {
  content: "\F2A3";
}

.fa-amilia:before {
  content: "\F36D";
}

.fa-anchor:before {
  content: "\F13D";
}

.fa-android:before {
  content: "\F17B";
}

.fa-angellist:before {
  content: "\F209";
}

.fa-angle-double-down:before {
  content: "\F103";
}

.fa-angle-double-left:before {
  content: "\F100";
}

.fa-angle-double-right:before {
  content: "\F101";
}

.fa-angle-double-up:before {
  content: "\F102";
}

.fa-angle-down:before {
  content: "\F107";
}

.fa-angle-left:before {
  content: "\F104";
}

.fa-angle-right:before {
  content: "\F105";
}

.fa-angle-up:before {
  content: "\F106";
}

.fa-angry:before {
  content: "\F556";
}

.fa-angrycreative:before {
  content: "\F36E";
}

.fa-angular:before {
  content: "\F420";
}

.fa-ankh:before {
  content: "\F644";
}

.fa-app-store:before {
  content: "\F36F";
}

.fa-app-store-ios:before {
  content: "\F370";
}

.fa-apper:before {
  content: "\F371";
}

.fa-apple:before {
  content: "\F179";
}

.fa-apple-alt:before {
  content: "\F5D1";
}

.fa-apple-pay:before {
  content: "\F415";
}

.fa-archive:before {
  content: "\F187";
}

.fa-archway:before {
  content: "\F557";
}

.fa-arrow-alt-circle-down:before {
  content: "\F358";
}

.fa-arrow-alt-circle-left:before {
  content: "\F359";
}

.fa-arrow-alt-circle-right:before {
  content: "\F35A";
}

.fa-arrow-alt-circle-up:before {
  content: "\F35B";
}

.fa-arrow-circle-down:before {
  content: "\F0AB";
}

.fa-arrow-circle-left:before {
  content: "\F0A8";
}

.fa-arrow-circle-right:before {
  content: "\F0A9";
}

.fa-arrow-circle-up:before {
  content: "\F0AA";
}

.fa-arrow-down:before {
  content: "\F063";
}

.fa-arrow-left:before {
  content: "\F060";
}

.fa-arrow-right:before {
  content: "\F061";
}

.fa-arrow-up:before {
  content: "\F062";
}

.fa-arrows-alt:before {
  content: "\F0B2";
}

.fa-arrows-alt-h:before {
  content: "\F337";
}

.fa-arrows-alt-v:before {
  content: "\F338";
}

.fa-assistive-listening-systems:before {
  content: "\F2A2";
}

.fa-asterisk:before {
  content: "\F069";
}

.fa-asymmetrik:before {
  content: "\F372";
}

.fa-at:before {
  content: "\F1FA";
}

.fa-atlas:before {
  content: "\F558";
}

.fa-atom:before {
  content: "\F5D2";
}

.fa-audible:before {
  content: "\F373";
}

.fa-audio-description:before {
  content: "\F29E";
}

.fa-autoprefixer:before {
  content: "\F41C";
}

.fa-avianex:before {
  content: "\F374";
}

.fa-aviato:before {
  content: "\F421";
}

.fa-award:before {
  content: "\F559";
}

.fa-aws:before {
  content: "\F375";
}

.fa-backspace:before {
  content: "\F55A";
}

.fa-backward:before {
  content: "\F04A";
}

.fa-balance-scale:before {
  content: "\F24E";
}

.fa-ban:before {
  content: "\F05E";
}

.fa-band-aid:before {
  content: "\F462";
}

.fa-bandcamp:before {
  content: "\F2D5";
}

.fa-barcode:before {
  content: "\F02A";
}

.fa-bars:before {
  content: "\F0C9";
}

.fa-baseball-ball:before {
  content: "\F433";
}

.fa-basketball-ball:before {
  content: "\F434";
}

.fa-bath:before {
  content: "\F2CD";
}

.fa-battery-empty:before {
  content: "\F244";
}

.fa-battery-full:before {
  content: "\F240";
}

.fa-battery-half:before {
  content: "\F242";
}

.fa-battery-quarter:before {
  content: "\F243";
}

.fa-battery-three-quarters:before {
  content: "\F241";
}

.fa-bed:before {
  content: "\F236";
}

.fa-beer:before {
  content: "\F0FC";
}

.fa-behance:before {
  content: "\F1B4";
}

.fa-behance-square:before {
  content: "\F1B5";
}

.fa-bell:before {
  content: "\F0F3";
}

.fa-bell-slash:before {
  content: "\F1F6";
}

.fa-bezier-curve:before {
  content: "\F55B";
}

.fa-bible:before {
  content: "\F647";
}

.fa-bicycle:before {
  content: "\F206";
}

.fa-bimobject:before {
  content: "\F378";
}

.fa-binoculars:before {
  content: "\F1E5";
}

.fa-birthday-cake:before {
  content: "\F1FD";
}

.fa-bitbucket:before {
  content: "\F171";
}

.fa-bitcoin:before {
  content: "\F379";
}

.fa-bity:before {
  content: "\F37A";
}

.fa-black-tie:before {
  content: "\F27E";
}

.fa-blackberry:before {
  content: "\F37B";
}

.fa-blender:before {
  content: "\F517";
}

.fa-blender-phone:before {
  content: "\F6B6";
}

.fa-blind:before {
  content: "\F29D";
}

.fa-blogger:before {
  content: "\F37C";
}

.fa-blogger-b:before {
  content: "\F37D";
}

.fa-bluetooth:before {
  content: "\F293";
}

.fa-bluetooth-b:before {
  content: "\F294";
}

.fa-bold:before {
  content: "\F032";
}

.fa-bolt:before {
  content: "\F0E7";
}

.fa-bomb:before {
  content: "\F1E2";
}

.fa-bone:before {
  content: "\F5D7";
}

.fa-bong:before {
  content: "\F55C";
}

.fa-book:before {
  content: "\F02D";
}

.fa-book-dead:before {
  content: "\F6B7";
}

.fa-book-open:before {
  content: "\F518";
}

.fa-book-reader:before {
  content: "\F5DA";
}

.fa-bookmark:before {
  content: "\F02E";
}

.fa-bowling-ball:before {
  content: "\F436";
}

.fa-box:before {
  content: "\F466";
}

.fa-box-open:before {
  content: "\F49E";
}

.fa-boxes:before {
  content: "\F468";
}

.fa-braille:before {
  content: "\F2A1";
}

.fa-brain:before {
  content: "\F5DC";
}

.fa-briefcase:before {
  content: "\F0B1";
}

.fa-briefcase-medical:before {
  content: "\F469";
}

.fa-broadcast-tower:before {
  content: "\F519";
}

.fa-broom:before {
  content: "\F51A";
}

.fa-brush:before {
  content: "\F55D";
}

.fa-btc:before {
  content: "\F15A";
}

.fa-bug:before {
  content: "\F188";
}

.fa-building:before {
  content: "\F1AD";
}

.fa-bullhorn:before {
  content: "\F0A1";
}

.fa-bullseye:before {
  content: "\F140";
}

.fa-burn:before {
  content: "\F46A";
}

.fa-buromobelexperte:before {
  content: "\F37F";
}

.fa-bus:before {
  content: "\F207";
}

.fa-bus-alt:before {
  content: "\F55E";
}

.fa-business-time:before {
  content: "\F64A";
}

.fa-buysellads:before {
  content: "\F20D";
}

.fa-calculator:before {
  content: "\F1EC";
}

.fa-calendar:before {
  content: "\F133";
}

.fa-calendar-alt:before {
  content: "\F073";
}

.fa-calendar-check:before {
  content: "\F274";
}

.fa-calendar-minus:before {
  content: "\F272";
}

.fa-calendar-plus:before {
  content: "\F271";
}

.fa-calendar-times:before {
  content: "\F273";
}

.fa-camera:before {
  content: "\F030";
}

.fa-camera-retro:before {
  content: "\F083";
}

.fa-campground:before {
  content: "\F6BB";
}

.fa-cannabis:before {
  content: "\F55F";
}

.fa-capsules:before {
  content: "\F46B";
}

.fa-car:before {
  content: "\F1B9";
}

.fa-car-alt:before {
  content: "\F5DE";
}

.fa-car-battery:before {
  content: "\F5DF";
}

.fa-car-crash:before {
  content: "\F5E1";
}

.fa-car-side:before {
  content: "\F5E4";
}

.fa-caret-down:before {
  content: "\F0D7";
}

.fa-caret-left:before {
  content: "\F0D9";
}

.fa-caret-right:before {
  content: "\F0DA";
}

.fa-caret-square-down:before {
  content: "\F150";
}

.fa-caret-square-left:before {
  content: "\F191";
}

.fa-caret-square-right:before {
  content: "\F152";
}

.fa-caret-square-up:before {
  content: "\F151";
}

.fa-caret-up:before {
  content: "\F0D8";
}

.fa-cart-arrow-down:before {
  content: "\F218";
}

.fa-cart-plus:before {
  content: "\F217";
}

.fa-cat:before {
  content: "\F6BE";
}

.fa-cc-amazon-pay:before {
  content: "\F42D";
}

.fa-cc-amex:before {
  content: "\F1F3";
}

.fa-cc-apple-pay:before {
  content: "\F416";
}

.fa-cc-diners-club:before {
  content: "\F24C";
}

.fa-cc-discover:before {
  content: "\F1F2";
}

.fa-cc-jcb:before {
  content: "\F24B";
}

.fa-cc-mastercard:before {
  content: "\F1F1";
}

.fa-cc-paypal:before {
  content: "\F1F4";
}

.fa-cc-stripe:before {
  content: "\F1F5";
}

.fa-cc-visa:before {
  content: "\F1F0";
}

.fa-centercode:before {
  content: "\F380";
}

.fa-certificate:before {
  content: "\F0A3";
}

.fa-chair:before {
  content: "\F6C0";
}

.fa-chalkboard:before {
  content: "\F51B";
}

.fa-chalkboard-teacher:before {
  content: "\F51C";
}

.fa-charging-station:before {
  content: "\F5E7";
}

.fa-chart-area:before {
  content: "\F1FE";
}

.fa-chart-bar:before {
  content: "\F080";
}

.fa-chart-line:before {
  content: "\F201";
}

.fa-chart-pie:before {
  content: "\F200";
}

.fa-check:before {
  content: "\F00C";
}

.fa-check-circle:before {
  content: "\F058";
}

.fa-check-double:before {
  content: "\F560";
}

.fa-check-square:before {
  content: "\F14A";
}

.fa-chess:before {
  content: "\F439";
}

.fa-chess-bishop:before {
  content: "\F43A";
}

.fa-chess-board:before {
  content: "\F43C";
}

.fa-chess-king:before {
  content: "\F43F";
}

.fa-chess-knight:before {
  content: "\F441";
}

.fa-chess-pawn:before {
  content: "\F443";
}

.fa-chess-queen:before {
  content: "\F445";
}

.fa-chess-rook:before {
  content: "\F447";
}

.fa-chevron-circle-down:before {
  content: "\F13A";
}

.fa-chevron-circle-left:before {
  content: "\F137";
}

.fa-chevron-circle-right:before {
  content: "\F138";
}

.fa-chevron-circle-up:before {
  content: "\F139";
}

.fa-chevron-down:before {
  content: "\F078";
}

.fa-chevron-left:before {
  content: "\F053";
}

.fa-chevron-right:before {
  content: "\F054";
}

.fa-chevron-up:before {
  content: "\F077";
}

.fa-child:before {
  content: "\F1AE";
}

.fa-chrome:before {
  content: "\F268";
}

.fa-church:before {
  content: "\F51D";
}

.fa-circle:before {
  content: "\F111";
}

.fa-circle-notch:before {
  content: "\F1CE";
}

.fa-city:before {
  content: "\F64F";
}

.fa-clipboard:before {
  content: "\F328";
}

.fa-clipboard-check:before {
  content: "\F46C";
}

.fa-clipboard-list:before {
  content: "\F46D";
}

.fa-clock:before {
  content: "\F017";
}

.fa-clone:before {
  content: "\F24D";
}

.fa-closed-captioning:before {
  content: "\F20A";
}

.fa-cloud:before {
  content: "\F0C2";
}

.fa-cloud-download-alt:before {
  content: "\F381";
}

.fa-cloud-meatball:before {
  content: "\F73B";
}

.fa-cloud-moon:before {
  content: "\F6C3";
}

.fa-cloud-moon-rain:before {
  content: "\F73C";
}

.fa-cloud-rain:before {
  content: "\F73D";
}

.fa-cloud-showers-heavy:before {
  content: "\F740";
}

.fa-cloud-sun:before {
  content: "\F6C4";
}

.fa-cloud-sun-rain:before {
  content: "\F743";
}

.fa-cloud-upload-alt:before {
  content: "\F382";
}

.fa-cloudscale:before {
  content: "\F383";
}

.fa-cloudsmith:before {
  content: "\F384";
}

.fa-cloudversify:before {
  content: "\F385";
}

.fa-cocktail:before {
  content: "\F561";
}

.fa-code:before {
  content: "\F121";
}

.fa-code-branch:before {
  content: "\F126";
}

.fa-codepen:before {
  content: "\F1CB";
}

.fa-codiepie:before {
  content: "\F284";
}

.fa-coffee:before {
  content: "\F0F4";
}

.fa-cog:before {
  content: "\F013";
}

.fa-cogs:before {
  content: "\F085";
}

.fa-coins:before {
  content: "\F51E";
}

.fa-columns:before {
  content: "\F0DB";
}

.fa-comment:before {
  content: "\F075";
}

.fa-comment-alt:before {
  content: "\F27A";
}

.fa-comment-dollar:before {
  content: "\F651";
}

.fa-comment-dots:before {
  content: "\F4AD";
}

.fa-comment-slash:before {
  content: "\F4B3";
}

.fa-comments:before {
  content: "\F086";
}

.fa-comments-dollar:before {
  content: "\F653";
}

.fa-compact-disc:before {
  content: "\F51F";
}

.fa-compass:before {
  content: "\F14E";
}

.fa-compress:before {
  content: "\F066";
}

.fa-concierge-bell:before {
  content: "\F562";
}

.fa-connectdevelop:before {
  content: "\F20E";
}

.fa-contao:before {
  content: "\F26D";
}

.fa-cookie:before {
  content: "\F563";
}

.fa-cookie-bite:before {
  content: "\F564";
}

.fa-copy:before {
  content: "\F0C5";
}

.fa-copyright:before {
  content: "\F1F9";
}

.fa-couch:before {
  content: "\F4B8";
}

.fa-cpanel:before {
  content: "\F388";
}

.fa-creative-commons:before {
  content: "\F25E";
}

.fa-creative-commons-by:before {
  content: "\F4E7";
}

.fa-creative-commons-nc:before {
  content: "\F4E8";
}

.fa-creative-commons-nc-eu:before {
  content: "\F4E9";
}

.fa-creative-commons-nc-jp:before {
  content: "\F4EA";
}

.fa-creative-commons-nd:before {
  content: "\F4EB";
}

.fa-creative-commons-pd:before {
  content: "\F4EC";
}

.fa-creative-commons-pd-alt:before {
  content: "\F4ED";
}

.fa-creative-commons-remix:before {
  content: "\F4EE";
}

.fa-creative-commons-sa:before {
  content: "\F4EF";
}

.fa-creative-commons-sampling:before {
  content: "\F4F0";
}

.fa-creative-commons-sampling-plus:before {
  content: "\F4F1";
}

.fa-creative-commons-share:before {
  content: "\F4F2";
}

.fa-creative-commons-zero:before {
  content: "\F4F3";
}

.fa-credit-card:before {
  content: "\F09D";
}

.fa-critical-role:before {
  content: "\F6C9";
}

.fa-crop:before {
  content: "\F125";
}

.fa-crop-alt:before {
  content: "\F565";
}

.fa-cross:before {
  content: "\F654";
}

.fa-crosshairs:before {
  content: "\F05B";
}

.fa-crow:before {
  content: "\F520";
}

.fa-crown:before {
  content: "\F521";
}

.fa-css3:before {
  content: "\F13C";
}

.fa-css3-alt:before {
  content: "\F38B";
}

.fa-cube:before {
  content: "\F1B2";
}

.fa-cubes:before {
  content: "\F1B3";
}

.fa-cut:before {
  content: "\F0C4";
}

.fa-cuttlefish:before {
  content: "\F38C";
}

.fa-d-and-d:before {
  content: "\F38D";
}

.fa-d-and-d-beyond:before {
  content: "\F6CA";
}

.fa-dashcube:before {
  content: "\F210";
}

.fa-database:before {
  content: "\F1C0";
}

.fa-deaf:before {
  content: "\F2A4";
}

.fa-delicious:before {
  content: "\F1A5";
}

.fa-democrat:before {
  content: "\F747";
}

.fa-deploydog:before {
  content: "\F38E";
}

.fa-deskpro:before {
  content: "\F38F";
}

.fa-desktop:before {
  content: "\F108";
}

.fa-dev:before {
  content: "\F6CC";
}

.fa-deviantart:before {
  content: "\F1BD";
}

.fa-dharmachakra:before {
  content: "\F655";
}

.fa-diagnoses:before {
  content: "\F470";
}

.fa-dice:before {
  content: "\F522";
}

.fa-dice-d20:before {
  content: "\F6CF";
}

.fa-dice-d6:before {
  content: "\F6D1";
}

.fa-dice-five:before {
  content: "\F523";
}

.fa-dice-four:before {
  content: "\F524";
}

.fa-dice-one:before {
  content: "\F525";
}

.fa-dice-six:before {
  content: "\F526";
}

.fa-dice-three:before {
  content: "\F527";
}

.fa-dice-two:before {
  content: "\F528";
}

.fa-digg:before {
  content: "\F1A6";
}

.fa-digital-ocean:before {
  content: "\F391";
}

.fa-digital-tachograph:before {
  content: "\F566";
}

.fa-directions:before {
  content: "\F5EB";
}

.fa-discord:before {
  content: "\F392";
}

.fa-discourse:before {
  content: "\F393";
}

.fa-divide:before {
  content: "\F529";
}

.fa-dizzy:before {
  content: "\F567";
}

.fa-dna:before {
  content: "\F471";
}

.fa-dochub:before {
  content: "\F394";
}

.fa-docker:before {
  content: "\F395";
}

.fa-dog:before {
  content: "\F6D3";
}

.fa-dollar-sign:before {
  content: "\F155";
}

.fa-dolly:before {
  content: "\F472";
}

.fa-dolly-flatbed:before {
  content: "\F474";
}

.fa-donate:before {
  content: "\F4B9";
}

.fa-door-closed:before {
  content: "\F52A";
}

.fa-door-open:before {
  content: "\F52B";
}

.fa-dot-circle:before {
  content: "\F192";
}

.fa-dove:before {
  content: "\F4BA";
}

.fa-download:before {
  content: "\F019";
}

.fa-draft2digital:before {
  content: "\F396";
}

.fa-drafting-compass:before {
  content: "\F568";
}

.fa-dragon:before {
  content: "\F6D5";
}

.fa-draw-polygon:before {
  content: "\F5EE";
}

.fa-dribbble:before {
  content: "\F17D";
}

.fa-dribbble-square:before {
  content: "\F397";
}

.fa-dropbox:before {
  content: "\F16B";
}

.fa-drum:before {
  content: "\F569";
}

.fa-drum-steelpan:before {
  content: "\F56A";
}

.fa-drumstick-bite:before {
  content: "\F6D7";
}

.fa-drupal:before {
  content: "\F1A9";
}

.fa-dumbbell:before {
  content: "\F44B";
}

.fa-dungeon:before {
  content: "\F6D9";
}

.fa-dyalog:before {
  content: "\F399";
}

.fa-earlybirds:before {
  content: "\F39A";
}

.fa-ebay:before {
  content: "\F4F4";
}

.fa-edge:before {
  content: "\F282";
}

.fa-edit:before {
  content: "\F044";
}

.fa-eject:before {
  content: "\F052";
}

.fa-elementor:before {
  content: "\F430";
}

.fa-ellipsis-h:before {
  content: "\F141";
}

.fa-ellipsis-v:before {
  content: "\F142";
}

.fa-ello:before {
  content: "\F5F1";
}

.fa-ember:before {
  content: "\F423";
}

.fa-empire:before {
  content: "\F1D1";
}

.fa-envelope:before {
  content: "\F0E0";
}

.fa-envelope-open:before {
  content: "\F2B6";
}

.fa-envelope-open-text:before {
  content: "\F658";
}

.fa-envelope-square:before {
  content: "\F199";
}

.fa-envira:before {
  content: "\F299";
}

.fa-equals:before {
  content: "\F52C";
}

.fa-eraser:before {
  content: "\F12D";
}

.fa-erlang:before {
  content: "\F39D";
}

.fa-ethereum:before {
  content: "\F42E";
}

.fa-etsy:before {
  content: "\F2D7";
}

.fa-euro-sign:before {
  content: "\F153";
}

.fa-exchange-alt:before {
  content: "\F362";
}

.fa-exclamation:before {
  content: "\F12A";
}

.fa-exclamation-circle:before {
  content: "\F06A";
}

.fa-exclamation-triangle:before {
  content: "\F071";
}

.fa-expand:before {
  content: "\F065";
}

.fa-expand-arrows-alt:before {
  content: "\F31E";
}

.fa-expeditedssl:before {
  content: "\F23E";
}

.fa-external-link-alt:before {
  content: "\F35D";
}

.fa-external-link-square-alt:before {
  content: "\F360";
}

.fa-eye:before {
  content: "\F06E";
}

.fa-eye-dropper:before {
  content: "\F1FB";
}

.fa-eye-slash:before {
  content: "\F070";
}

.fa-facebook:before {
  content: "\F09A";
}

.fa-facebook-f:before {
  content: "\F39E";
}

.fa-facebook-messenger:before {
  content: "\F39F";
}

.fa-facebook-square:before {
  content: "\F082";
}

.fa-fantasy-flight-games:before {
  content: "\F6DC";
}

.fa-fast-backward:before {
  content: "\F049";
}

.fa-fast-forward:before {
  content: "\F050";
}

.fa-fax:before {
  content: "\F1AC";
}

.fa-feather:before {
  content: "\F52D";
}

.fa-feather-alt:before {
  content: "\F56B";
}

.fa-female:before {
  content: "\F182";
}

.fa-fighter-jet:before {
  content: "\F0FB";
}

.fa-file:before {
  content: "\F15B";
}

.fa-file-alt:before {
  content: "\F15C";
}

.fa-file-archive:before {
  content: "\F1C6";
}

.fa-file-audio:before {
  content: "\F1C7";
}

.fa-file-code:before {
  content: "\F1C9";
}

.fa-file-contract:before {
  content: "\F56C";
}

.fa-file-csv:before {
  content: "\F6DD";
}

.fa-file-download:before {
  content: "\F56D";
}

.fa-file-excel:before {
  content: "\F1C3";
}

.fa-file-export:before {
  content: "\F56E";
}

.fa-file-image:before {
  content: "\F1C5";
}

.fa-file-import:before {
  content: "\F56F";
}

.fa-file-invoice:before {
  content: "\F570";
}

.fa-file-invoice-dollar:before {
  content: "\F571";
}

.fa-file-medical:before {
  content: "\F477";
}

.fa-file-medical-alt:before {
  content: "\F478";
}

.fa-file-pdf:before {
  content: "\F1C1";
}

.fa-file-powerpoint:before {
  content: "\F1C4";
}

.fa-file-prescription:before {
  content: "\F572";
}

.fa-file-signature:before {
  content: "\F573";
}

.fa-file-upload:before {
  content: "\F574";
}

.fa-file-video:before {
  content: "\F1C8";
}

.fa-file-word:before {
  content: "\F1C2";
}

.fa-fill:before {
  content: "\F575";
}

.fa-fill-drip:before {
  content: "\F576";
}

.fa-film:before {
  content: "\F008";
}

.fa-filter:before {
  content: "\F0B0";
}

.fa-fingerprint:before {
  content: "\F577";
}

.fa-fire:before {
  content: "\F06D";
}

.fa-fire-extinguisher:before {
  content: "\F134";
}

.fa-firefox:before {
  content: "\F269";
}

.fa-first-aid:before {
  content: "\F479";
}

.fa-first-order:before {
  content: "\F2B0";
}

.fa-first-order-alt:before {
  content: "\F50A";
}

.fa-firstdraft:before {
  content: "\F3A1";
}

.fa-fish:before {
  content: "\F578";
}

.fa-fist-raised:before {
  content: "\F6DE";
}

.fa-flag:before {
  content: "\F024";
}

.fa-flag-checkered:before {
  content: "\F11E";
}

.fa-flag-usa:before {
  content: "\F74D";
}

.fa-flask:before {
  content: "\F0C3";
}

.fa-flickr:before {
  content: "\F16E";
}

.fa-flipboard:before {
  content: "\F44D";
}

.fa-flushed:before {
  content: "\F579";
}

.fa-fly:before {
  content: "\F417";
}

.fa-folder:before {
  content: "\F07B";
}

.fa-folder-minus:before {
  content: "\F65D";
}

.fa-folder-open:before {
  content: "\F07C";
}

.fa-folder-plus:before {
  content: "\F65E";
}

.fa-font:before {
  content: "\F031";
}

.fa-font-awesome:before {
  content: "\F2B4";
}

.fa-font-awesome-alt:before {
  content: "\F35C";
}

.fa-font-awesome-flag:before {
  content: "\F425";
}

.fa-font-awesome-logo-full:before {
  content: "\F4E6";
}

.fa-fonticons:before {
  content: "\F280";
}

.fa-fonticons-fi:before {
  content: "\F3A2";
}

.fa-football-ball:before {
  content: "\F44E";
}

.fa-fort-awesome:before {
  content: "\F286";
}

.fa-fort-awesome-alt:before {
  content: "\F3A3";
}

.fa-forumbee:before {
  content: "\F211";
}

.fa-forward:before {
  content: "\F04E";
}

.fa-foursquare:before {
  content: "\F180";
}

.fa-free-code-camp:before {
  content: "\F2C5";
}

.fa-freebsd:before {
  content: "\F3A4";
}

.fa-frog:before {
  content: "\F52E";
}

.fa-frown:before {
  content: "\F119";
}

.fa-frown-open:before {
  content: "\F57A";
}

.fa-fulcrum:before {
  content: "\F50B";
}

.fa-funnel-dollar:before {
  content: "\F662";
}

.fa-futbol:before {
  content: "\F1E3";
}

.fa-galactic-republic:before {
  content: "\F50C";
}

.fa-galactic-senate:before {
  content: "\F50D";
}

.fa-gamepad:before {
  content: "\F11B";
}

.fa-gas-pump:before {
  content: "\F52F";
}

.fa-gavel:before {
  content: "\F0E3";
}

.fa-gem:before {
  content: "\F3A5";
}

.fa-genderless:before {
  content: "\F22D";
}

.fa-get-pocket:before {
  content: "\F265";
}

.fa-gg:before {
  content: "\F260";
}

.fa-gg-circle:before {
  content: "\F261";
}

.fa-ghost:before {
  content: "\F6E2";
}

.fa-gift:before {
  content: "\F06B";
}

.fa-git:before {
  content: "\F1D3";
}

.fa-git-square:before {
  content: "\F1D2";
}

.fa-github:before {
  content: "\F09B";
}

.fa-github-alt:before {
  content: "\F113";
}

.fa-github-square:before {
  content: "\F092";
}

.fa-gitkraken:before {
  content: "\F3A6";
}

.fa-gitlab:before {
  content: "\F296";
}

.fa-gitter:before {
  content: "\F426";
}

.fa-glass-martini:before {
  content: "\F000";
}

.fa-glass-martini-alt:before {
  content: "\F57B";
}

.fa-glasses:before {
  content: "\F530";
}

.fa-glide:before {
  content: "\F2A5";
}

.fa-glide-g:before {
  content: "\F2A6";
}

.fa-globe:before {
  content: "\F0AC";
}

.fa-globe-africa:before {
  content: "\F57C";
}

.fa-globe-americas:before {
  content: "\F57D";
}

.fa-globe-asia:before {
  content: "\F57E";
}

.fa-gofore:before {
  content: "\F3A7";
}

.fa-golf-ball:before {
  content: "\F450";
}

.fa-goodreads:before {
  content: "\F3A8";
}

.fa-goodreads-g:before {
  content: "\F3A9";
}

.fa-google:before {
  content: "\F1A0";
}

.fa-google-drive:before {
  content: "\F3AA";
}

.fa-google-play:before {
  content: "\F3AB";
}

.fa-google-plus:before {
  content: "\F2B3";
}

.fa-google-plus-g:before {
  content: "\F0D5";
}

.fa-google-plus-square:before {
  content: "\F0D4";
}

.fa-google-wallet:before {
  content: "\F1EE";
}

.fa-gopuram:before {
  content: "\F664";
}

.fa-graduation-cap:before {
  content: "\F19D";
}

.fa-gratipay:before {
  content: "\F184";
}

.fa-grav:before {
  content: "\F2D6";
}

.fa-greater-than:before {
  content: "\F531";
}

.fa-greater-than-equal:before {
  content: "\F532";
}

.fa-grimace:before {
  content: "\F57F";
}

.fa-grin:before {
  content: "\F580";
}

.fa-grin-alt:before {
  content: "\F581";
}

.fa-grin-beam:before {
  content: "\F582";
}

.fa-grin-beam-sweat:before {
  content: "\F583";
}

.fa-grin-hearts:before {
  content: "\F584";
}

.fa-grin-squint:before {
  content: "\F585";
}

.fa-grin-squint-tears:before {
  content: "\F586";
}

.fa-grin-stars:before {
  content: "\F587";
}

.fa-grin-tears:before {
  content: "\F588";
}

.fa-grin-tongue:before {
  content: "\F589";
}

.fa-grin-tongue-squint:before {
  content: "\F58A";
}

.fa-grin-tongue-wink:before {
  content: "\F58B";
}

.fa-grin-wink:before {
  content: "\F58C";
}

.fa-grip-horizontal:before {
  content: "\F58D";
}

.fa-grip-vertical:before {
  content: "\F58E";
}

.fa-gripfire:before {
  content: "\F3AC";
}

.fa-grunt:before {
  content: "\F3AD";
}

.fa-gulp:before {
  content: "\F3AE";
}

.fa-h-square:before {
  content: "\F0FD";
}

.fa-hacker-news:before {
  content: "\F1D4";
}

.fa-hacker-news-square:before {
  content: "\F3AF";
}

.fa-hackerrank:before {
  content: "\F5F7";
}

.fa-hammer:before {
  content: "\F6E3";
}

.fa-hamsa:before {
  content: "\F665";
}

.fa-hand-holding:before {
  content: "\F4BD";
}

.fa-hand-holding-heart:before {
  content: "\F4BE";
}

.fa-hand-holding-usd:before {
  content: "\F4C0";
}

.fa-hand-lizard:before {
  content: "\F258";
}

.fa-hand-paper:before {
  content: "\F256";
}

.fa-hand-peace:before {
  content: "\F25B";
}

.fa-hand-point-down:before {
  content: "\F0A7";
}

.fa-hand-point-left:before {
  content: "\F0A5";
}

.fa-hand-point-right:before {
  content: "\F0A4";
}

.fa-hand-point-up:before {
  content: "\F0A6";
}

.fa-hand-pointer:before {
  content: "\F25A";
}

.fa-hand-rock:before {
  content: "\F255";
}

.fa-hand-scissors:before {
  content: "\F257";
}

.fa-hand-spock:before {
  content: "\F259";
}

.fa-hands:before {
  content: "\F4C2";
}

.fa-hands-helping:before {
  content: "\F4C4";
}

.fa-handshake:before {
  content: "\F2B5";
}

.fa-hanukiah:before {
  content: "\F6E6";
}

.fa-hashtag:before {
  content: "\F292";
}

.fa-hat-wizard:before {
  content: "\F6E8";
}

.fa-haykal:before {
  content: "\F666";
}

.fa-hdd:before {
  content: "\F0A0";
}

.fa-heading:before {
  content: "\F1DC";
}

.fa-headphones:before {
  content: "\F025";
}

.fa-headphones-alt:before {
  content: "\F58F";
}

.fa-headset:before {
  content: "\F590";
}

.fa-heart:before {
  content: "\F004";
}

.fa-heartbeat:before {
  content: "\F21E";
}

.fa-helicopter:before {
  content: "\F533";
}

.fa-highlighter:before {
  content: "\F591";
}

.fa-hiking:before {
  content: "\F6EC";
}

.fa-hippo:before {
  content: "\F6ED";
}

.fa-hips:before {
  content: "\F452";
}

.fa-hire-a-helper:before {
  content: "\F3B0";
}

.fa-history:before {
  content: "\F1DA";
}

.fa-hockey-puck:before {
  content: "\F453";
}

.fa-home:before {
  content: "\F015";
}

.fa-hooli:before {
  content: "\F427";
}

.fa-hornbill:before {
  content: "\F592";
}

.fa-horse:before {
  content: "\F6F0";
}

.fa-hospital:before {
  content: "\F0F8";
}

.fa-hospital-alt:before {
  content: "\F47D";
}

.fa-hospital-symbol:before {
  content: "\F47E";
}

.fa-hot-tub:before {
  content: "\F593";
}

.fa-hotel:before {
  content: "\F594";
}

.fa-hotjar:before {
  content: "\F3B1";
}

.fa-hourglass:before {
  content: "\F254";
}

.fa-hourglass-end:before {
  content: "\F253";
}

.fa-hourglass-half:before {
  content: "\F252";
}

.fa-hourglass-start:before {
  content: "\F251";
}

.fa-house-damage:before {
  content: "\F6F1";
}

.fa-houzz:before {
  content: "\F27C";
}

.fa-hryvnia:before {
  content: "\F6F2";
}

.fa-html5:before {
  content: "\F13B";
}

.fa-hubspot:before {
  content: "\F3B2";
}

.fa-i-cursor:before {
  content: "\F246";
}

.fa-id-badge:before {
  content: "\F2C1";
}

.fa-id-card:before {
  content: "\F2C2";
}

.fa-id-card-alt:before {
  content: "\F47F";
}

.fa-image:before {
  content: "\F03E";
}

.fa-images:before {
  content: "\F302";
}

.fa-imdb:before {
  content: "\F2D8";
}

.fa-inbox:before {
  content: "\F01C";
}

.fa-indent:before {
  content: "\F03C";
}

.fa-industry:before {
  content: "\F275";
}

.fa-infinity:before {
  content: "\F534";
}

.fa-info:before {
  content: "\F129";
}

.fa-info-circle:before {
  content: "\F05A";
}

.fa-instagram:before {
  content: "\F16D";
}

.fa-internet-explorer:before {
  content: "\F26B";
}

.fa-ioxhost:before {
  content: "\F208";
}

.fa-italic:before {
  content: "\F033";
}

.fa-itunes:before {
  content: "\F3B4";
}

.fa-itunes-note:before {
  content: "\F3B5";
}

.fa-java:before {
  content: "\F4E4";
}

.fa-jedi:before {
  content: "\F669";
}

.fa-jedi-order:before {
  content: "\F50E";
}

.fa-jenkins:before {
  content: "\F3B6";
}

.fa-joget:before {
  content: "\F3B7";
}

.fa-joint:before {
  content: "\F595";
}

.fa-joomla:before {
  content: "\F1AA";
}

.fa-journal-whills:before {
  content: "\F66A";
}

.fa-js:before {
  content: "\F3B8";
}

.fa-js-square:before {
  content: "\F3B9";
}

.fa-jsfiddle:before {
  content: "\F1CC";
}

.fa-kaaba:before {
  content: "\F66B";
}

.fa-kaggle:before {
  content: "\F5FA";
}

.fa-key:before {
  content: "\F084";
}

.fa-keybase:before {
  content: "\F4F5";
}

.fa-keyboard:before {
  content: "\F11C";
}

.fa-keycdn:before {
  content: "\F3BA";
}

.fa-khanda:before {
  content: "\F66D";
}

.fa-kickstarter:before {
  content: "\F3BB";
}

.fa-kickstarter-k:before {
  content: "\F3BC";
}

.fa-kiss:before {
  content: "\F596";
}

.fa-kiss-beam:before {
  content: "\F597";
}

.fa-kiss-wink-heart:before {
  content: "\F598";
}

.fa-kiwi-bird:before {
  content: "\F535";
}

.fa-korvue:before {
  content: "\F42F";
}

.fa-landmark:before {
  content: "\F66F";
}

.fa-language:before {
  content: "\F1AB";
}

.fa-laptop:before {
  content: "\F109";
}

.fa-laptop-code:before {
  content: "\F5FC";
}

.fa-laravel:before {
  content: "\F3BD";
}

.fa-lastfm:before {
  content: "\F202";
}

.fa-lastfm-square:before {
  content: "\F203";
}

.fa-laugh:before {
  content: "\F599";
}

.fa-laugh-beam:before {
  content: "\F59A";
}

.fa-laugh-squint:before {
  content: "\F59B";
}

.fa-laugh-wink:before {
  content: "\F59C";
}

.fa-layer-group:before {
  content: "\F5FD";
}

.fa-leaf:before {
  content: "\F06C";
}

.fa-leanpub:before {
  content: "\F212";
}

.fa-lemon:before {
  content: "\F094";
}

.fa-less:before {
  content: "\F41D";
}

.fa-less-than:before {
  content: "\F536";
}

.fa-less-than-equal:before {
  content: "\F537";
}

.fa-level-down-alt:before {
  content: "\F3BE";
}

.fa-level-up-alt:before {
  content: "\F3BF";
}

.fa-life-ring:before {
  content: "\F1CD";
}

.fa-lightbulb:before {
  content: "\F0EB";
}

.fa-line:before {
  content: "\F3C0";
}

.fa-link:before {
  content: "\F0C1";
}

.fa-linkedin:before {
  content: "\F08C";
}

.fa-linkedin-in:before {
  content: "\F0E1";
}

.fa-linode:before {
  content: "\F2B8";
}

.fa-linux:before {
  content: "\F17C";
}

.fa-lira-sign:before {
  content: "\F195";
}

.fa-list:before {
  content: "\F03A";
}

.fa-list-alt:before {
  content: "\F022";
}

.fa-list-ol:before {
  content: "\F0CB";
}

.fa-list-ul:before {
  content: "\F0CA";
}

.fa-location-arrow:before {
  content: "\F124";
}

.fa-lock:before {
  content: "\F023";
}

.fa-lock-open:before {
  content: "\F3C1";
}

.fa-long-arrow-alt-down:before {
  content: "\F309";
}

.fa-long-arrow-alt-left:before {
  content: "\F30A";
}

.fa-long-arrow-alt-right:before {
  content: "\F30B";
}

.fa-long-arrow-alt-up:before {
  content: "\F30C";
}

.fa-low-vision:before {
  content: "\F2A8";
}

.fa-luggage-cart:before {
  content: "\F59D";
}

.fa-lyft:before {
  content: "\F3C3";
}

.fa-magento:before {
  content: "\F3C4";
}

.fa-magic:before {
  content: "\F0D0";
}

.fa-magnet:before {
  content: "\F076";
}

.fa-mail-bulk:before {
  content: "\F674";
}

.fa-mailchimp:before {
  content: "\F59E";
}

.fa-male:before {
  content: "\F183";
}

.fa-mandalorian:before {
  content: "\F50F";
}

.fa-map:before {
  content: "\F279";
}

.fa-map-marked:before {
  content: "\F59F";
}

.fa-map-marked-alt:before {
  content: "\F5A0";
}

.fa-map-marker:before {
  content: "\F041";
}

.fa-map-marker-alt:before {
  content: "\F3C5";
}

.fa-map-pin:before {
  content: "\F276";
}

.fa-map-signs:before {
  content: "\F277";
}

.fa-markdown:before {
  content: "\F60F";
}

.fa-marker:before {
  content: "\F5A1";
}

.fa-mars:before {
  content: "\F222";
}

.fa-mars-double:before {
  content: "\F227";
}

.fa-mars-stroke:before {
  content: "\F229";
}

.fa-mars-stroke-h:before {
  content: "\F22B";
}

.fa-mars-stroke-v:before {
  content: "\F22A";
}

.fa-mask:before {
  content: "\F6FA";
}

.fa-mastodon:before {
  content: "\F4F6";
}

.fa-maxcdn:before {
  content: "\F136";
}

.fa-medal:before {
  content: "\F5A2";
}

.fa-medapps:before {
  content: "\F3C6";
}

.fa-medium:before {
  content: "\F23A";
}

.fa-medium-m:before {
  content: "\F3C7";
}

.fa-medkit:before {
  content: "\F0FA";
}

.fa-medrt:before {
  content: "\F3C8";
}

.fa-meetup:before {
  content: "\F2E0";
}

.fa-megaport:before {
  content: "\F5A3";
}

.fa-meh:before {
  content: "\F11A";
}

.fa-meh-blank:before {
  content: "\F5A4";
}

.fa-meh-rolling-eyes:before {
  content: "\F5A5";
}

.fa-memory:before {
  content: "\F538";
}

.fa-menorah:before {
  content: "\F676";
}

.fa-mercury:before {
  content: "\F223";
}

.fa-meteor:before {
  content: "\F753";
}

.fa-microchip:before {
  content: "\F2DB";
}

.fa-microphone:before {
  content: "\F130";
}

.fa-microphone-alt:before {
  content: "\F3C9";
}

.fa-microphone-alt-slash:before {
  content: "\F539";
}

.fa-microphone-slash:before {
  content: "\F131";
}

.fa-microscope:before {
  content: "\F610";
}

.fa-microsoft:before {
  content: "\F3CA";
}

.fa-minus:before {
  content: "\F068";
}

.fa-minus-circle:before {
  content: "\F056";
}

.fa-minus-square:before {
  content: "\F146";
}

.fa-mix:before {
  content: "\F3CB";
}

.fa-mixcloud:before {
  content: "\F289";
}

.fa-mizuni:before {
  content: "\F3CC";
}

.fa-mobile:before {
  content: "\F10B";
}

.fa-mobile-alt:before {
  content: "\F3CD";
}

.fa-modx:before {
  content: "\F285";
}

.fa-monero:before {
  content: "\F3D0";
}

.fa-money-bill:before {
  content: "\F0D6";
}

.fa-money-bill-alt:before {
  content: "\F3D1";
}

.fa-money-bill-wave:before {
  content: "\F53A";
}

.fa-money-bill-wave-alt:before {
  content: "\F53B";
}

.fa-money-check:before {
  content: "\F53C";
}

.fa-money-check-alt:before {
  content: "\F53D";
}

.fa-monument:before {
  content: "\F5A6";
}

.fa-moon:before {
  content: "\F186";
}

.fa-mortar-pestle:before {
  content: "\F5A7";
}

.fa-mosque:before {
  content: "\F678";
}

.fa-motorcycle:before {
  content: "\F21C";
}

.fa-mountain:before {
  content: "\F6FC";
}

.fa-mouse-pointer:before {
  content: "\F245";
}

.fa-music:before {
  content: "\F001";
}

.fa-napster:before {
  content: "\F3D2";
}

.fa-neos:before {
  content: "\F612";
}

.fa-network-wired:before {
  content: "\F6FF";
}

.fa-neuter:before {
  content: "\F22C";
}

.fa-newspaper:before {
  content: "\F1EA";
}

.fa-nimblr:before {
  content: "\F5A8";
}

.fa-nintendo-switch:before {
  content: "\F418";
}

.fa-node:before {
  content: "\F419";
}

.fa-node-js:before {
  content: "\F3D3";
}

.fa-not-equal:before {
  content: "\F53E";
}

.fa-notes-medical:before {
  content: "\F481";
}

.fa-npm:before {
  content: "\F3D4";
}

.fa-ns8:before {
  content: "\F3D5";
}

.fa-nutritionix:before {
  content: "\F3D6";
}

.fa-object-group:before {
  content: "\F247";
}

.fa-object-ungroup:before {
  content: "\F248";
}

.fa-odnoklassniki:before {
  content: "\F263";
}

.fa-odnoklassniki-square:before {
  content: "\F264";
}

.fa-oil-can:before {
  content: "\F613";
}

.fa-old-republic:before {
  content: "\F510";
}

.fa-om:before {
  content: "\F679";
}

.fa-opencart:before {
  content: "\F23D";
}

.fa-openid:before {
  content: "\F19B";
}

.fa-opera:before {
  content: "\F26A";
}

.fa-optin-monster:before {
  content: "\F23C";
}

.fa-osi:before {
  content: "\F41A";
}

.fa-otter:before {
  content: "\F700";
}

.fa-outdent:before {
  content: "\F03B";
}

.fa-page4:before {
  content: "\F3D7";
}

.fa-pagelines:before {
  content: "\F18C";
}

.fa-paint-brush:before {
  content: "\F1FC";
}

.fa-paint-roller:before {
  content: "\F5AA";
}

.fa-palette:before {
  content: "\F53F";
}

.fa-palfed:before {
  content: "\F3D8";
}

.fa-pallet:before {
  content: "\F482";
}

.fa-paper-plane:before {
  content: "\F1D8";
}

.fa-paperclip:before {
  content: "\F0C6";
}

.fa-parachute-box:before {
  content: "\F4CD";
}

.fa-paragraph:before {
  content: "\F1DD";
}

.fa-parking:before {
  content: "\F540";
}

.fa-passport:before {
  content: "\F5AB";
}

.fa-pastafarianism:before {
  content: "\F67B";
}

.fa-paste:before {
  content: "\F0EA";
}

.fa-patreon:before {
  content: "\F3D9";
}

.fa-pause:before {
  content: "\F04C";
}

.fa-pause-circle:before {
  content: "\F28B";
}

.fa-paw:before {
  content: "\F1B0";
}

.fa-paypal:before {
  content: "\F1ED";
}

.fa-peace:before {
  content: "\F67C";
}

.fa-pen:before {
  content: "\F304";
}

.fa-pen-alt:before {
  content: "\F305";
}

.fa-pen-fancy:before {
  content: "\F5AC";
}

.fa-pen-nib:before {
  content: "\F5AD";
}

.fa-pen-square:before {
  content: "\F14B";
}

.fa-pencil-alt:before {
  content: "\F303";
}

.fa-pencil-ruler:before {
  content: "\F5AE";
}

.fa-penny-arcade:before {
  content: "\F704";
}

.fa-people-carry:before {
  content: "\F4CE";
}

.fa-percent:before {
  content: "\F295";
}

.fa-percentage:before {
  content: "\F541";
}

.fa-periscope:before {
  content: "\F3DA";
}

.fa-person-booth:before {
  content: "\F756";
}

.fa-phabricator:before {
  content: "\F3DB";
}

.fa-phoenix-framework:before {
  content: "\F3DC";
}

.fa-phoenix-squadron:before {
  content: "\F511";
}

.fa-phone:before {
  content: "\F095";
}

.fa-phone-slash:before {
  content: "\F3DD";
}

.fa-phone-square:before {
  content: "\F098";
}

.fa-phone-volume:before {
  content: "\F2A0";
}

.fa-php:before {
  content: "\F457";
}

.fa-pied-piper:before {
  content: "\F2AE";
}

.fa-pied-piper-alt:before {
  content: "\F1A8";
}

.fa-pied-piper-hat:before {
  content: "\F4E5";
}

.fa-pied-piper-pp:before {
  content: "\F1A7";
}

.fa-piggy-bank:before {
  content: "\F4D3";
}

.fa-pills:before {
  content: "\F484";
}

.fa-pinterest:before {
  content: "\F0D2";
}

.fa-pinterest-p:before {
  content: "\F231";
}

.fa-pinterest-square:before {
  content: "\F0D3";
}

.fa-place-of-worship:before {
  content: "\F67F";
}

.fa-plane:before {
  content: "\F072";
}

.fa-plane-arrival:before {
  content: "\F5AF";
}

.fa-plane-departure:before {
  content: "\F5B0";
}

.fa-play:before {
  content: "\F04B";
}

.fa-play-circle:before {
  content: "\F144";
}

.fa-playstation:before {
  content: "\F3DF";
}

.fa-plug:before {
  content: "\F1E6";
}

.fa-plus:before {
  content: "\F067";
}

.fa-plus-circle:before {
  content: "\F055";
}

.fa-plus-square:before {
  content: "\F0FE";
}

.fa-podcast:before {
  content: "\F2CE";
}

.fa-poll:before {
  content: "\F681";
}

.fa-poll-h:before {
  content: "\F682";
}

.fa-poo:before {
  content: "\F2FE";
}

.fa-poo-storm:before {
  content: "\F75A";
}

.fa-poop:before {
  content: "\F619";
}

.fa-portrait:before {
  content: "\F3E0";
}

.fa-pound-sign:before {
  content: "\F154";
}

.fa-power-off:before {
  content: "\F011";
}

.fa-pray:before {
  content: "\F683";
}

.fa-praying-hands:before {
  content: "\F684";
}

.fa-prescription:before {
  content: "\F5B1";
}

.fa-prescription-bottle:before {
  content: "\F485";
}

.fa-prescription-bottle-alt:before {
  content: "\F486";
}

.fa-print:before {
  content: "\F02F";
}

.fa-procedures:before {
  content: "\F487";
}

.fa-product-hunt:before {
  content: "\F288";
}

.fa-project-diagram:before {
  content: "\F542";
}

.fa-pushed:before {
  content: "\F3E1";
}

.fa-puzzle-piece:before {
  content: "\F12E";
}

.fa-python:before {
  content: "\F3E2";
}

.fa-qq:before {
  content: "\F1D6";
}

.fa-qrcode:before {
  content: "\F029";
}

.fa-question:before {
  content: "\F128";
}

.fa-question-circle:before {
  content: "\F059";
}

.fa-quidditch:before {
  content: "\F458";
}

.fa-quinscape:before {
  content: "\F459";
}

.fa-quora:before {
  content: "\F2C4";
}

.fa-quote-left:before {
  content: "\F10D";
}

.fa-quote-right:before {
  content: "\F10E";
}

.fa-quran:before {
  content: "\F687";
}

.fa-r-project:before {
  content: "\F4F7";
}

.fa-rainbow:before {
  content: "\F75B";
}

.fa-random:before {
  content: "\F074";
}

.fa-ravelry:before {
  content: "\F2D9";
}

.fa-react:before {
  content: "\F41B";
}

.fa-reacteurope:before {
  content: "\F75D";
}

.fa-readme:before {
  content: "\F4D5";
}

.fa-rebel:before {
  content: "\F1D0";
}

.fa-receipt:before {
  content: "\F543";
}

.fa-recycle:before {
  content: "\F1B8";
}

.fa-red-river:before {
  content: "\F3E3";
}

.fa-reddit:before {
  content: "\F1A1";
}

.fa-reddit-alien:before {
  content: "\F281";
}

.fa-reddit-square:before {
  content: "\F1A2";
}

.fa-redo:before {
  content: "\F01E";
}

.fa-redo-alt:before {
  content: "\F2F9";
}

.fa-registered:before {
  content: "\F25D";
}

.fa-renren:before {
  content: "\F18B";
}

.fa-reply:before {
  content: "\F3E5";
}

.fa-reply-all:before {
  content: "\F122";
}

.fa-replyd:before {
  content: "\F3E6";
}

.fa-republican:before {
  content: "\F75E";
}

.fa-researchgate:before {
  content: "\F4F8";
}

.fa-resolving:before {
  content: "\F3E7";
}

.fa-retweet:before {
  content: "\F079";
}

.fa-rev:before {
  content: "\F5B2";
}

.fa-ribbon:before {
  content: "\F4D6";
}

.fa-ring:before {
  content: "\F70B";
}

.fa-road:before {
  content: "\F018";
}

.fa-robot:before {
  content: "\F544";
}

.fa-rocket:before {
  content: "\F135";
}

.fa-rocketchat:before {
  content: "\F3E8";
}

.fa-rockrms:before {
  content: "\F3E9";
}

.fa-route:before {
  content: "\F4D7";
}

.fa-rss:before {
  content: "\F09E";
}

.fa-rss-square:before {
  content: "\F143";
}

.fa-ruble-sign:before {
  content: "\F158";
}

.fa-ruler:before {
  content: "\F545";
}

.fa-ruler-combined:before {
  content: "\F546";
}

.fa-ruler-horizontal:before {
  content: "\F547";
}

.fa-ruler-vertical:before {
  content: "\F548";
}

.fa-running:before {
  content: "\F70C";
}

.fa-rupee-sign:before {
  content: "\F156";
}

.fa-sad-cry:before {
  content: "\F5B3";
}

.fa-sad-tear:before {
  content: "\F5B4";
}

.fa-safari:before {
  content: "\F267";
}

.fa-sass:before {
  content: "\F41E";
}

.fa-save:before {
  content: "\F0C7";
}

.fa-schlix:before {
  content: "\F3EA";
}

.fa-school:before {
  content: "\F549";
}

.fa-screwdriver:before {
  content: "\F54A";
}

.fa-scribd:before {
  content: "\F28A";
}

.fa-scroll:before {
  content: "\F70E";
}

.fa-search:before {
  content: "\F002";
}

.fa-search-dollar:before {
  content: "\F688";
}

.fa-search-location:before {
  content: "\F689";
}

.fa-search-minus:before {
  content: "\F010";
}

.fa-search-plus:before {
  content: "\F00E";
}

.fa-searchengin:before {
  content: "\F3EB";
}

.fa-seedling:before {
  content: "\F4D8";
}

.fa-sellcast:before {
  content: "\F2DA";
}

.fa-sellsy:before {
  content: "\F213";
}

.fa-server:before {
  content: "\F233";
}

.fa-servicestack:before {
  content: "\F3EC";
}

.fa-shapes:before {
  content: "\F61F";
}

.fa-share:before {
  content: "\F064";
}

.fa-share-alt:before {
  content: "\F1E0";
}

.fa-share-alt-square:before {
  content: "\F1E1";
}

.fa-share-square:before {
  content: "\F14D";
}

.fa-shekel-sign:before {
  content: "\F20B";
}

.fa-shield-alt:before {
  content: "\F3ED";
}

.fa-ship:before {
  content: "\F21A";
}

.fa-shipping-fast:before {
  content: "\F48B";
}

.fa-shirtsinbulk:before {
  content: "\F214";
}

.fa-shoe-prints:before {
  content: "\F54B";
}

.fa-shopping-bag:before {
  content: "\F290";
}

.fa-shopping-basket:before {
  content: "\F291";
}

.fa-shopping-cart:before {
  content: "\F07A";
}

.fa-shopware:before {
  content: "\F5B5";
}

.fa-shower:before {
  content: "\F2CC";
}

.fa-shuttle-van:before {
  content: "\F5B6";
}

.fa-sign:before {
  content: "\F4D9";
}

.fa-sign-in-alt:before {
  content: "\F2F6";
}

.fa-sign-language:before {
  content: "\F2A7";
}

.fa-sign-out-alt:before {
  content: "\F2F5";
}

.fa-signal:before {
  content: "\F012";
}

.fa-signature:before {
  content: "\F5B7";
}

.fa-simplybuilt:before {
  content: "\F215";
}

.fa-sistrix:before {
  content: "\F3EE";
}

.fa-sitemap:before {
  content: "\F0E8";
}

.fa-sith:before {
  content: "\F512";
}

.fa-skull:before {
  content: "\F54C";
}

.fa-skull-crossbones:before {
  content: "\F714";
}

.fa-skyatlas:before {
  content: "\F216";
}

.fa-skype:before {
  content: "\F17E";
}

.fa-slack:before {
  content: "\F198";
}

.fa-slack-hash:before {
  content: "\F3EF";
}

.fa-slash:before {
  content: "\F715";
}

.fa-sliders-h:before {
  content: "\F1DE";
}

.fa-slideshare:before {
  content: "\F1E7";
}

.fa-smile:before {
  content: "\F118";
}

.fa-smile-beam:before {
  content: "\F5B8";
}

.fa-smile-wink:before {
  content: "\F4DA";
}

.fa-smog:before {
  content: "\F75F";
}

.fa-smoking:before {
  content: "\F48D";
}

.fa-smoking-ban:before {
  content: "\F54D";
}

.fa-snapchat:before {
  content: "\F2AB";
}

.fa-snapchat-ghost:before {
  content: "\F2AC";
}

.fa-snapchat-square:before {
  content: "\F2AD";
}

.fa-snowflake:before {
  content: "\F2DC";
}

.fa-socks:before {
  content: "\F696";
}

.fa-solar-panel:before {
  content: "\F5BA";
}

.fa-sort:before {
  content: "\F0DC";
}

.fa-sort-alpha-down:before {
  content: "\F15D";
}

.fa-sort-alpha-up:before {
  content: "\F15E";
}

.fa-sort-amount-down:before {
  content: "\F160";
}

.fa-sort-amount-up:before {
  content: "\F161";
}

.fa-sort-down:before {
  content: "\F0DD";
}

.fa-sort-numeric-down:before {
  content: "\F162";
}

.fa-sort-numeric-up:before {
  content: "\F163";
}

.fa-sort-up:before {
  content: "\F0DE";
}

.fa-soundcloud:before {
  content: "\F1BE";
}

.fa-spa:before {
  content: "\F5BB";
}

.fa-space-shuttle:before {
  content: "\F197";
}

.fa-speakap:before {
  content: "\F3F3";
}

.fa-spider:before {
  content: "\F717";
}

.fa-spinner:before {
  content: "\F110";
}

.fa-splotch:before {
  content: "\F5BC";
}

.fa-spotify:before {
  content: "\F1BC";
}

.fa-spray-can:before {
  content: "\F5BD";
}

.fa-square:before {
  content: "\F0C8";
}

.fa-square-full:before {
  content: "\F45C";
}

.fa-square-root-alt:before {
  content: "\F698";
}

.fa-squarespace:before {
  content: "\F5BE";
}

.fa-stack-exchange:before {
  content: "\F18D";
}

.fa-stack-overflow:before {
  content: "\F16C";
}

.fa-stamp:before {
  content: "\F5BF";
}

.fa-star:before {
  content: "\F005";
}

.fa-star-and-crescent:before {
  content: "\F699";
}

.fa-star-half:before {
  content: "\F089";
}

.fa-star-half-alt:before {
  content: "\F5C0";
}

.fa-star-of-david:before {
  content: "\F69A";
}

.fa-star-of-life:before {
  content: "\F621";
}

.fa-staylinked:before {
  content: "\F3F5";
}

.fa-steam:before {
  content: "\F1B6";
}

.fa-steam-square:before {
  content: "\F1B7";
}

.fa-steam-symbol:before {
  content: "\F3F6";
}

.fa-step-backward:before {
  content: "\F048";
}

.fa-step-forward:before {
  content: "\F051";
}

.fa-stethoscope:before {
  content: "\F0F1";
}

.fa-sticker-mule:before {
  content: "\F3F7";
}

.fa-sticky-note:before {
  content: "\F249";
}

.fa-stop:before {
  content: "\F04D";
}

.fa-stop-circle:before {
  content: "\F28D";
}

.fa-stopwatch:before {
  content: "\F2F2";
}

.fa-store:before {
  content: "\F54E";
}

.fa-store-alt:before {
  content: "\F54F";
}

.fa-strava:before {
  content: "\F428";
}

.fa-stream:before {
  content: "\F550";
}

.fa-street-view:before {
  content: "\F21D";
}

.fa-strikethrough:before {
  content: "\F0CC";
}

.fa-stripe:before {
  content: "\F429";
}

.fa-stripe-s:before {
  content: "\F42A";
}

.fa-stroopwafel:before {
  content: "\F551";
}

.fa-studiovinari:before {
  content: "\F3F8";
}

.fa-stumbleupon:before {
  content: "\F1A4";
}

.fa-stumbleupon-circle:before {
  content: "\F1A3";
}

.fa-subscript:before {
  content: "\F12C";
}

.fa-subway:before {
  content: "\F239";
}

.fa-suitcase:before {
  content: "\F0F2";
}

.fa-suitcase-rolling:before {
  content: "\F5C1";
}

.fa-sun:before {
  content: "\F185";
}

.fa-superpowers:before {
  content: "\F2DD";
}

.fa-superscript:before {
  content: "\F12B";
}

.fa-supple:before {
  content: "\F3F9";
}

.fa-surprise:before {
  content: "\F5C2";
}

.fa-swatchbook:before {
  content: "\F5C3";
}

.fa-swimmer:before {
  content: "\F5C4";
}

.fa-swimming-pool:before {
  content: "\F5C5";
}

.fa-synagogue:before {
  content: "\F69B";
}

.fa-sync:before {
  content: "\F021";
}

.fa-sync-alt:before {
  content: "\F2F1";
}

.fa-syringe:before {
  content: "\F48E";
}

.fa-table:before {
  content: "\F0CE";
}

.fa-table-tennis:before {
  content: "\F45D";
}

.fa-tablet:before {
  content: "\F10A";
}

.fa-tablet-alt:before {
  content: "\F3FA";
}

.fa-tablets:before {
  content: "\F490";
}

.fa-tachometer-alt:before {
  content: "\F3FD";
}

.fa-tag:before {
  content: "\F02B";
}

.fa-tags:before {
  content: "\F02C";
}

.fa-tape:before {
  content: "\F4DB";
}

.fa-tasks:before {
  content: "\F0AE";
}

.fa-taxi:before {
  content: "\F1BA";
}

.fa-teamspeak:before {
  content: "\F4F9";
}

.fa-teeth:before {
  content: "\F62E";
}

.fa-teeth-open:before {
  content: "\F62F";
}

.fa-telegram:before {
  content: "\F2C6";
}

.fa-telegram-plane:before {
  content: "\F3FE";
}

.fa-temperature-high:before {
  content: "\F769";
}

.fa-temperature-low:before {
  content: "\F76B";
}

.fa-tencent-weibo:before {
  content: "\F1D5";
}

.fa-terminal:before {
  content: "\F120";
}

.fa-text-height:before {
  content: "\F034";
}

.fa-text-width:before {
  content: "\F035";
}

.fa-th:before {
  content: "\F00A";
}

.fa-th-large:before {
  content: "\F009";
}

.fa-th-list:before {
  content: "\F00B";
}

.fa-the-red-yeti:before {
  content: "\F69D";
}

.fa-theater-masks:before {
  content: "\F630";
}

.fa-themeco:before {
  content: "\F5C6";
}

.fa-themeisle:before {
  content: "\F2B2";
}

.fa-thermometer:before {
  content: "\F491";
}

.fa-thermometer-empty:before {
  content: "\F2CB";
}

.fa-thermometer-full:before {
  content: "\F2C7";
}

.fa-thermometer-half:before {
  content: "\F2C9";
}

.fa-thermometer-quarter:before {
  content: "\F2CA";
}

.fa-thermometer-three-quarters:before {
  content: "\F2C8";
}

.fa-think-peaks:before {
  content: "\F731";
}

.fa-thumbs-down:before {
  content: "\F165";
}

.fa-thumbs-up:before {
  content: "\F164";
}

.fa-thumbtack:before {
  content: "\F08D";
}

.fa-ticket-alt:before {
  content: "\F3FF";
}

.fa-times:before {
  content: "\F00D";
}

.fa-times-circle:before {
  content: "\F057";
}

.fa-tint:before {
  content: "\F043";
}

.fa-tint-slash:before {
  content: "\F5C7";
}

.fa-tired:before {
  content: "\F5C8";
}

.fa-toggle-off:before {
  content: "\F204";
}

.fa-toggle-on:before {
  content: "\F205";
}

.fa-toilet-paper:before {
  content: "\F71E";
}

.fa-toolbox:before {
  content: "\F552";
}

.fa-tooth:before {
  content: "\F5C9";
}

.fa-torah:before {
  content: "\F6A0";
}

.fa-torii-gate:before {
  content: "\F6A1";
}

.fa-tractor:before {
  content: "\F722";
}

.fa-trade-federation:before {
  content: "\F513";
}

.fa-trademark:before {
  content: "\F25C";
}

.fa-traffic-light:before {
  content: "\F637";
}

.fa-train:before {
  content: "\F238";
}

.fa-transgender:before {
  content: "\F224";
}

.fa-transgender-alt:before {
  content: "\F225";
}

.fa-trash:before {
  content: "\F1F8";
}

.fa-trash-alt:before {
  content: "\F2ED";
}

.fa-tree:before {
  content: "\F1BB";
}

.fa-trello:before {
  content: "\F181";
}

.fa-tripadvisor:before {
  content: "\F262";
}

.fa-trophy:before {
  content: "\F091";
}

.fa-truck:before {
  content: "\F0D1";
}

.fa-truck-loading:before {
  content: "\F4DE";
}

.fa-truck-monster:before {
  content: "\F63B";
}

.fa-truck-moving:before {
  content: "\F4DF";
}

.fa-truck-pickup:before {
  content: "\F63C";
}

.fa-tshirt:before {
  content: "\F553";
}

.fa-tty:before {
  content: "\F1E4";
}

.fa-tumblr:before {
  content: "\F173";
}

.fa-tumblr-square:before {
  content: "\F174";
}

.fa-tv:before {
  content: "\F26C";
}

.fa-twitch:before {
  content: "\F1E8";
}

.fa-twitter:before {
  content: "\F099";
}

.fa-twitter-square:before {
  content: "\F081";
}

.fa-typo3:before {
  content: "\F42B";
}

.fa-uber:before {
  content: "\F402";
}

.fa-uikit:before {
  content: "\F403";
}

.fa-umbrella:before {
  content: "\F0E9";
}

.fa-umbrella-beach:before {
  content: "\F5CA";
}

.fa-underline:before {
  content: "\F0CD";
}

.fa-undo:before {
  content: "\F0E2";
}

.fa-undo-alt:before {
  content: "\F2EA";
}

.fa-uniregistry:before {
  content: "\F404";
}

.fa-universal-access:before {
  content: "\F29A";
}

.fa-university:before {
  content: "\F19C";
}

.fa-unlink:before {
  content: "\F127";
}

.fa-unlock:before {
  content: "\F09C";
}

.fa-unlock-alt:before {
  content: "\F13E";
}

.fa-untappd:before {
  content: "\F405";
}

.fa-upload:before {
  content: "\F093";
}

.fa-usb:before {
  content: "\F287";
}

.fa-user:before {
  content: "\F007";
}

.fa-user-alt:before {
  content: "\F406";
}

.fa-user-alt-slash:before {
  content: "\F4FA";
}

.fa-user-astronaut:before {
  content: "\F4FB";
}

.fa-user-check:before {
  content: "\F4FC";
}

.fa-user-circle:before {
  content: "\F2BD";
}

.fa-user-clock:before {
  content: "\F4FD";
}

.fa-user-cog:before {
  content: "\F4FE";
}

.fa-user-edit:before {
  content: "\F4FF";
}

.fa-user-friends:before {
  content: "\F500";
}

.fa-user-graduate:before {
  content: "\F501";
}

.fa-user-injured:before {
  content: "\F728";
}

.fa-user-lock:before {
  content: "\F502";
}

.fa-user-md:before {
  content: "\F0F0";
}

.fa-user-minus:before {
  content: "\F503";
}

.fa-user-ninja:before {
  content: "\F504";
}

.fa-user-plus:before {
  content: "\F234";
}

.fa-user-secret:before {
  content: "\F21B";
}

.fa-user-shield:before {
  content: "\F505";
}

.fa-user-slash:before {
  content: "\F506";
}

.fa-user-tag:before {
  content: "\F507";
}

.fa-user-tie:before {
  content: "\F508";
}

.fa-user-times:before {
  content: "\F235";
}

.fa-users:before {
  content: "\F0C0";
}

.fa-users-cog:before {
  content: "\F509";
}

.fa-ussunnah:before {
  content: "\F407";
}

.fa-utensil-spoon:before {
  content: "\F2E5";
}

.fa-utensils:before {
  content: "\F2E7";
}

.fa-vaadin:before {
  content: "\F408";
}

.fa-vector-square:before {
  content: "\F5CB";
}

.fa-venus:before {
  content: "\F221";
}

.fa-venus-double:before {
  content: "\F226";
}

.fa-venus-mars:before {
  content: "\F228";
}

.fa-viacoin:before {
  content: "\F237";
}

.fa-viadeo:before {
  content: "\F2A9";
}

.fa-viadeo-square:before {
  content: "\F2AA";
}

.fa-vial:before {
  content: "\F492";
}

.fa-vials:before {
  content: "\F493";
}

.fa-viber:before {
  content: "\F409";
}

.fa-video:before {
  content: "\F03D";
}

.fa-video-slash:before {
  content: "\F4E2";
}

.fa-vihara:before {
  content: "\F6A7";
}

.fa-vimeo:before {
  content: "\F40A";
}

.fa-vimeo-square:before {
  content: "\F194";
}

.fa-vimeo-v:before {
  content: "\F27D";
}

.fa-vine:before {
  content: "\F1CA";
}

.fa-vk:before {
  content: "\F189";
}

.fa-vnv:before {
  content: "\F40B";
}

.fa-volleyball-ball:before {
  content: "\F45F";
}

.fa-volume-down:before {
  content: "\F027";
}

.fa-volume-mute:before {
  content: "\F6A9";
}

.fa-volume-off:before {
  content: "\F026";
}

.fa-volume-up:before {
  content: "\F028";
}

.fa-vote-yea:before {
  content: "\F772";
}

.fa-vr-cardboard:before {
  content: "\F729";
}

.fa-vuejs:before {
  content: "\F41F";
}

.fa-walking:before {
  content: "\F554";
}

.fa-wallet:before {
  content: "\F555";
}

.fa-warehouse:before {
  content: "\F494";
}

.fa-water:before {
  content: "\F773";
}

.fa-weebly:before {
  content: "\F5CC";
}

.fa-weibo:before {
  content: "\F18A";
}

.fa-weight:before {
  content: "\F496";
}

.fa-weight-hanging:before {
  content: "\F5CD";
}

.fa-weixin:before {
  content: "\F1D7";
}

.fa-whatsapp:before {
  content: "\F232";
}

.fa-whatsapp-square:before {
  content: "\F40C";
}

.fa-wheelchair:before {
  content: "\F193";
}

.fa-whmcs:before {
  content: "\F40D";
}

.fa-wifi:before {
  content: "\F1EB";
}

.fa-wikipedia-w:before {
  content: "\F266";
}

.fa-wind:before {
  content: "\F72E";
}

.fa-window-close:before {
  content: "\F410";
}

.fa-window-maximize:before {
  content: "\F2D0";
}

.fa-window-minimize:before {
  content: "\F2D1";
}

.fa-window-restore:before {
  content: "\F2D2";
}

.fa-windows:before {
  content: "\F17A";
}

.fa-wine-bottle:before {
  content: "\F72F";
}

.fa-wine-glass:before {
  content: "\F4E3";
}

.fa-wine-glass-alt:before {
  content: "\F5CE";
}

.fa-wix:before {
  content: "\F5CF";
}

.fa-wizards-of-the-coast:before {
  content: "\F730";
}

.fa-wolf-pack-battalion:before {
  content: "\F514";
}

.fa-won-sign:before {
  content: "\F159";
}

.fa-wordpress:before {
  content: "\F19A";
}

.fa-wordpress-simple:before {
  content: "\F411";
}

.fa-wpbeginner:before {
  content: "\F297";
}

.fa-wpexplorer:before {
  content: "\F2DE";
}

.fa-wpforms:before {
  content: "\F298";
}

.fa-wpressr:before {
  content: "\F3E4";
}

.fa-wrench:before {
  content: "\F0AD";
}

.fa-x-ray:before {
  content: "\F497";
}

.fa-xbox:before {
  content: "\F412";
}

.fa-xing:before {
  content: "\F168";
}

.fa-xing-square:before {
  content: "\F169";
}

.fa-y-combinator:before {
  content: "\F23B";
}

.fa-yahoo:before {
  content: "\F19E";
}

.fa-yandex:before {
  content: "\F413";
}

.fa-yandex-international:before {
  content: "\F414";
}

.fa-yelp:before {
  content: "\F1E9";
}

.fa-yen-sign:before {
  content: "\F157";
}

.fa-yin-yang:before {
  content: "\F6AD";
}

.fa-yoast:before {
  content: "\F2B1";
}

.fa-youtube:before {
  content: "\F167";
}

.fa-youtube-square:before {
  content: "\F431";
}

.fa-zhihu:before {
  content: "\F63F";
}

.sr-only {
  border: 0;
  clip: rect(0, 0, 0, 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.sr-only-focusable:active,
.sr-only-focusable:focus {
  clip: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  position: static;
  width: auto;
}

/*!
 * Font Awesome Free 5.5.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */

@font-face {
  font-family: 'Font Awesome 5 Free';
  font-style: normal;
  font-weight: 900;
  src: url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-solid-900.eot?f29ad0031ad2c1c14b771ce504e2bfa7);
  src: url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-solid-900.eot?f29ad0031ad2c1c14b771ce504e2bfa7) format("embedded-opentype"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-solid-900.woff2?fb493903265cad425ccdf8e04fc2de61) format("woff2"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-solid-900.woff?bcb927a742a8370b76642fd1a9a749c0) format("woff"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-solid-900.ttf?48f54f63d7711d0912a9a10205538fc4) format("truetype"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-solid-900.svg?4478b4d7022cad174e4c04246fe622ef) format("svg");
}

.fa,
.fas {
  font-family: 'Font Awesome 5 Free';
  font-weight: 900;
}

/*!
 * Font Awesome Free 5.5.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */

@font-face {
  font-family: 'Font Awesome 5 Free';
  font-style: normal;
  font-weight: 400;
  src: url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-regular-400.eot?6493321d567eb0f22bd5112fbcf044a8);
  src: url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-regular-400.eot?6493321d567eb0f22bd5112fbcf044a8) format("embedded-opentype"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-regular-400.woff2?bdadb6ce95c5a2e7b673940721450d3c) format("woff2"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-regular-400.woff?0b5e3a5451fc62d9023ccafc85bc89db) format("woff"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-regular-400.ttf?b48c48ea8457846a5695b139c377d3d1) format("truetype"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-regular-400.svg?0c41971339b9fc5b1cefb0abad1e2e69) format("svg");
}

.far {
  font-family: 'Font Awesome 5 Free';
  font-weight: 400;
}

/*!
 * Font Awesome Free 5.5.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */

@font-face {
  font-family: 'Font Awesome 5 Brands';
  font-style: normal;
  font-weight: normal;
  src: url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-brands-400.eot?ec0716ae8aa1ba781a1a6bcbce833f6c);
  src: url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-brands-400.eot?ec0716ae8aa1ba781a1a6bcbce833f6c) format("embedded-opentype"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-brands-400.woff2?659c4d58b00226541ef95c3a76e169c5) format("woff2"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-brands-400.woff?8b7a9afd7b95f62e6ee8a72930bfb9ed) format("woff"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-brands-400.ttf?b69de69a4ff8ca0abe96ec0b0c180c5b) format("truetype"), url(../fonts/vendor/@fortawesome/fontawesome-free/webfa-brands-400.svg?42f9fd6acee87559ac0d6a33488db65e) format("svg");
}

.fab {
  font-family: 'Font Awesome 5 Brands';
}

body.fancybox-active {
  overflow: hidden;
}

body.fancybox-iosfix {
  position: fixed;
  left: 0;
  right: 0;
}

.fancybox-is-hidden {
  position: absolute;
  top: -9999px;
  left: -9999px;
  visibility: hidden;
}

.fancybox-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 99992;
  -webkit-tap-highlight-color: transparent;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

.fancybox-outer,
.fancybox-inner,
.fancybox-bg,
.fancybox-stage {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}

.fancybox-outer {
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}

.fancybox-bg {
  background: #1e1e1e;
  opacity: 0;
  -webkit-transition-duration: inherit;
          transition-duration: inherit;
  -webkit-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: cubic-bezier(0.47, 0, 0.74, 0.71);
          transition-timing-function: cubic-bezier(0.47, 0, 0.74, 0.71);
}

.fancybox-is-open .fancybox-bg {
  opacity: 0.87;
  -webkit-transition-timing-function: cubic-bezier(0.22, 0.61, 0.36, 1);
          transition-timing-function: cubic-bezier(0.22, 0.61, 0.36, 1);
}

.fancybox-infobar,
.fancybox-toolbar,
.fancybox-caption-wrap {
  position: absolute;
  direction: ltr;
  z-index: 99997;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity .25s, visibility 0s linear .25s;
  transition: opacity .25s, visibility 0s linear .25s;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

.fancybox-show-infobar .fancybox-infobar,
.fancybox-show-toolbar .fancybox-toolbar,
.fancybox-show-caption .fancybox-caption-wrap {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity .25s, visibility 0s;
  transition: opacity .25s, visibility 0s;
}

.fancybox-infobar {
  top: 0;
  left: 0;
  font-size: 13px;
  padding: 0 10px;
  height: 44px;
  min-width: 44px;
  line-height: 44px;
  color: #ccc;
  text-align: center;
  pointer-events: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-touch-callout: none;
  -webkit-tap-highlight-color: transparent;
  -webkit-font-smoothing: subpixel-antialiased;
  mix-blend-mode: exclusion;
}

.fancybox-toolbar {
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
}

.fancybox-stage {
  overflow: hidden;
  direction: ltr;
  z-index: 99994;
  -webkit-transform: translate3d(0, 0, 0);
}

.fancybox-is-closing .fancybox-stage {
  overflow: visible;
}

.fancybox-slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: auto;
  outline: none;
  white-space: normal;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  text-align: center;
  z-index: 99994;
  -webkit-overflow-scrolling: touch;
  display: none;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition-property: opacity, -webkit-transform;
  -webkit-transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
}

.fancybox-slide::before {
  content: '';
  display: inline-block;
  vertical-align: middle;
  height: 100%;
  width: 0;
}

.fancybox-is-sliding .fancybox-slide,
.fancybox-slide--previous,
.fancybox-slide--current,
.fancybox-slide--next {
  display: block;
}

.fancybox-slide--image {
  overflow: visible;
}

.fancybox-slide--image::before {
  display: none;
}

.fancybox-slide--video .fancybox-content,
.fancybox-slide--video iframe {
  background: #000;
}

.fancybox-slide--map .fancybox-content,
.fancybox-slide--map iframe {
  background: #E5E3DF;
}

.fancybox-slide--next {
  z-index: 99995;
}

.fancybox-slide > * {
  display: inline-block;
  position: relative;
  padding: 24px;
  margin: 44px 0 44px;
  border-width: 0;
  vertical-align: middle;
  text-align: left;
  background-color: #fff;
  overflow: auto;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

.fancybox-slide > title,
.fancybox-slide > style,
.fancybox-slide > meta,
.fancybox-slide > link,
.fancybox-slide > script,
.fancybox-slide > base {
  display: none;
}

.fancybox-slide .fancybox-image-wrap {
  position: absolute;
  top: 0;
  left: 0;
  margin: 0;
  padding: 0;
  border: 0;
  z-index: 99995;
  background: transparent;
  cursor: default;
  overflow: visible;
  -webkit-transform-origin: top left;
  transform-origin: top left;
  background-size: 100% 100%;
  background-repeat: no-repeat;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  transition-property: opacity, -webkit-transform;
  -webkit-transition-property: opacity, -webkit-transform;
  transition-property: transform, opacity;
  transition-property: transform, opacity, -webkit-transform;
}

.fancybox-can-zoomOut .fancybox-image-wrap {
  cursor: -webkit-zoom-out;
  cursor: zoom-out;
}

.fancybox-can-zoomIn .fancybox-image-wrap {
  cursor: -webkit-zoom-in;
  cursor: zoom-in;
}

.fancybox-can-drag .fancybox-image-wrap {
  cursor: -webkit-grab;
  cursor: grab;
}

.fancybox-is-dragging .fancybox-image-wrap {
  cursor: -webkit-grabbing;
  cursor: grabbing;
}

.fancybox-image,
.fancybox-spaceball {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  border: 0;
  max-width: none;
  max-height: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.fancybox-spaceball {
  z-index: 1;
}

.fancybox-slide--iframe .fancybox-content {
  padding: 0;
  width: 80%;
  height: 80%;
  max-width: calc(100% - 100px);
  max-height: calc(100% - 88px);
  overflow: visible;
  background: #fff;
}

.fancybox-iframe {
  display: block;
  margin: 0;
  padding: 0;
  border: 0;
  width: 100%;
  height: 100%;
  background: #fff;
}

.fancybox-error {
  margin: 0;
  padding: 40px;
  width: 100%;
  max-width: 380px;
  background: #fff;
  cursor: default;
}

.fancybox-error p {
  margin: 0;
  padding: 0;
  color: #444;
  font-size: 16px;
  line-height: 20px;
}

/* Buttons */

.fancybox-button {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  display: inline-block;
  vertical-align: top;
  width: 44px;
  height: 44px;
  margin: 0;
  padding: 10px;
  border: 0;
  border-radius: 0;
  background: rgba(30, 30, 30, 0.6);
  -webkit-transition: color .3s ease;
  transition: color .3s ease;
  cursor: pointer;
  outline: none;
}

.fancybox-button,
.fancybox-button:visited,
.fancybox-button:link {
  color: #ccc;
}

.fancybox-button:focus,
.fancybox-button:hover {
  color: #fff;
}

.fancybox-button[disabled] {
  color: #ccc;
  cursor: default;
  opacity: 0.6;
}

.fancybox-button svg {
  display: block;
  position: relative;
  overflow: visible;
  shape-rendering: geometricPrecision;
}

.fancybox-button svg path {
  fill: currentColor;
  stroke: currentColor;
  stroke-linejoin: round;
  stroke-width: 3;
}

.fancybox-button--share svg path {
  stroke-width: 1;
}

.fancybox-button--play svg path:nth-child(2) {
  display: none;
}

.fancybox-button--pause svg path:nth-child(1) {
  display: none;
}

.fancybox-button--zoom svg path {
  fill: transparent;
}

/* Navigation arrows */

.fancybox-navigation {
  display: none;
}

.fancybox-show-nav .fancybox-navigation {
  display: block;
}

.fancybox-navigation button {
  position: absolute;
  top: 50%;
  margin: -50px 0 0 0;
  z-index: 99997;
  background: transparent;
  width: 60px;
  height: 100px;
  padding: 17px;
}

.fancybox-navigation button:before {
  content: "";
  position: absolute;
  top: 30px;
  right: 10px;
  width: 40px;
  height: 40px;
  background: rgba(30, 30, 30, 0.6);
}

.fancybox-navigation .fancybox-button--arrow_left {
  left: 0;
}

.fancybox-navigation .fancybox-button--arrow_right {
  right: 0;
}

/* Close button on the top right corner of html content */

.fancybox-close-small {
  position: absolute;
  top: 0;
  right: 0;
  width: 40px;
  height: 40px;
  padding: 0;
  margin: 0;
  border: 0;
  border-radius: 0;
  background: transparent;
  z-index: 10;
  cursor: pointer;
}

.fancybox-close-small:after {
  content: '\D7';
  position: absolute;
  top: 5px;
  right: 5px;
  width: 30px;
  height: 30px;
  font: 22px/30px Arial,"Helvetica Neue",Helvetica,sans-serif;
  color: #888;
  font-weight: 300;
  text-align: center;
  border-radius: 50%;
  border-width: 0;
  background-color: transparent;
  -webkit-transition: background-color .25s;
  transition: background-color .25s;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  z-index: 2;
}

.fancybox-close-small:focus {
  outline: none;
}

.fancybox-close-small:focus:after {
  outline: 1px dotted #888;
}

.fancybox-close-small:hover:after {
  color: #555;
  background: #eee;
}

.fancybox-slide--image .fancybox-close-small,
.fancybox-slide--iframe .fancybox-close-small {
  top: 0;
  right: -40px;
}

.fancybox-slide--image .fancybox-close-small:after,
.fancybox-slide--iframe .fancybox-close-small:after {
  font-size: 35px;
  color: #aaa;
}

.fancybox-slide--image .fancybox-close-small:hover:after,
.fancybox-slide--iframe .fancybox-close-small:hover:after {
  color: #fff;
  background: transparent;
}

.fancybox-is-scaling .fancybox-close-small,
.fancybox-is-zoomable.fancybox-can-drag .fancybox-close-small {
  display: none;
}

/* Caption */

.fancybox-caption-wrap {
  bottom: 0;
  left: 0;
  right: 0;
  padding: 60px 2vw 0 2vw;
  background: -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(20%, rgba(0, 0, 0, 0.1)), color-stop(40%, rgba(0, 0, 0, 0.2)), color-stop(80%, rgba(0, 0, 0, 0.6)), to(rgba(0, 0, 0, 0.8)));
  background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.1) 20%, rgba(0, 0, 0, 0.2) 40%, rgba(0, 0, 0, 0.6) 80%, rgba(0, 0, 0, 0.8) 100%);
  pointer-events: none;
}

.fancybox-caption {
  padding: 30px 0;
  border-top: 1px solid rgba(255, 255, 255, 0.4);
  font-size: 14px;
  color: #fff;
  line-height: 20px;
  -webkit-text-size-adjust: none;
}

.fancybox-caption a,
.fancybox-caption button,
.fancybox-caption select {
  pointer-events: all;
  position: relative;
  /* Fix IE11 */
}

.fancybox-caption a {
  color: #fff;
  text-decoration: underline;
}

/* Loading indicator */

.fancybox-slide > .fancybox-loading {
  border: 6px solid rgba(100, 100, 100, 0.4);
  border-top: 6px solid rgba(255, 255, 255, 0.6);
  border-radius: 100%;
  height: 50px;
  width: 50px;
  -webkit-animation: fancybox-rotate .8s infinite linear;
  animation: fancybox-rotate .8s infinite linear;
  background: transparent;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -30px;
  margin-left: -30px;
  z-index: 99999;
}

@-webkit-keyframes fancybox-rotate {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  to {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}

@keyframes fancybox-rotate {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  to {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}

/* Transition effects */

.fancybox-animated {
  -webkit-transition-timing-function: cubic-bezier(0, 0, 0.25, 1);
          transition-timing-function: cubic-bezier(0, 0, 0.25, 1);
}

/* transitionEffect: slide */

.fancybox-fx-slide.fancybox-slide--previous {
  -webkit-transform: translate3d(-100%, 0, 0);
  transform: translate3d(-100%, 0, 0);
  opacity: 0;
}

.fancybox-fx-slide.fancybox-slide--next {
  -webkit-transform: translate3d(100%, 0, 0);
  transform: translate3d(100%, 0, 0);
  opacity: 0;
}

.fancybox-fx-slide.fancybox-slide--current {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  opacity: 1;
}

/* transitionEffect: fade */

.fancybox-fx-fade.fancybox-slide--previous,
.fancybox-fx-fade.fancybox-slide--next {
  opacity: 0;
  -webkit-transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);
          transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1);
}

.fancybox-fx-fade.fancybox-slide--current {
  opacity: 1;
}

/* transitionEffect: zoom-in-out */

.fancybox-fx-zoom-in-out.fancybox-slide--previous {
  -webkit-transform: scale3d(1.5, 1.5, 1.5);
  transform: scale3d(1.5, 1.5, 1.5);
  opacity: 0;
}

.fancybox-fx-zoom-in-out.fancybox-slide--next {
  -webkit-transform: scale3d(0.5, 0.5, 0.5);
  transform: scale3d(0.5, 0.5, 0.5);
  opacity: 0;
}

.fancybox-fx-zoom-in-out.fancybox-slide--current {
  -webkit-transform: scale3d(1, 1, 1);
  transform: scale3d(1, 1, 1);
  opacity: 1;
}

/* transitionEffect: rotate */

.fancybox-fx-rotate.fancybox-slide--previous {
  -webkit-transform: rotate(-360deg);
  transform: rotate(-360deg);
  opacity: 0;
}

.fancybox-fx-rotate.fancybox-slide--next {
  -webkit-transform: rotate(360deg);
  transform: rotate(360deg);
  opacity: 0;
}

.fancybox-fx-rotate.fancybox-slide--current {
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
  opacity: 1;
}

/* transitionEffect: circular */

.fancybox-fx-circular.fancybox-slide--previous {
  -webkit-transform: scale3d(0, 0, 0) translate3d(-100%, 0, 0);
  transform: scale3d(0, 0, 0) translate3d(-100%, 0, 0);
  opacity: 0;
}

.fancybox-fx-circular.fancybox-slide--next {
  -webkit-transform: scale3d(0, 0, 0) translate3d(100%, 0, 0);
  transform: scale3d(0, 0, 0) translate3d(100%, 0, 0);
  opacity: 0;
}

.fancybox-fx-circular.fancybox-slide--current {
  -webkit-transform: scale3d(1, 1, 1) translate3d(0, 0, 0);
  transform: scale3d(1, 1, 1) translate3d(0, 0, 0);
  opacity: 1;
}

/* transitionEffect: tube */

.fancybox-fx-tube.fancybox-slide--previous {
  -webkit-transform: translate3d(-100%, 0, 0) scale(0.1) skew(-10deg);
  transform: translate3d(-100%, 0, 0) scale(0.1) skew(-10deg);
}

.fancybox-fx-tube.fancybox-slide--next {
  -webkit-transform: translate3d(100%, 0, 0) scale(0.1) skew(10deg);
  transform: translate3d(100%, 0, 0) scale(0.1) skew(10deg);
}

.fancybox-fx-tube.fancybox-slide--current {
  -webkit-transform: translate3d(0, 0, 0) scale(1);
  transform: translate3d(0, 0, 0) scale(1);
}

/* Share */

.fancybox-share {
  padding: 30px;
  border-radius: 3px;
  background: #f4f4f4;
  max-width: 90%;
  text-align: center;
}

.fancybox-share h1 {
  color: #222;
  margin: 0 0 20px 0;
  font-size: 35px;
  font-weight: 700;
}

.fancybox-share p {
  margin: 0;
  padding: 0;
}

p.fancybox-share__links {
  margin-right: -10px;
}

.fancybox-share__button {
  display: inline-block;
  text-decoration: none;
  margin: 0 10px 10px 0;
  padding: 0 15px;
  min-width: 130px;
  border: 0;
  border-radius: 3px;
  background: #fff;
  white-space: nowrap;
  font-size: 14px;
  font-weight: 700;
  line-height: 40px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color: #fff;
  -webkit-transition: all .2s;
  transition: all .2s;
}

.fancybox-share__button:hover {
  text-decoration: none;
}

.fancybox-share__button--fb {
  background: #3b5998;
}

.fancybox-share__button--fb:hover {
  background: #344e86;
}

.fancybox-share__button--pt {
  background: #bd081d;
}

.fancybox-share__button--pt:hover {
  background: #aa0719;
}

.fancybox-share__button--tw {
  background: #1da1f2;
}

.fancybox-share__button--tw:hover {
  background: #0d95e8;
}

.fancybox-share__button svg {
  position: relative;
  top: -1px;
  width: 25px;
  height: 25px;
  margin-right: 7px;
  vertical-align: middle;
}

.fancybox-share__button svg path {
  fill: #fff;
}

.fancybox-share__input {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  width: 100%;
  margin: 10px 0 0 0;
  padding: 10px 15px;
  background: transparent;
  color: #5d5b5b;
  font-size: 14px;
  outline: none;
  border: 0;
  border-bottom: 2px solid #d7d7d7;
}

/* Thumbs */

.fancybox-thumbs {
  display: none;
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  width: 212px;
  margin: 0;
  padding: 2px 2px 4px 2px;
  background: #fff;
  -webkit-tap-highlight-color: transparent;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  z-index: 99995;
}

.fancybox-thumbs-x {
  overflow-y: hidden;
  overflow-x: auto;
}

.fancybox-show-thumbs .fancybox-thumbs {
  display: block;
}

.fancybox-show-thumbs .fancybox-inner {
  right: 212px;
}

.fancybox-thumbs > ul {
  list-style: none;
  position: absolute;
  position: relative;
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  overflow-y: auto;
  font-size: 0;
  white-space: nowrap;
}

.fancybox-thumbs-x > ul {
  overflow: hidden;
}

.fancybox-thumbs-y > ul::-webkit-scrollbar {
  width: 7px;
}

.fancybox-thumbs-y > ul::-webkit-scrollbar-track {
  background: #fff;
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
          box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

.fancybox-thumbs-y > ul::-webkit-scrollbar-thumb {
  background: #2a2a2a;
  border-radius: 10px;
}

.fancybox-thumbs > ul > li {
  float: left;
  overflow: hidden;
  padding: 0;
  margin: 2px;
  width: 100px;
  height: 75px;
  max-width: calc(50% - 4px);
  max-height: calc(100% - 8px);
  position: relative;
  cursor: pointer;
  outline: none;
  -webkit-tap-highlight-color: transparent;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

li.fancybox-thumbs-loading {
  background: rgba(0, 0, 0, 0.1);
}

.fancybox-thumbs > ul > li > img {
  position: absolute;
  top: 0;
  left: 0;
  max-width: none;
  max-height: none;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.fancybox-thumbs > ul > li:before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  border: 4px solid #4ea7f9;
  z-index: 99991;
  opacity: 0;
  -webkit-transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  transition: all 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.fancybox-thumbs > ul > li.fancybox-thumbs-active:before {
  opacity: 1;
}

/* Styling for Small-Screen Devices */

@media all and (max-width: 800px) {
  .fancybox-thumbs {
    width: 110px;
  }

  .fancybox-show-thumbs .fancybox-inner {
    right: 110px;
  }

  .fancybox-thumbs > ul > li {
    max-width: calc(100% - 10px);
  }
}

/*!
 * animate.css -http://daneden.me/animate
 * Version - 3.7.0
 * Licensed under the MIT license - http://opensource.org/licenses/MIT
 *
 * Copyright (c) 2018 Daniel Eden
 */

@-webkit-keyframes bounce {
  from, 20%, 53%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  40%, 43% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -30px, 0);
    transform: translate3d(0, -30px, 0);
  }

  70% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -15px, 0);
    transform: translate3d(0, -15px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -4px, 0);
    transform: translate3d(0, -4px, 0);
  }
}

@keyframes bounce {
  from, 20%, 53%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  40%, 43% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -30px, 0);
    transform: translate3d(0, -30px, 0);
  }

  70% {
    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
    -webkit-transform: translate3d(0, -15px, 0);
    transform: translate3d(0, -15px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -4px, 0);
    transform: translate3d(0, -4px, 0);
  }
}

.bounce {
  -webkit-animation-name: bounce;
  animation-name: bounce;
  -webkit-transform-origin: center bottom;
  transform-origin: center bottom;
}

@-webkit-keyframes flash {
  from, 50%, to {
    opacity: 1;
  }

  25%, 75% {
    opacity: 0;
  }
}

@keyframes flash {
  from, 50%, to {
    opacity: 1;
  }

  25%, 75% {
    opacity: 0;
  }
}

.flash {
  -webkit-animation-name: flash;
  animation-name: flash;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes pulse {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  50% {
    -webkit-transform: scale3d(1.05, 1.05, 1.05);
    transform: scale3d(1.05, 1.05, 1.05);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes pulse {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  50% {
    -webkit-transform: scale3d(1.05, 1.05, 1.05);
    transform: scale3d(1.05, 1.05, 1.05);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.pulse {
  -webkit-animation-name: pulse;
  animation-name: pulse;
}

@-webkit-keyframes rubberBand {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }

  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }

  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }

  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }

  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes rubberBand {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }

  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }

  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }

  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }

  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}

@-webkit-keyframes shake {
  from, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  10%, 30%, 50%, 70%, 90% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  20%, 40%, 60%, 80% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }
}

@keyframes shake {
  from, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  10%, 30%, 50%, 70%, 90% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  20%, 40%, 60%, 80% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }
}

.shake {
  -webkit-animation-name: shake;
  animation-name: shake;
}

@-webkit-keyframes headShake {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }

  6.5% {
    -webkit-transform: translateX(-6px) rotateY(-9deg);
    transform: translateX(-6px) rotateY(-9deg);
  }

  18.5% {
    -webkit-transform: translateX(5px) rotateY(7deg);
    transform: translateX(5px) rotateY(7deg);
  }

  31.5% {
    -webkit-transform: translateX(-3px) rotateY(-5deg);
    transform: translateX(-3px) rotateY(-5deg);
  }

  43.5% {
    -webkit-transform: translateX(2px) rotateY(3deg);
    transform: translateX(2px) rotateY(3deg);
  }

  50% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}

@keyframes headShake {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }

  6.5% {
    -webkit-transform: translateX(-6px) rotateY(-9deg);
    transform: translateX(-6px) rotateY(-9deg);
  }

  18.5% {
    -webkit-transform: translateX(5px) rotateY(7deg);
    transform: translateX(5px) rotateY(7deg);
  }

  31.5% {
    -webkit-transform: translateX(-3px) rotateY(-5deg);
    transform: translateX(-3px) rotateY(-5deg);
  }

  43.5% {
    -webkit-transform: translateX(2px) rotateY(3deg);
    transform: translateX(2px) rotateY(3deg);
  }

  50% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}

.headShake {
  -webkit-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
  -webkit-animation-name: headShake;
  animation-name: headShake;
}

@-webkit-keyframes swing {
  20% {
    -webkit-transform: rotate3d(0, 0, 1, 15deg);
    transform: rotate3d(0, 0, 1, 15deg);
  }

  40% {
    -webkit-transform: rotate3d(0, 0, 1, -10deg);
    transform: rotate3d(0, 0, 1, -10deg);
  }

  60% {
    -webkit-transform: rotate3d(0, 0, 1, 5deg);
    transform: rotate3d(0, 0, 1, 5deg);
  }

  80% {
    -webkit-transform: rotate3d(0, 0, 1, -5deg);
    transform: rotate3d(0, 0, 1, -5deg);
  }

  to {
    -webkit-transform: rotate3d(0, 0, 1, 0deg);
    transform: rotate3d(0, 0, 1, 0deg);
  }
}

@keyframes swing {
  20% {
    -webkit-transform: rotate3d(0, 0, 1, 15deg);
    transform: rotate3d(0, 0, 1, 15deg);
  }

  40% {
    -webkit-transform: rotate3d(0, 0, 1, -10deg);
    transform: rotate3d(0, 0, 1, -10deg);
  }

  60% {
    -webkit-transform: rotate3d(0, 0, 1, 5deg);
    transform: rotate3d(0, 0, 1, 5deg);
  }

  80% {
    -webkit-transform: rotate3d(0, 0, 1, -5deg);
    transform: rotate3d(0, 0, 1, -5deg);
  }

  to {
    -webkit-transform: rotate3d(0, 0, 1, 0deg);
    transform: rotate3d(0, 0, 1, 0deg);
  }
}

.swing {
  -webkit-transform-origin: top center;
  transform-origin: top center;
  -webkit-animation-name: swing;
  animation-name: swing;
}

@-webkit-keyframes tada {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  10%, 20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
  }

  30%, 50%, 70%, 90% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
  }

  40%, 60%, 80% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes tada {
  from {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }

  10%, 20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
  }

  30%, 50%, 70%, 90% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
  }

  40%, 60%, 80% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
  }

  to {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.tada {
  -webkit-animation-name: tada;
  animation-name: tada;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes wobble {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  15% {
    -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
  }

  30% {
    -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
  }

  45% {
    -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
  }

  60% {
    -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
  }

  75% {
    -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes wobble {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  15% {
    -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
  }

  30% {
    -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
  }

  45% {
    -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
  }

  60% {
    -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
  }

  75% {
    -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.wobble {
  -webkit-animation-name: wobble;
  animation-name: wobble;
}

@-webkit-keyframes jello {
  from, 11.1%, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  22.2% {
    -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
    transform: skewX(-12.5deg) skewY(-12.5deg);
  }

  33.3% {
    -webkit-transform: skewX(6.25deg) skewY(6.25deg);
    transform: skewX(6.25deg) skewY(6.25deg);
  }

  44.4% {
    -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
    transform: skewX(-3.125deg) skewY(-3.125deg);
  }

  55.5% {
    -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
    transform: skewX(1.5625deg) skewY(1.5625deg);
  }

  66.6% {
    -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);
    transform: skewX(-0.78125deg) skewY(-0.78125deg);
  }

  77.7% {
    -webkit-transform: skewX(0.390625deg) skewY(0.390625deg);
    transform: skewX(0.390625deg) skewY(0.390625deg);
  }

  88.8% {
    -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
  }
}

@keyframes jello {
  from, 11.1%, to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  22.2% {
    -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
    transform: skewX(-12.5deg) skewY(-12.5deg);
  }

  33.3% {
    -webkit-transform: skewX(6.25deg) skewY(6.25deg);
    transform: skewX(6.25deg) skewY(6.25deg);
  }

  44.4% {
    -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
    transform: skewX(-3.125deg) skewY(-3.125deg);
  }

  55.5% {
    -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
    transform: skewX(1.5625deg) skewY(1.5625deg);
  }

  66.6% {
    -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);
    transform: skewX(-0.78125deg) skewY(-0.78125deg);
  }

  77.7% {
    -webkit-transform: skewX(0.390625deg) skewY(0.390625deg);
    transform: skewX(0.390625deg) skewY(0.390625deg);
  }

  88.8% {
    -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
  }
}

.jello {
  -webkit-animation-name: jello;
  animation-name: jello;
  -webkit-transform-origin: center;
  transform-origin: center;
}

@-webkit-keyframes heartBeat {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  14% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  28% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  42% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  70% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

@keyframes heartBeat {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  14% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  28% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }

  42% {
    -webkit-transform: scale(1.3);
    transform: scale(1.3);
  }

  70% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

.heartBeat {
  -webkit-animation-name: heartBeat;
  animation-name: heartBeat;
  -webkit-animation-duration: 1.3s;
  animation-duration: 1.3s;
  -webkit-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
}

@-webkit-keyframes bounceIn {
  from, 20%, 40%, 60%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  20% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  40% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(1.03, 1.03, 1.03);
    transform: scale3d(1.03, 1.03, 1.03);
  }

  80% {
    -webkit-transform: scale3d(0.97, 0.97, 0.97);
    transform: scale3d(0.97, 0.97, 0.97);
  }

  to {
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

@keyframes bounceIn {
  from, 20%, 40%, 60%, 80%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  20% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  40% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(1.03, 1.03, 1.03);
    transform: scale3d(1.03, 1.03, 1.03);
  }

  80% {
    -webkit-transform: scale3d(0.97, 0.97, 0.97);
    transform: scale3d(0.97, 0.97, 0.97);
  }

  to {
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}

.bounceIn {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: bounceIn;
  animation-name: bounceIn;
}

@-webkit-keyframes bounceInDown {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -3000px, 0);
    transform: translate3d(0, -3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, 25px, 0);
    transform: translate3d(0, 25px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, 5px, 0);
    transform: translate3d(0, 5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInDown {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -3000px, 0);
    transform: translate3d(0, -3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, 25px, 0);
    transform: translate3d(0, 25px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, 5px, 0);
    transform: translate3d(0, 5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInDown {
  -webkit-animation-name: bounceInDown;
  animation-name: bounceInDown;
}

@-webkit-keyframes bounceInLeft {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(-3000px, 0, 0);
    transform: translate3d(-3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(25px, 0, 0);
    transform: translate3d(25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(5px, 0, 0);
    transform: translate3d(5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInLeft {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  0% {
    opacity: 0;
    -webkit-transform: translate3d(-3000px, 0, 0);
    transform: translate3d(-3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(25px, 0, 0);
    transform: translate3d(25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(-10px, 0, 0);
    transform: translate3d(-10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(5px, 0, 0);
    transform: translate3d(5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInLeft {
  -webkit-animation-name: bounceInLeft;
  animation-name: bounceInLeft;
}

@-webkit-keyframes bounceInRight {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(3000px, 0, 0);
    transform: translate3d(3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(-25px, 0, 0);
    transform: translate3d(-25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(-5px, 0, 0);
    transform: translate3d(-5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInRight {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(3000px, 0, 0);
    transform: translate3d(3000px, 0, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(-25px, 0, 0);
    transform: translate3d(-25px, 0, 0);
  }

  75% {
    -webkit-transform: translate3d(10px, 0, 0);
    transform: translate3d(10px, 0, 0);
  }

  90% {
    -webkit-transform: translate3d(-5px, 0, 0);
    transform: translate3d(-5px, 0, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInRight {
  -webkit-animation-name: bounceInRight;
  animation-name: bounceInRight;
}

@-webkit-keyframes bounceInUp {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 3000px, 0);
    transform: translate3d(0, 3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -5px, 0);
    transform: translate3d(0, -5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes bounceInUp {
  from, 60%, 75%, 90%, to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 3000px, 0);
    transform: translate3d(0, 3000px, 0);
  }

  60% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  75% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  90% {
    -webkit-transform: translate3d(0, -5px, 0);
    transform: translate3d(0, -5px, 0);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.bounceInUp {
  -webkit-animation-name: bounceInUp;
  animation-name: bounceInUp;
}

@-webkit-keyframes bounceOut {
  20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  50%, 55% {
    opacity: 1;
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
}

@keyframes bounceOut {
  20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  50%, 55% {
    opacity: 1;
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
}

.bounceOut {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: bounceOut;
  animation-name: bounceOut;
}

@-webkit-keyframes bounceOutDown {
  20% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

@keyframes bounceOutDown {
  20% {
    -webkit-transform: translate3d(0, 10px, 0);
    transform: translate3d(0, 10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, -20px, 0);
    transform: translate3d(0, -20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

.bounceOutDown {
  -webkit-animation-name: bounceOutDown;
  animation-name: bounceOutDown;
}

@-webkit-keyframes bounceOutLeft {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(20px, 0, 0);
    transform: translate3d(20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

@keyframes bounceOutLeft {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(20px, 0, 0);
    transform: translate3d(20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

.bounceOutLeft {
  -webkit-animation-name: bounceOutLeft;
  animation-name: bounceOutLeft;
}

@-webkit-keyframes bounceOutRight {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(-20px, 0, 0);
    transform: translate3d(-20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

@keyframes bounceOutRight {
  20% {
    opacity: 1;
    -webkit-transform: translate3d(-20px, 0, 0);
    transform: translate3d(-20px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

.bounceOutRight {
  -webkit-animation-name: bounceOutRight;
  animation-name: bounceOutRight;
}

@-webkit-keyframes bounceOutUp {
  20% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, 20px, 0);
    transform: translate3d(0, 20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

@keyframes bounceOutUp {
  20% {
    -webkit-transform: translate3d(0, -10px, 0);
    transform: translate3d(0, -10px, 0);
  }

  40%, 45% {
    opacity: 1;
    -webkit-transform: translate3d(0, 20px, 0);
    transform: translate3d(0, 20px, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

.bounceOutUp {
  -webkit-animation-name: bounceOutUp;
  animation-name: bounceOutUp;
}

@-webkit-keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;
}

@-webkit-keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
}

@-webkit-keyframes fadeInDownBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInDownBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInDownBig {
  -webkit-animation-name: fadeInDownBig;
  animation-name: fadeInDownBig;
}

@-webkit-keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInLeft {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft;
}

@-webkit-keyframes fadeInLeftBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInLeftBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInLeftBig {
  -webkit-animation-name: fadeInLeftBig;
  animation-name: fadeInLeftBig;
}

@-webkit-keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInRight {
  -webkit-animation-name: fadeInRight;
  animation-name: fadeInRight;
}

@-webkit-keyframes fadeInRightBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInRightBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInRightBig {
  -webkit-animation-name: fadeInRightBig;
  animation-name: fadeInRightBig;
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

@-webkit-keyframes fadeInUpBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUpBig {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInUpBig {
  -webkit-animation-name: fadeInUpBig;
  animation-name: fadeInUpBig;
}

@-webkit-keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}

@keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}

.fadeOut {
  -webkit-animation-name: fadeOut;
  animation-name: fadeOut;
}

@-webkit-keyframes fadeOutDown {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

@keyframes fadeOutDown {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

.fadeOutDown {
  -webkit-animation-name: fadeOutDown;
  animation-name: fadeOutDown;
}

@-webkit-keyframes fadeOutDownBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

@keyframes fadeOutDownBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, 2000px, 0);
    transform: translate3d(0, 2000px, 0);
  }
}

.fadeOutDownBig {
  -webkit-animation-name: fadeOutDownBig;
  animation-name: fadeOutDownBig;
}

@-webkit-keyframes fadeOutLeft {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

@keyframes fadeOutLeft {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

.fadeOutLeft {
  -webkit-animation-name: fadeOutLeft;
  animation-name: fadeOutLeft;
}

@-webkit-keyframes fadeOutLeftBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

@keyframes fadeOutLeftBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(-2000px, 0, 0);
    transform: translate3d(-2000px, 0, 0);
  }
}

.fadeOutLeftBig {
  -webkit-animation-name: fadeOutLeftBig;
  animation-name: fadeOutLeftBig;
}

@-webkit-keyframes fadeOutRight {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

@keyframes fadeOutRight {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

.fadeOutRight {
  -webkit-animation-name: fadeOutRight;
  animation-name: fadeOutRight;
}

@-webkit-keyframes fadeOutRightBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

@keyframes fadeOutRightBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(2000px, 0, 0);
    transform: translate3d(2000px, 0, 0);
  }
}

.fadeOutRightBig {
  -webkit-animation-name: fadeOutRightBig;
  animation-name: fadeOutRightBig;
}

@-webkit-keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

@keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

.fadeOutUp {
  -webkit-animation-name: fadeOutUp;
  animation-name: fadeOutUp;
}

@-webkit-keyframes fadeOutUpBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

@keyframes fadeOutUpBig {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -2000px, 0);
    transform: translate3d(0, -2000px, 0);
  }
}

.fadeOutUpBig {
  -webkit-animation-name: fadeOutUpBig;
  animation-name: fadeOutUpBig;
}

@-webkit-keyframes flip {
  from {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  40% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  50% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  80% {
    -webkit-transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  to {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
}

@keyframes flip {
  from {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  40% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out;
  }

  50% {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  80% {
    -webkit-transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  to {
    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }
}

.animated.flip {
  -webkit-backface-visibility: visible;
  backface-visibility: visible;
  -webkit-animation-name: flip;
  animation-name: flip;
}

@-webkit-keyframes flipInX {
  from {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

@keyframes flipInX {
  from {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

.flipInX {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInX;
  animation-name: flipInX;
}

@-webkit-keyframes flipInY {
  from {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

@keyframes flipInY {
  from {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
    opacity: 0;
  }

  40% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in;
  }

  60% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
  }

  to {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

.flipInY {
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipInY;
  animation-name: flipInY;
}

@-webkit-keyframes flipOutX {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    opacity: 0;
  }
}

@keyframes flipOutX {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    opacity: 0;
  }
}

.flipOutX {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: flipOutX;
  animation-name: flipOutX;
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
}

@-webkit-keyframes flipOutY {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    opacity: 0;
  }
}

@keyframes flipOutY {
  from {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }

  30% {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
    opacity: 1;
  }

  to {
    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
    opacity: 0;
  }
}

.flipOutY {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-backface-visibility: visible !important;
  backface-visibility: visible !important;
  -webkit-animation-name: flipOutY;
  animation-name: flipOutY;
}

@-webkit-keyframes lightSpeedIn {
  from {
    -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);
    transform: translate3d(100%, 0, 0) skewX(-30deg);
    opacity: 0;
  }

  60% {
    -webkit-transform: skewX(20deg);
    transform: skewX(20deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: skewX(-5deg);
    transform: skewX(-5deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes lightSpeedIn {
  from {
    -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);
    transform: translate3d(100%, 0, 0) skewX(-30deg);
    opacity: 0;
  }

  60% {
    -webkit-transform: skewX(20deg);
    transform: skewX(20deg);
    opacity: 1;
  }

  80% {
    -webkit-transform: skewX(-5deg);
    transform: skewX(-5deg);
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.lightSpeedIn {
  -webkit-animation-name: lightSpeedIn;
  animation-name: lightSpeedIn;
  -webkit-animation-timing-function: ease-out;
  animation-timing-function: ease-out;
}

@-webkit-keyframes lightSpeedOut {
  from {
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);
    transform: translate3d(100%, 0, 0) skewX(30deg);
    opacity: 0;
  }
}

@keyframes lightSpeedOut {
  from {
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);
    transform: translate3d(100%, 0, 0) skewX(30deg);
    opacity: 0;
  }
}

.lightSpeedOut {
  -webkit-animation-name: lightSpeedOut;
  animation-name: lightSpeedOut;
  -webkit-animation-timing-function: ease-in;
  animation-timing-function: ease-in;
}

@-webkit-keyframes rotateIn {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, -200deg);
    transform: rotate3d(0, 0, 1, -200deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateIn {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, -200deg);
    transform: rotate3d(0, 0, 1, -200deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateIn {
  -webkit-animation-name: rotateIn;
  animation-name: rotateIn;
}

@-webkit-keyframes rotateInDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInDownLeft {
  -webkit-animation-name: rotateInDownLeft;
  animation-name: rotateInDownLeft;
}

@-webkit-keyframes rotateInDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInDownRight {
  -webkit-animation-name: rotateInDownRight;
  animation-name: rotateInDownRight;
}

@-webkit-keyframes rotateInUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInUpLeft {
  -webkit-animation-name: rotateInUpLeft;
  animation-name: rotateInUpLeft;
}

@-webkit-keyframes rotateInUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -90deg);
    transform: rotate3d(0, 0, 1, -90deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

@keyframes rotateInUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -90deg);
    transform: rotate3d(0, 0, 1, -90deg);
    opacity: 0;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}

.rotateInUpRight {
  -webkit-animation-name: rotateInUpRight;
  animation-name: rotateInUpRight;
}

@-webkit-keyframes rotateOut {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, 200deg);
    transform: rotate3d(0, 0, 1, 200deg);
    opacity: 0;
  }
}

@keyframes rotateOut {
  from {
    -webkit-transform-origin: center;
    transform-origin: center;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transform: rotate3d(0, 0, 1, 200deg);
    transform: rotate3d(0, 0, 1, 200deg);
    opacity: 0;
  }
}

.rotateOut {
  -webkit-animation-name: rotateOut;
  animation-name: rotateOut;
}

@-webkit-keyframes rotateOutDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }
}

@keyframes rotateOutDownLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, 45deg);
    transform: rotate3d(0, 0, 1, 45deg);
    opacity: 0;
  }
}

.rotateOutDownLeft {
  -webkit-animation-name: rotateOutDownLeft;
  animation-name: rotateOutDownLeft;
}

@-webkit-keyframes rotateOutDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

@keyframes rotateOutDownRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

.rotateOutDownRight {
  -webkit-animation-name: rotateOutDownRight;
  animation-name: rotateOutDownRight;
}

@-webkit-keyframes rotateOutUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

@keyframes rotateOutUpLeft {
  from {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: left bottom;
    transform-origin: left bottom;
    -webkit-transform: rotate3d(0, 0, 1, -45deg);
    transform: rotate3d(0, 0, 1, -45deg);
    opacity: 0;
  }
}

.rotateOutUpLeft {
  -webkit-animation-name: rotateOutUpLeft;
  animation-name: rotateOutUpLeft;
}

@-webkit-keyframes rotateOutUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 90deg);
    transform: rotate3d(0, 0, 1, 90deg);
    opacity: 0;
  }
}

@keyframes rotateOutUpRight {
  from {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    opacity: 1;
  }

  to {
    -webkit-transform-origin: right bottom;
    transform-origin: right bottom;
    -webkit-transform: rotate3d(0, 0, 1, 90deg);
    transform: rotate3d(0, 0, 1, 90deg);
    opacity: 0;
  }
}

.rotateOutUpRight {
  -webkit-animation-name: rotateOutUpRight;
  animation-name: rotateOutUpRight;
}

@-webkit-keyframes hinge {
  0% {
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  20%, 60% {
    -webkit-transform: rotate3d(0, 0, 1, 80deg);
    transform: rotate3d(0, 0, 1, 80deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  40%, 80% {
    -webkit-transform: rotate3d(0, 0, 1, 60deg);
    transform: rotate3d(0, 0, 1, 60deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(0, 700px, 0);
    transform: translate3d(0, 700px, 0);
    opacity: 0;
  }
}

@keyframes hinge {
  0% {
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  20%, 60% {
    -webkit-transform: rotate3d(0, 0, 1, 80deg);
    transform: rotate3d(0, 0, 1, 80deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
  }

  40%, 80% {
    -webkit-transform: rotate3d(0, 0, 1, 60deg);
    transform: rotate3d(0, 0, 1, 60deg);
    -webkit-transform-origin: top left;
    transform-origin: top left;
    -webkit-animation-timing-function: ease-in-out;
    animation-timing-function: ease-in-out;
    opacity: 1;
  }

  to {
    -webkit-transform: translate3d(0, 700px, 0);
    transform: translate3d(0, 700px, 0);
    opacity: 0;
  }
}

.hinge {
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
  -webkit-animation-name: hinge;
  animation-name: hinge;
}

@-webkit-keyframes jackInTheBox {
  from {
    opacity: 0;
    -webkit-transform: scale(0.1) rotate(30deg);
    transform: scale(0.1) rotate(30deg);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
  }

  50% {
    -webkit-transform: rotate(-10deg);
    transform: rotate(-10deg);
  }

  70% {
    -webkit-transform: rotate(3deg);
    transform: rotate(3deg);
  }

  to {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

@keyframes jackInTheBox {
  from {
    opacity: 0;
    -webkit-transform: scale(0.1) rotate(30deg);
    transform: scale(0.1) rotate(30deg);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
  }

  50% {
    -webkit-transform: rotate(-10deg);
    transform: rotate(-10deg);
  }

  70% {
    -webkit-transform: rotate(3deg);
    transform: rotate(3deg);
  }

  to {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

.jackInTheBox {
  -webkit-animation-name: jackInTheBox;
  animation-name: jackInTheBox;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes rollIn {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes rollIn {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.rollIn {
  -webkit-animation-name: rollIn;
  animation-name: rollIn;
}

/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

@-webkit-keyframes rollOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
  }
}

@keyframes rollOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
  }
}

.rollOut {
  -webkit-animation-name: rollOut;
  animation-name: rollOut;
}

@-webkit-keyframes zoomIn {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  50% {
    opacity: 1;
  }
}

@keyframes zoomIn {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  50% {
    opacity: 1;
  }
}

.zoomIn {
  -webkit-animation-name: zoomIn;
  animation-name: zoomIn;
}

@-webkit-keyframes zoomInDown {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInDown {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInDown {
  -webkit-animation-name: zoomInDown;
  animation-name: zoomInDown;
}

@-webkit-keyframes zoomInLeft {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInLeft {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInLeft {
  -webkit-animation-name: zoomInLeft;
  animation-name: zoomInLeft;
}

@-webkit-keyframes zoomInRight {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInRight {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInRight {
  -webkit-animation-name: zoomInRight;
  animation-name: zoomInRight;
}

@-webkit-keyframes zoomInUp {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomInUp {
  from {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  60% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomInUp {
  -webkit-animation-name: zoomInUp;
  animation-name: zoomInUp;
}

@-webkit-keyframes zoomOut {
  from {
    opacity: 1;
  }

  50% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  to {
    opacity: 0;
  }
}

@keyframes zoomOut {
  from {
    opacity: 1;
  }

  50% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }

  to {
    opacity: 0;
  }
}

.zoomOut {
  -webkit-animation-name: zoomOut;
  animation-name: zoomOut;
}

@-webkit-keyframes zoomOutDown {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomOutDown {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomOutDown {
  -webkit-animation-name: zoomOutDown;
  animation-name: zoomOutDown;
}

@-webkit-keyframes zoomOutLeft {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(-2000px, 0, 0);
    transform: scale(0.1) translate3d(-2000px, 0, 0);
    -webkit-transform-origin: left center;
    transform-origin: left center;
  }
}

@keyframes zoomOutLeft {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(-2000px, 0, 0);
    transform: scale(0.1) translate3d(-2000px, 0, 0);
    -webkit-transform-origin: left center;
    transform-origin: left center;
  }
}

.zoomOutLeft {
  -webkit-animation-name: zoomOutLeft;
  animation-name: zoomOutLeft;
}

@-webkit-keyframes zoomOutRight {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(2000px, 0, 0);
    transform: scale(0.1) translate3d(2000px, 0, 0);
    -webkit-transform-origin: right center;
    transform-origin: right center;
  }
}

@keyframes zoomOutRight {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);
  }

  to {
    opacity: 0;
    -webkit-transform: scale(0.1) translate3d(2000px, 0, 0);
    transform: scale(0.1) translate3d(2000px, 0, 0);
    -webkit-transform-origin: right center;
    transform-origin: right center;
  }
}

.zoomOutRight {
  -webkit-animation-name: zoomOutRight;
  animation-name: zoomOutRight;
}

@-webkit-keyframes zoomOutUp {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

@keyframes zoomOutUp {
  40% {
    opacity: 1;
    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);
    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);
  }
}

.zoomOutUp {
  -webkit-animation-name: zoomOutUp;
  animation-name: zoomOutUp;
}

@-webkit-keyframes slideInDown {
  from {
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInDown {
  from {
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInDown {
  -webkit-animation-name: slideInDown;
  animation-name: slideInDown;
}

@-webkit-keyframes slideInLeft {
  from {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInLeft {
  from {
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInLeft {
  -webkit-animation-name: slideInLeft;
  animation-name: slideInLeft;
}

@-webkit-keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInRight {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight;
}

@-webkit-keyframes slideInUp {
  from {
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInUp {
  from {
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInUp {
  -webkit-animation-name: slideInUp;
  animation-name: slideInUp;
}

@-webkit-keyframes slideOutDown {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

@keyframes slideOutDown {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }
}

.slideOutDown {
  -webkit-animation-name: slideOutDown;
  animation-name: slideOutDown;
}

@-webkit-keyframes slideOutLeft {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

@keyframes slideOutLeft {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }
}

.slideOutLeft {
  -webkit-animation-name: slideOutLeft;
  animation-name: slideOutLeft;
}

@-webkit-keyframes slideOutRight {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

@keyframes slideOutRight {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
  }
}

.slideOutRight {
  -webkit-animation-name: slideOutRight;
  animation-name: slideOutRight;
}

@-webkit-keyframes slideOutUp {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

@keyframes slideOutUp {
  from {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }

  to {
    visibility: hidden;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

.slideOutUp {
  -webkit-animation-name: slideOutUp;
  animation-name: slideOutUp;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

.animated.infinite {
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
}

.animated.delay-1s {
  -webkit-animation-delay: 1s;
  animation-delay: 1s;
}

.animated.delay-2s {
  -webkit-animation-delay: 2s;
  animation-delay: 2s;
}

.animated.delay-3s {
  -webkit-animation-delay: 3s;
  animation-delay: 3s;
}

.animated.delay-4s {
  -webkit-animation-delay: 4s;
  animation-delay: 4s;
}

.animated.delay-5s {
  -webkit-animation-delay: 5s;
  animation-delay: 5s;
}

.animated.fast {
  -webkit-animation-duration: 800ms;
  animation-duration: 800ms;
}

.animated.faster {
  -webkit-animation-duration: 500ms;
  animation-duration: 500ms;
}

.animated.slow {
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
}

.animated.slower {
  -webkit-animation-duration: 3s;
  animation-duration: 3s;
}

@media (prefers-reduced-motion) {
  .animated {
    -webkit-animation: unset !important;
    animation: unset !important;
    -webkit-transition: none !important;
    transition: none !important;
  }
}

.pignose-calendar .icon-arrow-left,
.pignose-calendar .icon-arrow-right {
  position: relative;
}

.pignose-calendar .icon-arrow-left:before {
  content: '';
  position: absolute;
  background-image: url(../images/icon.png?5c9869fb7328eed7036cf2c6fb987906);
  background-position: -114px -27px;
  width: 36px;
  height: 36px;
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}

.pignose-calendar .icon-arrow-right:before {
  content: '';
  position: absolute;
  background-image: url(../images/icon.png?5c9869fb7328eed7036cf2c6fb987906);
  background-position: -114px -27px;
  width: 36px;
  height: 36px;
}

.pignose-calendar-wrapper {
  display: none;
  position: fixed;
  width: 80%;
  max-width: 360px;
  top: 50%;
  left: 50%;
  border-radius: 2px;
  z-index: 50001;
  overflow: hidden;
  -webkit-box-shadow: 0 4px 16px #000000;
  box-shadow: 0 4px 16px #000000;
  -webkit-transform: translate3d(0, 160px, 0);
  transform: translate3d(0, 160px, 0);
  opacity: 0;
  -webkit-transition: opacity 0.3s ease, -webkit-transform 0.5s ease-out;
  transition: opacity 0.3s ease, -webkit-transform 0.5s ease-out;
  transition: opacity 0.3s ease, transform 0.5s ease-out;
  transition: opacity 0.3s ease, transform 0.5s ease-out, -webkit-transform 0.5s ease-out;
}

.pignose-calendar-wrapper.pignose-calendar-wrapper-active {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.pignose-calendar-wrapper .pignose-calendar {
  max-width: auto;
  width: 100%;
  border: none;
}

.pignose-calendar-wrapper .pignose-calendar .pignose-calendar-button-group {
  border-top: 1px solid #e2e2e2;
  overflow: hidden;
}

.pignose-calendar-wrapper .pignose-calendar .pignose-calendar-button-group .pignose-calendar-button {
  width: 50%;
  display: block;
  float: left;
  height: 3.2em;
  text-align: center;
  line-height: 3.2em;
  color: #333333;
  font-weight: 600;
  text-decoration: none;
  -webkit-transition: background-color 0.3s ease;
  transition: background-color 0.3s ease;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.pignose-calendar-wrapper .pignose-calendar .pignose-calendar-button-group .pignose-calendar-button:hover {
  background-color: #efefef;
}

.pignose-calendar-wrapper .pignose-calendar .pignose-calendar-button-group .pignose-calendar-button-apply {
  color: #ffffff;
  background-color: #2fabb7;
}

.pignose-calendar-wrapper .pignose-calendar .pignose-calendar-button-group .pignose-calendar-button-apply:hover {
  background-color: #49c4d0;
}

.pignose-calendar-wrapper-overlay {
  background-color: #000000;
  opacity: 0;
  -webkit-transition: opacity 0.3s ease;
  transition: opacity 0.3s ease;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  z-index: 50000;
}

.pignose-calendar-wrapper-overlay.pignose-calendar-wrapper-overlay-active {
  opacity: 0.7;
}

.pignose-calendar {
  width: 90%;
  max-width: 480px;
  background-color: #ffffff;
  border: 1px solid #e7e7e7;
  font-size: 100%;
  margin: 0 auto;
  -webkit-box-shadow: 0 4px 16px rgba(45, 45, 45, 0.12);
  box-shadow: 0 4px 16px rgba(45, 45, 45, 0.12);
}

.pignose-calendar .pignose-calendar-top {
  padding: 2.6em 0;
  background-color: #fff;
  position: relative;
  overflow: hidden;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-date {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 1.8em 0;
  text-align: center;
  text-transform: uppercase;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-year,
.pignose-calendar .pignose-calendar-top .pignose-calendar-top-month {
  display: block;
  text-align: center;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-year {
  font-size: 115%;
  color: #17213b;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-month {
  margin-bottom: 0.4em;
  font-size: 130%;
  font-weight: 600;
  color: #17213b;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-nav {
  display: inline-block;
  width: 1.6em;
  height: 1.6em;
  position: relative;
  z-index: 5;
  text-decoration: none;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-nav .pignose-calendar-top-value {
  display: inline-block;
  color: #777777;
  font-size: 115%;
  font-weight: 600;
  vertical-align: middle;
  margin-top: -10px;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-nav .pignose-calendar-top-icon {
  color: #555555;
  font-size: 160%;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-nav.pignose-calendar-top-prev {
  float: left;
  margin-left: 1.6em;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-nav.pignose-calendar-top-prev .pignose-calendar-top-value {
  margin-left: 0.2em;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-nav.pignose-calendar-top-next {
  float: right;
  margin-right: 1.6em;
}

.pignose-calendar .pignose-calendar-top .pignose-calendar-top-nav.pignose-calendar-top-next .pignose-calendar-top-value {
  margin-right: 0.2em;
}

.pignose-calendar .pignose-calendar-header {
  padding: 0 1.2em;
  margin-top: 1.2em;
  font-weight: 600;
  overflow: hidden;
  border-bottom: 1px solid #e7e7e7;
}

.pignose-calendar .pignose-calendar-header .pignose-calendar-week {
  float: left;
  width: 14.28%;
  height: 2.8em;
  text-align: center;
  line-height: 2.8em;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.pignose-calendar .pignose-calendar-header .pignose-calendar-week.pignose-calendar-week-sun,
.pignose-calendar .pignose-calendar-header .pignose-calendar-week.pignose-calendar-week-sat {
  color: #253b56;
}

.pignose-calendar .pignose-calendar-header .pignose-calendar-week:last-child {
  width: 14.32%;
}

.pignose-calendar .pignose-calendar-body {
  padding: 1.2em;
}

.pignose-calendar .pignose-calendar-body .pignose-calendar-row {
  overflow: hidden;
}

.pignose-calendar .pignose-calendar-unit {
  float: left;
  display: block;
  height: 3.8em;
  width: 14.28%;
  text-align: center;
  line-height: 2.8em;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.pignose-calendar .pignose-calendar-unit:last-child {
  width: 14.32%;
}

.pignose-calendar .pignose-calendar-unit .pignose-calendar-button-schedule-container {
  line-height: 0.5em;
}

.pignose-calendar .pignose-calendar-unit .pignose-calendar-button-schedule-container .pignose-calendar-button-schedule-pin {
  display: inline-block;
  background-color: #777777;
  width: 0.5em;
  height: 0.5em;
  border-radius: 50%;
  margin-right: 0.2em;
}

.pignose-calendar .pignose-calendar-unit .pignose-calendar-button-schedule-container .pignose-calendar-button-schedule-pin:last-child {
  margin-right: 0;
}

.pignose-calendar .pignose-calendar-unit a {
  display: inline-block;
  width: 2.4em;
  height: 2.4em;
  border-radius: 50%;
  color: #253b56;
  line-height: 2.4em;
  font-family: 'Lato', sans-serif;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  -webkit-transition: background-color 0.3s ease, color 0.3s ease;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.pignose-calendar .pignose-calendar-unit a:active {
  background-color: #d8d8d8;
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-disabled a {
  opacity: 0.5;
  background-color: #efefef;
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-active a {
  background-position: 100% 0;
  background: #f99100;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f99100), color-stop(100%, #f77450));
  background: -webkit-gradient(linear, left top, right top, from(#f99100), to(#f77450));
  background: linear-gradient(to right, #f99100 0%, #f77450 100%);
  color: #ffffff;
  font-weight: 600;
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-active.pignose-calendar-unit-sun a,
.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-active.pignose-calendar-unit-sat a {
  color: #ffffff;
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-range a {
  background-color: #efefef;
  border-radius: 0;
  width: 100%;
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-range.pignose-calendar-unit-disabled a {
  color: #b2b9bb;
  background-color: #e1e1e1;
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-range.pignose-calendar-unit-range-first a {
  border-top-left-radius: 1.2em;
  border-bottom-left-radius: 1.2em;
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-range.pignose-calendar-unit-range-last a {
  border-top-right-radius: 1.2em;
  border-bottom-right-radius: 1.2em;
}

.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-sun a,
.pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-sat a {
  color: #f99300;
}

.pignose-calendar.pignose-calendar-default .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-toggle-active a {
  color: #cccccc !important;
}

.pignose-calendar.pignose-calendar-default.pignose-calendar-reverse .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-toggle-inactive a {
  color: #cccccc !important;
}

.pignose-calendar.pignose-calendar-dark {
  border-color: #323537;
  background-color: #4b4f51;
  -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.5);
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.5);
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-top {
  background-color: #3f4244;
  border-bottom-color: #323537;
  -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, 0.175);
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.175);
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-top .pignose-calendar-top-month {
  color: #ffffff;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-top .pignose-calendar-top-year {
  color: #bdc2c5;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-top .pignose-calendar-top-nav .pignose-calendar-top-value {
  color: #a2a9ab;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-top .pignose-calendar-top-nav .pignose-calendar-top-icon {
  color: #a2a9ab;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-header .pignose-calendar-week {
  color: #bdc2c5;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-header.pignose-calendar-week-sun,
.pignose-calendar.pignose-calendar-dark .pignose-calendar-header.pignose-calendar-week-sat {
  color: #ff6060;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit a {
  color: #51cfd2;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-sun a,
.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-sat a {
  color: #ff6060;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-disabled a {
  color: #868e8f;
  background-color: #5d6365;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-active a {
  color: #ffffff;
  background-color: #31bbbf;
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-toggle a {
  color: #8b8f94;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-range a {
  background-color: #5a5d62;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-range.pignose-calendar-unit-disabled a {
  color: #727a7c;
  background-color: #4f5558;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-button-group {
  border-top: 1px solid #323537;
  overflow: hidden;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-button-group .pignose-calendar-button {
  color: #ffffff;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-button-group .pignose-calendar-button:hover {
  background-color: #5a5d62;
}

.pignose-calendar.pignose-calendar-dark .pignose-calendar-button-group .pignose-calendar-button-apply {
  color: #ffffff;
  background-color: #31bbbf;
}

.pignose-calendar.pignose-calendar-blue {
  background-color: #fafafa;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-top {
  background-color: #009fe3;
  border-bottom-color: #e1e1e1;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-top .pignose-calendar-top-month {
  color: #ffffff;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-top .pignose-calendar-top-year {
  color: #ffffff;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-top .pignose-calendar-top-nav .pignose-calendar-top-value {
  color: #ffffff;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-top .pignose-calendar-top-nav .pignose-calendar-top-icon {
  color: #ffffff;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-header .pignose-calendar-week {
  color: #5c6270;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-header .pignose-calendar-week.pignose-calendar-week-sun,
.pignose-calendar.pignose-calendar-blue .pignose-calendar-header .pignose-calendar-week.pignose-calendar-week-sat {
  color: #fa4832;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit a {
  color: #5c6270;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-sun a,
.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-sat a {
  color: #fa4832;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-disabled a {
  background-color: #efefef;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-active a {
  color: #ffffff;
  background-color: #009fe3;
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-toggle a {
  color: #cccccc;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-range a {
  background-color: #efefef;
}

.pignose-calendar.pignose-calendar-blue .pignose-calendar-body .pignose-calendar-row .pignose-calendar-unit.pignose-calendar-unit-range.pignose-calendar-unit-disabled a {
  background-color: #efefef;
}

.header {
  width: 100%;
}

.header hr {
  position: absolute;
  z-index: 1;
  top: 25px;
  width: 100%;
  background: rgba(255, 255, 255, 0.14);
}

.footer {
  width: 100%;
}

.body-site {
  overflow-x: hidden !important;
}

.home {
  width: 100%;
}

.calendario {
  background: #fff;
  width: 90%;
  border: 1px solid #e7e7e7;
  margin: 3em auto;
  padding: 1rem 2rem 2rem 2rem;
  color: #253b56;
  -webkit-box-shadow: 0px 4px 16px rgba(11, 42, 82, 0.13);
          box-shadow: 0px 4px 16px rgba(11, 42, 82, 0.13);
  border-radius: 7px;
  height: 536px;
}

.calendario__estado {
  position: relative;
}

.calendario__estado span {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-size: 14px;
  line-height: 30px;
  display: inline-block;
  position: absolute;
}

.plomo {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  margin-left: 126px;
  background: #fbf0ed;
  display: inline-block;
  -webkit-box-shadow: 0px 4px 16px #807e7d61;
          box-shadow: 0px 4px 16px #807e7d61;
}

.naranja {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: inline-block;
  margin-left: 86px;
  background: #f7744f;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f7744f), color-stop(50%, #f8802b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#f7744f), color-stop(50%, #f8802b), to(#f99100));
  background: linear-gradient(to right, #f7744f 0%, #f8802b 50%, #f99100 100%);
  -webkit-box-shadow: 0px 4px 16px #e8542c61;
          box-shadow: 0px 4px 16px #e8542c61;
}

.calendario_cabecera {
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  text-align: center;
  position: relative;
}

.flechas {
  position: absolute;
  width: 100%;
  bottom: 0;
  height: 27px;
  top: 0;
  margin: auto;
}

.calendar__date {
  position: relative;
  font-size: 14px;
  line-height: 35px;
  width: 14%;
  float: left;
  padding: 12px;
}

.calendar__day {
  width: 14%;
  float: left;
}

.atras,
.siguiente {
  color: #f99300;
  cursor: pointer;
  font-size: 1.3em;
}

.atras {
  margin-right: auto;
  position: absolute;
  left: 0;
}

.siguiente {
  margin-left: auto;
  position: absolute;
  right: 0;
}

.anio {
  padding-bottom: 1rem;
  color: #003b70;
  font-weight: bold;
  font-family: 'Lato', sans-serif;
}

.mes {
  font-size: 20px;
  color: #003b70;
  margin-bottom: 20px;
  padding: .5em 1em;
  font-weight: bold;
  font-family: 'Lato', sans-serif;
}

.semana,
.dias {
  width: 100%;
}

.semana {
  margin-bottom: 8px;
  padding-bottom: 5px;
  border-bottom: 1px solid #e7e7e7;
}

.dia {
  text-align: center;
  line-height: 3;
  color: #253b56;
  cursor: pointer;
  text-transform: uppercase;
  font-weight: bold;
  font-family: 'Lato', sans-serif;
}

.pintado {
  color: white;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin: auto;
  background: #f7744f;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f7744f), color-stop(50%, #f8802b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#f7744f), color-stop(50%, #f8802b), to(#f99100));
  background: linear-gradient(to right, #f7744f 0%, #f8802b 50%, #f99100 100%);
  -webkit-box-shadow: 0px 4px 16px rgba(232, 84, 44, 0.38);
          box-shadow: 0px 4px 16px rgba(232, 84, 44, 0.38);
}

.pintar_plomo {
  color: #1b1818;
  width: 40px;
  border-radius: 50%;
  margin: auto;
  background: #fbf0ed;
  -webkit-box-shadow: 0px 4px 16px #807e7d61;
          box-shadow: 0px 4px 16px #807e7d61;
}

.calendar__last-days {
  opacity: .3;
  color: #253b56;
}

@media (max-width: 425px) {
  .calendario {
    width: 100%;
  }
}

@media (max-width: 768px) {
  .calendario_body {
    overflow-x: scroll;
  }

  .semana,
  .dias {
    width: 495px;
  }
}

.carousel {
  color: white;
}

.carousel__text-container {
  position: absolute;
  top: 48%;
  left: 50%;
  -webkit-transform: translate(-50%, -40%);
          transform: translate(-50%, -40%);
  text-align: center;
  font-family: 'Paytone One', sans-serif;
  font-size: 1rem;
}

.carousel__btn {
  padding: 5px 20px !important;
  margin-top: 10px;
}

.carousel-indicators {
  bottom: 2%;
}

.carousel__parrafo {
  display: inline-block;
}

.carousel__parrafo--stroke {
  color: white;
  text-shadow: 1px 1px white, -1px -1px white;
}

@supports (-webkit-text-stroke: 1px white) {
  .carousel__parrafo--stroke {
    color: transparent;
    -webkit-text-stroke: 1px white;
    text-shadow: none;
  }
}

.carousel-indicators li {
  width: 10px;
  height: 10px;
  border-radius: 100%;
  background-color: white;
}

.carousel-indicators .active {
  width: 12px;
  height: 12px;
  background-color: #f99300;
}

@media (max-width: 425px) {
  .carousel__text-container {
    top: 37%;
    font-size: 0.9rem;
  }

  .carousel__btn {
    padding: 3px 10px !important;
    margin-top: 0px;
  }

  .btn-light {
    font-size: 0.7rem !important;
  }
}

@media (min-width: 576px) {
  .carousel-indicators {
    bottom: 20%;
  }
}

@media (min-width: 992px) {
  .carousel__text-container {
    font-size: 3.75rem;
  }

  .carousel-indicators {
    bottom: 20%;
  }

  .carousel__btn {
    margin-top: 0px;
    padding: 15px 75px !important;
  }
}

.container-nav {
  z-index: 1;
  background: black;
}

.club-odssy {
  font-weight: bold;
}

.navbar {
  font-family: 'Lato', sans-serif;
  color: white;
  font-size: 0.875rem;
}

.navbar__logo {
  max-width: 180px;
}

.navbar__link {
  color: white;
  padding: 10px 13px;
}

.navbar__link:hover {
  color: #f99300;
  text-decoration: none;
}

.redes {
  padding-left: 13px;
}

.redes__link {
  color: white;
}

.redes__link:hover {
  color: #f99300;
  text-decoration: none;
}

.navbar-light .navbar-toggler {
  color: #f99300;
  border-color: #f99300;
}

.dropdown-menu {
  top: auto;
}

.dropdown-toggle::after {
  display: none;
}

.menu__responsive {
  width: 100%;
  height: 58px;
  background: #0e1126;
  position: fixed;
  top: 0;
  z-index: 1234;
  display: none;
}

.menu__responsive .logo__responsive {
  width: 100%;
  padding: 18px;
}

.menu__responsive .logo__responsive img {
  width: 100px;
}

.menu__responsive .carrito_top {
  position: absolute;
  top: 27px;
  right: 70px;
}

.menu__responsive .carrito_top a i {
  color: #f99300;
}

.menu__responsive .carrito_top a span {
  color: #fff;
}

#menu-icon {
  width: 30px;
  height: 20px;
  position: relative;
  margin: 0 auto;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#menu-icon-shape {
  width: 60px;
  height: 60px;
  position: fixed;
  top: 12px;
  right: 20px;
  display: none;
  z-index: 1234;
  cursor: pointer;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#top,
#middle,
#bottom {
  width: 100%;
  height: 2px;
  background: #e18604;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

#middle {
  margin: 4px 0;
}

/* Transform menu icon into close icon */

#top.active {
  -webkit-transform: translateY(8px) translateX(0) rotate(45deg);
  transform: translateY(8px) translateX(0) rotate(45deg);
}

#middle.active {
  opacity: 0;
}

#bottom.active {
  -webkit-transform: translateY(-4px) translateX(0) rotate(-45deg);
  transform: translateY(-4px) translateX(0) rotate(-45deg);
}

/* Navigation */

#overlay-nav {
  width: 100%;
  height: 0;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 123;
  background: #0e1126;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.35s, visibility 0.35s, height 0.6s ease;
  transition: opacity 0.35s, visibility 0.35s, height 0.6s ease;
}

/* Open navigiation */

#overlay-nav.active {
  width: 100%;
  height: 100%;
  opacity: 100;
  visibility: visible;
}

#nav-content {
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#nav-content ul {
  margin: 0 auto;
  padding: 0;
  list-style: none;
  text-align: center;
}

#nav-content ul li ul.submenu {
  padding: 0px 32px;
}

#nav-content ul li ul.submenu li {
  display: inline-block;
  color: #cdcdcd91;
  padding: 0px 5px;
}

#nav-content ul li ul.submenu li a {
  color: #cdcdcd91;
  font-weight: 300;
}

#nav-content ul li a {
  width: 100%;
  padding: 2% 0;
  display: block;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  font-size: 15px;
  letter-spacing: 0.6px;
  text-decoration: none;
  color: #fff;
  position: relative;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

#nav-content ul li a:hover {
  background: #0c0f1f;
}

#nav-content ul li a span {
  position: relative;
  padding-left: 2.3rem;
}

#nav-content ul li a span.icon:before {
  content: "";
  background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
  background-repeat: no-repeat;
  width: 28px;
  height: 28px;
  position: absolute;
  top: -9px;
  left: 0;
}

#nav-content ul li a span.icon.icon-boleto:before {
  background-position: -26px -30px;
}

#nav-content ul li a span.icon.icon-cumple:before {
  background-position: -0px -30px;
}

#nav-content ul li a span.icon.icon-promo:before {
  background-position: -50px -30px;
}

@media screen and (max-width: 600px) {
  #menu-icon-shape {
    top: 2px;
    right: 9px;
  }

  #nav-content ul li a {
    padding: 3% 0;
  }
}

@media (min-width: 992px) {
  .container-nav {
    position: absolute;
    top: 0;
    background: transparent;
    left: 0;
    right: 0;
    margin: 0 auto;
  }

  .navbar {
    padding-top: 0;
    margin-top: -9px;
  }

  .navbar__logo {
    max-width: 100%;
  }

  .navbar-brand {
    padding-top: 72px;
  }

  .menu-secondary {
    padding-top: 49px;
  }

  .menu-secondary ul li a {
    font-size: 14px;
    font-weight: 900;
    padding: 10px 25px;
    position: relative;
  }

  .menu-secondary ul li a:hover {
    color: #f58508;
  }

  .menu-secondary ul li a .icon {
    background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
    background-repeat: no-repeat;
    width: 28px;
    height: 28px;
    position: absolute;
    top: 0;
  }

  .menu-secondary ul li a:hover .icon-boleto {
    background-position: -26px -30px;
  }

  .menu-secondary ul li a .icon-boleto {
    background-position: -26px 0px;
  }

  .menu-secondary ul li a:hover .icon-cumple {
    background-position: -0px -30px;
  }

  .menu-secondary ul li a .icon-cumple {
    background-position: -0px 0px;
  }

  .menu-secondary ul li a:hover .icon-promo {
    background-position: -50px -30px;
  }

  .menu-secondary ul li a .icon-promo {
    background-position: -50px 0px;
  }

  .menu-secondary ul li a span {
    margin-left: 5px;
  }

  .telefonos-container {
    position: absolute;
    left: 0;
    padding: 0rem 1rem;
  }

  .telefonos-container a {
    font-family: 'Lato', sans-serif;
    font-size: 13px;
    font-weight: 600;
  }

  .telefonos-container a i {
    font-size: 10px;
  }

  .telefonos-container__content {
    margin-top: 11px;
    margin-left: 17px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    padding: 0;
    background: #f7f7f7;
  }

  .telefonos-container__content__item {
    padding: 15px 54px 15px 30px;
  }

  .telefonos-container__content__item:hover {
    background: #fff;
  }

  .telefonos-container__content__item:last-child:hover {
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
  }

  .telefonos-container__content__item:last-child {
    margin-bottom: 0px;
  }

  .telefonos-container__content__item .titulo {
    font-family: 'Lato', sans-serif;
    display: block;
    color: #253b56;
    font-weight: 900;
    margin-bottom: 8px;
  }

  .telefonos-container__content__item .numero {
    display: block;
    color: #253b56;
    font-weight: 400;
  }

  .telefonos-container__content__item .numero i {
    color: #f99300;
    margin-right: 10px;
  }
}

@media (max-width: 425px) {
  .menu__responsive .carrito_top {
    top: 17px;
    right: 57px;
  }
}

@media (min-width: 426px) and (max-width: 991px) {
  .menu__responsive {
    height: 74px;
  }

  .menu__responsive .logo__responsive {
    padding: 26px;
  }
}

@media (max-width: 991px) {
  body {
    margin-top: 58px;
  }

  .menu__responsive {
    display: block;
    -webkit-box-shadow: 0px 1px 10px #0000007a;
            box-shadow: 0px 1px 10px #0000007a;
  }

  #menu-icon-shape {
    display: block;
  }

  .header {
    display: none;
  }
}

@media (min-width: 992px) and (max-width: 1171px) {
  .navbar__link {
    padding: 9px 4px;
    font-size: 12px;
  }
}

.container-pedido {
  z-index: 1;
  border: 4px solid white;
  border-radius: 13px;
  color: #fff;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
  background-image: url(../images/fondo-pedido.jpg?f05aeca029366066572bba8d3ea00812);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 20px 15px;
  color: white;
  font-size: 0.75rem;
}

.container-pedido__item {
  float: left;
  padding: 0px 10px;
  width: 20%;
}

.container-pedido__titulo {
  padding: 15px 0;
}

.container-pedido__select {
  border: 1px solid #f99300;
  color: white;
}

.selector-number {
  text-align: center;
  border: 1px solid #f99300;
  border-radius: 4px;
  width: 106px;
  padding: 8px;
}

.btn-tramitar {
  margin-top: 14px;
}

@media (min-width: 992px) {
  .container-pedido {
    height: 138px;
    margin-top: -65px;
    position: relative;
  }

  .container-pedido__titulo {
    padding: 15px 0 0 0;
    font-weight: bold;
    font-size: 10px;
    margin-bottom: 10px;
  }

  .container-promo {
    padding-left: 50px;
  }
}

@media (min-width: 1274px) and (max-width: 1440px) {
  .container-pedido__titulo {
    font-size: 9px;
  }

  .carro__btn .btn-secondary {
    padding: 14px 19px !important;
  }
}

@media (min-width: 426px) and (max-width: 991px) {
  .container-pedido {
    margin-top: -63px;
    z-index: 12;
    position: relative;
  }

  .container-pedido__item {
    width: 50%;
  }

  .container-pedido__item--centrado {
    width: 100% !important;
  }
}

@media (max-width: 425px) {
  .container-pedido__item {
    width: 100%;
  }
}

.rotate {
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-name: rotacion;
          animation-name: rotacion;
  -webkit-animation-duration: 2s;
          animation-duration: 2s;
  animation-iteration-count: infinite;
}

@-webkit-keyframes rotacion {
  to {
    -webkit-transform: rotate(460deg);
            transform: rotate(460deg);
  }

  from {

  }
}

@keyframes rotacion {
  to {
    -webkit-transform: rotate(460deg);
            transform: rotate(460deg);
  }

  from {

  }
}

.nuestros__productos {
  padding: 80px 0px;
}

.nuestros__productos__tabs {
  margin-top: 30px;
}

.nuestros__productos__tabs li {
  padding: 0px 14px;
}

.nuestros__productos__tabs li.active a {
  color: #f58508;
  border-bottom: 1px solid #f99300;
  padding-bottom: 4px;
}

.nuestros__productos__tabs li a {
  text-decoration: none;
  color: #8caac5;
  font-size: 14px;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-weight: bold;
}

.nuestros__productos__boleto {
  text-align: right;
  padding-top: 30px;
}

.nuestros__productos__boleto a {
  color: #003b70;
  text-decoration: none;
  line-height: 20px;
  font-family: 'Lato', sans-serif;
  text-transform: uppercase;
  font-weight: bold;
}

.nuestros__productos__boleto a img {
  margin-right: 10px;
  margin-bottom: 5px;
}

.nuestros__productos__content {
  padding: 27px 0px;
  margin-top: 10px;
}

.nuestros__productos__content--item {
  background-size: contain;
  background-repeat: no-repeat;
  height: 450px;
  border-radius: 10px;
  padding: 45px;
  color: #fff;
  position: relative;
  margin: 15px 0;
}

.nuestros__productos__content--item--titulo {
  font-family: 'Paytone One', sans-serif;
  font-size: 25px;
  text-transform: uppercase;
  text-shadow: 0px 8px 21px rgba(0, 0, 0, 0.2);
}

.nuestros__productos__content--item--parrafo {
  font-size: 16px;
  font-family: "Lato";
  color: white;
  font-weight: bold;
  line-height: 1.5;
  position: absolute;
  bottom: 32px;
  left: 45px;
}

.nuestros__productos__content--item--parrafo--pequenoW {
  width: 340px;
}

.nuestros__productos__content--item--parrafo--grandeW {
  width: 430px;
}

.ubicaciones {
  padding: 20px 0px 80px;
}

.ubicaciones h2 {
  text-align: center;
  margin-bottom: 30px;
}

.ubicaciones__card {
  background-color: #eeeff4;
  border-radius: 10px;
  padding: 20px  33px;
  margin: 16px 0px;
  min-height: 224px;
}

.ubicaciones__card__titulo {
  color: #003b70;
  font-family: 'Paytone One', sans-serif;
  font-size: 18px;
  text-transform: uppercase;
}

.ubicaciones__card__subtitulo {
  color: #bcc1d5;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  font-size: 16px;
}

.ubicaciones__card__datos {
  padding: 0;
  margin: 0;
}

.ubicaciones__card__datos li {
  list-style: none;
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  padding: 9px 0px;
  position: relative;
}

.ubicaciones__card__datos li i {
  color: #f99300;
  position: absolute;
  top: 16px;
}

.ubicaciones__card__datos li i.icon__telefono {
  -webkit-transform: rotate(100deg);
          transform: rotate(100deg);
}

.ubicaciones__card__datos li span {
  display: block;
  margin-left: 20px;
}

.ubicaciones__card__datos li a {
  color: #a7b3d2;
  font-family: 'Lato', sans-serif;
  text-transform: uppercase;
  text-decoration: none;
}

.ubicaciones__card__datos li a:hover {
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.promociones {
  padding: 20px 0px 80px;
  width: 100%;
  position: relative;
}

.promociones .owl-theme .owl-nav {
  margin-top: 10px;
  position: absolute;
  top: -73px;
  width: 100%;
}

.promociones .owl-prev,
.promociones .owl-next {
  text-indent: -666em;
  overflow: hidden;
  white-space: nowrap;
  position: relative;
  width: 50px;
  height: 50px;
  background: #fff !important;
  position: absolute !important;
}

.promociones .owl-prev {
  left: 0;
}

.promociones .owl-prev:hover:after {
  background-position: -79px -29px;
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}

.promociones .owl-prev:after {
  content: "";
  position: absolute;
  background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
  background-position: -78px 0;
  background-repeat: no-repeat;
  width: 40px;
  height: 37px;
  top: 0;
  left: 0;
}

.promociones .owl-next {
  right: 0;
}

.promociones .owl-next:hover:after {
  background-position: -79px -29px;
  -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
}

.promociones .owl-next:after {
  content: "";
  position: absolute;
  background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
  background-position: -78px 0;
  background-repeat: no-repeat;
  width: 40px;
  height: 37px;
  top: 0;
  left: 0;
  transform: rotate(180deg);
  -webkit-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
}

.promociones h2 {
  text-align: center;
  margin-bottom: 45px;
}

.promociones__item {
  position: relative;
}

.promociones__item--dino {
  position: absolute;
  bottom: 0px;
  right: -168px;
  z-index: 1;
}

.promociones__item--murci {
  position: absolute;
  left: -143px;
  top: 11%;
}

.promociones__item--muneco {
  position: relative;
  margin: auto;
  left: 23px;
  right: 0;
  bottom: -37px;
}

.promociones__item__content {
  background-image: url(../images/fondo.png?7a74ac32d4d7eafd7debd553d4e2b4bc);
  color: #fff;
  padding: 30px;
  border-radius: 10px;
  text-align: center;
  height: 350px;
  margin-top: -27px;
}

.promociones__item__content--precio {
  color: #f99300;
  font-family: 'Paytone One', sans-serif;
  margin-top: 43px;
  position: relative;
}

.promociones__item__content--precio:before {
  content: "";
  position: absolute;
  width: 26px;
  height: 2px;
  background: #ffffff70;
  margin: auto;
  left: 0;
  right: 0;
}

.promociones__item__content--precio span {
  font-size: 52px;
}

.promociones__item__content--precio span i {
  font-size: 20px;
  margin-left: -11px;
}

.promociones__item__content--precio span sup {
  font-size: 20px;
  top: -20px;
}

.promociones__item__content--parrafo {
  font-family: 'Lato', sans-serif;
  font-weight: bold;
  line-height: 22px;
  font-size: 18px;
}

@media (max-width: 575.98px) {
  .hidden-xs {
    display: none !important;
  }

  .nuestras__atracciones__tabs li a {
    font-size: 13px;
  }

  .promociones__item--murci {
    left: 0;
    top: -9%;
    width: 119px;
  }

  .promociones__item--muneco {
    position: absolute;
    width: 177px;
    top: -229px;
    bottom: 0;
    margin: 0 auto;
    text-align: right;
  }

  .promociones__item__content {
    margin-top: 22px;
  }
}

@media (max-width: 320px) {
  .nuestras__atracciones__boleto a {
    font-size: 12px;
  }

  .nuestras__atracciones__content--item {
    padding: 27px;
  }

  .nuestras__atracciones__content--item--rectangulo {
    height: 161px;
  }

  .nuestras__atracciones__content--item--cuadrado {
    height: 229px;
  }

  .nuestras__atracciones__content--item--titulo {
    font-size: 19px;
  }

  .nuestras__atracciones__content--item--parrafo {
    left: 25px;
    font-size: 13px;
  }

  .nuestras__atracciones__content--item--parrafo--pequenoW {
    width: 240px;
  }

  .nuestras__atracciones__content--item--parrafo--grandeW {
    width: 240px;
  }
}

@media (min-width: 321px) and (max-width: 375px) {
  .btn-tramitar {
    margin-top: 32px !important;
  }

  .nuestras__atracciones__content--item {
    padding: 20px;
  }

  .nuestras__atracciones__content--item--titulo {
    font-size: 20px;
  }

  .nuestras__atracciones__content--item--cuadrado {
    height: 272px;
  }

  .nuestras__atracciones__content--item--rectangulo {
    height: 192px;
  }

  .nuestras__atracciones__content--item--parrafo {
    left: 25px;
    font-size: 14px;
    bottom: 11px;
  }

  .nuestras__atracciones__content--item--parrafo--pequenoW {
    width: 296px;
  }

  .nuestras__atracciones__content--item--parrafo--grandeW {
    width: 280px;
  }
}

@media (min-width: 376px) and (max-width: 425px) {
  .nuestras__atracciones__content--item {
    padding: 30px;
  }

  .nuestras__atracciones__content--item--cuadrado {
    height: 312px;
  }

  .nuestras__atracciones__content--item--rectangulo {
    height: 220px;
  }

  .nuestras__atracciones__content--item--parrafo {
    left: 30px;
    font-size: 14px;
  }

  .nuestras__atracciones__content--item--parrafo--pequenoW {
    width: 308px;
  }

  .nuestras__atracciones__content--item--parrafo--grandeW {
    width: 323px;
  }
}

@media (min-width: 426px) and (max-width: 767px) {
  .nuestras__atracciones__content--item {
    padding: 22px;
  }

  .nuestras__atracciones__content--item--titulo {
    font-size: 19px;
  }

  .nuestras__atracciones__content--item--cuadrado {
    height: 228px;
  }

  .nuestras__atracciones__content--item--rectangulo {
    height: 231px;
  }

  .nuestras__atracciones__content--item--parrafo {
    left: 20px;
    font-size: 14px;
  }

  .nuestras__atracciones__content--item--parrafo--pequenoW {
    width: 256px;
  }

  .nuestras__atracciones__content--item--parrafo--grandeW {
    width: 323px;
  }

  .promociones__item__content {
    padding: 40px;
    height: 253px;
    margin-top: -47px;
  }

  .promociones__item__content .btn__general--transparente {
    padding: 10px 34px;
    font-size: 11px;
  }

  .promociones__item__content--precio {
    margin-top: 17px;
  }

  .promociones__item__content--precio span {
    font-size: 29px;
  }

  .promociones__item__content--precio span i {
    font-size: 16px;
    margin-left: -7px;
  }

  .promociones__item__content--precio span sup {
    font-size: 13px;
    top: -12px;
  }

  .promociones__item__content--parrafo {
    line-height: 17px;
    font-size: 15px;
  }

  .promociones__item--dino {
    right: -64px;
    width: 260px;
    bottom: 120px;
  }

  .promociones__item--murci {
    left: -60px;
    width: 150px;
  }

  .promociones__item--muneco {
    display: none;
  }
}

@media (min-width: 768px) and (max-width: 858px) {
  .nuestras__atracciones__content--item {
    padding: 22px;
  }

  .nuestras__atracciones__content--item--titulo {
    font-size: 19px;
  }

  .nuestras__atracciones__content--item--cuadrado {
    height: 228px;
  }

  .nuestras__atracciones__content--item--rectangulo {
    height: 231px;
  }

  .nuestras__atracciones__content--item--parrafo {
    left: 20px;
    font-size: 14px;
  }

  .nuestras__atracciones__content--item--parrafo--pequenoW {
    width: 256px;
  }

  .nuestras__atracciones__content--item--parrafo--grandeW {
    width: 323px;
  }

  .promociones__item__content {
    padding: 21px;
    height: 253px;
    margin-top: -73px;
  }

  .promociones__item__content .btn__general--transparente {
    padding: 10px 34px;
    font-size: 11px;
  }

  .promociones__item__content--precio {
    margin-top: 34px;
  }

  .promociones__item__content--precio span {
    font-size: 29px;
  }

  .promociones__item__content--precio span i {
    font-size: 16px;
    margin-left: -7px;
  }

  .promociones__item__content--precio span sup {
    font-size: 13px;
    top: -12px;
  }

  .promociones__item__content--parrafo {
    line-height: 15px;
    font-size: 11px;
  }

  .promociones__item--dino {
    right: -64px;
    width: 260px;
  }

  .promociones__item--murci {
    left: -60px;
    width: 150px;
  }

  .promociones__item--muneco {
    width: 128px;
    bottom: 25px;
    left: 15px;
  }

  .ubicaciones__card {
    padding: 16px  20px;
  }

  .ubicaciones__card__titulo {
    font-size: 11px;
  }

  .ubicaciones__card__subtitulo {
    font-size: 11px;
  }

  .ubicaciones__card__datos li {
    font-size: 12px;
  }
}

@media (min-width: 992px) and (max-width: 1024px) {
  .ubicaciones__card__titulo {
    font-size: 13px;
  }

  .ubicaciones__card__subtitulo {
    font-size: 12px;
  }

  .ubicaciones__card__datos li span {
    font-size: 12px;
  }

  .btn-secondary {
    padding: 12px !important;
  }

  .btn-primary {
    padding: 12px !important;
  }

  .promociones__item__content {
    padding: 16px;
    height: 292px;
  }

  .promociones__item__content .btn__general--transparente {
    padding: 10px 38px;
    margin-top: 11px;
  }

  .promociones__item__content--parrafo {
    line-height: 22px;
    font-size: 14px;
  }

  .promociones__item__content--precio span {
    font-size: 39px;
  }

  .promociones__item--muneco {
    bottom: -9px;
    width: 167px;
  }

  .nuestras__atracciones__content--item {
    height: 315px;
  }

  .carousel__text-container {
    font-size: 1.75rem;
  }
}

@media (min-width: 1025px) and (max-width: 1440px) {
  .carousel__text-container {
    font-size: 2.75rem;
  }

  .promociones__item__content {
    padding: 3px 20px;
    height: 300px;
  }

  .promociones__item__content--parrafo {
    font-size: 16px;
  }

  .promociones__item__content--precio span {
    font-size: 48px;
  }
}

@media (max-width: 425px) {
  .ubicaciones__card__titulo {
    font-size: 14px;
  }

  .ubicaciones__card__subtitulo {
    font-size: 13px;
  }

  .ubicaciones__card__datos li {
    font-size: 13px;
  }
}

@media (max-width: 998px) {
  .header hr {
    display: none;
  }
}

.cart {
  display: none;
}

#thm_mp_cntnr {
  display: none;
}

.invalid-feedback {
  color: #980715 !important;
  background-color: #877b97 !important;
}

.alertas {
  position: absolute;
  z-index: 12;
  right: 15px;
  top: -730px;
}


.mensaje-u-register {
  width: 100%;
  color: #fff;
}

.recuperar__header {
  position: relative;
}

.recuperar__header a {
  position: absolute;
  right: 24px;
  color: #f58508;
  font-size: 14px;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  text-decoration: none;
  top: 13px;
}

.recuperar__header h4 {
  color: #003b70;
  font-size: 20px;
  margin-bottom: 0;
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
}

.recuperar__body label {
  color: #003b70;
  font-size: 14px;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
}

.recuperar__body input {
  color: #003b70;
  font-family: 'Lato', sans-serif;
}

.recuperar__body input:focus {
  color: #003b70;
}

.swal2-confirm {
  background: #f7744f !important;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f7744f), color-stop(50%, #f8802b), color-stop(100%, #f99100)) !important;
  background: -webkit-gradient(linear, left top, right top, from(#f7744f), color-stop(50%, #f8802b), to(#f99100)) !important;
  background: linear-gradient(to right, #f7744f 0%, #f8802b 50%, #f99100 100%) !important;
}

@font-face {
  font-family: 'Paytone One';
  src: url(../fonts/PaytoneOne-Regular.ttf?1f7652ec6b7800a7c1c3eaa62e5ce1b8);
  /* IE9 Compat Modes */
}

.mostrarcadro {
  -webkit-transform: translate(10%) !important;
          transform: translate(10%) !important;
}

.ocultarcadro {
  -webkit-transform: translate(-200%);
          transform: translate(-200%);
}

@media (min-width: 768px) and (max-width: 1300px) {
  .alertas {
    position: absolute;
    z-index: 12;
    right: 15px;
    top: -220px;
  }
}

@media (min-width: 1300px) and (max-width: 1600px) {
  .alertas {
    position: absolute;
    z-index: 12;
    right: 15px;
    top: -450px;
  }
}

@media (max-width: 767px) {
  .desktop {
    display: none !important;
  }

  .responsive {
    display: block !important;
  }

  .alertas {
    position: absolute;
    z-index: 12;
    right: 5px;
    top: -76px;
    padding: 7px;
  }
}

.logout-responsive a {
  color: black;
}



.decimal {
  font-size: 15px;
}

@media (min-width: 576px) {
  .modalUbicacion__dialog {
    max-width: 800px !important;
  }
}

.mt-top {
  margin-top: -25px;
  margin-left: 196px;
}

.mg-right {
  margin-left: 34px;
}

.icono-mg {
  margin-top: 32px;
  margin-left: 11px;
}

.check-mg {
  margin-top: 10px;
  margin-left: 5px;
}

.activo-icono__check {
  color: #28da28;
}

/* width */

::-webkit-scrollbar {
  width: 7px;
  border-radius: 3px;
}

/* Track */

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */

::-webkit-scrollbar-thumb {
  background: #f99300;
}

/* Handle on hover */

::-webkit-scrollbar-thumb:hover {
  background: #ff9803;
}

body {
  overflow-x: hidden;
}

.btn__facebook {
  margin-top: 10px;
  background: #3b5998;
  display: block;
  border-radius: 7px;
  padding: 6px;
  text-align: center;
  color: #fff;
  font-weight: 600;
  font-size: 20px;
  font-family: 'Lato', sans-serif;
  text-decoration: none;
}

.btn__facebook:hover {
  text-decoration: none;
  color: #fff;
}

.btn__facebook i {
  margin-right: 10px;
}

.form__none {
  display: none;
}

.pintado_naranja {
  width: 50px;
  height: 2px;
  background: red;
}

.activo {
  color: #f58508;
}

.activo .icon-cumple {
  background-position: -0px -30px !important;
}

.activo .icon-promo {
  background-position: -50px -30px !important;
}

.activo .icon-boleto {
  background-position: -26px -30px !important;
}

section h2 {
  color: #003b70;
  font-size: 30px;
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
}

.contenedor_carga {
  background: #2d2c5b;
  height: 100%;
  width: 100%;
  position: fixed;
  -webkit-transition: all 1s ease;
  -o-transition: all 1s ease;
  z-index: 123;
  transition: all 1s ease;
}

.contenedor_carga__giro {
  border: 15px solid #e8e8e8;
  border-top-color: #f99300;
  border-top-style: groove;
  height: 100px;
  width: 100px;
  border-radius: 100%;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  margin: auto;
  bottom: 0;
  -webkit-animation: girar 1.5s linear infinite;
  animation: girar 1.5s linear infinite;
}

@-webkit-keyframes girar {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }

  to {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes girar {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }

  to {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

.banner {
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.banner__media {
  height: 797px;
}

.banner__media__text {
  color: #fff;
}

.banner__media__text:before {
  content: "";
  position: absolute;
  width: 34px;
  height: 2px;
  background: #ffffff7d;
  left: 0;
  right: 0;
  margin: auto;
}

.banner__media__text a {
  display: inline-block;
}

.banner__media__text p {
  margin-bottom: 34px;
  padding-top: 30px;
}

.banner__media__text__titulo {
  font-size: 60px;
  line-height: 70px;
  text-transform: uppercase;
  font-family: 'Paytone One', sans-serif;
  text-shadow: 4.95px 4.95px 9px rgba(2, 13, 56, 0.3);
  margin-top: 33px;
  display: inline-block;
}

.banner__media__text__titulo--stroke {
  color: transparent;
  margin-left: 8px;
  -webkit-text-stroke: 2px white;
  -ms-text-stroke: 2px white;
  -o-text-stroke: 2px white;
  -moz-text-stroke: 2px white;
  -o-text-stroke: 2px white;
  text-shadow: none;
}

.banner__chico {
  height: 462px;
}

.banner__chico--small {
  height: 430px;
}

.banner__chico__text {
  color: #fff;
  margin-top: 55px;
}

.banner__chico__text:before {
  content: "";
  position: absolute;
  width: 34px;
  height: 2px;
  background: #ffffff7d;
  left: 0;
  right: 0;
  margin: auto;
}

.banner__chico__text__titulo {
  font-size: 40px;
  text-transform: uppercase;
  font-family: 'Paytone One', sans-serif;
  text-shadow: 4.95px 4.95px 9px rgba(2, 13, 56, 0.3);
  margin-top: 33px;
  display: inline-block;
}

.banner__chico__text__titulo--stroke {
  color: transparent;
  margin-left: 6px;
  -webkit-text-stroke: 2px white;
  text-shadow: none;
}

.banner__chico__text__parrafo {
  font-size: 18px;
  font-family: 'Lato', sans-serif;
}

.box {
  -webkit-box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.07);
          box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.07);
  border: 1px solid #e7e7e7;
}

.card {
  margin: 14px 0px;
}

.form-check--input {
  margin-left: 15px;
}

.form-check--input input {
  height: 12px !important;
}

.alert-danger {
  margin-left: 4px !important;
  border-radius: 6px !important;
}

#input_oculto {
  display: none;
  position: absolute;
}

#input_oculto input {
  background: transparent !important;
  border-bottom: 1px solid #ffab32 !important;
  height: 27px;
  border: 1px solid transparent;
}

#codigoPromocional {
  display: none;
}

.selector-numero {
  width: 160px;
  margin: auto;
  margin-top: 10px;
}

.selector-numero--home {
  width: 146px !important;
  margin-top: 0px !important;
  margin-left: 0px !important;
}

.selector-numero--home .btn-select {
  padding: 12px 16px !important;
  background: transparent !important;
  border: 1px solid #f99300 !important;
  color: #ffffff !important;
}

.selector-numero--home .input-select {
  height: 44px !important;
  color: #ffffff !important;
  font-family: 'Lato', sans-serif;
  font-weight: 600 !important;
  font-size: 13px !important;
  background: transparent !important;
  border: 1px solid #f99300 !important;
}

.selector-numero .btn-select {
  padding: 18px 18px;
  background: #fff;
  border: 1px solid #e8e8e8;
  color: #0b2a52;
}

.selector-numero .input-select {
  height: 56px;
  color: #0b2a52;
  font-family: 'Lato', sans-serif;
  font-weight: 900;
  font-size: 18px;
  background: #fff;
  border: 1px solid #e8e8e8;
}

.wizards {
  position: relative;
}

.wizards__card {
  margin: 20px 0px;
  height: 617px;
  border-radius: 10px;
  background-size: cover;
  position: relative;
  background-repeat: no-repeat;
}

.wizards__card__item {
  position: absolute;
}

.wizards__card__item--precio {
  color: #f58508;
  font-size: 40px;
  font-family: 'Paytone One', sans-serif;
}

.wizards__card__item--titulo {
  color: #fff;
  font-size: 20px;
}

.wizards__card__item--parrafo {
  color: #fff;
  font-family: 'Lato', sans-serif;
  font-size: 15px;
}

.wizards__card__item .selector-numero {
  margin: 10px 0px;
  width: 120px;
}

.wizards__card__item .selector-numero .btn-select {
  padding: 11px 13px;
  background: rgba(255, 255, 255, 0);
  border: 1px solid #e8e8e873;
  color: #ffffff;
}

.wizards__card__item .selector-numero .btn-select i {
  font-size: 9px;
}

.wizards__card__item .selector-numero .input-select {
  height: 42px;
  color: #ffffff;
  font-size: 16px;
  border: 1px solid #e8e8e873;
  background: rgba(255, 255, 255, 0);
}

.wizards__card__item .carro {
  position: relative;
}

.wizards__card__item .carro a {
  display: block;
  position: absolute;
  right: -45px;
  bottom: 23px;
}

.wizards__card__item .carro a i {
  color: #ff9803;
  position: absolute;
  top: 5px;
}

.wizards__card__item .carro a span {
  display: block;
  margin-left: 26px;
  color: #fff;
  text-transform: uppercase;
  font-weight: bold;
  font-family: 'Lato', sans-serif;
}

.wizards__card__item .carro__input {
  position: absolute;
  left: 22px;
  bottom: 10px;
}

.wizards__card__item .carro__btn {
  position: absolute;
  right: 22px;
  bottom: 10px;
}

.wizards__card__item .carro__btn button {
  background: transparent !important;
  color: #fff;
  border: 1px solid transparent !important;
  cursor: pointer;
}

.wizards__card__item .carro__btn button i {
  color: #f99300;
}

.wizards__card__item--top {
  top: 33px;
  left: 35px;
}

.wizards__card__item--bottom {
  bottom: 30px;
  width: 100%;
}

.wizards__content {
  padding: 50px 0px 110px;
}

.wizards__content__titulo {
  color: #003b70;
  font-size: 30px;
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
}

.wizards__content__botones {
  margin-bottom: 30px;
}

.wizards__content__botones .btn-primary {
  padding: 18px 42px;
}

.wizards__content__botones .btn-secondary {
  background: #003b701a !important;
  color: #253b5642 !important;
  text-transform: uppercase;
  padding: 18px 42px;
}

.wizards__content__parrafo {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  font-size: 17px;
}

.wizards__content__link:hover .btn-check {
  z-index: 12;
  display: block;
  border-radius: 50%;
  height: 90px;
  right: 0;
  margin: auto;
  padding: 23px;
  top: 0;
  position: absolute;
  bottom: 0;
  width: 90px;
  left: 0;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
}

.wizards__content__link:hover .wizards__content__link__item--border {
  display: block;
}

.wizards__content__link:hover .wizards__content__link__item--border .img-top-left {
  position: absolute;
  top: -8px;
  left: -8px;
  -webkit-transform: rotate(270deg);
          transform: rotate(270deg);
}

.wizards__content__link:hover .wizards__content__link__item--border .img-top-right {
  position: absolute;
  right: -8px;
  top: -8px;
}

.wizards__content__link:hover .wizards__content__link__item--border .img-bottom-right {
  position: absolute;
  bottom: -8px;
  right: -8px;
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}

.wizards__content__link:hover .wizards__content__link__item--border .img-bottom-left {
  position: absolute;
  left: -8px;
  bottom: -8px;
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}

.wizards__content__link:hover .wizards__content__link__item:before {
  background: #ffffffe0;
  border: 3px solid #fff;
  border-radius: 10px;
  -webkit-box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.13);
          box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.13);
}

.wizards__content__link:hover .wizards__content__link__item--top--titulo {
  color: #003b70;
}

.wizards__content__link:hover .wizards__content__link__item--top--subtitulo {
  color: #bcc1d5;
}

.wizards__content__link:hover .wizards__content__link__item--bottom--titulo {
  color: #003b70;
}

.wizards__content__link:hover .wizards__content__link__item--bottom--direccion li span {
  color: #003b70;
}

.wizards__content__link__item {
  position: relative;
  height: 560px;
  background-size: cover;
  background-repeat: no-repeat;
  border-radius: 12px;
  background-position: center;
  margin-top: 30px;
  margin-bottom: 30px;
  color: #fff;
  -webkit-transition: all .5s;
  transition: all .5s;
}

.wizards__content__link__item:before {
  content: "";
  position: absolute;
  border-radius: 10px;
  width: 100%;
  height: 100%;
  background: transparent;
}

.wizards__content__link__item:hover:before {
  background: rgba(255, 255, 255, 0.92);
}

.wizards__content__link__item--border {
  display: none;
}

.wizards__content__link__item--top {
  position: absolute;
  top: 26px;
  left: 33px;
}

.wizards__content__link__item--top--titulo {
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
  color: #fff;
  font-size: 20px;
}

.wizards__content__link__item--top--subtitulo {
  font-family: 'Lato', sans-serif;
  font-weight: 700;
}

.wizards__content__link__item--top--precio {
  font-family: 'Paytone One', sans-serif;
  font-weight: 400;
  color: #f99300;
  font-size: 20px;
}

.wizards__content__link__item--top--precio small {
  font-size: 40px;
  font-weight: 700;
}

.wizards__content__link__item--bottom {
  position: absolute;
  left: 20px;
  bottom: 20px;
}

.wizards__content__link__item--bottom--titulo {
  text-transform: uppercase;
  color: #fff;
  font-weight: 900;
  font-family: 'Lato', sans-serif;
  font-size: 13px;
}

.wizards__content__link__item--bottom--direccion {
  padding: 0px 10px;
  list-style: none;
}

.wizards__content__link__item--bottom--direccion li {
  padding: 4px 0px;
  position: relative;
}

.wizards__content__link__item--bottom--direccion li i {
  color: #ff9803;
  position: absolute;
  top: 8px;
}

.wizards__content__link__item--bottom--direccion li span {
  display: inline-block;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  margin-left: 21px;
}

.wizards__content__birthday:hover .btn-check {
  z-index: 12;
  display: block;
  border-radius: 50%;
  height: 90px;
  right: 0;
  margin: auto;
  padding: 23px;
  top: 0;
  position: absolute;
  bottom: 0;
  width: 90px;
  left: 0;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
}

.wizards__content__birthday:hover .wizards__content__birthday__item--border {
  display: block;
}

.wizards__content__birthday:hover .wizards__content__birthday__item--border .img-top-left {
  position: absolute;
  top: -8px;
  left: -8px;
  -webkit-transform: rotate(270deg);
          transform: rotate(270deg);
}

.wizards__content__birthday:hover .wizards__content__birthday__item--border .img-top-right {
  position: absolute;
  right: -8px;
  top: -8px;
}

.wizards__content__birthday:hover .wizards__content__birthday__item--border .img-bottom-right {
  position: absolute;
  bottom: -8px;
  right: -8px;
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}

.wizards__content__birthday:hover .wizards__content__birthday__item--border .img-bottom-left {
  position: absolute;
  left: -8px;
  bottom: -8px;
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}

.wizards__content__birthday:hover .wizards__content__birthday__item:before {
  background: rgba(255, 255, 255, 0.92);
  border: 3px solid #fff;
  border-radius: 10px;
  -webkit-box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.13);
          box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.13);
}

.wizards__content__birthday:hover .wizards__content__birthday__item--top--titulo {
  color: #003b70;
}

.wizards__content__birthday:hover .wizards__content__birthday__item--top--subtitulo {
  color: #bcc1d5;
}

.wizards__content__birthday:hover .wizards__content__birthday__item--bottom--titulo {
  color: #003b70;
}

.wizards__content__birthday:hover .wizards__content__birthday__item--bottom--direccion li span {
  color: #003b70;
}

.wizards__content__birthday__item {
  position: relative;
  height: 560px;
  background-size: cover;
  background-repeat: no-repeat;
  border-radius: 12px;
  background-position: center;
  margin-top: 30px;
  margin-bottom: 30px;
  color: #fff;
  -webkit-transition: all .5s;
  transition: all .5s;
}

.wizards__content__birthday__item:before {
  content: "";
  position: absolute;
  border-radius: 10px;
  width: 100%;
  height: 100%;
  background: transparent;
}

.wizards__content__birthday__item:hover:before {
  background: #2624445e;
}

.wizards__content__birthday__item--border {
  display: none;
}

.wizards__content__birthday__item--top {
  position: absolute;
  top: 26px;
  left: 33px;
}

.wizards__content__birthday__item--top--titulo {
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
  color: #fff;
  font-size: 20px;
}

.wizards__content__birthday__item--top--subtitulo {
  font-family: 'Lato', sans-serif;
  font-weight: 700;
}

.wizards__content__birthday__item--top--precio {
  font-family: 'Paytone One', sans-serif;
  font-weight: 400;
  color: #f99300;
  font-size: 20px;
}

.wizards__content__birthday__item--top--precio small {
  font-size: 40px;
  font-weight: 700;
}

.wizards__content__birthday__item--bottom {
  position: absolute;
  left: 20px;
  bottom: 20px;
}

.wizards__content__birthday__item--bottom--titulo {
  text-transform: uppercase;
  color: #fff;
  font-weight: 900;
  font-family: 'Lato', sans-serif;
  font-size: 13px;
}

.wizards__content__birthday__item--bottom--direccion {
  padding: 0px 10px;
  list-style: none;
}

.wizards__content__birthday__item--bottom--direccion li {
  padding: 4px 0px;
  position: relative;
}

.wizards__content__birthday__item--bottom--direccion li i {
  color: #ff9803;
  position: absolute;
  top: 8px;
}

.wizards__content__birthday__item--bottom--direccion li span {
  display: inline-block;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  margin-left: 21px;
}

.wizards__content__calendario--titulo {
  color: #003b70;
}

.wizards__content__calendario--titulo h5 {
  font-size: 16px;
  font-family: 'Lato', sans-serif;
  font-weight: 800;
}

.wizards__content__calendario--titulo img {
  margin-right: 10px;
}

.wizards__content__hora--titulo {
  color: #003b70;
}

.wizards__content__hora--titulo h5 {
  font-size: 16px;
  font-family: 'Lato', sans-serif;
  font-weight: 800;
  text-transform: uppercase;
}

.wizards__content__hora--titulo img {
  margin-right: 10px;
}

.wizards__content__hora .card-body h5 {
  color: #253b56;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  font-weight: 600;
}

.wizards__content__hora .card-body select {
  border-radius: 4px;
  height: 47px;
  border: 1px solid #e8e8e8;
  color: rgba(37, 59, 86, 0.44);
}

.wizards__content__hora .numberInput {
  width: 70px;
  height: 46px;
  position: relative;
  border: 1px solid #e0e0e0;
  border-radius: 3px;
  padding: 3px;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  overflow: hidden;
}

.wizards__content__hora .numberInput input {
  border: none;
  outline: 0;
  width: 100%;
  height: 100%;
  padding: 3px 7px 0px 4px;
  font-size: 18px;
  color: #cdcdcd;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

.wizards__content__hora--bg {
  background-size: cover;
  background-repeat: no-repeat;
  border-radius: 12px;
  text-align: center;
  height: 286px;
  padding: 20px;
  color: #fff;
  margin-top: 50px;
}

.wizards__content__hora--bg h3 {
  font-family: 'Paytone One', sans-serif;
  color: #f99300;
  font-size: 35px;
  position: relative;
  padding-top: 21px;
}

.wizards__content__hora--bg h3:before {
  content: "";
  position: absolute;
  width: 44px;
  height: 2px;
  background: #ffffff75;
  top: 0;
  left: 0;
  right: 0;
  margin: auto;
}

.wizards__content__hora--bg p {
  font-family: 'Lato', sans-serif;
  font-size: 20px;
  font-weight: 400;
}

.wizards__content__hora--bg span {
  font-size: 17px;
  font-family: 'Lato', sans-serif;
}

.wizards__content .muneco {
  margin-top: 60px;
}

.wizards__content .card.box {
  border: 1px solid rgba(236, 236, 236, 0.53);
}

.wizards__content .card__img {
  margin: auto;
  position: relative;
  text-align: center;
}

.wizards__content .card__img .precio {
  position: absolute;
  top: 20px;
  right: 30px;
}

.wizards__content .card__img .precio span {
  color: #f99300;
  font-family: 'Paytone One', sans-serif;
  font-weight: 500;
  font-size: 40px;
}

.wizards__content .card__img .precio span sup {
  font-size: 16px;
  top: -16px;
}

.wizards__content .card__content {
  text-align: center;
  padding: 50px 70px;
}

.wizards__content .card__content__cantidad__titulo {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-size: 12px;
  font-weight: 700;
}

.wizards__content .card__content h3 {
  font-weight: bold;
  font-size: 18px;
  font-weight: 400;
  font-family: 'Paytone One', sans-serif;
  color: #003b70;
  text-transform: uppercase;
}

.wizards__content .card__content p {
  color: #253b56;
  font-family: 'Lato', sans-serif;
}

.wizards__content .registrate__top {
  padding: 35px 44px;
}

.wizards__content .registrate__top__titulo {
  font-family: 'Paytone One', sans-serif;
  color: #003b70;
  text-transform: uppercase;
  font-size: 17px;
}

.wizards__content .registrate__top__parrafo {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  font-size: 16px;
}

.wizards__content .registrate__top__parrafo a {
  color: #f98e0c;
  text-decoration: underline;
  font-weight: 400;
}

.wizards__content .registrate__bottom {
  border-top: 1px solid #e7e7e7;
  margin-top: 0;
}

.wizards__content .registrate__bottom .pago {
  margin-top: 20px;
}

.wizards__content .registrate__bottom .pago__titulo {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 900;
}

.wizards__content .registrate__bottom .pago__parrafo {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-size: 15px;
}

.wizards__content .registrate__bottom .pago__tarjeta {
  list-style: none;
  padding: 0;
}

.wizards__content .registrate__bottom .pago__tarjeta li {
  display: inline-block;
  padding-right: 10px;
}

.wizards__content .local {
  color: #fff;
  border-radius: 10px;
  background-size: cover;
  margin: 20px 0px;
}

.wizards__content .local__listado {
  padding: 20px 40px;
  list-style: none;
}

.wizards__content .local__listado--item {
  list-style: none;
  padding: 0;
}

.wizards__content .local__listado--item li {
  padding: 10px 0px;
  font-family: 'Lato', sans-serif;
  font-size: 16px;
}

.wizards__content .local__listado--item--left {
  text-align: left;
}

.wizards__content .local__listado--item--right {
  text-align: right;
}

.wizards__content .local__centrado {
  padding: 20px 40px;
  border-top: 1px solid #f2f2f21c;
  height: 137px;
  border-bottom: 1px solid #f2f2f21c;
}

.wizards__content .local__centrado span {
  color: #f58508;
  font-family: 'Paytone One', sans-serif;
}

.wizards__content .local__centrado .numero {
  font-size: 60px;
  line-height: 0.7;
}

.wizards__content .local__centrado .numero sup {
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 27px;
  top: -25px;
}

.wizards__content .local__bottom {
  padding: 34px 40px;
}

.wizards__content .local__bottom .form-check {
  padding-top: 11px;
}

.wizards__content .local__bottom .codigo {
  background: transparent;
  border: 1px solid #ffffff1a;
  height: 43px;
}

.wizards__content .local__bottom .codigo::-webkit-input-placeholder {
  color: #fff;
  opacity: 0.3;
  font-family: 'Lato', sans-serif;
}

.wizards__content .local__bottom .codigo::-ms-input-placeholder {
  color: #fff;
  opacity: 0.3;
  font-family: 'Lato', sans-serif;
}

.wizards__content .local__bottom .codigo::placeholder {
  color: #fff;
  opacity: 0.3;
  font-family: 'Lato', sans-serif;
}

.wizards__content .local__bottom label {
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  font-size: 12px;
  text-transform: uppercase;
}

.wizards__content .parrafo {
  margin-top: 20px;
}

.wizards__content .parrafo p {
  color: #253b56;
  opacity: 0.5;
  font-family: 'Lato', sans-serif;
  font-size: 14px;
  line-height: 1.8;
}

.wizards .wizard {
  height: 100px;
  position: relative;
  top: -18px;
}

.wizards .wizard__progress {
  width: 50%;
  height: 2px;
  background: #003b70;
  position: absolute;
  text-align: center;
  margin: auto;
  left: 0;
  top: 21px;
  right: 0;
}

.wizards .wizard__progress--promo {
  width: 16%;
}

.wizards .wizard__progress--cumpleanos {
  width: 65%;
}

.wizards .wizard__listado {
  width: 100%;
  padding: 0;
  margin: auto;
  text-align: center;
}

.wizards .wizard__listado__item {
  display: inline-block;
  width: 230px;
  position: relative;
}

.wizards .wizard__listado__item--pintado--1 {
  position: absolute;
  display: none;
  width: 220px;
  height: 2px;
  bottom: 0;
  top: 7px;
  margin: auto;
  right: -103px;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
}

.wizards .wizard__listado__item--pintado--2 {
  position: absolute;
  display: none;
  width: 220px;
  height: 2px;
  bottom: 0;
  top: 7px;
  margin: auto;
  right: -103px;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
}

.wizards .wizard__listado__item--pintado--3 {
  position: absolute;
  display: none;
  width: 220px;
  height: 2px;
  bottom: 0;
  top: 7px;
  margin: auto;
  right: -103px;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
}

.wizards .wizard__listado__item--pintado--4 {
  position: absolute;
  display: none;
  width: 220px;
  height: 2px;
  bottom: 0;
  top: 7px;
  margin: auto;
  right: -103px;
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
}

.wizards .wizard__listado__item:last-child:before {
  background: transparent;
}

.wizards .wizard__listado__item a.active span {
  background: #e8542b;
  background: -webkit-gradient(left top, right top, color-stop(0%, #e8542b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#e8542b), to(#f99100));
  background: linear-gradient(to right, #e8542b 0%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8542b', endColorstr='#f99100', GradientType=1 );
}

.wizards .wizard__listado__item a.active p {
  color: #f58508;
}

.wizards .wizard__listado__item a {
  color: #003b70;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  text-decoration: none;
}

.wizards .wizard__listado__item--numero {
  text-align: center;
  position: relative;
}

.wizards .wizard__listado__item--numero span {
  border-radius: 50%;
  display: block;
  background: #003b70;
  width: 36px;
  display: block;
  height: 36px;
  font-weight: bold;
  margin: auto;
  border: 4px solid #fff;
  color: #fff;
  text-decoration: none;
  padding: 2px;
}

.wizards .wizard__listado__item--numero p {
  position: absolute;
  margin: auto;
  left: 0;
  right: 0;
  font-size: 12px;
  font-weight: 900;
  top: 40px;
  font-family: 'Lato', sans-serif;
}

.scrollUp {
  position: absolute;
  bottom: 0px;
  width: 122px;
  height: 194px;
  left: 0;
  right: 0;
  margin: auto;
}

.scrollUp:after {
  position: absolute;
  content: "";
  width: 2px;
  height: 154px;
  background: rgba(255, 255, 255, 0.27);
  left: 0;
  margin: auto;
  right: 0;
  bottom: 0;
}

.scrollUp__link {
  color: #fff !important;
  text-decoration: none !important;
  text-transform: uppercase;
  font-size: 14px;
  font-family: 'Lato', sans-serif;
  font-weight: 900;
}

.cargar__mas {
  width: 100%;
  margin-top: 25px;
  text-align: center;
}

.cargar__mas a {
  font-family: 'Lato', sans-serif;
  text-transform: uppercase;
  font-weight: bolder;
  color: #fff;
  text-decoration: none;
  padding: 13px;
  padding-left: 30px;
  padding-right: 30px;
}

.cargar__mas a img {
  margin-right: 8px;
}

.btn__general,
.btn__general:active,
.btn__general:visited,
.btn__general:focus {
  text-align: center;
  border-radius: 10px;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  text-transform: uppercase;
  text-decoration: none;
  margin-top: 20px;
  display: inline-block;
}

.btn__general--transparente {
  padding: 19px 66px;
  border: 1px solid rgba(255, 255, 255, 0.44);
  color: #fff;
}

.btn__general--transparente:hover {
  background: #fff;
  color: #003b70;
}

.btn__general:hover {
  text-decoration: none;
}

#calendar {
  margin-left: auto;
  margin-right: auto;
  width: 320px;
  font-family: 'Lato', sans-serif;
}

#calendar_weekdays div {
  display: inline-block;
  vertical-align: top;
}

#calendar_content,
#calendar_weekdays,
#calendar_header {
  position: relative;
  width: 320px;
  overflow: hidden;
  float: left;
  z-index: 10;
}

#calendar_weekdays div,
#calendar_content div {
  width: 40px;
  height: 40px;
  overflow: hidden;
  text-align: center;
  background-color: #FFFFFF;
  color: #787878;
}

#calendar_content {
  border-radius: 0px 0px 12px 12px;
}

#calendar_content div {
  float: left;
}

#calendar_content div:hover {
  background-color: #F8F8F8;
}

#calendar_content div.blank {
  background-color: #E8E8E8;
}

#calendar_header,
#calendar_content div.today {
  zoom: 1;
  filter: alpha(opacity=70);
  opacity: 0.7;
}

#calendar_content div.today {
  color: #FFFFFF;
}

#calendar_header {
  width: 100%;
  height: 37px;
  text-align: center;
  background-color: #FF6860;
  padding: 18px 0;
  border-radius: 12px 12px 0px 0px;
}

#calendar_header h1 {
  font-size: 1.5em;
  color: #FFFFFF;
  float: left;
  width: 70%;
}

i[class^=icon-chevron] {
  color: #FFFFFF;
  float: left;
  width: 15%;
  border-radius: 50%;
}

.trabaja {
  padding: 80px 0px;
}

.trabaja__content--item {
  border: 1px solid #e7e7e7;
  padding: 40px 50px;
  margin-top: 25px;
  border-radius: 10px;
}

.trabaja__content--item:hover {
  -webkit-box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.07);
          box-shadow: 0px 19px 46px 0px rgba(11, 42, 82, 0.07);
}

.trabaja__content--item--titulo {
  font-family: 'Paytone One', sans-serif;
  color: #003b70;
  text-transform: uppercase;
  font-size: 20px;
  margin-bottom: 16px;
}

.trabaja__content--item--subtitulo {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  font-size: 16px;
  display: block;
  margin-bottom: 6px;
}

.trabaja__content--item--parrafo {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 400;
  font-size: 16px;
  margin-bottom: 25px;
}

.trabaja__content--item--listado {
  padding: 0;
  margin-bottom: 25px;
}

.trabaja__content--item--listado li {
  list-style: none;
  display: inline-block;
  padding-right: 20px;
}

.trabaja__content--item--listado li h4 {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 900;
  font-size: 16px;
}

.trabaja__content--item--listado li span {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 400;
}

.modalIngresar {
  max-width: 692px;
}

.modalIngresar .container {
  padding: 0px 45px;
}

.modalIngresar__body {
  padding: 35px 30px;
  text-align: center;
  min-height: 656px;
  position: relative;
}

.modalIngresar__body__icon {
  position: absolute;
  top: 34px;
  right: 40px;
  opacity: 1;
}

.modalIngresar__body__logo {
  margin-bottom: 38px;
}

.modalIngresar__body__logo img {
  margin: auto;
}

.modalIngresar__body__link {
  margin-top: 20px;
  color: #cdcdcd;
  font-family: 'Lato', sans-serif;
  font-size: 16px;
}

.modalIngresar__body__link a {
  color: #ff9803;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  text-decoration: underline;
}

.modalVolver {
  max-width: 1150px;
}

.modalVolver__body {
  padding: 30px 30px 50px 30px;
  position: relative;
}

.modalVolver__body__icon {
  position: absolute;
  top: 34px;
  right: 40px;
  opacity: 1;
  z-index: 1;
}

.modalVolver__body__titulo {
  color: #fff;
  font-family: 'Paytone One', sans-serif;
  font-weight: 500;
  text-transform: uppercase;
  margin-bottom: 25px;
}

.modalVolver__body__item {
  height: 300px;
  background-size: cover;
  background-repeat: no-repeat;
  position: relative;
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
  margin: 7px 0px;
  border-radius: 10px;
}

.modalVolver__body__item:hover {
  -webkit-box-shadow: 0px 19px 46px 0px rgba(0, 0, 0, 0.5);
          box-shadow: 0px 19px 46px 0px rgba(0, 0, 0, 0.5);
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}

.modalVolver__body__item:hover h3 {
  color: #f58508;
}

.modalVolver__body__item .boleto {
  width: 29px;
  height: 29px;
  position: absolute;
  background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
  top: 24px;
  left: 24px;
  background-position: 22% 10%;
}

.modalVolver__body__item .cumple {
  width: 29px;
  height: 29px;
  position: absolute;
  background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
  top: 24px;
  left: 24px;
  background-position: 0% 10%;
}

.modalVolver__body__item .promo {
  width: 29px;
  height: 29px;
  position: absolute;
  background-image: url(../images/icon.png?194a9580b33fd556d68f2c377f138da3);
  top: 24px;
  left: 24px;
  background-position: 45% 10%;
}

.modalVolver__body__item h3 {
  position: absolute;
  text-decoration: none;
  font-size: 18px;
  text-transform: uppercase;
  bottom: 30px;
  font-family: 'Paytone One', sans-serif;
  color: #fff;
  left: 40px;
}

.modalTrabaja {
  max-width: 1174px;
  padding: 0;
}

.modalTrabaja__body {
  padding: 0;
  position: relative;
}

.modalTrabaja__body__icon {
  position: absolute;
  top: 34px;
  right: 40px;
  opacity: 1;
  z-index: 1;
}

.modalTrabaja__body .formulario__content {
  margin-top: 30px;
}

.modalTrabaja__body .formulario__content h3 {
  font-size: 24px;
}

.modalTrabaja__body .body-img img {
  width: 100%;
  height: 720px;
  -o-object-fit: cover;
  object-fit: cover;
  border-bottom-left-radius: 10px;
  border-top-left-radius: 10px;
}

.modal-content {
  background-position: center;
  background-size: cover;
  border-radius: 13px;
}

.modal {
  background: rgba(14, 17, 38, 0.73);
  z-index: 1234;
}

.modal__titulo {
  color: #003b70;
  font-size: 20px;
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
}

.modal__parrafo {
  margin-bottom: 4px;
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
}

.modal-content {
  -webkit-box-shadow: 0px 10px 114px 0px rgba(0, 0, 0, 0.49);
          box-shadow: 0px 10px 114px 0px rgba(0, 0, 0, 0.49);
  border-radius: 13px;
}

@media (max-width: 360px) {
  #verificador {
    position: relative;
    top: 38px;
  }
}

@media (max-width: 375px) {
  #verificador {
    position: relative;
    top: 38px;
  }

  .trabaja__content--item {
    padding: 24px 18px;
  }

  .trabaja__content--item--titulo {
    font-size: 16px;
  }

  .trabaja__content--item--subtitulo {
    font-size: 14px;
  }

  .trabaja__content--item--parrafo {
    font-size: 13px;
  }

  .modalTrabaja__body .body-img {
    display: none;
  }

  .modalIngresar .container {
    padding: 0px 15px;
  }

  .modalIngresar__body {
    min-height: 364px;
  }

  .modalIngresar__body__icon {
    top: 21px;
    right: 17px;
  }

  .modalIngresar__body__link {
    font-size: 11px;
  }

  .modalIngresar__body__logo {
    margin-bottom: 42px;
  }

  .modalIngresar__body__logo img {
    width: 80%;
  }

  .modalIngresar__body form .input-group {
    height: 31px;
  }

  .modalIngresar__body form .input-group input {
    height: 31px !important;
  }

  .modalIngresar__body form .input-group .btn-ingresa {
    padding: 4px !important;
    width: 50% !important;
  }

  .wizards__card {
    height: 415px;
  }

  .wizards__content {
    padding: 10px 0px 30px;
  }

  .wizards__content__titulo {
    font-size: 18px;
  }

  .wizards__content__link__item {
    height: 378px !important;
  }

  .wizards__content__link__item--top--titulo {
    font-size: 17px;
  }
}

@media (min-width: 970px) and (max-width: 1024px) {
  .wizards .wizard__progress {
    width: 60%;
  }

  .wizards .wizard__listado__item {
    width: 176px;
  }

  .wizards .wizard__progress--promo {
    width: 19%;
  }

  .wizards .wizard__progress--cumpleanos {
    width: 74%;
  }

  .nuestras__atracciones__content--item {
    height: 297px;
  }

  .nuestras__atracciones__content--item--parrafo {
    left: 30px;
    font-size: 14px;
  }

  .nuestras__atracciones__content--item--parrafo--pequenoW {
    width: 332px;
  }

  .promociones__item--muneco {
    left: 43px;
    width: 116px;
  }

  .promociones__item__content--parrafo {
    line-height: 18px;
    font-size: 12px;
  }

  .promociones__item__content--precio span {
    font-size: 40px;
  }
}

@media (max-width: 425px) {
  .wizards__content .registrate__top {
    padding: 35px 23px;
  }

  .dropdown-menu {
    background: #fff;
    position: relative;
    left: -30% !important;
    top: 60% !important;
    padding: 0;
    min-width: auto;
    padding: 5px 35px 10px 35px;
  }

  .p-vip {
    position: relative;
    top: 20px;
  }

  .decimal {
    font-size: 15px;
    position: relative;
    top: -15px;
  }

  .check-mg {
    margin-top: 10px;
    margin: 15px -10px 2px 9px;
  }

  .icono-mg {
    margin-top: -25px;
    margin: -25px -20px 3px 2px;
    float: right;
  }

  .mg-right {
    margin-left: 0px;
  }

  .btn__facebook {
    font-size: 13px;
  }

  .mt-top {
    margin-left: 181px !important;
  }

  .wizards__card {
    height: 530px;
  }

  .wizards .wizard {
    height: 40px;
  }

  .wizards .wizard__listado__item {
    width: 61px;
  }

  .wizards .wizard__listado__item--numero p {
    display: none !important;
  }

  .wizards .wizard__listado__item--pintado--1 {
    width: 60px;
    right: -30px;
  }

  .wizards .wizard__listado__item--pintado--2 {
    width: 60px;
    right: -30px;
  }

  .wizards .wizard__listado__item--pintado--3 {
    width: 60px;
    right: -30px;
  }

  .wizards .wizard__listado__item--pintado--4 {
    width: 60px;
    right: -30px;
  }

  .wizards__content {
    padding: 10px 0px 30px;
  }

  .wizards__content__titulo {
    font-size: 18px;
    margin-top: 35px;
  }

  .wizards__content__link__item {
    height: 500px;
  }

  .wizards__content__link__item--top--titulo {
    font-size: 17px;
  }

  .wizards__content__hora {
    margin-top: 20px;
  }

  .wizards__content__hora--bg h3 {
    font-size: 24px;
  }

  .wizards__content__hora--bg p {
    font-size: 16px;
  }

  .wizards__content__hora--bg span {
    font-size: 14px;
  }

  .wizards__content__botones {
    text-align: center !important;
  }

  .wizards__content__botones .btn-secondary {
    padding: 14px 30px;
  }

  .wizards__content__botones .btn-primary {
    padding: 14px 30px;
  }

  .wizards__content .local__centrado .numero {
    font-size: 33px;
  }

  .wizards__content .local__listado--item li {
    font-size: 12px;
  }

  section h2 {
    font-size: 23px;
    margin-top: 30px;
  }

  .scrollUp {
    display: none;
  }

  .banner__media {
    height: 140px;
  }

  .banner__media__text {
    color: #fff;
  }

  .banner__media__text:before {
    content: "";
    position: absolute;
    width: 34px;
    height: 2px;
    background: #ffffff7d;
    left: 0;
    right: 0;
    margin: auto;
  }

  .banner__media__text p {
    margin-bottom: 3px;
    padding-top: 8px;
    font-size: 10px;
  }

  .banner__media__text__titulo {
    font-size: 22px;
    margin-top: 12px;
    line-height: 20px;
  }

  .banner__chico {
    height: 142px;
  }

  .banner__chico--small {
    height: 140px;
  }

  .banner__chico__text {
    margin-top: 0px;
  }

  .banner__chico__text:before {
    content: "";
    position: absolute;
    width: 34px;
    height: 2px;
    background: #ffffff7d;
    left: 0;
    right: 0;
    margin: auto;
  }

  .banner__chico__text__titulo {
    font-size: 20px;
    margin-top: 10px;
  }

  .banner__chico__text__titulo--stroke {
    -webkit-text-stroke: 1px white;
  }

  .banner__chico__text__parrafo {
    font-size: 12px;
  }

  .formulario__content {
    padding: 20px 22px;
  }
}

@media (max-width: 991px) {
  .wizards__content__link:hover {
    background: transparent;
  }

  .wizards__content__link__item:before {
    background: transparent !important;
    display: none;
  }

  .wizards__content__link__item--top--titulo {
    color: #fff !important;
  }

  .wizards__content__link__item--top--subtitulo {
    color: #fff !important;
  }

  .wizards__content__link__item--border {
    display: none !important;
  }

  .wizards__content__link__item--bottom--direccion li span {
    color: #fff !important;
  }

  .mg-right {
    margin-left: 0px;
  }

  .dino-img {
    display: none;
  }

  .bruja-img {
    display: none;
  }

  .wizards__content__hora--bg h3 {
    font-size: 24px;
  }

  .wizards__content__hora--bg p {
    font-size: 17px;
  }

  .wizards__content__hora--bg span {
    font-size: 17px;
  }

  .wizards__content__birthday:hover {
    background: red;
  }

  .wizards__content__birthday:hover .wizards__content__birthday__item--border {
    display: none;
  }
}

@media (min-width: 992px) and (max-width: 1024px) {
  .mg-right {
    margin-left: 0px;
  }

  .icono-mg {
    float: right;
    margin: -25px -25px 0 0px;
  }

  .bruja-img {
    width: 286px;
  }

  .dino-img {
    width: 500px;
  }

  .wizards .wizard__progress {
    width: 52%;
  }

  .wizards .wizard__progress--promo {
    width: 20%;
  }

  .wizards .wizard__progress--cumpleanos {
    width: 70%;
  }

  .wizards .wizard__listado__item {
    width: 176px;
  }

  .wizards__content__hora--bg h3 {
    font-size: 24px;
  }

  .wizards__content__hora--bg p {
    font-size: 17px;
  }

  .wizards__content__hora--bg span {
    font-size: 17px;
  }
}

@media (min-width: 426px) and (max-width: 768px) {
  .dropdown-menu {
    background: #fff;
    position: relative;
    left: -30% !important;
    top: 60% !important;
    padding: 0;
    min-width: auto;
    padding: 5px 35px 10px 35px;
  }

  #verificador {
    position: relative;
    top: 0px;
  }

  .wizards__content .local__centrado .numero {
    font-size: 35px;
  }

  .decimal {
    font-size: 15px;
    position: relative;
    top: -15px;
  }

  .icono-mg {
    margin-top: -25px;
    margin: -25px -20px 3px 2px;
    float: right;
  }

  .btn__facebook {
    font-size: 15px;
  }

  .banner .scrollUp {
    display: none;
  }

  .banner .btn__general--transparente {
    display: none;
  }

  .banner__media {
    height: 324px;
  }

  .banner__media__text__titulo {
    font-size: 36px;
    line-height: 40px;
  }

  .banner__chico {
    height: 250px;
  }

  .banner__chico__text {
    margin-top: 0px;
  }

  .banner__chico__text__titulo {
    font-size: 30px;
  }

  .wizards__card {
    height: 315px;
  }

  .wizards__card__item--precio {
    font-size: 30px;
  }

  .wizards__card__item--top {
    left: 13px;
  }

  .wizards__card__item .carro__input {
    left: 15px;
    position: relative;
    bottom: 0;
  }

  .wizards__card__item .carro__btn {
    position: relative;
    left: 15px;
    bottom: 0;
  }

  .wizards .wizard {
    height: 20px;
  }

  .wizards .wizard__listado__item {
    width: 116px;
  }

  .wizards .wizard__listado__item p {
    display: none !important;
  }

  .wizards .wizard__listado__item--pintado--1 {
    width: 111px;
    right: -60px;
  }

  .wizards .wizard__listado__item--pintado--2 {
    width: 111px;
    right: -60px;
  }

  .wizards .wizard__listado__item--pintado--3 {
    width: 111px;
    right: -60px;
  }

  .wizards .wizard__listado__item--pintado--4 {
    width: 111px;
    right: -60px;
  }

  .wizards__content__link__item {
    height: 300px;
  }

  .wizards__content__link__item--top {
    left: 20px;
  }

  .wizards__content__link__item--top--titulo {
    font-size: 15px;
  }

  .wizards__content__link__item--bottom {
    left: 6px;
  }

  .wizards__content__link__item--bottom--direccion li span {
    font-size: 11px;
  }

  .wizards__content__birthday__item {
    height: 300px;
  }

  .wizards__content__birthday__item--top {
    left: 20px;
  }

  .wizards__content__birthday__item--top--precio {
    font-size: 14px;
  }

  .wizards__content__birthday__item--top--precio small {
    font-size: 27px;
  }

  .wizards__content__birthday__item--top--titulo {
    font-size: 15px;
  }

  .wizards__content__birthday__item--bottom {
    left: 6px;
  }

  .wizards__content__birthday__item--bottom--direccion li span {
    font-size: 11px;
  }

  .wizards__content__hora--bg h3 {
    font-size: 24px;
  }

  .wizards__content__hora--bg p {
    font-size: 17px;
  }

  .wizards__content__hora--bg span {
    font-size: 17px;
  }
}

@media (min-width: 626px) and (max-width: 672px) {
  .wizards__card {
    height: 400px;
  }

  .wizards__card__item--precio {
    font-size: 27px;
  }

  .wizards__card__item--top {
    top: 19px;
    left: 26px;
  }

  .wizards__card__item--titulo {
    font-size: 16px;
  }

  .wizards__card__item--parrafo {
    font-size: 12px;
  }

  .wizards__card__item--bottom {
    bottom: 28px;
    left: 26px;
  }

  .wizards__card__item .carro a {
    right: 26px;
    bottom: 17px;
    font-size: 10px;
  }

  .wizards__card__item .carro a i {
    top: 3px;
  }

  .wizards__card__item .carro a span {
    margin-left: 20px;
  }
}

@media (min-width: 901px) and (max-width: 1024px) {
  .dropdown-menu {
    background: #fff;
    position: relative;
    left: -28% !important;
    top: -25% !important;
    padding: 0;
    min-width: auto;
    padding: 5px 20px 10px 20px;
  }

  .icono-mg {
    float: right;
    margin: -25px -25px 0 0px;
  }

  .formulario__content form label {
    font-size: 10px;
  }

  section h2 {
    font-size: 21px;
  }

  .banner .scrollUp {
    height: 70px;
  }

  .banner .scrollUp:after {
    height: 41px;
  }

  .banner__media {
    height: 550px;
  }

  .banner__media__text p {
    margin-bottom: 10px;
  }

  .banner__media__text__titulo {
    font-size: 39px;
    line-height: 39px;
  }

  .wizards__content__link__item {
    height: 410px;
  }

  .wizards__content__link__item--top--titulo {
    font-size: 17px;
  }

  .wizards__content__link__item--bottom--direccion li {
    font-size: 12px;
  }

  .wizards__card {
    height: 428px !important;
  }

  .wizards__card__item--titulo {
    font-size: 17px;
  }

  .wizards__card__item--parrafo {
    font-size: 11px;
  }

  .wizards__card__item--bottom {
    bottom: 28px;
  }

  .wizards__card__item .carro a {
    right: -8px;
    bottom: 21px;
    font-size: 10px;
  }

  .wizards__card__item .carro__input {
    left: 15px;
  }

  .wizards__card__item .carro__btn {
    right: 5px;
    bottom: 28px;
  }
}

@media (max-width: 991px) {
  .mt-menos {
    margin-top: -58px;
  }

  .dropdown-menu a {
    color: #000 !important;
  }
}

@media (min-width: 1250px) {
  .desktop {
    display: block;
  }

  .responsive {
    display: none;
  }
}

@media (min-width: 1286px) and (max-width: 1440px) {
  .decimal {
    position: relative;
    top: -25px;
  }

  .wizards__card {
    height: 570px;
  }

  .wizards__card__item .carro a {
    right: -5px;
    font-size: 11px;
  }
}

@media (min-width: 1312px) and (max-width: 1420px) {
  .wizards .wizard__listado__item {
    width: 213px;
  }
}

@media (min-width: 1445px) {
  .icono-mg {
    position: relative;
    float: right;
    left: 55px;
    top: -56px;
  }

  .decimal {
    position: relative;
    top: -25px;
  }
}

@media (min-width: 1025px) and (max-width: 1440px) {
  .mg-right {
    margin-left: 0px;
  }

  .icono-mg {
    float: right;
    margin: -25px -25px 0 0px;
  }

  .banner .scrollUp {
    height: 106px;
  }

  .banner .scrollUp:after {
    height: 76px;
  }

  .banner__media {
    height: 590px;
  }

  .banner__media__text__titulo {
    font-size: 36px;
    line-height: 40px;
  }

  .banner__chico {
    height: 340px;
  }

  .banner__chico__text {
    margin-top: 0px;
  }

  .banner__chico__text__titulo {
    font-size: 30px;
  }
}

.bg-gradient-danger {
  background: -webkit-gradient(linear, left top, right top, from(#ffbf96), to(#fe7096));
  background: linear-gradient(to right, #ffbf96, #fe7096);
}

.footer {
  background-image: url(../images/fondo-footer.jpg?a09856dddb368d3d747d8d48889c022f);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  color: white;
  padding-top: 20px;
}

.footer__titulo {
  font-size: 0.75rem;
  font-weight: bold;
  padding-top: 25px;
}

.footer__parrafo {
  padding-top: 22px;
  font-family: 'Lato', sans-serif;
  font-size: 16px;
}

.footer__input {
  border: 1px solid #ffffff70;
  color: white;
  padding: 25px 14px;
}

.footer__input::-webkit-input-placeholder {
  color: #ffffff70;
}

.footer__input::-ms-input-placeholder {
  color: #ffffff70;
}

.footer__input::placeholder {
  color: #ffffff70;
}

.footer__input:focus {
  color: white;
  outline: none;
}

.webtilia {
  color: #818aba;
  font-size: 0.875rem;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
}

.webtilia__link {
  color: #818aba;
}

.webtilia__link:hover {
  color: #818aba;
}

.webtilia__link:active {
  color: #818aba;
}

.envio {
  text-align: justify;
}

.envio a {
  text-decoration: none;
  color: #fff;
}

.envio a:hover {
  color: #fff;
}

.lista-footer {
  padding-top: 30px;
  list-style: none;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  padding-left: 15px;
}

.lista-footer__item {
  padding-top: 17px;
}

.lista-footer__item a {
  font-size: 15px;
}

.lista-footer__item::before {
  content: "\2022";
  color: #f99300;
  display: inline-block;
  width: 1em;
  margin-left: -1em;
}

.lista-footer__item--nobullet::before {
  content: "";
}

.lista-footer--padding-min {
  padding-left: 5px;
}

@media (max-width: 768px) {
  .footer {
    padding: 30px 8px;
  }
}

@media (min-width: 992px) {
  .footer {
    padding-top: 55px;
    padding-bottom: 55px;
  }

  .footer__titulo {
    padding-left: 28px;
    padding-top: 0px;
  }

  .footer__parrafo {
    padding-left: 28px;
  }

  .lista-footer {
    padding-top: 30px;
    padding-left: 42px;
  }

  .lista-footer--padding-min {
    padding-left: 28px;
  }
}

.nosotros {
  padding: 100px 0px;
  position: relative;
}

.nosotros .demonio {
  position: absolute;
  bottom: 0;
  left: 0;
  z-index: 1;
}

.nosotros .dinoRex {
  position: absolute;
  bottom: -18px;
  left: 16.4rem;
}

.nosotros .mono {
  position: absolute;
  bottom: -33px;
  left: 14rem;
  z-index: 1;
}

.nosotros__content__parrafo {
  font-family: 'Lato', sans-serif;
  color: #253b56;
  font-size: 22px;
  font-weight: 700;
  line-height: 30px;
  margin-top: 60px;
}

.nosotros__content__parrafo span {
  color: #f99300;
  font-weight: 900;
}

.nosotros__video {
  background-color: #253b56;
  background-repeat: no-repeat;
  background-position: 50%;
  background-size: cover;
  background-attachment: fixed;
  height: 100vh;
  margin-top: -75px;
  position: relative;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -webkit-animation: zoomin 20s ease-in infinite;
  animation: zoomin 20s ease-in infinite;
  -webkit-transition: all 8s ease-in-out;
  transition: all 8s ease-in-out;
  overflow: hidden;
}

.nosotros__video__play {
  position: absolute;
  width: 111px;
  height: 111px;
  padding: 9px;
  left: 0;
  right: 0;
  margin: auto;
  border-radius: 50%;
  background: #f7744f;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f7744f), color-stop(50%, #f8802b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#f7744f), color-stop(50%, #f8802b), to(#f99100));
  background: linear-gradient(to right, #f7744f 0%, #f8802b 50%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7744f', endColorstr='#f99100', GradientType=1 );
}

.zoomout {
  width: 100%;
  height: 100vh;
  text-align: center;
  background: none;
  -webkit-animation: zoomout 20s ease-in infinite;
  animation: zoomout 20s ease-in infinite;
  -webkit-transition: all .5s ease-in-out;
  transition: all .5s ease-in-out;
  overflow: hidden;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.hiden-video {
  overflow: hidden;
}

.parque__Atraccion {
  padding: 100px 0px;
}

.parque__Atraccion__item {
  position: relative;
}

.parque__Atraccion__item--center {
  text-align: center;
}

.parque__Atraccion__item h2 {
  font-size: 25px;
}

.parque__Atraccion__item p {
  color: #253b56;
  font-family: 'Lato', sans-serif;
  font-size: 16px;
}

.parque__Atraccion__item p span {
  font-weight: bold;
}

.parque__Atraccion__item .bruja {
  position: relative;
  margin: auto;
  right: -114px;
  bottom: -34px;
}

.parque__Atraccion__item .murci1 {
  position: absolute;
  left: 50px;
  z-index: 1;
  -webkit-transform: scaleX(-1) rotate(-25deg);
  transform: scaleX(-1) rotate(-25deg);
  -ms-filter: "FlipH";
  -webkit-filter: FlipH;
          filter: FlipH;
  width: 160px;
  top: -55px;
}

.parque__Atraccion__item .murci2 {
  position: absolute;
  right: -133px;
  z-index: 1;
  top: 50px;
  width: 270px;
}

.parque__Atraccion__item .muneco {
  position: relative;
  top: -27px;
}

/* Zoom in Keyframes */

@-webkit-keyframes zoomin {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }

  50% {
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }

  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes zoomin {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }

  50% {
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }

  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

/*End of Zoom in Keyframes */

/* Zoom out Keyframes */

@-webkit-keyframes zoomout {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }

  50% {
    -webkit-transform: scale(0.83);
            transform: scale(0.83);
  }

  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes zoomout {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }

  50% {
    -webkit-transform: scale(0.83);
            transform: scale(0.83);
  }

  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

/*End of Zoom out Keyframes */

@media (max-width: 425px) {
  .nosotros {
    padding: 50px 0px 70px;
  }

  .nosotros__content__parrafo {
    margin-top: 17px;
    font-size: 16px;
  }

  .nosotros .demonio {
    width: 200px;
  }

  .parque__Atraccion__item .bruja {
    right: 0;
    width: 300px;
  }

  .parque__Atraccion__item .murci2 {
    right: 0;
  }
}

@media (min-width: 426px) and (max-width: 767px) {
  .nosotros .demonio {
    display: none;
  }

  .nosotros .mono {
    bottom: -29px;
    left: 2rem;
    width: 560px;
  }

  .nosotros .dinoRex {
    display: none;
  }

  .parque__Atraccion__item {
    padding: 20px;
  }

  .parque__Atraccion__item .bruja {
    display: none;
  }

  .parque__Atraccion__item .murci1 {
    display: none;
  }

  .parque__Atraccion__item .murci2 {
    display: none;
  }
}

@media (min-width: 768px) and (max-width: 1024px) {
  .nosotros {
    padding: 50px 0px 70px;
  }

  .nosotros .demonio {
    display: none;
  }

  .nosotros .mono {
    bottom: -27px;
    left: 4rem;
    width: 600px;
  }

  .nosotros .dinoRex {
    display: none;
  }

  .parque__Atraccion__item .bruja {
    bottom: -30px;
    width: 271px;
    right: 0;
  }

  .parque__Atraccion__item .murci2 {
    right: -104px;
    width: 212px;
  }
}

@media (min-width: 1025px) and (max-width: 1292px) {
  .nosotros .dinoRex {
    left: -1.6rem;
    width: 648px;
  }

  .nosotros .demonio {
    width: 263px;
  }

  .parque__Atraccion__item .bruja {
    right: 0;
  }
}

@media (min-width: 1293px) and (max-width: 1440px) {
  .nosotros .dinoRex {
    left: 1.5rem;
    width: 710px;
  }

  .nosotros .demonio {
    width: 357px;
  }
}

.contacto {
  padding: 100px 0px;
}

.maps {
  position: relative;
}

.maps__content {
  width: 24%;
  position: absolute;
  background: #fff;
  height: 620px;
  top: 0;
  left: 12%;
  bottom: 0;
  border-radius: 10px;
  margin: auto;
  border: 1px solid #cecece69;
}

.maps__content--top {
  padding: 23px 30px;
  border-bottom: 1px solid #cecece69;
}

.maps__content--top h2 {
  font-size: 12px;
  font-weight: 700;
  font-family: 'Lato', sans-serif;
  margin-bottom: 0;
}

.maps__content--bottom {
  padding-right: 9px;
}

.maps__content--bottom--listado {
  cursor: url(../images/pointer.png?03c789ea1bc8bcc0ea0cc64dbee92aed) 32 32, pointer;
  list-style: none;
  padding: 0;
  height: 555px;
  overflow-y: scroll;
}

.maps__content--bottom--listado--item {
  border-bottom: 1px solid #cecece69;
  background: #fafafa;
}

.maps__content--bottom--listado--item:hover {
  background: #fff;
}

.maps__content--bottom--listado--item:hover .item__content {
  opacity: 1;
}

.maps__content--bottom--listado--item .item__content {
  padding: 30px;
  position: relative;
  opacity: 0.5;
  width: 100%;
  text-decoration: none;
  display: block;
}

.maps__content--bottom--listado--item .item__content h3 {
  color: #003b70;
  font-size: 18px;
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
}

.maps__content--bottom--listado--item .item__content__card--left {
  width: 60%;
  position: relative;
}

.maps__content--bottom--listado--item .item__content__card--right {
  width: 40%;
  position: absolute;
  text-align: right;
  right: 5px;
  bottom: 50px;
}

.maps__content--bottom--listado--item .item__content__card i {
  color: #ff9803;
  position: absolute;
  top: 5px;
}

.maps__content--bottom--listado--item .item__content__card span {
  color: #253b56;
  font-weight: 700;
  font-size: 13px;
  display: inline-block;
  margin-left: 17px;
}

.maps #map {
  height: 800px;
}

.club__banner .banner__media__text__titulo {
  margin-top: 0px;
}

.club__contenido {
  padding: 100px 0;
}

.club__contenido__item .span {
  font-size: 22px;
  font-family: "Lato", sans-serif;
  color: #253b56;
  line-height: 1.364;
  margin-top: 14px;
  display: block;
}

.club__contenido__item .parrafo {
  font-size: 16px;
  font-family: "Lato", sans-serif;
  color: #253b56;
  margin-top: 20px;
}

.club__contenido__item--right {
  padding: 50px 0px;
  position: relative;
}

.club__contenido__item--right .img-club-1 {
  top: 100%;
  position: absolute;
  left: -102px;
}

.club__contenido__item--left {
  padding: 50px 0px 0px;
}

.club__contenido__item--left ul {
  padding: 0;
  list-style: none;
  margin-top: 10px;
}

.club__contenido__item--left ul li {
  padding: 10px 0px;
  position: relative;
}

.club__contenido__item--left ul li i {
  color: #f99300;
  width: 15px;
  position: absolute;
  height: 30px;
}

.club__contenido__item--left ul li span {
  font-size: 16px;
  font-family: "Lato", sans-serif;
  color: #253b56;
  font-weight: 500;
  line-height: 1.364;
  margin-left: 24px;
  display: block;
}

.club__contenido2 {
  position: relative;
  padding-bottom: 200px;
}

.club__contenido2 .demonio {
  position: absolute;
  bottom: 92px;
  left: 27px;
}

.club__contenido2 .carro-3d {
  position: absolute;
  bottom: -40px;
  left: 0px;
  margin: auto;
  right: 190px;
}

.club__contenido2__content {
  padding: 50px 0px;
}

.club__contenido2__content__h3 {
  font-size: 25px;
  font-family: 'Paytone One', sans-serif;
  color: #253b56;
}

.club__contenido2__content__parrafo {
  font-family: 'Lato', sans-serif;
  color: #253b56;
  font-size: 21px;
  font-weight: 700;
  line-height: 30px;
  margin-top: 20px;
}

.club__contenido2__content__parrafo span {
  color: #f99300;
  font-weight: 900;
}

.club .locales {
  padding: 100px 0px;
}

.club .locales h2 {
  text-align: center;
}

.club .locales p {
  text-align: center;
  color: #253b56;
  font-size: 16px;
  font-family: 'Lato', sans-serif;
  margin-top: 15px;
  margin-bottom: 36px;
}

.club .locales__item {
  width: 100%;
  height: 254px;
  border-radius: 10px;
  color: #fff;
  position: relative;
  margin: 15px 0;
  overflow: hidden;
}

.club .locales__item__img {
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}

.club .locales__item__img:hover {
  -webkit-transform: scale(1.2) rotate(7deg);
          transform: scale(1.2) rotate(7deg);
}

.club .locales__item:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  background: #080808;
  background: -webkit-gradient(left bottom, right top, color-stop(0%, #080808), color-stop(70%, rgba(181, 181, 181, 0)), color-stop(100%, rgba(255, 255, 255, 0)));
  background: linear-gradient(45deg, #080808 0%, rgba(181, 181, 181, 0) 70%, rgba(255, 255, 255, 0) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#080808', endColorstr='#ffffff', GradientType=1 );
}

.club .locales__item__h3 {
  text-transform: uppercase;
  font-family: 'Paytone One', sans-serif;
  color: white;
  font-weight: 100;
  line-height: 1.5;
  position: absolute;
  bottom: 32px;
  left: 45px;
  font-size: 20px;
}

.club .registrate {
  padding: 100px 0px;
}

.club .registrate .dino {
  width: 76%;
  height: 200px;
  position: relative;
}

.club .registrate .dino img {
  right: 0;
  position: absolute;
  top: -18px;
}

.club .registrate__imagenes {
  position: relative;
  margin-bottom: 40px;
}

.club .registrate__imagenes .bruja {
  position: absolute;
  top: 40px;
  margin: auto;
  left: 0;
  right: 0;
}

.club .registrate__imagenes .murci1 {
  position: absolute;
  -webkit-transform: scaleX(-1) rotate(-25deg);
  transform: scaleX(-1) rotate(-25deg);
  -ms-filter: "FlipH";
  -webkit-filter: FlipH;
  left: 30px;
  top: 60px;
  width: 163px;
}

.club .registrate__imagenes .murci2 {
  position: absolute;
  left: -96px;
  bottom: 30px;
  width: 250px;
}

.club .registrate__imagenes .murci3 {
  position: absolute;
  -webkit-transform: scaleX(-1) rotate(5deg);
  transform: scaleX(-1) rotate(5deg);
  -ms-filter: "FlipH";
  -webkit-filter: FlipH;
  right: -42px;
  bottom: 0;
  width: 244px;
}

.pad-left-cero {
  padding-left: 0;
}

.inputs-plus {
  margin-top: 30px;
}

.inputs-plus button {
  width: 43px;
  height: 47px;
  background: #fff;
  color: #253b56;
  border: 1px solid #e8e8e8;
}

.inputs-plus button i {
  font-size: 10px;
}

@media (max-width: 320px) {
  .club .locales__item {
    height: 217px !important;
  }

  .club .locales__item__h3 {
    bottom: 15px;
    left: 20px;
    font-size: 16px;
  }
}

@media (max-width: 375px) {
  .club__contenido__item--right .img-club-1 {
    left: 0;
  }

  .club__contenido__item--left ul li span {
    font-size: 13px;
  }

  .club__contenido img {
    width: 100%;
  }

  .club__contenido2 {
    padding-bottom: 0px;
  }

  .club__contenido2__content__parrafo {
    font-size: 18px;
  }

  .club .locales {
    padding: 50px 0px;
  }

  .club .locales__item {
    height: 243px;
  }

  .club .locales__item__h3 {
    bottom: 17px;
    left: 20px;
  }

  .club .registrate {
    padding: 50px 0px;
  }

  .club .registrate__imagenes .bruja {
    top: 0;
    width: 195px;
  }
}

@media (max-width: 425px) {
  .club__contenido {
    padding: 30px 0;
  }

  .club__contenido .img-club-3 {
    width: 100%;
    padding-top: 25px;
  }

  .club__contenido__item--right {
    padding: 0;
  }

  .club__contenido__item--right .img-club-1 {
    width: 100%;
    top: 0;
    position: relative;
    left: 0;
  }

  .club__contenido__item .span {
    font-size: 17px;
  }

  .club__contenido2 {
    padding-bottom: 0;
  }
}

@media (min-width: 376px) and (max-width: 425px) {
  .club .locales {
    padding: 50px 0px;
  }

  .club .locales__item {
    height: 272px;
  }

  .club .registrate__imagenes .bruja {
    width: 331px;
    top: -43px;
  }
}

@media (min-width: 426px) and (max-width: 767px) {
  .club__contenido .dino {
    display: none;
  }

  .club__contenido2 {
    padding-bottom: 0px;
  }

  .club__contenido2 .demonio {
    left: 20px;
    position: relative;
    z-index: -1;
    bottom: 70px;
    width: 422px;
  }

  .club__contenido2 .carro-3d {
    display: none;
  }

  .club .locales__item {
    width: 61%;
    height: 265px;
    margin: 15px auto;
  }

  .club .registrate__imagenes .murci3 {
    display: none;
  }
}

@media (min-width: 768px) and (max-width: 900px) {
  .club__contenido__item .span {
    font-size: 13px;
  }

  .club__contenido__item .parrafo {
    font-size: 14px;
  }

  .club__contenido__item--left {
    padding: 21px 0px 0px;
  }

  .club__contenido__item--left ul li {
    padding: 4px 0px;
  }

  .club__contenido__item--left ul li span {
    font-size: 12px;
  }

  .club__contenido2 {
    padding: 10px 0px;
  }

  .club__contenido2 h3 {
    font-size: 17px;
  }

  .club__contenido2__content__parrafo {
    font-size: 15px;
    line-height: 21px;
  }

  .club__contenido2 .demonio {
    display: none;
  }

  .club__contenido2 .carro-3d {
    width: 500px;
    position: relative;
    bottom: -5px;
    left: 0;
  }

  .club .locales {
    padding: 50px 0px;
  }

  .club .locales__item {
    height: 176px;
  }

  .club .locales__item__h3 {
    bottom: 10px;
    left: 15px;
    font-size: 14px;
  }

  .club .registrate {
    padding: 50px 0px;
  }

  .club .registrate__imagenes .bruja {
    width: 150px;
  }

  .club .registrate__imagenes .murci1 {
    left: 0;
    top: 0;
    width: 112px;
  }

  .club .registrate__imagenes .murci2 {
    left: -53px;
    width: 153px;
  }

  .club .registrate__imagenes .murci3 {
    width: 156px;
  }
}

@media (min-width: 901px) and (max-width: 1160px) {
  .club__contenido__item .span {
    font-size: 18px;
  }

  .club__contenido__item .parrafo {
    font-size: 14px;
  }

  .club__contenido__item--left {
    padding: 10px 0px 0px;
  }

  .club__contenido__item--left ul li span {
    font-size: 14px;
  }

  .club__contenido2 {
    padding-bottom: 10px;
  }

  .club__contenido2 .demonio {
    display: none;
  }

  .club__contenido2 .carro-3d {
    position: relative;
  }

  .club__contenido2__content__parrafo {
    font-size: 20px;
    line-height: 27px;
  }

  .club .registrate__imagenes .murci1 {
    left: 0;
    top: 34px;
    display: none;
  }

  .club .registrate__imagenes .murci2 {
    left: -29px;
    width: 170px;
    display: none;
  }

  .club .registrate__imagenes .murci3 {
    display: none;
  }

  .club .registrate__imagenes .bruja {
    top: -38px;
  }

  .club .locales__item {
    height: 170px;
  }
}

@media (min-width: 1161px) and (max-width: 1420px) {
  .club__contenido2 .demonio {
    display: none;
  }

  .club__contenido2 .carro-3d {
    bottom: -91px;
    left: -130px;
  }

  .club .locales__item {
    height: 237px;
  }

  .club .locales__item__h3 {
    left: 21px;
  }
}

@media (max-width: 1596px) {
  .club__contenido__item--right .img-club-1 {
    left: 0;
    position: relative;
  }

  .club__contenido img {
    width: 100%;
  }
}

.carrito {
  padding: 90px 0px;
}

.carrito__content {
  margin-top: 35px;
}

.carrito__content--item {
  border: 1px solid #e7e7e7;
  position: relative;
  padding: 12px 20px;
  height: 122px;
  margin: 30px 0px;
}

.carrito__content--item--link {
  position: absolute;
  top: 0;
  right: -45px;
  bottom: 0;
  margin: auto;
  width: 24px;
  height: 24px;
  z-index: 1;
  outline: none !important;
  cursor: pointer;
  background: transparent !important;
  border: 1px solid transparent !important;
}

.carrito__content--item--img {
  position: absolute;
}

.carrito__content--item--listado {
  margin-left: 116px;
  margin-bottom: 0;
  width: 100%;
}

.carrito__content--item--listado h4 {
  font-family: 'Paytone One', sans-serif;
  text-transform: uppercase;
  color: #003b70;
  font-size: 19px;
  margin-bottom: 0;
  margin-top: 10px;
}

.carrito__content--item--listado .precio h3 {
  font-family: 'Paytone One', sans-serif;
  font-size: 33px;
  color: #f58508;
}

.carrito__content--item--listado .precio h3 span {
  font-size: 20px;
}

.carrito__content--item--listado .precio h3 sup {
  font-size: 15px;
  top: -0.9rem;
  color: #f58508;
}

.carrito__content--item .selector-numero {
  width: 134px !important;
}

.carrito__content--item .selector-numero .btn-select {
  padding: 12px 16px !important;
}

.carrito__content--item .selector-numero .input-select {
  height: 44px !important;
}

.carrito__total {
  margin-top: 35px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  height: 400px;
  border-radius: 10px;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  text-align: center;
  color: #fff;
}

.carrito__total .precio p {
  font-family: 'Lato', sans-serif;
  text-align: left;
  margin-bottom: 0;
  font-weight: 600;
}

.carrito__total .precio h3 {
  font-family: 'Paytone One', sans-serif;
  font-size: 60px;
  color: #f58508;
  margin-bottom: 30px;
}

.carrito__total .precio h3 span {
  font-size: 25px;
}

.carrito__total .precio h3 sup {
  font-size: 25px;
  top: -1.5rem;
  left: -0.4rem;
  color: #f58508;
}

.carrito__total .precio a {
  padding: 10px 50px;
}

.carrito__volver a {
  color: #222a5f;
  text-transform: uppercase;
  font-family: 'Lato', sans-serif;
  font-size: 13px;
  font-weight: 900;
  position: relative;
  display: inline-block;
  text-decoration: none;
}

.carrito__volver a i {
  font-size: 20px;
}

.carrito__volver a span {
  margin-left: 20px;
}

@media (max-width: 363px) {
  .carrito__content--item--listado h4 {
    font-size: 13px !important;
    margin-bottom: 7px !important;
  }

  .carrito__content--item--listado .precio h3 {
    position: relative !important;
    top: 16px !important;
    right: 0 !important;
    font-size: 20px !important;
  }
}

@media (max-width: 425px) {
  .carrito__content--item .selector-numero {
    margin-left: 0 !important;
  }

  .carrito {
    padding: 50px 0px;
  }

  .carrito__content--item {
    height: 180px;
  }

  .carrito__content--item .select-numero {
    margin-left: 0 !important;
  }

  .carrito__content--item--img img {
    width: 67px;
  }

  .carrito__content--item--link {
    right: 10px;
  }

  .carrito__content--item--listado {
    margin-left: 70px;
  }

  .carrito__content--item--listado h4 {
    font-size: 16px;
    margin-bottom: 7px;
  }

  .carrito__content--item--listado .precio {
    position: relative;
  }

  .carrito__content--item--listado .precio h3 {
    position: absolute;
    top: -34px;
    right: 29px;
    font-size: 22px;
  }

  .carrito__content--item--listado .precio h3 sup {
    font-size: 11px;
  }
}

@media (max-width: 768px) {
  .carrito__total {
    height: 210px;
  }

  .carrito__total .precio h3 {
    font-size: 34px;
  }

  .carrito__total .precio h3 sup {
    font-size: 11px;
    top: -1.2rem;
  }
}

@media (min-width: 767px) and (max-width: 1040px) {
  .carrito__content--item .selector-numero {
    width: 70px !important;
  }

  .carrito__content--item .selector-numero .btn-select {
    padding: 8px 5px !important;
  }

  .carrito__content--item .selector-numero .input-select {
    height: 36px !important;
    padding: 4px;
  }

  .carrito__content--item--listado h4 {
    font-size: 12px;
  }

  .carrito__content--item--listado .precio h3 {
    font-size: 17px;
  }

  .carrito__content--item--listado .precio h3 sup {
    font-size: 9px;
  }
}

.subtitulo__checkout {
  margin-top: -25px;
  margin-bottom: 20px;
}

.mercadopago-button {
  background: -webkit-gradient(linear, left top, right top, from(#f7744f), color-stop(50%, #f8802b), to(#f99100)) !important;
  background: linear-gradient(to right, #f7744f 0%, #f8802b 50%, #f99100 100%) !important;
}

.margin-img {
  margin-left: 10px;
  margin-top: -32px;
}

h1.checkout-heading {
  margin-top: 40px;
}

.checkout-section {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 30px;
  margin: 40px auto 80px;
}

.checkout-section .checkout-table-container {
  margin-left: 124px;
}

.checkout-section h2 {
  margin-bottom: 28px;
}

.checkout-section .checkout-table-row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  border-top: 1px solid #919191;
  padding: 14px 0;
}

.checkout-section .checkout-table-row:last-child {
  border-bottom: 1px solid #919191;
}

.checkout-section .checkout-table-row .checkout-table-row-left,
.checkout-section .checkout-table-row .checkout-table-row-right {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.checkout-section .checkout-table-row .checkout-table-row-left {
  width: 75%;
}

.checkout-section .checkout-table-row .checkout-table-img {
  max-height: 60px;
}

.checkout-section .checkout-table-row .checkout-table-description {
  color: #919191;
}

.checkout-section .checkout-table-row .checkout-table-price {
  padding-top: 6px;
}

.checkout-section .checkout-table-row .checkout-table-quantity {
  border: 1px solid #919191;
  padding: 4px 12px;
  margin-right: 5px;
}

.checkout-section .checkout-totals {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  border-bottom: 1px solid #919191;
  padding: 18px 0;
  line-height: 2;
}

.checkout-section .checkout-totals .checkout-totals-right {
  text-align: right;
}

.checkout-section .checkout-totals .checkout-totals-total {
  font-weight: bold;
  font-size: 22px;
  line-height: 2.2;
}

/**
* The CSS shown here will not be introduced in the Quickstart guide, but shows
* how you can use CSS to style your Element's container.
*/

.StripeElement {
  border-radius: 4px;
  height: 47px;
  border: 1px solid #e8e8e8;
  color: #f99300;
  padding: 16px;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

#card-errors {
  color: #fa755a;
}

.btn-primary,
.btn-primary:active,
.btn-primary:visited,
.btn-primary:focus {
  moz-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
  border: 0;
  border-radius: 8px;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  background-size: 300% 100%;
  text-transform: uppercase;
  outline: none;
  background: #f7744f;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f7744f), color-stop(50%, #f8802b), color-stop(100%, #f99100));
  background: -webkit-gradient(linear, left top, right top, from(#f7744f), color-stop(50%, #f8802b), to(#f99100));
  background: linear-gradient(to right, #f7744f 0%, #f8802b 50%, #f99100 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7744f', endColorstr='#f99100', GradientType=1 );
}

.btn-primary:hover {
  background-position: 100% 0;
  background: #f99100;
  background: -webkit-gradient(left top, right top, color-stop(0%, #f99100), color-stop(100%, #f77450));
  background: -webkit-gradient(linear, left top, right top, from(#f99100), to(#f77450));
  background: linear-gradient(to right, #f99100 0%, #f77450 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f99100', endColorstr='#f77450', GradientType=1 );
}

.btn-primary:not(:disabled):not(.disabled):active:focus,
.btn-primary:focus,
.btn-primary.focus {
  -webkit-box-shadow: none;
          box-shadow: none;
}

.btn-light,
.btn-light:active,
.btn-light:visited,
.btn-light:focus {
  padding: 15px 75px;
  font-family: 'Lato', sans-serif;
  font-size: 0.875rem;
  color: white;
  border-radius: 8px;
  background: transparent;
}

.btn-light:hover {
  color: black;
  background-color: white;
}

.btn-secondary,
.btn-secondary:active,
.btn-secondary:visited,
.btn-secondary:focus {
  border: 1px solid white;
  padding: 15px 30px;
  font-family: 'Lato', sans-serif;
  font-size: 0.875rem;
  color: #f99300;
  border-radius: 8px;
  background: white;
}

.btn-secondary:hover {
  border: 1px solid white;
  color: white;
  background-color: transparent;
}

.form-group {
  width: 100%;
}

.form-control:focus {
  border-color: #f99300;
  color: white;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 191, 99, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 191, 99, 0.6);
}

.bg-warning {
  background-color: #ea5d26 !important;
}

select.decorated option:hover {
  -webkit-box-shadow: 0 0 10px 100px #1882A8 inset;
          box-shadow: 0 0 10px 100px #1882A8 inset;
}

































</style>


<section class="contacto">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <h2>Escríbenos</h2>
      </div>
      <div class="col-md-7">
        <!-- <div data-aos="fade-right" class="formulario__content box"> -->
        <div class="formulario__content box">
          <h3>Estamos a su disposición</h3>

          <form class="row" id="formContacto" name="formContacto" method="post" action="{{ url('contactanos') }}">
            <input type="hidden" name="_token" id="csrf_toKen2" value="{{ csrf_token() }}">
            <div class="form-group col-md-6">
              <label for="">Nombres y apellido</label>
              <input type="text" class="form-control" id="nombres" name="nombres" aria-describedby="emailHelp" placeholder="Renzo James Perez Perez">
              <label for="nombres" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" class="form-control" id="email_contacto" name="email" placeholder="Ejem: usuario@dominio.com">
              <label for="email" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Asunto</label>
              <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Ejem: Full day">
              <label for="asunto" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputPassword1">Teléfono</label>
              <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ejem: 987 987 981">
              <label for="telefono" generated="true" class="error"></label>
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputPassword1">Mensaje</label>
              <textarea name="mensaje" id="mensaje" class="form-control" rows="5" placeholder="Saludos ..."></textarea>
              <label for="mensaje" generated="true" class="error"></label>

            </div>
            <div class="form-check col-md-8">
              <input type="checkbox" class="form-check-input input-check" name="politica">
              <span class="politica">Al hacer clic en "Enviar" certifico que acepto <a href="#" data-toggle="modal" data-target="#modalCondicion">las Condiciones de Uso</a> y <a href="#" data-toggle="modal" data-target="#modalPolitica">la Política de Privacidad.</a></span>
            </div>
            <span>
                <strong id='mensajePolitica'></strong>
            </span>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn__enviar">Enviar</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-5">
          <!-- <img src="{{ asset('img/contacto.png') }}" class="contacto__img" alt=""> -->
      </div>
    </div>
  </div>
</section>

<section class="ubicaciones">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Ubicaciones</h2>
      </div>
      <!-- colocar una logica si los locales son 3 colocar col-4 si es mas de 3 dejar el col-3 -->

      @foreach($locales as $key => $l)
      <div class="col-md-3 col-xs-12 col-sm-6">
        <div class="ubicaciones__card">
          <h3 class="ubicaciones__card__titulo">{{ $l->nombre }}</h3>
          <span class="ubicaciones__card__subtitulo">{{ $l->distrito }}</span>
          <ul class="ubicaciones__card__datos">
            <li><i class="fas fa-map-marker-alt"></i><span> {{ $l->direccion }}</span> </li>
            <li><i class="fas fa-phone icon__telefono"></i><span> {{ $l->telefono }}</span> </li>
            {{-- <li><a href="{{url('donde-estamos')}}" class="ubicaciones__card__datos--link"> Ver en mapa</a></li> --}}
            <li><a class="ubicaciones__card__datos--link" onclick="cargarMapa({{$l->id}})"  href="#" data-toggle="modal" data-target="#modalUbicacion">Ver en mapa</a></li>
          </ul>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>


<div class="modal fade modalUbicacion" id="modalUbicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modalUbicacion__dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="">
      <div class="modal-body modalUbicacion__body d-flex align-items-center">
        <button type="button" class="close modalUbicacion__body__icon " data-dismiss="modal" aria-label="Close">
          <img src="{{ asset('img/contacto.png') }}" alt="">
        </button>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-12 col-sm-12">

              <div id="mapa" class="mapa__modal">
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection
@section('scripts')
{{-- <script type="text/javascript">
  const site_url = '{{ url('/') }}/';
</script> --}}
<!-- <script type="text/javascript" src="{{ url('/') }}/js/contacto.js"></script> -->
<script type="text/javascript" src="{{ asset('../resources/js/scripts/contacto.js')}}"></script>


@stop
