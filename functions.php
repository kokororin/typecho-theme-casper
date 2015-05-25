<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', null, null, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
        array('ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments'    => _t('显示最近回复'),
            'ShowCategory'          => _t('显示分类'),
            'ShowArchive'           => _t('显示归档'),
            'ShowOther'             => _t('显示其它杂项')),
        array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));

    $form->addInput($sidebarBlock->multiMode());
}

function getNearPost($cid)
{
    $db = Typecho_Db::get();

    $prev = $db->fetchRow($db->select('title,cid')->from('table.contents')->where('cid > ? AND status = ? AND type = ?', $cid, 'publish', 'post')->order('cid', Typecho_Db::SORT_ASC));
    $next = $db->fetchRow($db->select('title,cid')->from('table.contents')->where('cid < ? AND status = ? AND type = ?', $cid, 'publish', 'post')->order('cid', Typecho_Db::SORT_DESC));

}

function the_one()
{
    $getjson = 'http://api.hitokoto.us/rand?charset=utf-8';
    $content = file_get_contents($getjson);
    $array   = json_decode($content, true);
    $words   = $array['hitokoto'];
    echo $words;
}

function kaomojiya()
{
    $kaomojiya = array('|∀ﾟ', '(´ﾟДﾟ`)', '(;´Д`)', '(｀･ω･)', '(=ﾟωﾟ)=', '| ω・´)', '|-` )', '|д` )', '|ー` )', '|∀` )', '(つд⊂)', '(ﾟДﾟ≡ﾟДﾟ)', '(＾o＾)ﾉ', '(|||ﾟДﾟ)', '( ﾟ∀ﾟ)', '( ´∀`)', '(*´∀`)', '(*ﾟ∇ﾟ)', '(*ﾟーﾟ)', '(　ﾟ 3ﾟ)', '( ´ー`)', '( ・_ゝ・)', '( ´_ゝ`)', '(*´д`)', '(・ー・)', '(・∀・)', '(ゝ∀･)', '(〃∀〃)', '(*ﾟ∀ﾟ*)', '( ﾟ∀。)', '( `д´)', '(`ε´ )', '(`ヮ´ )', 'σ`∀´)', ' ﾟ∀ﾟ)σ', 'ﾟ ∀ﾟ)ノ', '(╬ﾟдﾟ)', '(|||ﾟдﾟ)', '( ﾟдﾟ)', 'Σ( ﾟдﾟ)', '( ;ﾟдﾟ)', '( ;´д`)', '(　д ) ﾟ ﾟ', '( ☉д⊙)', '(((　ﾟдﾟ)))', '( ` ・´)', '( ´д`)', '( -д-)', '(>д<)', '･ﾟ( ﾉд`ﾟ)', '( TдT)', '(￣∇￣)', '(￣3￣)', '(￣ｰ￣)', '(￣ . ￣)', '(￣皿￣)', '(￣艸￣)', '(￣︿￣)', '(￣︶￣)', 'ヾ(´ωﾟ｀)', '(*´ω`*)', '(・ω・)', '( ´・ω)', '(｀・ω)', '(´・ω・`)', '(`・ω・´)', '( `_っ´)', '( `ー´)', '( ´ρ`)', '( ﾟωﾟ)', '(oﾟωﾟo)', '(　^ω^)', '(｡◕∀◕｡)', '( ◕‿‿◕ )', 'ヾ(´ε`ヾ)', '(ノﾟ∀ﾟ)ノ', '(σﾟдﾟ)σ', '(σﾟ∀ﾟ)σ', '|дﾟ )', '┃電柱┃', 'ﾟ(つд`ﾟ)', 'ﾟÅﾟ )　', '⊂彡☆))д`)', '⊂彡☆))д´)', '⊂彡☆))∀`)', '(´∀((☆ミつ');
    foreach ($kaomojiya as $key=>$value){
        echo '<img class="kaomojiya" alt="'.$value.'" title="'.$value.'" />';
    }
}
