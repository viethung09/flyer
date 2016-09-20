@extends('frontend.main')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Flyer
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Show</a></li>
      <li class="active">Flyer</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h1 class="box-title">{!! $flyer->street !!}</h1>
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
                  <h2>{!! $flyer->price !!}</h2>
                  <div class="description">{!! nl2br($flyer->description) !!}</div>
                  <br>
                  <form id="addPhotosForm" method="POST" action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}" class="dropzone" >
                    {{ csrf_field() }}
                  </form>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            <!--/.col (right) -->
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h1 class="box-title">Your House Photos</h1>
          </div>
          <div class="box-body">
            <!-- right column -->
              <!-- general form elements disabled -->
              <div class="box box-primary">
                <div class="box-body">
                @foreach($flyer->photos as $photo)
                  <img src="{{ $photo->path }}" alt="">
                @endforeach
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

@section('scripts.footer')
  <script src="js/dropzone.min.js"></script>
  <script>
    Dropzone.options.addPhotosForm = {
      paramName: 'photo',
      maxFilesize: 3,
      acceptedFile: '.jpg, .jpeg, .png, .bmp'
    }
  </script>
@stop