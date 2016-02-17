<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
function getEmotion($link){


	echo "link = $link <br>";
	$stockURL1="http://pantip.com$link";
	//$stockURL1="http://pantip.com/topic/34775321";
	echo "stockURL1 = $stockURL1 <br>";
	$html1 = file_get_contents($stockURL1);
		//echo "var_dump html1 <br>";
		//var_dump($html1);

	$dom1 = new DOMDocument('1.0', 'UTF-8');
	$dom1->loadHTML($html1);
	$xpathProcessor1 = new DOMXPath($dom1);

	$xpathQueryScore = "//a[@class='emotion-vote']/span[2]/text()";
	////div[@class='post-list-wrapper' and @id='show_topic_lists']/div[$n] /div[]
	$title_results1 = $xpathProcessor1->query($xpathQueryScore);
	echo "score length = ".$title_results1->length."<br>";
	$i = 0;
	foreach ($title_results1 as $title_list1){
			$i++;
			$post_by = $title_list1->nodeValue;
			echo "emotion-score  =$post_by<br>";
	}

	echo "link = ".$link."<br>";
	return 	$post_by;
}

function functionmain(){
	$a[3]; $b[3];$d=0;
	for($x=1;$x<=1;$x++){
		//$a[3]; $b[3];
		if($x=1){
		//$stockURL ="http://pantip.com/forum/siliconvalley";       
		//$xpathQueryString ="http://pantip.com/forum/siliconvalley"; 
		$xpathQueryString ="http://pantip.com/forum/supachalasai"; 
		//$html = file_get_contents($stockURL);
		//$dom = new DOMDocument('1.0', 'UTF-8');
		//$dom->loadHTML($html);
		//$xpathProcessor = new DOMXPath($dom);

		//$xpathQueryString = "//div[@class='loadmore-bar indexlist']/a/@href ";
		//$next_link_results = $xpathProcessor->query($xpathQueryString);

		//$xpathQueryStringLink = "//div[@class='post-item-title']/a/@href";
		//$title_link_results = $xpathProcessor->query($xpathQueryStringLink);
						/*
						for($y=1;$y<=1;$y++){
							foreach ($next_link_results as $title_list){
								$title = $title_list->nodeValue;
								$a[$y]="http://pantip.com$title";					
							}
							$m=$y;
						}
						$x=$m;
            
						/*$string=implode(",",$a);
                        echo "a= ".$string;*/
						//var_dump 'a'

                        //var_dump ($a);

                        //print_r("x=".$x."<br>");
                        $b[$x]=$xpathQueryString;
						//var_dump($b);
						geturl($b,$d);
		}
	}
}
///////Lord More
function geturl($b,$d){
	$a[3]; $b[3]; $j;
	//var_dump($b);
	for($x=1;$x<=1;$x++){
		if($x=1 ){
		$stockURL1 ="$b[$x]";
		//echo "in get url <br>";
		//var_dump($stockURL1);

		$html1 = file_get_contents($stockURL1);
		//echo "var_dump html1 <br>";
		//var_dump($html1);

		$dom1 = new DOMDocument('1.0', 'UTF-8');
		$dom1->loadHTML($html1);
		$xpathProcessor1 = new DOMXPath($dom1);
		//echo "var_dump dom1 <br>";
		//var_dump($dom1);

		$xpathQueryString1 = "//div[@class='loadmore-bar indexlist']/a/@href";
		$next_link_results1 = $xpathProcessor1->query($xpathQueryString1);
		//echo "get link results1 <br>";

		//echo "length load more = ".($next_link_results1->length)."<br>";
		//var_dump($next_link_results1);

						for($y=1;$y<=1;$y++){
							foreach ($next_link_results1 as $title_list1){
								$title1 = $title_list1->nodeValue;
								$a[$y]="http://pantip.com$title1";
								//echo "load more link= ".var_dump($a)."<br>";
								//echo "<br>"."link next page =http://pantip.com$title<br>";
							}
							$m=$y;
						}
						//var_dump 'a'
						//echo "after load more <br>";
                        //var_dump ($a);

		for($n=1 ;$n<=50; $n++){
		$xpathQueryToStockTitle1 = "//div[@class='post-list-wrapper' and @id='show_topic_lists']/div[$n]/div[2]/a/text()";
			//$xpathQueryToStockTitle1 = "//div[@class='post-item-title']/a/text()";
			$title_results1 = $xpathProcessor1->query($xpathQueryToStockTitle1);
			//echo "var_dump length title_results1";
			//var_dump($length);
			//echo "var_dump title_results1 <br>";
			//var_dump($title_results1);
			$i = 0;
			foreach ($title_results1 as $title_list1){
				$i++;
				$title = $title_list1->nodeValue;
				echo "กระทู้ที่ =".($n+$d)."<br> ชื่อกระทู้ = $title<br>";
			}
			$k=($n+$d);
	          
	        $xpathQueryToStockTitle1 = "//div[@class='post-list-wrapper' and @id='show_topic_lists']/div[$n]/div[2]/a/@href";
			$title_results1 = $xpathProcessor1->query($xpathQueryToStockTitle1);
			$i = 0;
			foreach ($title_results1 as $title_list1){
				$i++;
				$link = $title_list1->nodeValue;
				echo "ลิงค์  =$link<br>";
			}
	            
			$xpathQueryToStockTitle1 = "//div[@class='post-list-wrapper' and @id='show_topic_lists']/div[$n] /div[3]";
			$title_results1 = $xpathProcessor1->query($xpathQueryToStockTitle1);
			$i = 0;
			foreach ($title_results1 as $title_list1){
				$i++;
				$post_by = $title_list1->nodeValue;
				echo "ชื่อผู้โพส  =$post_by<br>";
			}

			$xpathQueryToStockTitle1 = "//div[@class='post-list-wrapper' and @id='show_topic_lists']/div[$n]/div[3]/span/abbr/@data-utime";
			$title_results1 = $xpathProcessor1->query($xpathQueryToStockTitle1);
			$i = 0;
			foreach ($title_results1 as $title_list1){
				$i++;
				$time_stamp = $title_list1->nodeValue;
				echo "เวลาที่ตั้งกระทู้ =$time_stamp<br>";
			}	
			
			$xpathQueryToStockTitle1 = "//div[@class='post-list-wrapper' and @id='show_topic_lists']/div[$n]/div[3]/div/@title";
			$title_results1 = $xpathProcessor1->query($xpathQueryToStockTitle1);
			$i = 0;
			foreach ($title_results1 as $title_list1){
				$i++;
				$number_of_comments = $title_list1->nodeValue;
				echo "จำนวนความคิดเห็น  =$number_of_comments<br>";
			}
	    
			$xpathQueryToStockTitle1 = "//div[@class='post-list-wrapper' and @id='show_topic_lists']/div[$n]/div[4]/div";
			$title_results1 = $xpathProcessor1->query($xpathQueryToStockTitle1);
			$i = 0;
			foreach ($title_results1 as $title_list1){
				$i++;
				$tags = $title_list1->nodeValue;
				echo "Tag ข้อมูล   =$tags<br>";
			}
            
			// call emotion function
			$emotion = getEmotion($link);

            //--------------------insert into db--------------
        			try {
                   // echo "get into try <br>";
    				$dbhost = "localhost";
					$dbname = "pantip";
					$dbusername = "root";
					$dbpassword = "";

					$connection = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);
					$connection -> exec('SET NAMES utf8');
                    $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$statement = $connection->prepare("insert into db_pantip (id, title, link, post_by, time_stamp, number_of_comments, tags, emotion)
    							VALUES(:id, :title, :link, :post_by, :time_stamp,
    								:number_of_comments, :tags, :emotion)");
					$statement->execute(array(
								"id" => $n+$d, 
								"title" => $title,
                                "link" => $link,
								"post_by" => $post_by, 
								"time_stamp" => $time_stamp, 
								"number_of_comments" => $number_of_comments, 
								"tags" => $tags,
                                "emotion" => $emotion
								));
					$connection = null;
					
				}catch (PDOException $e) {
                     echo "get into catch <br>";
    				print "Error!: " . $e->getMessage() . "<br/>";
    				die();
				}
//--------------------insert into db--------------
            
			if($k>199){
				exit();
			}
			echo "---------------------------------------------------------------------------------<br>";
		}

						$x=$m;
						//echo "<br>"."$a[$x]";
						$b[$x]="$a[$x]"."<br>";
						$j=($d+50);
						geturl($b,$j);
		}
	}
}


////////////////////////////////////////////////
	functionmain();
	//test($s,$x);
	geturl($b,$d);
//////////////////////////////////////////////////////////
?>

