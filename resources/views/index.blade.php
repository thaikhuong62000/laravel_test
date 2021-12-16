<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="urf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>DỰ ĐOÁN KẾT QUẢ VÒNG LOẠI 3 WORLDCUP - CÁC TRẬN CỦA VIỆT NAM​</title>
</head>

<body>
    <img src="{{ asset('img/banner.jpg') }}">
    <div class="container">
        <h1>Cùng JOTUN dự đoán kết quả
            <br><span class="h1_upper_case">VÒNG LOẠI 3 WORLDCUP</span>
            <br>các trận của Việt Nam</h1>
        <h5>Sát cánh cùng đội tuyển Việt Nam trong các trận của vòng loại 3 WorldCup, tham gia <span style="font-weight: bold;">dự đoán kết quả</span> cùng Jotun để có cơ hội nhận ngay những giải thưởng hấp dẫn với tổng giá trị lên đến 200 triệu đồng.​</h5>

        <form name="form">
            <div class="input_section">
                <p class="input_title">1. Số điện thoại*:</p>
                <input class="input_text center" type="text" name="sdt" id="sdt">
                <p class="error"></p>
            </div>
            <div class="input_section">
                <p class="input_title">2. Họ và tên*:</p>
                <input class="input_text center" type="text" name="name" id="name">
                <p class="error"></p>
            </div>
            <div class="input_section" id="role">
                <p class="input_title">3. Bạn đang là*:</p>
                <div class="role_section">
                    <label class="btn_container">
                        <input type="radio" name="role" value="0">
                        <span class="checkmark"></span>
                        <span class="check_text">Nhà thầu/Thợ</span>
                    </label>
                    <label class="btn_container">
                        <input type="radio" name="role" value="1">
                        <span class="checkmark"></span>
                        <span class="check_text">Đại lý</span>
                    </label>
                    <label class="btn_container">
                        <input type="radio" name="role" value="2">
                        <span class="checkmark"></span>
                        <span class="check_text">Chủ nhà</span>
                    </label>
                    <label class="btn_container">
                        <input type="radio" name="role" value="3">
                        <span class="checkmark"></span>
                        <span class="check_text">Khác</span>
                    </label>
                </div>
                <p class="error"></p>
            </div>
            <div class="input_section">
                <p class="input_title">4. Tỉ số dự đoán trận
                    @if ($message == "Available")
                        <span id="match_id" class="{{ is_null($match)?"":$match->id }}">{{ is_null($match)?"":$match->name }}</span>
                    @endif
                    *: <span class="example">(Ví dụ: 2 - 1)</span></p>
                <input class="input_text center" type="text" name="score" id="score">
                <p class="error"></p>
            </div>
            <div class="input_section">
                <p class="input_title">5. Số người dự đoán giống bạn*:</p>
                <input class="input_text center" type="number" name="number_people" id="number_people">
                <p class="error"></p>
            </div>
            <br>
        </form>
        <div class="button_div">
            <button class="center" id="submit_btn">Gửi thông tin dự đoán</button>
        </div>
    </div>

    <div id="myModal" class="modal">

        <div class="modal-content">
            <div class="icon_box">
                <i class="fa fa-info-circle" style="font-size:42px;color:white"></i>
                <span class="close" style="width:10%;align-self:flex-end">&times;</span>
            </div>
            <p id="model_content">Gửi dự đoán thất bại (Mỗi số điện thoại chỉ được gửi một lần!)</p>
        </div>

    </div>

    <script src="{{ asset('js/index.js') }}"></script>

    <script>
        modal.style.display = "inline";
        @if($message == "Not available")
            $("#model_content")[0].innerHTML = "Cổng trận đấu {{ is_null($match)?'Chưa xác định':$match->name }} sẽ được mở vào: " + "{{ is_null($remain_time)?"Chưa xác định":"$remain_time" }}";
        @else
            $("#model_content")[0].innerHTML = "Còn " + "{{ is_null($remain_time)?"Chưa xác định":"$remain_time" }}" + ", cổng trận đấu {{ is_null($match)?'Chưa xác định':$match->name }} sẽ kết thúc.";
        @endif
    </script>


</body>
</html>
