<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 *
 * @package    Modular Gaming
 * @author     Curtis Delicata
 * @copyright  (c) 2010 Curtis Delicata
 * @license    BSD - http://www.modulargaming.com/license
 */

class Model_Forum_Category extends Jelly_Model {
	
	public static function initialize(Jelly_Meta $meta)
	{
		
		// $meta->load_with = array('forum_posts');
		
		$meta->fields += array(
			'id' => new Field_Primary,
			
			'title' => new Field_String,
			'description' => new Field_String,
			/*'created' => new Field_Timestamp(array(
				'empty'  => TRUE,
				'auto_now_create' => true,
			)),*/
 			//'role_access' => new Field_Integer,
		
		);

	}

}
