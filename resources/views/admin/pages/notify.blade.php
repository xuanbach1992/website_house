@extends('admin.layout.master')

@section('contentAdmin')

    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Thông báo</h5></div>
        <div class="card-body">
            <table class="table">
                @foreach(\App\Notification::all() as  $notify)
                    <tbody>
                    <tr>
                        <th scope="row">@if(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email)
                                <strong>Bạn nhận được một yêu cầu thuê nhà từ  {{ json_decode($notify->data)->sender}} với ngôi nhà
                                    {{ json_decode($notify->data)->house_title}}
                                </strong><br>
                            @endif</th>
                        <td>
                            <a href="" class="btn btn-primary">Chấp nhận</a>&nbsp;&nbsp;
                            <a href="" class="btn btn-danger">Không đồng ý</a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

@endsection
