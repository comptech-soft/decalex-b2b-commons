<script src="{{ asset('vendors/moment/moment.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('vendors/axios/axios.min.js') }}"></script>
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/vue/vue.js') }}"></script>
<script src="{{ asset('vendors/vuex/vuex.min.js') }}"></script>
<script src="{{ asset('vendors/vue-router/vue-router.min.js') }}"></script>
<script src="{{ asset('vendors/vuetify/vuetify.min.js') }}"></script>
<script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('vendors/awesome-notifications/index.js') }}"></script>
<script src="{{ asset('vendors/pusher/pusher.min.js') }}"></script>

@foreach($scripts as $i => $script)
    <script src="{{ $script }}?v={{time()}}"></script>
@endforeach

@yield('scripts')
