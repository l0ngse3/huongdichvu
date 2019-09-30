<!-- Start post Area -->
<section class="post-area section-gap">
	<div class="container" id="list-question">
		<div class="row">
			<div class="col-lg-8 post-list">

			</div>
		</div>
		<div class="row justify-content-center d-flex">
			<div class="col-lg-8 post-list">
				
					<div class="option-list">
						<div class="form-select" id="default-select">
							<select>
								<option value="1">Tùy Chọn</option>
								<option value="1">Mới nhât</option>
								<option value="1">Hot nhât</option>
								<option value="1">Trong ngày</option>
								<option value="1">Trong tuần</option>
								<option value="1">Trong tháng</option>
							</select>
						</div>
					</div>
				

				
				<div v-for="question in listQuestion" class="single-post d-flex flex-row">
					<div class="thumb">
						<div class="info-review">
							<div class="count-review">
								<span class="vote text-success">{{question.vote}}</span>
								<span class="fz-13 fw500">đánh giá</span>
							</div>
							<div class="support">
								<span class="vote text-success">{{question.count_reply}}</span>
								<span class="fz-13 fw500">câu trả lời</span>
							</div>
							<div class="share">
								<span class="vote text-success">
									<i class="fas fa-share-alt"></i>
								</span>
								<span class="fz-13 fw500">chia sẻ</span>
							</div>
						</div>
						<div class="mobile-info-review">
							<div class="mobile-count-review">
								<span class="vote text-success">{{question.vote}}</span>
								<span class="fz-13 fw500">đánh giá</span>
							</div>
							<div class="mobile-support">
								<span class="vote text-success">{{question.count_reply}}</span>
								<span class="fz-13 fw500">câu trả lời</span>
							</div>
							<div class="mobile-share">
								<span class="vote text-success">
									<i class="fas fa-share-alt"></i>
								</span>
								<span class="fz-13 fw500">chia sẻ</span>
							</div>
						</div>
					</div>
					<div class="details">
						<div class="title d-flex flex-row justify-content-between">
							<div class="titles">
								<a :href="'/cau-hoi/'+question.slug"><h4>{{question.title}}</h4></a>
								<div class="post-by">
									<span><i class="far fa-user"></i></span>
									Đăng bởi:
									<a href="">{{question.full_name}}</a>
								</div>	
								<div class="post-in">
									<span><i class="far fa-clock"></i></span>
									Lĩnh vực: 
									<a href="">{{question.catagory}}</a>
								</div>				
							</div>
						</div>
						<div class="content-question">
							<span class="text-primary">Câu hỏi: </span>
							<div v-html="question.content">
								
							</div>
						</div>
						<div class="time-post">
							<span><i class="far fa-calendar-alt"></i></span>
							Ngày đăng: 
							<span class="text-primary">{{question.time}}</span>
						</div>
						<div class="view">
							<span><i class="fas fa-eye"></i></span>
							Lượt xem: 
							<span>{{question.view}}</span>
						</div>
						<div class="read-more">
							<a :href="'/cau-hoi/'+question.slug" class="genric-btn info circle arrow small">Xem thêm<span class="lnr lnr-arrow-right"></span></a>
						</div>
					</div>
				</div>
				
			</div>
			