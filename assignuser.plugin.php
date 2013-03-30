<?php

class AssignUser extends Plugin
{
	/**
	 * Add the option to the publish controls
	 */
	public function action_form_publish( $form, $post )
	{
		$authors = array();
		foreach ( Users::get_all() as $author ) {
			$authors[ $author->id ] = $author->displayname;
		}
		
		$author = $form->settings->append( 'text', 'author', 'null:null', _t( 'Author' ), $auhors, 'tabcontrol_select' );
		
		$author->options = $authors;
		$author->value = $post->user_id;
	}
	
	/**
	 * Save the fields from the publish form
	 */
	public function action_publish_post( $post, $form )
	{		
		$post->user_id = $form->author->value;
	}
	
}

?>
