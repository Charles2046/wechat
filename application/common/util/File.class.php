<?php
namespace Common\Util;

use think\Storage;
class File
{
	public static function file_exists($filename)
	{
		$Storage = new Storage();
		$Storage::connect();
		return $Storage::has($filename);
	}
	
	public static function byteFormat($bytes)
	{
		$size_text = array("B", "KB", "MB", "GB","TB","PB","EB","ZB","YB");
		return round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . $size_text[$i];
	}
	
	public static function readFile($filename)
	{
		$content = '';
		$Storage = new Storage();
		$Storage::connect();
		@$content = $Storage::read($filename);
		return $content;
	}
	
	public static function writeFile($filename, $writetext, $openmod = 'w')
	{
		return false;
	}
	
	public static function delFile($filename)
	{
		return $Storage::unlink($filename);
	}
	
	public static function delAll($path, $delDir = false)
	{
		return false;
	}
	
	public static function delDir($dirName)
	{
		if (! file_exists($dirName)) {
			return false;
		}
	}
	
	public function delFile2($dir, $file_type = '')
	{
		if (is_dir($dir)){}
	}
	
	public static function copyDir($surDir, $toDir)
	{
		return true;
	}
	
	public static function mkDir($dir)
	{
		return true;
	}
	
	public static function getFiles($path, &$files = array(), $preg = "/\.(gif|jpeg|jpg|png|bmp)$/i")
	{
		return $files;
	}
	
	public static function getDirs($dir, $doc = false)
	{
		return $dirArray;
	}
	
	public static function dirSize($dir)
	{
		return $dir_size;
	}
	
	public static function realSize($dir = null)
	{
		return "文件不存在";
	}
	
	public static function readable($dir = null)
	{
		return false;
	}
	
	public static function writeable($dir = null)
	{
		return false;
	}
	
	public static function emptyDir($dir)
	{
		return false;
	}
	
	public static function makeDir($path, $property = 0777)
	{
		return is_dir($path) or (self::makeDir(dirname($path), $property) and @mkdir($path, $property));
	}
	
	public static function scanDir($dir, $file = false)
	{
		return $dir;
	}
	
	public static function zip($files, $filename, $outDir = WEB_CACHE_PATH, $path = DB_Backup_PATH)
	{
		return false;
	}
	
	public static function unzip($file, $outDir = DB_Backup_PATH)
	{
		return true;
	}
	
	public static function filemtime($file)
	{
		return filemtime($file);
	}
	
	public static function filectime($file)
	{
		return filectime($file);
	}
	
	public static function fileatime($file)
	{
		return fileatime($file);
	}
}