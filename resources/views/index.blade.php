<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:bold,regular|Open Sans:bold,regular&amp;display=swap" as="style" onload="this.onload = null;this.rel = 'stylesheet';">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Event Site</title>
</head>
<body>
    <header>
        <div class="header-img-left"></div>
        <div class="header-img-right"></div>
    </header>
    <div class="break"></div>

    <div class="count-down-div">
        <div class="video-container">
            <div id="player"></div>
        </div>
        <div class="overlay"></div>
        <div class="count-down-head">
            <div class="event-name">
                <p>Kích hoạt chiến dịch</p>
                <p class="more-info">Home now for<br>Vietnam Stronger</p>
            </div>
            <div class="vertical-break"></div>
            <div class="count-down-img">
                <img src="https://w.ladicdn.com/s450x450/60336d74fad5300012c58579/thu-moi-co-logo-be-ti-ti-20210901091407.png" alt="">
            </div>
        </div>
        <div class="count-down-info">
            <p>{{ $start_dtime->hour }}:{{ ($start_dtime->minute < 10)?'0'.$start_dtime->minute:$start_dtime->minute }}

                @switch($start_dtime->dayOfWeekIso)
                    @case(1)
                        thứ hai,
                        @break
                    @case(2)
                        thứ ba,
                        @break
                    @case(3)
                        thứ tư,
                        @break
                    @case(4)
                        thứ năm,
                        @break
                    @case(5)
                        thứ sáu,
                        @break
                    @case(6)
                        thứ bảy,
                        @break
                    @case(7)
                        chủ nhật,
                        @break
                    @default
                @endswitch
                 ngày {{ $start_dtime->day }}-{{ $start_dtime->month }}-{{ $start_dtime->year }}
            </p>
            <p>Hình thức tham dự: Online trên ứng dụng Zoom</p>
        </div>
        <div class="count-down-clock">
            <div class="clock-number-div">
                <div class="clock-number">{{ ($remain_hours < 10)?'0'.$remain_hours:$remain_hours }}</div>
                <p>Giờ</p>
            </div>
            <div class="clock-number-div">
                <div class="clock-number">{{ ($remain_minutes < 10)?'0'.$remain_minutes:$remain_minutes }}</div>
                <p>Phút</p>
            </div>
            <div class="clock-number-div">
                <div class="clock-number">{{ ($remain_seconds < 10)?'0'.$remain_seconds:$remain_seconds }}</div>
                <p>Giây</p>
            </div>
        </div>
        <div>
            <a href="#signin-form">
                <button class="go-to-signin">Đăng ký tham gia ngay</button>
            </a>
        </div>
    </div>
    <div class="break"></div>

    <div class="schedule-div">
        <div class="overlay"></div>
        <div class="schedule-head">
            <p>Agenda<br>
            Chương trình<br>
            Kích hoạt</p>
        </div>
        <div class="sub-break"></div>
        <div class="schedule-body">
            <div class="schedule-info">
                <div class="schedule-time">
                    <p>9:00</p>
                    <p>9:05</p>
                </div>
                <div class="vertical-break"></div>
                <div class="schedule-detail">
                    <p style="font-size: 12px;"><span style="font-weight: bold;">CLIP:</span><br>Bùng nổ "Chốt deal"</p>
                </div>
            </div>
            <div class="schedule-info">
                <div class="schedule-time">
                    <p>9:05</p>
                    <p>9:15</p>
                </div>
                <div class="vertical-break"></div>
                <div class="schedule-detail">
                    <p>Lời hiệu triệu và câu chuyện chiến dịch<br>"Home Now for Vietnam Stronger"<br><br><span style="font-weight: bold;">Mr. Phạm Thanh Hưng</span><br>Phó Chủ tịch HĐQT Cen Group</p>
                </div>
            </div>
            <div class="schedule-info">
                <div class="schedule-time">
                    <p>9:15</p>
                    <p>9:30</p>
                </div>
                <div class="vertical-break"></div>
                <div class="schedule-detail">
                    <p>Cen Group và chiến lược truyền thông 04 tháng cuối năm<br><br><span style="font-weight: bold;">Mr. Nguyễn Trần Quang</span><br>Chuyên gia phát triển thương hiệu</p>
                </div>
            </div>
            <div class="schedule-info">
                <div class="schedule-time">
                    <p>9:30</p>
                    <p>9:45</p>
                </div>
                <div class="vertical-break"></div>
                <div class="schedule-detail">
                    <p>Liều vaccine tinh thần<br>"Home Now for Vietnam Stronger"<br>có gì đặc biệt?&nbsp;<br><br><span style="font-weight: bold;">Ms. Nghĩa Bùi</span><br>Giám đốc chiến lược RSM</p>
                </div>
            </div>
            <div class="schedule-info">
                <div class="schedule-time">
                    <p>9:30</p>
                    <p>10:00</p>
                </div>
                <div class="vertical-break"></div>
                <div class="schedule-detail">
                    <p>Home Now for Vietnam Stronger và những điều không thể bỏ qua<br><br><span style="font-weight: bold;">Ms. Nguyễn Phùng Minh Hằng</span><br>Giám đốc trung tâm Cyber Agent</p>
                </div>
            </div>
            <div class="schedule-info">
                <div class="schedule-time">
                    <p>10:00</p>
                    <p>10:05</p>
                </div>
                <div class="vertical-break"></div>
                <div class="schedule-detail">
                    <p>Kích hoạt<br>"Home Now for Vietnam Stronger"<br><br><span style="font-weight: bold;">Mr. Nguyễn Trung Vũ</span><br>Chủ tịch HĐQT Cen Group</p>
                </div>
            </div>
        </div>
    </div>
    <div class="break"></div>

    <div class="signin-div" id="signin-form">
        <div class="signin-head">
            <p>Đăng ký tham dự<br>Buổi lễ kích hoạt</p>
        </div>
        <div class="sub-break"></div>
        <div class="signin-form">
            <form autocomplete="off" action="index.html" onsubmit="alert('stop submit'); return false;" method="post">
                <div class="input-container">
                    <input type="text" name="name" id="name" placeholder="Họ và tên">
                    <p class="form-error" id="name-error">Vui lòng điền Họ và tên</p>
                </div>
                <div class="input-container">
                    <input type="email" name="email" id="email" placeholder="Email">
                    <p class="form-error" id="email-error">Vui lòng điền Email theo dạng email@example.com</p>
                </div>
                <div class="input-container">
                    <input type="number" name="phone" id="phone" placeholder="Số điện thoại">
                    <p class="form-error" id="phone-error">Vui lòng điền Số điện thoại</p>
                </div>
                <div class="input-container">
                    <select name="sex" id="sex">
                        <option value="">Giới tính của Anh/Chị</option>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                        <option value="female">Khác</option>
                    </select>
                    <p class="form-error" id="sex-error">Vui lòng chọn giới tính</p>
                </div>
                <div class="input-container">
                    <input type="text" name="job" id="job" placeholder="Công việc chính của Anh/Chị">
                    <p class="form-error" id="job-error">Vui lòng điền công việc</p>
                </div>
            </form>
        </div>
        <div class="sign-button-div">
            <button class="signin-button">Đăng ký tham gia buổi lễ</button>
            <p class="register-success" id="submit-success">Đăng ký tham gia thành công</p>
            <p class="register-error" id="submit-duplicated">Tài khoản đã được đăng ký</p>
            <p class="register-error" id="submit-out-of-time">Đã hết thời hạn đăng ký</p>
        </div>
        <div class="signin-info">
            <p>Sau khi đăng ký xong, Anh/Chị sẽ được chuyển tới nhóm hỗ trợ của cộng đồng. Các thông tin về sự kiện sẽ được cập nhật tại đây.</p>
        </div>
    </div>
    <div class="break"></div>

    <footer>
        <div class="footer-info-container">
            <div class="img-div">
                <img src="https://w.ladicdn.com/s450x450/60336d74fad5300012c58579/thu-moi-co-logo-be-ti-ti-20210901091407.png" alt="">
            </div>
            <div class="footer-info">
                <div class="footer-name">Trung tâm hỗ trợ và phát triển CYBER AGENT</div>
                <div class="footer-address"><i class="fa fa-home"></i>  Địa chỉ: Tầng 4, Tòa A Sky City, 88 Láng Hạ, Hà Nội.</div>
                <div class="footer-phone"><i class="fa fa-phone"></i>  Hotline:  0931.663.986</div>
                <div class="footer-email"><i class="fa fa-envelope"></i>  Email: cyberagent@cenland.vn</div>
                <div class="footer-site"><i class="fa fa-globe"></i>  Website: cenhomes.vn/cyber-agent</div>
            </div>
        </div>
        <div class="sub-break"></div>
        <div class="cert">©2021 Allrights reserved cenhomes.vn</div>
    </footer>

    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
