@if (Session::has('sweet_alert.alert'))
    <script>
        @if (Session::has('sweet_alert.content'))
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
            type: "{!! Session::get('sweet_alert.type') !!}",
            showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
            confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
            confirmButtonColor: "#4caf50"
        });
        @else
            swal({!! Session::pull('sweet_alert.alert') !!});
        @endif
    </script>
@endif
