<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <title>Heineken</title>
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <img src="{{ asset('img/heineken-logo.png') }}" alt="HeineKen Logo" />
      </div>
      <div class="title">Tặng Quà Đúng Điệu Đón Lễ Hội Kỳ Diệu</div>
      <div class="timer__title green">Bắt Đầu Trong</div>
      <div class="timer__container">
        <div class="timer__field">
          <div class="item__number">22</div>
          <div class="item__text green">Ngày</div>
        </div>
        <div class="timer__field">
          <div class="item__number">9</div>
          <div class="item__text green">Giờ</div>
        </div>
        <div class="timer__field">
          <div class="item__number">53</div>
          <div class="item__text green">Phút</div>
        </div>
      </div>
      <div class="info">
        Hãy đăng ký thông tin của bạn bên dưới để có cơ hội nhận quà tặng đặc
        biệt từ Heineken!
      </div>
      <div class="note">*220 thùng bia mỗi ngày</div>
      <form action="#">
        <!-- Form field --------------------------------------->
        <div class="form__field">
          <input
            type="text"
            autocomplete="off"
            spellcheck="false"
            placeholder="Tên"
            name="name"
            id="name"
          />
          <div class="form__error" id="name_error">Vui lòng điền thông tin</div>
        </div>
        <!-- Form field --------------------------------------->
        <div class="form__field">
          <input
            type="text"
            autocomplete="off"
            spellcheck="false"
            placeholder="Chứng Minh Nhân Dân"
            name="cmnd"
            id="cmnd"
          />
          <div class="form__error" id="cmnd_error">Vui lòng điền thông tin</div>
        </div>
        <!-- Form field --------------------------------------->
        <div class="form__field">
          <input
            type="text"
            autocomplete="off"
            spellcheck="false"
            placeholder="Số điện thoại"
            name="phone"
            id="phone"
          />
          <div class="form__error" id="phone_error">
            Vui lòng điền thông tin
          </div>
        </div>
        <!-- Form field --------------------------------------->
        <div class="form__field">
          <input
            type="text"
            autocomplete="off"
            spellcheck="false"
            placeholder="Email"
            name="email"
            id="email"
          />
          <div class="form__error" id="email_error">
            Vui lòng điền thông tin
          </div>
        </div>
        <!-- Form field --------------------------------------->
        <div class="form__field">
          <input
            type="text"
            autocomplete="off"
            spellcheck="false"
            placeholder="Địa chỉ"
            name="address"
            id="address"
          />
          <div class="form__error" id="address_error">
            Vui lòng điền thông tin
          </div>
        </div>
        <!-- Form field --------------------------------------->
        <div class="form__row">
          <div class="form__field">
            <input
              type="text"
              autocomplete="off"
              spellcheck="false"
              placeholder="TP"
              name="tp"
              id="tp"
              class="choosable"
            />
            <div class="form__error" id="tp_error">Vui lòng điền thông tin</div>
            <div class="dropdown"></div>
            <img src="{{ asset('img/angle-down-solid.svg') }}" />
          </div>
          <div class="form__field">
            <input
              type="text"
              autocomplete="off"
              spellcheck="false"
              placeholder="Quận"
              name="quan"
              id="quan"
              class="choosable"
            />
            <div class="form__error" id="quan_error">
              Vui lòng điền thông tin
            </div>
            <div class="dropdown"></div>
            <img src="{{ asset('img/angle-down-solid.svg') }}" />
          </div>
          <div class="form__field">
            <input
              type="text"
              autocomplete="off"
              spellcheck="false"
              placeholder="Phường"
              name="phuong"
              id="phuong"
              class="choosable"
            />
            <div class="form__error" id="phuong_error">
              Vui lòng điền thông tin
            </div>
            <div class="dropdown"></div>
            <img src="{{ asset('img/angle-down-solid.svg') }}" />
          </div>
        </div>
        <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox" />
            <label class="checkbox__text" for="checkbox">
                Tôi đã đọc và đồng ý với <a href="#">Thể Lệ Chương Trình</a>
            </label>
        </div>
        <button class="btn__border">Gửi Thông Tin</button>
    </form>
    <div class="modal"></div>
      <footer>
        <div class="footer__div1">
          <img
            class="footer__icon"
            src="{{ asset('img/footer-icon-1.svg') }}"
          />
          <img
            class="footer__icon"
            src="{{ asset('img/footer-icon-2.svg') }}"
          />
          <img
            class="footer__icon"
            src="{{ asset('img/footer-icon-3.svg') }}"
          />
          NGƯỜI DƯỚI 18 TUỔI KHÔNG ĐƯỢC UỐNG RƯỢU, BIA
        </div>
        <div class="footer__div2">
          Sản phẩm Heineken Original có nồng độ cồn (ABV) 5%. © 2021 Bản quyền
          của Công ty TNHH Nhà Máy Bia HEINEKEN Việt Nam. Bảo hộ mọi quyền.
        </div>
      </footer>
    </div>
    <script src="{{ asset('js/province.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
  </body>
</html>
