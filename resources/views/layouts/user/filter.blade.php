<!-- Filter form section -->
{{-- <div class="container"> --}}
<div class="row search">
    {{-- <form action="#"> --}}

    <div class="col search1" data-wow-delay="1s">
        <form>
            <div class="input-group input-group_1">
                <input class="form-control" placeholder="@lang('Search_local')" id="search"
                    type="text" value="">
                <select class="select1">
                    <option value="">@lang('Buy')</option>
                </select>
                <select class="select1">
                    <option value="">@lang('Sell')</option>
                </select>
            </div>
        </form>
    </div>

    <div class="col-lg-2 search1" data-wow-delay="1s">
        <button class="btn btn-orange " type="submit">
            @lang('Search') <i class="fa fa-search" style="color: white;"></i>
        </button>
    </div>
    {{-- </form> --}}
</div>
</div>
{{-- </div> --}}
<!-- Filter form section end -->