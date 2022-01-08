    <!-- All Jquery -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <!-- select 2 js -->
    <script src="{{ asset('assets/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/sticky-kit.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

    <!--bootstrap-wysihtml5 JavaScript -->
    <script src="{{ asset('assets/js/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-wysihtml5.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $("#is_leased").change(function(){
            var type = $(this).val();
            if(type==0)
            {
                $('#leased_company_name').hide();
            }else{
                $('#leased_company_name').show();
            }
    })
    </script>