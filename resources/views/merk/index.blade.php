@extends('backend.layout')
@section('content')
<div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Recent Followers
                                  <div class="pull-right">
                                  <a class="label label-primary" href="{{ route('merkmobil.create') }}">Tambah Data</a>
                                  </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Nomer</th>
                                      <th>Gambar</th>
                                      <th>Nama</th>
                                      <th>Deskrpsi</th>
                                      <th colspan="3">Action</th>
                                    </tr>
                              </thead>
                              <tbody>
                                <?php $nomor = 1; ?>
                        @php $no = 1; @endphp
                        @foreach($a as $data)
                                <tr>
                                  <td>{{ $no++ }}</td>
                                  <td><img src="{{asset('/img/'.$data->logo.'')}} " width="70" height="70"></td>
                                  <td>{{ $data->nama }}</td>
                                  <td>{{ $data->deskripsi }}</td>

                                  <td>
                            <a class="btn btn-warning" href="{{ route('merkmobil.edit',$data->id) }}">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('merkmobil.destroy',$data->id) }}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">

                        <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                      
                                </tr>
                                @endforeach
                              </tbody>
                      </table>
                  </div>
             </div>
      </div>
                </section>              
            </div>
      </div>
     <div class="clearfix"> </div>
</div>
@endsection
