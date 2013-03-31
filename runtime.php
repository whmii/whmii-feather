<?php
	
PerchSystem::register_feather('whmiiscss');

class PerchFeather_WHMII extends PerchFeather
{
	public function get_css($opts, $index, $count)
	{	
		$out = array();

		if (!$this->component_registered('normalize')) {
			$out[] = $this->_single_tag('link', array(
					'rel'=>'stylesheet',
					'href'=>$this->path.'/css/normalize.css',
					'type'=>'text/css'
				));
			$this->register_component('normalize');
		}

		$out[] = $this->_single_tag('link', array(
					'rel'=>'stylesheet',
					'href'=>'//fonts.googleapis.com/css?family=Droid+Serif:400,700',
					'type'=>'text/css'
				));
		$out[] = $this->_single_tag('link', array(
					'rel'=>'stylesheet',
					'href'=>'//fonts.googleapis.com/css?family=Droid+Sans:700',
					'type'=>'text/css'
				));

		$out[] = $this->_single_tag('link', array(
					'rel'=>'stylesheet',
					'href'=>$this->path.'/css/styles.css',
					'type'=>'text/css'
				));
		
		if (!$this->component_registered('html5shiv')) {
			$out[] = $this->_conditional_comment('lt IE 9', $this->_script_tag(array(
					'src'=>$this->path.'/js/html5shiv.js'
				)));
			$this->register_component('html5shiv');
		}

		return implode("\n\t", $out)."\n";
	}

	public function get_javascript($opts, $index, $count)
	{
		$out = array();
		
		if (!$this->component_registered('jquery')) {
			$out[] = $this->_script_tag(array(
				'src'=>$this->path.'/js/jquery-1.8.2.min.js'
			));
			$this->register_component('jquery');
		}

		return implode("\n\t", $out)."\n";
	}


}


?>