<?php
defined('SYSTEM_IN') or exit('Access Denied');
abstract class BjSystemModule {
		public function __pc($f_name){
			global $_CMS,$_GP;
			$config=globaSetting();
			$cfg=$config;
		include_once  SYSTEM_ROOT.$_CMS['module'].'/class/pc/'.strtolower(substr($f_name,3)).'.php';
	}
}