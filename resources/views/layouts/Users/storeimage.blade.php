@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> name </th>
                    <th scope="col"> email </th>
                    <th scope="col"> image </th>
                    <th scope="col"> contact </th>
                    <th scope="col"> type </th>
                </tr>
            </thead>
            <tbody>
                @if (isset($data) && !empty($data))
                <?php $i=0; ?>
                @foreach ($data as $user)
                <tr>
                    <td>{{ ++$id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ assets('uploads/users' . $user->image) }}" alt="Image"></td>
                    <td>{{ $user->contact }}</td>
                    <td>{{ $user->type }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
