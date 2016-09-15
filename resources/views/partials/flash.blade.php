@if(session()->has('flash'))
    <div></div>
@endif

<script>
    $.notify("{{ session('flash.message') }}", "{{ session('flash.type') }}");
</script>