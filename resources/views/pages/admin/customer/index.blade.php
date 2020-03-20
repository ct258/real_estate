@extends('layouts.admin')


@section('content')

<h2 class="page-title">Title<br><br></h2>


<small><a href="" class="tst4 btn btn-success">{{ __('Create') }}
    </a></small><br><br>
<div class="row">
    <div class="col-lg-12">
        <section class="widget">
            <div class="table-responsive-fluid">
                <table class="table table-agile-info">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($real_estate as $item) --}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="" method="post" class="delete_form">
                                    @csrf
                                    <a href="">&nbsp;&nbsp;
                                        <i class="fa fa-info-circle"></i></a>
                                    <a href="">
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
                        {{-- @endforeach --}}
                        <tr>
                            <td align="center" colspan="10">

                                {{-- {{ $real_estate->links() }} --}}
                            </td>
                        </tr>

                    </tbody>


                </table>
            </div>
        </section>
    </div>
</div>


@endsection