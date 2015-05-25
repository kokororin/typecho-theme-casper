<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

   <header class="main-header tag-head " style="background-image: url(<?php $this->options->themeUrl('assets/imgs/Sora.jpg');?>)">
    <nav class="main-nav overlay clearfix">
        <a class="menu-button" href="#"><span class="burger">&#9776;</span><span class="word">菜单</span></a>
    </nav>
    <div class="vertical">
        <div class="main-header-content inner">
            <h1 class="page-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h1>
            <h2 class="page-description">
                    <!--共 1 篇文章 -->
            </h2>
        </div>
    </div>
   </header>


<main id="content" class="content" role="main">

    <div class="extra-pagination inner">
    <nav class="pagination" role="navigation">
    <?php $this->pageNav('上一页', '下一页', '3' ,'...', array('itemTag' => '', 'currentClass' => 'page-number' ,'prevClass' => 'newer-posts', 'nextClass' => 'older-posts'));?>
</nav>
</div>

<?php if ($this->have()): ?>
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
 <?php else: ?>
 <h4 style="text-align:center"><?php _e('没有找到内容');?></h4>
<?php endif;?>

<nav class="pagination" role="navigation">
    <?php $this->pageNav('上一页', '下一页', '3' ,'...', array('itemTag' => '', 'currentClass' => 'page-number' ,'prevClass' => 'newer-posts', 'nextClass' => 'older-posts'));?>
</nav>

</main>













	<?php $this->need('footer.php'); ?>
