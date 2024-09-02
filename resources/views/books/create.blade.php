@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">{{ __('Kitaplar') }}</div>
                        <div class="col-6 d-flex justify-content-end"><a href="{{route ('books.index')}}" class="btn btn-primary">Kitaplar</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <h1>Kitap Ekle</h1>
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="from-group">
                            <label for="">Kitabın Adı</label><br />
                            <input type="text" name="name" class="from-control" placeholder="Kitabın Adı">
                        </div>
                        <div class="from-group">
                            <label for="">Kitabın Fiyatı</label><br />
                            <input type="text" name="price" class="from-control" placeholder="Kitabın Fiyatı">
                        </div>
                        <button type="submite" class="btn btn-success mt-1" >Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection