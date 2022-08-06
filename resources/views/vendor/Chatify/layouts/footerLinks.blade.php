<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<script >
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

//   var pusher = new Pusher("{{ config('chatify.pusher.key') }}", {
//     encrypted: true,
//     cluster: "{{ config('chatify.pusher.options.cluster') }}",
//     authEndpoint: '{{route("pusher.auth")}}',
//     auth: {
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     }
//   });

var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}",{
    broadcaster: 'pusher',
    authEndpoint: '/pusher/auth',
    auth: {
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        }
    },
    wsHost: window.location.hostname,
    wssHost: window.location.hostname,
    wsPort: "{{env('LARAVEL_WEBSOCKETS_PORT' , 6001 )}}",
    wssPort: "{{env('LARAVEL_WEBSOCKETS_PORT' , 6001 )}}",
    disableStats: true,
    forceTLS: false
});

    // Bellow are all the methods/variables that using php to assign globally.
    const allowedImages = {!! json_encode(config('chatify.attachments.allowed_images')) !!} || [];
    const allowedFiles = {!! json_encode(config('chatify.attachments.allowed_files')) !!} || [];
    const getAllowedExtensions = [...allowedImages, ...allowedFiles];
    const getMaxUploadSize = {{ Chatify::getMaxUploadSize() }};
</script>
<script src="{{ asset('js/chatify/code.js') }}"></script>
