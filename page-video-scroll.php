<?php
/**
 * Template Name: Video Scroll Page
 * Template Post Type: page
 *
 * @package Mm
 */

get_header( 'empty' );
$video_arr = array(
	'first_loop'               => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/100-01_LOOP.mp4',
	),
	'first_walk'               => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/110-01_02_FORWARD.mp4',
	),
	'second_loop'              => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/120-02_LOOP.mp4',
	),
	'second_walk'              => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/130-02_03_FORWARD.mp4',
	),
	'third_loop'               => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/140-03_LOOP.mp4',
	),
	'turn_left'                => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/150-03_04_FORWARD.mp4',
	),
	'left_first_loop'          => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/160-04_LOOP.mp4',
	),
	'left_first_walk'          => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/170-04_05_FORWARD.mp4',
	),
	'left_second_loop'         => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/180-05_LOOP.mp4',
	),
	'left_second_walk'         => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/05_06_FORWARD_NEW.mp4',
	),
	'left_third_loop'          => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/06_LOOP_FRONT.mp4',
	),
	'left_second_loop_return'  => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/LoopLeft_02.mp4',
	),
	'left_second_walk_return'  => array(
		'url' => 'https://monkey.local/wp-content/uploads/2021/11/210-05_06_BACKWARD.mp4',
	),
	'left_first_walk_return'   => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/04_05_BACKWARD.mp4',
	),
	'left_first_loop_return'   => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/LoopLeft_01.mp4',
	),
	'turn_left_return'         => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/216-03_04_BACKWARD.mp4',
	),
	'third_loop_return'        => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/217-LoopFront_Start_03.mp4',
	),
	'second_walk_return'       => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/218-02_03_BACKWARD.mp4',
	),
	'second_loop_return'       => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/219-LoopFront_Start_02.mp4',
	),
	'first_walk_return'        => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/220-01_02_BACKWARD.mp4',
	),
	'first_loop_return'        => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/221-LoopFront_Start_01.mp4',
	),
	'turn_right'               => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/306-03_07_FORWARD.mp4',
	),
	'right_first_loop'         => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/307-07_LOOP.mp4',
	),
	'right_first_walk'         => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/308-07_08_FORWARD.mp4',
	),
	'right_second_loop'        => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/309-08_LOOP.mp4',
	),
	'right_second_walk'        => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/310-08_09_FORWARD_NEW.mp4',
	),
	'right_third_loop'         => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/311-09_LOOP_FRONT.mp4',
	),
	'right_second_walk_return' => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/312-08_09_BACKWARD.mp4',
	),
	'right_second_loop_return' => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/313-LoopRight_02.mp4',
	),
	'right_first_walk_return'  => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/314-07_08_BACKWARD.mp4',
	),
	'turn_right_return'        => array(
		'url' => 'https://monkey.local/wp-content/uploads/2022/01/316-03_07_BACKWARD.mp4',
	),
);
if ( isset( $_SERVER['SERVER_ADDR'] ) && '127.0.0.1' !== $_SERVER['SERVER_ADDR'] ) {
	$video_arr = array(
		'first_loop'               => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/201-01_LOOP.mp4',
		),
		'first_walk'               => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/202-01_02_FORWARD.mp4',
		),
		'second_loop'              => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/203-02_LOOP.mp4',
		),
		'second_walk'              => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/204-02_03_FORWARD.mp4',
		),
		'third_loop'               => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/205-03_LOOP.mp4',
		),
		'turn_left'                => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/206-03_04_FORWARD.mp4',
		),
		'left_first_loop'          => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/207-04_LOOP.mp4',
		),
		'left_first_walk'          => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/208-04_05_FORWARD.mp4',
		),
		'left_second_loop'         => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/209-05_LOOP.mp4',
		),
		'left_second_walk'         => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/210-05_06_FORWARD_NEW.mp4',
		),
		'left_third_loop'          => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/211-06_LOOP_FRONT.mp4',
		),
		'left_second_loop_return'  => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/213-LoopLeft_02.mp4',
		),
		'left_second_walk_return'  => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/212-05_06_BACKWARD.mp4',
		),
		'left_first_walk_return'   => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/214-04_05_BACKWARD.mp4',
		),
		'left_first_loop_return'   => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/215-LoopLeft_01.mp4',
		),
		'turn_left_return'         => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/216-03_04_BACKWARD.mp4',
		),
		'third_loop_return'        => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/217-LoopFront_Start_03.mp4',
		),
		'second_walk_return'       => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/218-02_03_BACKWARD.mp4',
		),
		'second_loop_return'       => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/219-LoopFront_Start_02.mp4',
		),
		'first_walk_return'        => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/220-01_02_BACKWARD.mp4',
		),
		'first_loop_return'        => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/221-LoopFront_Start_01.mp4',
		),
		'turn_right'               => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/306-03_07_FORWARD.mp4',
		),
		'right_first_loop'         => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/307-07_LOOP.mp4',
		),
		'right_first_walk'         => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/308-07_08_FORWARD.mp4',
		),
		'right_second_loop'        => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/309-08_LOOP.mp4',
		),
		'right_second_walk'        => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/310-08_09_FORWARD_NEW.mp4',
		),
		'right_third_loop'         => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/311-09_LOOP_FRONT.mp4',
		),
		'right_second_walk_return' => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/312-08_09_BACKWARD.mp4',
		),
		'right_second_loop_return' => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/313-LoopRight_02.mp4',
		),
		'right_first_walk_return'  => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/314-07_08_BACKWARD.mp4',
		),
		'turn_right_return'        => array(
			'url' => 'https://monkeymunchy.com/wp-content/uploads/2022/01/316-03_07_BACKWARD.mp4',
		),
	);
}

