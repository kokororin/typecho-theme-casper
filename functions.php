<?php
if (!defined('__TYPECHO_ROOT_DIR__'))
{
	exit;
}

function body_class($archive)
{
	if ($archive->is('index'))
	{
		$class = 'home';
	}
	if ($archive->is('post'))
	{
		$class = 'post';
	}
	if ($archive->is('page'))
	{
		$class = 'post';
	}
	if ($archive->is('archive'))
	{
		$class = 'archive';
	}
	echo $class;
}

function gravatar_url($mail, $size, $echo = true)
{
	$rating  = Helper::options()->commentsAvatarRating;
	$Request = Typecho_Request::getInstance();
	$default = null;
	$url     = Typecho_Common::gravatarUrl($mail, $size, $rating, $default, $Request->isSecure());
	if ($mail == '' && $size == '' && $echo == false)
	{
		$url = str_replace('?s=&amp;r=G&amp;d=', '', $url);
		return $url;
	}
	$url = Typecho_Common::gravatarUrl($mail, $size, $rating, $default, $Request->isSecure());
	if ($echo)
	{
		echo $url;
	}
	else
	{
		return $url;
	}
}

function footer_json()
{
	echo json_encode(array(
		'gravatar_prefix' => gravatar_url('', '', false),
	));
}
