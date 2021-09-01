@extends('welcome')
@section('mail-success')
	<!-- Mail Success-->
	<section class="mail-success section page">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-12">
					<div class="mail-inner">
						<h2><span>Gửi</span> Thành công</h2>
						<p>Cảm ơn bạn rất nhiều cho tin nhắn của bạn. Chúng tôi kiểm tra e-mail thường xuyên và sẽ cố gắng hết sức để trả lời câu hỏi của bạn.</p>
						<div class="button">
							<a class="btn primary" href="{{route('trangchu')}}">Trang chủ</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Mail Success -->			
@endsection