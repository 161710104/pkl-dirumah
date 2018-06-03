@extends('backend.layout')
@section('content')
<div class="chit-chat-layer1">
    <div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Recent Followers
                                  <div class="pull-right">
                                  <a class="label label-primary" href="">Tambah Data</a>
                                  </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Nomer</th>
                                      <th>Nama</th>
                                      <th>Merk</th>
                                    </tr>
                              </thead>
                              <tbody>
                                <?php $nomor = 1; ?>
                        @php $no = 1; @endphp
                        @foreach($a as $data)
                                <tr>
                                  <td>{{ $no++ }}</td>
                                  <td>{{ $data->nama }}</td>
                                  <td>{{ $data->Merk->nama }}</td>
                                </tr>
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
