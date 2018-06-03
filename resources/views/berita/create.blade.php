@extends('layouts.app')
@section('content')
<div class="row">
  <div class="container">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Post 
          <div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
          </div>
        </div>
        <div class="panel-body">
                            <form class="form-horizontal form-label-left" action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}

                      <div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
                          <label class="control-label col-md-3 col-sm-3 col-xs-3">Gambar</label>
                          <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="file" name="gambar" class="form-control" required="">
                            @if ($errors->has('gambar'))
                              <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                              </span>
                          @endif
                          </div>
                        </div>


                      <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Judul Berita</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="judul" class="form-control"  required>
                          @if ($errors->has('judul'))
                            <span class="help-block">
                              <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
                        </div>
                      </div>


                      <div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Isi Berita</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" name="isi" class="form-control"  required>
                          @if ($errors->has('isi'))
                            <span class="help-block">
                              <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                        @endif
                        </div>
                      </div>


                  
                      <div class="form-group {{ $errors->has('tanggal_rilis') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">tanggal_rilis</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <textarea name="tanggal_rilis" class="ckeditor" required="">
                          @if ($errors->has(tanggal_rilis'))
                            <span class="help-block">
                              <strong>{{ $errors->first('tanggal_rilis') }}</strong>
                            </span>
                        @endif
                        </textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
       </form>
        </div>
      </div>  
    </div>
  </div>
</div>
@endsection
