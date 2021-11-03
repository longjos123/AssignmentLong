<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <h3>Chi tiết</h3>
                    {!! $tour->description !!}
                </div>
                <div class="bordered_1px"></div>
                <div class="contact_join">
                    <h3>Liên hệ để đặt tour</h3>
                    <form action="{{route('add_booking_tour',['id' => $tour->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input name="name" type="text" placeholder="Tên đầy đủ">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input name="phone_number" type="text" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input name="num_people" type="text" placeholder="Số người">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_input">
                                    <input name="start_date" type="date" placeholder="Ngày khởi hành">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single_input">
                                    <textarea name="message" id="" cols="30" rows="10"placeholder="Lưu ý..." ></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="submit_btn">
                                    <button class="boxed-btn4" type="submit">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<script>--}}
{{--    function addcart(id) {--}}
{{--        $.get('{{ route('subminTour') }}', {"id": id}, function (tour) {--}}
{{--            $("#listcarts").load("{{ route('index') }} #listcarts");--}}
{{--            alertify.success('Thêm sản phẩm thành công');--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
