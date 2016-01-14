<?

include("../includes/config.php");
$id=$_GET['id'];

	$sqlCust="select * from st_View_cust_web where CustNum='$id'";
	$sqlCust=sqlsrv_query($con,$sqlCust);
	$reC=sqlsrv_fetch_array($sqlCust);
	
	$sqlPacDetail="select a.CustNum
				,a.File_Name
				,a.PhotoLocation
				,cast(a.TimeStamp as date) as TimeStamp
				,cast(a.TimeStamp as time) as TimeStamp2
				,a.User_id
				,a.pic_group_id
				,b.pic_group_name
				from st_photo_detail a left join st_photo_group b
				on a.pic_group_id = b.pic_group_id
				where a.CustNum='$id'
				order by a.pic_group_id asc,a.TimeStamp asc ";
				
	$sqlPacDetail;
	$sqlPacDetail=sqlsrv_query($con,$sqlPacDetail);
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รูปภาพร้านค้า<?=$id;?></title>
<link href="../css2/css.css" rel="stylesheet" type="text/css">
 <script src="../css2/ddmenu.js" type="text/javascript"></script>
 <!---------เดิม-<link rel='stylesheet' type='text/css' href='jQuery/ui-lightness/jquery-ui-1.10.0.custom.css'>
--->
<script type='text/javascript' src='../jQuery/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='../jQuery/jquery-ui-1.10.0.custom.min.js'></script>


<script type="text/javascript" src="../jQuery/path.js"></script>
<link rel='stylesheet' type='text/css' href='jQuery/ui-lightness/jquery-ui-1.10.0.custom.min.css'>



	

	<!-- Add jQuery library -->
	<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});
			
		$(".checkbox").click(function(){
									//
                                    var bool = true;
                                    $(this).parent().parent().closest("div").find(".this_item").each(function(){
                                        if($(this).find("input[type=checkbox]").prop("checked")){
                                            bool = false;
											
                                        }
                                    });

                                    if(!bool){
                                        $(".btn_remove_this").removeAttr("disabled");
                                    }else{
                                        $(".btn_remove_this").attr("disabled", "disabled");
                                    }
         });
		$('#all').change(function()
	{		
				if (this.checked) 
				{ 	//alert('checked'); 
					$(".checkbox").attr("checked", "true");
				} 
				else 
				{ 	//alert('no');
					//$(".id_Question").attr("checked", "false");
					$(".checkbox").removeAttr("checked"); 
				}
				
	});					
		
		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		body {
			max-width: 700px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
<div class="container_box">
             
  <div id="box">

      <div class="header">
        
        <h1>รูปภาพร้านค้า  <? echo $reC['CustNum']; ?></h1>
          <h3>ร้าน :  <? echo $reC['CustName'];?></h3> 
		  <?
							echo "  ที่อยู่  ".$reC['AddressNum'];
							echo "  ม.  ".$reC['AddressMu'];
							echo "  ต.  ".$reC['DISTRICT_NAME'];
							echo "  อ.  ".$reC['AMPHUR_NAME'];
							echo "  จ.  ".$reC['PROVINCE_NAME'];
							echo " ".$reC['cust_type_name'];
		  ?>
    </div>
        
    <div class="sep"></div><br>
<div class="box" align="center" >
<p><input type="checkbox" id="all" name="all" value="all">All<br>
	<form method="post" action="showImgCust.php?&id=<?=$id;?>&do=del">
	<table border="0" cellspacing="0" cellpadding="0">
	<tr>
	<?
	$a=1;
	while($re=sqlsrv_fetch_array($sqlPacDetail))
	
	{  
		$x=date_format($re['TimeStamp'], 'Y-m-d');
		$x2=date_format($re['TimeStamp2'], 'H:i:s');
		$Photo=$re['PhotoLocation']."#".$x."#".$x2; 
	
		//echo "http://saletool-api.carabao.co.th/".$Photo;
		
	?>
		<td align="center" width="250px" height="250px" >
		
		<a class="fancybox" href="http://saletool-api.carabao.co.th/<?=$Photo;?>" data-fancybox-group="gallery" 
		title="<? echo "[".$a."] -รูป ".$re['pic_group_name']; echo "<br>"; echo date_format($re['TimeStamp'],'d-m-Y');?>">
		<img src="http://saletool-api.carabao.co.th<?="/".$Photo;?>" alt="" width="150px" height="150px"/>
		</a>
		<div class="this_item ui-state-default"   >
		<input type="checkbox"  style="width:200px;height:20px;" class="checkbox" id="checkbox[]" name="checkbox[]" value="<?=$Photo;?>">
		<?//=$x2; ?>
		</div>
		</td>
	<? if(($a%4)==0){echo "</tr><tr>";}
	$a++; 
	
	} ?>
	</table>
	<div align="center">
	
	<input  type="submit" style="width:200px;height:40px;size:20px" class="btn_remove_this" disabled value="ลบรูปภาพร้านค้า">
	</div>
	</form>
	</p>
</div>

</div>
</div>




</body>
</html>

<?
if($_GET['do']=="del")
{
	 $checkbox = $_POST['checkbox'];
    foreach($checkbox as $checkboxs)
	{
		//echo "<br>".$checkboxs;
		$e = explode("#", $checkboxs);
		$e1=trim($e[0]);
		$e2=trim($e[1]);
		$e3=trim($e[2]);
		$sqlDel ="delete st_photo_detail where PhotoLocation='$e1' and cast(TimeStamp as date)='$e2' and cast(TimeStamp as time)='$e3' ";
		
		
		/*$img='http://saletool-api.carabao.co.th/'.$checkboxs;
		if (unlink($img))
		{
		echo ("deleted $img");
		}
		else
		{
		echo ("error   ");
		echo $img;
		}*/
	



		
		$qtyDel=sqlsrv_query($con,$sqlDel);
		if($qtyDel)
		  {
			echo "<script type=\"text/javascript\">";
			echo "alert(\"ลบรูปภาพร้านค้าเรียบร้อยแล้ว\");";
			echo "window.location='showImgCust.php?&id=".$id."';";
			echo "</script>";
		  }
	}
}
?>