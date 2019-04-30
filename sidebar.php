<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="secondary">
<section class="shadow widget">
<h3 class="widget-title">介绍</h3>
<ul class="widget-list">
<li style="text-align: center;"><a href="https://gdfksi.coding.io/"><img src="https://q1.qlogo.cn/g?b=qq&s=100&nk=1559867170" width="30%" style="border-radius:50%"/></a></li>
<li style="text-align: center;"><a href="https://gdfksi.coding.io/" style="font-size:18px">陆英彬</a></li>
<li style="text-align: center;"><a href="https://gdfksi.coding.io/" style="font-size:14px">一个进军大前端的95后大男孩</a></li>
<br/>
<li style="text-align: center;"><a href="https://github.com/BInyLU" target="_blank" style="font-size:14px"><svg class="octicon octicon-mark-github v-align-middle" height="32" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true" style="vertical-align: middle"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg></a><a href="http://wpa.qq.com/msgrd?v=3&uin=1559867170&site=qq&menu=yes" target="_blank" style="font-size:14px"><img src="https://4.url.cn/zc/v3/img/logo.png" width="12%" style="vertical-align: middle;margin-left:20px" /></a></li>
</ul>
</section>
<?php if (!empty($this->options->ShowWhisper) && in_array('sidebar', $this->options->ShowWhisper)): ?>
<section class="widget">
<h3 class="widget-title"><?php echo FindContents('page-whisper.php') ? FindContents('page-whisper.php', 'commentsNum', 'd')[0]['title'] : '轻语' ?></h3>
<ul class="widget-list whisper">
<?php Whisper(1); ?>
<?php if ($this->user->pass('editor', true) && (!FindContents('page-whisper.php') || isset(FindContents('page-whisper.php')[1]))): ?>
<li class="notice"><b>仅管理员可见: </b><br><?php echo FindContents('page-whisper.php') ? '发现多个"轻语"模板页面，已自动选取内容最多的页面作为展示，请删除多余模板页面。' : '未找到"轻语"模板页面，请检查是否创建模板页面。' ?></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
<section class="shadow widget">
<h3 class="widget-title">热门文章</h3>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'commentsNum'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<section class="shadow widget">
<h3 class="widget-title">最新文章</h3>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
<section class="shadow widget">
<h3 class="widget-title">最近回复</h3>
<ul class="widget-list">
<?php Contents_Comments_Initial($this->options->commentsListSize, in_array('IgnoreAuthor', $this->options->sidebarBlock) ? 1 : ''); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<section class="shadow widget">
<h3 class="widget-title">分类</h3>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Category_List')
->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag', $this->options->sidebarBlock)): ?>
<section class="shadow widget">
<h3 class="widget-title">标签</h3>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li><a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php else: ?>
<li>暂无标签</li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
<section class="shadow widget">
<h3 class="widget-title">归档</h3>
<ul class="widget-list">
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 n 月')
->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->ShowLinks) && in_array('sidebar', $this->options->ShowLinks)): ?>
<section class="shadow widget">
<h3 class="widget-title">链接</h3>
<ul class="widget-tile">
<?php Links($this->options->IndexLinksSort); ?>
<?php if (FindContents('page-links.php', 'order', 'a', 1)): ?>
<li class="more"><a href="<?php echo FindContents('page-links.php', 'order', 'a', 1)[0]['permalink']; ?>">查看更多...</a></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
<section class="shadow widget">
<h3 class="widget-title">其它</h3>
<ul class="widget-list">
<li><a href="https://gdfksi.coding.io/admin" target="_blank">登陆后台</a></li>
<li><a href="<?php $this->options->feedUrl(); ?>" target="_blank">文章 RSS</a></li>
<li><a href="<?php $this->options->commentsFeedUrl(); ?>" target="_blank">评论 RSS</a></li>
<?php if($this->user->hasLogin()): ?>
<li><a href="<?php $this->options->adminUrl(); ?>" target="_blank">进入后台 (<?php $this->user->screenName(); ?>)</a></li>
<li><a href="<?php $this->options->logoutUrl(); ?>"<?php if ($this->options->PjaxOption): ?> no-pjax <?php endif; ?>>退出</a></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
</div>
