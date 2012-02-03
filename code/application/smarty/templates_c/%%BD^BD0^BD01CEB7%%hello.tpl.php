<?php /* Smarty version 2.6.26, created on 2012-01-24 19:32:58
         compiled from test/hello.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'test/hello.tpl', 2, false),)), $this); ?>
こんにちは、<?php echo $this->_tpl_vars['name']; ?>
さん!!<br>
今日は<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y年%m月%d日') : smarty_modifier_date_format($_tmp, '%Y年%m月%d日')); ?>
です。<br>