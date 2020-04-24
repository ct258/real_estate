@extends('layouts.admin')
@push('css')
<style>
    .error {
        color: red;
    }
</style>

@endpush

@section('content')

<div class="form-w3layouts">
    <h2 class="page-title">Chỉnh sửa Bài viết<br><br></h2>
    <form action="{{route('blog.update',$blog[0]->blog_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
        <div class="row">
            <section class="panel">

                <table>
                    <tr>
                        <td>
                            <div class="col-sm-10">
                                <img id="image" alt="Chọn hình đại diện" width="100" height="100"
                                    src="{{asset($blog[0]->blog_avatar)}}" />
                                <input type="file" name="avatar" id="avatar" value="{{asset($blog[0]->blog_avatar)}}"
                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">

                    </tr>
                </table>
            </section>


            <section class="panel">
                <div class="container-fluid">
                    <table class="table">

                        @foreach ($blog as $item)
                        @if ($item->blog_translation_locale=='vi')
                        <tr>
                            <td>
                                <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg" style="width:2%;" ;>
                                <label>Tiêu đề bài viết</label>
                                <input type="text" name="title_vi" size="100%" autofocus class="form-control "
                                    value={{$item->blog_translation_title}}>
                                {{-- {{dd($item->blog_translation_title)}} --}}
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="https://lipis.github.io/flag-icon-css/flags/4x3/vn.svg" style="width:2%;" ;>
                                <label>Nội dung</label>
                                <textarea name="content_vi" cols="30" id="content_vi"
                                    style="max-width:100%;height: 235px;" class="form-control input-transparent"
                                    value={!!$item->blog_translation_content!!}></textarea>
                            </td>
                        </tr>
                        <br>
                        @endif
                        @endforeach
                    </table>
                </div>
            </section>
            <section class="panel">
                <div class="container-fluid">
                    <table class="table">
                        @foreach ($blog as $item)
                        @if($item->blog_translation_locale=='en')
                        <tr>
                            <td>

                                <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg" style="width:2%;" ;>
                                <label>Title</label>
                                <input type="text" name="title_en" size="100%" autofocus
                                    class="form-control input-transparent" value={{$item->blog_translation_title}}><br>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg" style="width:2%;" ;>
                                <label>Content</label>
                                <textarea name="content_en" cols="30" id="editor2" style="max-width:100%;height: 235px;"
                                    class="form-control input-transparent"
                                    value={!!$item->blog_translation_content!!}></textarea>
                            </td>
                        </tr>
                        <br>
                        @endif
                        @endforeach
                    </table>
                </div>
            </section>

        </div>
        <label for="captcha">Captcha</label>
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
        <div class="row">
            <br><br>
            <div class="col-sm-2">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Lưu</button>

                </div>

            </div><a href="{{route('real_estate.index')}}" class="btn btn-default">Trở lại</a>
        </div>
    </form>
</div>



@push('script')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
{{-- <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
<script>
    CKEDITOR.replace( 'content_vi', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    CKEDITOR.replace( 'content_en', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>
@include('ckfinder::setup')
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>

<script type="text/javascript">
    function show(){
            var arrLen=file.length;
            for (i=0 ; i < arrLen ; i++){
                // $('.img').append(img);
                // var img='<img id="photo" alt="your photo" width="100" height="100" />';
                // <img id="photo" alt="your photo" width="100" height="100" />
                document.getElementById('hinh').src = window.URL.createObjectURL(this.files[i]);
            }
            
            
          }
          
</script>
@endpush
@endsection