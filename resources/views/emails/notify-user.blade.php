<div>
    Xin chào    @if ($sex == "male")
                    {{ $sex = 'anh' }}
                @elseif ($sex == "female")
                    {{ $sex = 'chị' }}
                @else
                    {{ $sex = 'anh/chị' }}
                @endif {{ $name }}<br><br>
    Chúc mừng {{ $sex }} {{ $name }} đã đăng ký tham dự sự kiện <span style="color: orange">"Home Now for Vietnam Stronger"</span> thành công.<br>
    Mã số tham dự rút thăm trúng thưởng của {{ $sex }} là: <span style="font-weight: bold">{{ $id }}</span>.<br><br>
    Xin trân trọng cảm ơn,<br>
    BTC sự kiện.
</div>
