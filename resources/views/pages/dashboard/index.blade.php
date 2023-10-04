@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="col-md-8 w-100 px-5">
        <div class="d-flex justify-content-between mb-3">
            <a href="{{route('create')}}" class="btn btn-primary create-btn">Tambah Penentuan Harga</a>
            <div class="button-group">
                <button class="btn btn-outline-secondary">Excel</button>
                <button class="btn btn-outline-secondary">Pdf</button>
                <button class="btn btn-outline-secondary">Print</button>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between align-items-center mt-4">
            <h6 class="">Data per halaman</h6>
            <form method="POST" action="{{route('search')}}" class="d-flex flex-row row g-3 align-items-center">
                @csrf
                <div class="col-auto">
                    <label for="search" class="col-form-label">Pencarian</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="search" name="search" class="form-control search-input">
                </div>
            </form>
        </div>
        <table class="table mt-3 table-bordered">
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
                    <th scope="row">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->index + 1 }}</th>
                    <td>{{ $item->formatted_date}}</td>
                    <td>{{$item->carat}}</td>
                    <td>{{$item->gold_price}}</td>
                    <td>{{$item->capital_price}}</td>
                    <td>{{$item->selling_price - $item->capital_price}}</td>
                    <td>{{$item->selling_price}}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{route('edit',$item->id)}}" class="btn btn-outline-info">Edit</a>
                        <form action="{{ route('delete', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </form>
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
        {{ $data->links('vendor.pagination.bootstrap-5')  }}
    </div>
</div>
@endsection