@extends('skeleton')

@section('title', 'Főoldal')

@section('content')

<h1>Ranglista</h1>


<div class="card mb-3">
<table class="table table-sm">
        <thead>
            <tr>
                <th scope="col" style="width: 30px;">#</th>
                <th scope="col">Név</th>
                <th scope="col">Egyenleg</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
                <tr @if($index < 1)  class="table-warning"  @endif>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ number_format($user->balance, 0, ',', ' ') }} Ft.</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nincs megjeleníthető adat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection