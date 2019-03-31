<?php 
require_once 'mainModel.php';
class Links extends mainModel
{
	static $table = 'links';
	public static function all()
	{
		$links = parent::all();
		$themes = [];
		foreach ($links as $link => $value) 
		{
			if(!in_array($value->theme, $themes,true))
			{
				$themes[] = $value->theme;
			}
		}
		asort($themes);
		$newLinks = [];		
		foreach($themes as $theme)
		{
			foreach ($links as $link => $value) 
			{
				if($theme === $value->theme)
				{
					$newLinks[$theme][] = $value;
				}
			}
		}
		return $newLinks;
	}
	public static function delete($id)
	{
		return parent::delete(['link'=>$id]);
	}
}