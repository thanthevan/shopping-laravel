<?php

function vn_to_str($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'd'=>'đ,Đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}
$str = str_replace(' ','-',$str);
 
return strtolower($str);
 
}
 function changestring($string,$kt)
{
    $string = explode($kt,$string);
    return   $string[count( $string)-2]." ".$string[count( $string)-1];
}

 function stringtonumber($string)
{
   $tring =str_replace('.','',$string);
   return  $tring;
}
function category($data, $parent_id, $str = ' ', $select)
{
    foreach ($data as $val) {
        $id = $val["id"];
        $ten = $val["name"];
        if ($val['parent_id'] == $parent_id) {
       
            if ($select != 0 && $id == $select) {

                if($val['parent_id']==0)
                {
                   echo "<optgroup label='$ten'>"; 
                }else
                {
                   echo "<option  selected value='". $id ."'>" . $str  . $ten . "</option>";  
                }
            } else {
                if($val['parent_id']==0)
                {
                   echo "<optgroup label='$ten'>"; 
                }else
                {
                   echo '<option  value="' . $id . '">' . $str . " " . $ten . '</option>';  
                }
                
            }
            Category($data, $id, $str . ' ', $select);
        }
    }
}
function categoryadd($data, $parent_id, $str = ' ', $select)
{
    foreach ($data as $val) {
        $id = $val["id"];
        $ten = $val["name"];
        if ($val['parent_id'] == $parent_id) {
       
            if ($select != 0 && $id == $select) {

                if($val['parent_id']==0)
                {
                   echo "<option class='ctadd' selected value='". $id ."'>" . $str  . "ROOT </option>"; 
                }else
                {
                    echo "<option class='ctadd' selected value='". $id ."'>" . $str  . $ten . "</option>"; 
                }
            } else {

                
                    echo '<option class="ctadd" value="' . $id . '">' . $str . " " . $ten . '</option>';
                
                
            }
            //Category($data, $id, $str . ' ', $select);
        }
    }
}
function categoryedit($data, $parent_id, $str = ' ', $select)
{
    foreach ($data as $val) {
        $id = $val["id"];
        $ten = $val["name"];
        if ($val['parent_id'] == $parent_id) {
       
            if ($select != 0 && $id == $select) {

                if($val['parent_id']==0)
                {
                   echo "<option class='ctadd' selected value='". $id ."'>" . $str  . "ROOT </option>"; 
                }else
                {
                    echo "<option class='ctadd' selected value='". $id ."'>" . $str  . $ten . "</option>"; 
                }
            } else {

                
                    echo '<option class="ctadd" value="' . $id . '">' . $str . " " . $ten . '</option>';
                
                
            }
            categoryedit($data, $id, $str . ' ', $select);
        }
    }
}
function listcate($data, $parent_id = 0, $str = "")
{
    foreach ($data as $val) {
        $id = $val["id"];
        $ten = $val["name"];
        if ($val['parent_id'] == $parent_id) {
            echo '<tr>'; 
            if ($str == "") {
                echo '<td ><strong>' . $id . '</strong></td>';
                echo '<td ><strong style="color:black;font-weight: bold;font-size:18px">' . $str . '' . $ten . '</strong></td>';
            } else {
                echo '<td ><strong>' . $id . '</strong></td>';
                echo '<td style="color:black;font-weight: bold">' . $str . '-' .$ten. '</td>';
            }
            echo '<td class="list_td aligncenter">
		            <button title="Sửa"  class="edit btn btn-sm btn-warning ud" data-name="'. $val["name"].'" data-id='.$id.' data-parent-id='.$val['parent_id'].'><i class="fa fa-pencil"></i></button>
		            <form style="display: inline-block;" action="'.route('category.destroy',['id'=>$id]).'" method="post">
                       '.csrf_field().''.method_field('DELETE').'
                      <button type="submit" title="Xóa" onclick="return confirm(\'Xóa danh mục này ?\'); " class="delete btn btn-sm btn-danger"><i class="fa fa-times-circle"></i></button>
                    </form>
			      </td>
			    </tr>';
            listcate($data, $id, $str . "-");
        }
    } 
}
function listcatepost($data, $parent_id = 0, $str = "")
{
    foreach ($data as $val) {
        $id = $val["id"];
        $ten = $val["name"];
        if ($val['parent_id'] == $parent_id) {
            echo '<tr>'; 
            if ($str == "") {
                echo '<td ><strong>' . $id . '</strong></td>';
                echo '<td ><strong style="color:black;font-weight: bold;font-size:18px">' . $str . '' . $ten . '</strong></td>';
            } else {
                echo '<td ><strong>' . $id . '</strong></td>';
                echo '<td style="color:black;font-weight: bold">' . $str . '-' .$ten. '</td>';
            }
            echo '<td class="list_td aligncenter">
                    <button title="Sửa"  class="edit btn btn-sm btn-warning udk" data-name="'. $val["name"].'" data-id='.$id.' data-parent-id='.$val['parent_id'].'><i class="fa fa-pencil"></i></button>
                    <form style="display: inline-block;" action="'.route('categorypost.destroy',['id'=>$id]).'" method="post">
                       '.csrf_field().''.method_field('DELETE').'
                      <button type="submit" title="Xóa" onclick="return confirm(\'Xóa danh mục này ?\'); " class="delete btn btn-sm btn-danger"><i class="fa fa-times-circle"></i></button>
                    </form>
                  </td>
                </tr>';
            listcate($data, $id, $str . "-");
        }
    }
}
function colorlib()
{
   $data = array('White','silver','grey','black','navy','blue','turquoise','teal','cyan','green','lime','chartreuse',
                                                             
'olive','yellow','gold','orange','brown','orangered','red','maroon','pink','magenta','purple','blueviolet','indigo','violet','plum');

   return $data;
}

 function size_lib()
{
    $data= array( 'word'=>array( 'XS', 'S',  'M'  ,'L' ,'XL' ,'XXL'), 
             'number' =>array('26', '27',  '28'  ,'29' ,'30' ,'31','32','33','34')
           );
    return $data;
}

function category_name_by_pi($pi)
{      $category_id=App\Product::find($pi)->category_id;
        $name = App\Category::find($category_id)->name;
        $parent_id=App\Category::find($category_id)->parent_id;
        $name_parent =App\Category::find($parent_id)->name;

        return $name_parent."/".$name;
}
 function category_name($category_id)
    {
        $name = App\Category::find($category_id)->name;
        $parent_id=App\Category::find($category_id)->parent_id;
        $name_parent =App\Category::find($parent_id)->name;

        return $name_parent."/".$name;
    }
function category_name_post($post_id)
    {
        $name = App\CategoryPost::find($post_id)->name;
        $parent_id=App\CategoryPost::find($post_id)->parent_id;
        $name_parent =!empty(App\CategoryPost::find($parent_id))?App\CategoryPost::find($parent_id)->name:'';
       
        return $name_parent!==''?$name_parent."/".$name:$name;
    }
     function unit_price($product_id)
    {
        $unit_price = App\Product::find($product_id)->unit_price;
        $promo_price = App\Product::find($product_id)->promo_price;
        if( $promo_price!=0)
            return $promo_price;
        return $unit_price;
    }

function arraytostring($array,$element)
{
    $a =array();
    foreach ($array as $arr) {
        array_push( $a,$arr[$element]);
    }
     $a =implode(',',$a);
    return $a;
}