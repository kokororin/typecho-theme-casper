<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />    
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/style.css');?>"/>


<?php $this->header(); ?>
</head>
<body class="<?php body_class($this)?>-template nav-closed">
    <div class="nav"> 
   <h3 class="nav-title">Menu</h3> 
   <a href="#" class="nav-close"> <span class="hidden">Close</span> </a> 
   <ul> 
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <li class="nav-home" role="presentation"><a href="<?php $this->options->siteUrl(); ?>">首页</a></li> 
    <?php while($pages->next()): ?>
    <li class="nav-home" role="presentation"><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>                  
    <?php endwhile; ?>
   </ul> 
   <a class="subscribe-button icon-feed" href="<?php $this->options->siteUrl(); ?>feed">订阅</a> 
  </div>
  <span class="nav-cover"></span>

  <div class="site-wrapper">
