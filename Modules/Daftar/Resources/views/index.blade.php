@extends('daftar::layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Simple Tables</li>
          </ol>
        </div> --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Account List</h3>
            <a class="btn-sm btn-success" href="{{Route('daftar.create')}}"> Create </a>    
        </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    {{-- <th style="width: 10px">#</th> --}}
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @if(@$data != null)
                    @foreach ($data as $data_account)
                    <tr>
                        <td>{{$data_account['namaLengkap']}}</td>
                        <td>{{$data_account['jenisKelamin']}}</td>
                        <td>{{$data_account['alamat']}}</td>
                        <td>{{$data_account['noHp']}}</td>
                        <td>
                            <a href="{{Route('daftar.show', $data_account['uuid'])}}">
                                <button class="sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </a>
                            <a  href="{{Route('daftar.edit', $data_account['uuid'])}}">
                                <button class="sm btn-primary">
                                    <i class="fa fa-pen"></i>
                                </button>
                            </a>
                            {!! Form::open(['method' => 'DELETE','route' => ['daftar.destroy', $data_account['uuid']],'style'=>'display:inline']) !!}
                            <button type="submit" class="sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>        
                    @endforeach
                    @endif
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
            </div> --}}
        </div>
        </div>
      </div>
    </div>
</section>
@endsection
