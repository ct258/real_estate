@extends('layouts.user')

@push('css')

<style>
    .page-section {
        margin: 0 50px;
    }

    .filter-form input {
        width: 100% !important;
    }

    .filter-form select {
        width: 100% !important;
    }

    .search-form td {
        padding: 5px 0;
    }

    .filter-form .fs-submit {
        width: 100%;
    }

    #paginationa {
        display: contents;
    }

    #search-form {
        width: 100%;
    }

    .left {
        margin: 10px 0;
    }

    button.btn.btn-primary.mn {
        width: 86px;
        height: 30px;
        padding: 1px;
        font-size: 14px;
        margin-left: 75px;
    }

    button.btn.btn-primary.mn:hover {
        color: aquamarine;
    }

    .list {
        margin-top: 100px;
        margin-bottom: 100px;
    }

    .feature-title h5 {
        min-height: 58px;
    }

    .room-info-warp {
        padding: 15px 25px;
    }
</style>
@endpush

@section('page')

<!-- Page -->
<section class="page-section list">
    <div class="container-fruid">
        <div class="row">
            {{-- <div class="section-title">
                <h2>@lang("List Product")</h2>
            </div> --}}
            {{-- main page --}}
            <div class="col-lg-9 frame">
                <div class="row">
                    <div id="paginationa" class="paginationa">
                        @include('pages.user.page.list_ajax')
                    </div>
                </div>
                {{ $real_estate->links() }}
            </div>

            {{-- end main page --}}
            {{-- search form --}}
            <div class="col-lg-3">
                @include('pages.user.page.search')

            </div>
            {{-- end search form --}}


        </div>


        {{-- <div class="site-pagination">
            </div> --}}

    </div>
</section>

@endsection


@push('script')

<script type="text/javascript">
    $('#header-search').on('keyup', function() {
            var search = $(this).serialize();
            if ($(this).find('.m-input').val() == '') {
                $('#search-suggest div').hide();
            } else {
                $.ajax({
                    url: '/search',
                    type: 'POST',
                    data: search,
                })
                .done(function(res) {
                    $('#search-suggest').html('');
                    $('#search-suggest').append(res)
                })
            };
        });
</script>
@endpush