if ( isset( $_POST['password'] ) && '123asd' === $_POST['password'] ) : // phpcs:ignore
	?>
	<div class="video-scroll__loader">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/loader.svg' ); ?>" alt="loader">
		<span><?php esc_html_e( 'Monkey Town Loading...', 'mm' ); ?></span>
	</div>
	<div class="video-scroll">
		<div class="video-scroll__wrapper" data-name="first-loop">
			<video
				class="video-scroll__video"
				autoplay
				loop
				muted>
				<source src="<?php echo esc_url( $video_arr['first_loop']['url'] ); ?>" type="video/mp4">
			</video>
		</div>
		<div class="video-scroll__wrapper" data-name="first-walk">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src=""
				muted>
				<source src="<?php echo esc_url( $video_arr['first_walk']['url'] ); ?>" type="video/mp4">
			</video>
		</div>
		<div class="video-scroll__wrapper" data-name="second-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['second_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="second-walk">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['second_walk']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="third-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['third_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="turn-left">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['turn_left']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="left-first-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['left_first_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="left-first-walk">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['left_first_walk']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="left-second-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['left_second_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="left-second-walk">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['left_second_walk']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="left-third-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['left_third_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="left-second-loop-return">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['left_second_loop_return']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="left-second-walk-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['left_second_walk_return']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="left-first-walk-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['left_first_walk_return']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="left-first-loop-return">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['left_first_loop_return']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="turn-left-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['turn_left_return']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="third-loop-return">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['third_loop_return']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="second-walk-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['second_walk_return']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="second-loop-return">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['second_loop_return']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="first-walk-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['first_walk_return']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="first-loop-return">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['first_loop_return']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="turn-right">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['turn_right']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="right-first-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['right_first_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="right-first-walk">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['right_first_walk']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="right-second-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['right_second_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="right-second-walk">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['right_second_walk']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="right-third-loop">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['right_third_loop']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="right-second-walk-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['right_second_walk_return']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="right-second-loop-return">
			<video
				class="video-scroll__video"
				src="<?php echo esc_url( $video_arr['right_second_loop_return']['url'] ); ?>"
				autoplay
				loop
				muted
			></video>
			<button
				type="button"
				class="video-scroll__button"
				data-name="left"
			></button>
			<button
				type="button"
				class="video-scroll__button"
				data-name="right"
			></button>
		</div>
		<div class="video-scroll__wrapper" data-name="right-first-walk-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['right_first_walk_return']['url'] ); ?>"
				muted
			></video>
		</div>
		<div class="video-scroll__wrapper" data-name="turn-right-return">
			<video
				class="video-scroll__video video-scroll__video--scrub"
				src="<?php echo esc_url( $video_arr['turn_right_return']['url'] ); ?>"
				muted
			></video>
		</div>
	</div>
<?php else : ?>
	<form action="" method="post" class="video-scroll__password">
		<label for="password">Password</label>
		<input type="password" id="password" name="password" autofocus>
		<button type="submit">Submit</button>
	</form>
<?php endif; ?>
<?php
get_footer( 'empty' );
