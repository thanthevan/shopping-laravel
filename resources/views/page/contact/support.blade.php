@extends('page.layout')
@section('headmeta')
<title>Unishop | Hỗ trợ </title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Thân Thế Văn">
@endsection
@section('content')
 <div class="offcanvas-wrapper" style="min-height: 80vh">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Hỗ trợ khách hàng</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="{{ route('home') }}">Trang chủ</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Hỗ trợ khách hàng</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container ">
        <div class="row">
          <!-- Side Menu-->
          <div class="col-lg-3 col-md-4">
            <nav class="list-group"><a class="list-group-item active" href="#">HỖ TRỢ</a><a class="list-group-item" href="#">THANH TOÁN TRẢ TRƯỚC</a><a class="list-group-item" href="#">THANH TOÁN TRẢ SAU (COD)</a><a class="list-group-item" href="#">HOÀN TIỀN</a></nav>
            <div class="padding-bottom-3x hidden-md-up"></div>
          </div>
          <!-- Content-->
          <div class="col-lg-9 col-md-8">
            <div class="accordion" id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion">THANH TOÁN TRẢ TRƯỚC</a></h6>
                </div>
                <div class="collapse " id="collapseOne" role="tabpanel">
                  <div class="card-block">
                    <p>Thẻ ATM (thẻ ngân hàng, thẻ thanh toán nội địa), thẻ tín dụng và thẻ thanh toán quốc tế (Visa, Master, JCB, Amex…</p>
                    <p>Quý khách thanh toán trực tiếp tại hệ thống thanh toán trên website sau khi hoàn tất đơn hàng. Hệ thống thanh toán điện tử của CANIFA được kết nối với cổng thanh toán điện tử NAPAS. Theo đó, các tiêu chuẩn bảo mật thanh toán của CANIFA đảm bảo tuân thủ theo các tiêu chuẩn bảo mật của NAPAS, đã được Ngân hàng nhà nước Việt Nam thẩm định về độ an toàn bảo mật và cấp phép hoạt động chính thức.</p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a class="collapsed" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">THANH TOÁN TRẢ SAU (COD)</a></h6>
                </div>
                <div class="collapse" id="collapseTwo" role="tabpanel">
                  <div class="card-block">Là hình thức khách hàng thanh toán tiền mặt trực tiếp cho nhân viên vận chuyển khi nhận hàng. Khi hàng được chuyển giao đến bạn có thể kiểm tra tình trang gói hàng còn nguyên vẹn và mở gói hàng kiểm tra sản phẩm trước khi thanh toán. Nếu sản phẩm có bất kỳ lỗi hay khiếm khuyết nào không đúng ý muốn, bạn có thể trả lại nhân viên vận chuyển ngay tại thời điểm đó.</div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab">
                  <h6><a class="collapsed" href="#collapseThree" data-toggle="collapse" data-parent="#accordion">HOÀN TIỀN</a></h6>
                </div>
                <div class="collapse" id="collapseThree" role="tabpanel">
                  <div class="card-block">Đối với thanh toán trước, Unishop sẽ hoàn tiền cho bạn trong những trường hợp sau:
Bạn hủy đơn hàng khi Unishop chưa đến bước vận chuyển và muốn nhận lại tiền đã thanh toán qua thẻ.
Bạn muốn trả lại hàng do lỗi sản xuất và không muốn đổi sang sản phẩm khác.
Unishop sẽ hoàn tiền lại vào tài khoản cá nhân của bạn. Chúng tôi sẽ cố gắng hoàn tiền nhanh nhất có thể và thời gian hoàn tiền không quá 15 ngày tính từ khi xác nhận hoàn tiền.</div>
                </div>
              </div>
             
              
            </div>
            
          </div>
        </div>
      </div>
     
     
    </div>
@endsection