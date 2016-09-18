@inject('countries', 'App\Http\Ultilities\Country')

@extends('frontend.main')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Flyer
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Create</a></li>
      <li class="active">Flyer</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h1 class="box-title">Let Create your own Flyer.</h1>
          </div>
          <div class="box-body">
            <!-- right column -->
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-header">
                  <span class="glyphicon glyphicon-home"></span>
                  <h3 class="box-title">Which hourse you are selling?</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  @if(count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach( $errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <form method="POST" action="/flyers" role="form" enctype="multipart/form-data">
                    @include('frontend.flyers.form')
                  </form>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            <!--/.col (right) -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

@stop
{{-- @section('js')
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

@stop --}}