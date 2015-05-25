<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>


<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author'; //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user'; //如果是评论作者的添加 .comment-by-user 样式
        }
    }
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent'; //评论层数大于0为子级，否则是父级
    ?>

      <li class="ds-post" id="<?php $comments->theId(); ?>">
       <div class="ds-post-self">
        <div class="ds-avatar">
         <?php $comments->gravatar('60', '');?>
        </div>
        <div class="ds-comment-body">
         <div class="ds-comment-header">
          <?php $comments->author();?>
         </div>
         <p><?php $comments->content();?></p>
         <div class="ds-comment-footer ds-comment-actions">
          <span class="ds-time" datetime="<?php $comments->date('c');?>" title="<?php $comments->date('Y-m-d H:i');?>"><?php $comments->date('Y-m-d H:i');?></span>
          <?php $comments->reply('<span class="ds-icon ds-icon-reply"></span>回复');?>
          <a class="ds-post-repost" href="javascript:void((function(s,d,e){try{}catch(e){}var%20f='http://v.t.sina.com.cn/share/share.php?',u=d.location.href,p=['url=',e(u),'&title=',e(d.title),'&appkey=1392530042'].join('');function a(){if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=620,height=450,left=',(s.width-620)/2,',top=',(s.height-450)/2].join('')))u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,document,encodeURIComponent))"><span class="ds-icon ds-icon-share"></span>转发</a>          
         </div>
        </div>
       </div>
       <?php if ($comments->children): ?>
     <ul class="ds-children">
    <?php $comments->threadedComments($options);?>
     </ul>
    <?php endif;?>
       </li>
<?php }?>



<div id="comments">
    <?php $this->comments()->to($comments);?>




    <div id="comment-box">
   <div id="ds-thread">
    <div id="ds-reset">
     <div class="ds-comments-info">
      <ul class="ds-comments-tabs">
       <li class="ds-tab"><a class="ds-comments-tab-duoshuo ds-current" href="javascript:void(0);"><span class="ds-highlight"><?php $this->commentsNum();?></span>条评论</a></li>
      </ul>
     </div>
     <?php if ($comments->have()): ?>
    <ul class="ds-comments">

    <?php $comments->listComments(array('before' => '', 'after' => ''));?>

    </ul>
     <?php endif;?>
   
     
     <?php if ($this->allow('comment')): ?>
     <div class="ds-toolbar"></div>
     <div id="<?php $this->respondId();?>" class="ds-replybox">
      <?php if($this->user->hasLogin()):?>
      <a class="ds-avatar" href="<?php $this->options->profileUrl(); ?>" title="设置资料"><img src="https://cdn.v2ex.com/gravatar/<?php echo md5($this->user->mail); ?>?s=60"></a>
      <?php else:?>
      <a id="ds-avatar" class="ds-avatar" href="javascript:void(0)" title="设置资料"><img src="https://cdn.v2ex.com/gravatar/<?php echo md5($this->remember('mail',true)); ?>?s=60"></a>
      <?php endif;?>
        <div class="cancel-comment-reply" style="display:none;">
        <?php $comments->cancelReply(); ?>
        </div>
      <form method="post" action="<?php $this->commentUrl()?>" id="comment-form">
        <?php if(!$this->user->hasLogin()): ?>
        <div class="author-info" <?php if($this->remember('author',true) != '' && $this->remember('mail',true) != ''):?>style="display: none;"<?php endif;?>>        
        <div class="ds-textarea-wrapper ds-rounded-top">
        <input type="text" name="author" id="author" value="<?php $this->remember('author'); ?>" placeholder="称呼" required />
       </div>
       <br>
       <div class="ds-textarea-wrapper ds-rounded-top">
        <input type="text" name="mail" id="mail" value="<?php $this->remember('mail'); ?>" placeholder="邮件" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
       </div>
       <br>
       <div class="ds-textarea-wrapper ds-rounded-top">
        <input type="text" name="url" id="url" value="<?php $this->remember('url'); ?>" placeholder="<?php _e('http://'); ?>" <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
       </div>
       <br>
       </div>
       <?php endif;?>
       <div class="ds-textarea-wrapper ds-rounded-top">
        <textarea name="text" id="textarea" title="Ctrl+Enter快捷提交" placeholder="点击头像即可设置资料m(_ _)mm(_ _)m" style="height: 54px;" required></textarea>
        <pre class="ds-hidden-text"></pre>
       </div>
       <div class="ds-post-toolbar">
        <div class="ds-post-options ds-gradient-bg"></div>
        <button class="ds-post-button" type="submit">发布</button>
        <div class="ds-toolbar-buttons">
         <a class="ds-toolbar-button ds-add-emote" title="插入表情"></a>
        </div>
       </div>
      </form>
      <br/>
     </div>
     <!-- 表情 -->
  <div id="ds-smilies-tooltip" style="display:none;">
   <div class="ds-smilies-container">
    <ul>
     <?php kaomojiya();?>     
    </ul>
   </div>
  </div>
     <!-- end -->
     <?php else: ?>
    <!--<h3><?php _e('评论已关闭');?></h3>-->
    <?php endif;?>

    </div>
   </div>
  </div>

     <nav class="pagination" role="navigation">
    <?php $comments->pageNav('上一页', '下一页', '3' ,'...', array('itemTag' => '', 'currentClass' => 'page-number' ,'prevClass' => 'newer-posts', 'nextClass' => 'older-posts'));?>
    </nav>



    
</div>
