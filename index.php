<?php
/**
 * Casper
 * 
 * @package Typecho Casper Theme
 * @version 0.2
 * @link https://kotori.love/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<header class="main-header " id="index-main-header" style="background-image: url(<?php $this->options->themeUrl('assets/imgs/Kotori.jpg')?>)">
    <nav class="main-nav overlay clearfix">
        <a class="menu-button icon-menu" href="#"><span class="word">Menu</span></a>
    </nav>
    <div class="vertical">
        <div class="main-header-content inner">
            <h1 class="page-title"><?php $this->options->title() ?></h1>
            <h2 class="page-description"><?php $this->options->description() ?></h2>
        </div>
    </div>
    <a class="scroll-down icon-arrow-left" href="#content" data-offset="-45"><span class="hidden">Scroll Down</span></a>
</header>


<main id="content" class="content" role="main">

    <div class="extra-pagination inner">
    <nav class="pagination" role="navigation">
    <?php $this->pageNav('上一页', '下一页', '3' ,'...', array('itemTag' => '', 'currentClass' => 'page-number' ,'prevClass' => 'newer-posts', 'nextClass' => 'older-posts'));?>
</nav>
</div>

<?php while($this->next()): ?>
<article class="post">
    <header class="post-header">
        <h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
    </header>
    <section class="post-excerpt">
        <p><?php $this->excerpt('500','...');?><a class="read-more" href="<?php $this->permalink() ?>">&raquo;</a></p>
    </section>
    <footer class="post-meta">        
        分类：<?php $this->category(','); ?> 标签：<?php $this->tags(', ', true, 'none'); ?>
        <time class="post-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('F j, Y'); ?></time>
    </footer>
</article>
<?php endwhile;?>

<nav class="pagination" role="navigation">
    <?php $this->pageNav('上一页', '下一页', '3' ,'...', array('itemTag' => '', 'currentClass' => 'page-number' ,'prevClass' => 'newer-posts', 'nextClass' => 'older-posts'));?>
</nav>

</main>

<?php $this->need('footer.php'); ?>
