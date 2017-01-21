<?php
/**
 * Extends the BP_Group_Extension to create new 'Project' component.
 */
if ( ! class_exists( 'BP_Group_Extension' ) ) { return; }

class Task_Breaker_Projects_Group extends BP_Group_Extension {

	/**
	 * Here you can see more customization of the config options
	 */
	function __construct() {
		$args = array(
			'slug' => 'projects',
			'name' => 'Projects',
			'nav_item_position' => 105,
			'screens' => array(
				'edit' => array(
					'name' => 'Projects',
					// Changes the text of the Submit button.
					'submit_text' => 'Submit, submit',
				),
				'create' => array(
					'position' => 100,
				),
			),
		);
		parent::init( $args );
	}

	/**
	 * Displays the Projects under 'Projects' tab under group.
	 * @param int $group_id The Group ID.
	 * @return void
	 */
	function display( $group_id = null ) {

		do_action('task_breaker_before_projects_archive');

		$group_id = bp_get_group_id(); ?>

			<h3>
				<?php esc_html_e( 'Projects', 'task_breaker' ); ?>
			</h3>

			<div id="task_breaker-intranet-projects">

				<?php task_breaker_new_project_modal( $group_id ); ?>

				<?php
					$args = array(
						'meta_key'   => 'task_breaker_project_group_id',
						'meta_value' => absint( $group_id ),
					);
				?>

				<?php task_breaker_project_loop( $args ); ?>

			</div>

		<?php

		do_action('task_breaker_after_projects_archive');

		return;
	}

}

bp_register_group_extension( 'Task_Breaker_Projects_Group' );