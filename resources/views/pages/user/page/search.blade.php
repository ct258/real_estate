<form class="filter-form" action="{{route('list.sort')}}" method="POST">
    @csrf

    <div class="left">
        <td><input type="text" name="search" placeholder="Nhập địa điểm.."><br>
        </td>
    </div>
    <div class="left">
        <select name="form" id="form">
            <option value="">-- Chọn loại tin rao --</option>
            @foreach ($data['form'] as $key=>$item)
            <option value="{{$item->form_translation_id}}">{{$item->form_translation_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="left">
        <select name="type" id="type">
            <option value="">-- Chọn loại nhà đất --</option>
        </select>
    </div>
    <div class="left">
        <select name="acreage" id="acreage">
            <option value="">-- Chọn Diện tích --</option>
            <option value=""><button type="text" name="" id="">Chưa xác định</button></option>
            <option value=""><button type="text" name="" id="">
                    <= 30 m2</button> </option> <option value=""><button type="text" name="" id="">30 -
                            50 m2</button></option>
            <option value=""><button type="text" name="" id="">50 - 80 m2</button></option>
            <option value=""><button type="text" name="" id="">80 - 100 m2</button></option>
            <option value=""><button type="text" name="" id="">100 - 150 m2</button></option>
            <option value=""><button type="text" name="" id="">150 - 200 m2</button></option>
            <option value=""><button type="text" name="" id="">200 - 250 m2</button></option>
            <option value=""><button type="text" name="" id="">250 - 300 m2</button></option>
            <option value=""><button type="text" name="" id="">300 - 500 m2</button></option>
            <option value=""><button type="text" name="" id="">>= 500 m2</button></option>
        </select>
    </div>
    <div class="left">
        <select name="price" id="price">
            <option value="">-- Chọn Giá --</option>
        </select>
    </div>
    <div id="demo" class="collapse">
        <div class="left">
            <select name="province" id="province">
                <option value="">-- Chọn Tỉnh/Thành phố --</option>
                @foreach ($province as $item)
                <option value="{{$item->province_id}}">{{$item->province_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="left">
            <select name="district" id="district">
                <option value="">-- Chọn Quận/Huyện --</option>
            </select>
        </div>
        <div class="left">
            <select name="ward" id="ward">
                <option value="">-- Chọn Phường/Xã --</option>
            </select>
        </div>
        <div class="left">
            <select name="street" id="street">
                <option value="">-- Chọn Đường/Phố --</option>
            </select>
        </div>
        <div class="left">
            <select name="bedroom" id="bedroom">
                <option value="">-- Chọn số phòng ngủ --</option>
                <option value="">Không xác định</option>
                <option value="">1+</option>
                <option value="">2+</option>
                <option value="">3+</option>
                <option value="">4+</option>
                <option value="">5+</option>
            </select>
        </div>
        <div class="left">
            <select name="direction" id="direction">
                <option value="">-- Chọn hướng nhà --</option>
                <option value="E">@lang('E')</option>
                <option value="W">@lang('W')</option>
                <option value="S">@lang('S')</option>
                <option value="N">@lang('N')</option>
                <option value="SE">@lang('SE')</option>
                <option value="NE">@lang('NE')</option>
                <option value="SW">@lang('SW')</option>
                <option value="NW">@lang('NW')</option>
            </select>
        </div>
    </div>
    <div class="left">
        <button type="button" class="btn btn-primary mn" data-toggle="collapse" data-target="#demo">Xem
            Thêm</button>

    </div>

    <div class="left">
        <button class="btn btn-primary mn">Tìm kiếm</button>
    </div>

</form>