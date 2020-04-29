@extends('layouts.admin')

@section('content')

<style>
#image{
    background-size: 32px 32px;
    /* -webkit-border-radius: 50%; */
    /* border-radius: %; */
    margin: 0;
    overflow: hidden;
    position: relative;
    height: 168px;
    width: 400px;
    z-index: 0;
}
</style>







<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Cập nhật logo
      </div>
      <div class="row w3-res-tb">
        
          
      
    
  
      <div class="table-responsive">
    
      <form action="{{route('logo.submit')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="container-fuild">
           
            <div style="margin-left:400px;" class="form-group lang  col-md-5 ">

                {{-- {{asset($info->customer_avatar)}} --}}
                {{-- <img id="image" class="card-img-top" name='path' src="" />
                <input type="file" id="upload-image" name='avatar' accept="image/*" value=""
                    required
                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
             --}}
            <img id="image" alt="Chọn hình logo" /><br>
            <input type="file" name="avatar" id="avatar" 
                                   onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                        required>

                </div>
            <div class="col-sm-5" >
               
                </div>
                <div class="col-sm-2">
                    <button type="submit" id="a" class="btn btn-success btn-block">Lưu</button>
                </div>
        </div>
    
    </form>
      </div>
      
    
    </div>
<script>
             
    $('#a').click(function () {
        var data = $('#avatar').val();
        if(data!=''){
        const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                    Toast.fire({
                    icon: 'success',
                    title: 'Thay đổi logo thành công'
                })
        }else{
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                    Toast.fire({
                    icon: 'error',
                    title: 'Chưa thêm tệp'
                })
            
        }
    });
</script>

@endsection