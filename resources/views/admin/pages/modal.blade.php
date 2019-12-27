<div class="modal fade" id="showReasonDelete" data-backdrop="static"
     tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Lý do hủy</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data"
                  action="{{route('order.house.delete')}}">
                @csrf
                <input style="display: none" name="houseIdBooking" readonly="readonly" type="text" class="houseBookingId">
                <div class="modal-body">
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonOne" value="Lý do cá nhân">
                            &nbsp; Lý do cá nhân
                        </div>
                    </div>
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonTwo"
                                   value="Đổi ngày hoặc điểm đến">
                            &nbsp; Đổi ngày hoặc điểm đến
                        </div>
                    </div>
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonThree"
                                   value="Số lượng hoặc nhu cầu thay đổi">
                            &nbsp; Số lượng hoặc nhu cầu thay đổi
                        </div>
                    </div>
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonFour" value="other...">
                            &nbsp; Lý do khác
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Hủy
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Gửi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
