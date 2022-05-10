@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{route('akun.update', [$akun->no_akun])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Rubah Form Data Akun</legend>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="addnoakn">Kode Akun</label>
                <input class="formcontrol" type="text" name="addnoakun" value="{{$akun->no_akun}}" readonly>
            </div>
            <div class="col-md-5">
                <label for="addnmakn">Nama Akun</label>
                <input id="addnmakn" type="text" name="addnmakun" class="formcontrol" value="{{$akun->nm_akun}}">
            </div>
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Update">
                <a href="{{ route('akun.index') }}"><input type="Button" class="btn btn-primary btn-send"value="Kembali"></a>
            </div>
            <hr>
            </fieldset>
        </form>
@endsection