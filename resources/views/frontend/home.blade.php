@extends('frontend.main')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Flyer
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Flyer</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-solid box-primary">
      <div class="box-header">
        <h1 class="box-title">Let Create your own Flyer.</h1>
      </div>
      <div class="box-body">
        <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique velit inventore quis excepturi, tenetur ipsum a, blanditiis rem saepe asperiores perferendis reiciendis, impedit dolor expedita tempore rerum labore eos autem.</h4>
        <br>
        <a href="/flyers/create" type="button" class="btn btn-primary btn-lg">Create</a>
      </div>
    </div>

  </section>
  <!-- /.content -->

@stop

