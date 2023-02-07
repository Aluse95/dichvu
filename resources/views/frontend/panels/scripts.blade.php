{{-- <div id="gotoTop" class="icon-angle-up"></div> --}}
<button onclick="topFunction()" id="myBtn"><i class="fa-solid fa-chevron-up"></i></button>

<script src="{{ asset('themes/frontend/f4web/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/frontend/f4web/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('themes/frontend/f4web/js/app.js') }}"></script>
<script src="{{ asset('themes/frontend/f4web/js/service.js') }}"></script>
<script src="{{ asset('themes/frontend/f4web/js/faq.js') }}"></script>
<script src="{{ asset('themes/frontend/f4web/js/footer.js') }}"></script>

@isset($web_information->source_code->footer)
  {!! $web_information->source_code->footer !!}
@endisset
