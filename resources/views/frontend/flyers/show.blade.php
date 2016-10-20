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
      <div class="col-md-12">

        <div class="box box-solid box-primary">
          <div class="box-header">
            <span class="glyphicon glyphicon-home"></span>
            <h3 class="box-title">{!! $flyer->title !!}</h3>
          </div>
          <div class="box-body">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h4><b>Address:</b> {!! $flyer->street !!}</h4>
                      <h4><b>Prices: </b>{!! $flyer->price !!}</h4>
                      <div class="description">
                        <h4><b>House Detail: </b></h4>
                        <h4>{!! nl2br($flyer->description) !!}</h4>
                      </div>

                    </div>
                    <div class="col-md-6">
                      @foreach($flyer->photos->chunk(4) as $set)
                        <div class="row">
                          @foreach($set as $photo)
                            <div class="col-md-3 gallery__image">
                              <img src="{{ $photo->thumbnail_path }}" alt="">
                            </div>
                          @endforeach
                        </div>
                      @endforeach
                      @if( isUserOwnsFlyer($user, $flyer) )
                        <form id="addPhotosForm" method="POST" action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}" class="dropzone" >
                          {{ csrf_field() }}
                        </form>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
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