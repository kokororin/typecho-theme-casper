<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<header class="main-header post-head no-cover">
    <nav class="main-nav  clearfix">        
            <a class="menu-button icon-menu" href="#"><span class="word">菜单</span></a>
    </nav>
</header>

<main class="content" role="main">
    <article class="post">
        <header class="post-header">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <section class="post-meta">               
                <time datetime="<?php $this->date('c'); ?>"><?php $this->date('F j, Y'); ?></time> 
            </section>
        </header>
        <section class="post-content">
            <p><?php $this->content(); ?></p>
        </section>
        <footer class="post-footer">
            <figure class="author-image">
                <a class="img" style="background-image: url('https://cdn.v2ex.com/gravatar/<?php echo md5('ritsuka.sunny@gmail.com'); ?>?s=60')"></a>
            </figure>    
        </footer>
       
        <?php $this->need('comments.php'); ?>
    </article>
</main>

<?php $this->need('footer.php'); ?>
