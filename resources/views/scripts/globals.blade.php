<!-- App Globals -->
<script>
    window.App = {
        // Token CSRF de Laravel
        csrfToken: '{{ csrf_token() }}',
        host: '{{ url("/") }}'       
    }
</script>