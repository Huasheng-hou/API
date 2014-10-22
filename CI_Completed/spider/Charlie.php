<?php
include 'Snoopy.class.php';
include 'WaterMark.php';
include 'Taoche.com.php';
include 'TaochePhone.php';

include 'Hx2car.com.php';

/****************
* http://www.taoche.com/
****************/

/*
图片的真实 链接 为

*/
header('Content-Type:text/html; charset=utf-8');                       
                            

$url = "http://www.taoche.com/buycar/b-Dealer14090411927.html"; 

$url = 'http://zj.hx2car.com/details/138113573';
$charlie = new Charlie;

$charlie->fetch($url);

$charlie->getInfo();

echo 'over';
 
class Charlie
{
	var $url   = 'http://xdream.co/index.php';
	var $snoopy;
	var $waterMark;
	var $logo;
	var $imgUrlList;
	var $imgPathList;

	function __construct()
	{
		$this->snoopy = new Snoopy;
		$this->waterMark = new WaterMark;
		$this->logo = './logo.png';
	}

	function fetch($url)
	{
		$this->url = $url;
		$this->snoopy->fetch($url);
	}

	function getInfo()
	{
		$this->web = new Hx2car;
		$this->setWeb();
		$this->web->getInfo();

		var_dump($this->web);
	}

	function setWeb()
	{
		$this->web->setLogo($this->logo);
		$this->web->setUrl($this->url);
		$this->web->setHtml($this->snoopy->results);
	}



	function saveImg()
	{
		$this->getImgList();
		$dirName = $this->getNameFromUrl($this->url);
		$this->newDir($dirName);

		$path = './'.$dirName.'/';
		foreach ($this->imgUrlList as $imgUrl) 
		{
			$file_name = $this->getNameFromUrl($imgUrl);
			$img = file_get_contents($imgUrl);
			$fullPath = $path.$file_name;
			file_put_contents($fullPath, $img);
			$this->addWaterMark($fullPath);
			$this->imgPathList[] = $fullPath;
		}
	}

	function addWaterMark($file_name)
	{
		$this->waterMark->img_water_mark( $srcImg = $file_name
										, $waterImg = $this->logo
										, $savepath=null
										, $savename=null
										, $positon=5
										, $alpha=100)
		;
	}

	function newDir($dirName)
	{
		if(is_dir($dirName)||is_file($dirName))
		{
			return ;
		}

		mkdir($dirName);

	}

	function getNameFromUrl($url)
	{
		$file_name = strrchr($url, '/');
		return substr($file_name, 1);		
	}


	function getInnerContentList($content,$tag_head,$tag_tail)
	{
		$res = array();
		$token = '|_|';
		$content = str_replace( array($tag_head
										,$tag_tail), 
								array($token.$tag_head
									, $tag_tail.$token),
								$content);

		$list = explode($token, $content);
		foreach ($list as $item) {

			$tmp = strstr($item,$tag_head);
			if(!$tmp){
				continue;
			}
			$tmp = str_replace(array($tag_head,$tag_tail,"\n"),
								 '',
								 $tmp);

			$res[] = trim($tmp);
		}
		return $res;

	}

	function trimAll($str)
	{
    	return str_replace(array(" ","　","\t","\n","\r")
					    	,''
					    	,	$str); 
	}
}

