@extends('layouts.app')

@section('content')
    <h1>従業員と店舗情報</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employeeModal">従業員情報を登録する</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#storeModal">店舗情報を登録する</button>

    <h2 class="mt-4">従業員一覧</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>最低出勤日数</th>
                <th>休日</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->min_working_days }}</td>
                    <td>{{ $employee->closed_day }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#employeeEditModal{{ $employee->id }}">編集</button>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mt-4">店舗一覧</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>店舗名</th>
                <th>最低従業員数</th>
                <th>休日</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->min_employees }}</td>
                    <td>{{ $store->closed_day }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#storeEditModal{{ $store->id }}">編集</button>
                        <form action="{{ route('stores.destroy', $store->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    @include('employee_store.employeeModal')
    @include('employee_store.storeModal')


@endsection