@extends('admin.layout.master')

@section('contentAdmin')

    <div class="card mt-4" style="width: 100%">
        <div class="card-header"><h5>Thông báo</h5></div>
        <div class="card-body">
            <table class="table">
                @foreach(\App\Notification::all() as  $notify)
                    <tbody>
                    @if(json_decode($notify->data)->receive==\Illuminate\Support\Facades\Auth::user()->email)

                        <tr>
                        <th scope="row">
                                Bạn nhận được một yêu cầu thuê nhà từ  {{ json_decode($notify->data)->sender}} với ngôi nhà
                                    {{ json_decode($notify->data)->house_title}}
                            </th>
                        <td>
                            <a href="" class="btn btn-primary">Chấp nhận</a>&nbsp;&nbsp;
                            <a href="" class="btn btn-danger">Không đồng ý</a>
                        </td>
                        @endif
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

@endsection
