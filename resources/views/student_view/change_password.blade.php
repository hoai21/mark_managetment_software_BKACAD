@extends('student_layout')
@section('student_content')
@push('js_student')
 <script type="text/javascript">
  $(function(){
    $(".form-group a").click(function(){
      let $this = $(this);
      if($this.hasClass('active'))
      {
        $this.parents('.form-group').find('input').attr('type','password')
        $this.removeClass('active');
      }else{
        $this.parents('.form-group').find('input').attr('type','text')
        $this.addClass('active')
      }
    });
  });

</script>
@endpush
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action ="{{Route('student.change_password_process',['student_id'=>$password[0]->student_id])}}">
                 @foreach($password as $each_password)
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card-body">
                  <label for="exampleInputEmail1">Old password</label>
                    <div class="form-group" style="position: relative;">
                       <input type="password" name="old_password" class="form-control" id="exampleInputPassword0" placeholder="" value="">
                       <a style="position:absolute;top: 10px; right: 10px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                       @if($errors->has('old_password'))
                        <span class="error-text" style="color: rgb(255, 0, 0); font-size: 13px;">
                          <i><b>{{$errors->first('old_password')}}</b></i>
                        </span>
                      @endif
                    </div>
                  <label for="exampleInputEmail1">New password</label>
                    <div class="form-group" style="position: relative;">
                       <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" value="">
                       <a style="position:absolute;top: 10px; right: 10px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                       @if($errors->has('password'))
                        <span class="error-text" style="color: rgb(255, 0, 0); font-size: 13px;">
                          <i><b>{{$errors->first('password')}}</b></i>
                        </span>
                      @endif
                    </div>
                  <label for="exampleInputEmail1">Enter the password again</label>
                     <div class="form-group" style="position: relative;">
                       <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword2" placeholder="Enter password again" value="">
                       <a style="position:absolute;top: 10px; right: 10px; color: #333" href="javascript:;void(0)"><i class="fa fa-eye"></i></a>
                       @if ($errors->has('password_confirm'))
                        <span class="error-text" style="color: rgb(255, 0, 0); font-size: 13px;">
                          <i><b>{{$errors->first('password_confirm')}}</b></i>
                        </span>
                      @endif
                    </div>
                    </div>
                    @endforeach
                <!-- /.card-body -->
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="submit_update">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('sweetalert::alert')
  @endsection