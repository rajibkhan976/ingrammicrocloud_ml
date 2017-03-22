<?php

/**
 * Description of celtislabLib2
 *
 * Author: enomoto@celtislab
 * Version: 0.6.0
 * Author URI: http://celtislab.net/
 */

// 暫定　ライブラリの整理もまだ出来ていないので、CeltisLib1 の関数も含んだ形とする
// 今後ライブラリの整理も含めてどのように管理していくかは現時点で未定である

class CeltisLib2 {
//---- CeltisLib1 -----------------------------------------------------------
    //除外指定ポストIDの固定ページであるか判定する
    public static function isnot_exclude_page($exclude_id)
    {
        $exclude = (count($exclude_id) > 0 ) && is_page($exclude_id);
        return( ! $exclude );
    }
   
    //指定ポストIDの固定ページであるか判定する
    public static function is_include_page($include_id)
    {
        $include = (count($include_id) > 0 ) && is_page($include_id);
        return( $include );
    }

    //除外カテゴリーまたは除外指定ポストIDの投稿記事であるか判定する
    public static function isnot_exclude_single($exclude_cat, $exclude_id)
    {
        $exclude1 = in_category($exclude_cat);
        $exclude2 = (count($exclude_id) > 0 ) && is_single($exclude_id);
        return( (! $exclude1) && (! $exclude2) );
    }
    
    //指定カテゴリーまたは指定ポストIDの投稿記事であるか判定する
    public static function is_include_single($include_cat, $include_id)
    {
        $include1 = (count($include_cat) > 0 ) && in_category($include_cat);
        $include2 = (count($include_id) > 0 ) && is_single($include_id);
        return( $include1 || $include2 );
    }

    //dynamic_sidebar 内からの実行であるかバックトレースから判定する
    public static function in_dynamic_sidebar()
    {
        $in_flag = false;
        $trace = debug_backtrace();
        foreach ($trace as $stp) {
            if(isset($stp['function'])){
                if($stp['function'] === "dynamic_sidebar"){
                    $in_flag = true;
                    break;
                }
            }
        }
        return $in_flag;
    }

    //dyndamic_sidebar の文字列化
    public static function get_mydynamic_sidebar($index = 1)
    {
        ob_start();
        dynamic_sidebar($index);
        $sidebar_contents = ob_get_clean();
        return $sidebar_contents;
    }
 
    
    //短縮URL取得　（Tweet ボタンでの使用を想定）
    //エラーならパーマリンクを戻す
    public static function get_shorturl($permalink, $type = 1) 
    {
        $url = $permalink;
        if($type == 1){ //tinyurl
            $maketiny = 'http://tinyurl.com/api-create.php?url='.$url;

            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $maketiny);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            $tinyurl = curl_exec($ch);
            if(! curl_errno($ch)){
                $url = $tinyurl;
            }
            curl_close($ch);
        }
        return $url;
    }
   
    //日付 YYYY-MM-DD の有効性チェックと取得
    // 未設定/無効な日付なら NULL をリターンする
    // セパレータが / や . の場合は YYYY-MM-DD 形式にフォーマットし直す
    public static function get_check_date($date)
    {
        if (isset($date)) {
            $dateval = strtotime( trim($date) );
            if($dateval !== FALSE){
                if( checkdate(date('m', $dateval), date('d', $dateval), date('Y', $dateval)) !== FALSE ){
                    $date = date('Y-m-d', $dateval);
                    return $date;
                }
            }
        }
        return NULL;
    }  
 

    //HTML の指定タグ位置を取得（大文字、小文字を区別しない）
    // $html 検索するHTML文
    // $stag スタートタグ 例 <script
    // $etag エンドタグ   例 /script>
    // $ofset検索開始位置 0- (strlen()-1)
    // 戻り値 位置情報配列(start, end)  エラー時は FALSE
    public static function htmltagpos($html, $stag, $etag, $ofset=0)
    {
        $pos = FALSE;
        $start = stripos($html, $stag, $ofset);
        if($start !== FALSE){
            $end = stripos($html, $etag, $start);
            if($end !== FALSE){
                $end += (strlen($etag)-1);
                $pos = array($start, $end);
            }
        }
        return $pos;
    }
    
    //HTML の指定タグを分割して取り出す
    // $html 検索するHTML文
    // $stag スタートタグ 例 <script
    // $etag エンドタグ   例 /script>
    // $ofset検索開始位置 0- (strlen()-1)
    // 戻り値 分割 HTML文配列 $newhtml(指定タグ以外の部分, 指定タグ1, 指定タグ2, --- 指定タグN)  
    public static function htmltagsplit($html, $stag, $etag, $ofset=0)
    {
        $newhtml[0] = '';
        if(strlen($html) > 0){
            $start = $ofset;
            $end = strlen($html) - $ofset - 1;
            if($start != 0)
                $newhtml[0] = substr($html, 0, $start);
            for($cnt=0; ($pos = CeltisLib2::htmltagpos($html, $stag, $etag, $start)) !== FALSE; $cnt++){
                $newhtml[0] = $newhtml[0] . substr($html, $start, $pos[0] - $start);
                $len = $pos[1] - $pos[0] + 1;
                $newhtml[$cnt+1] = substr($html, $pos[0], $len);
                $start = $pos[1] + 1;
            }
            if($start < $end)
                $newhtml[0] = $newhtml[0] . substr($html, $start, $end - $start + 1);
        }
        return $newhtml;
    }

