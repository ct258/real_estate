<!-- Filter form section -->
{{-- <div class="container"> --}}
<form action="{{route('list.sort')}}" method="post">
    @csrf
    <div class="row search">
        <div class="col search1" data-wow-delay="1s">
            <div class="input-group input-group_1">
                <input class="form-control" placeholder="@lang('Search_local')" id="search" type="text" value=""
                    name="search">
            </div>
            {{-- </form> --}}
        </div>

        <div class="col-lg-2 search1" data-wow-delay="1s">
            <button class="btn btn-orange " type="submit">
                @lang('Search') <i class="fa fa-search" style="color: white;"></i>
            </button>
        </div>
    </div>
    </div>
</form>
<!-- Filter form section end -->