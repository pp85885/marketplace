</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{-- later message for success --}}
@if (session()->has('success'))
    <script>
        toastr.success("{{ session()->get('success') }}");
    </script>
@endif

{{-- alert message for the failed --}}
@if (session()->has('fail'))
    <script>
        toastr.error("{{ session()->get('fail') }}");
    </script>
@endif

@yield('script')

</body>

</html>