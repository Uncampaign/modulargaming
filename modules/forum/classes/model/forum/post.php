<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 *
 * @package    Modular Gaming
 * @author     Curtis Delicata
 * @copyright  (c) 2010 Curtis Delicata
 * @license    BSD - http://www.modulargaming.com/license
 */

class Model_Forum_Post extends Jelly_Model {
	
	public static function initialize(Jelly_Meta $meta)
	{
		
		$meta->load_with = array('user');		
		
		$meta->fields += array(
			'id' => new Field_Primary,
                        'topic' => new Field_BelongsTo(array(
                                'column'  => 'topic_id',
                                'foreign' => 'forum_topic.id',
                        )),
			
			'user' => new Field_BelongsTo,
			
			'title' => new Field_String,
			'content' => new Field_String,

			'created' => new Field_Timestamp(array(

				'empty'  => TRUE,

				'auto_now_create' => true,

			)),			
		);
			
	}

}
