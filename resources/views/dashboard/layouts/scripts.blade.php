<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<script src="{{ asset('assets/dashboard/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('assets/dashboard/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->



<!-- Summernote JS -->
<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
<script>
(function() {
    function initSummernoteDropdownFix() {
        $(document).off('click.summernoteDropdown', '.note-btn-group .dropdown-toggle');
        $(document).on('click.summernoteDropdown', '.note-btn-group .dropdown-toggle', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var $toggle = $(this);
            var $group = $toggle.closest('.note-btn-group');
            var $menu = $group.find('.note-dropdown-menu');
            $('.note-btn-group').not($group).removeClass('open');
            $('.note-dropdown-menu').not($menu).removeClass('show').hide();
            $group.toggleClass('open');
            if ($menu.length) {
                $menu.toggleClass('show').toggle();
            }
        });
        $(document).off('click.summernoteDropdownClose');
        $(document).on('click.summernoteDropdownClose', function(e) {
            if (!$(e.target).closest('.note-btn-group').length) {
                $('.note-btn-group').removeClass('open');
                $('.note-dropdown-menu').removeClass('show').hide();
            }
        });
    }
    if (typeof $ !== 'undefined') {
        $(document).ready(initSummernoteDropdownFix);
        $(document).on('summernote.init', initSummernoteDropdownFix);
    }
})();
</script>

@stack('js')
@stack('scripts')
<!-- Vendors JS -->
<script src="{{ asset('assets/dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}">
</script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}">
</script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}">
</script>

<!-- Main JS -->
<script src="{{ asset('assets/dashboard/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/dashboard/assets/js/dashboards-analytics.js') }}"></script>
