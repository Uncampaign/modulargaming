<?php echo Message::render() ?>

<div class=forum-title>
	<?php echo html::anchor( 'forum/post/'.$post->id, $post->title ); ?>
</div>

<div class=forum-content>
	<?php echo $post->content ?>
</div>

<div>
<?php echo __('Created by:') ?>
        <b><?php echo html::anchor('profile/view/'.$post->user->id, $post->user->username ) ?></b>
<?php echo Time::Ago($post->created) ?>
<?php if ($user->id == $post->user->id): ?>
	<?php echo html::anchor( 'forum/post/'.$post->id.'/edit', 'Edit' ) ?>
	<?php echo html::anchor( 'forum/post/'.$post->id.'/delete', 'Delete' ) ?>
<?php endif ?>

</div>


