<?php
/**
* @author xiv [i@xiv.cm]
* @used [Wechat Msg Send Api]
*/
namespace Org\Xiv;
class Vx{
    private $Message=false;
    private $APPID="wx355b440d7339c777";
    private $SECRET="365cea7ce719359abaeb791ecc1f7ceb";
    //private $APPID="wx286216f0c86e4162";
    //private $SECRET="5a42262dab737b55659e346927dc7475";
    private $ToUser=false;
    public function __construct($ToUser,$Message) {
      $this->Message=$Message;
      $this->ToUser=$ToUser;
      if(!empty($Message)&&!empty($ToUser)&&$ToUser=="oeDSB1fLSXJpJiBXRHrMecS8drvg"){
        $result=self::SendTo($this->ToUser,$this->ToUser,$this->Message,"Custom","Yangkala");
        $res=json_decode($result,true);
        if($res["errcode"]==0){
          //exit(json_encode(array('status'=>0,"msg"=>"消息已推送！")));
        }else{
          //exit(json_encode(array("status"=>4,"msg"=>"推送失败！")));
        }
      }
    }
    public function valid(){
        if(self::checkSignature()){
          exit($_GET["echostr"]);
        }
    }     
    public function SendTo($FromUser=false,$ToUser=false,$Data=false,$Type="text",$contentStr="Yangkala"){
      $result=self::Msg($FromUser,$ToUser,$Data,$Type,$contentStr);
      $res=json_decode($result,true);
      if($res["errcode"]!=0){
        return self::Msg($FromUser,$ToUser,$Data,$Type,$contentStr);
      }
      return $res;
    }
    public function responseMsg(){
      $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
      if (!empty($postStr)){
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
          if($postObj->MsgType == 'event'){ //如果XML信息里消息类型为event
           if($postObj->Event == 'subscribe'){ //如果是订阅事件
              $data[0]=array(
                        "title"=>"Yangkala",
                        "desc"=>"欢迎关注Yangkala公众号！ \n\n更多精彩内容：".URL,
                        "picurl"=>"https://img.alicdn.com/imgextra/i3/1681929337/TB22riqg7qvpuFjSZFhXXaOgXXa_!!1681929337.gif",
                        "url"=>"www.lofsoft.com"
                        );
              self::tuwen($fromUsername,$toUsername,$data);
           }
          }
          if(!empty( $keyword )&&(in_array(substr($keyword,0,1), array('!','！'))||strstr($keyword,'搜')||strstr($keyword,'search'))){
                    $contentStr = "欢迎关注Yangkala公众号！";
                    $url=ts::Is_MOBILE()?"http://qm.qq.com/cgi-bin/qm/qr?k=PvIvIlk2Se0ygfAJVwFkqaQ7BvJevc80":"shang.qq.com/wpa/qunwpa?idkey=9c749643293b45d8c2cf6883935e45eaad1f7d5027513dcd1c41f74490dc7e2d";
                    if($res){
                      $data=array(
                        array(
                        "title"=>"Yangkala",
                        "desc"=>"Description",
                        "picurl"=>"https://www.baidu.com/img/bd_logo1.png",
                        "url"=>"http://test.lofsoft.com"),
                        array(
                          "title"=>"Yangkala",
                          "desc"=>"Description",
                          "picurl"=>"https://www.baidu.com/img/bd_logo1.png",
                          "url"=>"http://test.lofsoft.com"
                          )
                        );
                      if($toUsername=='|oAuLMvnJ5jKavghX_EUmWTIKH0HI|gh_bdbc1ef48178'){
                        self::tuwen($fromUsername,$toUsername,$data);
                      }else{
                        self::tuwen($fromUsername,$toUsername,$data);
                      }
                    }else{
                       $data[0]=array(
                        "title"=>"Yangkala",
                        "desc"=>"Description",
                        "picurl"=>"https://www.baidu.com/img/bd_logo1.png",
                        "url"=>"http://test.lofsoft.com");
                      self::tuwen($fromUsername,$toUsername,$data);
                    }
          }else if(!empty( $keyword )&&(strstr($keyword,'wechat')||strstr($keyword,'微信'))){
                    self::text($fromUsername,$toUsername,$msgType,"Add master wechatID:singleinalife");
          }else if(!empty($keyword)){
                    $data[0]=array(
                        "title"=>"Yangkala",
                        "desc"=>"Description",
                        "picurl"=>"https://www.baidu.com/img/bd_logo1.png",
                        "url"=>"http://test.lofsoft.com"
                        );
                    self::tuwen($fromUsername,$toUsername,$data);
          }

        }else {
          /*$msgType = "text";
          $contentStr = "ladyboys！";
          $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
          echo $resultStr;
          exit;*/
        }
    }
  /*
  *@author i@xiv.cm
  *@FromUser   @ToUser    @Data  @Type
  *开发者微信号 接受者微信号  内容  消息类型
  */
  public function Msg($FromUser=false,$ToUser=false,$Data=false,$Type="text",$contentStr="Yangkala"){
    if(!$FromUser||!$ToUser||!$Data){
      return false;
    }
    if(ucfirst($Type)=="Text"){
      $textTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <Content><![CDATA[%s]]></Content>
                <FuncFlag>0</FuncFlag>
                </xml>";
      $resultStr = sprintf($textTpl, $FromUser, $ToUser, time(), "text", $contentStr);
      exit($resultStr);
    }elseif (ucfirst($Type)=="News") {
        $newsTplBody = "<item>
                        <Title><![CDATA[%s]]></Title> 
                        <Description><![CDATA[%s]]></Description>
                        <PicUrl><![CDATA[%s]]></PicUrl>
                        <Url><![CDATA[%s]]></Url>
                        </item>";
        $newsTplHead = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>%s</ArticleCount>
                        <Articles>";
        $newsTplFoot = "</Articles>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
        $result=sprintf($newsTplHead, $FromUser, $ToUser, time(),count($data));
        foreach ($data as $key => $value) {
          $result.=sprintf($newsTplBody, $value["title"], $value["desc"], $value["picurl"], $value["url"]);
        }
        $result.=$newsTplFoot;
        exit($result);
    }elseif (ucfirst($Type)=="Custom") {
      $tpl='{
        "touser":"'.$ToUser.'",
        "msgtype":"text",
        "text":{
          "content":"'.$Data.'"
        }
      }';
      self::custom($tpl);
    }
  }
  public function checkSignature(){
    $token = TOKEN;
    $tmpArr = array($token, $_GET["timestamp"], $_GET["nonce"]);
    sort($tmpArr);
    $tmpStr = implode( $tmpArr );
    $tmpStr = sha1( $tmpStr );
    if( $tmpStr == $_GET["signature"] ){
      return true;
    }else{
      return false;
    }
  }
  public  function getAccess_token(){
    $access_url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->APPID."&secret=".$this->SECRET;
    $where["key"]="accesstoken:2";
    // echo "<pre>";
    // print_r(M()->db(2,"DB_CONFIG2"));exit;
    $data=M()->db(2,"DB_CONFIG2")->table("ims_core_cache")->where($where)->find("value");
    $weixin_token=unserialize($data);
    if($acess_token["expire"]>time()-7000||!empty($weixin_token)){
        $access_token=$weixin_token["token"];
    }else{
        $weixin_token=file_get_contents($access_url);
        $acess_token=json_decode($weixin_token,true);
        M()->db(2,"DB_CONFIG2")->table("ims_core_cache")->where($where)->save(array("value"=>serialize(array("token"=>$acess_token["access_token"],"expire"=>time()))));
        $access_token=$acess_token["access_token"];
    }
    //print_r($access_token);
    return $access_token;
  }
  public function RwLog($dir=false,$file,$data){
    //$dir=dirname(__FILE__);
    if(empty($dir)){
      $f=$dir.$file;
      echo $f;
      if(file_exists($f)){
        $fp=fopen($f,"w+");
      }else{
        $fp=fopen($f,"w+");
      }
    }else{
      $f=$dir.$file;
      echo $f;
      if(file_exists($f)){
        $fp=fopen($f,"w+");
      }else{
        mkdir($dir,0755,true);
        $fp=fopen($f,"w+");
      }
    }
    if (flock($fp, LOCK_EX)) { // 进行排它型锁定
        fwrite($fp, "$data\n");
        flock($fp, LOCK_UN); // 释放锁定
    } else {
        echo "Couldn't lock the file !";
    }
    fclose($fp);
  }
  public function custom($txt=""){
    if(empty($txt)){
      exit("Nothing be send!");
    }
    $url="https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".self::getAccess_token();
    $curl=curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $txt);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curl);
    if(curl_errno($curl)){

      $res= "Error".curl_error($curl);
    }else{
      $res= $result;
    }
    curl_close($curl);
    return $res;
  }
}
?>