//---- CeltisLib2 -----------------------------------------------------------

    //HTML の指定タグを分割して取り出す（但しタグ内に除外キーワードが含まれているものを除く）
    // $html 検索するHTML文
    // $stag スタートタグ 例 <a
    // $etag エンドタグ   例 /a>
    // $exkeylist 除外キーワードリスト 例えば画像等の埋め込みタグを指定して除外する
    // $ofset検索開始位置 0- (strlen()-1)
    // 戻り値 分割 HTML文配列 $newhtml(指定タグ以外の部分, 指定タグ1, 指定タグ2, --- 指定タグN)  
    public static function htmltagsplit_exclude($html, $stag, $etag, $exkeylist, $ofset=0)
    {
        $newhtml[0] = '';
        $exkeystr = implode('|', $exkeylist);
        
        if(strlen($html) > 0){
            $start = $ofset;
            $end = strlen($html) - $ofset - 1;
            if($start != 0)
                $newhtml[0] = substr($html, 0, $start);
            for($cnt=0; ($pos = CeltisLib2::htmltagpos($html, $stag, $etag, $start)) !== FALSE; ){
                $len = $pos[1] - $pos[0] + 1;
                $sephtml = substr($html, $pos[0], $len);
               
                //タグ内に禁止文字列のリストが含まれているかチェック
                if (! preg_match("/$exkeystr/", $sephtml)){
                    $newhtml[0] = $newhtml[0] . substr($html, $start, $pos[0] - $start);
                    $newhtml[$cnt+1] = $sephtml;
                    $cnt++;
                }
                else {
                    $newhtml[0] = $newhtml[0] . substr($html, $start, $pos[0] - $start) . $sephtml;
                }
                $start = $pos[1] + 1;
            }
            if($start < $end)
                $newhtml[0] = $newhtml[0] . substr($html, $start, $end - $start + 1);
        }
        return $newhtml;
    }

    
    // <a /a>タグ内のURLが内部リンクならリンク先記事のポスト情報取得
    // 戻り値 ポストID連想配列  エラー時は false
    public static function linkurl_postid($atagstr)
    {
        $pattern = '/(https?):\/\/([-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)/u';
        $match = array();
        if(preg_match($pattern, $atagstr, $match)){
            $pid = url_to_postid($match[0]);
            if($pid > 0){
                $p = get_post($pid);
                return( array($p->ID => array('post_title'=>$p->post_title, 'post_status'=>$p->post_status)));
            }
        }
        return false;
    }
    
    //HTML 内のリンクタグからリンク先記事のポスト情報を取り出す
    // $html 検索するHTML文
    // 戻り値 ポストID連想配列 
    public static function html_linkurl_postsid($html)
    {
        //コンテンツから <a /a>タグ を抽出して配列に保存（画像等の埋め込みタグの含まれているものを除く）
        $exkey = array('<img', '<embed', '<iframe', '<object', '<param', '<video', '<audio', '<source', '<track', '<canvas', '<map', '<area');
        $alink = CeltisLib2::htmltagsplit_exclude($html, '<a', '/a>', $exkey);
        //リンクタグ内のURLが内部リンクならポストID、記事タイトルを取得して重複しないよう保存
        $pidlist = array();
        for($n=1; $n <count($alink); $n++ ){
            $pid = CeltisLib2::linkurl_postid($alink[$n]);
            if($pid !== false)
                $pidlist += $pid;
        }
        return $pidlist;
    }
    
    //ポストIDに関連するカテゴリー情報取得
    // $postid     調査対象のポストID
    // $mode       'current'   現在のポストIDのカテゴリーのみを対象とする　
    //             'childof'   現在のポストIDのカテゴリーを基準に子孫カテゴリーツリーを含める
    //             'parentof'  現在のカテゴリーの祖先から子孫全体のカテゴリーツリーを含める
    // $ex_catid   除外するカテゴリーIDを配列で指定
    // 戻り値 　　　カテゴリーID連想配列(categoryID, カテゴリー情報配列)
    //               カテゴリー情報配列は情報取得関数により異なるので共通部分のみをスライスして保持    
    //                 - term_id        ID
    //                 - name           名前
    //                 - slug           スラッグ
    //                 - term_group     グループID
    //                 - term_taxonomy_id	タクソノミーID
    //                 - taxonomy		'category'
    //                 - description	説明
    //                 - parent         親カテゴリーID。ない場合は0
    //                 - count          カウント
    public static function postid_related_categories($postid, $mode, $ex_catid=array())
    {
        $cidlist = array();
        //記事のカテゴリー情報に複数カテゴリーがセットされている場合あり
        foreach ( (array) get_the_category($postid) as $cat ) {
            if ( empty($cat->name )) 
                continue;

            //基準位置取得
            if($mode === 'parentof'){
                //祖先方向へ戻る
                while(1){
                    if ( $cat->parent == '0' )
                        break;
                    $cat = get_category( $cat->parent );
                }
            }
            //基準位置のカテゴリー情報を取得
            if ($cat->count > 0 && in_array($cat->term_id, $ex_catid)===false)
                $cidlist += array($cat->term_id => array_slice((array)$cat, 0, 9));
            
            //基準位置以下の子孫カテゴリー情報取得
            if($mode === 'childof' || $mode === 'parentof'){
                $child = get_terms( 'category', array( 'child_of' => $cat->term_id ) );
                if(isset($child)){
                    foreach ( $child as $cat) {
                        if($cat->count > 0 && in_array($cat->term_id, $ex_catid)===false)
                            $cidlist += array($cat->term_id => (array)$cat);
                    }
                }
            }
        }
        return $cidlist;
    }

    //指定カテゴリーID配列に属する投稿情報取得
    // $catidlist  カテゴリID配列
    // 戻り値 　　　ポスト情報連想配列
    //
    public static function categoryid_postsid($catidlist)
    {
        $pidlist = array();
        if(!empty($catidlist)) {
            $cateidstr = implode(',', $catidlist);
            $posts = get_posts(array('category' => $cateidstr, 'numberposts' => -1));
            foreach ($posts as $p){
                if($p->post_status === 'publish')
                    $pidlist += array($p->ID => array('post_title'=>$p->post_title, 'post_status'=>$p->post_status));
            }
        }
        return $pidlist;
    }

    //指定ポストID配列に属するタグ情報取得
    // $postsid    ポストID配列
    // 戻り値 　　　タグ情報連想配列
    //
    public static function postsid_tags($postsid)
    {
        //指定 postID から記事情報を取得する  get_the_tags 関数
        //記事等の関連付けがなければ get_tags で全体のタグ情報が取得可能だが、ここでは get_the_tags を使用して繰り返し実行する必要あり
        $taglist = array();
        foreach ($postsid as $pid){
            foreach ( (array) get_the_tags($pid) as $tag ) {
                if ( empty($tag->name ) )
                    continue;
                $taglist += array($tag->term_id => $tag);
            }
        }
        return $taglist;
    }    
}

?>
