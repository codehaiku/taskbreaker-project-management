<?php
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

if ( ! is_user_logged_in() ) {
	return;
}

if ( ! function_exists( 'wp_handle_upload' ) ) {
    
    require_once( ABSPATH . 'wp-admin/includes/file.php' );

}

$fileAttachment = new TaskBreakerFileAttachment();

$file = $fileAttachment->process_http_file();

$file_name  = '';

if ( ! empty ( $file ) ) {

	if ( ! empty ( basename( $file['file'] ) ) )  {
		
		$file_name = basename( $file['file'] );

	}

	if ( ! empty( $file['error'] ) ) {
		
		$this->task_breaker_api_message(
			array(
				'message' => 'fail',
				'response' => $file['error'],
				'file' => $file_name
			)
		);

	} else {

		$this->task_breaker_api_message(
			array(
				'message' => 'success',
				'response' => __( 'File upload success', 'task_breaker' ),
				'file' => $file_name
			)
		);

	}

}
