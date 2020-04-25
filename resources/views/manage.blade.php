@extends('voyager::master')


@section('content')

      <div style="margin-left: 50px;margin-right: 50px;margin-top: 100px;display: flex;justify-content: space-between;">
      <div style="height: 100px;width: 200px;background-color: green;line-height: 100px;text-align: center;color: white;"><a href="#" style="text-decoration: none;color: inherit;">Payments</a></div>
      <div style="height: 100px;width: 200px;background-color: red;line-height: 100px;text-align: center;color: white;"><a href="#" style="text-decoration: none;color: inherit;">Billing</a></div>
      <div style="height: 100px;width: 200px;background-color: orange;line-height: 100px;text-align: center;color: white;"><a href="#" style="text-decoration: none;color: inherit;">Customers</a></div>
      <div style="height: 100px;width: 200px;background-color: blue;line-height: 100px;text-align: center;color: white;"><a href="activation_requests" style="text-decoration: none;color: inherit;">Activation Requests ( {{$businesses_not_registered}} )</a></div>
      <div style="height: 100px;width: 200px;background-color: violet;line-height: 100px;text-align: center;color: white;"><a href="#" style="text-decoration: none;color: inherit;">Analytics</a></div>
      </div>

@endsection