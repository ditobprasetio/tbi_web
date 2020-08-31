<!-- header -->
@if ($preview_mode)
    @include('../parts/header')
@else
    @include('../tools/header')
@endif

	
<!-- dynamic layout pages -->
    @include($slug_view)
<!-- =================== -->

<!-- footer -->
@if ($preview_mode)
    @include('../parts/footer')
@else
    @include('../tools/footer')
@endif
       