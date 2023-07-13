@extends('daftar::layouts.master')

@section('header')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('footer')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
     $(function () {
        $('.select2').select2();
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        });
     })
</script>
@endsection

@section('content')

@php
    $modul="daftar";
    $page=explode(".", Route::currentRouteName())[1];
    // dd($modul.' '.$page);
    $urls="";
    $method="";
    if ($page == 'create') {
        $method='POST';
        $urls=$modul.".store";
    }elseif ($page == 'edit') {
        $method='PATCH';
        $urls=[$modul.".update", @$data['uuid']];
    }else{
        $urls="index";
    }
@endphp

{{
    Form::macro('inputForm', function($type, $label, $name, $id, $value)
    {     
        $input="<div class=form-group'>";
        $input.="<label for='".$name."'>".$label."</label>";
        $input.="<input ";
        if ($type == 'disabled') {
            $input.=" disabled ";
        } else {
            $input.=" type='".$type."' ";
        }
        $input.="class='form-control' name='".$name."' id='".$id."' value='".$value."'>";
        $input.="</div>";
        return $input; 
    });
}}



<div class="card card-secondary">
    <div class="card col-md-6">
    @if ($errors->any())
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{-- <h5><i class="icon fas fa-info"></i> Alert!</h5> --}}
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <a class="btn-sm btn-primary" href="{{ route('index') }}">
                <i class="fa fa-arrow-left"></i>
                </a>
            </div>
            <div>
                <h3 class="card-title">Register {{Str::upper($page)}}</h3>
            </div>
        </div>
    </div>
   
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(array('route' => $urls,'method'=> $method)) !!}
        <div class="card-body">
            @if ($page=='edit' || $page=='create')
            {!! Form::inputForm("text","Nama Lengkap","namaLengkap","namaLengkap", @$data['namaLengkap'] ) !!}
            {!! Form::inputForm("text","NIK","nik","nik", @$data['nik'] ) !!}
            {!! Form::inputForm("text","Jenis Kelamin","jenisKelamin","jenisKelamin", @$data['jenisKelamin'] ) !!}
            {!! Form::inputForm("text","Alamat","alamat","alamat", @$data['alamat'] ) !!}
            {!! Form::inputForm("text","Tempat Lahir","tempatLahir","tempatLahir", @$data['tempatLahir'] ) !!}
            {!! Form::inputForm("text","Tanggal Lahir","tanggalLahir","tanggalLahir", @$data['tanggalLahir'] ) !!}
            {!! Form::inputForm("text","Status Kawin","statusKawin","statusKawin", @$data['statusKawin'] ) !!}
            {!! Form::inputForm("text","No HP","noHp","noHp", @$data['noHp'] ) !!}
            {!! Form::inputForm("text","Email","email","email", @$data['email'] ) !!}
            {!! Form::inputForm("text","Nama Ibu Kandung","namaIbu","namaIbu", @$data['namaIbu'] ) !!}
            {!! Form::inputForm("text","Jenis Pekerjaan","jenisPekerjaan","jenisPekerjaan", @$data['jenisPekerjaan'] ) !!}
            @else
            {!! Form::inputForm("disabled","Nama Lengkap","namaLengkap","namaLengkap", @$data['namaLengkap'] ) !!}
            {!! Form::inputForm("disabled","NIK","nik","nik", @$data['nik'] ) !!}
            {!! Form::inputForm("disabled","Jenis Kelamin","jenisKelamin","jenisKelamin", @$data['jenisKelamin'] ) !!}
            {!! Form::inputForm("disabled","Alamat","alamat","alamat", @$data['alamat'] ) !!}
            {!! Form::inputForm("disabled","Tempat Lahir","tempatLahir","tempatLahir", @$data['tempatLahir'] ) !!}
            {!! Form::inputForm("disabled","Tanggal Lahir","tanggalLahir","tanggalLahir", @$data['tanggalLahir'] ) !!}
            {!! Form::inputForm("disabled","Status Kawin","statusKawin","statusKawin", @$data['statusKawin'] ) !!}
            {!! Form::inputForm("disabled","No HP","noHp","noHp", @$data['noHp'] ) !!}
            {!! Form::inputForm("disabled","Email","email","email", @$data['email'] ) !!}
            {!! Form::inputForm("disabled","Nama Ibu Kandung","namaIbu","namaIbu", @$data['namaIbu'] ) !!}
            {!! Form::inputForm("disabled","Jenis Pekerjaan","jenisPekerjaan","jenisPekerjaan", @$data['jenisPekerjaan'] ) !!}
            @endif
             
        </div>
        <!-- /.card-body -->
        @if ($page!='show')
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @endif
    {!! form::close() !!}
    
    </div>
</div>

@endsection