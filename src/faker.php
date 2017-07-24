<?php


/**
* 
*/
class Faker
{
	protected static $_username = [
			'天龙八部' => [
				'童飘云','李秋水','齐御风','无崖子','苏星河','丁春秋','阮星竹','刀白凤','秦红棉','王语嫣','木婉清','鸠摩智','邓百川','公冶乾','包不同','风波恶','吴长风','白世镜','马大元','全冠清'
			],
			'射雕英雄传' => [
				'王重阳','周伯通','马钰','谭处端','刘处玄','丘处机','王处一','郝大通','孙不二','黄药师','欧阳锋','段智兴','洪七公','裘千仞','柯镇恶','朱聪','韩宝驹','南希仁','张阿生','全金发','韩小莹'
			],
			'神雕侠侣' => [
				'武三通','朱子柳','李莫愁','洪凌波','耶律齐','完颜萍','武敦儒','武修文','公孙绿萼','马光佐','潇湘子','尼摩星','尹克西','史伯威','史仲猛','史叔刚','史季强','史孟捷'
			],
			'笑傲江湖' => [
				'令狐冲','任我行','向问天','东方不败','风清扬','左冷禅','岳不群','林平之','岳灵珊','劳德诺','施戴子','陆大有','童柏雄','上官云','祖千秋','计无施','田伯光','余沧海','木高峰'
			],

		];


	protected static $_avatar = [
		'public/img/avatar1.jpg',
		'public/img/avatar2.jpg',
		'public/img/avatar3.jpg',
	];


	public static function username()
	{
		$seri = array_rand(self::$_username, 1);

		$key = array_rand(self::$_username[$seri], 1);

		return self::$_username[$seri][$key];
	}


	public static function avatar() 
	{
		$key = array_rand(self::$_avatar, 1);

		return self::$_avatar[$key];
	}


}




?>