<?php
/**
 * GD库不支持自定义验证码类
 *
 */
namespace Xiv;
class Code {
    private $width=false;
    private $height=false;
    private $im=false;
    private $length=false;
    private $color=false;
    private $background=false;
    private $type=false;
    private $name=false;
    public function __construct($data) {
        //$data=array("name","length","background","width","height","type");
        $this->name=!empty($data["name"])?$data["name"]:'xiv_auth_code';
        $this->width=!empty($data["width"])?$data["width"]:90;
        $this->height=!empty($data["height"])?$data["height"]:35;
        $this->im=imagecreatetruecolor($this->width, $this->height);//创建画布
        $this->length=!empty($data["length"])?$data["length"]:4;
        $this->type=!empty($data["type"])?$data["type"]:false;
        $this->color=!empty($data["color"])?$data["color"]:false;
        $this->background=!empty($data["background"])?$this->hex2rgb($data["background"]):$this->hex2rgb("#FFFFFF");
        imagefill($this->im, 0, 0, $this->background);
        //imagesetpixel($this->im,1,1,$this->color);
        $this->roundpoint();
        header('Content-type:image/png'); 
        imagepng($this->im);
        imagedestroy($this->im);
    }
    private function randcode(){
          $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
          if (empty($this->type)||!in_array($this->type, array(1,2,3,4))) {
              array_pop($arr);
              $string = implode("", $arr);
          }else{
              $string = $arr[$type];
          }
          $count = strlen($string) - 1;
          $code = '';
          for ($i = 0; $i < $this->length; $i++) {
              $code .= $string[rand(0, $count)];
          }
          if(empty($_SESSION)){
            session_start();
          }
          $_SESSION[$this->name]=md5(strtolower($code));
          $_SESSION["code"]=strtolower($code);
      return $code;
    }
    private function randcolor(){
      return base_convert(mt_rand( 0, 0xFFFFFF ), 10, 16);
    }
    private function roundpoint(){
        $code=$this->randcode();
        $pattern = '/[\x7f-\xff]{3}/i';
        preg_match_all($pattern,strval($code),$matches);
        $s = preg_replace($pattern,'',$code);
        //iconv('GBK','UTF-8','汉字')
        if(!empty($matches)&&count($matches[0])>0){
          $codes=array_merge($matches,str_split($s,1));
        }else{
          $codes =str_split($s,1);
        }
        foreach ($codes as $key => $value) {
            $type=array("imagestring","ImageStringup","imagechar","imagecharup");
            $k=array_rand($type,1);
            $opt=$type[$k];
            $h=$k>1?$this->height/2:$this->height/3;
            $opt($this->im,36,$this->width/$this->length*$key,12,$value,$this->hex2rgb($this->randcolor()));
        }
        
    }
    private function hex2rgb($hex){
        $hex = str_replace("#", "", $hex);

           if(strlen($hex) == 3) {
              $r = hexdec(substr($hex,0,1).substr($hex,0,1));
              $g = hexdec(substr($hex,1,1).substr($hex,1,1));
              $b = hexdec(substr($hex,2,1).substr($hex,2,1));
           } else {
              $r = hexdec(substr($hex,0,2));
              $g = hexdec(substr($hex,2,2));
              $b = hexdec(substr($hex,4,2));
           }
        return imagecolorallocate($this->im,$r, $g, $b);
    }
}

