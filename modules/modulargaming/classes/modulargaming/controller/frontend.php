<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 *
 * @package    Modular Gaming
 * @category   Controllers
 * @author     Oscar Hinton
 * @copyright  (c) 2010 Oscar Hinton
 * @license    http://www.modulargaming.com/license
 */

abstract class Modulargaming_Controller_Frontend extends Controller {
	
	// Settings.
	public $title = 'Undefined'; // Title of the page
	public $template = 'template/main';
	public $auto_render = TRUE; // Render the template
	
	public $protected = FALSE; // Require user to login.
	
	public $errors = array();
	
	public function before()
	{
		
		Asset::add('assets/css/main.css', 'css');
		Asset::add('assets/css/redmond/jquery-ui.css', 'css');
		
		Asset::add('assets/js/jquery.js', 'js');
		Asset::add('assets/js/jquery.validate.js', 'js');
		Asset::add('assets/js/jquery-ui.js', 'js');
		Asset::add('assets/js/main.js', 'js');
		
		//echo Asset::render('css');
		
		// Initialize the Auth System
		$this->a2 = A2::instance();
		$this->a1 = $this->a2->a1;
		$this->user = $this->a2->get_user();
		
		// Setup the user specific settings
		if ($this->user)
		{
			if ($this->user->language)
			{
				I18n::lang($this->user->language);
			}
			
			//Time::$offset = '';
			//Time::$display = '';
		}
		//I18n::lang('en');
		
		View::set_global('user', $this->user);
		View::bind_global('errors', $this->errors);
		
		
		$this->MG = new ModularGaming($this->user);
		
		if ($this->auto_render === TRUE && !Request::$is_ajax)
		{
			
		$this->sidebar_left = array();
		Event::run('sidebar_left', $this);
		$this->sidebar_right = array();
		Event::run('sidebar_right', $this);


			// Load the template
			$this->template = View::factory($this->template)
				->bind('sidebar_left', $this->sidebar_left)
				->bind('sidebar_right', $this->sidebar_right);

		}
		
		// Check if the page is protected and if the user is not logged in
		if ($this->protected && !$this->user) {
			// Redirect the user to login page
			Request::instance()->redirect('account/login');
		}
		
		// Run the before events.
		Event::run('before', $this);
		
		//Kohana::config("group_name")->myconfigkey = "hiii"; 
		//echo Kohana::config("group_name.myconfigkey");
		//echo Kohana::config("group_name.myconfigkey2");
		//print_r(Kohana::config('modulargaming.test'));
		
		//Kohana::config('modulargaming')->test = array('lol' => 'hi');
		
		
	}
	
	public function after()
	{
		
		View::set_global('title', __($this->title));
		

		if ($this->auto_render === TRUE && !Request::$is_ajax)
		{
			// Assign the template as the request response and render it
			$this->request->response = $this->template;
		}
	}	
} // End Frontend
