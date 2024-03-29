@extends('welcome')

@section('title', '| Borrowing - List')

@section('content')
    <div class="container" style="margin-top: 100px;">
        @if (session('add_success'))
        <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
            Success Add New Borrowing
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('already_returned'))
        <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
            Success Add New Borrowing
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="" method="get" class="form-inline mb-4">
            <div class="form-group">
                <label for="" class="mr-3">Filter </label>
                <select name="filter" id="" class="form-control mr-3 mb-3" required>
                    <option value="" selected>--------</option>
                    <option value="status_true">Status Fines True</option>
                    <option value="status_false">Status Fines False</option>
                </select>
                <button class="btn btn-outline-primary mb-3" type="submit">Go <i class="fas fa-external-link-alt"></i></button>
            </div>
        </form>
        <div class="table-resposive table-hover">
            <table class="table ">
                <thead class="bg-info text-white text-capitalize">
                    <th scope="col">#</th>
                    <th scope="col">Book</th>
                    <th scope="col">member</th>
                    <th scope="col">status fines</th>
                    <th scope="col">date add</th>
                    <th scope="col">date must back</th>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @if ($item['status_fines'] == 0)
                    <tr>
                    @else
                    <tr class="bg-danger text-white">
                    @endif
                        <th scope="row"><a href="{{ route('detailBorrowing', ['id' => $item['id']]) }}">#</a></th>
                        <td><a href="{{ route('historyBook', ['id' => $item['book']]) }}">{{$item['book']}}</a></td>
                        <td><a href="{{ route('detailMember', ['id' => $item['member']]) }}">{{$item['member']}}</a></td>
                        @if ($item['status_fines'] == 0)
                        <td class="text-danger"><i class="fas fa-times"></i></td>
                        @else
                        <td class="text-success"><i class="far fa-check-circle"></i></td>
                        @endif
                        <td>{{$item['date_add']}}</td>
                        <td>{{$item['date_must_back']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container my-4">
        {{ $data->links() }}
    </div>  
@endsection