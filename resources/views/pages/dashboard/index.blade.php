@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="col-md-8 w-100 px-5">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{route('create')}}" class="btn btn-primary">Tambah Penentuan Harga</a>
            <div class="button-group">
                <button class="btn btn-outline-secondary">Excel</button>
                <button class="btn btn-outline-secondary">Pdf</button>
                <button class="btn btn-outline-secondary">Print</button>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between align-items-center mt-2">
            <h6 class="">Data per halaman</h6>
            <form action="{{route('search')}}" class="d-flex flex-row row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Pencarian</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
            </form>
        </div>
        <table class="table mt-2 table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Tgl Update</th>
                    <th scope="col">Karat</th>
                    <th scope="col">Harga Emas</th>
                    <th scope="col">Harga Modal</th>
                    <th scope="col">Margin</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)

                <tr class="text-center">
                    <th scope="row">1</th>
                    <td>{{$item->updated_at}}</td>
                    <td>{{$item->carat}}</td>
                    <td>{{$item->gold_price}}</td>
                    <td>{{$item->capital_price}}</td>
                    <td>{{$item->selling_price - $item->capital_price}}</td>
                    <td>{{$item->selling_price}}</td>
                    <td class="d-flex justify-content-between">
                        <button class="btn btn-outline-info">Edit</button>
                        <button class="btn btn-outline-danger">Delete</button>
                    </td>
                </tr>

                @empty

                <tr class="text-center">
                    <td colspan="9">
                        <h4>Tidak ada data</h4>
                    </td>
                </tr>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            <h6>Menampilkan 1 s/d 4 Dari</h6>
        </div>
        <div class="d-flex justify-content-end">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection