@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Orders (kazkoks skaicius)</h1>
    <hr>
    <div class="panel panel-default">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Orders</th>
                    <th>User</th>
                    <th>Address</th>
                    <th>Total Amount</th>
                    <th>Sub-total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>
                        <ul>

    @foreach($order->items as $item)
    <li>
        <small>
            <a href="{{ route('dishes.show', $item->dish->id) }}" 
                target="_blank">
                    {{ $item->dish->title }}
            </a>
        </small>
    </li>
    @endforeach
                        </ul>
                    </td>
                    <td>
                    <!-- First and Last Name -->
                        {{ $order->user->name }}
                        {{ $order->user->surname }}
                    </td>
                    <td>
                        {{ $order->user->city }}, 
                        {{ $order->user->address }}
                    </td>
                    <td>{{ $order->amount }} $</td>
                    <td>{{ $order->tax_amount }} $</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
