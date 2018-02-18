@if (session()->has('success'))
    <script>
        $.Notification.autoHideNotify('success', 'top right', '','{!! session()->get('success') !!}');
    </script>
@endif

@if (session()->has('info'))
    <script>
        $.Notification.autoHideNotify('info', 'top right', '','{!! session()->get('info') !!}');
    </script>
@endif

@if (session()->has('warning'))
    <script>
        $.Notification.autoHideNotify('warning', 'top right', '','{!! session()->get('warning') !!}');
    </script>
@endif

@if (session()->has('error'))
    <script>
        $.Notification.autoHideNotify('error', 'top right', '','{!! session()->get('error') !!}');
    </script>
@endif

@if (session()->has('black'))
    <script>
        $.Notification.autoHideNotify('black', 'top right', '','{!! session()->get('black') !!}');
    </script>
@endif

@if (session()->has('white'))
    <script>
        $.Notification.autoHideNotify('white', 'top right', '','{!! session()->get('white') !!}');
    </script>
@endif
