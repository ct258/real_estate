@extends('layouts.admin')


@section('content')

<h2 class="page-title">Bài viết<br><br></h2>


<small><a href="" class="tst4 btn btn-success">Tạo bài viết
    </a></small><br><br>
<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-agile-info">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Nhân viên</th>
                            <th>Thời gian</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1?>
                        @foreach ($blog as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{substr($item->blog_translation_title,0,27)}}...</td>
                            <td>{{$item->staff_name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <form action="{{route('blog.destroy',$item->blog_id)}}" method="post"
                                    class="delete_form">
                                    @csrf
                                    <a href="{{route('single_blog',$item->blog_id)}}">&nbsp;&nbsp;
                                        <i class="fa fa-info-circle"></i></a>
                                    <a href="{{route('blog.edit',$item->blog_id)}}">
                                        <i class="fa fa-edit"></i></a>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <button type="submit"
                                        style="border: none;background-color: Transparent;color: red;">
                                        <i class="fa fa-trash-o"></i></a>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td align="center" colspan="5">

                                {{ $blog->links() }}
                            </td>
                        </tr>

                    </tbody>


                </table>
            </div>
        </section>
    </div>
</div>


@endsection