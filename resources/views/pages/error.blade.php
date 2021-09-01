@extends('welcome')
@section('error')
		<!-- Error Page -->
		<section class="error-page">
			<div class="table">
				<div class="table-cell">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-12">
								<!-- Error Inner -->
								<div class="error-inner">
									<h2>404</h2>
									<h5>Không thể tìm thấy trang này</h5>
									<p>Oops! Trang bạn đang tìm kiếm không tồn tại. Nó có thể đã bị di chuyển hoặc bị xóa.</p>
									<div class="button">
										<a href="{{route('trangchu')}}" class="btn">Trang chủ</a>
									</div>
								</div>
								<!--/ End Error Inner -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection