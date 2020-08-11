

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('Alert-' . $msg))
        <div class="alert alert-{{ $msg }}">
            {!!   Session::get('Alert-' . $msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        @php(Session::forget('Alert-' . $msg))
    @endif
@endforeach