@if (Session::has('success'))
    <script type="text/javascript">
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            showMethod: 'slideDown',
            timeOut: 5000
        };

        toastr.success("{{ Session::get('success') }}");
    </script>
@endif

@if (Session::has('error'))
    <script type="text/javascript">
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            showMethod: 'slideDown',
            timeOut: 5000
        };

        toastr.error("{{ Session::get('error') }}");
    </script>
@endif

@if (Session::has('warning'))
    <script type="text/javascript">
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            showMethod: 'slideDown',
            timeOut: 5000
        };

        toastr.warning("{{ Session::get('warning') }}");
    </script>
@endif

@if (Session::has('info'))
    <script type="text/javascript">
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            showMethod: 'slideDown',
            timeOut: 5000
        };

        toastr.info("{{ Session::get('info') }}");
    </script>
@endif
