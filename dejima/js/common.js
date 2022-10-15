(function($) {
	$(function() {
	//ハンバーガーメニュー アニメーション
	$('.btn_menu').on('click',function() {
		if($(this).hasClass('is-open')){
			//閉じる
			$(this).removeClass('is-open');
			$('.btn_menu p').text('MENU');
			$('.menu_wrap').removeClass('is-open');
		}else{
			//開く
			$(this).addClass('is-open');
			$('.btn_menu p').text('CLOSE');
			$('.menu_wrap').addClass('is-open');
		}
		return false;
	}).css('cursor','pointer');
});

})(jQuery);


//「トピックス一覧」ボタン

 $(function() {
	 $(document).on('click', '.more-post', function() {
		 $(".more-post").prop("disabled",true);
		 var now_post_num = 10; // 現在表示されている数
		 var tmp_dir = $(".more-post").attr('data-tmpdir');
		 var ajax_url = tmp_dir	+	'/page-readmore.php';
		 var post_type	=$(".more-post").attr('data-posttype');
		$(".more-post").text("読み込み中");
		 $.ajax({
			 type: 'post',
			 url: ajax_url,
			 data: {
					 'now_post_num': now_post_num,
					 'post_type':	post_type,
			 },
			 dataType: 'html',
		 })
		 .done(function(data){
			 $(".more-post").remove();
			 $(".topics-wrapper").append(data);
		 })
		 .fail(function(){ // ajax通信成失敗の処理
			 alert('トピックスの取得に失敗しました。');
				$(".more-post").text("トピックス一覧");
				$(".more-post").prop("disabled",false);
		 })
		 return false;
	 });
 });
